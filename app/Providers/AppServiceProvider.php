<?php

namespace App\Providers;

use App\Models\Content;
use App\Models\Language;
use App\Models\Menu;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register() :void
    {
        view()->composer('admin._sidebar', function ($view){
            $view->with('language_is_active', Language::where('is_active', '=', 1)->count());
            $view->with('language_not_active', Language::where('is_active', '=', 0)->count());
            $view->with('content_is_active', Content::where('is_active', '=', 1)->count());
            $view->with('content_not_active', Content::where('is_active', '=', 0)->count());
            $view->with('menu_is_active', Menu::where('is_active', '=', 1)->count());
            $view->with('menu_not_active', Menu::where('is_active', '=', 0)->count());
//            $view->with('newSubs', Inf_subscriber::whereNotNull('token')->count());
//            $view->with('allSubs', Inf_subscriber::whereToken(null)->count());
        });

    }

    public function boot() :void
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
