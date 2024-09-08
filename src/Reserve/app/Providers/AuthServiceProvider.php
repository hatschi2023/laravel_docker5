<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function($user){
            return  $user->role === 1;
        });
        Gate::define('manager-higher', function($user){
            return  $user->role > 0 && $user->role <= 5;
        });
        Gate::define('user-higher', function($user){
            return  $user->role > 0 && $user->role <= 9;
        });
    }
}
