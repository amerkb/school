<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\ChatController;
use App\Http\Controllers\api\EventController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\QuizzesController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\TeacherController;

use App\Http\Controllers\TimeTableController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
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


Route::group([ 'middleware' => 'user:'.implode(',', $ps)], function ($router) {


    #################################Start Timetable###################################
    Route::get('/GetTimeStudent', [TimeTableController::class, 'get_time_for_student']);
    Route::get('/GetTimeForParent', [TimeTableController::class, 'get_time_for_parent']);
    #################################End Timetable####################################

    #################################Start Attendance##################################
    Route::get('/GetAttendance', [AttendanceController::class, 'get_attendance_for_student']);
    Route::get('/GetAttendanceForParent', [AttendanceController::class, 'get_attendance_for_parent']);

    #################################End Attendance####################################

    #################################Start Teacher##################################
    Route::get('/GetTeacher', [TeacherController::class, 'get_teachers_for_student']);
    Route::get('/GetTeacherForParent', [TeacherController::class, 'get_teachers_for_parent']);
    #################################End Teacher##################################

    #################################Start Quizze####################################
    Route::get('/GetQuizze', [QuizzesController::class, 'get_quizze_for_student']);
    Route::get('/GetQuizzeForParent', [QuizzesController::class, 'get_quizze_for_parent']);

    #################################End Quizze##################################

    #################################Start Result##################################
    Route::get('/GetResult', [ResultController::class, 'get_result_for_student']);
    Route::get('/GetResultForParent', [ResultController::class, 'get_result_for_parent']);

    #################################End Result####################################
});


#################################Start event ####################################

Route::group([ 'middleware' => 'user:'.implode(',', $pts)], function ($router) {
    Route::get('/events', [EventController::class, 'get_event']);

});
#################################End event ####################################
Route::post('/image', function () {
    $path = public_path("attachments/book/2018-2019-2 (2).pdf");
    if (!File::exists($path)) {
      return 1;
    }
    $a=[];
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;

});