<?php

use App\Http\Controllers\AuthenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->controller(AuthenticationController::class)->group(function() {
    Route::post('register' , 'register');
    Route::post('login' , 'login');
    Route::post('reset-password' , 'resetpassword');
});
