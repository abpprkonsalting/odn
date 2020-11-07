<?php

namespace App\Providers;
use App\Models\Province;

use Illuminate\Support\ServiceProvider;
use View;

class ViewServiceProvider extends ServiceProvider
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
        View::composer(['municipalities.fields'], function ($view) {
            $provinceItems = Province::pluck('name','id')->toArray();
            $view->with('provinceItems', $provinceItems);
        });
        //
    }
}