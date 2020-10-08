<?php

namespace App\Http\Controllers;

use App\Product;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop = Product::paginate(10);
        $data = [];
        $map = $shop->map(function ($value, $key) use ($data) {
            $data['id'] = $value->id;
            $data['name'] = $value->name;
            $data['slug'] = $value->slug;
            $data['price'] = round($value->price, 2);
            $data['totalPrice'] = round((1 - ($value->discount / 100)) * $value->price);
            $data['rating'] = $value->reviews->count() > 0 ? round($value->reviews->sum('star') / $value->reviews->count(), 2) : 'No reting';
            $data['discount'] = $value->discount;
            return $data;
        });
        // return response()->json($shop);

        return view('shop/shop', compact('map', 'shop'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * **
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // $product->increment('view');
        $product = Product::where('slug', $slug)->first();
        return view('shop/product-single', compact('product'));
        // dd($product);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
