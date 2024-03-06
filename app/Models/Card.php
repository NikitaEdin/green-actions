<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_number',
        'card_date',
        'card_cvc'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    
    public function getCardDisplay(){
        return substr($this->card_number, -4);
    }
}
