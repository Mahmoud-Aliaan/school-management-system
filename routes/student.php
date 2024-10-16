<?php

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\students\dashbord\examController;
use App\Http\Controllers\students\dashbord\profailController;

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
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:student' ]
    ], function(){ 
      
// Route::get('/student/dashboard', function() {return view('pages.students.dashboard');})
Route::view('/student/dashboard','pages.students.dashboard')->name('dashboard');

Route::resource('exam', examController::class);
Route::resource('profail-student', profailController::class);
});

