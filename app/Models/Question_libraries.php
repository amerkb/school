<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question_libraries extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'Classroom_id');
    }
    public function quizze()
    {
        return $this->belongsTo(Quizze::class, 'quizze_id');
    }
    public function se()
    {
        return $this->belongsTo(SubjectExam::class, 'quizzes_subject_id');
    }
    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id');
    }

}
