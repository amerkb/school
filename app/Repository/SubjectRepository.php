<?php


namespace App\Repository;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\SubjectsCategorie;
use App\Models\Teacher;

class SubjectRepository implements SubjectRepositoryInterface
{

    public function index()
    {


          $subjects = Subject::with("category")->orderBy("name")->get();
        return view('pages.Subjects.index',compact('subjects'));
    }

    public function create()
    {
        $category=SubjectsCategorie::all();
        $grades = Grade::get();
        $teachers = Teacher::get();
        $Class = Classroom::get();
        return view('pages.Subjects.create',compact('grades','Class','teachers',"category"));
    }


    public function store($request)
    {
        try {
            $subjects = new Subject();
            $subjects->name =$request->Name_en;
            $subjects->grade_id = $request->Grade_id;
            $subjects->classroom_id = $request->Class_id;
            $subjects->subject_category_id = $request->category_Id;
            $subjects->save();
            toastr()->success(('Success'));
            return redirect()->route('Sub_index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function edit($id){
        $category=SubjectsCategorie::all();
        $subject =Subject::findorfail($id);
        $grades = Grade::get();
        $teachers = Teacher::get();
        return view('pages.Subjects.edit',compact('subject','grades','teachers',"category"));

    }

    public function update($request)
    {
        try {
            $subjects =  Subject::findorfail($request->id);
            $subjects->name = $request->Name_en;
            $subjects->grade_id = $request->Grade_id;
            $subjects->classroom_id = $request->Class_id;
            $subjects->subject_category_id = $request->category_Id;
            $subjects->save();
            toastr()->success(trans('Update'));
            return redirect()->route('Sub_index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            Subject::destroy($request->id);
            toastr()->warning(('Delete'));
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}