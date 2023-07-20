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
            $Users = new User();
            $Users->email = $request->Email;
            $Users->password =  Hash::make($request->Password);
            $Users->name = $request->Name_en;
            $Users->type_id = $request->type_id;
            $Users->Status =1;
            $Users->gender_id = $request->Gender_id;
            $Users->Joining_Date = $request->Joining_Date;
            $Users->Address = $request->Address;
            $Users->save();
            toastr()->success(trans('Added Successfully'));
            return redirect()->route('ori_index');

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
             $Users = User::findOrFail($request->id);
             $Users->Email = $request->Email;
             $Users->Password =  Hash::make($request->Password);
             $Users->Name =$request->Name_en;
             $Users->type_id = $request->type_id;
             $Users->Gender_id = $request->Gender_id;
             $Users->Joining_Date = $request->Joining_Date;
             $Users->Address = $request->Address;
             $Users->save();
             toastr()->success(trans('messages.Update'));
             return redirect()->back();
         }
         catch (Exception $e) {
             return redirect()->back()->with(['error' => $e->getMessage()]);
         }
     }
 
 
     public function DeleteOriented($request)
     {
         $old_status = User::where("id",$request->id)->pluck("status")[0];
         $new_status=$old_status==0?1:0;
         $class = User::findOrFail($request->id)->update(["Status"=>$new_status]);
         if ($new_status==1) {
             toastr()->success(('Active'));
         }
         else{
             toastr()->warning('No Active');
         }
         return redirect()->route('ori_index');
     }
}