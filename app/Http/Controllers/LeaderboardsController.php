<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LeaderboardsController extends Controller {

    const REMOVE_BANNED = true;


    public function show(){
        // Get all users
        $allUsers = User::all();
        // Get users with at least 1 green points
        $topTen = $allUsers->filter(function ($user){
            return $user->getGreenPoints() >= 1 && (!self::REMOVE_BANNED || !$user->isDeactivated());
        });
        // Sort by desc
        $topTen = $topTen->sortByDesc(function ($user) {
            return $user->getGreenPoints();
        });
        // Get first 10
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

    // Return true if given userID is in top10 of leaderboards
    public static function isUserInTop10($userId) {
        // Fetch the top 10 users
        $topUsers = User::all()->filter(function ($user){
            return $user->getGreenPoints() >= 1  && (!self::REMOVE_BANNED || !$user->isDeactivated());
        });

        $topUsers = $topUsers->sortByDesc(function ($user) {
            return $user->getGreenPoints();
        });

        $topUsers = $topUsers->values()->take(10)->pluck('id')->toArray();

        // Check if the given user ID is in the top 10
        $userPosition = array_search($userId, $topUsers);

        // Return the index position if the user is in the top 10, otherwise return -1
        return $userPosition !== false ? $userPosition + 1 : -1;
    }
    
}
