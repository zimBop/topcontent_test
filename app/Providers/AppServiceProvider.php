<?php

namespace App\Providers;

use App\Http\Resources\ArtisanResource;
use App\Http\Resources\ServiceResource;
use Illuminate\Support\ServiceProvider;
use App\Services\AppointmentService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AppointmentService::class, function ($app) {
            return new AppointmentService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        ArtisanResource::withoutWrapping();
        ServiceResource::withoutWrapping();
    }
}
