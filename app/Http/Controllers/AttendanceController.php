<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\MyParent;
use App\Models\Student;
use App\Repository\AttendanceRepositoryInterface;
use App\Traits\GeneralTrait;
use App\Transformers\AttendanceTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    use GeneralTrait;
    protected $Attendance;

    public function __construct(AttendanceRepositoryInterface $Attendance)
    {
        $this->Attendance = $Attendance;
    }

    
    public function index()
    {
        return $this->Attendance->index();
    }

    public function store(Request $request)
    {
        return $this->Attendance->store($request);
    }


    public function show($id)
    {
        return $this->Attendance->show($id);
    }
    public function get_attendance_for_student(Request $request)
    {
        try {
            if($request->role=="student"){
               $attendances= Attendance::where("student_id",Auth::guard($request->role)->id())->
               where("attendence_status",0)->get();
                $AttendanceTransfermer=[];
                foreach ($attendances as $index=> $attendance){
                    $AttendanceTransfermer[$index] = fractal($attendance, new AttendanceTransformer())->toArray();
                    $AttendanceTransfermer[$index]= $AttendanceTransfermer[$index]["data"];
                }
                return $this->returnData("attendances" ,$AttendanceTransfermer,"count_attendances",$attendances->count());
            }



        }
      catch (\Exception $e) {
            return $e->getMessage();
      }
    }

    public function get_attendance_for_parent(Request $request)
    {
        try {
            if($request->role=="parent"){
                $attendances= Attendance::
                where("student_id",$request->IdStudent)
                    ->where("attendence_status",0)->get();
                $AttendanceTransfermer=[];
                foreach ($attendances as $index=> $attendance){
                    $AttendanceTransfermer[$index] = fractal($attendance, new AttendanceTransformer())->toArray();
                    $AttendanceTransfermer[$index]= $AttendanceTransfermer[$index]["data"];
                }
                return $this->returnData("attendances" ,$AttendanceTransfermer,"count_attendances",$attendances->count());
            }



        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function show_attendance( $id_student)
    {
        try {
            $data["student"]=Student::findOrFail($id_student);
            $data["attendances"]= Attendance::where("student_id",$id_student)->
            where("attendence_status",0)->orderBy("attendence_date")->get();
            return view("pages.students.show_absent",$data);
        }
        catch (\Exception $e) {
            return redirect()->route("")->withErrors($e->getMessage());
        }
        }

}