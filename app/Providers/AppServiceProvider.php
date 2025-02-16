<?php

namespace App\Providers;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use SocialiteProviders\Manager\SocialiteWasCalled;
use SocialiteProviders\Keycloak\Provider;

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
         // Register the Keycloak provider with Socialite
         Event::listen(function (SocialiteWasCalled $event) {
            $event->extendSocialite('keycloak', Provider::class);
        });
    }
}
