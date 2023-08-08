<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\curriculumRequest;
use App\Models\Library;
use App\Repository\LibraryRepositoryInterface;
use App\Traits\GeneralTrait;
use App\Transformers\CurriculumTransformer;
use App\Transformers\TimeTableTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{
    use GeneralTrait;

    protected $library;

    public function __construct(LibraryRepositoryInterface $library)
    {
        $this->library = $library;
    }

    public function index()
    {
      return $this->library->index();
    }

    public function create()
    {
        return $this->library->create();
    }

    public function store(curriculumRequest $request)
    {
        return $this->library->store($request);
    }

    public function edit($id)
    {
        return $this->library->edit($id);
    }


    public function update(curriculumRequest $request)
    {
        return $this->library->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->library->destroy($request);
    }

    public function downloadAttachment($filename)
    {
        return $this->library->download($filename);
    }
    public function get_curriculum(Request $request)
    {
        try {

            if ($request->role == "student") {
                $year = Auth::guard($request->role)->user()->academic_year;
                $class = Auth::guard($request->role)->user()->Classroom_id;

           $Curriculums=Library::where([["Classroom_id",$class],["year",$year]])->get();
                $CurriculumsTransfermer=[];
                foreach ($Curriculums as $index=> $Curriculum){
                    $CurriculumsTransfermer[$index] = fractal($Curriculum, new CurriculumTransformer())->toArray();
                    $CurriculumsTransfermer[$index]= $CurriculumsTransfermer[$index]["data"];
                }
                return $this ->returnData("Curriculums" ,$CurriculumsTransfermer,"count_Curriculums",$Curriculums->count());


            }
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }

    }

}
