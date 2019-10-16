<?php

namespace App\Providers;

use App\Http\View\Composers\HeaderComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        // Exécuter le viewComposer pour nos variables globales de vue
        // Ex: on affiche le menu "catégories" dans toutes les vues
        view()->composer(['shop','home'],HeaderComposer::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
