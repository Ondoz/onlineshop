<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    protected $fillable = ['sku', 'name', 'slug', 'price', 'qty', 'discount', 'description', 'status'];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Categories::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
