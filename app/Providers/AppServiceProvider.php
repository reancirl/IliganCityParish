<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Baptismal;
use App\Confirmation;
use App\Marriage;

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
        View::share('baptismal', Baptismal::all());
        View::share('confirmation', Confirmation::all());
        View::share('marriage', Marriage::all());
    }
}
