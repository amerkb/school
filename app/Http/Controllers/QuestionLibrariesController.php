<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionLbraryRequest;
use App\Http\Traits\AttachFilesTrait;
use App\Models\Book;
use App\Models\Grade;
use App\Models\Question_libraries;
use App\Http\Controllers\Controller;
use App\Models\Quizze;
use App\Models\SubjectExam;
use App\Traits\GeneralTrait;
use App\Transformers\BookTransformer;
use App\Transformers\QuestionLibraryTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionLibrariesController extends Controller
{ use AttachFilesTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Question_libraries::all();
        return view('pages.question_library.index',compact('books'));
    }
    /**
     * Display a listing of the resource.
     */
    public function exam($id)
    {
        $data = Quizze::with("se")
            ->whereHas("se", function($query) use($id) {
                $query->where("classroom_id", $id);
            })
            ->orderBy("year","DESC")->pluck("name", "id");
            return $data;

    }
    /**
     * Display a listing of the resource.
     */
    public function se($id)
    {
        $data =SubjectExam::select("quizzes_subject.*","subjects.name")->join('subjects', 'quizzes_subject.subject_id', '=', 'subjects.id')
               -> where("quizze_id",$id)->pluck("subjects.name", "quizzes_subject.id");
        return $data;

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grades = Grade::all();
        return view('pages.question_library.create',compact('grades'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionLbraryRequest $request)
    {
        try {
            $books = new Question_libraries();
            $books->title = $request->title;
            $books->Classroom_id = $request->Classroom_id;
            $books->quizze_id = $request->Quizze_Id;
            $books->quizzes_subject_id = $request->Se_Id;
            $books->file_name =  $request->file('file_name')->getClientOriginalName();
            $books->grade_id=$request->Grade_id;

            $books->save();
            $this->uploadquestion($request,'file_name');
            toastr()->success(('Success'));
            return redirect()->route('Questionli_index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data["book"] = Question_libraries::findorFail($id);
        $data["grades"] = Grade::all();
        $data["quizzes"]=Quizze::with("se")
            ->whereHas("se", function($query) use($data) {
                $query->where("classroom_id", $data["book"]["Classroom_id"]);
            })
            ->get();
        $data["se"]=SubjectExam::select("quizzes_subject.*","subjects.name")->join('subjects', 'quizzes_subject.subject_id', '=', 'subjects.id')
            -> where("quizze_id",$data["book"]["quizze_id"])->get();


        return view('pages.question_library.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuestionLbraryRequest $request,$id)
    {
        try {

            $book = Question_libraries::findorFail($id);
            $book->title = $request->title;
            $book->Classroom_id = $request->Classroom_id;
            $book->quizze_id = $request->Quizze_Id;
            $book->quizzes_subject_id = $request->Se_Id;
            $book->grade_id=$request->Grade_id;
            if($request->hasfile('file_name')){

                $this->deleteQuestion($book->file_name);

                $this->uploadquestion($request,'file_name');

                $file_name_new = $request->file('file_name')->getClientOriginalName();
                $book->file_name = $book->file_name !== $file_name_new ? $file_name_new : $book->file_name;
            }


            $book->save();
            toastr()->success(('Update'));
            return redirect()->route('Questionli_index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $this->deleteQuestion($request->file_name);
            Question_libraries::destroy($request->id);
            toastr()->warning(('Delete'));
            return redirect()->route('Questionli_index');

        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function download($filename)
    {
        return response()->download(public_path('attachments/question/'.$filename));
    }
    use GeneralTrait;
    public function get_question_library(Request $request)
    {
        try {

            if ($request->role == "student") {

                $class = Auth::guard($request->role)->user()->Classroom_id;
                $questions=Question_libraries::where("Classroom_id",$class)->get();
                $questionsTransfermer=[];
                foreach ($questions as $index=> $question){
                    $questionsTransfermer[$index] = fractal($question, new QuestionLibraryTransformer())->toArray();
                    $questionsTransfermer[$index]= $questionsTransfermer[$index]["data"];
                }
                return $this ->returnData("questions" ,$questionsTransfermer,"count_questions",$questions->count());


            }
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }

    }

}
