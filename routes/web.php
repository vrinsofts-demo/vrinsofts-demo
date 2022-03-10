<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [BlogController::class, 'index']);
Route::get('/', [BlogController::class, 'index'])->name('admin.blog');
Route::get('/blog/create', [BlogController::class, 'create'])->name('admin.create');
Route::post('/blog/store', [BlogController::class, 'store'])->name('admin.blog.store');
Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('admin.edit');
Route::post('/blog/update/{id}', [BlogController::class, 'update'])->name('admin.blog.update');
Route::get('/blog/show/{id}', [BlogController::class, 'show'])->name('admin.show');
Route::get('/blog/delete', [BlogController::class, 'destroy']);
Route::post('/tag/add', [BlogController::class, 'tag_add']);