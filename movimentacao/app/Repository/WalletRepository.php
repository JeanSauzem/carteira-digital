<?php

namespace App\Repository;

use App\Contracts\Repository\WalletUserContract;
use App\Models\WalletUsers;

class WalletRepository implements WalletUserContract
{
    protected $model;

    public function __construct(WalletUsers $walletUsers)
    {
        $this->model = $walletUsers;
    }

    public function findByWalletUser($id)
    {
        return $this->model::where('users_id', $id)->with('user')->get();
    }

    public function depositWallet($value, $id)
    {
        return $this->model::where('users_id', $id)->update([
            'value' => $value
        ]);
    }
}