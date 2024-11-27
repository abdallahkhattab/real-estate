<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Site\SiteController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('site')->name('site.')->group(function () {
    Route::get('/',[SiteController::class,'index'])->name('index');
    Route::get('/properties',[SiteController::class,'properties'])->name('properties');
    Route::get('/search-properties',[SiteController::class,'search_properties'])->name('search_properties');
    Route::get('properties/{id}', [SiteController::class, 'show'])->name('show');
    Route::get('/agents',[SiteController::class,'agents'])->name('agents');
    Route::get('/contact-us',[SiteController::class,'contact_us'])->name('contact_us');
    Route::post('/send', [SiteController::class, 'send'])->name('send');
});
