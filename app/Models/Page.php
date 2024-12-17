<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public $fillable = ['url', 'title', 'description', 'tags'];

    public $casts = [
        'tags' => 'array'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            cache()->flush();
        });

        static::updating(function ($model) {
            cache()->flush();

        });

        static::deleting(function ($model) {
            cache()->flush();
        });
    }
}
