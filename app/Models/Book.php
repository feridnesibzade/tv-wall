<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'zip_code',
        'city_id',
        'tv_size_id',
        'wall_mount_id',
        'wall_type_id',
        'extra_service_id',
        'lift_assistance',
        'lift_assistance_title',
        'date',
        'time',
        'address',
        'address_detail',
        'fullname',
        'phone',
        'email',
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function wallMount()
    {
        return $this->belongsTo(WallMount::class, 'wall_mount_id');
    }

    public function tvSize()
    {
        return $this->belongsTo(TvSize::class, 'tv_size_id');
    }

    public function wallType()
    {
        return $this->belongsTo(WallType::class, 'wall_type_id');
    }

    public function extraService()
    {
        return $this->belongsTo(ExtraService::class, 'extra_service_id');
    }

}
