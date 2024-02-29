<?php

namespace App\Http\Controllers;

use App\Models\GreenAction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
    public function profile(){
        return $this->show(Auth::user());
    }

    public function show(User $user){
        $greenActions = GreenAction::getAllAvailable();

        return view('users.show', compact('user', 'greenActions'));
    }
}
