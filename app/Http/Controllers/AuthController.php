<?php
namespace App\Http\Controllers;
use App\Models\Parant;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;

class AuthController extends Controller
{
    public function login(Request $request){
      $result=check_type($request->type);
      if ($result){
          return $result;
      }
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        if (! $token = auth($request->type)->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->createNewToken($token,$request->type);
    }


    public function register(Request $request) {
        $result=check_type($request->type);
        if ($result){
            return $result;
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        if($request->type=="student"){
        $user = Student::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));
        }
        elseif($request->type=="parent"){
            $user = Parant::create(array_merge(
                $validator->validated(),
                ['password' => bcrypt($request->password)]
            ));
        }
        elseif($request->type=="teacher"){
            $user = Teacher::create(array_merge(
                $validator->validated(),
                ['password' => bcrypt($request->password)]
            ));
        }
        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }

    public function logout(Request $request) {
         Auth::guard($request->type)->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }
//    public function refresh() {
//        return $this->createNewToken(auth()->refresh());
//    }
//    public function userProfile() {
//        return response()->json(auth()->user());
//    }

    protected function createNewToken($token,$type){
        return response()->json([
            'access_token' => $token,
            'user' => auth($type)->user()
        ]);
    }
}
