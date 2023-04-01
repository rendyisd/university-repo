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
Route::get('/approvement', [App\Http\Controllers\ApprovementController::class, 'index'])
    ->middleware('role:Admin')
    ->name('approvement');
Route::get('/deposit', [App\Http\Controllers\DepositController::class, 'index'])->name('deposit');
Route::get('/pending', [App\Http\Controllers\PendingController::class, 'index'])->name('pending');

