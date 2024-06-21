<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WebpageController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/profile', 'profileEdit');
        Route::get('/profile', 'profileEdit');
        Route::post('/profile/update', 'profileUpdate')->name('profile-update');
        Route::get('/contact', 'contactPage');
    });


    Route::controller(WebpageController::class)->group(function () {
        Route::get('/contact', 'contactPage');
    });
});
