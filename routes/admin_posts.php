<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPosts;

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
  // PATTERN: /admin/posts
  // CTRL: AdminPosts
  // ACTION: index
    Route::get('/admin/posts', [AdminPosts::class, 'index'])->middleware(['auth'])->name('admin.posts.index');

  // AJOUT D'UN POST : FORMULAIRE
  // PATTERN: /admin/posts/add/form
  // CTRL: AdminPosts
  // ACTION: create
    Route::get('/admin/posts/add/form', [AdminPosts::class, 'create'])->middleware(['auth'])->name('admin.posts.create');

  // AJOUT D'UN POST : INSERT
  // PATTERN: /admin/posts/add/insert
  // CTRL: AdminPosts
  // ACTION: store
    Route::post('/admin/posts/add/insert', [AdminPosts::class, 'store'])->middleware(['auth'])->name('admin.posts.store');
