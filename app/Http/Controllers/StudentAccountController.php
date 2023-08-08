<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\StudentAccount;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class StudentAccountController extends Controller
{

public function  account_statement ($id){
   $data["fees"]=StudentAccount::where("student_id",$id)->get();
   $data["student"]=Student::where("id",$id)->first();
   return view("pages.Students.show_account",$data);
}
    public function  account_statement_teacher ($id){
        $data["fees"]=StudentAccount::where("teachers_id",$id)->get();
        $data["student"]=Teacher::where("id",$id)->first();
        return view("pages.Teachers.show_account_teacher",$data);
    }
    public function  account_statement_user ($id){
        $data["fees"]=StudentAccount::where("user_id",$id)->get();
        $data["student"]=User::where("id",$id)->first();
        return view("pages.School_oriented.show_account_user",$data);
    }

}
