<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;

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
        $type=Auth::check();
        // if (Auth::check()) {
        //     if (Auth::user()->roles[0]->name == 'vendor') {
        //         $type = "vendor";
        //     }
        //     if (Auth::user()->roles[0]->name == 'admin') {
        //         $type = 'admin';
        //     }
        //     if (Auth::user()->roles[0]->name == 'user') {
        //         $type = 'user';
        //     }
        // } else {
        //     $type = null;
        // }
        View()->share('type', $type);
        // Config::set('typeset.type', $type);

    }
}
