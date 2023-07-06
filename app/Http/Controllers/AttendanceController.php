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
               $attendances= Attendance::where("student_id",Auth::guard($request->role)->id())->get();
                $AttendanceTransfermer=[];
                foreach ($attendances as $index=> $attendance){
                    $AttendanceTransfermer[$index] = fractal($attendance, new AttendanceTransformer())->toArray();
                    $AttendanceTransfermer[$index]= $AttendanceTransfermer[$index]["data"];
                }
                return $this->returnData("attendances" ,$AttendanceTransfermer,"count_attendances",$attendances->count());
            }

//            elseif ($request->role=="parent"){
//                $parent= MyParent::with("children")->find(Auth::guard($request->role)->id());
//                $attendances= Attendance::where("student_id",$parent["children"][0]["id"])->get();
//                $AttendanceTransfermer=[];
//                foreach ($attendances as $index=> $attendance){
//                    $AttendanceTransfermer[$index] = fractal($attendance, new AttendanceTransformer())->toArray();
//                    $AttendanceTransfermer[$index]= $AttendanceTransfermer[$index]["data"];
//                }
//                return $this->returnData("attendances" ,$AttendanceTransfermer,"count_attendances",$attendances->count());
//            }

        }
      catch (\Exception $e) {
            return $e->getMessage();
      }
    }
}