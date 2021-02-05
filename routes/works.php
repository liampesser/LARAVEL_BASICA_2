<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Works;

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

  // LISTE DES WORKS
  // PATTERN: /works
  // CTRL: Works
  // ACTION: index
    Route::get('/works', [Works::class, 'index'])->name('works.index');

  // DETAIL D'UN WORK
  // PATTERN: /works/work/slug
  // CTRL: Works
  // ACTION: show
    Route::get('/works/{work}/{slug}', [Works::class, 'show'])
          ->where('work', '[1-9][0-9]*')
          ->where('slug', '[a-z0-9][a-z0-9\-]*')
          ->name('works.show');

  // MORE WORKS
  // PATTERN: /works/ajax/more
  // CTRL: Works
  // ACTION: more
    Route::get('/works/ajax/more', [Works::class, 'more'])->name('works.ajax.more');
