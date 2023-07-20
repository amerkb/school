<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Teacher extends Authenticatable implements JWTSubject
{
    use HasFactory;
    protected $guarded=[];
    // علاقة بين المعلمين والتخصصات لجلب اسم التخصص
    public function teacher_account()
    {
        return $this->hasMany('App\Models\StudentAccount', 'teachers_id');

    }
    public function specializations()
    {
        return $this->belongsTo('App\Models\Specialization', 'Specialization_id');
    }
    public function members ()
    {
        return $this->morphMany(Member::class, "user");
    }
    //messages of chat
    public function messages ()
    {
        return $this->morphMany(Message::class, "user");
    }

    // علاقة بين المعلمين والانواع لجلب جنس المعلم
    public function genders()
    {
        return $this->belongsTo('App\Models\Gender', 'Gender_id');
    }

// علاقة المعلمين مع الاقسام
    public function Sections()
    {
        return $this->belongsToMany('App\Models\Section','teacher_section');
    }
    public function lecture()
    {
        return $this->hasMany(Lecture::class, 'teacher_id');
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
