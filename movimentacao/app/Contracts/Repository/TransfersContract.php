<?php

namespace App\Contracts\Repository;

interface TransfersContract
{
    public function addTransfers($params);
    public function addNotification($notification, $transaction);
}