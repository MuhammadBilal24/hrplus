<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LocalController;
use App\Http\Controllers\AuthController;

// Default
Route::get('/',[AuthController::class,'loginpage'])->middleware('alreadyloggedin');

// Signup
Route::get('/registration',[AuthController::class,'registrationpage'])->middleware('alreadyloggedin');
Route::post('/newUser/regiteration',[AuthController::class,'adduser']);

// lOGIN
Route::get('/login',[AuthController::class,'loginpage'])->middleware('alreadyloggedin');
Route::post('/user/checking',[AuthController::class,'logincheck']);
Route::get('/logout',[AuthController::class,'logout']);

// Dashboard
Route::get('/dashboard',[AuthController::class,'dashboardpage'])->middleware('isloggedin');

// Employees
Route::get('/employees',[LocalController::class,'employeespage'])->middleware('isloggedin');
Route::post('/add/employee/',[LocalController::class,'insertemployee']);