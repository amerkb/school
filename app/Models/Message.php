<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded=[];
    use HasFactory;

    public function user()
    {
        return $this->morphTo();
    }
    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }
    public function recipients()
    {
        return $this->hasMany(Recipient::class);
    }
}
