<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function day()
    {
        return $this->belongsTo(Day::class, 'day_id');
    }
    public function ts()
    {
        return $this->belongsTo(TimeSlote::class, 'ts_id');
    }
    public function driver()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
