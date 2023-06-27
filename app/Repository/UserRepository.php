<?php

namespace App\Repository;

use App\Models\Gender;
use App\Models\Type_User;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function getAll(){
        return User::all();
     }
 
     public function GetGender(){
        return Gender::all();
     }

     public function Get_type(){
        return Type_User::all();
     }
 
     public function StoreOriented($request){
        try{
            $Teachers = new User();
            $Teachers->email = $request->Email;
            $Teachers->password =  Hash::make($request->Password);
            $Teachers->name = $request->Name_en;
            $Teachers->type_id = $request->type_id;
            $Teachers->gender_id = $request->Gender_id;
            $Teachers->Joining_Date = $request->Joining_Date;
            $Teachers->Address = $request->Address;
            $Teachers->save();
            toastr()->success(trans('Added Successfully'));
            return redirect()->route('ori_index');
           return $request;
        }catch(Exception $e) {
            return redirect()->back()->with(['Error' => $e->getMessage()]);
        }
     }
 
     public function editOriented($id)
     {
         return User::findOrFail($id);
     }
 
     public function UpdateOriented($request)
     {
         try {
             $Oriented = User::findOrFail($request->id);
             $Oriented->Email = $request->Email;
             $Oriented->Password =  Hash::make($request->Password);
             $Oriented->Name =$request->Name_en;
             $Oriented->Specialization_id = $request->Specialization_id;
             $Oriented->Gender_id = $request->Gender_id;
             $Oriented->Joining_Date = $request->Joining_Date;
             $Oriented->Address = $request->Address;
             $Oriented->save();
             toastr()->success(trans('messages.Update'));
             return redirect()->back();
         }
         catch (Exception $e) {
             return redirect()->back()->with(['error' => $e->getMessage()]);
         }
     }
 
 
     public function DeleteOriented($request)
     {
         User::findOrFail($request->id)->delete();
         toastr()->error(('Deleted'));
         return redirect()->back();
     }
}