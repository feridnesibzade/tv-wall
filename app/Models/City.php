<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $fillable = ['city', 'slug', 'country_id', 'title', 'image', 'description', 'detail', 'zip_code'];

    protected $casts = [
        'detail' => 'array',
    ];

    protected static function booted()
    {
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
    }
}
