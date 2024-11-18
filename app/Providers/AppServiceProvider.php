<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\ContinentDataController;
use App\Models\Continent;
use App\Models\Import;
use App\Models\Export;
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
         // Fetch data from the continent table
         $continents = Continent::all();

         // Fetch data from the import table
         $imports = Import::all();
 
         // Fetch data from the export table
         $exports = Export::all();
 
         // Share all the data with the views
         View::share('continents', $continents);
         View::share('imports', $imports);
         View::share('exports', $exports);
    }
}
