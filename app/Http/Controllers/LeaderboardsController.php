<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LeaderboardsController extends Controller {

    public function show(){
        // Top test
        $allUsers = User::all();
        $topTen = $allUsers->filter(function ($user){
            return $user->getGreenPoints() >= 1;
        });

        $topTen = $topTen->sortByDesc(function ($user) {
            return $user->getGreenPoints();
        });
        $topTen = $topTen->values()->take(10);

        // Stats - total users
        $stat_users = $allUsers->count();

        // Stats - total green points
        $stat_total = $allUsers->sum(function ($user) {
            return $user->getGreenPoints();
        });

        // Stats - total accounts with green status 
        $stat_totalStatus = $allUsers->sum(function ($user) {
            return $user->hasGreenStatus();
        });

        return view('information.leaderboards', compact('topTen', 'stat_users','stat_total', 'stat_totalStatus'));
    }

    public static function isUserInTop10($userId) {
        // Fetch the top 10 users
        $topUsers = User::all()->filter(function ($user){
            return $user->getGreenPoints() >= 1;
        });

        $topUsers = $topUsers->sortByDesc(function ($user) {
            return $user->getGreenPoints();
        });

        $topUsers = $topUsers->values()->take(10)->pluck('id')->toArray();

        // Check if the given user ID is in the top 10
        $position = array_search($userId, $topUsers);

        // Return the index position if the user is in the top 10, otherwise return -1
        return $position !== false ? $position + 1 : -1;
    }
    
}