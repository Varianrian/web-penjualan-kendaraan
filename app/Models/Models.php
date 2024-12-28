<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Models extends Model
{
    use HasFactory, Notifiable;
    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
