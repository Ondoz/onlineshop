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
            'price' => 'required',
            'qty' => 'required',
            'discount' => 'required',
            'description' => 'required',
            'status' => 'required',
            'categories' => 'required'

        ]);
        $product = Product::create([
            'sku' => $request->sku,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'qty' => $request->qty,
            'discount' => $request->discount,
            'description' => $request->description,
            'status' => $request->status
        ]);

        $arr = [];
        foreach ($request->categories as $key => $item) {
            $arr[$item] = $item;
        }

        $product->categories()->sync($arr, false);

        return back()->with('success', 'Product Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $product = Product::where('slug', $slug)->first();
        if (!empty($product)) {
            $comment = $product->reviews()->paginate(10);
            return view('admin.product.show', compact('product', 'comment'));
        } else {
            echo "Opps!!";
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $categories = Categories::all();
        return view('admin.product.form', compact('product', 'categories'));
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
        $product = Product::find($id);

        $request->validate([
            'sku' => 'required',
            'name' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'discount' => 'required',
            'description' => 'required',
            'status' => 'required',
            'categories' => 'required'

        ]);
        $product->update([
            'sku' => $request->sku,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'qty' => $request->qty,
            'discount' => $request->discount,
            'description' => $request->description,
            'status' => $request->status
        ]);
        $arr = [];
        foreach ($request->categories as $key => $item) {
            $arr[$item] = $item;
            if ($product->categories()->where('categories_id', $item)->exists()) {
                $response[$key] =  "exists";
            } else {
                $product->categories()->sync($arr, false);
            }
        }
        return back()->with('success', "Berhasil di Update");
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


    public function proCatDel(Request $request)
    {
        $product = Product::find($request->product_id);
        $response =  $product->categories()->detach($request->categories_id);
        if ($response != null) {
            $response = [
                'status' => '200',
                'messege' => 'Delete successfully'
            ];
        } else {
            $response = [
                'status' => '500',
                'messege' => 'Fail Delete Kontol !!!'
            ];
        }

        return response()->json($response);
    }
}
