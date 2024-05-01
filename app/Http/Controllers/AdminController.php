<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use App\Models\UserAction;

class AdminController extends Controller {
    public function show(){
        $stat_totalAccounts = 0;
        $stat_totalGreenPoints = 1;
        $stat_totalGreenAccounts = 2;
        $stat_totalDonations = 3;

        // Get all users
        $allUsers = User::all();
        $stat_totalAccounts = $allUsers->count();

        // Stats - total green points
        $stat_totalGreenPoints = $allUsers->sum(function ($user) {
            return $user->getGreenPoints();
        });

        // Stats - total accounts with green status 
        $stat_totalGreenAccounts = $allUsers->sum(function ($user) {
            return $user->hasGreenStatus();
        });

        // Stats - get all donations
        $stat_totalDonations = '£' . Transaction::where('name', 'Donation')
            ->get() ->sum(function ($transaction) {
                return $transaction->quantity * ShopController::donation_price;
            });


        return view('admin.show', 
            compact(
            'stat_totalAccounts', 
            'stat_totalGreenPoints',
            'stat_totalGreenAccounts',
            'stat_totalDonations'));
    }

    public function resetGreenActions(){
        // Remove all records
        UserAction::truncate();

        return redirect()->route('admin') ->with('success', 'All user green-actions has been obliterated!');
    }
}
