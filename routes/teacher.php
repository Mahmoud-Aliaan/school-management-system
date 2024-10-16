<?php

//use Illuminate\Http\Request;
use App\Models\student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\students\StudentController;
use App\Http\Controllers\Teacher\dashbord\ProfailController;
use App\Http\Controllers\Teacher\dashbord\QuestionController;
use App\Http\Controllers\Teacher\dashbord\QuezziesController;
use App\Http\Controllers\Teacher\dashbord\studentsController;
use App\Http\Controllers\Teacher\dashbord\OnlaineClasseController;


/*
|--------------------------------------------------------------------------
| student Routes
|--------------------------------------------------------------------------
|
| Here is where you can register student routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "student" middleware group. Make something great!
|
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher' ]
    ], function(){ 
      
Route::get('/teacher/dashboard', function() {
    $id= auth()->user()->id;
    $ids= Teacher::FindOrfail($id)->sections()->pluck('section_id');
    $data['count_sections']= $ids->count();
    $data['students']= student::whereIn('section_id', $ids)->count();
    return view('pages.Teacher.dashbord.dashboard' , $data);
   
});


Route::resource('/student-dashbord', studentsController::class );
Route::get('/section-dashbord' ,[ studentsController::class, 'get_section'])->name('section');
Route::post('attendence', [ studentsController::class, 'attendence'])->name('attendence'); 
Route::get('/reborts-student',[ studentsController::class, 'reborts'] )->name('reborts');
Route::post('/reborts-student',[ studentsController::class, 'serch_reborts'] )->name('serch_reborts');
Route::resource('/Quezzies', QuezziesController::class );
Route::resource('Questions', QuestionController::class);

// Zoom
 Route::resource('online_classe', OnlaineClasseController::class);
 Route::get('/indirect_teacher',[OnlaineClasseController::class, 'inderectcreate'])->name('indirect_teacher.create');
 Route::post('/indirect_teacher',[OnlaineClasseController::class, 'inderectstore'])->name('indirect_teacher.store');
 Route::get('/profail', [ProfailController::class , 'index'])->name('profail.index');
 Route::post('profail/{id}', [ProfailController::class , 'update'])->name('profail.update');
  //Route::post('profile/{id}', 'ProfileController@update')->name('profile.update');
Route::get('Quezzies.student/{id}',[QuezziesController::class,'Quezzies_student' ])->name('Quezzies.student');
 Route::get('Quizze.repeat/{id}',[QuezziesController::class,'Quezzie_repeat' ])->name('Quezzie.repeat');


});

