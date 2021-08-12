<?php

namespace App\Facades;

use App\Contract\Facades\CreateUserContract;
use App\Contract\Repository\UserContract;
use App\Contract\Repository\WalletUserContract;
use Exception;
use Illuminate\Support\Facades\DB;

class CreateUserFacades implements CreateUserContract
{
    protected $userRepository,
              $walletUserRepository;

    public function __construct(
        UserContract $userContract,
        WalletUserContract $walletUserContract
    ){
        $this->userRepository = $userContract;
        $this->walletUserRepository = $walletUserContract;
    }

    public function createUser(array $params)
    {
       return DB::transaction(function() use($params) {
            $user = $this->userRepository->createUser($params);
            if (empty($user)) {
                DB::rollBack();
                throw new Exception('User not Created');
            }

            $wallet = $this->walletUserRepository->createWallet($user->id);

            if (empty($wallet)) {
                DB::rollBack();
                throw new Exception('User/Wallet not Created');
            } 

            $user->wallet = $wallet;
            
            DB::commit();
            
            return $user;

       });
    }
}