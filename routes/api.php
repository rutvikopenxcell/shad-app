<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

// Route::middleware('auth:api')->group(function () {
//     Route::resource('posts', AuthController::class);
// });

Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'register');
    Route::get('/profile', 'profileEdit');
    Route::post('/login', 'login');
});
