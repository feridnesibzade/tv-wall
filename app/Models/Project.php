<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    public $fillable = [
        'title',
        'images',
        'city_id',
        'description',
        'year',
    ];

    public $casts = [
        'images' => 'array'
    ];

    public function city()
    {
        return $this->BelongsTo(City::class, 'city_id');
    }

    public function wallMounts()
    {
        return $this->belongsToMany(WallMount::class, 'project_wall_mounts');
    }
}
