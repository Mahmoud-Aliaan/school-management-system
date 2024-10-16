<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
// use App\Http\Controllers\Teacher\StudentController;
use App\Http\Controllers\Teacher\QuezziesController;
use App\Http\Controllers\Students\OnlineClassesController;



/*
|--------------------------------------------------------------------------
| Ajax Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Ajax routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher,web']
    ], function(){

        Route::get('/Get_classrooms/{id}',[AjaxController::class , 'Get_classrooms'])->name('Get_classrooms');
        Route::get('/Get_Sections/{id}',[AjaxController::class , 'Get_Sections'])->name('Get_Sections');








    // Route::get('/getdatasections/{id}',[QuezziesController::class,'getdatasection']);
    // Route::resource('/online_classes',OnlineClassesController::class);
    // Route::get('/Indirect_online',[OnlineClassesController::class,'Indirect_online'])->name('Indirect_online');
    // Route::post('/Indirect_Store',[OnlineClassesController::class,'Indirect_Store'])->name('Indirect_Store');
    // Route::get('/getDataclasss/{id}',[QuezziesController::class,'getDataclass']);
});
   