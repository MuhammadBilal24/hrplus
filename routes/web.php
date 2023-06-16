<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LocalController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('login');
});
// lOGIN
Route::get('/registration',[AuthController::class,'registrationpage']);
Route::get('/login',[AuthController::class,'loginpage']);

// Dashboard
Route::get('/dashboard',[LocalController::class,'dashboardpage']);
