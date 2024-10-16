<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceprovider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Repository\TeacherRepositoryInterface'   ,'App\Repository\TeacherRepository');
        $this->app->bind('App\Repository\studentRepositoryInterface'    ,'App\Repository\studentRepository');
        $this->app->bind('App\Repository\PromotionRepositoryInterface'   ,'App\Repository\PromotionRepository');
        $this->app->bind('App\Repository\GraduateRepositoryInterface'     ,'App\Repository\GraduateRepository'); 
        $this->app->bind('App\Repository\AccountRepositoryinterface'      ,'App\Repository\AccountRepository'); 
        $this->app->bind('App\Repository\FeeInvoicesRepositoryInterface'   ,'App\Repository\FeeInvoicesRepository'); 
        $this->app->bind('App\Repository\ReceiptstudentsRepositoryInterface' ,'App\Repository\ReceiptstudentsRepository'); 
        $this->app->bind('App\Repository\ProcessingFeesRepositoryInterface'   ,'App\Repository\ProcessingFeesRepository');  
        $this->app->bind('App\Repository\PaymentStudentRepositoryInterface' ,'App\Repository\PaymentStudentRepository'); 
        $this->app->bind('App\Repository\AttendanceStudentRepositoryInterface'   ,'App\Repository\AttendanceStudentRepository');  
        $this->app->bind('App\Repository\SubjectRepositoryInterface'   ,'App\Repository\SubjectRepository');  
        $this->app->bind('App\Repository\SubjectRepositoryInterface'   ,'App\Repository\SubjectRepository');  
        $this->app->bind('App\Repository\QuizzeRepositoryInterface'   ,'App\Repository\QuizzeRepository');  
        $this->app->bind('App\Repository\QuestionRepositoryInterface'   ,'App\Repository\QuestionRepository');  
        $this->app->bind('App\Repository\LibararysRepositoryInterface'   ,'App\Repository\LibararysRepository');  
        $this->app->bind('App\Repository\settingsRepositoryInterface'   ,'App\Repository\settingsRepository');  

        
        
    }


    /** 
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
