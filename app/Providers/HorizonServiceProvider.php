<?php

namespace App\Providers;

use Auth;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\ServiceProvider;
use Laravel\Horizon\Horizon;

class HorizonServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        if (request()->is('horizon', 'horizon/*')) {
            $this->app->make('Illuminate\Contracts\Http\Kernel')
                ->prependMiddleware(StartSession::class)
                ->handle(request());
        }

        Horizon::auth(function () {
            return Auth::check();
        });
    }
}
