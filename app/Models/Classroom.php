<?php

namespace App\Models;

use App\Observers\ChatClassObserver;
use App\Observers\ClassroomObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected static function boot()
    {
        parent::boot();
        self::observe(ClassroomObserver::class);
        self::observe(ChatClassObserver::class);
    }
    //use HasTranslations;
   // public $translatable = ['Name_Class'];


    protected $table = 'Classrooms';
    public $timestamps = true;
    protected $fillable=['Name_Class','Grade_id',"Status"];


    // علاقة بين الصفوف المراحل الدراسية لجلب اسم المرحلة في جدول الصفوف

    public function Grades()
    {
        return $this->belongsTo('App\Models\Grade', 'Grade_id');
    }

    public function Sections()
    {
        return $this->hasMany('App\Models\Section', 'Class_id');
    }

}
