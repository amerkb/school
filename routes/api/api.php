<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\ChatController;
use Illuminate\Support\Facades\Route;

#################################Start Auth###################################
Route::group(['prefix' => 'auth'], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('check_user');
});
#################################End Auth####################################

#################################Start Chat###################################
Route::group(['prefix' => 'chat'], function ($router) {
    Route::get('/get', [ChatController::class, 'get']);
});
#################################End Chat####################################

