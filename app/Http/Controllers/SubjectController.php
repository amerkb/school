<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Quizze;
use App\Models\Setting;
use App\Models\Subject;
use App\Models\SubjectExam;
use App\Models\SubjectsCategorie;
use App\Models\TimeTableRecord;
use App\Repository\SubjectRepositoryInterface;
use App\Traits\GeneralTrait;
use App\Transformers\SubjectTransformer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    use GeneralTrait;
    protected $Subject;

    public function __construct(SubjectRepositoryInterface $Subject)
    {
        $this->Subject = $Subject;
    }

    public function index()
    {
        return $this->Subject->index();
    }


    public function create()
    {
        return $this->Subject->create();
    }


    public function store(Request $request)
    {
        return $this->Subject->store($request);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return $this->Subject->edit($id);
    }

    public function update(Request $request)
    {
        return $this->Subject->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->Subject->destroy($request);
    }
    public function Get_Subject($id)
    {

        $list_classes = Subject::where("classroom_id", $id)->pluck("name", "id");
        return $list_classes;
    }
    public function Get_Subject_quizze($id_q)
    {
        $id_subject=SubjectExam::where("quizze_id",$id_q)->pluck("subject_id");
        $list_classes = Subject::whereIn("id", $id_subject)->pluck("name", "id");
        return $list_classes;
    }

    public function get_subject_for_student(Request $request)
    {
        try{
            if ($request->role == "student") {
                if ($request->namegategory == null){
                    return $this->returnError(404,"please send name gategory");

                }
                $id_category = SubjectsCategorie::where("name", $request->namegategory)->pluck("id")[0];
                $end_first_term = Setting::where("key", "end_first_term")->pluck("value")[0];
                $end_first_term = Carbon::createFromFormat("Y-m-d", $end_first_term);
                $Current_year = Carbon::createFromFormat("Y-m-d", Carbon::now()->format("Y-m-d"));
                $semster = 0;
                if ($Current_year->gt($end_first_term)) {
                    $semster = 2;
                }
                if ($Current_year->lte($end_first_term)) {
                    $semster = 1;
                }
                $section_id = Auth::guard($request->role)->user()->section_id;
                $year = Auth::guard($request->role)->user()->academic_year;
                $ttr = TimeTableRecord::where([["year", $year], ["section_id", $section_id]
                    , ["semester", $semster]])->first();
                    $subjectTransfermer = [];
                    $subject = [];
                if(!$ttr==null) {
                    $lectures = $ttr->lecture()->select("subject_id")->distinct()->get();
                    foreach ($lectures as $index => $lecture) {
                        $subject[$index] = $lecture->subject;
                    }
                    $subject = collect($subject)->filter(function ($subject) use ($id_category) {
                        return $subject->subject_category_id == $id_category;
                    });
                    $i = 0;
                    foreach ($subject as $subjec) {

                        $subjectTransfermer[$i] = fractal($subjec, new SubjectTransformer())->toArray();
                        $subjectTransfermer[$i] = $subjectTransfermer[$i]["data"];
                        $i++;
                    }
                return $this->returnData("subjects", $subjectTransfermer, "count_subjects", $subject->count());
                }
                return $this->returnData("subjects", $subjectTransfermer, "count_subjects",0);

            }}
     catch (\Exception $e) {
             return $e->getMessage();
         }




     }


}