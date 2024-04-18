<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    // show forget password view
    public function show(){ return view('auth.forgot-password');}
}
