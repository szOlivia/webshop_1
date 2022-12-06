<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;


class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $kategoriak = DB::select("SELECT kategoriak.nev, url.url 
    FROM kategoriak INNER JOIN url ON (kategoriak.k_id=url.Kapcsolat) 
    WHERE url.tipus='kategoria'");
    View::share("kategoriak", $kategoriak);
    }
}
