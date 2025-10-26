<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'amount',
        'payment_status',
        'order_id',
        'reference_id',
        'description'
    ];
    //relations 
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
