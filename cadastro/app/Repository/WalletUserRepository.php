<?php

namespace App\Repository;

use App\Contract\Repository\WalletUserContract;
use App\Models\WalletUsers;

class WalletUserRepository implements WalletUserContract
{
    protected $model;
    
    public function __construct(WalletUsers $model)
    {
        $this->model = $model;
    }

    public function createWallet($id) 
    {
        return $this->model::create([
            'users_id' => $id
        ]);
    }
}