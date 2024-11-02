<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public $fillable = ['title', 'slug', 'image', 'text'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            cache()->forget('services');
        });

        static::updating(function ($model) {
            cache()->forget('services');

        });

        static::deleting(function ($model) {
            cache()->forget('services');

        });
    }

}
