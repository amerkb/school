<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function se()
    {
        return $this->belongsTo(SubjectExam::class, 'quizzes_subject_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
