<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'name',
        'cpf_cnpj',
        'email',
        'password',
        'type_users_id'
    ];

}