<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session; 

class AuthController extends Controller
{
    public function registrationpage()
    {
        return view('registration');
    }
    public function adduser(request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if ($res)
        {
            return back()->with('success', 'You have Registered Successfully ');
        }
        else
        {
            return back()->with('fail','Something wrong');
        }
    }
    public function loginpage()
    {
        return view('login');
    }
    public function logincheck(request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12',
        ]);
        $user = User::where('email','=',$request->email)->first();
        if($user)
        {
            if(Hash::check($request->password, $user->password))
            {
                $request->session()->put('loginId',$user->id);
                return redirect('/dashboard'); 
            } 
            else
            {
                return back()->with('fail','Passowrd is Invalid');
            }
        }
        else
        {
            return back()->with('fail','This Email is not Registered');
        }
    }
    public function dashboardpage()
    {
        $data= array();
        if(Session::has('loginId'))
        {
            $data= User::where('id','=', Session::has('loginId'))->first();
        }
        return view('dashboard',compact('data'));
    }
    public function logout()
    {
       if(Session::has('loginId'))
       {
        Session::pull('loginId');
        return redirect('login');
       } 
    }
}
