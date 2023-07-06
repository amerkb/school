<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quizze extends Model
{

    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher', 'teacher_id');
    }
    public function results()
    {
        return $this->hasManyThrough(
            Result::class,
            SubjectExam::class,
            'quizze_id',
            'quizzes_subject_id',
        );
    }

    public function Type()
    {
        return $this->belongsTo(Type_Exam::class, 'type_exam_id');
    }
    public function se()
    {
        return $this->hasMany(SubjectExam::class, 'quizze_id');
    }




    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id');
    }
    public  function getSemesterAttribute($val){
        return   $val==1?"the first semester":"the second semester";
    }
}
