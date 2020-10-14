<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'product_id',
        'path'
    ];

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
}
