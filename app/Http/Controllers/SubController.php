<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubController extends Controller {
    // Show subscription view, and pass User object into view
    public function show(){
        $user = Auth::user();
        return view('subscription.show', compact('user'));
    }
}
