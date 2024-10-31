<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{
    public $fillable = ['zip_code'];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

}
