<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentsRequest;
use App\Models\Section;
use App\Models\Setting;
use App\Models\Student;
use App\Models\TimeTableRecord;
use App\Repository\StudentRepositoryInterface;
use App\Traits\GeneralTrait;
use App\Transformers\StudentTransformer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    protected $Student;
    public function __construct(StudentRepositoryInterface $Student)
    {
        $this->Student = $Student;
    }

    public function index()
    {
        return $this->Student->Get_Student();
    }

    public function edit($id)
    {
        return $this->Student->Edit_Student($id);
    }

    public function update(StoreStudentsRequest $request, $id)
    {
        return $this->Student->Update_Student($request);
    }

    public function create()
    {
        return $this->Student->Create_Student();
    }
    public function Get_classrooms($id)
    {
        return $this->Student->Get_classrooms($id);
    }

    public function Get_Sections($id)
    {
        return $this->Student->Get_Sections($id);
    }

    public function Store_Student(StoreStudentsRequest $request)
    {
        return $this->Student->Store_Student($request);
    }


    public function show($id)
    {

        return $this->Student->Show_Student($id);
    }


    public function destroy(Request $request)
    {
        return $this->Student->Delete_Student($request);
    }

    public function Upload_attachment(Request $request)
    {
        return $this->Student->Upload_attachment($request);
    }

    public function Download_attachment($studentsname, $filename)
    {
        return $this->Student->Download_attachment($studentsname, $filename);
    }

    public function Delete_attachment(Request $request)
    {
        return $this->Student->Delete_attachment($request);
    }
    use GeneralTrait;
    public function get_student(Request $request)
    {
        try {

            $id_teacher=Auth::guard($request->role)->id();
            $year=Setting::where("key", "current_session")->pluck("value")[0];
            $id_sections= TimeTableRecord::whereHas("lecture",function($q) use($id_teacher){
                $q->where("teacher_id",$id_teacher);
            })->where("year",$year)->pluck("section_id");
            $students=Student::where("academic_year",$year)->whereIn('section_id',$id_sections)->get();
            $lessonTransfermer=[];
            foreach ($students as $index=> $student){
                $lessonTransfermer[$index] = fractal($student, new StudentTransformer())->toArray();
                $lessonTransfermer[$index]= $lessonTransfermer[$index]["data"];
            }
            return $this ->returnData("students" ,$lessonTransfermer,"count_students",$students->count());

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
