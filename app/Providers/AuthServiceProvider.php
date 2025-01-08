<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // 一般ユーザー用のGate
        Gate::define('isUser', function ($user) {
            return $user->role === 'user';
        });

        // 管理者用のGate
        Gate::define('isAdmin', function ($user) {
            return $user->role === 'admin';
        });
    }
}
