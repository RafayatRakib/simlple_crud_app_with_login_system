<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function login(){
        return view('pages.login');
    }//end method

    public function dashboard(){
        $employee = Employee::paginate(10);
        return view('pages.dashboard',compact('employee'));
    }// end method

    public function profile(){
        
    }//end method



}
