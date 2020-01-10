<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Payment;

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
        Schema::defaultStringLength(191);

        view()->composer('home', function ( $view ) {

            $view->with('available_cash', \App\Payment::availableCash());
            $view->with('pending_cash', \App\Payment::pendingCash());
            $view->with('sales_summary', \App\Payment::take(5)->orderBy('created_at', 'desc')->get());
        } );
    }
}
