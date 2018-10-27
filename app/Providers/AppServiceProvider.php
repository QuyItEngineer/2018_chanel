<?php

namespace App\Providers;

use App\Contracts\PostStoryProviderService;
use App\Contracts\PostStoryService;
use App\Contracts\StoryScriptService;
use App\Contracts\StoryService;
use App\Contracts\UserService;
use Illuminate\Support\ServiceProvider;
use Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PostStoryProviderService::class, \App\Services\PostStoryProviderService::class);
        $this->app->singleton(PostStoryService::class, \App\Services\PostStoryService::class);
        $this->app->singleton(StoryScriptService::class, \App\Services\StoryScriptService::class);
        $this->app->singleton(StoryService::class, \App\Services\StoryService::class);
        $this->app->singleton(UserService::class, \App\Services\UserService::class);
    }
}
