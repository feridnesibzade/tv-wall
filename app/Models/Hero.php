<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    public $fillable = [
        'id',
        'title',
        'description',
        'background_image',
        'button_title',
        'button_link',
    ];
}
