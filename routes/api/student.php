<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\EventController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\OnlineClasseController;
use App\Http\Controllers\QuestionLibrariesController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TimeTableController;
use Illuminate\Support\Facades\Route;

//#################################Start Auth###################################
//Route::group(['prefix' => 'auth'], function ($router) {
//    Route::post('/login', [AuthController::class, 'login']);
//    Route::post('/register', [AuthController::class, 'register']);
//    Route::post('/logout', [AuthController::class, 'logout'])->middleware('check_user');
//});
//#################################End Auth####################################


Route::group([ 'middleware' => 'user:student'], function ($router) {


    #################################Start Get Subject By Category###################################
    Route::get('/GetSubjectByCategory', [SubjectController::class, 'get_subject_for_student']);
    #################################End Get Subject By Category###################################

    #################################Start Get Curriculum ###################################
    Route::get('/GetCurriculum', [LibraryController::class, 'get_curriculum']);
    #################################End Get Curriculum ###################################

    #################################Start Get Book ###################################
    Route::get('/GetBook', [BookController::class, 'get_book']);
    #################################End Get Book ###################################

    #################################Start Get Question library ###################################
    Route::get('/GetQuestionLibrary', [QuestionLibrariesController::class, 'get_question_library']);
    #################################End Get Question library ###################################

    #################################Start Get lesson ###################################
    Route::get('/GetLessonForStudent', [LessonController::class, 'get_lesson_for_student']);
    #################################End Get lesson ###################################

    #################################Start Get lesson ###################################
    Route::get('/GetOnline', [OnlineClasseController::class, 'get_online_for_student']);
    #################################End Get lesson ###################################


});
