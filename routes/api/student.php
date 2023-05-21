<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\EventController;
use Illuminate\Support\Facades\Route;

//#################################Start Auth###################################
//Route::group(['prefix' => 'auth'], function ($router) {
//    Route::post('/login', [AuthController::class, 'login']);
//    Route::post('/register', [AuthController::class, 'register']);
//    Route::post('/logout', [AuthController::class, 'logout'])->middleware('check_user');
//});
//#################################End Auth####################################
#################################Start event###################################

    Route::get('/events', [EventController::class, 'get_event']);

#################################End event####################################
