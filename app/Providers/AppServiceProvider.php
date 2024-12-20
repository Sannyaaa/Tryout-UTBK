<?php

namespace App\Providers;

use App\Models\ComponentPage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
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
        Gate::define('admin', function ($user) {
            return $user->role === 'admin';
        });

        Gate::define('mentor', function ($user) {
            return $user->role === 'mentor';
        });

        Gate::define('user', function ($user) {
            return $user->role === 'user';
        });

        if (Schema::hasTable('component_pages')) {
            view()->share('component', ComponentPage::first());
        }
        
    }
}
