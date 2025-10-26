<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = [
        'name'
    ];
    //relations 
    public function products()
    {
        return $this->belongsToMany(Product::class, 'attribute_product')
            ->withPivot('value');
    }
}
