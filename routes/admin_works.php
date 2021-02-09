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

  // EDITION D'UN WORK : FORMULAIRE
  // PATTERN: /admin/works/edit/form/{work}
  // CTRL: AdminWorks
  // ACTION: edit
    Route::get('/admin/works/edit/form/{work}', [AdminWorks::class, 'edit'])->middleware(['auth'])->name('admin.works.edit');

  // EDITION D'UN WORK : UPDATE
  // PATTERN: /admin/works/edit/{work}
  // CTRL: AdminWorks
  // ACTION: update
    Route::put('/admin/works/edit/{work}', [AdminWorks::class, 'update'])->middleware(['auth'])->name('admin.works.update');

  // SUPPRESSION D'UN POST : DELETE
  // PATTERN: /admin/works/delete/{work}
  // CTRL: AdminWorks
  // ACTION: delete
    Route::delete('/admin/works/delete/{work}', [AdminWorks::class, 'destroy'])->middleware(['auth'])->name('admin.works.destroy');
