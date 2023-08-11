<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeachers;
use App\Http\Requests\TeacherRequest;
use App\Models\Gender;
use App\Models\MyParent;
use App\Models\Section;
use App\Models\Specialization;
use App\Models\Student;
use App\Models\Teacher;
use App\Traits\GeneralTrait;
use App\Transformers\TeacherTransformer;
use Illuminate\Http\Request;
use App\Repository\TeacherRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
   use GeneralTrait;
    protected $Teacher;
    public function __construct(TeacherRepositoryInterface $Teacher)
    {
        $this->Teacher = $Teacher;
    }
    public function index()
    {
        $Teachers = $this->Teacher->getAllTeachers();
        return view('pages.Teachers.Teachers', compact('Teachers'));
    }

    public function create()
    {
        $specializations = $this->Teacher->Getspecialization();
        $genders = $this->Teacher->GetGender();
        return view('pages.Teachers.create', compact('specializations', 'genders'));
    }

    public function store(TeacherRequest $request)
    {
        return $this->Teacher->StoreTeachers($request);
    }

    public function edit($id)
    {
        $Teachers = $this->Teacher->editTeachers($id);
        $specializations = $this->Teacher->Getspecialization();
        $genders = $this->Teacher->GetGender();
        return view('pages.Teachers.Edit',compact('Teachers','specializations','genders'));
    }

    public function update(TeacherRequest $request) {
        return $this->Teacher->UpdateTeachers($request);
    }

    public function destroy(Request $request)
    {
        return $this->Teacher->DeleteTeachers($request);
    }
    public function get_teachers_for_student(Request $request)
    {
        try {
            if($request->role=="student"){
                $student= Student::find(Auth::guard($request->role)->id());
                $section=Section::with("teachers")->find( $student->section_id);

                $TeacherTransfermer=[];
                foreach ($section->teachers as $index=> $teacher){
                    $TeacherTransfermer[$index] = fractal($teacher, new TeacherTransformer())->toArray();
                    $TeacherTransfermer[$index]= $TeacherTransfermer[$index]["data"];
                }
                return $this->returnData("teachers" ,$TeacherTransfermer,"count_teacher",$section->teachers->count());
            }

        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function get_teachers_for_parent(Request $request)
    {
        try {
            if($request->role=="parent"){
                $student= Student::find($request->IdStudent);
                $section=Section::with("teachers")->find( $student->section_id);

                $TeacherTransfermer=[];
                foreach ($section->teachers as $index=> $teacher){
                    $TeacherTransfermer[$index] = fractal($teacher, new TeacherTransformer())->toArray();
                    $TeacherTransfermer[$index]= $TeacherTransfermer[$index]["data"];
                }
                return $this->returnData("teachers" ,$TeacherTransfermer,"count_teacher",$section->teachers->count());
            }

        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}