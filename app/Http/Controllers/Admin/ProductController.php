<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::orderBy('id', 'desc')->paginate(10);
        return view("admin.product.index", compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        return view("admin.product.form", compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'sku' => 'required',
            'name' => 'required',
            'details' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'discount' => 'required',
            'description' => 'required',
            'status' => 'required'

        ]);
        $product = Product::create([
            'sku' => $request->sku,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'details' => $request->details,
            'price' => $request->price,
            'qty' => $request->qty,
            'discount' => $request->discount,
            'description' => $request->description,
            'status' => $request->status
        ]);
        $arr = [];
        // foreach ($request->categories as $key => $lokasi) {
        //     $arr[$lokasi] = [
        //         'stok_sekarang' => (int) $request->stok_sekarang[$key],
        //         'harga_beli'    => (int) $request->harga_beli,
        //         'harga_jual_toko'   => $request->harga_jual_toko,
        //         'harga_jual_partai' => $request->harga_jual_partai,
        //         'pajak_ppn' => $request->pajak_ppn
        //     ];
        // }
        // $product->categories()->sync([1, 2, 3], false);
        $arr = [];
        foreach ($request->categories as $key => $item) {
            $arr['categories'] = $item;
        }

        $product->categories()->sync($arr);

        return back()->with('success', 'Produck Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
