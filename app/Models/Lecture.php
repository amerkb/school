<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $table="lectures";
    protected $guarded=[];
    use HasFactory;
    public function timeslot()
    {
        return $this->belongsTo(TimeSlote::class, 'ts_id');
    }
//    ttr=time table record
    public function ttr()
    {
        return $this->belongsTo(TimeTableRecord::class, 'ttr_id');
    }
    public function day()
    {
        return $this->belongsTo(Day::class, 'day_id');
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
    public function ts()
    {
        return $this->belongsTo(TimeSlote::class, 'ts_id');
    }
}
