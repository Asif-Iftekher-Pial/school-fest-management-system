<?php

namespace App\Providers;

use App\Page;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

use function GuzzleHttp\Promise\all;

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
        Schema::defaultStringLength(191);

        $registration=Page::where([['main_menu','Registration'] ,['status', '=', '1'] ])->get();
        View::share('registration',$registration);

        $aboutus=Page::where([['main_menu','About_Us'] ,['status', '=', '1'] ])->get();
        View::share('aboutus',$aboutus);

        $program=Page::where([['main_menu','Program'] ,['status', '=', '1'] ])->get();
        View::share('program',$program);
    }
}
