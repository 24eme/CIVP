<?php

namespace App\Providers;

use App\View\Composers\SideNavComposer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        View::composer('partials/_sideNav', SideNavComposer::class);
        View::composer('layout/header', function ($view) {
            $view->with('user', Auth::check() ? Auth::user() : null);
        });
    }
}
