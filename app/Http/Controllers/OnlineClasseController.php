<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\OnlineRequest;
use App\Http\Traits\MeetingZoomTrait;
use App\Models\Grade;
use App\Models\OnlineClass;
use App\Models\Setting;
use App\Models\User;
use App\Traits\GeneralTrait;
use App\Transformers\OnlineTransformer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MacsiDigital\Zoom\Facades\Zoom;

class OnlineClasseController extends Controller
{
    use MeetingZoomTrait;
    public function index()
    {
        $online_classes = OnlineClass::all();
        return view('pages.online_classes.index', compact('online_classes'));
    }


    public function create()
    {
        $Grades = Grade::all();
        return view('pages.online_classes.add', compact('Grades'));
    }

    public function indirectCreate()
    {
        $Grades = Grade::all();
        return view('pages.online_classes.indirect', compact('Grades'));
    }


    public function store(OnlineRequest $request)
    {
        try {


            $meeting = $this->createMeeting($request);

            OnlineClass::create([
                'integration' => true,
                'Grade_id' => $request->Grade_id,
                'Classroom_id' => $request->Classroom_id,
                'section_id' => $request->section_id,
                'user_id' => auth()->user()->id,
                'meeting_id' => $meeting->id,
                'topic' => $request->topic,
                'start_at' => $request->start_time,
                'duration' => $meeting->duration,
                'password' => $meeting->password,
                'start_url' => $meeting->start_url,
                'join_url' => $meeting->join_url,
            ]);
            toastr()->success(('Success'));
            return redirect()->route('Online_index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }


    public function storeIndirect(OnlineRequest $request)
    {
        try {
            OnlineClass::create([
                'integration' => false,
                'Grade_id' => $request->Grade_id,
                'Classroom_id' => $request->Classroom_id,
                'section_id' => $request->section_id,
                'user_id' => auth()->user()->id,
                'meeting_id' => $request->meeting_id,
                'topic' => $request->topic,
                'start_at' => $request->start_time,
                'duration' => $request->duration,
                'password' => $request->password,
                'start_url' => $request->start_url,
                'year' => $request->Year,
                'join_url' => $request->join_url,
                'semester' => $request->semester,
            ]);
            toastr()->success(('Success'));
            return redirect()->route('Online_index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }

use GeneralTrait;

    public function get_online_for_student(Request $request)
    {
        try {

            if ($request->role == "student") {
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
                $online=OnlineClass::where([["section_id",$section_id],["semester",$semster],["year",$year]])->get();
                $questionsTransfermer=[];
                foreach ($online as $index=> $question){
                    $questionsTransfermer[$index] = fractal($question, new OnlineTransformer())->toArray();
                    $questionsTransfermer[$index]= $questionsTransfermer[$index]["data"];
                }
                return $this ->returnData("online" ,$questionsTransfermer,"count_online",$online->count());


            }
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(Request $request)
    {
        try {

            $info = OnlineClass::find($request->id);

            if($info->integration == true){
                $meeting = Zoom::meeting()->find($request->meeting_id);
                $meeting->delete();
               // online_classe::where('meeting_id', $request->id)->delete();
               OnlineClass::destroy($request->id);
            }
            else{
               // online_classe::where('meeting_id', $request->id)->delete();
               OnlineClass::destroy($request->id);
            }

            toastr()->warning(('Delete'));
            return redirect()->route('Online_index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }
}