<?php

namespace App\Http\Controllers;

use App\Http\Requests\LessonRequest;
use App\Http\Traits\AttachFilesTrait;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Lesson;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Section;
use App\Models\Setting;
use App\Models\Subject;
use App\Models\TimeTableRecord;
use App\Traits\GeneralTrait;
use App\Transformers\LessonTransformer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LessonController extends Controller
{
    use GeneralTrait;
    use AttachFilesTrait;

    public function get_class( Request $request)
    {

        try {
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
            $id_teacher=Auth::guard($request->role)->id();
            $year=Setting::where("key", "current_session")->pluck("value")[0];
                $id_classes= TimeTableRecord::whereHas("lecture",function($q) use($id_teacher){
                $q->where("teacher_id",$id_teacher);
            })->
            where([["year",$year],["semester",$semster]])->pluck("classroom_id");
         $classes=Classroom::whereIn('id',$id_classes)->select("id","Name_Class")->get();
            return $this ->returnData("classes" ,$classes,"count_classes",$classes->count());

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function get_section( Request $request)
    {

        try {
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
            $id_teacher=Auth::guard($request->role)->id();
            $year=Setting::where("key", "current_session")->pluck("value")[0];
            $id_sections= TimeTableRecord::whereHas("lecture",function($q) use($id_teacher){
                $q->where("teacher_id",$id_teacher);
            })->
            where([["year",$year],["semester",$semster]])->pluck("section_id");
            $sections=Section::where("Class_id",$request->IdClass)->whereIn('id',$id_sections)->select("id","Name_Section")->get();
            return $this ->returnData("sections" ,$sections,"count_section",$sections->count());

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function get_subject( Request $request)
    {

        try {
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
            $id_teacher=Auth::guard($request->role)->id();
            $year=Setting::where("key", "current_session")->pluck("value")[0];
            $id_subjects = TimeTableRecord::join('lectures', 'time_table_records.id', '=', 'lectures.ttr_id')
                ->where('lectures.teacher_id', $id_teacher)
                ->where('time_table_records.year', $year)
                ->where('time_table_records.semester', $semster)
                ->pluck('lectures.subject_id');
              $class=Section::with("My_classs")->where("id",$request->IdSection)->first();
            $subjects=Subject::where("classroom_id",$class["My_classs"]["id"])->whereIn('id',$id_subjects)->select("id","name")->get();
            return $this ->returnData("subjects" ,$subjects,"count_subjects",$subjects->count());
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function get_lesson( Request $request)
    {

        try {
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
            $id_teacher=Auth::guard($request->role)->id();
            $year=Setting::where("key", "current_session")->pluck("value")[0];
            $lessons=Lesson::with("question")->where([["teacher_id",$id_teacher],["year",$year],["semester",$semster],
                ["subject_id",$request->IdSubject],["section_id",$request->IdSection]])->get();
            $lessonTransfermer=[];
            foreach ($lessons as $index=> $lesson){
                $lessonTransfermer[$index] = fractal($lesson, new LessonTransformer())->toArray();
                $lessonTransfermer[$index]= $lessonTransfermer[$index]["data"];
            }
            return $this ->returnData("lessons" ,$lessonTransfermer,"count_lessons",$lessons->count());
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function create(LessonRequest $request)
    {DB::beginTransaction();
        try {

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
            $id_teacher=Auth::guard($request->role)->id();
            $year=Setting::where("key", "current_session")->pluck("value")[0];
            $lesson= Lesson::create([
         "title"=>$request->title,
         "description"=>$request->description,
         "filename"=>'attachments/lesson/'.$request->file('filename')->getClientOriginalName(),
         "teacher_id"=>$id_teacher,
         "subject_id"=>$request->IdSection,
         "section_id"=>$request->IdSubject,
         "year"=>$year,
         "semester"=>$semster,
    ]);
            $this->uploadlesson($request,'filename');

         if(isset($request->question)){
            foreach ($request->question as $question){
                Question::create([
                    "title"=>$question["title"],
                    "answers"=>$question["first_answer"]."-".$question["second_answer"]."-".$question["thrid_answer"],
                    "right_answer"=>$question["right_answe"],
                    "lesson_id"=>$lesson->id,
                ]);
            }
         }
            DB::commit();
            return $this ->returnSuccessMessage("saved");

        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Request $request)
    {
        try {
            $lesson=Lesson::where("id",$request->IdLesson)->get();
            if($lesson->IsEmpty()){
                return $this ->returnError("404","not found");

            }
            Lesson::destroy($request->IdLesson);
            return $this ->returnSuccessMessage("deleted");

        }

        catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
