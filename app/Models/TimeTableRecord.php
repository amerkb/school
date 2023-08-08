<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeTableRecord extends Model
{
    
    protected $guarded=[];
    use HasFactory;
    public function grades()
    {
        return $this->belongsTo(Grade::class, 'Grade_id');
    }

    public function classrooms()
    {
        return $this->belongsTo(Classroom::class , 'classroom_id');
    }

    public function sections()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
    public function lecture()
    {
        return $this->hasMany(Lecture::class, 'ttr_id');
    }
    public  function getSemesterAttribute($val){
        return   $val==1?"the first semester":"the second semester";
    }
}
