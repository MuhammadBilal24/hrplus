<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LocalController;
use App\Http\Controllers\AuthController;

// Default
Route::get('/',[AuthController::class,'loginpage']);
// lOGIN
Route::get('/registration',[AuthController::class,'registrationpage']);
Route::get('/login',[AuthController::class,'loginpage']);

// Dashboard
Route::get('/dashboard',[LocalController::class,'dashboardpage']);

// Employees
Route::get('/employees',[LocalController::class,'employeespage']);
Route::post('/add/employee/',[LocalController::class,'insertemployee']);