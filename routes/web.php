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

  // ROUTEUR GESTION DES POSTS
    require __DIR__ . '/admin_posts.php';

  // ROUTEUR GESTION DES WORKS
    require __DIR__ . '/admin_works.php';

  // ROUTEUR DES POSTS
    require __DIR__ . '/posts.php';

  // ROUTEUR DES WORKS
    require __DIR__ . '/works.php';

  // ROUTE PAR DEFAUT
  // PATTERN: /
  // VUE: index
    Route::get('/', function () {
      return view('pages.home');
      })-> name('home');

  // PAGE CONTACT
  // PATTERN: /contact
  // VUE: contact
    Route::get('/contact', function () {
      return view('pages.contact');
    })-> name('contact');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
