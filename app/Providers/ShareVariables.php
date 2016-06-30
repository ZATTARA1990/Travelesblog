<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ShareVariables extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.app', function ($view) {
            $view->with('users', \App\User::all());
        });
        view()->composer('event.view', function ($view) {
            $view->with('users', \App\User::all());
        });
        view()->composer('welcome', function ($view) {
            $view->with('users', \App\User::all());
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
