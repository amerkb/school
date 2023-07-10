<?php

use Illuminate\Support\Facades\Config;


function check_type($type){
    if(!$type){
        return response()->json(['status' => 'enter type please']);
    }
    if($type!="teacher" && $type!="parent"&& $type!="student"){
        return response()->json(['status' => ' type is not found']);
    }
}
function get_default_lang(){

    return config::get("app.locale");
}
function uploade_image($name,$path,$file){
    $extension=$file->extension();
    $newimg=time()."-".$name.".".$extension;
    $file->move($path,$newimg);
    return $path ."/". $newimg;
}
function role ($role){
   if ($role=="student"){
       return "App\Models\Student";
   }
   elseif ($role=="teacher"){
       return "App\Models\Teacher";
   }
   elseif ($role=="parent"){
       return "App\Models\MyParent";
   }
}
function IsManager ($type){

    if ($type=="Manager"){
        return true;
    }
    else{
        return false;
    }}

    function IsLibrarian ($type){

        if ($type=="librarian"){
            return true;
        }
        else{
            return false;
        }}



