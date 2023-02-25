<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoryRequest;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        if (auth()->user()->is_admin == 1) {
            return view('admin.categories.index')->with('categories', $categories);
        } else {
            return redirect()->route('home');
        }
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
    public function store(CreateCategoryRequest $request)
    {
        $slug_text = Str::slug($request['name']);
        Category::create([

            'name' => $request->name,
            'slug' => $slug_text,
            'status' => $request->statusRadioOptions1,
            'priority' => $request->priorityChekbox,
        ]);
        return redirect('/admin/categories')->with('message', 'Kategori berhasil ditambahkan');
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
    public function edit(Category $category)
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('admin.categories.index', ['categories' => $categories, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $slug_text = Str::slug($request['name']);
        $category->update([
            'name' => $request->name,
            'slug' => $slug_text,
            'status' => $request->statusRadioOptions1,
            'priority' => $request->priorityChekbox,
        ]);
        $category->save();
        return redirect('/admin/categories')->with('message', 'Kategori berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $categories = \App\Models\Category::findOrFail($request->id);
        $categories->delete();
        return redirect('/admin/categories')->with('message', 'Kategori berhasil dihapus');
    }
}
