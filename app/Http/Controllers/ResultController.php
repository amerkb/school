<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function grade(){
         $data["grades"]=Grade::all();
        return view("grade",$data);
    }
    public function class($id_grade){
        $data["classes"]=Classroom::where("Grade_id",$id_grade)->get();
        return view("class",$data);
    }
    public function section($id_class){
        $data["sections"]=Section::where("Class_id",$id_class)->get();
        return view("section",$data);
    }
    public function index(){
        $data["students"]=Student::all();
        return view("pages.results.index",$data);
    }
}
