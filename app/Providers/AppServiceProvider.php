<?php

namespace App\Providers;

use App\Models\students;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::share('title','Student Admin');

        // ito yong kahit di kana mag query sa loob ng collector i return mo lang sa collector is yong "return view('students.index), Then yong ->with is ito yong dudogtongan mo yong data sa loob. Notes: Mas maganda to gamitin sa mga dropdown list
        // View::composer('students.index',function($view) {
        // $view->with('students', Students::all());
        
        // });
    }
}
