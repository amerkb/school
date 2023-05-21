<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    protected $guarded=[];
    use HasFactory;
    public function user()
    {
        return $this->morphTo();
    }

    public function messages()
    {
        return $this->belongsTo(Message::class,"message_id");
    }

}
