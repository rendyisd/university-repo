<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// These are temporary
Route::get('/metadata', [App\Http\Controllers\MetadataController::class, 'index'])->name('metadata');
Route::get('/browse', [App\Http\Controllers\BrowseController::class, 'index'])->name('browse');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::get('/deposit', [App\Http\Controllers\DepositController::class, 'index'])->name('deposit');

