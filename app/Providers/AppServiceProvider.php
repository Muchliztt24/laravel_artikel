<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\Jenis;
use App\Http\View\Composers\JenisComposer;

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
        $jenis = Jenis::all();
        View::share('jenis', $jenis);
    }
}
