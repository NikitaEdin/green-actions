<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GreenAction extends Model
{
    use HasFactory;

    protected $table = 'greenactions';

    protected $fillable = [
        'action_name',
        'action_description',
        'isActive',
    ];

    public static function getAll()
    {
        return static::all();
    }

    public static function getAllAvailable()
    {
        return static::where('isActive', true)->get();
    }
}
