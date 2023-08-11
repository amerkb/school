<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Quizze;
use App\Models\Section;
use App\Models\Student;
use App\Models\SubjectExam;
use App\Traits\GeneralTrait;
use App\Transformers\ResultTransformer;
use Illuminate\Http\Request;
use App\Repository\ResultRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use LDAP\Result;

class ResultController extends Controller
{
    use GeneralTrait;
    protected $result;

    public function __construct(ResultRepositoryInterface $result)
    {
        $this->result = $result;
    }

    
    public function index()
    {
        return $this->result->index();
    }

    public function store(Request $request)
    {
        return $this->result->store($request);
    }

    public function create()
    {
        $data["quizzes"] = Quizze::orderBy('year', 'DESC')->get();
        return view("pages.results.add", $data);
    }


    public function show($id,$year,$id_se)
    {
        return $this->result->show($id,$year,$id_se);

}
    public function show_exam($id_section)
    {
        $id_class=Section::where("id",$id_section)->pluck("Class_id")[0];
        $data["exams"] = Quizze::
            whereHas("se", function($query) use($id_class) {
                $query->where("classroom_id", $id_class);
            })->with("se")
            ->orderBy("year","DESC")->get();
        $data["id_section"]=$id_section;
        $data["id_class"]=$id_class;
        return view("pages.Result.Exem",$data);

    }
    public function ur_store(Request $request,$id_se)
    {

        $results=[];
        $index=0;
        foreach ( $request->status_id as $student=>$status){
            $index++;
            $results[$index]["student_id"]=$student;
            $results[$index]["status"]=$status;
    }
        $index=0;
        foreach ( $request->degree_id as $student=>$degree){
            $index++;
            $results[$index]["degree"]=$degree;
            $results[$index]["quizzes_subject_id"]=$id_se;

        }
        foreach ( $results as $result){
            \App\Models\Result::updateOrCreate(
           ['student_id' =>$result["student_id"], 'quizzes_subject_id' =>$id_se],
           [
               "student_id"=>$result["student_id"],
               "status"=>$result["status"],
               "degree"=>$result["degree"],
               "quizzes_subject_id"=>$result["quizzes_subject_id"],
           ]

       );}
        toastr()->success("success");
        return redirect()->back();
    }
    public function get_result_for_student(Request $request)
    {
        $id_quizze=$request->id_quizze;
        $id=Auth::guard($request->role)->id();
    $quizze = Quizze::find($id_quizze);
           $results = $quizze->results->filter(function ($result) use($id) {
            return $result->student_id==$id;
        });
        $resultsTransfermer=[];
        $i=0;
        foreach ($results as  $result){

            $resultsTransfermer[$i] = fractal($result, new ResultTransformer())->toArray();
            $resultsTransfermer[$i]= $resultsTransfermer[$i]["data"];
            $i++;
        }
        return $this->returnData("results" ,$resultsTransfermer,"count_results",$results->count());

    }

    public function get_result_for_parent(Request $request)
    {
        $id_quizze=$request->id_quizze;
        $id=Student::where("id",$request->IdStudent)->pluck("id")[0];
        $quizze = Quizze::find($id_quizze);
        $results = $quizze->results->filter(function ($result) use($id) {
            return $result->student_id==$id;
        });
        $resultsTransfermer=[];

        $i=0;
        foreach ($results as  $result){

            $resultsTransfermer[$i] = fractal($result, new ResultTransformer())->toArray();
            $resultsTransfermer[$i]= $resultsTransfermer[$i]["data"];
            $i++;
        }
        return $this->returnData("results" ,$resultsTransfermer,"count_results",$results->count());

    }

    public function show_result_dashboard($id_quizze, $id_student)
    {

        $data["student"]=Student::findOrFail($id_student);
        $quizze = Quizze::find($id_quizze);
        $data['results'] = $quizze->results->filter(function ($result) use($id_student) {
            return $result->student_id==$id_student;
        });
    return view("pages.students.show_result",$data);
    }


}