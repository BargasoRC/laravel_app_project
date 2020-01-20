<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NameController extends Controller
{
    function login(){
        return view('login');
    }

    function home(){
        return view('welcome');
    }

    function logout(){
        return view('login');
    }
}
