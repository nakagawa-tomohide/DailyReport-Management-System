<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\View\Factory;
use JeroenNoten\LaravelAdminLte\Http\ViewComposers\AdminLteComposer;

class AdminlteServiceProvider extends ServiceProvider
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
    public function boot(Factory $view)
    {
        $this->registerViewComposers($view);
    }

    /**
     * Register the package's view composers.
     *
     * @return void
     */
    private function registerViewComposers(Factory $view)
    {
        // ここの部分をadminlte::pageから差し換えたviewに変更
        $view->composer('common.adminlte.page', AdminLteComposer::class);
    }

}