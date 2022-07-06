<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function register()
    {
        return view('register');
    }

    public function registerNow()
    {
        return view('register-now');
    }

    public function studentRegister()
    {
        return view('student.register');
    }

    public function expertRegister()
    {
        return view('expert.register');
    }

    public function enterpriseRegister()
    {
        return view('enterprise.register');
    }
}
