<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
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
        // Data alert sementara menggunakan array
        // Menggunakan View::share untuk membagikan data ke semua view
        View::share('alert', [
            [
                "kode" => "001",
                "hari" => "Kamis",
                "tanggal" => "18-01-2024",
                "jam" => "15.30",
                "info" => "Admin Mengedit 'Data Pesanan' pada invoice AH1693918567",
                "status" => "diedit"
            ]
        ]);

        Paginator::useBootstrap();



        View::composer('*', function ($view) {
            $view->with('userId', session('user_id'));
        });

    }
}
