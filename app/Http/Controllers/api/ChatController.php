<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Member;
use App\Models\Recipient;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function get(){
       $c= Section::with("Teachers")->get();
       return $c;
    }
}
