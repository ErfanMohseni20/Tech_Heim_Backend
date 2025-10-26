<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'parent',
        "image"
    ];
    // relations 
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
    // queries 
    public function scopeIsMain($query)
    {
        return $query->whereNull('parent');
    }
    public function scopeChildrenOf($query, $parentUuid)
    {
        return $query->where('parent', $parentUuid);
    }
    public function scopeHasProducts($query)
    {
        return $query->whereHas('products');
    }
}
