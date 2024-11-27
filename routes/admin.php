<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AgentsController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\PropertyPhotosController;
use App\Http\Controllers\Admin\ReviewsController;
use App\Models\Review;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('admin')->name('admin.')->middleware('auth', 'check_user')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('properties', PropertyController::class);
    Route::get('/admin/properties/search', [PropertyController::class, 'search'])->name('properties.search');

    Route::resource('property_photos', PropertyPhotosController::class);
    Route::resource('agents', AgentsController::class);
    Route::resource('reviews', ReviewsController::class);
});
