<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function question()
    {
        return $this->hasMany(Question::class, 'lesson_id');
    }
}
