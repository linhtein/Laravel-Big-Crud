<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        // Blade::directive('myName',function($x){
        //     return "My name is ====> ".$x;
        // });

        // Blade::if('app',function($x){
        //     return $x;
        // });
        

        Blade::if('admin',function(){
            return Auth::user()->rolle === 'admin';
        });

        Blade::if('notAuthor',function(){
            return Auth::user()->rolle != 'author';
        });
    }
}
