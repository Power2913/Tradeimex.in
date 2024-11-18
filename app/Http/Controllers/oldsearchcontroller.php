<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Exception;
use Hamcrest\Type\IsNumeric;
use Illuminate\Http\Request;

class SearchLiveDataController extends Controller
{
    // Import Sample Data
    function import() {
        $columns = Schema::getColumnListing('IMP_AMERICA_BL_SEA');
        $query = DB::connection($secondDbConnection)->table('IMP_AMERICA_BL_SEA')
        ->select('*')
        ->limit(1);
        foreach ($columns as $column) {
            $query->whereNotNull($column)
            ->where($column, '!=', 'N/A');
        }
        $result = $query->get();
        // dd($result);
        return view(
            'frontend.importdata', 
            [
                'results' => $result
            ]
        );
    }

    // Export Smaple Data
    function export() {
        $columns = Schema::getColumnListing('EXP_AMERICA_BL_SEA');
        $query = DB::connection($secondDbConnection)->table('EXP_AMERICA_BL_SEA')
        ->select('*')
        ->limit(1);
        foreach ($columns as $column) {
            $query->whereNotNull($column)
            ->where($column, '!=', 'N/A');
        }
        $result = $query->get();
        
        return view(
            'frontend.exportdata', 
            [
                'results' => $result
            ]
        );
    }

    // handleForm method
    public function handleForm(Request $request) {
        // Retrieve inputs
        $type = $request->input('type');
        $role = $request->input('role');
        $base_desc = str_replace(' ', '-', $request->input('description'));
        $country = $request->input('country');
        $description = $base_desc ?: '-';
        $hs_code = $request->input('hs_code') ?: '-';
    
        // Remove db from the parameters (database lookup will be internal)
        if (!$this->getCountryTableMapping($country, $role)) {
            return redirect()->back()->with('error', 'Data not available for the selected country and role.');
        }
    
        // Build URL parameters
        $params = [
            'country' => $country,
            'type' => $type,
            'role' => $role,
            'description' => $description
        ];
    
        // Conditionally add HS code if it exists
        if ($hs_code !== '-') {
            $params['hs_code'] = $hs_code;
        }
    
        // Redirect to the appropriate search route based on the type
        if ($type === 'data') {
            $url = route('search.data', $params);
        } elseif ($type === 'company') {
            $url = route('search.company', $params);
        } else {
            abort(404);
        }
    
        return redirect($url);
    }
    
    // getCountryTableMapping method
    public function getCountryTableMapping($country, $role) {
        $tableMapping = [
            'US' => [
                'import' => 'IMP_AMERICA_BL_SEA',
                'export' => 'EXP_AMERICA_BL_SEA',
            ],
            'Austria' => [
                'import' => 'austria',
                'export' => 'austria',
            ],
            // Add more countries and their tables here...
        ];

        // Return the corresponding table for the country and role, or null if not found
        return $tableMapping[$country][$role] ?? null;
    }

    private function getDataResult($tableName, $role, $hs_code, $description, $base_desc, $secondDbConnection)
    {
        if ($role == "import") {
            return DB::connection($secondDbConnection)->table($tableName)
                ->select('*')
                ->when($hs_code, function($query, $hs_code) {
                    return $query->where(DB::raw('HS_CODE'), 'like', $hs_code . '%');
                })
                ->when($description, function($query, $description) {
                    return $query->where(DB::raw('PRODUCT_DESCRIPTION'), 'LIKE', '%' . $description . '%');
                })
                ->limit(10)
                ->get();
        } elseif ($role == "export") {
            return DB::connection($secondDbConnection)->table($tableName)
                ->select('*')
                ->where(DB::raw('HS_CODE'), 'like', $hs_code . '%')
                ->where(DB::raw('PRODUCT_DESCRIPTION'), 'LIKE', '%' . $base_desc . '%')
                ->limit(10)
                ->get();
        }
    }
 
    // Base search 
    public function search($country, $type, $role, $description = null, $hs_code = null) 
    {
        $base_desc = str_replace('-', ' ', $description);
        $base_hs_code = $hs_code;
        
        // Call the function to get the appropriate table based on country and role
        $tableName = $this->getCountryTableMapping($country, $role);
        
        // If no table is found for the country or role, return an error
        if (!$tableName) {
            return redirect()->back()->with('error', 'No data available for the selected country and role.');
        }
        
        $secondDbConnection = 'mysql2'; // Assuming second database connection is used
        $columns = Schema::getColumnListing($tableName); // Dynamically get table columns
        
        if ($type == "data") {
            if ($description || $hs_code) {
                $result = $this->getDataResult($tableName, $role, $hs_code, $description, $base_desc, $secondDbConnection);
                if ($result->isEmpty()) {
                    return redirect()->back()->with('error', 'Searched Data Not Found. For More Details Contact Us.');
                }
        
                return view('frontend.livedata.US.search', [
                    'result' => $result,
                    'hs_code' => $hs_code,
                    'desc' => $description,
                    'base_desc' => $base_desc,
                    'base_hs_code' => $base_hs_code,
                    'role' => $role,
                    'type' => $type,
                    'country' => $country,
                ]);
            }            
        } 
        else if ($type == "company") {
            if ($description || $hs_code) {
                $result = $this->getDataResult($tableName, $role, $hs_code, $description, $base_desc, $secondDbConnection);
                
                if ($result->isEmpty()) {
                    return redirect()->back()->with('error', 'Searched Data Not Found. For More Details Contact Us.');
                }
        
                return view('frontend.livedata.search', [
                    'result' => $result,
                    'hs_code' => $hs_code,
                    'desc' => $description,
                    'base_desc' => $base_desc,
                    'base_hs_code' => $base_hs_code,
                    'role' => $role,
                    'type' => $type,
                    'country' => $country,
                ]);
            }
        }
    }
    
    
    // US Table Search Filter
    public function searchFilter()
    {
        $secondDbConnection = 'mysql2'; // The name of your second database connection
        $secondDbName = DB::connection($secondDbConnection)->getDatabaseName();
        //dd ('Second Database: ' . $secondDbName);
        $tables = DB::connection($secondDbConnection)->select('SHOW TABLES');
        //dd($tables);
        // Retrieve all arguments passed to the method
        $args = func_get_args();
        // dd($args);
        // Assign parameters based on the number of arguments
        if (count($args) == 4) {
            [$type, $role,$country, $filterby, $filterdata] = $args;
            $search = null;
            $base_search = null;
            if($role == 'import'){
                if($filterby == 'hs_code'){
                    $results = DB::connection($secondDbConnection)->table('IMP_AMERICA_BL_SEA')
                        ->select('*')
                        ->where('HS_CODE', 'like', $filterdata.'%') // Use 'like' operator for pattern matching
                        ->whereRaw('LENGTH(HS_CODE) <= 12') 
                        ->whereNotNull('HS_CODE')
                        ->limit(10)
                        ->get();
                        
                    //dd($results, $filterdata);
                    }
                }else{
                    $hs_codedetails = $base_search;
                    if($filterby=='hs_code'){
                        $results = DB::connection($secondDbConnection)->table('EXP_AMERICA_BL_SEA')
                            ->select('*')
                            ->where('HS_CODE', 'like', $filterdata .'%')
                            ->whereRaw('LENGTH(HS_CODE) <= 12')
                            ->whereNotNull('HS_CODE')
                            ->limit(10)
                            ->get();
                        
                    }
               }
            if ($results->isEmpty()) {
                 return redirect()->back()->with('error', 'Searched Data Not Found For More Details Contact us.');
            }
            return view('frontend.livedata.searchfilter', [
                'result' => $results,
                'desc' => $filterdata,
                'type' => $type,
                'role' => $role,
                'hscode' => $filterdata,
                'filterdata' => $filterdata,
                'filterby1' => $filterby1,
                'base_search' => $filterdata,
                'searfilterdata' => $filterdata,
                'searchfilterby' => $filterby,
                'search' => $filterby,
                'filterby' => $filterby,
                'args'=>$args,
            ]);
        } else if (count($args) == 7) {
            [$country,$type, $role, $search, $base_search, $filterby, $filterdata] = $args;
            
        }

        // Handle different filters based on the filterby parameter
        $filterdata = str_ireplace("-", " ", $filterdata);

        // Your existing logic for processing the filter
        if ($role == 'import') {
            $values = explode(',', $base_search);
            $all_numeric = true;
            
            foreach ($values as $value) {
                if (!is_numeric($value)) {
                    $all_numeric = false;
                    break;
                }
            }
            
            if ($all_numeric){
                $hs_codedetails = $base_search;
                switch ($filterby) {
                    case 'hs_code':
                       
                        $results = DB::connection($secondDbConnection)->table('IMP_AMERICA_BL_SEA')
                            ->select('*')
                            ->where('HS_CODE', 'like', $hs_codedetails .'%')
                            ->whereRaw('LENGTH(HS_CODE) <= 12') 
                            ->where('HS_CODE',  $filterdata )
                            ->whereNotNull('HS_CODE')
                            ->whereNotNull('US_IMPORTER_NAME')
                            ->limit(10)
                            ->get();
                          
                        break;
                    case 'country':
                        //dd('this country Block');
                        $results = DB::connection($secondDbConnection)->table('IMP_AMERICA_BL_SEA_part_xmain')
                            ->select('*')
                            ->where('HS_CODE', 'like', $hs_codedetails .'%')
                            ->whereRaw('LENGTH(HS_CODE) <= 12') 
                            ->where('ORIGIN_COUNTRY', 'like', $filterdata . '%')
                            ->whereNotNull('HS_CODE')
                            ->whereNotNull('US_IMPORTER_NAME')
                            ->limit(10)
                            ->get();
                        break;
                    case 'unloading_port':
                      
                        $results = DB::connection($secondDbConnection)->table('IMP_AMERICA_BL_SEA_part_xmain')
                            ->select('*')
                            ->where('HS_CODE', 'like', $hs_codedetails .'%')
                            ->whereRaw('LENGTH(HS_CODE) <= 12') 
                            ->where('UNLOADING_PORT', 'like', $filterdata . '%')
                            ->whereNotNull('HS_CODE')
                            ->whereNotNull('US_IMPORTER_NAME')
                            ->limit(10)
                            ->get();
                        break;
                    default:
                        $results = collect();
                }
            } else {
     
                $descdetails = $base_search;
                switch ($filterby) {
                    case 'hs_code':
                        $results = DB::connection($secondDbConnection)->table('IMP_AMERICA_BL_SEA')
                            ->select('*')
                            ->where('PRODUCT_DESCRIPTION', 'like', '%' . $descdetails .'%')
                            ->where('HS_CODE', 'like', $filterdata . '%')
                             ->whereRaw('LENGTH(HS_CODE) <= 12') 
                            ->whereNotNull('HS_CODE')
                            ->whereNotNull('US_IMPORTER_NAME')
                            ->limit(10)
                            ->get();
                        break;
                    case 'country':
                        
                        $results = DB::connection($secondDbConnection)->table('IMP_AMERICA_BL_SEA')
                            ->select('*')
                            ->where('ORIGIN_COUNTRY', 'like', $filterdata . '%')
                            ->where('PRODUCT_DESCRIPTION', 'like', '%' . $descdetails .'%')
                             ->whereRaw('LENGTH(HS_CODE) <= 12') 
                            ->whereNotNull('HS_CODE')
                            ->whereNotNull('US_IMPORTER_NAME')
                            ->limit(10)
                            ->get();
                        break;
                    case 'unloading_port':
                        $results = DB::connection($secondDbConnection)->table('IMP_AMERICA_BL_SEA')
                            ->select('*')
                            ->where('PRODUCT_DESCRIPTION', 'like', '%' . $descdetails .'%')
                            ->where('UNLOADING_PORT', 'like', $filterdata . '%')
                             ->whereRaw('LENGTH(HS_CODE) <= 12') 
                            ->whereNotNull('HS_CODE')
                            ->whereNotNull('US_IMPORTER_NAME')
                            ->limit(10)
                            ->get();
                        break;
                    default:
                        $results = collect();
                }
            }
        } else {
            $values = explode(',', $base_search);
            $all_numeric = true;
            
            foreach ($values as $value) {
                if (!is_numeric($value)) {
                    $all_numeric = false;
                    break;
                }
            }
            
            if ($all_numeric){
                $hs_codedetails = $base_search;
                switch ($filterby) {
                    case 'hs_code':
                        $results = DB::connection($secondDbConnection)->table('EXP_AMERICA_BL_SEA')
                            ->select('*')
                            ->where('HS_CODE', 'like', $filterdata .'%')
                            ->whereRaw('LENGTH(HS_CODE) <= 12')
                            ->orWhere('HS_CODE', '=', $hs_codedetails)
                            ->limit(10)
                            ->get();
                            
                        break;
                    case 'country':
                        $results = DB::connection($secondDbConnection)->table('EXP_AMERICA_BL_SEA')
                            ->select('*')
                            ->where('HS_CODE', 'like', $hs_codedetails .'%')
                            ->whereRaw('LENGTH(HS_CODE) <= 12')
                            ->where('DESTINATION_COUNTRY', 'like', '%' . $filterdata . '%')
                            ->limit(10)
                            ->get();
                        break;
                    case 'unloading_port':
                        $results = DB::connection($secondDbConnection)->table('EXP_AMERICA_BL_SEA')
                            ->select('*')
                            ->where('UNLOADING_PORT', 'like', '%' . $filterdata . '%')
                            ->where('HS_CODE', 'like', '%' . $hs_codedetails .'%')
                            ->whereRaw('LENGTH(HS_CODE) <= 12')
                            ->limit(10)
                            ->get();
                        break;
                    default:
                    $results = collect();
                }
            } else {
                $descdetails = $base_search;
                switch ($filterby) {
                    case 'hs_code':
                        
                        $results = DB::connection($secondDbConnection)->table('EXP_AMERICA_BL_SEA')
                      
                            ->select('*')
                            ->where('HS_CODE', 'like', '%' . $filterdata . '%')
                            ->whereRaw('LENGTH(HS_CODE) <= 12')
                            ->where('PRODUCT_DESCRIPTION', 'like', '%' . $descdetails .'%')
                            ->limit(10)
                            ->get();
                      
                        break;
                    case 'country':
                        $results = DB::connection($secondDbConnection)->table('EXP_AMERICA_BL_SEA')
                            ->select('*')
                            ->where('DESTINATION_COUNTRY', 'like', '%' . $filterdata . '%')
                            ->where('PRODUCT_DESCRIPTION', 'like', '%' . $descdetails .'%')
                            ->whereRaw('LENGTH(HS_CODE) <= 12')
                            ->limit(10)
                            ->get();
                        break;
                    case 'unloading_port':
                        $results = DB::connection($secondDbConnection)->table('EXP_AMERICA_BL_SEA')
                            ->select('*')
                            ->where('UNLOADING_PORT', 'like', '%' . $filterdata . '%')
                            ->where('PRODUCT_DESCRIPTION', 'like', '%' . $descdetails .'%')
                            ->whereRaw('LENGTH(HS_CODE) <= 12')
                            ->limit(10)
                            ->get();
                        break;
                    default:
                        $results = collect();
                }
            }
        }
        if ($results->isEmpty()) {
                return redirect()->back()->with('error', 'Searched Data Not Found For More Details Contact us.');
        }
         return view('frontend.livedata.searchfilter', [
            'result' => $results,
            'desc' => $filterdata,
            'type' => $type,
            'role' => $role,
            'hscode' => $filterdata,
            'filterdata' => $filterdata,
            'base_search' => $base_search,
            'searfilterdata' => $filterdata,
            'searchfilterby' => $filterby,
            'search' => $search,
            'filterby' => $filterby,
            'args'=>$args,
            'country' => $country,
        ]);
    }

    // Search Filter One
    public function searchFilter1() {
        $secondDbConnection = 'mysql2'; // The name of your second database connection
        $secondDbName = DB::connection($secondDbConnection)->getDatabaseName();
        //dd ('Second Database: ' . $secondDbName);
        $tables = DB::connection($secondDbConnection)->select('SHOW TABLES');
        // Handle different filters based on the filterby parameter
        $args = func_get_args();
        //   dd($args);
        if(count($args)==6){
            [$type, $role,$filterby, $filterdata,  $filterby1,$filterdata1] = $args;
            $filterdata1 = str_replace('-', ' ', $filterdata1);
            $filterdata = str_replace('-', ' ', $filterdata);
            $search = null;
            $base_search = null;

            
            // dd($type, $role,'Filterby',$filterby,'Filterdat', $filterdata,'Filtervy1',  $filterby1,'Filterdata1',$filterdata1);
            if ($role=='import') {
                if($filterby1 == 'hs_code'){
                    
                }
                else if($filterby1 == 'country')
                {
                    $results = DB::connection($secondDbConnection)->table('IMP_AMERICA_BL_SEA')
                    ->select('*')
                    ->where('ORIGIN_COUNTRY', 'LIKE', '%' . $filterdata1 . '%')
                    ->where('HS_CODE', 'LIKE', '%' . $filterdata . '%')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                                ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                                ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                    })
                    ->whereNotNull('HS_CODE')
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('US_IMPORTER_NAME')
                    ->limit(10)
                    ->get();
                } 
                else
                {
                        $results = DB::connection($secondDbConnection)->table('IMP_AMERICA_BL_SEA')
                    ->select('*')
                    ->where('UNLOADING_PORT', 'LIKE', '%' . $filterdata1 . '%')
                    ->where('HS_CODE', 'LIKE', '%' . $filterdata .'%')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                                ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    ->limit(10)
                    ->get(); 
                }

                return view('frontend.livedata.searchfilter-one', [
                    'result' => $results,
                    'desc'   => $filterdata,
                    'type'   => $type,
                    'role'   => $role,
                    'hscode' => $filterdata,
                    'searfilterdata' => $filterdata,
                    'searchDetails1' => $filterdata,
                    'filterby' => $filterby,
                    'filterby1'=> $filterby1,
                    'filterdata' => $filterdata,
                    'filterdata1' => $filterdata1,
                    'args' => $args
                ]);
            } else {
                if($filterby1 == 'hs_code')
                {
                    $results = DB::connection($secondDbConnection)->table('EXP_AMERICA_BL_SEA')
                    ->select('*')
                    ->where('HS_CODE', 'like', $filterdata1 . '%')
                    ->where('PRODUCT_DESCRIPTION', 'like', '%' . $base_search . '%')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                                ->orWhere('DESTINATION_COUNTRY', $filterdata )
                                ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    // ->whereNotNull('HS_CODE')
                    // ->whereNotNull('US_EXPORTER_NAME')
                    ->limit(10)
                    ->get();
                } 
                else if($filterby1 == 'country')
                {

                    $results = DB::connection($secondDbConnection)->table('EXP_AMERICA_BL_SEA')
                    ->select('*')
                    ->where('DESTINATION_COUNTRY', 'LIKE', '%' . $filterdata1 . '%')
                    ->where('HS_CODE', 'LIKE', '%' . $filterdata . '%')
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                                ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                                ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                    })
                    ->whereNotNull('HS_CODE')
                    
                    ->limit(10)
                    ->get();
                }
                else
                {
                    // dd($type, $role,$filterby, $filterdata,  $filterby1,$filterdata1);
                    $results = DB::connection($secondDbConnection)->table('EXP_AMERICA_BL_SEA')
                    ->select('*')
                    ->where('UNLOADING_PORT', 'LIKE', '%' . $filterdata1 . '%')
                    ->where('HS_CODE', 'LIKE', '%' . $filterdata .'%')
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                                ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%');
                    })
                    ->whereNotNull('HS_CODE')
                    ->limit(10)
                    ->get(); 
                }

                return view('frontend.livedata.searchfilter-one', [
                    'result' => $results,
                    'desc'   => $filterdata,
                    'type'   => $type,
                    'role'   => $role,
                    'hscode' => $filterdata,
                    'searfilterdata' => $filterdata,
                    'searchDetails1' => $filterdata,
                    'filterby' => $filterby,
                    'filterby1'=> $filterby1,
                    'filterdata' => $filterdata,
                    'filterdata1' => $filterdata1,
                    'args' => $args
                ]);
            }

        }
        else if(count($args)==9){
            [$country, $type, $role, $search, $base_search, $filterby, $filterdata, $filterby1, $filterdata1] = $args;
        }
        // dd('Type',$type,'Role', $role,'Search Details1',$base_search,'Filter data1', $filterdata1,'filterby', $filterby,'filterdata',$filterdata);
        $filterdata1 = str_replace('-', ' ', $filterdata1);
        $filterdata = str_replace('-', ' ', $filterdata);
        //   dd($type, $role,'Search Details1',$base_search,'Filter data1', $filterdata1,'filterby', $filterby,'filterdata',$filterdata,$filterby1);
        if ($role=='import') {
            if (is_numeric($base_search)) {
                if ($filterby1 == 'hs_code') {
                    $query1 = DB::connection($secondDbConnection)->table('IMP_AMERICA_BL_SEA_part_xmain')
                    ->select('*')
                    ->where('HS_CODE', 'like', $filterdata1 . '%')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                              ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%')
                    ->whereNotNull('HS_CODE')
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('US_IMPORTER_NAME');
                    });
                    
                    $query2 = DB::connection($secondDbConnection)->table('IMP_AMERICA_BL_SEA_part_ymain')
                    ->where('HS_CODE', 'like', $filterdata1 . '%')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                              ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%')
                    ->whereNotNull('HS_CODE')
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('US_IMPORTER_NAME');
                    });
                
                    $query3 = DB::connection($secondDbConnection)->table('IMP_AMERICA_BL_SEA_part_zmain')
                    ->where('HS_CODE', 'like', $filterdata1 . '%')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                              ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%')
                    ->whereNotNull('HS_CODE')
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('US_IMPORTER_NAME');
                    });
                    
                    // Combine the queries using union
                    $combinedQuery = $query1
                        ->union($query2)
                        ->union($query3)
                        ;
                    $results = DB::connection($secondDbConnection)->table(DB::raw("({$combinedQuery->toSql()}) as sub"))
                    ->mergeBindings($combinedQuery) // You need to merge bindings to avoid SQL errors
                    ->limit(10)
                    ->get();

                    // dd('if BlockS',$results);
                } else if ($filterby1 == 'country') {
                    // dd('Search Deatails',$searchDetails,'Filter data1', $filterdata1,'filterby', $filterby,'filterdata',$filterdata);
                    $query1 = DB::connection($secondDbConnection)->table('IMP_AMERICA_BL_SEA_part_xmain')
                    ->select('*')
                    ->where('ORIGIN_COUNTRY', 'LIKE', '%' . $filterdata1 . '%')
                    ->where('HS_CODE', 'LIKE', '%' . $base_search . '%')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                              ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                    })
                    ->whereNotNull('HS_CODE')
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('US_IMPORTER_NAME');
                
                    
                    $query2 = DB::connection($secondDbConnection)->table('IMP_AMERICA_BL_SEA_part_ymain')
                    ->where('ORIGIN_COUNTRY', 'LIKE', '%' . $filterdata1 . '%')
                    ->where('HS_CODE', 'LIKE', '%' . $base_search . '%')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                              ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                    })
                    ->whereNotNull('HS_CODE')
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('US_IMPORTER_NAME');
                
                    $query3 = DB::connection($secondDbConnection)->table('IMP_AMERICA_BL_SEA_part_zmain')
                    ->where('ORIGIN_COUNTRY', 'LIKE', '%' . $filterdata1 . '%')
                    ->where('HS_CODE', 'LIKE', '%' . $base_search . '%')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                              ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                    })
                    ->whereNotNull('HS_CODE')
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('US_IMPORTER_NAME');
    
                    // Combine the queries using union
                    $combinedQuery = $query1
                        ->union($query2)
                        ->union($query3)
                        ;
                    $results = DB::connection($secondDbConnection)->table(DB::raw("({$combinedQuery->toSql()}) as sub"))
                    ->mergeBindings($combinedQuery) 
                    ->limit(10)
                    ->get();
                    // dd('Country Block',$results);
                } else if ($filterby1 == 'unloading_port'){
                    // dd('Search Deatails',$searchDetails,'Filter data1', $filterdata1,'filterby', $filterby,'filterdata',$filterdata);
                    $results = DB::connection($secondDbConnection)->table('IMP_AMERICA_BL_SEA')
                    ->select('*')
                    ->where('UNLOADING_PORT', 'LIKE', '%' . $filterdata1 . '%')
                    ->where('HS_CODE', 'LIKE', '%' . $base_search .'%')
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                              ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%');
                    })
                    ->whereNotNull('HS_CODE')
                    ->whereNotNull('US_IMPORTER_NAME')
                    ->limit(10)
                    ->get();
                
                } else {
                    # code...
                     $results = collect();
                }
            } else {
                # code...
            
                if ($filterby1 == 'hs_code') {
                    $results = DB::connection($secondDbConnection)->table('IMP_AMERICA_BL_SEA')
                    ->select('*')
                    ->where('HS_CODE', 'like', $filterdata1 . '%')
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->Where('PRODUCT_DESCRIPTION', 'like', '%' . $base_search . '%')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                              ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                    })
                    ->whereNotNull('HS_CODE')
                    ->whereNotNull('US_IMPORTER_NAME')                    
                    ->limit(10)
                    ->get();
                    // dd('Country Block');
                } else if ($filterby1 == 'unloading_port'){
                    // dd('Else Bloack in Unloading pOrt',$filterdata,$filterdata1,$searchDetails,$searchDetails1);
                    $filterdata1 = str_replace('-', ' ', $filterdata1);
                    $query1 = DB::connection($secondDbConnection)->table('IMP_AMERICA_BL_SEA')
                    ->select('*')
                    ->where('UNLOADING_PORT', 'LIKE', '%' . $filterdata1 . '%')
                    ->where('PRODUCT_DESCRIPTION', 'like', '%' . $base_search . '%')
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')                          
                            ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                    })
                    ->whereNotNull('HS_CODE')
                    ->whereNotNull('US_IMPORTER_NAME');
                    $query2 = DB::connection($secondDbConnection)->table('IMP_AMERICA_BL_SEA')
                    ->where('UNLOADING_PORT', 'LIKE', '%' . $filterdata1 . '%')
                    ->where('PRODUCT_DESCRIPTION', 'like', '%' . $base_search . '%')
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')                          
                            ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                    })
                    ->whereNotNull('HS_CODE')
                    ->whereNotNull('US_IMPORTER_NAME');
                    $query3 = DB::connection($secondDbConnection)->table('IMP_AMERICA_BL_SEA')
                    ->where('UNLOADING_PORT', 'LIKE', '%' . $filterdata1 . '%')
                    ->where('PRODUCT_DESCRIPTION', 'like', '%' . $base_search . '%')
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')                          
                            ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                    })
                    ->whereNotNull('HS_CODE')
                    ->whereNotNull('US_IMPORTER_NAME');
    
                    // Combine the queries using union
                    $combinedQuery = $query1
                    ->union($query2)
                    ->union($query3)
                    ;
                    $results = DB::connection($secondDbConnection)->table(DB::raw("({$combinedQuery->toSql()}) as sub"))
                    ->mergeBindings($combinedQuery) // You need to merge bindings to avoid SQL errors
                    ->limit(10)
                    ->get();     
                   
                } else {
                    # code...
                     $results = collect();
                }
            }
        } else {
            // dd('In Export Bloc');
            $values = explode(',', $base_search);
            $all_numeric = true;
            
            foreach ($values as $value) {
                if (!is_numeric($value)) {
                    $all_numeric = false;
                    break;
                }
            }
            
            if ($all_numeric) {
            //dd('In numeric Bloc');
                if ($filterby1 == 'hs_code') {
                    // dd('HS_CODE', $filterdata,'filterdata1',$filterdata1);
                    $results = DB::connection($secondDbConnection)->table('EXP_AMERICA_BL_SEA')
                    ->select('*')
                    ->where('HS_CODE', 'like', $filterdata1 . '%')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata. '%')
                            ->orWhere('DESTINATION_COUNTRY', 'like', '%' . $filterdata. '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata. '%');
                    }) 
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    ->whereNotNull('US_EXPORTER_NAME')
                    ->limit(10)
                    ->get();
                // dd($results);
                } else if ($filterby1 == 'country') {
                    // dd('DESTINATION_COUNTRY',$filterdata1,'HS_CODE', $filterdata,);
                    $results = DB::connection($secondDbConnection)->table('EXP_AMERICA_BL_SEA')
                    ->select('*')
                    ->where('DESTINATION_COUNTRY', 'LIKE', '%' . $filterdata1 . '%')
                    ->where('HS_CODE', 'LIKE', '%' . $base_search . '%')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like',  $filterdata . '%')
                              ->orWhere('DESTINATION_COUNTRY', 'like', '%' . $filterdata . '%')
                              ->orWhere('UNLOADING_PORT', 'like',  $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    // ->whereNotNull('HS_CODE')
                    // ->whereNotNull('US_EXPORTER_NAME')
                    ->limit(10)
                    ->get();
              
                } else if ($filterby1 == 'unloading_port'){
                    // dd('UNLOADING_PORT',$filterdata1,'DESTINATION_COUNTRY',$filterdata,$base_search);
                    $results = DB::connection($secondDbConnection)->table('EXP_AMERICA_BL_SEA')
                    ->select('*')
                    ->where('UNLOADING_PORT', 'LIKE', '%' . $filterdata1 . '%')
                    ->where('HS_CODE','like','%'.$base_search.'%')
                    ->where(function($query) use ($filterdata) {
                        $query->where('DESTINATION_COUNTRY', 'like', '%' . $filterdata . '%')
                              ->orWhere('HS_CODE', 'like', $filterdata . '%')
                              ->orwhere('UNLOADING_PORT','like','%'. $filterdata. '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    // ->whereNotNull('HS_CODE')
                    // ->whereNotNull('US_EXPORTER_NAME')
                    ->limit(10)
                    ->get();
                //    dd($results);
                } else {
                    # code...
                     $results = collect();
                }
            } else {
                # code...  
                // dd('UNLOADING_PORT',$filterdata1,'DESTINATION_COUNTRY',$filterdata,$base_search);
                if ($filterby1 == 'hs_code') {
                    // dd('$filterdata1',$filterdata1,'Base',$base_search,'filterdata',$filterdata);
                    $results = DB::connection($secondDbConnection)->table('EXP_AMERICA_BL_SEA')
                    ->select('*')
                    ->where('HS_CODE', 'like', $filterdata1 . '%')
                    ->where('PRODUCT_DESCRIPTION', 'like', '%' . $base_search . '%')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                              ->orWhere('DESTINATION_COUNTRY', $filterdata )
                              ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    // ->whereNotNull('HS_CODE')
                    // ->whereNotNull('US_EXPORTER_NAME')
                    ->limit(10)
                    ->get();
                    // dd('if BlockS',$results);
                } else if ($filterby1 == 'country') {
                    // dd('Filterdata',$filterdata,'filterdata1',$filterdata1,$searchDetails);
                    $results = DB::connection($secondDbConnection)->table('EXP_AMERICA_BL_SEA')
                    ->select('*')
                    ->where('DESTINATION_COUNTRY', 'LIKE', '%' . $filterdata1 . '%')
                    ->where('PRODUCT_DESCRIPTION', 'like', '%' . $base_search . '%')
                    ->whereNotNull('HS_CODE')
                    // ->whereNotNull('US_EXPORTER_NAME')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_Code', 'like', '%' . $filterdata . '%')
                              ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                              ->orWhere('Unloading_port', 'like', '%' . $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    // ->whereNotNull('US_EXPORTER_NAME')
                    ->limit(10)
                    ->get();
                
                    // dd('Query Results', $results);
                } else if ($filterby1 == 'unloading_port'){
                    $results = DB::connection($secondDbConnection)->table('EXP_AMERICA_BL_SEA')
                    ->select('*')
                    ->where('UNLOADING_PORT', 'LIKE', '%' . $filterdata1 . '%')
                    ->where('PRODUCT_DESCRIPTION', 'like', '%' . $base_search . '%')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_Code', 'like', '%' . $filterdata . '%')                          
                            ->orWhere('DESTINATION_COUNTRY', 'like', '%' . $filterdata . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                            //   ->orWhere('PRODUCT_DESCRIPTION', 'like', '%' . $searchDetails1 . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    // ->whereNotNull('US_EXPORTER_NAME')
                    ->limit(10)
                    ->get();
                   
                } else {
                    # code...
                     $results = collect();
                }
            }
            // dd($filterby,$filterby1);
        }

        return view('frontend.livedata.searchfilter-one', [
            'result' => $results,
            'desc'   => $filterdata,
            'type'   => $type,
            'role'   => $role,
            'hscode' => $filterdata,
            'searchDetails1' => $base_search,
            'filterby' => $filterby,
            'filterby1'=> $filterby1,
            'filterdata' => $filterdata,
            'filterdata1' => $filterdata1,
            'args' => $args,
            'search' =>$search
         ]);
    }

    // Search Filter two
    public function searchFilter2() {
        $secondDbConnection = 'mysql2'; // The name of your second database connection
        $secondDbName = DB::connection($secondDbConnection)->getDatabaseName();
        //dd ('Second Database: ' . $secondDbName);
        $tables = DB::connection($secondDbConnection)->select('SHOW TABLES');
        // Check and debug input parameters
          $arg = func_get_args();
          //dd($arg);
          if(count($arg) == 8){
             [$type, $role,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1] = $arg;
             $searchDetails1=$filter;
          }else if(count($arg) == 10){
             [$type, $role,$search,$searchDetails1,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1] = $arg;
          }
        // dd('Type',$type,'Role', $role,$search,'Base Search',$searchDetails1,'Filter', $filter,'Filterby',$filterby,'Filterby1', $filterby1, 'Filterdata',$filterdata,'Filterby2', $filterby2,'Dilterdata1', $filterdata1);
          $filterdata1 = str_replace('-', ' ', $filterdata1);
          $filterdata = str_replace('-', ' ', $filterdata);
          $filter = str_replace('-', ' ', $filter);
        if ($role == 'import') {
            # code...
            $values = explode(',', $searchDetails1);
            $all_numeric = true;
            
            foreach ($values as $value) {
                if (!is_numeric($value)) {
                    $all_numeric = false;
                    break;
                }
            }
            
            if ($all_numeric){
                # code...
                // dd('Numeric Bloc');
               
                if ($filterby2 == 'hs_code') {
                    // dd('IN Numeric hs_code','SearchDetails', $filter, 'filterdata', $filterdata, 'filterby', $filterby, 'filterdata1', $filterdata1);

                    $results = DB::connection($secondDbConnection)->table('IMP_AMERICA_BL_SEA')
                    ->select('*')
                    ->where('HS_CODE', 'LIKE', '%' . $filterdata1 . '%')
                    ->where(function($query) use ($filter) {
                        $query->where('HS_CODE', 'like', '%' . $filter . '%')
                              ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filter . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    })
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                              ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    ->limit(10)
                    ->get();  
                    // $query2 = DB::connection($secondDbConnection)->table('IMP_AMERICA_BL_SEA_part_ymain')
                    // ->select('*')
                    // ->where('HS_CODE', 'LIKE', '%' . $filterdata1 . '%')
                    // ->where(function($query) use ($filter) {
                    //     $query->where('HS_CODE', 'like', '%' . $filter . '%')
                    //           ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filter . '%')
                    //           ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    // })
                    // ->where(function($query) use ($filterdata) {
                    //     $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                    //           ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                    //           ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    // })
                    // ->whereRaw('LENGTH(HS_CODE) <= 12')
                    // ->whereNotNull('HS_CODE');
                    // // ->whereNotNull('US_IMPORTER_NAME');
                    // $query3 = DB::connection($secondDbConnection)->table('IMP_AMERICA_BL_SEA_part_zmain')
                    // ->select('*')
                    // ->where('HS_CODE', 'LIKE', '%' . $filterdata1 . '%')
                    // ->where(function($query) use ($filter) {
                    //     $query->where('HS_CODE', 'like', '%' . $filter . '%')
                    //           ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filter . '%')
                    //           ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    // })
                    // ->where(function($query) use ($filterdata) {
                    //     $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                    //           ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                    //           ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    // })
                    // ->whereRaw('LENGTH(HS_CODE) <= 12')
                    // ->whereNotNull('HS_CODE');
                    // // ->whereNotNull('US_IMPORTER_NAME');
        
                    // $combinedQuery = $query1
                    // ->union($query2)
                    // ->union($query3)
                    // ;
                    // $results = DB::connection($secondDbConnection)->table(DB::raw("({$combinedQuery->toSql()}) as sub"))
                    // ->mergeBindings($combinedQuery) // You need to merge bindings to avoid SQL errors
                    // ->limit(10)
                    // ->get();   
                    // dd('HS_CODE',$results);
                    // dd('if BlockS');
                } else if ($filterby2 == 'country') {
                    // dd('IN Numeric Country','SearchDetails', $searchDetails, 'filterdata', $filterdata, 'filterby', $filterby, 'filterdata1', $filterdata1);
                    $results = DB::connection($secondDbConnection)->table('IMP_AMERICA_BL_SEA')
                    ->select('*')
                    ->where('ORIGIN_COUNTRY', 'LIKE', '%' . $filterdata1 . '%')
                    ->where(function($query) use ($filter) {
                        $query->where('HS_CODE', 'like', '%' . $filter . '%')
                              ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filter . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    })
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                              ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    ->whereNotNull('US_IMPORTER_NAME')
                    ->limit(10)
                    ->get();   
                    
                    // $query2 = DB::connection($secondDbConnection)->table('IMP_AMERICA_BL_SEA_part_ymain')
                    // ->select('*')
                    // ->where('ORIGIN_COUNTRY', 'LIKE', '%' . $filterdata1 . '%')
                    // ->where(function($query) use ($filter) {
                    //     $query->where('HS_CODE', 'like', '%' . $filter . '%')
                    //           ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filter . '%')
                    //           ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    // })
                    // ->where(function($query) use ($filterdata) {
                    //     $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                    //           ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                    //           ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    // })
                    // ->whereRaw('LENGTH(HS_CODE) <= 12')
                    // ->whereNotNull('HS_CODE')
                    // ->whereNotNull('US_IMPORTER_NAME');
                    // $query3 = DB::connection($secondDbConnection)->table('IMP_AMERICA_BL_SEA_part_zmain')
                    // ->select('*')
                    // ->where('ORIGIN_COUNTRY', 'LIKE', '%' . $filterdata1 . '%')
                    // ->where(function($query) use ($filter) {
                    //     $query->where('HS_CODE', 'like', '%' . $filter . '%')
                    //           ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filter . '%')
                    //           ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    // })
                    // ->where(function($query) use ($filterdata) {
                    //     $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                    //           ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                    //           ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    // })
                    // ->whereRaw('LENGTH(HS_CODE) <= 12')
                    // ->whereNotNull('HS_CODE')
                    // ->whereNotNull('US_IMPORTER_NAME');
        
                    // $combinedQuery = $query1
                    // ->union($query2)
                    // ->union($query3)
                    // ;
                    // $results = DB::connection($secondDbConnection)->table(DB::raw("({$combinedQuery->toSql()}) as sub"))
                    // ->mergeBindings($combinedQuery) 
                    // ->limit(10)
                    // ->get();   
                    // dd('Country',$results);
                } else if ($filterby2 == 'unloading_port') {
                    // dd('IN Numeric UNLOADING_PORT','Filter',$filter,'filterdata', $filterdata, 'filterby', $filterby,'Filterby1', $filterby1,'Filterby2', $filterby2, 'filterdata1', $filterdata1);
                    $results = DB::connection($secondDbConnection)->table('IMP_AMERICA_BL_SEA')
                    ->select('*')
                    ->where('UNLOADING_PORT', 'LIKE', '%' . $filterdata1 . '%')
                    ->where(function($query) use ($filter) {
                        $query->where('HS_CODE', 'like', '%' . $filter . '%')
                              ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filter . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    })
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                              ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    ->whereNotNull('US_IMPORTER_NAME')
                    ->limit(10)
                    ->get();  
                
                } else {
                    # code...
                    $results = collect();
                }
            } else {
                # code...
                //   dd('Type',$type,'Role', $role,'$searchDetails1',$searchDetails1,'Filter', $filter,'Filterby',$filterby,'Filterby1', $filterby1, 'Filterdata',$filterdata,'Filterby2', $filterby2,'Filterdata1', $filterdata1);
                if ($filterby2 == 'hs_code') {

                    $results = DB::connection($secondDbConnection)->table('IMP_AMERICA_BL_SEA')
                    ->select('*')
                    ->where('PRODUCT_DESCRIPTION', 'LIKE','%'.$searchDetails1 .'%')
                    ->where('HS_CODE', 'LIKE', '%' . $filterdata1 . '%')
                    ->where(function($query) use ($filter) {
                        $query->where('HS_CODE', 'like', '%' . $filter . '%')
                              ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filter . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    })
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                              ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    ->whereNotNull('US_IMPORTER_NAME')
                    ->limit(10)
                    ->get(); 
         
                
                } else if ($filterby2 == 'country') {
                     // dd('CoUNTRY BLOCK');
                   // dd('Type',$type,'Role', $role,'searchDetails1',$searchDetails1,'Filter', $filter,'Filterby',$filterby,'Filterby1', $filterby1, 'Filterdata',$filterdata,'Filterby2', $filterby2,'Filterdata1', $filterdata1);
                    $results = DB::connection($secondDbConnection)->table('IMP_AMERICA_BL_SEA')
                    ->select('*')
                    ->where('PRODUCT_DESCRIPTION', 'LIKE','%'.$searchDetails1 .'%')
                    ->where('ORIGIN_COUNTRY', 'LIKE', '%' . $filterdata1 . '%')
                    ->where(function($query) use ($filter) {
                        $query->where('PRODUCT_DESCRIPTION', 'like', '%' . $filter . '%')
                              ->orWhere('HS_CODE', 'like', '%' . $filter . '%')
                              ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filter . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    })
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                              ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    ->whereNotNull('US_IMPORTER_NAME')
                    ->limit(10)
                    ->get(); 
                 

                } else if ($filterby2 == 'unloading_port') {
  
                    //dd('Base Search', $searchDetails1, 'Filter', $filter, 'Filterdata', $filterdata, 'Filterby', $filterby, 'Filterdata1', $filterdata1);
                    $results = DB::connection($secondDbConnection)->table('IMP_AMERICA_BL_SEA')
                    ->select('*')
                    ->where('PRODUCT_DESCRIPTION', 'LIKE','%'.$searchDetails1 .'%')
                    ->where('UNLOADING_PORT', 'LIKE', '%' . $filterdata1 . '%')
                    ->where(function($query) use ($filter) {
                        $query->where('PRODUCT_DESCRIPTION', 'like', '%' . $filter . '%')
                              ->orWhere('HS_CODE', 'like', '%' . $filter . '%')
                              ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filter . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    })
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                              ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->limit(10)
                    ->get(); 
    
                } else {
                    # code...
                    $results = collect();
                }
            }
        } else {
            # code...
            // dd('In Export Block',$filterby,$filterby2);
            $values = explode(',', $searchDetails1);
            $all_numeric = true;
            
            foreach ($values as $value) {
                if (!is_numeric($value)) {
                    $all_numeric = false;
                    break;
                }
            }
            
            if ($all_numeric){
                # code...  
                // dd("In Numeric block",'filterby',$filterby,'filterby2',$filterby2);
                if($filterby2 == 'hs_code'){
                     //dd("In Hs_Code",$type, $role,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);
                    $results = DB::connection($secondDbConnection)->table('EXP_AMERICA_BL_SEA')
                        ->select('*')
                        // ->where('UNLOADING_PORT', 'LIKE', '%' . $searchDetails . '%')
                        // ->where('DESTINATION_COUNTRY', 'LIKE', '%' . $filterdata . '%')
                        ->where('HS_CODE', 'LIKE', '%' . $filterdata1 . '%')
                        ->where(function($query) use ($filter) {
                            $query->where('HS_CODE', 'like', '%' . $filter . '%')
                                  ->orWhere('DESTINATION_COUNTRY', 'like', '%' . $filter . '%')
                                  ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                        })
                        ->where(function($query) use ($filterdata) {
                            $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                                  ->orWhere('DESTINATION_COUNTRY', 'like', '%' . $filterdata . '%')
                                  ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                        })
                        ->whereRaw('LENGTH(HS_CODE) <= 12')
                        ->whereNotNull('HS_CODE')
                        // ->whereNotNull('US_EXPORTER_NAME')
                        ->limit(10)
                        ->get();
                    // dd('Export last hs_code');
                }else if($filterby2=="country"){
                    //  dd("In Country",$type, $role,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);
                    $results = DB::connection($secondDbConnection)->table('EXP_AMERICA_BL_SEA')
                    ->select('*')
                    ->where('DESTINATION_COUNTRY', 'LIKE', '%' . $filterdata1 . '%')
                    ->where(function($query) use ($filter) {
                        $query->where('HS_CODE', 'like', '%' . $filter . '%')
                              ->orWhere('DESTINATION_COUNTRY', 'like', '%' . $filter . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    })
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                              ->orWhere('DESTINATION_COUNTRY', 'like', '%' . $filterdata . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    // ->whereNotNull('US_EXPORTER_NAME')
                    ->limit(10)
                    ->get();
                }else if($filterby2=="unloading_port"){
                    // dd("In Port",$type, $role,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);
                    #Unloading_Port
                    $results = DB::connection($secondDbConnection)->table('EXP_AMERICA_BL_SEA')
                    ->select('*')
                    ->where('UNLOADING_PORT', 'LIKE',  $filterdata1 . '%')
                    ->where(function($query) use ($filter) {
                        $query->where('HS_CODE', 'like', '%' . $filter . '%')
                              ->orWhere('DESTINATION_COUNTRY', 'like', '%' . $filter . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    })
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                              ->orWhere('DESTINATION_COUNTRY', 'like', '%' . $filterdata . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    // ->whereNotNull('US_EXPORTER_NAME')
                    ->limit(10)
                    ->get();
                    // dd($results->toSql(),$results->getBindings());
                    // dd($results);
                }
                
            } else {
                # code...
                // dd('In description Block');
                if ($filterby2 == 'hs_code') {
                    # code...
                    //dd($arg,'PRODUCT_DESCRIPTION', $searchDetails1,'DESTINATION_COUNTRY', $filterdata,'HS_CODE', $filterdata1 );
                  
                    $results = DB::connection($secondDbConnection)->table('EXP_AMERICA_BL_SEA')
                    ->select('*')
                    ->where('PRODUCT_DESCRIPTION', 'LIKE','%'.$searchDetails1 .'%')
                    ->where('HS_CODE', 'LIKE', '%' . $filterdata1 . '%')
                    ->where(function($query) use ($filter) {
                        $query->where('HS_CODE', 'like', '%' . $filter . '%')
                              ->orWhere('DESTINATION_COUNTRY', 'like', '%' . $filter . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    })
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                              ->orWhere('DESTINATION_COUNTRY', 'like', '%' . $filterdata . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    ->whereNotNull('US_EXPORTER_NAME')
                    ->limit(10)
                    ->get();
                   
                } elseif($filterby2 == 'country') {
                    # code...
                    //dd('PRODUCT_sDESCRIPTION', $searchDetails1,'UNLOADING_PORT', 'DESTINATION_COUNTRY',$filterdata1,$filter,$filterdata1);
                    $results = DB::connection($secondDbConnection)->table('EXP_AMERICA_BL_SEA')
                    ->select('*')
                    ->where('DESTINATION_COUNTRY', 'LIKE', '%' . $filterdata1 . '%')
                    ->where('PRODUCT_DESCRIPTION', 'LIKE','%'.$searchDetails1 .'%')
                    ->where(function($query) use ($filter) {
                        $query->where('HS_CODE', 'like', '%' . $filter . '%')
                              ->orWhere('DESTINATION_COUNTRY', 'like', '%' . $filter . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    })
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                              ->orWhere('DESTINATION_COUNTRY', 'like', '%' . $filterdata . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    // ->whereNotNull('US_IMPORTER_NAME')
                    ->limit(10)
                    ->get();
                    // dd('Export last country non numeric',$results);
                } elseif ($filterby2 == 'unloading_port') {
                    # code...     

                    $results = DB::connection($secondDbConnection)->table('EXP_AMERICA_BL_SEA')
                    ->select('*')
                    ->where('UNLOADING_PORT', 'LIKE', '%' . $filterdata1 . '%')
                    ->where('PRODUCT_DESCRIPTION', 'LIKE','%'.$searchDetails1 .'%')
                    ->where(function($query) use ($filter) {
                        $query->where('HS_CODE', 'like', '%' . $filter . '%')
                              ->orWhere('DESTINATION_COUNTRY', 'like', '%' . $filter . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    })
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                              ->orWhere('DESTINATION_COUNTRY', 'like', '%' . $filterdata . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    // ->whereNotNull('US_EXPORTER_NAME')
                    ->limit(10)
                    ->get();
                }
            }
            
        }
        
        // Debugging to verify results
     
        // Return the view with results
        return view('frontend.livedata.searchfilter-one', [
            'result' => $results,
            'desc' => $filterdata,
            'type' => $type,
            'role' => $role,
            'hscode' => $filterdata,
            'searchDetails1' => $searchDetails1,
            'filterby'=>$filterby,
            'filterby1'=>$filterby1,
            'filterdata' => $filterdata,
            'filterby2' => $filterby2,
            'filterdata1' => $filterdata1,
             'arg' => $arg,
             'filter'=>$filter,
             'search' => count($arg) == 10 ? $search : 'default_search_value'
        ]);
    }

}
