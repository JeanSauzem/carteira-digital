<?php

namespace App\Facades;

use App\Contracts\Facades\DepositContract;
use App\Contracts\Repository\WalletUserContract;
use Exception;
use Illuminate\Support\Facades\DB;

class DepositFacades implements DepositContract
{
    protected $walletRepository;

    public function __construct(WalletUserContract $walletUserContract)
    {
        $this->walletRepository = $walletUserContract;
    }

    public function deposit($params)
    {
        $user = $this->walletRepository->findByWalletUser($params['users_id']);
        
        if (empty($user)) {
            throw new Exception('User not found');
        }

        return DB::transaction(function() use ($params) {
            $updateWallet = $this->walletRepository->depositWallet($params['value'], $params['users_id']);
            if (!$updateWallet) {
                throw new Exception('Wallet User not found');
            }
            return $updateWallet;
        });
    }
}