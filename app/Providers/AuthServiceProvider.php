<?php

namespace App\Providers;
use Illuminate\Support\Facades\Gate;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
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
   Gate::define('admin', fn($user) => $user->rol === 'admin');
Gate::define('tecnico', fn($user) => $user->rol === 'tecnico');
Gate::define('cajero', fn($user) => $user->rol === 'cajero');
Gate::define('dueno', fn($user) => $user->rol === 'dueno');

}
   
}
