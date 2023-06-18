<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LocalController extends Controller
{
    public function dashboardpage()
    {
        return view('dashboard');
    }
    // Employees
    public function employeespage()
    {
        $employees=DB::table('employees')->get();
        return view('employees',['employees'=>$employees]);
    }
    // 
    public function insertemployee(request $request)
    {
        $data=[
            'name_employee'=>$request->input('name_employee'),
            'designation'=>$request->input('designation'),
            'status_employee'=>$request->input('status_employee'),
        ];
        DB::table('employees')->insert($data);
        return redirect('employees');
    }

}
