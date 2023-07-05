<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectExam extends Model
{
    use HasFactory;
    protected $table="quizzes_subject";
    protected $guarded=[];

    public function timeslot()
    {
        return $this->belongsTo(TimeSlote::class, 'ts_id');
    }
    public function quizze()
    {
        return $this->belongsTo(Quizze::class, 'quizze_id');
    }
    public function subject()
    {
        return $this->belongsTo('App\Models\Subject', 'subject_id');
    }
    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id');
    }


    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'classroom_id');
    }



}
