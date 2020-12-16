<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id', 'nama', 'no_hp', 'no_meja','amount'
    ];
}
