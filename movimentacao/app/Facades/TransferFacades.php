<?php

namespace App\Facades;

use App\Contracts\Facades\TransferContract;
use App\Contracts\Repository\TransfersContract;
use App\Contracts\Repository\WalletUserContract;
use App\Contracts\Services\TransactionContract;
use App\Jobs\NotificationJob;
use Exception;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class TransferFacades implements TransferContract
{
    protected $walletUserRepository,
              $transfersRepository,
              $transcationService;

    public function __construct(
        WalletUserContract $walletUserRepository,
        TransfersContract $transfersRepository,
        TransactionContract $transcationService
    ) {
        $this->walletUserRepository = $walletUserRepository;
        $this->transfersRepository = $transfersRepository;
        $this->transcationService = $transcationService;
    }
    
    public function transfer($params) 
    {
        $walletUserSource = $this->checkBalanceTypeUser($params['source_user'],$params['value']);

        $walletUserDestination = $this->walletUserRepository->findByWalletUser($params['destination_user']);

        return DB::transaction(function() use ($walletUserSource, $walletUserDestination, $params) {
            $valueTransfer = $walletUserDestination[0]->value + $params['value'];

            $transferDestination = $this->walletUserRepository->depositWallet($valueTransfer, $params['destination_user']);

            if (!$transferDestination) {
                DB::rollBack();
                throw new Exception('Fail! transfer destination');
            }

            $valueDiscount = $walletUserSource->value - $params['value'];
            
            $transferDiscount = $this->walletUserRepository->depositWallet($valueDiscount, $params['source_user']);
            
            if (!$transferDiscount) {
                DB::rollBack();
                throw new Exception('Fail! discount source');
            }

            $transfer = $this->transfersRepository->addTransfers([
                'value' =>  $params['value'],
                'notification' => 0,
                'source_user' => $params['source_user'],
                'destination_user' => $params['destination_user']
            ]);

            if (empty($transfer)) {
                DB::rollBack();
                throw new Exception('Fail! generate extract');
            }

            $result = $this->transcationService->checkAutorizador();

            if (!$result) {
                DB::rollBack();
                throw new Exception('Fail! transaction denied');
            }
           
            dispatch(new NotificationJob($transfer->id));
 
            DB::commit();
            return true;
        });
    }

    private function checkBalanceTypeUser($id, $value) 
    {
        $walletSourceUser = $this->walletUserRepository->findByWalletUser($id);

        if (!isset($walletSourceUser[0])) {
            throw new Exception('wallet not found!');
        }

        if ($walletSourceUser[0]->user[0]->type_users_id == 1) {
            throw new Exception("Type User Lojista can't transfer!");
        }
        
        if ($walletSourceUser[0]->value == 0 || $walletSourceUser[0]->value < $value) {
            throw new Exception("insufficient funds!");
        }

        return $walletSourceUser[0];
    }
}