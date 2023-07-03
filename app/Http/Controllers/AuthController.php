<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function welcome()
    {
        return view('welcome');
    }
    public function login(Request $request)
    {
//$remember_me=$request->has("remember_me")?true:false;
if (auth()->guard("web")->
attempt(["email"=>$request->input("email"),
"password"=>$request->input("password"),
])){
    toastr()->success("success login");
return redirect()->route('dashboard');
}
else{
    toastr()->error("failed login");
    return redirect()->route('view.login');
}}

    public function logout(Request $request)
    {
        auth()->guard("web")->logout();
        return redirect()->route('welcome');
    }
}
