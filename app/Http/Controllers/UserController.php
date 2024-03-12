<?php

namespace App\Http\Controllers;

use App\Models\GreenAction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
    public function profile(){
        return $this->show(Auth::user());
    }

    public function show(User $user){
        $greenActions = GreenAction::getAllAvailable();

        return view('users.show', compact('user', 'greenActions'));
    }

    public function updateDetails(){
        return view('users.edit-details');
    }

    public function update(){
        // validate
        $validated = request()->validate([
            'displayname' => 'nullable|min:3|max:32',
            'contact' => 'nullable|min:3|max:32',
            'number' => 'nullable|min:3|max:15',
            'bio' => 'nullable|min:2|max:125'
        ]); 

        // Update user with new parameters
        $user = Auth::user();
        $user->update([
            'name' => request('displayname'),
            'contact' => request('contact'),
            'number' => request('number'),
            'bio' => request('bio'),
        ]);
       
        // Successfully updated
        return redirect()->route('profile')->with('success', 'Detailed Updated!');
       
    }

    public function showUser($id){
        $user = User::findOrFail($id);
        return view('users.show-user', compact('user'));
    }
}
