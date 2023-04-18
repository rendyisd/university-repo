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
Route::get('/metadata/accepted', [App\Http\Controllers\MetadataController::class, 'index'])->name('metadata.accepted');
Route::get('/metadata/pending', [App\Http\Controllers\MetadataController::class, 'index'])
    ->middleware('pending')
    ->name('metadata.pending');

Route::get('/search', [App\Http\Controllers\SearchController::class, 'homeSearch'])->name('home.search');

Route::get('/browse/faculty', [App\Http\Controllers\SearchController::class, 'facultyView'])->name('browse.faculty');
Route::get('/browse/faculty/{faculty}', [App\Http\Controllers\SearchController::class, 'facultyBrowse'])->name('browse.faculty.get');

Route::get('/browse/year', [App\Http\Controllers\SearchController::class, 'yearView'])->name('browse.year');
Route::get('/browse/year/{year}', [App\Http\Controllers\SearchController::class, 'yearBrowse'])->name('browse.year.get');

Route::get('/browse/type', [App\Http\Controllers\SearchController::class, 'typeView'])->name('browse.type');
Route::get('/browse/type/{type}', [App\Http\Controllers\SearchController::class, 'typeBrowse'])->name('browse.type.get');

Route::get('/doc-control', [\App\Http\Controllers\DocumentController::class, 'documentControlView'])
    ->middleware('role:Admin')
    ->name('docControl');
Route::delete('/doc-control/delete', [\App\Http\Controllers\DocumentController::class, 'deleteDocument'])
    ->middleware('role:Admin')
    ->name('docControl.delete');
Route::get('/doc-control/edit', [\App\Http\Controllers\DocumentController::class, 'editView'])
    ->middleware('role:Admin')
    ->name('edit');
Route::post('/doc-control/edit/submit', [\App\Http\Controllers\DocumentController::class, 'editSubmit'])
    ->middleware('role:Admin')
    ->name('docControl.edit');

Route::get('/approvement', [App\Http\Controllers\ApprovementController::class, 'index'])
    ->middleware('role:Admin')
    ->name('approvement');

Route::post('/approvement/decision', [App\Http\Controllers\DocumentController::class, 'approveDecision'])
    ->middleware('role:Admin')
    ->name('approveDecision');

Route::get('/deposit', [App\Http\Controllers\DepositController::class, 'index'])
    ->middleware('auth')
    ->name('deposit');

Route::post('/deposit/submit', [App\Http\Controllers\DepositController::class, 'depositSubmit'])
    ->middleware('auth')
    ->name('depositSubmit');

Route::get('/your-document', [App\Http\Controllers\YourDocumentController::class, 'index'])
    ->middleware('auth')
    ->name('your_document');

Route::get('/docs/pending/{filename}', [App\http\Controllers\DocumentController::class, 'pending'])
    ->middleware('pending')
    ->name('pending');

Route::get('/docs/accepted/{filename}', [App\http\Controllers\DocumentController::class, 'accepted'])
    ->name('accepted');