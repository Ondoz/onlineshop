<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    public function presetPrice()
    {
        return money_format('$%i', $this->price / 100);
    }

    public function getUrlAttribute()
    {
        return route("shop.show", $this->slug);
    }
}
