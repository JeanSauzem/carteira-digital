<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WalletUsers extends Model
{
    protected $table = 'wallet_users';

    protected $fillable = [
        'users_id'
    ];
}