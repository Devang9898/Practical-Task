<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
use App\Models\CustomPermission;
use App\Models\User;


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
    // use Illuminate\Support\Facades\Gate;
    public function boot() {
        $this->registerPolicies();
    
        // Dynamically register permissions with Gates
        CustomPermission::all()->each(function ($permission) {
            Gate::define($permission->name, function (User $user) use ($permission) {
                return $user->customRoles->flatMap->permissions->pluck('name')->contains($permission->name);
            });
        });
        

        // Define Gates for CRUD Operations
        Gate::define('create', function (User $user) {
            return $user->hasPermission('create');
        });

        Gate::define('edit', function (User $user) {
            return $user->hasPermission('edit');
        });

        Gate::define('delete', function (User $user) {
            return $user->hasPermission('delete');
        });

        Gate::define('view', function (User $user) {
            return $user->hasPermission('view');
        });
    }
}
//     public function boot()
//     {
//         $this->registerPolicies();

//         Gate::define('manage-suppliers', function ($user) {
//             return $user->role === 'supplier';
//         });

//         Gate::define('manage-customers', function ($user) {
//             return $user->role === 'customer';
//         });
//     }

// }
// app/Providers/AuthServiceProvider.php


// public function boot()
// {
//     $this->registerPolicies();

//     // Define Gates for CRUD Operations
//     Gate::define('create', function (User $user) {
//         return $user->hasPermission('create');
//     });

//     Gate::define('edit', function (User $user) {
//         return $user->hasPermission('edit');
//     });

//     Gate::define('delete', function (User $user) {
//         return $user->hasPermission('delete');
//     });

//     Gate::define('view', function (User $user) {
//         return $user->hasPermission('view');
//     });
// }
