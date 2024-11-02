<?php

namespace App\Providers;

use App\Models\Country;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
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
        View::composer(['includes.*', 'order'], function ($view) {
            $view->with('settings', cache()->remember(
                'settings',
                now()->addWeeks(1),
                fn() => Setting::first()
            ));
        });

        View::composer('includes.header', function ($view) {
            $view->with('services', cache()->remember(
                'services',
                now()->addWeeks(1),
                fn() => Service::select('id', 'title', 'slug')->get()
            ));
            $view->with('locations', cache()->remember(
                'locations',
                now()->addWeeks(1),
                fn() => Country::with('cities:id,title,slug,country_id')->get()
            ));
        });
    }
}
