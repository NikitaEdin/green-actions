<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'valid_from',
        'valid_to',
        'paid_amount'
    ];


    public function isValid() {
        $currentDate = Carbon::now();
        return $currentDate->isBetween($this->valid_from, $this->valid_to);
    }

}
