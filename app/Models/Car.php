<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Car extends Model
{
    use HasFactory, Notifiable;
    public function model()
    {
        return $this->belongsTo(Models::class);
    }
    public function sales()
    {
        return $this->hasMany(SaleHistory::class);
    }
}
