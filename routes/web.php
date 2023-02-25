<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('user/home', [HomeController::class, 'userHome'])->name('user.home')->middleware('is_user');

Route::resource('/admin/categories', CategoryController::class);

Route::resource('/admin/posts', PostController::class);

Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('home_front');

Route::get('category/{slug}', [App\Http\Controllers\FrontController::class, 'showCategory'])->name('categories.single');

Route::get('/{slug}', [App\Http\Controllers\FrontController::class, 'show'])->name('posts.single');

Route::resource('/admin/users', UserController::class);


Route::group(['middleware' => ['auth','hakakses:admin,user']], function(){

});


