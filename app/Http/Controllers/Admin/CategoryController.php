<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api')->except('getJson');
    // }

    public function index()
    {
        $getCategories = self::getCategory();
        $categories = Category::paginate(5);
        return view('admin.categories.index', compact('categories', 'getCategories'));
    }


    private static function getCategory()
    {
        $getCategories = Category::orderBy('name', 'asc')->get();
        return $getCategories;
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
        $request->validate([
            'name' => 'required',
        ]);
        if (Category::where([['name', $request->name], ['parent_id', $request->parent]])->exists()) {
            return back()->with('error', 'Category atau Parent Category sudah ada Sudah ada!');
        } else {
            Category::create([
                'name'      => ucfirst($request->name),
                'slug'      => Str::slug($request->name, '-'),
                'parent_id' => (int)$request->parent
            ]);
        }

        return back()->with('success', 'Category telah berhasil ditambahkan!');
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
        $data = Category::findOrFail($id);
        $data->delete();

        return back()->with('success', 'Berhasil Dihapus!!!');
    }


    public function getJson(Request $request)
    {
        $data = Category::where('id', $request->id)->first();
        return response()->json($data);
    }
}
