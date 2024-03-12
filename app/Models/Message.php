<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model {
    use HasFactory;

    protected $fillable = ['ticket_id', 'user_id', 'content'];

    public function ticket(){ return $this->belongsTo(Ticket::class); }

    public function getUser(){ return User::find($this->user_id); }
}
