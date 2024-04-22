<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'contact',
        'number',
        'bio',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    ////////// Database relationships //////////
    public function permission(){ return $this->belongsTo(Permission::class);}
    public function tickets(){ return $this->hasMany(Ticket::class);}
    public function subscriptions(){ return $this->hasMany(Subscription::class);}
    public function userpoints(){ return $this->hasMany(Userpoints::class);}

    ////////// Associated card //////////
    public function card(){ return $this->hasOne(Card::class); }
    public function getCard(){ return $this->card()->first(); }
    public function hasCard(){ return $this->card()->exists(); }

    // Subscriptions
    public function hasValidSubscription() {
        // Find first and latest subscription linked with User
        $latestSubscription = $this->subscriptions()->latest()->first();
    
        // Not subscription found
        if (!$latestSubscription) { return false; }
        // Subscription found - return true if dates are valid
        return $latestSubscription->isValid();
    }

    public function getValidSubscription() {
        $now = Carbon::now();
        
        return $this->subscriptions()
                    ->where('valid_from', '<=', $now)
                    ->where('valid_to', '>=', $now)
                    ->first();
    }
    

    // Get display name
    public function displayName(){
        // Prioritise user defined name over username
        if($this->name){
            return $this->name;
        }else{
            return $this->username;
        }
    }

    // Display full name, user defined name with username in brackets.
    public function displayNameFull(){
        if($this->name){
            return $this->name . ' (' . $this->username . ')';
        }else{
            return $this->username;
        }
    }

    // Returns true is User has Admin permission
    public function isAdmin(){
        return $this->permission->permission_name === 'Admin';
    }

    public function getUserActions(){
        return $this->hasMany(UserAction::class)->orderBy('updated_at', 'desc');
    }

    public function getUserPoints(){
        return $this->hasMany(Userpoints::class)->orderBy('updated_at', 'desc');
    }

    public function getUserPointSum(){
        return $this->getUserPoints()->sum('green_points');
    }

    public function getGreenPoints($clamp = true){
        if($clamp){
            return max(0, min(100, $this->getUserActions()->sum('points') + $this->getUserPoints()->sum('green_points')));
        }else{
            return $this->getUserActions()->sum('points') + $this->getUserPoints()->sum('green_points');
        }
    }

    // Returns true if User has 100 green points
    public function hasGreenStatus(){
        return $this->getGreenPoints() >= 100;
    }


    // Returns true if User has assigned profile details (contact details, contact number, bio)
    public function hasFullDetails(){
        return isset($this->contact) && isset($this->number) && isset($this->bio);
    }

    public function getTickets(){
        return Ticket::where('user_id', $this->id);
    }

    public function hasAward(){
        // if($this->getGreenPoints() >= 50){
        //     return true;
        // }

        return true; // all get an award
    }

    public function getAwardTitle(){
        if($this->getGreenPoints() >= 80){
            return "Gold Award";
        }else if($this->getGreenPoints() >= 60){
            return "Silver Award";
        }else{
            return "Bronze Award";
        }
    }

    public function getAwardImage(){
        if($this->getGreenPoints() >= 80){
            return "award_gold.png";
        }else if($this->getGreenPoints() >= 60){
            return "award_silver.png";
        }else{
            return "award_bronze.png";
        }
    }

    public function getAwardColour(){
        if($this->getGreenPoints() >= 80){
            return "gold";
        }else if($this->getGreenPoints() >= 60){
            return "lightgray";
        }else{
            return "darkgoldenrod";
        }
    }
}
