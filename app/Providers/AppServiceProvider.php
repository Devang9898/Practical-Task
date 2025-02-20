<?php


namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use App\Models\CustomPermission;
use App\Models\User;



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
     
        // $this->registerPolicies();
        Passport::enablePasswordGrant();
        //Passport::hashClientSecrets();

        Passport::tokensExpireIn(now()->addMinutes(30));
        Passport::refreshTokensExpireIn(now()->addDays(7));
        Passport::personalAccessTokensExpireIn(now()->addMonths(6));
    }
}
// namespace App\Providers;

// use Illuminate\Support\ServiceProvider;

// class AppServiceProvider extends ServiceProvider
// {
//     /**
//      * Register any application services.
//      */
//     public function register(): void
//     {
//         //
//     }

//     /**
//      * Bootstrap any application services.
//      */
//     public function boot(): void
//     {
//         //
//     }
// }
