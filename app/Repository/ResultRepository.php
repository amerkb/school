<?php


namespace App\Repository;


use App\Models\Attendance;
use App\Models\Grade;
use App\Models\Result;
use App\Models\Student;
use App\Models\Teacher;

class ResultRepository implements ResultRepositoryInterface
{

    public function index()
    {
        $Grades = Grade::with(['Sections'])->get();
       // $list_Grades = Grade::all();
        $teachers = Teacher::all();
        return view('pages.Result.Sections',compact('Grades'/*,'list_Grades'*/,'teachers'));
    }

    public function show($id, $year,$id_se)
    {
        $d["students"] = Student::where([['section_id',$id],["academic_year",$year]])->get();
        $d["id_se"]=$id_se;
        $d["results"]=Result::where("quizzes_subject_id",$id_se)->get();
        return view('pages.Result.index',$d);
    }

    public function store($request)
    {
        try {

            foreach ($request->attendences as $studentid => $attendence) {

                if( $attendence == 'presence' ) {
                    $attendence_status = true;
                } else if( $attendence == 'absent' ){
                    $attendence_status = false;
                }

                Attendance::create([
                    'student_id'=> $studentid,
                    'grade_id'=> $request->grade_id,
                    'classroom_id'=> $request->classroom_id,
                    'section_id'=> $request->section_id,
                    'teacher_id'=> 1,
                    'attendence_date'=> date('Y-m-d'),
                    'attendence_status'=> $attendence_status
                ]);

            }

            toastr()->success(trans('messages.success'));
            return redirect()->back();

        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}