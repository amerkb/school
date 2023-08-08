<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassroom;
use App\Models\Classroom;
use App\Models\Grade;
use Exception;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index()
    {
        $My_Classes = Classroom::all();
        $Grades = Grade::all();
        return view('pages.My_Classes.My_Classes', compact('My_Classes'), compact('Grades'));
    }

    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(StoreClassroom $request)
    {

        $List_Classes = $request->List_Classes;

        try {

            $validated = $request->validated();
            foreach ($List_Classes as $List_Class) {

                $My_Classes = new Classroom();

                $My_Classes->Name_Class =  $List_Class['Name_class_en'];

                $My_Classes->Grade_id = $List_Class['Grade_id'];

                $My_Classes->save();
            }

            toastr()->success(('Success'));
            return redirect()->back();

        }
        catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function update(Request $request)
    {

        try {

            $Classrooms = Classroom::findOrFail($request->id);
            $Classrooms->update([
                $Classrooms->Name_Class = $request->Name_en,
                $Classrooms->Grade_id = $request->Grade_id,
            ]);
            toastr()->success(('Update'));
            return redirect()->route('classindex');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        try {


        $old_status = Classroom::where("id",$request->id)->pluck("Status")[0];
        $new_status=$old_status==0?1:0;
        $class = Classroom::findOrFail($request->id)->update(["Status"=>$new_status]);
        if ($new_status==1) {
            toastr()->success(('Active'));
        }
        else{
            toastr()->warning('No Active');
        }
        return redirect()->route('classindex');


    } catch (\Exception $e) {
return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }}

    public function delete_all(Request $request)
    {
        $delete_all_id = explode(",", $request->delete_all_id);
        Classroom::whereIn('id', $delete_all_id)->delete();
        toastr()->error('Deleted All');
        return redirect()->back();
    }
    public function Filter_Classes(Request $request)
    {
        $Grades = Grade::all();
        $Search = Classroom::where('Grade_id' ,$request->Grade_id)->get();
        return view('pages.My_Classes.My_Classes',compact('Grades'))->withDetails($Search);

    }
}
