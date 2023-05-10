<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Http\Requests\StoreGrades;
use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Http\Controllers\toastr;

class GradeController extends Controller
{

    public function index()
    {
        $Grades = Grade::all();
        return view('pages.Grades.Grades', compact('Grades'));
    }

    public function store(StoreGrades $request)
    {
        try {
            $validated = $request->validated();
            $Grade = new Grade();
            $Grade->Name = $request->Name;
            $Grade->Notes = $request->Notes;
            $Grade->save();
            toastr()->success(('The Name Added Successfully'));
            return redirect()->route('as');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getmessage()]);
        }
    }

    public function update(StoreGrades $request)
    {
        try {

            $validated = $request->validated();
            $Grades = Grade::findOrFail($request->id);
            $Grades->update([
                $Grades->Name = $request->Name,
                $Grades->Notes = $request->Notes,
            ]);
            toastr()->success(('Update Successfully'));
            return redirect()->route('as');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {

        $MyClass_id = Classroom::where('Grade_id',$request->id)->pluck('Grade_id');
        if($MyClass_id->count() == 0)
        {
            $Grades = Grade::findOrFail($request->id)->delete();
            toastr()->error(('Delete'));
            return redirect()->route('as');
        }
        else{
            toastr()->error(('You Can not delete'));
            return redirect()->route('as');
        }
    }


}
