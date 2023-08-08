<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class MyParent extends Authenticatable implements JWTSubject
{
    use HasFactory;
    protected $guarded=[];
    public function members ()
    {
        return $this->morphMany(Member::class, "user");
    }
    //messages of chat
    public function messages ()
    {
        return $this->morphMany(Message::class, "user");
    }
    public function children ()
    {
        return $this->hasMany(Student::class,"parent_id");
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
