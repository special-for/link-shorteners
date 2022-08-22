<?php

namespace App\Providers;

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
        $repositories = [
            'Link' => 'Link',
        ];

        foreach ($repositories as $k => $v) {
            $this->app->bind('App\\Services\\' . $v . '\\Repositories\\' . $k . 'RepositoryInterface', 'App\\Services\\'
                . $v . '\\Repositories\\' . $k . 'Repository');
        }
    }
}
