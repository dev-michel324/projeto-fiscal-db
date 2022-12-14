<?php

namespace App\Providers;

use App\Models\Cupom;
use Illuminate\Support\Facades\Gate;
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
        Gate::define('can_donate', function($cupom) {
            if($cupom->doado)
                return true;
            return false;
        });
    }
}
