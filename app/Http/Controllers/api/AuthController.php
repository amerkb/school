<?php
namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Models\Parant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends Controller
{
    public function login(Request $request){

      $result=check_type($request->type);
      if ($result){
          return $result;
      }
        $validator = Validator::make($request->all(), [
            "email" => 'required|email',
            "password" => 'required|string|min:6',
        ]);


        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
     //   return $validator->validated();
        if (! $token = Auth::guard($request->type)->attempt($validator->validated())) {
            return response()->json(['error' => "unathntcation"], 401);
        }
        return $this->createNewToken($token,$request->type);
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
        if ($type=="parent") {
            return response()->json([
                'access_token' => $token,
                'user' => auth($type)->user()->with('children')->get()
            ]);
        }
        else{
            return response()->json([
                'access_token' => $token,
                'user' => auth($type)->user()
            ]);
        }
    }
}
