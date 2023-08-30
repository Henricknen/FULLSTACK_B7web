<?php

namespace App\Providers;

use Carbon\Carbon;
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
    public function boot(): void        // função 'boot' roda no iniçio da requisição e traduzirá logo no iniçio
    {
        //
        Carbon::setLocale($this-> app-> getLocale());       // pegando a configuração do 'locale'
    }
}
