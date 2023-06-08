<?php

namespace App\Models;

use App\Observers\ChatStudentObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;

class Student  extends Authenticatable implements JWTSubject
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];
    protected static function boot()
    {
        parent::boot();
        self::observe(ChatStudentObserver::class);
    }
        // علاقة بين الطلاب والانواع لجلب اسم النوع في جدول الطلاب

        public function gender()
        {
            return $this->belongsTo('App\Models\Gender', 'gender_id');
        }

        // علاقة بين الطلاب والمراحل الدراسية لجلب اسم المرحلة في جدول الطلاب

        public function grade()
        {
            return $this->belongsTo('App\Models\Grade', 'Grade_id');
        }


        // علاقة بين الطلاب الصفوف الدراسية لجلب اسم الصف في جدول الطلاب

        public function classroom()
        {
            return $this->belongsTo('App\Models\Classroom', 'Classroom_id');
        }

        // علاقة بين الطلاب الاقسام الدراسية لجلب اسم القسم  في جدول الطلاب

        public function section()
        {
            return $this->belongsTo('App\Models\Section', 'section_id');
        }


        // علاقة بين الطلاب والصور لجلب اسم الصور  في جدول الطلاب
        public function images()
        {
            return $this->morphMany('App\Models\Image', 'imageable');
        }
    //members of chat
    public function members ()
    {
        return $this->morphMany(Member::class, "user");
    }
    //messages of chat
    public function messages ()
    {
        return $this->morphMany(Message::class, "user");
    }

        // علاقة بين الطلاب والجنسيات  لجلب اسم الجنسية  في جدول الجنسيات

        public function Nationality()
        {
            return $this->belongsTo('App\Models\Nationalitie', 'nationalitie_id');
        }


        // علاقة بين الطلاب والاباء لجلب اسم الاب في جدول الاباء

        public function myparent()
        {
            return $this->belongsTo('App\Models\MyParent', 'parent_id');
        }

        // علاقة بين جدول سدادت الطلاب وجدول الطلاب لجلب اجمالي المدفوعات والمتبقي
        public function student_account()
        {
            return $this->hasMany('App\Models\StudentAccount', 'student_id');

        }

   // علاقة بين جدول الطلاب وجدول الحضور والغياب
        public function attendance()
        {
            return $this->hasMany('App\Models\Attendance', 'student_id');
        }
    public function parent()
    {
        return $this->belongsTo(MyParent::class);
    }


    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier() {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }
}
