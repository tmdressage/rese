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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // 利用者のみページ閲覧可
        Gate::define('user', function ($user) {
            return ($user->role == 0);
        });

        // 管理者のみページ閲覧可
        Gate::define('admin', function ($user) {
            return ($user->role == 1);
        });

        // 店舗代表者のみページ閲覧可
        Gate::define('owner', function ($user) {
            return ($user->role == 2);
        });
    }
}
