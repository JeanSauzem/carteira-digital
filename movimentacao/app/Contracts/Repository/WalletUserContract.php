<?php

namespace App\Contracts\Repository;

interface WalletUserContract
{
    public function findByWalletUser($id);
    public function depositWallet($value, $id);
}