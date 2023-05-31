<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Grades\GradeController;
use App\Models\Attendance;
use Illuminate\Support\Facades\Route;

//Auth::routes();

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[\App\Http\Controllers\HomeController::class,'index'])
->name('selection');

Route::group(['prefix' => 'auth'], function ($router) {

    Route::get('/login/{type}','LoginController@loginForm')->middleware('guest')
     ->name('login.show');

     Route::post('/login','LoginController@login')->name('login');


});


///////////// Grades /////////////
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
->name('home');


Route::get('/Grades', [App\Http\Controllers\GradeController::class,'index'])
->name('as');

Route::get('/Update', [App\Http\Controllers\GradeController::class,'update'])
->name('date');

Route::get('storeGrade', [App\Http\Controllers\GradeController::class,'store'])
->name('storeGrade');

Route::get('/destroy', [App\Http\Controllers\GradeController::class,'destroy'])
->name('destroy');


/////////////////// Classroom ////////////////


Route::get('classindex', [App\Http\Controllers\ClassroomController::class, 'index'])
->name('classindex');

Route::get('classstore', [App\Http\Controllers\ClassroomController::class, 'store'])
->name('classstore');


Route::get('classdestroy', [App\Http\Controllers\ClassroomController::class, 'destroy'])
->name('classdestroy');

Route::get('classupdate', [App\Http\Controllers\ClassroomController::class, 'update'])
->name('classupdate');


Route::get('class_delete_all', [App\Http\Controllers\ClassroomController::class, 'delete_all'])
->name('class_delete_all');


Route::get('class_Filter_Classes', [App\Http\Controllers\ClassroomController::class, 'Filter_Classes'])
->name('Filter_Classes');




/////////////////////  Sections ///////////////////

Route::get('section', [App\Http\Controllers\SectionController::class, 'index'])
->name('section');


Route::get('sectionstore', [App\Http\Controllers\SectionController::class, 'store'])
->name('sectionstore');


Route::get('sectionupdate', [App\Http\Controllers\SectionController::class, 'update'])
->name('sectionupdate');

Route::get('sectiondestroy', [App\Http\Controllers\SectionController::class, 'destroy'])
->name('sectiondestroy');




////////////////////// Add Parents  //////////////////

Route::view('add_parent','livewire.show_Form');



///////////////////// Teacher ///////////////////////
Route::get('teacher', [App\Http\Controllers\TeacherController::class, 'index'])
->name('teacher');

Route::get('createteacher', [App\Http\Controllers\TeacherController::class, 'create'])
->name('createteacher');

Route::get('storeteacher', [App\Http\Controllers\TeacherController::class, 'store'])
->name('storeteacher');


Route::get('editteacher', [App\Http\Controllers\TeacherController::class, 'edit'])
->name('editteacher');

Route::get('updateteacher', [App\Http\Controllers\TeacherController::class, 'update'])
->name('updateteacher');


Route::get('destroyteacher', [App\Http\Controllers\TeacherController::class, 'destroy'])
->name('destroyteacher');







////////////////////// Students /////////////////

Route::get('create', [App\Http\Controllers\StudentController::class, 'create'])
->name('create');


Route::get('index', [App\Http\Controllers\StudentController::class, 'index'])
->name('index');

Route::get('Get_classrooms/{id}', [App\Http\Controllers\StudentController::class, 'Get_classrooms'])
->name('Get_classrooms');

Route::get('Get_Sections/{id}', [App\Http\Controllers\StudentController::class, 'Get_Sections'])
->name('Get_Sections');


Route::get('Store_Student', [App\Http\Controllers\StudentController::class, 'Store_Student'])
->name('Store_Student');

Route::get('destroy_Student', [App\Http\Controllers\StudentController::class, 'destroy'])
->name('destroy_Student');

Route::get('edit_Student\{id}', [App\Http\Controllers\StudentController::class, 'edit'])
->name('edit_Student');

Route::get('update_Student\{id}', [App\Http\Controllers\StudentController::class, 'update'])
->name('update_Student');


Route::get('show_Student/{id}', [App\Http\Controllers\StudentController::class, 'show'])
->name('show_Student');


Route::get('Upload_attachment', [App\Http\Controllers\StudentController::class, 'Upload_attachment'])
->name('Upload_attachment');


////////////// Promotion Students

Route::get('proindex',[App\Http\Controllers\PromotionController::class, 'index'])
->name('proindex');


Route::get('store',[App\Http\Controllers\PromotionController::class, 'store'])
->name('store');

Route::get('createpro',[App\Http\Controllers\PromotionController::class, 'create'])
->name('createpro');

Route::get('destroypro',[App\Http\Controllers\PromotionController::class, 'destroy'])
->name('destroypro');


//////////////////  Graduated Students

Route::get('indexGra', [App\Http\Controllers\GraduatedController::class, 'index'])
->name('indexGra');

Route::get('createGra', [App\Http\Controllers\GraduatedController::class, 'create'])
->name('createGra');

Route::get('storeGra', [App\Http\Controllers\GraduatedController::class, 'store'])
->name('storeGra');

Route::get('updateGra', [App\Http\Controllers\GraduatedController::class, 'update'])
->name('updateGra');

Route::get('destroyGra', [App\Http\Controllers\GraduatedController::class, 'destroy'])
->name('destroyGra');


////////////////  Fees

Route::get('indexfee', [App\Http\Controllers\FeesController::class, 'index'])
->name('indexfee');

Route::get('createfee', [App\Http\Controllers\FeesController::class, 'create'])
->name('createfee');

Route::get('storefee', [App\Http\Controllers\FeesController::class, 'store'])
->name('storefee');

Route::get('editfee{id}', [App\Http\Controllers\FeesController::class, 'edit'])
->name('editfee');

Route::get('updatefee', [App\Http\Controllers\FeesController::class, 'update'])
->name('updatefee');

Route::get('destroyfee', [App\Http\Controllers\FeesController::class, 'destroy'])
->name('destroyfee');


//////////// Fees Invoices

Route::get('Invoices_index', [App\Http\Controllers\FeesInvoicesController::class, 'index'])
->name('Invoices_index');

Route::get('Invoices_store', [App\Http\Controllers\FeesInvoicesController::class, 'store'])
->name('Invoices_store');

Route::get('Invoices_show{id}', [App\Http\Controllers\FeesInvoicesController::class, 'show'])
->name('Invoices_show');

Route::get('Invoices_edit', [App\Http\Controllers\FeesInvoicesController::class, 'edit'])
->name('Invoices_edit');

Route::get('Invoices_update', [App\Http\Controllers\FeesInvoicesController::class, 'update'])
->name('Invoices_update');

Route::get('Invoices_destroy', [App\Http\Controllers\FeesInvoicesController::class, 'destroy'])
->name('Invoices_destroy');



/////////////////   Receipt 

Route::get('Receipt_index', [App\Http\Controllers\ReceiptStudentController::class, 'index'])
->name('Receipt_index');

Route::get('Receipt_store', [App\Http\Controllers\ReceiptStudentController::class, 'store'])
->name('Receipt_store');

Route::get('Receipt_show{id}', [App\Http\Controllers\ReceiptStudentController::class, 'show'])
->name('Receipt_show');

Route::get('Receipt_edit{id}', [App\Http\Controllers\ReceiptStudentController::class, 'edit'])
->name('Receipt_edit');

Route::get('Receipt_update', [App\Http\Controllers\ReceiptStudentController::class, 'update'])
->name('Receipt_update');

Route::get('Receipt_destroy', [App\Http\Controllers\ReceiptStudentController::class, 'destroy'])
->name('Receipt_destroy');



//////////////////   Processing Fees


Route::get('Process_index', [App\Http\Controllers\ProcessingFeeController::class, 'index'])
->name('Process_index');

Route::get('Process_store', [App\Http\Controllers\ProcessingFeeController::class, 'store'])
->name('Process_store');

Route::get('Process_show{id}', [App\Http\Controllers\ProcessingFeeController::class, 'show'])
->name('Process_show');

Route::get('Process_edit', [App\Http\Controllers\ProcessingFeeController::class, 'edit'])
->name('Process_edit');

Route::get('Process_update', [App\Http\Controllers\ProcessingFeeController::class, 'update'])
->name('Process_update');

Route::get('Process_destroy', [App\Http\Controllers\ProcessingFeeController::class, 'destroy'])
->name('Process_destroy');





///////////////  Payment Students


Route::get('Payment_index', [App\Http\Controllers\PaymentStudentController::class, 'index'])
->name('Payment_index');

Route::get('Payment_store', [App\Http\Controllers\PaymentStudentController::class, 'store'])
->name('Payment_store');

Route::get('Payment_show{id}', [App\Http\Controllers\PaymentStudentController::class, 'show'])
->name('Payment_show');

Route::get('Payment_edit', [App\Http\Controllers\PaymentStudentController::class, 'edit'])
->name('Payment_edit');

Route::get('Payment_update', [App\Http\Controllers\PaymentStudentController::class, 'update'])
->name('Payment_update');

Route::get('Payment_destroy', [App\Http\Controllers\PaymentStudentController::class, 'destroy'])
->name('Payment_destroy');



///////////  Attendance Students


Route::get('Attendance_index', [\App\Http\Controllers\AttendanceController::class, 'index'])
->name('Attendance_index');

Route::get('Attendance_store', [\App\Http\Controllers\AttendanceController::class, 'store'])
->name('Attendance_store');

Route::get('Attendance_show{id}', [\App\Http\Controllers\AttendanceController::class, 'show'])
->name('Attendance_show');



/////////////  Subject


Route::get('Sub_index', [App\Http\Controllers\SubjectController::class, 'index'])
->name('Sub_index');

Route::get('Sub_store', [App\Http\Controllers\SubjectController::class, 'store'])
->name('Sub_store');

Route::get('Sub_create', [App\Http\Controllers\SubjectController::class, 'create'])
->name('Sub_create');


Route::get('Sub_edit{id}', [App\Http\Controllers\SubjectController::class, 'edit'])
->name('Sub_edit');

Route::get('Sub_update', [App\Http\Controllers\SubjectController::class, 'update'])
->name('Sub_update');

Route::get('Sub_destroy', [App\Http\Controllers\SubjectController::class, 'destroy'])
->name('Sub_destroy');



//////////// Quizzes



Route::get('Qui_index', [App\Http\Controllers\QuizzesController::class, 'index'])
->name('Qui_index');

Route::get('Qui_store', [App\Http\Controllers\QuizzesController::class, 'store'])
->name('Qui_store');

Route::get('Qui_create', [App\Http\Controllers\QuizzesController::class, 'create'])
->name('Qui_create');

Route::get('Qui_edit{id}', [App\Http\Controllers\QuizzesController::class, 'edit'])
->name('Qui_edit');

Route::get('Qui_update', [App\Http\Controllers\QuizzesController::class, 'update'])
->name('Qui_update');

Route::get('Qui_destroy', [App\Http\Controllers\QuizzesController::class, 'destroy'])
->name('Qui_destroy');



////////////   Questions



Route::get('Ques_index', [App\Http\Controllers\QuestionController::class, 'index'])
->name('Ques_index');

Route::get('Ques_store', [App\Http\Controllers\QuestionController::class, 'store'])
->name('Ques_store');

Route::get('Ques_create', [App\Http\Controllers\QuestionController::class, 'create'])
->name('Ques_create');

Route::get('QuesQui_edit{id}', [App\Http\Controllers\QuestionController::class, 'edit'])
->name('Ques_edit');

Route::get('Ques_update', [App\Http\Controllers\QuestionController::class, 'update'])
->name('Ques_update');

Route::get('Ques_destroy', [App\Http\Controllers\QuestionController::class, 'destroy'])
->name('Ques_destroy');



///////////// Online Class


Route::get('Online_index', [App\Http\Controllers\OnlineClasseController::class, 'index'])
->name('Online_index');

Route::get('Online_indirectCreate', [App\Http\Controllers\OnlineClasseController::class, 'indirectCreate'])
->name('Online_indirectCreate');

Route::get('Online_store', [App\Http\Controllers\OnlineClasseController::class, 'store'])
->name('Online_store');

Route::get('Online_storeIndirect', [App\Http\Controllers\OnlineClasseController::class, 'storeIndirect'])
->name('Online_storeIndirect');

Route::get('Online_create', [App\Http\Controllers\OnlineClasseController::class, 'create'])
->name('Online_create');

Route::get('Online_destroy', [App\Http\Controllers\OnlineClasseController::class, 'destroy'])
->name('Online_destroy');


///////  Library


Route::get('Lib_index', [App\Http\Controllers\LibraryController::class, 'index'])
->name('Lib_index');

Route::post('Lib_store', [App\Http\Controllers\LibraryController::class, 'store'])
->name('Lib_store');

Route::get('Lib_create', [App\Http\Controllers\LibraryController::class, 'create'])
->name('Lib_create');

Route::get('Lib_edit{id}', [App\Http\Controllers\LibraryController::class, 'edit'])
->name('Lib_edit');

Route::get('Lib_update', [App\Http\Controllers\LibraryController::class, 'update'])
->name('Lib_update');

Route::get('Lib_destroy', [App\Http\Controllers\LibraryController::class, 'destroy'])
->name('Lib_destroy');

Route::get('Lib_download/{filename}', [App\Http\Controllers\LibraryController::class, 'downloadAttachment'])
->name('Lib_download');



///////////   Setting 


Route::get('Seting_index', [App\Http\Controllers\SetingController::class, 'index'])
->name('Seting_index');

Route::get('Seting_update', [App\Http\Controllers\SetingController::class, 'update'])
->name('Seting_update');

