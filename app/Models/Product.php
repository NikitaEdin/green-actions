<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $attributes = [
        'title' => 'Default Product Name',
        'description' => '',
        'price' => 0,
        'img' => '',
        'is_available' => true,
    ];
}
