<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;

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
        // Pastikan storage link sudah ada, jika tidak maka buat
        if (!file_exists(public_path('storage'))) {
            Artisan::call('storage:link');
        }
        Paginator::useTailwind();
    }
}
