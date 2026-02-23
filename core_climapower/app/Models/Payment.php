<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'commerce_order', 'flow_order', 'email', 'amount','jwttoken',
        'currency', 'status', 'subject', 'optional','cart_content'
    ];
}
