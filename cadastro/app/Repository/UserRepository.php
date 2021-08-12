<?php

namespace App\Repository;

use App\Contract\Repository\UserContract;
use App\Models\Users;

class UserRepository implements UserContract
{
    protected $model;

    public function __construct(Users $user)
    {
        $this->model = $user;
    }
    
    public function createUser(array $params)
    {
        return $this->model::create($params);
    }
}