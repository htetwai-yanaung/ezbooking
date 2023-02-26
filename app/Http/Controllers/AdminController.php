<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //admin login
    public function login(){
        return view('login');
    }

    //admin register
    public function register(){
        return view('register');
    }
}
