<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Http\Requests\Users\UpdateUserRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use File;

class UserController extends Controller
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
        $users = User::orderBy('id', 'asc')->get();
        if (auth()->user()->is_admin == 1) {
            return view('admin.users.index')->with('users', $users);
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
        $imageName = $request->input('avatar');
        if ($request->hasfile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/users'), $imageName);
        }
        $user = new \App\Models\User;
        $user = \App\Models\User::findOrFail($request->id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->gender = $request->input('genderRadioOptions1');
        $user->avatar = $imageName;
        $user->nickname = $request->input('nickname');
        $user->is_admin = $request->input('adminRadioOptions1');
        $user->save();
        return redirect('/admin/users')->with('message', 'Pengguna berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // public function destroy($id)
    // {
    //     //
    // }

    public function destroy(Request $request)
    {
        $users = \App\Models\User::findOrFail($request->id);
        $users->delete();
        return redirect('/admin/users')->with('message', 'Pengguna berhasil dihapus');
    }
}
