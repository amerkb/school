<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\EventController;
use App\Http\Controllers\TimeTableController;
use Illuminate\Support\Facades\Route;

//#################################Start Auth###################################
//Route::group(['prefix' => 'auth'], function ($router) {
//    Route::post('/login', [AuthController::class, 'login']);
//    Route::post('/register', [AuthController::class, 'register']);
//    Route::post('/logout', [AuthController::class, 'logout'])->middleware('check_user');
//});
//#################################End Auth####################################
#################################Start event###################################



#################################End event####################################
#################################Start Timetable###################################

Route::group([ 'middleware' => 'user:student'], function ($router) {
    Route::get('/GetTimeStudent', [TimeTableController::class, 'get_time_for_student']);

});
#################################End Timetable####################################