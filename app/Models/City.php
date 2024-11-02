<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $fillable = ['city', 'slug', 'country_id', 'title', 'description', 'detail'];

    protected $casts = [
        'detail' => 'array',
        // 'zip_code' => 'array',
    ];

    protected static function booted()
    {
        parent::boot();

        // Handle encoding before saving to the database
        static::saving(function ($city) {
            if (is_array($city->detail)) {
                $city->slug = \Str::slug($city->title);
            }
        });
        // Handle decoding after retrieving from the database
        static::retrieved(function ($city) {
            if (is_string($city->detail)) {
                $city->detail = json_decode($city->detail, true);
            }
        });


        // static::retrieved(function ($setting) {
        //     if (is_string($setting->social_medias)) {
        //         $setting->social_medias = json_decode($setting->social_medias, true);
        //     }
        // });

        static::creating(function ($model) {
            cache()->forget('locations');

        });

        static::updating(function ($model) {
            cache()->forget('locations');
        });

        static::deleting(function ($model) {
            cache()->forget('locations');
        });

    }

    public function zipCodes()
    {
        return $this->hasMany(ZipCode::class, 'city_id', 'id');
    }

}
