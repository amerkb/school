<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function last_message()
    {
        return $this->belongsTo(Message::class,"message_id")
            ->whereNull("deleted_at")
            ->withDefault([
                'body' => 'Message deleted'
            ]);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function members()
    {
        return $this->hasMany(Member::class);

    }

}
