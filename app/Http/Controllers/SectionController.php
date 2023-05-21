<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Section;
use App\Http\Requests\StoreSections;
use App\Models\Classroom;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $Grades = Grade::with(['Sections'])->get();
        $list_Grades = Grade::all();
        $list_class = Classroom::all();
        $teachers = Teacher::all();
        return view(
            'pages.Sections.sections',
            compact('Grades', 'list_Grades', 'list_class', 'teachers')
        );
    }

    public function store(StoreSections $request)
    {

        try {
            $validated = $request->validated();
            $Sections = new Section();
            $Sections->Name_Section = $request->Name_Section_En;
            $Sections->Grade_id = $request->Grade_id;
            $Sections->Class_id = $request->Class_id;
            $Sections->Status = 1;
            $Sections->save();
            $Sections->teachers()->attach($request->teacher_id);
            toastr()->success(('Success'));

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(StoreSections $request)
    {

        try {
            $validated = $request->validated();
            $Sections = Section::findOrFail($request->id);

            $Sections->Name_Section = $request->Name_Section_En;
            $Sections->Grade_id = $request->Grade_id;
            $Sections->Class_id = $request->Class_id;

            if (isset($request->Status)) {
                $Sections->Status = 1;
            } else {
                $Sections->Status = 2;
            }

            // update pivot table
            if (isset($request->teacher_id)) {
                $Sections->teachers()->sync($request->teacher_id);
            } else {
                $Sections->teachers()->sync(array());
            }

            $Sections->save();
            toastr()->success(trans('Update'));

            return redirect()->route('section');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {

      Section::findOrFail($request->id)->delete();
      toastr()->success(('Delete'));
      return redirect()->back();

    }
}
