<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Brand extends Model
{
    use HasFactory, Notifiable;
    public function models()
    {
        return $this->hasMany(Models::class);
    }
}
