<?php

use App\Http\Controllers\Grades\GradeController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
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