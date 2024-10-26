<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    public $fillable = ['name', 'avatar', 'logo', 'description'];
}
