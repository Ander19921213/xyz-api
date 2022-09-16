<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;


    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'external_id', 'id')->where('type', 'building');
    }
}
