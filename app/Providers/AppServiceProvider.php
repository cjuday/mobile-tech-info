<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Models\Category;
use App\Models\General;
use Illuminate\Pagination\Paginator;

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
        view::composer(['layouts.main','categories', 'contact', 'videos'], function($view)
        {
            $cats = Category::all();

            $d1 = General::find(1);
            $data[0] = $d1->value;

            $d2 = General::find(2);
            $data[1] = $d2->value;

            $d3 = General::find(3);
            $data[2] = $d3->value;

            $d4 = General::find(4);
            $data[3] = $d4->value;

            $d5 = General::find(5);
            $data[4] = $d5->value;

            $d6 = General::find(6);
            $data[5] = $d6->value;

            $d7 = General::find(7);
            $data[6] = $d7->value;

            $d8 = General::find(8);
            $data[7] = $d8->value;
            
            $d9 = General::find(9);
            $data[8] = $d9->value;
            
            $d10 = General::find(10);
            $data[9] = $d10->value;
            
            $d11 = General::find(11);
            $data[10] = $d11->value;

            $view->with('cats', $cats)->with(['data'=>$data]);
        });

        Paginator::useBootstrap();
    }
}
