<?php


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Exams\ExamController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\Quizzes\QuizzeController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Classes\ClassromController;
use App\Http\Controllers\settings\SettingController;
use App\Http\Controllers\students\StudentController;
use App\Http\Controllers\Subjects\SubjectController;
use App\Http\Controllers\Accounts\AccountsController;
use App\Http\Controllers\sections\SectionsController;
use App\Http\Controllers\libararys\LaibraryController;
use App\Http\Controllers\Questions\QuestionController;
use App\Http\Controllers\students\GraduatesController;
use App\Http\Controllers\students\AttendanceController;
use App\Http\Controllers\Promotions\PromotionController;
use App\Http\Controllers\Accounts\FeesInvoicesController;
use App\Http\Controllers\students\ReciptStudentController;
use App\Http\Controllers\students\PaymentStudentController;
use App\Http\Controllers\students\ProcessingFeesController;
use App\Http\Controllers\OnlaineClasse\OnlaineClasseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Auth::routes();

// if usser = guest {go route login}
// Route::group(['middleware'=>['guest']], function(){

//     Route::get('/', function () {
//         return view('auth.login');
//     });
// });

Route::get ('/', [HomeController::class,'index'])->name('selection');

Route::group ( ['middleware'=>['guest']], function(){

    Route::get('/login/{type}',[ LoginController::class,'loginform'])->name('login.show');
    Route::get('/login',[HomeController::class,'index']);
    Route::post('/login',[ LoginController::class,'login'])->name('login'); });
    
     Route::get('/logout/{type}',[ LoginController::class,'logout'])->name('logout');


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth' ]
    ], function(){ //...

        
        
      Route::get('/parint/dashboard', function() {
        return view('pages.students.parints.dashboard');
        
    });

        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
        // Grades
        Route::resource('Grades', GradeController::class);
        
        // Classes
       
        Route::resource('Classes', ClassromController::class );
        Route::post('search_Grades',[ClassromController ::class, 'search_Grades'])->name('search_Grades');

        // section
        Route::resource('sections' , SectionsController::class);
        Route::get('/classes/{id}' ,[ SectionsController::class, 'getclasses']);


       
         //============================== parents ================== ==========
         Route::get('wizard', function () {
            return view('livewire.welcome');
        });
       

          Route::view('/add_parint', 'livewire.Show_Form')->name('add_parint');
          
          Livewire::setUpdateRoute(function($handle){
            return Route::post('/livewire/update',$handle);
          });

       //============================== Teachers ============================
       Route::resource('Teachers',TeacherController::class);
    
    
     //============================== Students ==================  ==========
        
     Route::resource('Students' , StudentController::class);
    //  Route::get('/Get_classrooms/{id}',[StudentController::class , 'Get_classrooms'])->name('Get_classrooms');
    //  Route::get('/Get_Sections/{id}',[StudentController::class , 'Get_Sections'])->name('Get_Sections');
    Route::post('Upload_attachment', [StudentController::class , 'Upload_attachment'])->name('Upload_attachment');
     Route::get('Download_attachment/{studentname}/{filename}' , [StudentController::class, 'Download_attachment'])->name('Download_attachment');
    Route::post('Delete_attachment', [StudentController::class , 'Delete_attachment'])->name('Delete_attachment');

    Route::resource('Promotions',  PromotionController::class); 
    Route::resource('Graduates',  GraduatesController::class);
    Route::resource('Accounts' , AccountsController::class);
    Route::resource('Fees_invoices', FeesInvoicesController::class);
    Route::resource('receipt_students', ReciptStudentController::class);
    Route::resource('ProcessingFees', ProcessingFeesController::class);
    Route::resource('PaymentStudents', PaymentStudentController::class);
    Route::resource('Attendance' , AttendanceController::class);
    Route::resource('Subjects' , SubjectController::class);
    Route::resource('Quizzes', QuizzeController::class);
    Route::resource('Questions', QuestionController::class);
    Route::resource('online_classe', OnlaineClasseController::class);
    Route::get('/indirect',[OnlaineClasseController::class, 'inderectcreate'])->name('indirect.create');
    Route::post('/indirect',[OnlaineClasseController::class, 'inderectstore'])->name('indirect.store');
    Route::resource('libararys',LaibraryController::class);
    Route::get('downloadAttachment/{filename}', [LaibraryController::class, 'download'])->name('downloadAttachment');
    Route::resource('settings', SettingController::class);
   
    });
    

   


