<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\ChatController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

#################################Start Auth###################################
Route::group(['prefix' => 'auth'], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('check_user');
});
#################################End Auth####################################
$pts=["parent","teacher","student"];
$pt=["parent","teacher"];
$ps=["parent","student"];
$ts=["teacher","student"];
#################################Start Chat###################################
Route::group(['prefix' => 'chat', 'middleware' => 'user:'.implode(',', $pts)], function ($router) {
    Route::get('/GetConversation', [ChatController::class, 'get_conversation']);
    Route::get('/GetMember', [ChatController::class, 'get_members']);
    Route::get('/GetMessage', [ChatController::class, 'get_message']);
    Route::post('/AddMessage', [ChatController::class, 'add_message']);
    Route::delete('/DeleteMessage', [ChatController::class, 'delete_message']);
});
#################################End Chat####################################

#################################Start Attendance##################################
Route::group([ 'middleware' => 'user:'.implode(',', $ps)], function ($router) {
    Route::get('/GetAttendance', [AttendanceController::class, 'get_attendance_for_student']);
    Route::get('/GetTeacher', [TeacherController::class, 'get_teachers_for_student']);

});



#################################End Attendance####################################
