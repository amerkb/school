<?php

namespace App\Repository;

use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use Exception;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherRepositoryInterface
{
    public function getAllTeachers(){
       return Teacher::all();
    }
    public function Getspecialization(){
        return specialization::all();
    }

    public function GetGender(){
       return Gender::all();
    }

    public function StoreTeachers($request){
        try{
            $Teachers = new Teacher();
            $Teachers->email = $request->Email;
            $Teachers->password =  Hash::make($request->Password);
            $Teachers->phone = $request->phone;
            $Teachers->Name = $request->Name_en;
            $Teachers->Specialization_id = $request->Specialization_id;
            $Teachers->Gender_id = $request->Gender_id;
            $Teachers->Joining_Date = $request->Joining_Date;
            $Teachers->Address = $request->Address;
            $Teachers->save();
            toastr()->success(('Added Successfully'));
            return redirect()->route('teacher');
        }catch(Exception $e) {
            return redirect()->back()->with(['Error' => $e->getMessage()]);
        }
    }

    public function editTeachers($id)
    {
        return Teacher::findOrFail($id);
    }

    public function UpdateTeachers($request)
    {
        try {
            $Teachers = Teacher::findOrFail($request->id);
            $Teachers->email = $request->Email;
            $Teachers->password =  Hash::make($request->Password);
            $Teachers->Name =$request->Name_en;
            $Teachers->phone = $request->phone;
            $Teachers->Specialization_id = $request->Specialization_id;
            $Teachers->Gender_id = $request->Gender_id;
            $Teachers->Joining_Date = $request->Joining_Date;
            $Teachers->Address = $request->Address;
            $Teachers->save();
            toastr()->success('Update');
            return redirect()->route('teacher');
        }
        catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function DeleteTeachers($request)
    {
        $old_status = Teacher::where("id",$request->id)->pluck("status")[0];
        $new_status=$old_status==0?1:0;
        $class = Teacher::findOrFail($request->id)->update(["Status"=>$new_status]);
        if ($new_status==1) {
            toastr()->success(('Active'));
        }
        else{
            toastr()->warning('No Active');
        }
        return redirect()->route('teacher');

    }
}
