<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\HeaderComposer; // Import the composer

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
        // Attach the HeaderComposer to the admin header view
        View::composer('admin.includes.header', HeaderComposer::class);

        // You can add other view composers here
        // View::composer('profile', ProfileComposer::class);
    }
}
