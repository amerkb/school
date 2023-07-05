<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Student;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use App\Repository\ResultRepositoryInterface;
use LDAP\Result;

class ResultController extends Controller
{
    use GeneralTrait;
    protected $result;

    public function __construct(ResultRepositoryInterface $result)
    {
        $this->result = $result;
    }

    
    public function index()
    {
        return $this->result->index();
    }

    public function store(Request $request)
    {
        return $this->result->store($request);
    }


    public function show($id)
    {
        return $this->result->show($id);
    }
}
