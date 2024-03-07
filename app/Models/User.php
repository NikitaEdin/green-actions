<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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

    public function permission(){
        return $this->belongsTo(Permission::class);
    }

    // Associated card
    public function card(){ return $this->hasOne(Card::class); }
    public function getCard(){ return $this->card()->first(); }
    public function hasCard(){ return $this->card()->exists(); }


    public function displayName(){
        if($this->name){
            return $this->name;
        }else{
            return $this->username;
        }
    }

    public function displayNameFull(){
        if($this->name){
            return $this->name . ' (' . $this->username . ')';
        }else{
            return $this->username;
        }
    }

    public function isAdmin(){
        return $this->permission->permission_name === 'Admin';
    }

    public function getUserActions(){
        return $this->hasMany(UserAction::class)->orderBy('updated_at', 'desc');
    }

    public function getGreenPoints(){
        return $this->getUserActions()->sum('points');
    }

    public function hasGreenStatus(){
        return $this->getGreenPoints() >= 100;
    }

    public function hasFullDetails(){
        return isset($this->contact) && isset($this->number) && isset($this->bio);
    }
}
