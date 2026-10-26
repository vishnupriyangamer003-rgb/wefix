<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        // Both the public theme and ktgadmin are Bootstrap-based — Laravel 8
        // defaults pagination views to Tailwind otherwise.
        Paginator::useBootstrap();

        // common.header is @include()'d on every page, so the category mega-menu
        // is bound via a view composer rather than every controller action
        // having to fetch and pass it. See app/Helpers/CategoryHelper.php.
        View::composer('common.header', function ($view) {
            $view->with('categoryTree', category_tree(true));
        });
    }
}
