<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public $fillable = ['title', 'description', 'cover', 'images', 'slug'];

    public $casts = [
        'images' => 'array'
    ];

}
