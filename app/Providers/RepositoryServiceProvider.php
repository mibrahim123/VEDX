<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(
            \App\Repository\Interfaces\CrudRepositoryInterface::class,
            \App\Repository\CrudRepository::class
        );

        $this->app->bind(
            \App\Repository\Interfaces\CategroryRepositoryInterface::class,
            \App\Repository\CategroryRepository::class
        );

        $this->app->bind(
            \App\Repository\Interfaces\UserRepositoryInterface::class,
            \App\Repository\UserRepository::class
        );

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
