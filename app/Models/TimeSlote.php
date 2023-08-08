<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSlote extends Model
{
    protected $guarded=[];
    protected $table="time_slots";

    use HasFactory;
    public function lecture()
    {
        return $this->hasMany(Lecture::class, 'ts_id');
    }
}
