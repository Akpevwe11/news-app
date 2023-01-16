<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Contracts\Session\Session;

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

//35

Route::get('/',[PostController::class, 'index'])->name('home');

Route::get('/posts/{post:slug}', [PostController::class, 'show']);

//  Route::get('authors/{author:username}', function(User $author) {

//     return view('posts.index', [

//         'posts' => $author->posts,

//     ]);
//  });

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');

Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');

Route::post('sessions', [SessionController::class, 'store']);

Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');







  Route::get('categories/{category:slug}', function (Category $category) {
     return view('posts', [
        'posts' => $category->posts,
        'currentCategory' => $category

     ]);
 })->name('category');
