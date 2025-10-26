<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'stock',
        'amount',
        "category_id"
    ];
    //relations
    public function category() {
        return $this->belongsTo(Category::class , 'category_id');
    }
    public function photos() {
        return $this->hasMany(ProductPhoto::class , 'product_id');
    }
    public function suggests() {
        return $this->hasMany(SuggestProduct::class , 'product_id');
    }
}
