<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResultController;
use App\Models\Attendance;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeesController;
use App\Http\Controllers\HomeController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\OnlineClasseController;
use App\Http\Controllers\OrientedController;
use App\Http\Controllers\PaymentStudentController;
use App\Http\Controllers\ProcessingFeeController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizzesController;
use App\Http\Controllers\ReceiptStudentController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SetingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\GraduatedController;
use App\Http\Controllers\TimeTableController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\FeesInvoicesController;
use App\Http\Controllers\UserController;
use LDAP\Result;

//Auth::routes();

// Route::get('/', function () {
//     return view('welcome');
// });



Route::group(["middleware"=>"guest"], function ($router) {
    Route::get('/login',[AuthController::class,'index'])
        ->name('view.login');
    Route::get('/',[AuthController::class,'welcome'])->name('welcome');;
    Route::post('/login',[AuthController::class,'login'])
        ->name('check.login');
//     Route::get('/login/{type}', [App\Http\Controllers\Auth\LoginController::class, 'loginForm'])
//     ->middleware('guest')
//     ->name('login.show');
//
//
////     Route::post('/login','LoginController@login')->name('login');
//    Route::post('/login',[LoginController::class, 'login'])->name('login');
//
//     Route::post('/login',[App\Http\Controllers\Auth\LoginController::class,'login'])->name('login');
//
//
//     Route::get('/logout/{type}',[App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');

});
Route::group(["middleware" => "auth"], function ($router) {
    Route::get('/logout',[AuthController::class,'logout'])
        ->name('logout');
///////////// dashboard
    Route::get('/dashboard', [HomeController::class, 'dashboard'])
        ->name('dashboard');


    Route::group(
        [
            //'prefix' => LaravelLocalization::setLocale(),
            'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:student']
        ], function () {

        //==============================dashboard============================
        Route::get('/student/dashboard', function () {
            return view('pages.Students.dashboard');
        });

    });


///////////// Grades /////////////
    Route::get('/home', [HomeController::class, 'index'])
        ->name('home');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])
        ->name('dashboard');


    Route::get('/Grades', [GradeController::class, 'index'])
        ->name('as');

    Route::get('/Update', [GradeController::class, 'update'])
        ->name('date');

    Route::get('storeGrade', [GradeController::class, 'store'])
        ->name('storeGrade');

    Route::get('/destroy', [GradeController::class, 'destroy'])
        ->name('destroy');


/////////////////// Classroom ////////////////


    Route::get('classindex', [ClassroomController::class, 'index'])
        ->name('classindex');

    Route::get('classstore', [ClassroomController::class, 'store'])
        ->name('classstore');


    Route::get('classdestroy', [ClassroomController::class, 'destroy'])
        ->name('classdestroy');

    Route::get('classupdate', [ClassroomController::class, 'update'])
        ->name('classupdate');


    Route::get('class_delete_all', [ClassroomController::class, 'delete_all'])
        ->name('class_delete_all');


    Route::get('class_Filter_Classes', [ClassroomController::class, 'Filter_Classes'])
        ->name('Filter_Classes');


/////////////////////  Sections ///////////////////

    Route::get('section', [SectionController::class, 'index'])
        ->name('section');


    Route::get('sectionstore', [SectionController::class, 'store'])
        ->name('sectionstore');


    Route::get('sectionupdate', [SectionController::class, 'update'])
        ->name('sectionupdate');

    Route::get('sectiondestroy', [SectionController::class, 'destroy'])
        ->name('sectiondestroy');


////////////////////// Add Parents  //////////////////

    Route::view('add_parent', 'livewire.show_Form')->name("add_parent");


///////////////////// Teacher ///////////////////////
    Route::get('teacher', [TeacherController::class, 'index'])
        ->name('teacher');

    Route::get('createteacher', [TeacherController::class, 'create'])
        ->name('createteacher');


Route::get('storeteacher', [TeacherController::class, 'store'])
->name('storeteacher');


Route::get('editteacher/{id}', [TeacherController::class, 'edit'])
->name('editteacher');

Route::get('updateteacher', [TeacherController::class, 'update'])
->name('updateteacher');


Route::get('destroyteacher', [TeacherController::class, 'destroy'])
->name('destroyteacher');

    Route::get('storeteacher', [TeacherController::class, 'store'])
        ->name('storeteacher');

//
//
//    Route::get('editteacher', [TeacherController::class, 'edit'])
//        ->name('editteacher');
//
//    Route::get('updateteacher', [TeacherController::class, 'update'])
//        ->name('updateteacher');
//
//
//    Route::get('destroyteacher', [TeacherController::class, 'destroy'])
//        ->name('destroyteacher');


////////////////////// Students /////////////////

    Route::get('create', [StudentController::class, 'create'])
        ->name('create');


    Route::get('index', [StudentController::class, 'index'])
        ->name('index');

    Route::get('Get_classrooms/{id}', [StudentController::class, 'Get_classrooms'])
        ->name('Get_classrooms');

    Route::get('Get_Subject/{id}', [SubjectController::class, 'Get_Subject'])
        ->name('Get_Subject');
    Route::get('Get_Subject_quizze/{id}', [SubjectController::class, 'Get_Subject_quizze'])
        ->name('Get_Subject_quizze');

    Route::get('Get_Sections/{id}', [StudentController::class, 'Get_Sections'])
        ->name('Get_Sections');


    Route::get('Store_Student', [StudentController::class, 'Store_Student'])
        ->name('Store_Student');

    Route::get('destroy_Student', [StudentController::class, 'destroy'])
        ->name('destroy_Student');

    Route::get('edit_Student\{id}', [StudentController::class, 'edit'])
        ->name('edit_Student');

    Route::get('update_Student\{id}', [StudentController::class, 'update'])
        ->name('update_Student');


    Route::get('show_Student/{id}', [StudentController::class, 'show'])
        ->name('show_Student');


    Route::get('Upload_attachment', [StudentController::class, 'Upload_attachment'])
        ->name('Upload_attachment');


////////////// Promotion Students

    Route::get('proindex', [PromotionController::class, 'index'])
        ->name('proindex');


    Route::get('store', [PromotionController::class, 'store'])
        ->name('store');

    Route::get('createpro', [PromotionController::class, 'create'])
        ->name('createpro');

    Route::get('destroypro', [PromotionController::class, 'destroy'])
        ->name('destroypro');


//////////////////  Graduated Students

    Route::get('indexGra', [GraduatedController::class, 'index'])
        ->name('indexGra');

    Route::get('createGra', [GraduatedController::class, 'create'])
        ->name('createGra');

    Route::get('storeGra', [GraduatedController::class, 'store'])
        ->name('storeGra');

    Route::get('updateGra', [GraduatedController::class, 'update'])
        ->name('updateGra');

    Route::get('destroyGra', [GraduatedController::class, 'destroy'])
        ->name('destroyGra');


////////////////  Fees

    Route::get('indexfee', [FeesController::class, 'index'])
        ->name('indexfee');

    Route::get('createfee', [FeesController::class, 'create'])
        ->name('createfee');

    Route::get('storefee', [FeesController::class, 'store'])
        ->name('storefee');

    Route::get('editfee{id}', [FeesController::class, 'edit'])
        ->name('editfee');

    Route::get('updatefee', [FeesController::class, 'update'])
        ->name('updatefee');

    Route::get('destroyfee', [FeesController::class, 'destroy'])
        ->name('destroyfee');


//////////// Fees Invoices

    Route::get('Invoices_index', [FeesInvoicesController::class, 'index'])
        ->name('Invoices_index');

    Route::get('Invoices_store', [FeesInvoicesController::class, 'store'])
        ->name('Invoices_store');

    Route::get('Invoices_show{id}', [FeesInvoicesController::class, 'show'])
        ->name('Invoices_show');

    Route::get('Invoices_edit', [FeesInvoicesController::class, 'edit'])
        ->name('Invoices_edit');

    Route::get('Invoices_update', [FeesInvoicesController::class, 'update'])
        ->name('Invoices_update');

    Route::get('Invoices_destroy', [FeesInvoicesController::class, 'destroy'])
        ->name('Invoices_destroy');


/////////////////   Receipt

    Route::get('Receipt_index', [ReceiptStudentController::class, 'index'])
        ->name('Receipt_index');

    Route::get('Receipt_store', [ReceiptStudentController::class, 'store'])
        ->name('Receipt_store');

    Route::get('Receipt_show{id}', [ReceiptStudentController::class, 'show'])
        ->name('Receipt_show');

    Route::get('Receipt_edit{id}', [ReceiptStudentController::class, 'edit'])
        ->name('Receipt_edit');

    Route::get('Receipt_update', [ReceiptStudentController::class, 'update'])
        ->name('Receipt_update');

    Route::get('Receipt_destroy', [ReceiptStudentController::class, 'destroy'])
        ->name('Receipt_destroy');


//////////////////   Processing Fees


    Route::get('Process_index', [ProcessingFeeController::class, 'index'])
        ->name('Process_index');

    Route::get('Process_store', [ProcessingFeeController::class, 'store'])
        ->name('Process_store');

    Route::get('Process_show{id}', [ProcessingFeeController::class, 'show'])
        ->name('Process_show');

    Route::get('Process_edit', [ProcessingFeeController::class, 'edit'])
        ->name('Process_edit');

    Route::get('Process_update', [ProcessingFeeController::class, 'update'])
        ->name('Process_update');

    Route::get('Process_destroy', [ProcessingFeeController::class, 'destroy'])
        ->name('Process_destroy');


///////////////  Payment Students


    Route::get('Payment_index', [PaymentStudentController::class, 'index'])
        ->name('Payment_index');

    Route::get('Payment_store', [PaymentStudentController::class, 'store'])
        ->name('Payment_store');

    Route::get('Payment_show{id}', [PaymentStudentController::class, 'show'])
        ->name('Payment_show');

    Route::get('Payment_edit', [PaymentStudentController::class, 'edit'])
        ->name('Payment_edit');

    Route::get('Payment_update', [PaymentStudentController::class, 'update'])
        ->name('Payment_update');

    Route::get('Payment_destroy', [PaymentStudentController::class, 'destroy'])
        ->name('Payment_destroy');


///////////  Attendance Students


    Route::get('Attendance_index', [AttendanceController::class, 'index'])
        ->name('Attendance_index');

    Route::get('Attendance_store', [AttendanceController::class, 'store'])
        ->name('Attendance_store');

    Route::get('Attendance_show{id}', [AttendanceController::class, 'show'])
        ->name('Attendance_show');


/////////////  Subject


    Route::get('Sub_index', [SubjectController::class, 'index'])
        ->name('Sub_index');

    Route::get('Sub_store', [SubjectController::class, 'store'])
        ->name('Sub_store');

    Route::get('Sub_create', [SubjectController::class, 'create'])
        ->name('Sub_create');


    Route::get('Sub_edit{id}', [SubjectController::class, 'edit'])
        ->name('Sub_edit');

    Route::get('Sub_update', [SubjectController::class, 'update'])
        ->name('Sub_update');

    Route::get('Sub_destroy', [SubjectController::class, 'destroy'])
        ->name('Sub_destroy');


//////////// Quizzes


    Route::get('Qui_index', [QuizzesController::class, 'index'])
        ->name('Qui_index');

    Route::get('Qui_store', [QuizzesController::class, 'store'])
        ->name('Qui_store');

    Route::get('Qui_create', [QuizzesController::class, 'create'])
        ->name('Qui_create');

    Route::get('Qui_edit{id}', [QuizzesController::class, 'edit'])
        ->name('Qui_edit');

    Route::get('Qui_update', [QuizzesController::class, 'update'])
        ->name('Qui_update');

    Route::get('Qui_destroy', [QuizzesController::class, 'destroy'])
        ->name('Qui_destroy');

    Route::get('quizze/manage/{id}', [QuizzesController::class, 'manage'])
        ->name('quizze.manage');
// add se
    Route::get('quizze/create/subject/{id}', [QuizzesController::class, 'se_create'])
        ->name('se.add');
    Route::post('quizze/store/subject/{id}', [QuizzesController::class, 'se_store'])
        ->name('se.store');
    Route::get('quizze/edit/subject/{id}', [QuizzesController::class, 'se_edit'])
        ->name('se.edit');
    Route::post('quizze/update/subject/{id}', [QuizzesController::class, 'se_update'])
        ->name('se.update');
    Route::get('quizze/delete/subject/{id}', [QuizzesController::class, 'se_delete'])
        ->name('se.delete');
    Route::get('quizze/view/{id}', [QuizzesController::class, 'se_view'])
        ->name('quizze.view');
    //////////////// Result

    Route::get('/create/result', [ResultController::class, 'create'])
        ->name('ru.create');
    Route::get('/class/{id}', [ResultController::class, 'class'])
        ->name('ru.class');
    Route::get('/section/{id}', [ResultController::class, 'section'])
        ->name('ru.section');


////////////   Questions


    Route::get('Ques_index', [QuestionController::class, 'index'])
        ->name('Ques_index');

    Route::get('Ques_store', [QuestionController::class, 'store'])
        ->name('Ques_store');

    Route::get('Ques_create', [QuestionController::class, 'create'])
        ->name('Ques_create');

    Route::get('QuesQui_edit{id}', [QuestionController::class, 'edit'])
        ->name('Ques_edit');

    Route::get('Ques_update', [QuestionController::class, 'update'])
        ->name('Ques_update');

    Route::get('Ques_destroy', [QuestionController::class, 'destroy'])
        ->name('Ques_destroy');


///////////// Online Class


    Route::get('Online_index', [OnlineClasseController::class, 'index'])
        ->name('Online_index');

    Route::get('Online_indirectCreate', [OnlineClasseController::class, 'indirectCreate'])
        ->name('Online_indirectCreate');

    Route::get('Online_store', [OnlineClasseController::class, 'store'])
        ->name('Online_store');

    Route::get('Online_storeIndirect', [OnlineClasseController::class, 'storeIndirect'])
        ->name('Online_storeIndirect');

    Route::get('Online_create', [OnlineClasseController::class, 'create'])
        ->name('Online_create');

    Route::get('Online_destroy', [OnlineClasseController::class, 'destroy'])
        ->name('Online_destroy');


///////  Library


    Route::get('Lib_index', [LibraryController::class, 'index'])
        ->name('Lib_index');

    Route::post('Lib_store', [LibraryController::class, 'store'])
        ->name('Lib_store');

    Route::get('Lib_create', [LibraryController::class, 'create'])
        ->name('Lib_create');

    Route::get('Lib_edit{id}', [LibraryController::class, 'edit'])
        ->name('Lib_edit');

    Route::get('Lib_update', [LibraryController::class, 'update'])
        ->name('Lib_update');

    Route::get('Lib_destroy', [LibraryController::class, 'destroy'])
        ->name('Lib_destroy');

    Route::get('Lib_download/{filename}', [LibraryController::class, 'downloadAttachment'])
        ->name('Lib_download');


///////////   Setting


    Route::get('Seting_index', [SetingController::class, 'index'])
        ->name('Seting_index');

    Route::get('Seting_update', [SetingController::class, 'update'])
        ->name('Seting_update');



/////////  TimeTableController

Route::get('time', [TimeTableController::class, 'index'])
->name('time_index');
Route::get('time/showttr', [TimeTableController::class, 'show'])
    ->name('ttr_show');
Route::post('time', [TimeTableController::class, 'create'])
->name('time_create');
Route::get('time/show/{id}', [TimeTableController::class, 'view'])
->name('ttr.show');
Route::get('time/manage/{id}', [TimeTableController::class, 'manage'])
->name('ttr.manage');
Route::get('time/edit/{id}', [TimeTableController::class, 'edit'])
->name('ttr.edit');
Route::get('time/destroy/{id}', [TimeTableController::class, 'destroy'])
->name('ttr.destroy');
Route::post('time/update/{id}', [TimeTableController::class, 'update'])
    ->name('ttr.update');




//ts
Route::get('timeslot/view', [TimeTableController::class, 'ts_index'])
    ->name('ts.index');
Route::get('timeslot/create', [TimeTableController::class, 'createts'])
    ->name('ts.create');
Route::post('timeslot/store', [TimeTableController::class, 'ts_store'])
    ->name('ts.store');
Route::get('timeslot/edit/{id}', [TimeTableController::class, 'ts_edit'])
    ->name('ts.edit');
Route::post('timeslot/update/{id}', [TimeTableController::class, 'ts_update'])
    ->name('ts.update');
Route::get('timeslot/delete/{id}', [TimeTableController::class, 'ts_delete'])
    ->name('ts.delete');



    Route::get('time', [TimeTableController::class, 'index'])
        ->name('time_index');
    Route::get('time/showttr', [TimeTableController::class, 'show'])
        ->name('ttr_show');
    Route::post('time', [TimeTableController::class, 'create'])
        ->name('time_create');
    Route::get('time/show/{id}', [TimeTableController::class, 'view'])
        ->name('ttr.show');
    Route::get('time/manage/{id}', [TimeTableController::class, 'manage'])
        ->name('ttr.manage');
    Route::get('time/edit/{id}', [TimeTableController::class, 'edit'])
        ->name('ttr.edit');
    Route::get('time/destroy/{id}', [TimeTableController::class, 'destroy'])
        ->name('ttr.destroy');
    Route::post('time/update/{id}', [TimeTableController::class, 'update'])
        ->name('ttr.update');
//ts
    Route::get('timeslot/view', [TimeTableController::class, 'ts_index'])
        ->name('ts.index');
    Route::get('timeslot/create', [TimeTableController::class, 'createts'])
        ->name('ts.create');
    Route::post('timeslot/store', [TimeTableController::class, 'ts_store'])
        ->name('ts.store');
    Route::get('timeslot/edit/{id}', [TimeTableController::class, 'ts_edit'])
        ->name('ts.edit');
    Route::post('timeslot/update/{id}', [TimeTableController::class, 'ts_update'])
        ->name('ts.update');
    Route::get('timeslot/delete/{id}', [TimeTableController::class, 'ts_delete'])
        ->name('ts.delete');

//lecture
    Route::get('lecture/create/{id}', [TimeTableController::class, 'l_create'])
        ->name('l.create');
    Route::post('lecture/store/{id}', [TimeTableController::class, 'l_store'])
        ->name('l.store');
    Route::get('lecture/edit/{id_lecture}', [TimeTableController::class, 'l_edit'])
        ->name('l.edit');
    Route::post('lecture/update/{id_lecture}', [TimeTableController::class, 'l_update'])
        ->name('l.update');
    Route::get('lecture/delete/{id_lecture}', [TimeTableController::class, 'l_destroy'])
        ->name('l.delete');


/////////////   School Oriented

    Route::get('ori_index', [UserController::class, 'index'])
        ->name('ori_index');


    Route::get('ori_create', [UserController::class, 'create'])
        ->name('ori_create');


    Route::get('ori_store', [UserController::class, 'store'])
        ->name('ori_store');


Route::get('ori_edit{id}', [UserController::class, 'edit'])
->name('ori_edit');

    Route::get('ori_edit', [UserController::class, 'edit'])
        ->name('ori_edit');



    Route::get('ori_destroy', [UserController::class, 'destroy'])
        ->name('ori_destroy');});


///////////  Result Students


    Route::get('Result_index', [ResultController::class, 'index'])
    ->name('Result_index');

Route::get('Result_store', [ResultController::class, 'store'])
    ->name('Result_store');

Route::get('Result_show/{id}/{year}/{se}', [ResultController::class, 'show'])
    ->name('Result_show');

Route::get('Result/show/exam/{id}', [ResultController::class, 'show_exam'])
    ->name('Result_exam');
Route::post('Result/show/store_update/{id}', [ResultController::class, 'ur_store'])
    ->name('ur.store.update');