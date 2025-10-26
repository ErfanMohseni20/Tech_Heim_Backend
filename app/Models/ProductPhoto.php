<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
    protected $fillable = [
        'product_id',
        'photo',
        'is_main'
    ];
    //relations
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
