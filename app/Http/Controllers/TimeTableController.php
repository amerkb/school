<?php

namespace App\Http\Controllers;

use App\Http\Requests\LectureRequest;
use App\Models\Day;
use App\Models\Lecture;
use App\Models\Setting;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TimeSlote;
use App\Traits\GeneralTrait;
use App\Transformers\ScheduleTransformer;
use App\Transformers\TimeTableTransformer;
use Carbon\Carbon;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Models\TimeTableRecord;
use App\Http\Requests\TtrRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TimeTableController extends Controller
{use GeneralTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $d['exams'] =Grade ::all();
        $d['my_classes'] = Classroom::all();
        $d['grades'] = Grade::all();
        $d['tt_records'] = TimeTableRecord::all();
        return view("pages.timetables.index",$d);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(TtrRequest $request)
    {


        try {
            $programme=TimeTableRecord::where([
            ["section_id",$request->section_id],
            ["semester",$request->semester_id],
            ["year",$request->Year]
            ]
            )->get();

            if(! $programme->isEmpty()){

                toastr()->error(('this program exists'));
                return redirect()->route("time_index");

            }
            TimeTableRecord::create([
                "name"=>$request->name,
                "Grade_id"=>$request->Grade_id,
                "classroom_id"=>$request->Classroom_id,
                "section_id"=>$request->section_id,
                "semester"=>$request->semester_id,
                "year"=>$request->Year,
            ]);
            toastr()->success(('Created'));
            return redirect()->route("ttr_show");

         } catch (\Exception $e) {
    return redirect()->route("time_index")->withErrors(['error' => $e->getMessage()]);
    }

    }

    /**
     * Show the form for manageing a new resource.
     */
    public function manage($id_ttr)
    {

        $d["lectures"]= Lecture::where('ttr_id', $id_ttr)
          ->select("lectures.*")
            ->join('time_slots as ts', 'lectures.ts_id', '=', 'ts.id')
            ->join('days as d', 'lectures.day_id', '=', 'd.id')
            ->orderBy('day_id')
            ->orderBy('hour_from')
            ->orderBy('min_from')
            ->orderBy('meridian_from')
            ->get();
        $d["ttr"]=TimeTableRecord::findOrFail($id_ttr);
        return view("pages.timetables.manage",$d);
    }


    /**
     * Display the specified resource.
     */
    public function show( )
    {
        $d['exams'] =Grade ::all();
        $d['my_classes'] = Classroom::all();
        $d['grades'] = Grade::all();
        $d['tt_records'] = TimeTableRecord::all();
        return view("pages.timetables.ttr_show",$d);
    }
    /**
     * Display the specified resource.
     */
    public function view( $id )
    {
        $ttr=TimeTableRecord::findOrFail($id);
        $lectures=Lecture::where("ttr_id",$id)->get();
        $time_slot=DB::table('lectures as l')
         ->select('ts.full' ,'ts.id')
         ->distinct()
         ->join('time_slots as ts', 'ts.id', '=', 'l.ts_id')
         ->where('l.ttr_id', '=', $id)
            ->orderBy('ts.hour_from', 'ASC')
            ->orderBy('ts.meridian_from', 'ASC')
            ->orderBy('ts.min_from', 'ASC')
            ->orderBy('ts.hour_to', 'ASC')
            ->orderBy('ts.meridian_to', 'ASC')
            ->orderBy('ts.min_to', 'ASC')
         ->get();
        $d['time_slot'] = $time_slot;
        $d['days'] = Day::all();
        $d['lectures'] = $lectures;
        $d['ttr'] = $ttr;
        return view("pages.timetables.show",$d);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {

        $d['grades'] = Grade::all();
        $d["ttr"]=TimeTableRecord::findOrFail($id);
       $id_garde= TimeTableRecord::where("id",$id)->pluck("Grade_id");
      $d["class"]= Classroom::where("Grade_id",$id_garde)->get();
        $id_class= TimeTableRecord::where("id",$id)->pluck("classroom_id");
        $d["section"]= Section::where("Class_id",$id_class)->get();
        return view("pages.timetables.edit",$d);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TtrRequest $request,  $id)
    {
//        return $request;
        try {
            $programme1=TimeTableRecord::where([
                    ["section_id",$request->section_id],
                    ["semester",$request->semester_id],
                    ["year",$request->Year]
                ]
            )->where('id', '=', $id)->get();
            $programme2=TimeTableRecord::where([
                    ["section_id",$request->section_id],
                    ["semester",$request->semester_id],
                    ["year",$request->Year]
                ]
            )->where('id', '!=', $id)->get();

            if( isset($programme1[1])==1 || !$programme2->isEmpty() ){

                toastr()->error(('this program exists'));
                return redirect()->route("ttr.edit",$id);

            }
         $ttr=TimeTableRecord::find($id);
            $ttr->update([
                "name"=>$request->name,
                "Grade_id"=>$request->Grade_id,
                "classroom_id"=>$request->Classroom_id,
                "section_id"=>$request->section_id,
                "semester"=>$request->semester_id,
                "year"=>$request->Year,
            ]);
            toastr()->success(('Updated'));
            return redirect()->route("ttr_show");

        } catch (\Exception $e) {
            return redirect()->route("ttr_show")->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
        $Classrooms = TimeTableRecord::findOrFail($id)->delete();
        toastr()->success(('Deleted'));
        return redirect()->back();

     } catch (\Exception $e) {
return redirect()->route("time_index")->withErrors(['error' => $e->getMessage()]);
}
    }
    /**
     * Display a listing of the resource.
     */
    public function ts_index()
    {
        $d['ts'] = TimeSlote::all();
        return view("pages.timetables.time_slots.index",$d);
    }
    /**
     * Show the form for manageing a new resource.
     */
    public function createts()
    {
        return view("pages.timetables.time_slots.add");
    }
    public function ts_store(Request $request)
    {
        try {
            $time_from="$request->hour_from:$request->min_from $request->meridian_from";
            $time_to="$request->hour_to:$request->min_to $request->meridian_to";
            $start = Carbon::createFromFormat('h:i A', $time_from);
            $end = Carbon::createFromFormat('h:i A', $time_to);
            if ($start->gt($end)) {
                toastr()->error(('the start time  grater than end time'));
                return redirect()->route("ts.create");
            }
            else if ($start->lt($end)) {
                $full="$time_from  _  $time_to";

            $slot=TimeSlote::where("full",$full)->get();

            if(! $slot->isEmpty()){

                toastr()->error(('this time slot exists'));
                return redirect()->route("ts.index");

            }
            TimeSlote::create([
                'hour_from' =>$request->hour_from,
                "min_from"=>$request->min_from,
                "meridian_from"=>$request->meridian_from,
                "hour_to"=>$request->hour_to,
                "min_to"=>$request->min_to,
                "meridian_to"=>$request->meridian_to,
                "time_from"=>$time_from,
                "time_to"=>$time_to,
                "full"=>$full,


            ]);
            toastr()->success(('Created'));
            return redirect()->route("ts.index");

        }
            else{

                toastr()->error(('the start time  equal end time'));
                    return redirect()->route("ts.create");
            }

        }
        catch (\Exception $e) {
            return redirect()->route("ts.index")->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function ts_edit($id)
    {
        $d['ts']=TimeSlote::findOrFail($id);
        return view("pages.timetables.time_slots.edit",$d);
    }
    public function ts_update(Request $request,$id)
    {
        try {
            $time_from="$request->hour_from:$request->min_from $request->meridian_from";
            $time_to="$request->hour_to:$request->min_to $request->meridian_to";
            $start = Carbon::createFromFormat('h:i A', $time_from);
            $end = Carbon::createFromFormat('h:i A', $time_to);
            if ($start->gt($end)) {
                toastr()->error(('the start time  grater than end time'));
                return redirect()->route("ts.edit",$id);
            }
            else if ($start->lt($end)) {
                $full="$time_from _$time_to";

                $slot=TimeSlote::where("full",$full)->get();

                if(isset($slot[1])==1){

                    toastr()->error(('this time slot exists'));
                    return redirect()->route("ts.edit",$id);

                }
                $ts=TimeSlote::findOrFail($id);
                $ts->update([
                    'hour_from' =>$request->hour_from,
                    "min_from"=>$request->min_from,
                    "meridian_from"=>$request->meridian_from,
                    "hour_to"=>$request->hour_to,
                    "min_to"=>$request->min_to,
                    "meridian_to"=>$request->meridian_to,
                    "time_from"=>$time_from,
                    "time_to"=>$time_to,
                    "full"=>$full,


                ]);
                toastr()->success(('Updated'));
                return redirect()->route("ts.index");

            }
            else{

                toastr()->error(('the start time  equal end time'));
                return redirect()->route("ts.edit");
            }

        }
      catch (\Exception $e) {
            return redirect()->route("ts.edit",$id)->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function ts_delete($id)
    {
        try {
            $Classrooms = TimeSlote::findOrFail($id)->delete();
            toastr()->success(('Deleted'));
            return redirect()->route("ts.index");

        } catch (\Exception $e) {
            return redirect()->route("ts.index")->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function l_create($id_ttr)
    {   $ttr=TimeTableRecord::findOrFail($id_ttr);
        $d["ttr"]=$ttr;
        $d["ts"]=TimeSlote::all();
        $d["days"]=Day::all();
        $id_class=TimeTableRecord::where("id",$id_ttr)->pluck("classroom_id");
        $d["subjects"]=Subject::where("classroom_id",$id_class)->get();
        $section_id=TimeTableRecord::where("id",$id_ttr)->pluck("section_id");
         $section=Section::where("id",$section_id)->first();
        $d["teachers"]= $section->teachers;
        return view("pages.timetables.lecture.add",$d);
    }
    public function l_store(LectureRequest $request,$id_ttr)
    {

        try {
        $exists=Lecture::where([["day_id",$request->day_id],["ttr_id",$id_ttr],["ts_id",$request->ts_id]])->get();
        if (!$exists->isEmpty()){
            toastr()->error(('there is a lecture at this time'));
            return redirect()->route("l.create",$id_ttr);
        }
           $start=Carbon::createFromFormat('h:i A',TimeSlote::where("id",$request->ts_id)->pluck("time_from")[0]);
            $end=Carbon::createFromFormat('h:i A',TimeSlote::where("id",$request->ts_id)->pluck("time_to")[0]);
            $ovarlap = Lecture::where([["day_id",$request->day_id],["ttr_id",$id_ttr]])
                ->select("ts.time_from","ts.time_to")->join('time_slots as ts', 'lectures.ts_id', '=', 'ts.id')
                ->get();
                  foreach ($ovarlap as $o2){
                      $start_ts = Carbon::createFromFormat('h:i A', $o2->time_from);
                      $end_ts = Carbon::createFromFormat('h:i A', $o2->time_to);

                      if ($end->gt($start_ts)==1 && $end->lte($end_ts)==1) {
                          toastr()->error(('there is a time overlap '));
                          return redirect()->route("l.create",$id_ttr);
                      }
                      if ($start->gte($start_ts)==1 && $start->lt($end_ts)==1) {
                          toastr()->error(('there is a time overlap'));
                          return redirect()->route("l.create",$id_ttr);
                      }
                  }


            $ttr= DB::table('time_table_records')
                ->select('*')
                ->where('id', $id_ttr)
                ->first();


            $reserved_teacher=
                DB::table('lectures as l')
                    ->crossJoin('time_table_records as ttr')
                    ->select('l.id',"l.teacher_id")
                    ->where('l.teacher_id', $request->teacher_id)
                    ->where('l.day_id', $request->day_id)
                    ->where('l.ts_id', $request->ts_id)
                    ->where('ttr.year', $ttr->year)
                    ->where('ttr.semester', $ttr->semester)
                    ->get();
            if (!$reserved_teacher->isEmpty()){
                toastr()->error(('Reserved Teacher'));
                return redirect()->route("l.create",$id_ttr);
            }

        Lecture::create([
            "subject_id"=>$request->subject_id,
            "teacher_id"=>$request->teacher_id,
            "day_id"=>$request->day_id,
            "ts_id"=>$request->ts_id,
            "ttr_id"=>$id_ttr,
        ]);
        toastr()->success(('Created'));
            return redirect()->route("ttr.manage",$id_ttr);
    }catch (\Exception $e) {
            return redirect()->route("l.create",$id_ttr)->withErrors(['error' => $e->getMessage()]);
        }
        }

    public function l_edit($id_lecture)

    {
         $id_ttr=Lecture::where("id",$id_lecture)->pluck("ttr_id");
        $ttr=TimeTableRecord::where("id",$id_ttr)->first();
        $d["ttr"]=$ttr;
        $d["ts"]=TimeSlote::all();
        $d["days"]=Day::all();
        $id_class=TimeTableRecord::where("id",$id_ttr)->pluck("classroom_id");
        $d["subjects"]=Subject::where("classroom_id",$id_class)->get();
        $section_id=TimeTableRecord::where("id",$id_ttr)->pluck("section_id");
        $section=Section::where("id",$section_id)->first();
        $d["teachers"]= $section->teachers;
        $d["lecture"]=Lecture::where("id",$id_lecture)->first();
        return view("pages.timetables.lecture.edit",$d);
    }
    public function l_update(LectureRequest $request,$id_lecture)
    {

        try {
            $id_ttr=Lecture::where("id",$id_lecture)->pluck("ttr_id");
            $start=Carbon::createFromFormat('h:i A',TimeSlote::where("id",$request->ts_id)->pluck("time_from")[0]);
            $end=Carbon::createFromFormat('h:i A',TimeSlote::where("id",$request->ts_id)->pluck("time_to")[0]);
            $ovarlap = Lecture::where([["day_id",$request->day_id],["ttr_id",$id_ttr]])
                ->select("ts.*")->join('time_slots as ts', 'lectures.ts_id', '=', 'ts.id')
                ->get();
            foreach ($ovarlap as $o2){
                $start_ts = Carbon::createFromFormat('h:i A', $o2->time_from);
                $end_ts = Carbon::createFromFormat('h:i A', $o2->time_to);
                if ($end->gt($start_ts)==1 && $end->lte($end_ts)==1) {
                    $l = Lecture::where([["ttr_id",$id_ttr],["day_id",$request->day_id],["ts_id",$o2->id]])
                        ->where('id',"!=", $id_lecture)
                        ->get();
                    if (!$l->isEmpty()) {
                        toastr()->error(('there is a time overlap'));
                        return redirect()->route("l.edite", $id_lecture);
                    }
                }
                if ($start->gte($start_ts)==1 && $start->lt($end_ts)==1) {
                    $l = Lecture::where([["ttr_id",$id_ttr],["day_id",$request->day_id],["ts_id",$o2->id]])
                        ->where('id',"!=", $id_lecture)
                        ->get();
                    if (!$l->isEmpty()) {
                        toastr()->error(('there is a time overlap'));
                        return redirect()->route("l.edit", $id_lecture);
                    }
                }
            }
            $exists=Lecture::where([["day_id",$request->day_id],["ttr_id",$id_ttr],["ts_id",$request->ts_id]])->get();
            if (isset($exists[1])==1){
                toastr()->error(('there is a lecture at this time'));
                return redirect()->route("l.edit",$id_lecture);
            }
            $ttr= DB::table('time_table_records')
                ->select('*')
                ->where('id', $id_ttr)
                ->first();


            $reserved_teacher1=
                DB::table('lectures as l')
                    ->crossJoin('time_table_records as ttr')
                    ->select('l.id',"l.teacher_id")->distinct()
                    ->where('l.teacher_id', $request->teacher_id)
                    ->where('l.day_id', $request->day_id)
                    ->where('l.ts_id', $request->ts_id)
                    ->where('ttr.year', $ttr->year)
                    ->where('ttr.semester', $ttr->semester)
                    ->where('l.id', $id_lecture)
                    ->get();
            $reserved_teacher2=
                DB::table('lectures as l')
                    ->crossJoin('time_table_records as ttr')
                    ->select('l.id',"l.teacher_id")
                    ->where('l.teacher_id', $request->teacher_id)
                    ->where('l.day_id', $request->day_id)
                    ->where('l.ts_id', $request->ts_id)
                    ->where('ttr.year', $ttr->year)
                    ->where('ttr.semester', $ttr->semester)
                    ->where('l.id',"!=", $id_lecture)
                    ->get();
            if (!$reserved_teacher2->isEmpty() || isset($reserved_teacher1[1])==1){
                toastr()->error(('Reserved Teacher'));
                return redirect()->route("l.edit",$id_lecture);
            }

            $lecture=Lecture::findOrFail($id_lecture);
            $lecture->update([
                "subject_id"=>$request->subject_id,
                "teacher_id"=>$request->teacher_id,
                "day_id"=>$request->day_id,
                "ts_id"=>$request->ts_id,
                "ttr_id"=>$id_ttr[0],
            ]);
            toastr()->success(('updated'));
            return redirect()->route("ttr.manage",$id_ttr[0]);
        }catch (\Exception $e) {
            return redirect()->route("l.edit",$id_lecture)->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function l_destroy($id_lecture)
    {
        try {
            $id_ttr=Lecture::where("id",$id_lecture)->pluck("ttr_id");
            $Classrooms = Lecture::findOrFail($id_lecture)->delete();
            toastr()->success(('Deleted'));
            return redirect()->route("ttr.manage",$id_ttr[0]);
        } catch (\Exception $e) {
            return redirect()->route("ttr.manage",$id_ttr[0])->withErrors(['error' => $e->getMessage()]);
        }

}
    public function get_time_for_student(Request $request)
    {
        $end_first_term=  Setting::where("key","end_first_term")->pluck("value")[0];
        $end_first_term = Carbon::createFromFormat("Y-m-d",$end_first_term);
        $Current_year=Carbon::createFromFormat("Y-m-d",Carbon::now()->format("Y-m-d"));
        $semster=0;
        if ($Current_year->gt($end_first_term)){
            $semster=2;
        }
        if ($Current_year->lte($end_first_term)){
            $semster=1;
        }
        $section_id=  Auth::guard($request->role)->user()->section_id;
        $year=     Auth::guard($request->role)->user()->academic_year;
        $ttr= TimeTableRecord::with("lecture")->where([["year",$year],["section_id",$section_id]
            ,["semester",$semster]])->get();
        $ttrTransfermer=[];
        foreach ($ttr as $index=> $tr){
            $ttrTransfermer[$index] = fractal($tr, new TimeTableTransformer())->toArray();
            $ttrTransfermer[$index]= $ttrTransfermer[$index]["data"];
        }
        return $this ->returnData("TimeTable" ,$ttrTransfermer,"count_TimeTable",$ttr->count());

    }
    public function get_time_for_tracher(Request $request)
    {
        $end_first_term=  Setting::where("key","end_first_term")->pluck("value")[0];
        $end_first_term = Carbon::createFromFormat("Y-m-d",$end_first_term);
        $Current_year=Carbon::createFromFormat("Y-m-d",Carbon::now()->format("Y-m-d"));
        $semster=0;
        if ($Current_year->gt($end_first_term)){
            $semster=2;
        }
        if ($Current_year->lte($end_first_term)){
            $semster=1;
        }
        $id_teacher=Auth::guard($request->role)->id();
        $year=Setting::where("key", "current_session")->pluck("value")[0];
        $lectures= Lecture::join('time_slots as ts', 'lectures.ts_id', '=', 'ts.id')->select(
            "ts.hour_from","ts.min_from","ts.meridian_from","ts.hour_to","ts.min_to","ts.meridian_to","lectures.*")->whereHas("ttr",function($q) use($year,$semster){
            $q->where([["year",$year],["semester",$semster]]);
        })->where("teacher_id",$id_teacher)
            ->orderBy("day_id")
            ->orderBy('ts.hour_from')
            ->orderBy('ts.min_from')
            ->orderBy('ts.meridian_from')
            ->orderBy('ts.hour_to')
            ->orderBy('ts.min_to')
            ->orderBy('ts.meridian_to')
            ->get();
        $ttrTransfermer=[];
        foreach ($lectures as $index=> $l){
            $ttrTransfermer[$index] = fractal($l, new ScheduleTransformer())->toArray();
            $ttrTransfermer[$index]= $ttrTransfermer[$index]["data"];
        }
        return $this ->returnData("lectures" ,$ttrTransfermer,"count_Lecture",$lectures->count());

    }
    public function get_time_for_parent(Request $request)
    {
        $end_first_term=  Setting::where("key","end_first_term")->pluck("value")[0];
        $end_first_term = Carbon::createFromFormat("Y-m-d",$end_first_term);
        $Current_year=Carbon::createFromFormat("Y-m-d",Carbon::now()->format("Y-m-d"));
        $semster=0;
        if ($Current_year->gt($end_first_term)){
            $semster=2;
        }
        if ($Current_year->lte($end_first_term)){
            $semster=1;
        }
         $section_id=  Student::where("id",$request->IdStudent)->pluck("section_id")[0];
        $year=   Student::where("id",$request->IdStudent)->pluck("academic_year")[0];
        $ttr= TimeTableRecord::with("lecture")->where([["year",$year],["section_id",$section_id]
            ,["semester",$semster]])->get();
        $ttrTransfermer=[];
        foreach ($ttr as $index=> $tr){
            $ttrTransfermer[$index] = fractal($tr, new TimeTableTransformer())->toArray();
            $ttrTransfermer[$index]= $ttrTransfermer[$index]["data"];
        }
        return $this ->returnData("TimeTable" ,$ttrTransfermer,"count_TimeTable",$ttr->count());

    }

}
