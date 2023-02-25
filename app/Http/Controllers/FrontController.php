<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Session;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        $posts_popular = Post::orderBy('view_count', 'desc')->paginate(3);
        $categories = Category::orderBy('name', 'asc')->get();
        $categories_posts = Category::withCount('posts')->orderBy('posts_count', 'desc')->where('status', '=', 1)->paginate(5);
        return view('front.index', ['posts' => $posts, 'categories' => $categories, 'categories_posts' => $categories_posts, 'posts_popular' => $posts_popular]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $Key = 'blog' . $post->id;
        $posts_popular = Post::orderBy('view_count', 'desc')->paginate(3);
        $categories = Category::orderBy('name', 'asc')->get();
        $categories_posts = Category::withCount('posts')->orderBy('posts_count', 'desc')->where('status', '=', 1)->paginate(5);
        if (Session::has($Key, $Key)) {
            //
        } else {
            Session::put($Key, $Key);
            $post->increment('view_count');
        }
        return view('front.single', ['post' => $post, 'categories' => $categories, 'categories_posts' => $categories_posts, 'posts_popular' => $posts_popular]);
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

    public function showCategory($slug)
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $category_name = Category::where('slug', $slug)->first();
        $cat_id = Category::where('slug', $slug)->pluck("id")->first();
        $posts = Post::where('category_id', $cat_id)->paginate(3);
        $posts_popular = Post::orderBy('view_count', 'desc')->paginate(3);
        $categories_posts = Category::withCount('posts')->orderBy('posts_count', 'desc')->where('status', '=', 1)->paginate(5);
        return view('front.category', ['categories' => $categories, 'category_name' => $category_name, 'posts' => $posts, 'categories_posts' => $categories_posts, 'posts_popular' => $posts_popular]);
    }
}
