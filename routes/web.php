<?php

use Illuminate\Support\Facades\Route;

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

  // ROUTE PAR DEFAUT
  // PATTERN: /
  // VUE: index
  Route::get('/', function () {
    return view('templates.index');
    })-> name('home');

  // ROUTEUR DES WORKS
  require __DIR__ . '/works.php';

  // ROUTEUR DES POSTS
  require __DIR__ . '/posts.php';



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
