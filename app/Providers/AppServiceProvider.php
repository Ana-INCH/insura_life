<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Services\GlobalDataService;

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
        View::composer('*', function ($view) { // Aplica a TODAS las vistas
            if (auth()->check()) {
                $globalData = app(GlobalDataService::class);
                // Comparte los datos con todas las vistas
                $view->with([
                    'funeralHomeDetails' => $globalData->getFuneralUserDetails()
                ]);
            }
        });
    }
}
