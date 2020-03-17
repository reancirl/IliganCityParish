<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('super-admin', function($user){
            return $user->hasRole('SuperAdmin');
        });
        Gate::define('cathedral-admin', function($user){
            return $user->hasRole('CathedralAdmin');
        });
        Gate::define('admin', function($user){
            return $user->hasRole('Admin');
        });
        // Gate::define('church-assigned', function($user){
        //     if{

        //     }
        // });
    }
}
