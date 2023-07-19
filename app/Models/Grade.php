<?php

namespace App\Models;

use App\Observers\GradeObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected static function boot()
    {
        parent::boot();
        self::observe(GradeObserver::class);
    }
    public $translatable = ['Name'];

    protected $fillable=['Name','Notes',"Status"];
    protected $table = 'Grades';
    public $timestamps = true;

    // علاقة المراحل الدراسية لجلب الاقسام المتعلقة بكل مرحلة

    public function Sections()
    {
        return $this->hasMany('App\Models\Section', 'Grade_id');
    }
    public function class()
    {
        return $this->hasMany(Classroom::class, 'Grade_id');
    }
}
