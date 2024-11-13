<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class Translate extends Model
{
    public $fillable = ['text', 'key'];


    protected static function booted()
    {

        static::creating(function ($model) {
            Cache::forget('translates');
            Artisan::call('view:clear');
        });

        static::updating(function ($model) {
            Cache::forget('translates');
            Artisan::call('view:clear');
        });

        static::deleting(function ($model) {
            Cache::forget('translates');
            Artisan::call('view:clear');
        });

        static::saved(function ($model) {
            Cache::forget('translates');
            Artisan::call('view:clear');
        });

        static::deleted(function ($model) {
            Cache::forget('translates');
            Artisan::call('view:clear');
        });
    }

}
