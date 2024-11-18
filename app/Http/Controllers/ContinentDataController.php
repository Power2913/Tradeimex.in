<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContinentDataController extends Controller
{
    //
    public function continentData($continent)
    {
        try {
          
            // Fetch data based on the continent name
            $result = DB::select('SELECT * FROM continent WHERE continent = ?', [$continent]);
            $countrydata = DB::table('import')
            -> select('country','country_code','Datatype')
            -> union(DB::table('export')->select('country','country_code','Datatype'))
            -> get();
  
            return view('frontend.continent', ['continentdata' => $result,'countrydata'=>$countrydata]);
        } catch (\Throwable $th) {
            Log::error('Error in continentData method: ' . $th->getMessage());
            @dd('ContinentData method is not working!');
        }
    }
    
}
