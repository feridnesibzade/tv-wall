<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $fillable = ['title'];


    protected static function booted()
    {
        parent::boot();

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

    public function cities()
    {
        return $this->hasMany(City::class, 'country_id');
    }

}
