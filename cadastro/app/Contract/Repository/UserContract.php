<?php

namespace App\Contract\Repository;

interface UserContract
{
    public function createUser(array $params);
}