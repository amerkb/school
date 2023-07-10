<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\curriculumRequest;
use App\Repository\LibraryRepositoryInterface;
use Illuminate\Http\Request;

class LibraryController extends Controller
{

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
}
