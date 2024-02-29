<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAction extends Model
{
    use HasFactory;

    protected $table = 'useractions';

    protected $fillable = [
        'user_id',
        'greenaction_id',
        'points',
    ];

    public function getGreenAction(){
        return $this->belongsTo(GreenAction::class, 'greenaction_id');
    }
}
