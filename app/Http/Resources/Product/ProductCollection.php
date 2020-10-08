<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => round($this->price, 2),
            'totalPrice' => round((1 - ($this->discount / 100)) * $this->price),
            'rating' => $this->reviews->count() > 0 ? round($this->reviews->sum('star') / $this->reviews->count(), 2) : 'No reting',
            'discount' => $this->discount,
            'href' => [
                'link' => route('shop.show', $this->id)
            ]
        ];
    }
}
