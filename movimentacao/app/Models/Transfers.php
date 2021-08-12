<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transfers extends Model
{
    protected $table = 'tranfers';

    protected $fillable = [
        'value',
        'notification',
        'source_user',
        'destination_user'
    ];

}