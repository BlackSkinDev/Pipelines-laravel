<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|------------------------------------------ --------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\ProductController::class,'index'])->name('index');
Route::post('/filter', [App\Http\Controllers\ProductController::class,'filter'])->name('filter');
Route::post('/reset', [App\Http\Controllers\ProductController::class,'reset'])->name('reset');
