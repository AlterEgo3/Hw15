<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        view()->composer('*', function ($view) {
            $view->with('user', Auth::user());
        });

        $parameters=[
            'client_id'=>config('oauth.ds.client_id'),
            'client_secret'=>config('oauth.ds.client_secret'),
            'redirect_uri'=>config('oauth.ds.redirect_uri'),
            'response_type'=>'code',
            'scope'=> 'identify',
        ];

        Paginator::useBootstrap();
    }
}
