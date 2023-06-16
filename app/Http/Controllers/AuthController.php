<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registrationpage()
    {
        return view('registration');
    }
    public function loginpage()
    {
        return view('login');
    }
}
