<?php

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\parints\parintController;
use App\Http\Controllers\parints\profailController;

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
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:parint' ]
    ], function(){ 
      
        Route::view('/parint/dashboard','pages.pairents.dashbord')->name('dashboard');

    // Route::get('/parint/dashboard', function() { return view('pages.pairents.dashbord')->name('dashboard'); });


Route::resource('childern', parintController::class);
Route::get('sons_results/{id}', [parintController::class, 'sons_results'])->name('sons.results');
Route::get('attendence',  [parintController::class, 'attendence'])->name('attendence');
Route::post('/attendence-reborts',[parintController::class, 'serch_attendence'])->name('serch_attendence');
Route::get('/student_invoices',  [parintController::class, 'student_invoices'])->name('student_invoices');
Route::get('/fess_invoices/{id}',  [parintController::class, 'fess_invoices'])->name('fess_invoices');
Route::get('/profail_parint',[profailController::class, 'profail_parint'])->name('profail_parint');
Route::post('/profail_update/{id}',[profailController::class, 'update'])->name('profail_update');
});

