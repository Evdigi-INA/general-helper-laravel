<?php

namespace EvdigiIna\Providers;

use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Support\ServiceProvider;

class GeneralHelperProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        AboutCommand::add('General Helper', fn () => [
            'Version' => '0.1.0',
            'Source' => 'https://github.com/Evdigi-INA/general-helper-laravel'
        ]);
    }
}
