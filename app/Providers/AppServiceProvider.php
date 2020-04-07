<?php

namespace App\Providers;

use App\Channel;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        \View::composer('*', function($view){

            $channels = \Cache::rememberForever('channels', function (){
                return Channel::all();
            });

            $view->with('channels', $channels);
        });

        if($this->app->isLocal()){
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
        }


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
<<<<<<< HEAD
        schema::defaultStringLength(191);

       
=======
        Schema::defaultStringLength(191);
>>>>>>> 891562de528280b80926da7bc71452960794d84c
    }
}
