<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use File;
use Carbon\Carbon;


class PostController extends Controller
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
        $posts = Post::orderBy('title', 'asc')->paginate(55);
        $categories = Category::orderBy('name', 'asc')->get();
        $users = User::orderBy('name', 'asc')->get();

        return view('admin.posts.index', ['posts' => $posts, 'categories' => $categories, 'users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::orderBy('title', 'asc')->get();
        $categories = Category::orderBy('name', 'asc')->get();
        $users = User::orderBy('name', 'asc')->get();
        if (auth()->user()->is_admin == 1) {
            return view('admin.posts.create', compact('posts'))->with('categories', $categories, 'users', $users);
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $slug_text = Str::slug($request['title']);
        if ($request->hasfile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/posts'), $imageName);
        }
        $tags1 = explode(",", $request->tag);
        //$date_time = date('d/m/y H:i:s);
        $date_time = date('d/m/Y');
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $imageName,
            'published_at' => $date_time,
            'category_id' => $request->category_id,
            'slug' => $slug_text,
            //'tags' => $request->tag,
            'user_id' => auth()->id(),
        ]);
        return redirect('/admin/posts')->with('success', 'Post berhasil ditambahkan!');
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
    public function edit(Post $post)
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $users = User::orderBy('name', 'asc')->get();
        if (auth()->user()->is_admin == 1) {
            return view('admin.posts.create', ['post' => $post, 'categories' => $categories, 'users' => $users]);
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $slug_text = Str::slug($request['title']);
        $imageName = $request->input('old_image');
        $date_time = date('d/m/Y');
        request()->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasfile('image')) {
            $imageName_old = $request->input('old_image');
            $image_path_to_delete = "images/posts" . $imageName_old;
            \File::delete($image_path_to_delete);
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/posts'), $imageName);
        }

        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $imageName,
            'published_at' => $date_time,
            'category_id' => $request->category_id,
            'slug' => $slug_text,
            'user_id' => $request->user_id,
        ]);
        $post->save();
        return redirect('/admin/posts')->with('message', 'Post berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // Delete Post and Image
        $posts = \App\Models\Post::findOrfail($request->id);
        $image_path_to_delete = "images/posts/{$posts->image}";
        if (File::exists($image_path_to_delete)) {
            \File::delete($image_path_to_delete);
        }
        $posts->delete();
        return redirect('/admin/posts')->with('warning', 'Post berhasil dihapus!');
    }
}
