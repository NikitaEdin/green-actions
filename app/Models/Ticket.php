<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'is_open'
    ];


    public function messages(){
        return $this->hasMany(Message::class);
    }

    public function getUser(){ return User::find($this->user_id); }


}
