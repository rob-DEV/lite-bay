<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicAreaController extends Controller
{
    public function index(){
        return view('public.welcome');
    }

    public function signUp(){
        return view('public.sign-up');
    }
    public function signIn(){
        return view('public.sign-in');
    }

    public function requestPassword(){
        return view('public.request-new-password');
    }

}
