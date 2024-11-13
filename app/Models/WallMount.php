<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WallMount extends Model
{
    protected $fillable = ['title', 'image', 'prices'];

    public $casts = [
        'prices' => 'array'
    ];

}
