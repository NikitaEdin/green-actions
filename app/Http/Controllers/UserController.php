<?php

namespace App\Http\Controllers;
use App\Models\GreenAction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
    // Show user dashboard/profile
    public function profile(){
        return $this->show(Auth::user());
    }

    // Show user profile with given User object
    public function show(User $user){
        // Get user GreenActions and their position in the competition
        $greenActions = GreenAction::getAllAvailable();
        $compPos = LeaderboardsController::isUserInTop10($user->id);
        // Display users view, and pass parameters to display
        return view('users.show', compact('user', 'greenActions', 'compPos'));
    }

    public function updateDetails(){
        return view('users.edit-details');
    }

    public function award(){
        return view('award.show');
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
        $compPos = LeaderboardsController::isUserInTop10($user->id);
        return view('users.show-user', compact('user', 'compPos'));
    }
}
