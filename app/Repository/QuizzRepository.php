<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\Quizze;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Type_Exam;
use Carbon\Carbon;

class QuizzRepository implements QuizzRepositoryInterface
{

    public function index()
    {
        $quizzes = Quizze::get();

        return view('pages.Quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        $data['grades'] = Grade::all();
        $data['types'] = Type_Exam::all();
        return view('pages.Quizzes.create', $data);
    }

    public function store($request)
    {
        try {
            $quizzes = new Quizze();
            $quizzes->name =  $request->Name_en;
            $quizzes->type_exam_id = $request->type_id;
            $quizzes->semester = $request->semester;
            $quizzes->year = $request->Year;
            $quizzes->save();
            toastr()->success(trans('success'));
            return redirect()->route('Qui_index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $quizz = Quizze::findorFail($id);
        $data['grades'] = Grade::all();
        $data['types'] = Type_Exam::all();
        return view('pages.Quizzes.edit', $data, compact('quizz'));
    }

    public function update($request)
    {
        try {
            $quizzes = Quizze::findorFail($request->id);
            $quizzes->name =  $request->Name_en;
            $quizzes->type_exam_id = $request->type_id;
            $quizzes->semester = $request->semester;
            $quizzes->year= $request->Year;
            $quizzes->save();
            toastr()->success(('Update'));
            return redirect()->route('Qui_index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            Quizze::destroy($request->id);
            toastr()->warning(('Delete'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
