<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // Trusts proxies like Cloudflare or AWS Load Balancer
        \Illuminate\Http\Middleware\TrustProxies::class,
        // Handles request size limits
        \Illuminate\Http\Middleware\HandleCors::class,
        // Prevents maintenance mode access
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        // Validates post data size
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        // Trims whitespace from request data
        \App\Http\Middleware\TrimStrings::class,
        // Converts empty strings to null
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // Manages CSRF protection
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            // Sets API rate limiting
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        // User authentication
        'auth' => \App\Http\Middleware\Authenticate::class,
        // Basic HTTP authentication
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        // Email verification for users
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        // Guest user access
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        // Password confirmation for sensitive actions
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        // Authorization checks using Gates and Policies
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        // Throttling for rate limiting
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        // Validation for signed URLs
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        // Route bindings for models
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        // Role and Permission checks
        'role' => \App\Http\Middleware\CheckRole::class,
        'permission' => \App\Http\Middleware\CheckPermission::class,
        'role.permission' => \App\Http\Middleware\RolePermissionMiddleware::class,
    ];

    /**
     * The priority-sorted list of middleware.
     *
     * This forces non-global middleware to always be in the given order.
     *
     * @var array<int, class-string|string>
     */
    protected $middlewarePriority = [
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\Authenticate::class,
        \Illuminate\Routing\Middleware\ThrottleRequests::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ];
    
    
    
}
