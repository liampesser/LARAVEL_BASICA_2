<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminWorks;

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
  // PATTERN: /admin/works
  // CTRL: AdminWorks
  // ACTION: index
    Route::get('/admin/works', [AdminWorks::class, 'index'])->middleware(['auth'])->name('admin.works.index');

  // AJOUT D'UN WORK : FORMULAIRE
  // PATTERN: /admin/works/add/form
  // CTRL: AdminWorks
  // ACTION: create
    Route::get('/admin/works/add/form', [AdminWorks::class, 'create'])->middleware(['auth'])->name('admin.works.create');

  // AJOUT D'UN WORK : INSERT
  // PATTERN: /admin/works/add/insert
  // CTRL: AdminWorks
  // ACTION: store
    Route::post('/admin/works/add/insert', [AdminWorks::class, 'store'])->middleware(['auth'])->name('admin.works.store');
