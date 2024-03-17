<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userpoints extends Model
{
    use HasFactory;

    protected $illable = [
        'user_id',
        'green_points'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getUser(){ return $this->user()->first();}
}
