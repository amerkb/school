<?php

namespace App\Models;

use App\Observers\ChatSectionObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected static function boot()
    {
        parent::boot();
        self::observe(ChatSectionObserver::class);
    }
    use HasFactory;
    protected $fillable=['Name_Secion','Status', 'Grade_id', 'Class_id'];

    // علاقة بين الاقسام والصفوف لجلب اسم الصف في جدول الاقسام

    public function My_classs()
    {
        return $this->belongsTo('App\Models\Classroom', 'Class_id');
    }

    // علاقة الاقسام مع المعلمين
    public function teachers()
    {
        return $this->belongsToMany('App\Models\Teacher','teacher_section');
    }

}
