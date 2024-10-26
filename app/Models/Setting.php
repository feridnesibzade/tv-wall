<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['phone', 'logo', 'social_medias'] ;

    protected static function booted(){
        static::retrieved(function ($setting) {
            if (is_string($setting->social_medias)) {
                $setting->social_medias = json_decode($setting->social_medias, true);
            }
        });
    }
}
