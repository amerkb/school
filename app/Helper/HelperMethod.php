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



