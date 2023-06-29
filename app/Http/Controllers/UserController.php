<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Gender;
use App\Repository\UserRepositoryInterface;
use App\Http\Requests\StoreTeachers;
use Illuminate\Support\Facades\Hash;
use Exception;


use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user;
    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $Oriented = $this->user->getAll();
        return view('pages.School_oriented.index', compact('Oriented'));
    }


    public function create()
    {
        $type_user = $this->user->Get_type();
        $genders = $this->user->GetGender();
        return view('pages.School_oriented.create', compact('genders', 'type_user'));
    }

    public function store(Request $request)
    {
        return $this->user->StoreOriented($request);
    }

    public function edit($id)
    {
        $Users = $this->user->editOriented($id);
        $genders = $this->user->GetGender();
        $type_user = $this->user->Get_type();
        return view('pages.School_oriented.edit',compact('Users','genders','type_user'));
    }

    public function update(Request $request) {
        return $this->user->UpdateOriented($request);
    }

    public function destroy(Request $request)
    {
        return $this->user->DeleteOriented($request);
    }

}
