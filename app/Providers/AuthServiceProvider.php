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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isRealUser', function($online, $user){
            return $online->id === $user->id;
            // dd('ok');
        });

        Gate::define('isAdmin', function($online){
            return $online->role_id == 1 ; //admin
        });
        Gate::define('isAdminWebmaster', function($online){
            return $online->role_id == 1 || $online->role_id == 2; //admin & webmaster
        });
    }
}
