<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){ return view('auth.register');}


    public function store(){
        // Validate user inputs
        $validated = request()->validate([
            'username' => 'required|min:3|max:40|unique:users,username,not_regex:/\s+/',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:3'
        ], [
            'username.regex' => 'The :attribute cannot contain spaces.',
        ]);

        // Check for accepted terms
        if (!request()->has('termsCheckbox')) {
            return redirect()->back()->withInput()->withErrors(['termsCheckbox' => 'Please accept the terms and conditions.']);
        }

        // Create user and save to DB
        $user = User::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'permission_id' => 0
        ]);

        // Redirect
        return redirect()->route('register')->with('success', 'Account created!');
    }

    public function login(){ return view('auth.login');}

    public function authenticate(){
        // Validate
        $validated = request()->validate([
            'username' => 'required',
            'password' => 'required|min:3'
        ]); 
        $remember = request()->has('remember');

        // User exists?
        if(Auth::attempt($validated, $remember)){
            //  // Check if account is banned
            // if (Auth::user()->isDeactivated()) {
            //     Auth::logout();
            //     return redirect()->route('login')->withErrors(['auth' => 'Your account is deactivated.']);
            // }


            // Login
            request()->session()->regenerate();
            // Activate account
            Auth::user()->SetActive();
            return redirect()->route('profile') ->with('success', 'Login Successful!');
        }else{
            // Invalid cred, redirect with error message
            return redirect()->route('login')
            ->withErrors(['auth' => 'No matching user found with the provided email and password.']);
        }
    }

    public function logout(){
        // clear session & cookies
        auth()->logout();
        request()->session()->regenerateToken();
        // redirect to home
        return redirect()->route('home');
    }
}
