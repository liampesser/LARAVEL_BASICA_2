<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Posts;

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

  // LISTE DES POSTS
  // PATTERN: /posts
  // CTRL: Posts
  // ACTION: index
    Route::get('/posts', [Posts::class, 'index'])->name('posts.index');

  // DETAIL D'UN POST
  // PATTERN: /posts/post/slug
  // CTRL: Posts
  // ACTION: show
    Route::get('/posts/{post}/{slug}', [Posts::class, 'show'])
          ->where('post', '[1-9][0-9]*')
          ->where('slug', '[a-z0-9][a-z0-9\-]*')
          ->name('posts.show');
