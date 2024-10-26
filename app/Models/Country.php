<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $fillable = ['title'];

    public function cities(){
        return $this->hasMany(City::class, 'country_id');
    }

}
