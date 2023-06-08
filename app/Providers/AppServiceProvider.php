<?php

namespace App\Providers;

use App\Models\comentario;
use App\Models\topico;
use App\Observers\ComentarioObserver;
use App\Observers\TopicoObserver;
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
        topico::observe(TopicoObserver::class);
        comentario::observe(ComentarioObserver::class);
    }
}
