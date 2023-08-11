<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuizzeRequest;
use App\Http\Requests\SubjectexamRequest;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Quizze;
use App\Models\Student;
use App\Models\Subject;
use App\Models\SubjectExam;
use App\Models\TimeSlote;
use App\Repository\QuizzRepositoryInterface;
use App\Traits\GeneralTrait;
use App\Transformers\QuizzeTransformer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizzesController extends Controller
{
    use GeneralTrait;
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


    public function store(QuizzeRequest $request)
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

    public function update(QuizzeRequest $request)
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

      $id_quizze=SubjectExam::where("id",$id_se)->pluck("quizze_id")[0];
        $id_grade=SubjectExam::where("id",$id_se)->pluck("grade_id");
        $data["classes"]=Classroom::where("Grade_id",$id_grade)->get();
        $id_class=SubjectExam::where("id",$id_se)->pluck("classroom_id");
        $data["subjects"]=Subject::where("classroom_id",$id_class)->get();
        $data["ts"]=TimeSlote::all();
        $data['grades'] = Grade::all();
        $data["Quizze"]= Quizze::findorFail($id_quizze);
        $data["se"]= SubjectExam::findorFail($id_se);
        return view('pages.Quizzes.subject_exam.edit',$data);
    }
    public function se_update(SubjectexamRequest $request,$id_es)
    {
        try {

            $date=Carbon::now()->format('Y-m-d');
            $datequizze=Carbon::createFromFormat('Y-m-d', $request->date);
            $datenow=Carbon::createFromFormat('Y-m-d',$date);
            if($datenow->gt($datequizze)==1)
            {
                toastr()->error(('date has passed'));
                return redirect()->route("se.edit",$id_es);

            }
           $exists=SubjectExam::where('id',"!=", $id_es)->where("Classroom_id",$request->Classroom_id)->where("date",$request->date)->get();
            if (!$exists->isEmpty()){
                toastr()->error(('there is a exam for this class'));
                return redirect()->route("se.edit",$id_es);
            }
            $id_quizze=SubjectExam::where("id",$id_es)->pluck("quizze_id")[0];
            $SE=SubjectExam::findOrFail($id_es);
            $SE->update([
                "Classroom_id"=>$request->Classroom_id,
                "date"=>$request->date,
                "ts_id"=>$request->ts_id,
                "grade_id"=>$request->Grade_id,
                "subject_id"=>$request->subject_id,
            ]);
            toastr()->success(('Updated'));
            return redirect()->route("quizze.manage",$id_quizze);
        }catch (\Exception $e) {
            return redirect()->route("se.edit",$id_es)->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function se_delete($id_es)
    {
        try {
            $quizze_id=SubjectExam::where("id",$id_es)->pluck("quizze_id")[0];
            $Classrooms = SubjectExam::findOrFail($id_es)->delete();
            toastr()->success(('Deleted'));
            return redirect()->route("quizze.manage",$quizze_id);
        } catch (\Exception $e) {
            return redirect()->route("quizze.manage",$quizze_id)->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function se_view($id_Quizze)
    {

        $data["Quizze"]= Quizze::findorFail($id_Quizze);
        $se= SubjectExam::select("classroom_id")->distinct()->where("quizze_id",$id_Quizze)->get();
        $se1= SubjectExam::select("date")->distinct()->where("quizze_id",$id_Quizze)->orderBy('date')->get();
        $class=[];
        foreach ($se as $index=>$se){
            $class[$index]=$se->classroom;
        }
        $date=[];
        foreach ($se1 as $index=>$se){
            $date[$index]=$se->date;
        }
        $data["classes"] = $class;
        $data["date"] = $date;
;        return view('pages.Quizzes.view',$data);
    }
    public function get_quizze_for_student(Request $request)
    {

        try {
            if($request->role=="student"){
                $class=Auth::guard($request->role)->user()->Classroom_id;
                $year=Auth::guard($request->role)->user()->academic_year;

                $quizzes= Quizze::with("se")
                    ->whereHas("se", function($query) use($class) {
                        $query->where("classroom_id", $class);
                    })
                    ->where("year", $year)->get();
                $quizzesTransfermer=[];
                foreach ($quizzes as $index=> $quizze){
                    $quizzesTransfermer[$index] = fractal($quizze, new QuizzeTransformer())->toArray();
                    $quizzesTransfermer[$index]= $quizzesTransfermer[$index]["data"];
                }
                return $this->returnData("quizzes" ,$quizzesTransfermer,"count_quizzes",$quizzes->count());
            }

        }
        catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function get_quizze_for_parent(Request $request)
    {

        try {
            if($request->role=="parent"){
                $class=  Student::where("id",$request->IdStudent)->pluck("Classroom_id")[0];
                $year=  Student::where("id",$request->IdStudent)->pluck("academic_year")[0];

                $quizzes= Quizze::with("se")
                    ->whereHas("se", function($query) use($class) {
                        $query->where("classroom_id", $class);
                    })
                    ->where("year", $year)->get();
                $quizzesTransfermer=[];
                foreach ($quizzes as $index=> $quizze){
                    $quizzesTransfermer[$index] = fractal($quizze, new QuizzeTransformer())->toArray();
                    $quizzesTransfermer[$index]= $quizzesTransfermer[$index]["data"];
                }
                return $this->returnData("quizzes" ,$quizzesTransfermer,"count_quizzes",$quizzes->count());
            }

        }
        catch (\Exception $e) {
            return $e->getMessage();
        }

    }


    public function show_exam_for_student(Request $request,$id)
    {

        try {

                $class=Student::where('id',$id)->pluck('Classroom_id')[0];
                $year=Student::where('id',$id)->pluck('academic_year')[0];
                $data["student"]=Student::where('id',$id)->first();

                $data["quizzes"]= Quizze::with("se")
                    ->whereHas("se", function($query) use($class) {
                        $query->where("classroom_id", $class);
                    })
                    ->where("year", $year)->get();
                return view("pages.students.show_exam",$data);

               }


        catch (\Exception $e) {
            return $e->getMessage();
        }
    }




}