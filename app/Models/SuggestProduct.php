<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuggestProduct extends Model
{
    protected $fillable = [
        'product_id',
        'product_suggest_id',
    ];
    //relations
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    
    public function suggested()
    {
        return $this->belongsTo(Product::class, 'product_suggest_id');
    }
    
}
