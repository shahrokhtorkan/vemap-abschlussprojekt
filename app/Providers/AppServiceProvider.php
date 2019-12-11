<?php

namespace App\Providers;

use App\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Builder;

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
        Builder::defaultStringLength(191);
        foreach (Permission::all() as $permission) {
        $permissionName = $permission->name;

        Gate::define($permissionName, function($user) use ($permissionName) {
            return $user->hasPermission($permissionName);
        });
    }
    }
}
