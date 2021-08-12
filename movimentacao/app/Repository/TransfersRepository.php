<?php

namespace App\Repository;

use App\Contracts\Repository\TransfersContract;
use App\Models\Transfers;

class TransfersRepository implements TransfersContract
{
    protected $model;
    public function __construct(Transfers $model)
    {
        $this->model = $model;
    }

    public function addTransfers($params)
    {
        return $this->model::create($params);
    }

    public function addNotification($notification, $transaction)
    {
        return $this->model::where('id',$transaction)->update([
            'notification' => $notification
        ]);
    }
}