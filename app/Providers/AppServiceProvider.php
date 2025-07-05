<?php

namespace App\Providers;

// use App\Models\Category; // REMOVED
use App\Observers\ArticleObserver;
// use App\Observers\CategoryObserver; // REMOVED
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; // Import Schema facade
use Illuminate\Support\Facades\App; // Import App facade

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
        Paginator::useBootstrapFive();

        Schema::defaultStringLength(191); // Add this line for older MySQL/MariaDB versions
        Model::preventLazyLoading(! App::isProduction());

        // Article::observe(ArticleObserver::class); // Keep this commented or remove if observer deleted
        // Category::observe(CategoryObserver::class); // REMOVED
    }
}
