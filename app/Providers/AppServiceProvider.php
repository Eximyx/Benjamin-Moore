<?php

namespace App\Providers;

use App\Models\Settings;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Settings::class, function () {
            return Settings::first();
        });
    }

    public function boot(): void
    {
        Paginator::defaultView('vendor.pagination.bootstrap-5');
        Password::defaults(function () {
            $rule = Password::min(8);

            return $rule->mixedCase()->uncompromised();
            //            return $this->app->isProduction()
            //                ? $rule->mixedCase()->uncompromised()
            //                : $rule;
        });
    }
}
