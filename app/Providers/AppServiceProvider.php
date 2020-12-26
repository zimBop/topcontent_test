<?php

namespace App\Providers;

use App\Http\Resources\ArtisanResource;
use App\Http\Resources\ServiceResource;
use Illuminate\Support\ServiceProvider;

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
        ArtisanResource::withoutWrapping();
        ServiceResource::withoutWrapping();
    }
}
