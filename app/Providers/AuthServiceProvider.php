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

        Gate::define('isOwner',function($user){
            if($user->roles == 1){
                return true;
            }else {
                return false;
            }
        });

        Gate::define('isHead',function($user){
            if($user->roles == 2){
                return true;
            }else {
                return false;
            }
        });

        Gate::define('isManager',function($user){
            if($user->roles == 3){
                return true;
            }else {
                return false;
            }
        });

        Gate::define('isHeadOrOwner',function($user){
            if($user->roles == 1 || $user->roles == 2){
                return true;
            }else {
                return false;
            }
        });
    }
}
