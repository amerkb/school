<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectexamRequest;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Quizze;
use App\Models\Subject;
use App\Models\SubjectExam;
use App\Models\TimeSlote;
use App\Repository\QuizzRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;

class QuizzesController extends Controller
{

    protected $Quizz;

    public function __construct(QuizzRepositoryInterface $Quizz)
    {
        $this->Quizz =$Quizz;
    }

    public function index()
    {
        return $this->Quizz->index();
    }

    public function create()
    {
        return $this->Quizz->create();
    }


    public function store(Request $request)
    {
        return $this->Quizz->store($request);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return $this->Quizz->edit($id);
    }

    public function update(Request $request)
    {
        return $this->Quizz->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->Quizz->destroy($request);
    }
    public function manage($id)
    {

        $data["Quizze"]= Quizze::findorFail($id);
        $data["ses"]= SubjectExam::where("quizze_id",$id)->get();
        return view('pages.Quizzes.manage',$data);
    }

    public function se_create($id)

    {
        $data["ts"]=TimeSlote::all();
        $data['grades'] = Grade::all();
        $data["Quizze"]= Quizze::findorFail($id);
        return view('pages.Quizzes.subject_exam.add',$data);
    }

    public function se_store(SubjectexamRequest $request,$id_Quizze)
    {

        try {
            $date=Carbon::now()->format('Y-m-d');
            $datequizze=Carbon::createFromFormat('Y-m-d', $request->date);
           $datenow=Carbon::createFromFormat('Y-m-d',$date);
            if($datenow->gt($datequizze)==1)
            {
                toastr()->error(('date has passed'));
                return redirect()->route("se.add",$id_Quizze);

            }
        $exists=SubjectExam::
        where([["Classroom_id",$request->Classroom_id],["date",$request->date]])->get();

        if (!$exists->isEmpty()){

            toastr()->error(('there is a exam for this class'));
            return redirect()->route("se.add",$id_Quizze);
        }

            SubjectExam::create([
                    "Classroom_id"=>$request->Classroom_id,
                    "date"=>$request->date,
                    "ts_id"=>$request->ts_id,
                    "grade_id"=>$request->Grade_id,
                    "subject_id"=>$request->subject_id,
                    "quizze_id"=>$id_Quizze
                ]);
                toastr()->success(('Created'));
            return redirect()->route("quizze.manage",$id_Quizze);
            }catch (\Exception $e) {
                return redirect()->route("se.add",$id_Quizze)->withErrors(['error' => $e->getMessage()]);
            }
        }
    public function se_edit($id_se)

    {
        $id_grade=SubjectExam::where("id",$id_se)->pluck("grade_id");
        $data["classes"]=Classroom::where("Grade_id",$id_grade)->get();
        $id_class=SubjectExam::where("id",$id_se)->pluck("classroom_id");
        $data["subjects"]=Subject::where("classroom_id",$id_class)->get();
        $data["ts"]=TimeSlote::all();
        $data['grades'] = Grade::all();
        $data["Quizze"]= Quizze::findorFail($id_se);
        $data["se"]= SubjectExam::findorFail($id_se);
        return view('pages.Quizzes.subject_exam.edit',$data);
    }


}