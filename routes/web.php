<?php

use App\Http\Controllers\blogsController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blogs', [blogsController::class, 'index'])->name('blogs.index');
Route::get('/blog/create', [blogsController::class, 'create'])->name('blogs.create');
Route::post('/blog/store', [blogsController::class, 'store'])->name('blogs.store');
