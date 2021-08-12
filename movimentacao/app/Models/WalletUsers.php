<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WalletUsers extends Model
{
    protected $table = 'wallet_users';

    protected $fillable = [
        'users_id'
    ];

    public function user()
    {
        return $this->hasMany(\App\Models\Users::class, 'id', 'users_id');
    }
}