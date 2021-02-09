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

  // EDITION D'UN POST : FORMULAIRE
  // PATTERN: /admin/posts/edit/form/{post}
  // CTRL: AdminPosts
  // ACTION: edit
    Route::get('/admin/posts/edit/form/{post}', [AdminPosts::class, 'edit'])->middleware(['auth'])->name('admin.posts.edit');

  // EDITION D'UN POST : UPDATE
  // PATTERN: /admin/posts/edit/{post}
  // CTRL: AdminPosts
  // ACTION: update
    Route::put('/admin/posts/edit/{post}', [AdminPosts::class, 'update'])->middleware(['auth'])->name('admin.posts.update');

  // SUPPRESSION D'UN POST : DELETE
  // PATTERN: /admin/posts/delete/{post}
  // CTRL: AdminPosts
  // ACTION: delete
    Route::delete('/admin/posts/delete/{post}', [AdminPosts::class, 'destroy'])->middleware(['auth'])->name('admin.posts.destroy');
