<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $guarded=[];
    use HasFactory;
    public function trips()
    {
        return $this->hasMany(Trip::class, 'bus_id');
    }

}
