<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Exception;
use Hamcrest\Type\IsNumeric;
use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;

class SearchLiveDataController extends Controller
{
    // Import Sample Data
    function import() {
        $columns = Schema::getColumnListing('IMP_AMERICA_BL_SEA');
        $query = DB::table('IMP_AMERICA_BL_SEA')
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
            $query = DB::table('EXP_AMERICA_BL_SEA')
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

    // Search Live Data Route handeling
    function handleForm(Request $request) {
        $type = $request->input('type');
        $role = $request->input('role');
        $base_desc = str_replace(' ','-',$request->input('description'));
        $search_country = $request->input('country');
        $description = $base_desc ?: '-';
        $hs_code = $request->input('hs_code') ?: '-';
        $section_type = $request->input('section_type');
        // dd($type, $role, $base_desc, $search_country, $description, $hs_code, $section_type);
         if ($type === 'data'){
                if ($hs_code === '-') {
                    $url = route('search.data', ['section_type' => $section_type,'search_country'=>$search_country,'type' => $type, 'role' => $role, 'description' => $description]);
                    // dd($url);
                } else {
                    $url = route('search.data', ['section_type' => $section_type,'search_country'=>$search_country,'type' => $type, 'role' => $role, 'description' => $description, 'hs_code' => $hs_code]);
                    // dd($url);
                }
          } elseif ($type === 'company') {

                if ($hs_code === '-') {
                    $url = route('search.company', [ 'section_type' => $section_type, 'search_country'=>$search_country,'type' => $type, 'role' => $role, 'description' => $description]);
                } else {
                    $url = route('search.company', ['section_type' => $section_type, 'search_country'=>$search_country,'type' => $type, 'role' => $role, 'description' => $description, 'hs_code' => $hs_code]);
                }
          } else {
              abort(404);
          }
        return redirect($url);

    }
    // Database Table Function
    private function table($search_country, $role)
    {
        $secondDbConnection = 'mysql2'; // The name of second database connection
        $thirdDbConnection  = 'mysql3'; // The name of third database connection
        if ($search_country == 'US') {
            if ($role == 'import') {
                return DB::connection($secondDbConnection)->table('IMP_AMERICA_BL_SEA');
            } elseif ($role == 'export') {
                return DB::connection($secondDbConnection)->table('EXP_AMERICA_BL_SEA');
            }
        }elseif($search_country == 'Austria'){
            if ($role == 'import') {
                return DB::connection($thirdDbConnection)->table('Austria_Import');
            } elseif ($role == 'export') {
                return DB::connection($thirdDbConnection)->table('Austria_Export');
            }
        }elseif ($search_country == 'Ecuador') {
            # code...
            if ($role == 'import') {
                # code...
                return DB::connection($secondDbConnection)->table('Ecuador_Import');
            } elseif($role == 'export') {
                # code...
                return DB::connection($thirdDbConnection)->table('ecuador_export');
            }

        }elseif ($search_country == 'Argentina') {
            # code...
            if ($role == 'import') {
                # code...
                return DB::connection($thirdDbConnection)->table('Argentina_Import');
            } elseif($role == 'export') {
                # code...
                return DB::connection($secondDbConnection)->table('argentina_export');
            }

        }elseif ($search_country == 'Panama') {
            # code...
            if ($role == 'import') {
                # code...
                return DB::connection($secondDbConnection)->table('Panama_import');
            } elseif($role == 'export') {
                # code...
                return DB::connection($secondDbConnection)->table('Panama_Export');
            }

        }elseif ($search_country == 'Chile') {
            # code...
            if ($role == 'import') {
                # code...
                return DB::connection($secondDbConnection)->table('Chile_import');
            } elseif($role == 'export') {
                # code...
                return DB::connection($secondDbConnection)->table('Chile_Export');
            }

        }elseif ($search_country == 'Paraguay') {
            # code...
            if ($role == 'import') {
                # code...
                return DB::connection($secondDbConnection)->table('Paraguay_Import');
            } elseif($role == 'export') {
                # code...
                return DB::connection($secondDbConnection)->table('Paraguay_Export');
            }

        }elseif ($search_country == 'Uruguay') {
            # code...
            if ($role == 'import') {
                # code...
                return DB::connection($secondDbConnection)->table('Uruguay_Import');
            } elseif($role == 'export') {
                # code...
                return DB::connection($secondDbConnection)->table('Uruguay_Export');
            }

        }elseif ($search_country == 'Venezuela') {
            # code...
            if ($role == 'import') {
                # code...
                return DB::connection($secondDbConnection)->table('Venezuela_Import');
            } elseif($role == 'export') {
                # code...
                return DB::connection($secondDbConnection)->table('Venezuela_Export');
            }

        }elseif ($search_country == 'Brazil') {
            # code...
            if ($role == 'import') {
                # code...
                return DB::connection($thirdDbConnection)->table('Brazil_Import');
            } elseif($role == 'export') {
                # code...
                return DB::connection($thirdDbConnection)->table('Brazil_Export');
            }

        }elseif ($search_country == 'Peru') {
            # code...
            if ($role == 'import') {
                # code...
                return DB::connection($thirdDbConnection)->table('Peru_Import');
            } elseif($role == 'export') {
                # code...
                return DB::connection($secondDbConnection)->table('PERU_EXPORT');
            }

        }elseif ($search_country == 'Colombia') {
            # code...
            if ($role == 'import') {
                # code...
                return DB::connection($thirdDbConnection)->table('Colombia_Import');
            } elseif($role == 'export') {
                # code...
                return DB::connection($secondDbConnection)->table('Colombia_Export');
            }

        }

        return null; // Return null if no table is matched
    }

   // Search live data
    public function search($section_type,$search_country, $type, $role, $description = null, $hs_code = null)
    {
        $description = str_replace('-', ' ', $description);
        $hs_code = $hs_code ? $hs_code : null; // Ensure $hs_code is null if not provided

        // dd($hs_code);

        // Get the appropriate table based on country and role
        $table = $this->table($search_country, $role);
        //dd($type,$role,$search_country,$table);
        if (!$table) {
            return redirect()->back()->with('error', 'Invalid search country or role.');
        }
        // dd($table,$type,$role,$search_country,$hs_code,$description);
        // Perform data search
        if ($type === 'data') {
            $result = $this->searchData($table, $description, $hs_code, $section_type);
        } elseif ($type === 'company') {
            $result = $this->searchCompany($table, $description, $hs_code, $section_type);
        } else {
            return redirect()->back()->with('error', 'Invalid search type.');
        }

        if ($result->isEmpty()) {
            return redirect()->back()->with('error', 'No results found. Contact us for more details.');
        }
        // dd($result);
        return view('frontend.livedata.search', [
            'section_type' => $section_type,
            'result' => $result,
            'country' => $search_country,
            'mobile_result' => $result,
            'exportresult' => $result,
            'hs_code' => $hs_code,
            'desc' => $description,
            'base_desc' => $description,
            'base_hs_code' => $hs_code,
            'role' => $role,
            'type' => $type,
        ]);
    }

    // Search 'data' type
    private function searchData($table, $description, $hs_code)
    {
        // dd($description,$hs_code);
        $query = $table->select('*')
            ->whereNotNull('HS_CODE')
            ->where(function ($q) use ($description, $hs_code) {
                if ($hs_code) {
                    $q->where('HS_CODE', 'like', $hs_code . '%')
                      ->whereRaw('LENGTH(HS_CODE) <= 12');
                    // dd($q);
                }
                if ($description && $description !== ' ') {
                    // dd($description,$hs_code);
                    $description = '"' . $description . '"'; // Wrap in quotes for exact matches
                    $q->where(function ($q) use ($description) {
                        $q->where('PRODUCT_DESCRIPTION', 'like', '%' . $description . '%')
                          ->orWhereRaw("MATCH(PRODUCT_DESCRIPTION) AGAINST(? IN BOOLEAN MODE)", [$description]);
                    });
                }
            })
            ->orderByRaw('LENGTH(HS_CODE), HS_CODE') // Sort by HS_CODE length first, then HS_CODE
            // ->limit(5000)
            ->get();
        return $query;
    }

    // Search 'company' type
    private function searchCompany($table, $description, $hs_code)
    {
        $query = $table->select('*')
            ->whereNotNull('HS_CODE')
            ->where('US_IMPORTER_NAME', '!=', 'N/A')
            ->where(function ($q) use ($description, $hs_code) {
                if ($hs_code) {
                    $q->where('HS_CODE', 'like', $hs_code . '%')
                      ->whereRaw('LENGTH(HS_CODE) <= 12');
                }
                if ($description && $description !== ' ') {
                    $description = '"' . $description . '"';
                    $q->where(function ($q) use ($description) {
                        $q->where('PRODUCT_DESCRIPTION', 'like', '%' . $description . '%')
                          ->orWhereRaw("MATCH(PRODUCT_DESCRIPTION) AGAINST(? IN BOOLEAN MODE)", [$description]);
                    });
                }
            })
            ->limit(12)
            ->get();

        return $query;
    }
    // Search Filter
    public function searchFilter()
    {

        // Retrieve all arguments passed to the method
        $args = func_get_args();
        // dd($args);
        // Assign parameters based on the number of arguments
        // dd($args);
        if (count($args) == 6) {
            [$section_type, $search_country,$type, $role, $filterby, $filterdata] = $args;
            // Get the appropriate table based on country and role
            $table = $this->table($search_country, $role);
            if (!$table) {
                return redirect()->back()->with('error', 'Invalid search country or role.');
            }
            $search = null;
            $base_search = null;
               if($role == 'import'){
                    if($filterby=='hs_code'){
                    $results =$table
                        ->select('*')
                        ->where('HS_CODE', 'like', $filterdata.'%') // Use 'like' operator for pattern matching
                        ->whereRaw('LENGTH(HS_CODE) <= 12')
                        ->whereNotNull('HS_CODE')

                        ->get();

                    //dd($results, $filterdata);
                    }
               }else{
                    $hs_codedetails = $base_search;
                    if($filterby=='hs_code'){
                        $exportresults =$table
                            ->select('*')
                            ->where('HS_CODE', 'like', $filterdata .'%')
                            ->whereRaw('LENGTH(HS_CODE) <= 12')
                            ->whereNotNull('HS_CODE')
                            ->get();
                        $results = $exportresults;
                    }

               }
            if ($results->isEmpty()) {
                 return redirect()->back()->with('error', 'Searched Data Not Found For More Details Contact us.');
            }
            return view('frontend.livedata.searchfilter-one', [
                'section_type' => $section_type,
                'search_country' => $search_country,
                'result' => $results,
                'exportresults' =>$results,
                'mobile_result' => $results,
                'desc' => $filterdata,
                'type' => $type,
                'role' => $role,
                'hscode' => $filterdata,
                'filterdata' => $filterdata,
                'base_search' => $filterdata,
                'searchDetails1' => $filterdata,
                'searfilterdata' => $filterdata,
                'searchfilterby' => $filterby,
                'search' => $filterby,
                'filterby' => $filterby,
                'args'=>$args
            ]);
        }
        else if (count($args) == 8) {
            [$section_type, $search_country,$type, $role, $search, $base_search, $filterby, $filterdata] = $args;
            // Get the appropriate table based on country and role
            $table = $this->table($search_country, $role);
            if (!$table) {
                return redirect()->back()->with('error', 'Invalid search country or role.');
            }
        }

        // dd($search_country);

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

                        $results = $table
                            ->select('*')
                            ->where('HS_CODE', 'like', $hs_codedetails .'%')
                            ->whereRaw('LENGTH(HS_CODE) <= 12')
                            ->where('HS_CODE',  $filterdata )
                            ->whereNotNull('HS_CODE')
                            ->whereNotNull('US_IMPORTER_NAME')

                            ->get();

                        break;
                    case 'country':
                        //dd('this country Block');
                        $results = $table
                            ->select('*')
                            ->where('HS_CODE', 'like', $hs_codedetails .'%')
                            ->whereRaw('LENGTH(HS_CODE) <= 12')
                            ->where('ORIGIN_COUNTRY', 'like', $filterdata . '%')
                            ->whereNotNull('HS_CODE')
                            ->whereNotNull('US_IMPORTER_NAME')
                            ->get();
                        break;
                    case 'unloading_port':

                        $results = $table
                            ->select('*')
                            ->where('HS_CODE', 'like', $hs_codedetails .'%')
                            ->whereRaw('LENGTH(HS_CODE) <= 12')
                            ->where('UNLOADING_PORT', 'like', $filterdata . '%')
                            ->whereNotNull('HS_CODE')
                            ->whereNotNull('US_IMPORTER_NAME')

                            ->get();
                        break;
                    default:
                        $results = collect();
                }
            } else {

                $descdetails = $base_search;
                switch ($filterby) {
                    case 'hs_code':
                        $results = $table
                            ->select('*')
                            ->where('PRODUCT_DESCRIPTION', 'like', '%' . $descdetails .'%')
                            ->where('HS_CODE', 'like', $filterdata . '%')
                             ->whereRaw('LENGTH(HS_CODE) <= 12')
                            ->whereNotNull('HS_CODE')
                            ->whereNotNull('US_IMPORTER_NAME')

                            ->get();
                        break;
                    case 'country':

                        $results = $table
                            ->select('*')
                            ->where('ORIGIN_COUNTRY', 'like', $filterdata . '%')
                            ->where('PRODUCT_DESCRIPTION', 'like', '%' . $descdetails .'%')
                             ->whereRaw('LENGTH(HS_CODE) <= 12')
                            ->whereNotNull('HS_CODE')
                            ->whereNotNull('US_IMPORTER_NAME')

                            ->get();
                        break;
                    case 'unloading_port':
                        $results = $table
                            ->select('*')
                            ->where('PRODUCT_DESCRIPTION', 'like', '%' . $descdetails .'%')
                            ->where('UNLOADING_PORT', 'like', $filterdata . '%')
                             ->whereRaw('LENGTH(HS_CODE) <= 12')
                            ->whereNotNull('HS_CODE')
                            ->whereNotNull('US_IMPORTER_NAME')

                            ->get();
                        break;
                    default:
                        $results = collect();
                }
            }
            if ($results->isEmpty()) {
                return redirect()->back()->with('error', 'Searched Data Not Found For More Details Contact us.');
            }
             return view('frontend.livedata.searchfilter', [
                'section_type' => $section_type,
                'country' => $search_country,
                'result' => $results,
                'mobile_result' => $results,
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
                'args'=>$args
            ]);
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
                        $exportresults = $table
                            ->select('*')
                            ->where('HS_CODE', 'like', $filterdata .'%')
                            ->whereRaw('LENGTH(HS_CODE) <= 12')
                            ->orWhere('HS_CODE', '=', $hs_codedetails)

                            ->get();

                        break;
                    case 'country':
                        $exportresults = $table
                            ->select('*')
                            ->where('HS_CODE', 'like', $hs_codedetails .'%')
                            ->whereRaw('LENGTH(HS_CODE) <= 12')
                            ->where('DESTINATION_COUNTRY', 'like',  $filterdata . '%')

                            ->get();
                        break;
                    case 'unloading_port':
                        $exportresults = $table
                            ->select('*')
                            ->where('UNLOADING_PORT', 'like', '%' . $filterdata . '%')
                            ->where('HS_CODE', 'like', '%' . $hs_codedetails .'%')
                            ->whereRaw('LENGTH(HS_CODE) <= 12')

                            ->get();
                        break;
                    default:
                        $results = collect();
                }
            } else {
                $descdetails = $base_search;
                switch ($filterby) {
                    case 'hs_code':

                        $exportresults = $table

                            ->select('*')
                            ->where('HS_CODE', 'like', '%' . $filterdata . '%')
                            ->whereRaw('LENGTH(HS_CODE) <= 12')
                            ->where('PRODUCT_DESCRIPTION', 'like', '%' . $descdetails .'%')

                            ->get();

                        break;
                    case 'country':

                        $exportresults = $table
                            ->select('*')
                            ->where('DESTINATION_COUNTRY', 'like',  $filterdata . '%')
                            ->where('PRODUCT_DESCRIPTION', 'like', '%' . $descdetails .'%')
                            ->whereRaw('LENGTH(HS_CODE) <= 12')

                            ->get();
                        break;
                    case 'unloading_port':
                        $exportresults = $table
                            ->select('*')
                            ->where('UNLOADING_PORT', 'like', '%' . $filterdata . '%')
                            ->where('PRODUCT_DESCRIPTION', 'like', '%' . $descdetails .'%')
                            ->whereRaw('LENGTH(HS_CODE) <= 12')

                            ->get();
                        break;
                    default:
                        $exportresults = collect();
                }
            }
            if ($exportresults->isEmpty()) {
                 return redirect()->back()->with('error', 'Searched Data Not Found For More Details Contact us.');
            }

             return view('frontend.livedata.searchfilter', [
                'section_type' => $section_type,
                'country' => $search_country,
                'exportresults' => $exportresults,
                'result' => $exportresults,
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
                'args'=>$args
            ]);
        }

    }

    // Search Filter One
    public function searchFilter1() {
        // Handle different filters based on the filterby parameter
          $args = func_get_args();
        //dd($args);
        if(count($args)==8){
            [$section_type, $search_country,$type, $role,$filterby, $filterdata, $filterby1,$filterdata1] = $args;
            // dd($search_country,$role,$section_type);
            $table = $this->table($search_country, $role);
            if (!$table) {
                return redirect()->back()->with('error', 'Invalid search country or role.');
            }
                $filterdata1 = str_replace('-', ' ', $filterdata1);
                $filterdata = str_replace('-', ' ', $filterdata);
                $search = null;
                $base_search = null;
                //dd($type, $role,'Filterby',$filterby,'Filterdata', $filterdata,'Filterby1',  $filterby1,'Filterdata1',$filterdata1);
                if(is_numeric($filterdata)){
                    if ($role=='import') {
                            if($filterby1 == 'hs_code'){
                                $results = $table
                                ->select('*')
                                ->where('HS_CODE', 'LIKE',  $filterdata1 . '%')
                                ->where(function($query) use ($filterdata) {
                                    $query->where('HS_CODE', 'like', $filterdata . '%')
                                        ->orWhere('ORIGIN_COUNTRY', 'like',  $filterdata . '%')
                                        ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                                })
                                ->whereNotNull('HS_CODE')
                                ->whereRaw('LENGTH(HS_CODE) <= 12')
                                ->whereNotNull('US_IMPORTER_NAME')
                                ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                                ->orderBy('HS_CODE', 'asc')

                                ->get();
                            }else if($filterby1 == 'country'){
                                $countrytable = $table->from;
                                $results = $table
                                ->select('*')
                                ->where('ORIGIN_COUNTRY', 'like',  $filterdata1 . '%')
                                ->where('HS_CODE', 'LIKE', $filterdata . '%')
                                ->where(function($query) use ($filterdata,$countrytable) {
                                    $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                                            ->orWhere('ORIGIN_COUNTRY', 'like',  $filterdata . '%');
                                            // ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                                            if (Schema::hasColumn($countrytable, 'UNLOADING_PORT')) {
                                                $query->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                                            }
                                })
                                ->whereNotNull('HS_CODE')
                                ->whereRaw('LENGTH(HS_CODE) <= 12')
                                ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                                ->orderBy('HS_CODE', 'asc')
                                // ->whereNotNull('US_IMPORTER_NAME')

                                ->get();
                            }else{
                                $tableName = $table->from;
                                $hasUnloadingPort = DB::getSchemaBuilder()->hasColumn($tableName, 'UNLOADING_PORT');
                                $results = $table
                                ->select('*')
                                ->when($hasUnloadingPort, function ($query) use ($filterdata1) {
                                    // If 'UNLOADING_PORT' exists, add it to the where clause
                                    return $query->where('UNLOADING_PORT', 'like', "%$filterdata1%");
                                })
                                ->where('HS_CODE', 'LIKE', $filterdata .'%')
                                ->where(function($query) use ($filterdata) {
                                    $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                                            ->orWhere('ORIGIN_COUNTRY', 'like',  $filterdata . '%');
                                })
                                ->whereRaw('LENGTH(HS_CODE) <= 12')
                                ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                                ->orderBy('HS_CODE', 'asc')
                                ->whereNotNull('HS_CODE')

                                ->get();
                            }

                        return view('frontend.livedata.searchfilter-one', [
                            'section_type' => $section_type,
                            'search_country' => $search_country,
                            'result' => $results,
                            'mobile_result' => $results,
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
                    }else{
                            if($filterby1 == 'hs_code'){
                            $results = $table
                                ->select('*')
                                ->where('HS_CODE', 'like', $filterdata1 . '%')
                                ->where('PRODUCT_DESCRIPTION', 'like', '%' . $filterdata . '%')
                                // ->where(function($query) use ($filterdata) {
                                //     $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                                //               ->orWhere('DESTINATION_COUNTRY', $filterdata )
                                //               ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                                //     })
                                ->whereRaw('LENGTH(HS_CODE) <= 12')
                                ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                                ->orderBy('HS_CODE', 'asc')
                                ->whereNotNull('HS_CODE')
                                ->whereNotNull('US_EXPORTER_NAME')
                                ->get();

                                // dd($results);
                            }else if($filterby1 == 'country'){

                                $results = $table
                                ->select('*')
                                ->where('DESTINATION_COUNTRY', 'like',  $filterdata1 . '%')
                                ->where('HS_CODE', 'LIKE', $filterdata . '%')
                                ->whereRaw('LENGTH(HS_CODE) <= 12')
                                ->where(function($query) use ($filterdata,$table) {
                                    $query->where('HS_CODE', 'like',  $filterdata . '%')
                                            ->orWhere('DESTINATION_COUNTRY', 'like',  $filterdata . '%')
                                            ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                                            if (Schema::hasColumn($table, 'UNLOADING_PORT')) {
                                                return $query->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                                            }
                                })
                                ->whereNotNull('HS_CODE')
                                ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                                ->orderBy('HS_CODE', 'asc')

                                ->get();
                            }else{
                                // dd($type, $role,$filterby, $filterdata,  $filterby1,$filterdata1);
                                $tableName = $table->from;
                                $hasUnloadingPort = DB::getSchemaBuilder()->hasColumn($tableName, 'UNLOADING_PORT');
                                $results =$table
                                ->select('*')
                                ->when($hasUnloadingPort, function ($query) use ($filterdata1) {
                                    // If 'UNLOADING_PORT' exists, add it to the where clause
                                    return $query->where('UNLOADING_PORT', 'like', "%$filterdata1%");
                                })
                                ->where('HS_CODE', 'LIKE', $filterdata .'%')
                                ->whereRaw('LENGTH(HS_CODE) <= 12')
                                ->where(function($query) use ($filterdata) {
                                    $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                                            ->orWhere('DESTINATION_COUNTRY', 'like',  $filterdata . '%');
                                })
                                ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                                ->orderBy('HS_CODE', 'asc')
                                ->whereNotNull('HS_CODE')

                                ->get();
                            }

                        return view('frontend.livedata.searchfilter-one', [
                            'section_type' => $section_type,
                            'search_country' => $search_country,
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
                }else{
                    if ($role=='import') {

                            if($filterby1 == 'hs_code'){

                                    $results = $table
                                ->select('*')
                                ->where('HS_CODE', 'LIKE',  $filterdata1 . '%')
                                ->where('PRODUCT_DESCRIPTION', 'like', '%' . $filterdata . '%')
                                // ->where(function($query) use ($filterdata) {
                                //     $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                                //           ->orWhere('ORIGIN_COUNTRY', 'like',  $filterdata . '%')
                                //           ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                                // })
                                ->whereNotNull('HS_CODE')
                                ->whereRaw('LENGTH(HS_CODE) <= 12')
                                ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                                ->orderBy('HS_CODE', 'asc')
                                // ->whereNotNull('US_IMPORTER_NAME')

                                ->get();
                            }else if($filterby1 == 'country'){

                                    $results = $table
                                    ->select('*')
                                    ->where('ORIGIN_COUNTRY', 'like',  $filterdata1 . '%')
                                    ->where('PRODUCT_DESCRIPTION', 'like', '%' . $filterdata . '%')
                                    ->where(function($query) use ($filterdata) {
                                        $query->where('PRODUCT_DESCRIPTION', 'like', '%' . $filterdata . '%')
                                                ->orWhere('ORIGIN_COUNTRY', 'like',  $filterdata . '%');
                                    })
                                    ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                                    ->orderBy('HS_CODE', 'asc')
                                    ->whereNotNull('HS_CODE')
                                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                                    // ->whereNotNull('US_IMPORTER_NAME')

                                    ->get();
                            }else{
                                    $results = $table
                                ->select('*')
                                ->where('UNLOADING_PORT', 'LIKE', '%' . $filterdata1 . '%')
                                ->where('PRODUCT_DESCRIPTION', 'like', '%' . $filterdata . '%')
                                ->where(function($query) use ($filterdata) {
                                    $query->where('PRODUCT_DESCRIPTION', 'like', '%' . $filterdata . '%')
                                            ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                                })
                                ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                                ->orderBy('HS_CODE', 'asc')
                                ->whereRaw('LENGTH(HS_CODE) <= 12')
                                ->whereNotNull('HS_CODE')

                                ->get();
                            }

                        return view('frontend.livedata.searchfilter-one', [
                            'section_type' => $section_type,
                            'search_country' => $search_country,
                            'result' => $results,
                            'mobile_result' => $results,
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
                    }else{
                            if($filterby1 == 'hs_code'){
                            $results = $table
                                ->select('*')
                                ->where('HS_CODE', 'like', $filterdata1 . '%')
                                ->where('PRODUCT_DESCRIPTION', 'like', '%' . $filterdata . '%')
                                // ->where(function($query) use ($filterdata) {
                                //     $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                                //               ->orWhere('DESTINATION_COUNTRY', $filterdata )
                                //               ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                                //     })
                                ->whereRaw('LENGTH(HS_CODE) <= 12')
                                ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                                ->orderBy('HS_CODE', 'asc')
                                ->whereNotNull('HS_CODE')
                                // ->whereNotNull('US_EXPORTER_NAME')

                                ->get();

                                // dd($results);
                            }else if($filterby1 == 'country'){

                                    $results = $table
                                    ->select('*')
                                    ->where('DESTINATION_COUNTRY', 'like',  $filterdata1 . '%')
                                        ->where('PRODUCT_DESCRIPTION', 'like', '%' . $filterdata . '%')
                                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                                    // ->where(function($query) use ($filterdata) {
                                    //     $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                                    //           ->orWhere('ORIGIN_COUNTRY', 'like',  $filterdata . '%')
                                    //           ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                                    // })
                                    ->whereNotNull('HS_CODE')
                                    ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                                    ->orderBy('HS_CODE', 'asc')

                                    ->get();

                            }else{
                                // dd($type, $role,$filterby, $filterdata,  $filterby1,$filterdata1);
                                    $results = $table
                                ->select('*')
                                ->where('UNLOADING_PORT', 'LIKE', '%' . $filterdata1 . '%')
                                ->where('PRODUCT_DESCRIPTION', 'like', '%' . $filterdata . '%')
                                ->whereRaw('LENGTH(HS_CODE) <= 12')
                                // ->where(function($query) use ($filterdata) {
                                //     $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                                //           ->orWhere('ORIGIN_COUNTRY', 'like',  $filterdata . '%');
                                // })
                                ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                                ->orderBy('HS_CODE', 'asc')
                                ->whereNotNull('HS_CODE')

                                ->get();
                                //dd($results);
                            }


                        return view('frontend.livedata.searchfilter-one', [
                            'section_type' => $section_type,
                            'search_country' => $search_country,
                            'result' => $results,
                            'exportresult' => $results,
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
            }
            else if(count($args)==10){
                [$section_type, $search_country,$type, $role, $search,$base_search,$filterby, $filterdata,  $filterby1, $filterdata1] = $args;
                $table = $this->table($search_country, $role);
                if (!$table) {
                    return redirect()->back()->with('error', 'Invalid search country or role.');
                }
        }
        //dd('Type',$type,'Role', $role,'Search Details1',$base_search,'Filter data1', $filterdata1,'filterby', $filterby,'filterdata',$filterdata, 'section type', $section_type);
          $filterdata1 = str_replace('-', ' ', $filterdata1);
          $filterdata = str_replace('-', ' ', $filterdata);
          $base_search = str_replace('-', ' ', $base_search);
        // dd($args,$args,$type, $role,'Search Details1',$base_search,'Filter data1', $filterdata1,'filterby', $filterby,'filterdata',$filterdata,$filterby1);
        if ($role=='import') {
            # code...
            if (is_numeric($base_search)) {
                # code...
                if ($filterby1 == 'hs_code') {
                    $results = $table
                    ->select('*')
                    ->where('HS_CODE', 'like', $filterdata1 . '%')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like',  $filterdata . '%')
                              ->orWhere('ORIGIN_COUNTRY', 'like',  $filterdata . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                    })
                    ->whereNotNull('HS_CODE')
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                    ->orderBy('HS_CODE', 'asc')
                    ->whereNotNull('US_IMPORTER_NAME')

                    ->get();
                    // dd('if BlockS',$results);
                } else if ($filterby1 == 'country') {
                    // dd('Search Deatails',$searchDetails,'Filter data1', $filterdata1,'filterby', $filterby,'filterdata',$filterdata);
                    $results = $table
                    ->select('*')
                    ->where('ORIGIN_COUNTRY', 'like',  $filterdata1 . '%')
                    ->where('HS_CODE', 'LIKE',  $base_search . '%')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like',  $filterdata . '%')
                              ->orWhere('ORIGIN_COUNTRY', 'like',  $filterdata . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                    })
                    ->whereNotNull('HS_CODE')
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                    ->orderBy('HS_CODE', 'asc')
                    // ->whereNotNull('US_IMPORTER_NAME')

                    ->get();
                    // dd('Country Block',$results);
                } else if ($filterby1 == 'port'){
                    // dd('Search Deatails',$searchDetails,'Filter data1', $filterdata1,'filterby', $filterby,'filterdata',$filterdata);
                    $results = $table
                    ->select('*')
                    ->where('UNLOADING_PORT', 'LIKE', '%' . $filterdata1 . '%')
                    ->where('HS_CODE', 'LIKE',  $base_search .'%')
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like',  $filterdata . '%')
                              ->orWhere('ORIGIN_COUNTRY', 'like',  $filterdata . '%');
                    })
                    ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                    ->orderBy('HS_CODE', 'asc')
                    ->whereNotNull('HS_CODE')
                    // ->whereNotNull('US_IMPORTER_NAME')

                    ->get();

                } else {
                    # code...
                     $results = collect();
                }
            } else {
                # code...
                // dd($filterby1);
                if ($filterby1 == 'hs_code') {
                    $results = $table
                    ->select('*')
                    ->where('HS_CODE', 'like', $filterdata1 . '%')
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->Where('PRODUCT_DESCRIPTION', 'like', '%' . $base_search . '%')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                              ->orWhere('ORIGIN_COUNTRY', 'like',  $filterdata . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                    })
                    ->whereNotNull('HS_CODE')
                    ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                    ->orderBy('HS_CODE', 'asc')
                    // ->whereNotNull('US_IMPORTER_NAME')

                    ->get();

                    // dd('if BlockS');
                } else if ($filterby1 == 'country') {
                    $CountryTable = $table->from;
                    // dd($type, $role,'Search Details1',$base_search,'Search Deatails',$searchDetails,'Filter data1', $filterdata1,'filterby', $filterby,'filterdata',$filterdata);
                    $results = $table
                    ->select('*')
                    ->where('ORIGIN_COUNTRY', 'like',  $filterdata1 . '%')
                    ->where(function($q) use ($base_search) {
                        $q->where('PRODUCT_DESCRIPTION', 'like', '%'. $base_search . '%')
                          ->orWhereRaw("MATCH(PRODUCT_DESCRIPTION) AGAINST(? IN BOOLEAN MODE)", [$base_search]);
                    })
                    ->where(function($query) use ($filterdata, $CountryTable) {
                        $query->where('HS_CODE', 'like',  $filterdata . '%')
                              ->orWhere('ORIGIN_COUNTRY', 'like',  $filterdata . '%');
                              if (Schema::hasColumn($CountryTable, 'UNLOADING_PORT')) {
                                $query->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                            }
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                    // ->whereNotNull('US_IMPORTER_NAME')
                    ->limit(1000)
                    ->get();

                     //dd('Country Block',$results);
                } else if ($filterby1 == 'port'){
                    // dd('Else Block in Unloading pOrt',$base_search,$filterdata,$filterdata1);
                    $filterdata1 = str_replace('-', ' ', $filterdata1);
                    $results = $table
                    ->select('*')
                    ->where('UNLOADING_PORT', 'LIKE',  $filterdata1 . '%')
                    ->where('PRODUCT_DESCRIPTION', 'like', '%' . $base_search . '%')
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like',  $filterdata . '%')
                            ->orWhere('ORIGIN_COUNTRY', 'like',  $filterdata . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                    })
                    ->whereNotNull('HS_CODE')
                    ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                    ->orderBy('HS_CODE', 'asc')
                    // ->whereNotNull('US_IMPORTER_NAME')
                    ->limit(5000)
                    ->get();
                   // dd($results);
                } else {
                    # code...
                     $results = collect();
                }
            }
        } else {
            # code...
            // dd('In Export Bloc');
            $values = explode(',', $base_search);
            $all_numeric = true;

            foreach ($values as $value) {
                if (!is_numeric($value)) {
                    $all_numeric = false;
                    break;
                }
            }

            if ($all_numeric){
            //   dd('In numeric Bloc');
                # code...
                if ($filterby1 == 'hs_code') {
                    // dd('HS_CODE', $filterdata,'filterdata1',$filterdata1);
                    $results = $table
                    ->select('*')
                    ->where('HS_CODE', 'like', $filterdata1 . '%')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like',  $filterdata. '%')
                              ->orWhere('DESTINATION_COUNTRY', 'like',  $filterdata. '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata. '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                    ->orderBy('HS_CODE', 'asc')
                    ->whereNotNull('US_EXPORTER_NAME')

                    ->get();
                // dd($results);
                } else if ($filterby1 == 'country') {
                    // dd('DESTINATION_COUNTRY',$filterdata1,'HS_CODE', $filterdata,);
                    $results = $table
                    ->select('*')
                    ->where('DESTINATION_COUNTRY', 'like',  $filterdata1 . '%')
                    ->where('HS_CODE', 'LIKE', $base_search . '%')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like',  $filterdata . '%')
                              ->orWhere('DESTINATION_COUNTRY', 'like',  $filterdata . '%')
                              ->orWhere('UNLOADING_PORT', 'like',  $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                    ->orderBy('HS_CODE', 'asc')
                    // ->whereNotNull('HS_CODE')
                    // ->whereNotNull('US_EXPORTER_NAME')

                    ->get();

                } else if ($filterby1 == 'port'){
                    // dd('UNLOADING_PORT',$filterdata1,'DESTINATION_COUNTRY',$filterdata,$base_search);
                    $results = $table
                    ->select('*')
                    ->where('UNLOADING_PORT', 'LIKE', '%' . $filterdata1 . '%')
                    ->where('HS_CODE','like', $base_search.'%')
                    ->where(function($query) use ($filterdata) {
                        $query->where('DESTINATION_COUNTRY', 'like',  $filterdata . '%')
                              ->orWhere('HS_CODE', 'like', $filterdata . '%')
                              ->orwhere('UNLOADING_PORT','like','%'. $filterdata. '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                    ->orderBy('HS_CODE', 'asc')
                    // ->whereNotNull('HS_CODE')
                    // ->whereNotNull('US_EXPORTER_NAME')

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
                    $results = $table
                    ->select('*')
                    ->where('HS_CODE', 'like', $filterdata1 . '%')
                    ->where('PRODUCT_DESCRIPTION', 'like', '%' . $base_search . '%')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like',  $filterdata . '%')
                              ->orWhere('DESTINATION_COUNTRY', $filterdata )
                              ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                    ->orderBy('HS_CODE', 'asc')
                    // ->whereNotNull('HS_CODE')
                    // ->whereNotNull('US_EXPORTER_NAME')

                    ->get();
                    // dd('if BlockS',$results);
                } else if ($filterby1 == 'country') {
                    // dd('Filterdata',$filterdata,'filterdata1',$filterdata1,$searchDetails);
                    $results = $table
                    ->select('*')
                    ->where('DESTINATION_COUNTRY', 'like',  $filterdata1 . '%')
                    ->where('PRODUCT_DESCRIPTION', 'like', '%' . $base_search . '%')
                    ->whereNotNull('HS_CODE')
                    // ->whereNotNull('US_EXPORTER_NAME')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_Code', 'like',  $filterdata . '%')
                              ->orWhere('DESTINATION_COUNTRY', 'like',  $filterdata . '%')
                              ->orWhere('Unloading_port', 'like', '%' . $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                    ->orderBy('HS_CODE', 'asc')
                    // ->whereNotNull('US_EXPORTER_NAME')

                    ->get();

                    // dd('Query Results', $results);
                } else if ($filterby1 == 'port'){
                    $results = $table
                    ->select('*')
                    ->where('UNLOADING_PORT', 'LIKE', '%' . $filterdata1 . '%')
                    ->where('PRODUCT_DESCRIPTION', 'like', '%' . $base_search . '%')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_Code', 'like', $filterdata . '%')
                            ->orWhere('DESTINATION_COUNTRY', 'like',  $filterdata . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                            //   ->orWhere('PRODUCT_DESCRIPTION', 'like', '%' . $searchDetails1 . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                    ->orderBy('HS_CODE', 'asc')
                    // ->whereNotNull('US_EXPORTER_NAME')

                    ->get();

                } else {
                    # code...
                     $results = collect();
                }
            }
            // dd($filterby,$filterby1);
        }

        return view('frontend.livedata.searchfilter-one', [
            'section_type' => $section_type,
            'search_country' => $search_country,
            'result' => $results,
            'mobile_result' => $results,
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
        // Check and debug input parameters
          $arg = func_get_args();
          //dd($arg);
          if(count($arg) == 10){
             [$section_type, $search_country,$type, $role,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1] = $arg;
             $searchDetails1=$filter;
             $table = $this->table($search_country, $role);
             if (!$table) {
                 return redirect()->back()->with('error', 'Invalid search country or role.');
             }
          }else if(count($arg) == 12){
             [$section_type, $search_country,$type, $role,$search,$searchDetails1,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1] = $arg;
             $table = $this->table($search_country, $role);
             if (!$table) {
                 return redirect()->back()->with('error', 'Invalid search country or role.');
             }
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

                    $results =  $table
                    ->select('*')
                    ->where('HS_CODE', 'LIKE', '%' . $filterdata1 . '%')
                    ->where(function($query) use ($filter) {
                        $query->where('HS_CODE', 'like', $filter . '%')
                            ->orWhere('ORIGIN_COUNTRY', 'like',  $filter . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    })
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', $filterdata . '%')
                            ->orWhere('ORIGIN_COUNTRY', 'like',  $filterdata . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')

                    ->get();

                    // dd('if BlockS');
                } else if ($filterby2 == 'country') {
                    // dd('IN Numeric Country','SearchDetails', $searchDetails, 'filterdata', $filterdata, 'filterby', $filterby, 'filterdata1', $filterdata1);
                    $results =  $table
                    ->select('*')
                    ->where('ORIGIN_COUNTRY', 'like',  $filterdata1 . '%')
                    ->where(function($query) use ($filter) {
                        $query->where('HS_CODE', 'like',  $filter . '%')
                            ->orWhere('ORIGIN_COUNTRY', 'like',  $filter . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    })
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like',  $filterdata . '%')
                            ->orWhere('ORIGIN_COUNTRY', 'like',  $filterdata . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    ->whereNotNull('US_IMPORTER_NAME')

                    ->get();


                    // dd('Country',$results);
                } else if ($filterby2 == 'port') {
                    // dd('IN Numeric UNLOADING_PORT','Filter',$filter,'filterdata', $filterdata, 'filterby', $filterby,'Filterby1', $filterby1,'Filterby2', $filterby2, 'filterdata1', $filterdata1);
                    $results =  $table
                    ->select('*')
                    ->where('UNLOADING_PORT', 'LIKE', '%' . $filterdata1 . '%')
                    ->where(function($query) use ($filter) {
                        $query->where('HS_CODE', 'like',  $filter . '%')
                            ->orWhere('ORIGIN_COUNTRY', 'like',  $filter . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    })
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like',  $filterdata . '%')
                            ->orWhere('ORIGIN_COUNTRY', 'like',  $filterdata . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    ->whereNotNull('US_IMPORTER_NAME')

                    ->get();

                } else {
                    # code...
                    $results = collect();
                }
            } else {
                # code...
                //   dd('Type',$type,'Role', $role,'$searchDetails1',$searchDetails1,'Filter', $filter,'Filterby',$filterby,'Filterby1', $filterby1, 'Filterdata',$filterdata,'Filterby2', $filterby2,'Filterdata1', $filterdata1);
                if ($filterby2 == 'hs_code') {

                    $results =  $table
                    ->select('*')
                    ->where('PRODUCT_DESCRIPTION', 'LIKE','%'.$searchDetails1 .'%')
                    ->where('HS_CODE', 'LIKE', '%' . $filterdata1 . '%')
                    ->where(function($query) use ($filter) {
                        $query->where('HS_CODE', 'like',  $filter . '%')
                            ->orWhere('ORIGIN_COUNTRY', 'like',  $filter . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    })
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like',  $filterdata . '%')
                            ->orWhere('ORIGIN_COUNTRY', 'like',  $filterdata . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    ->whereNotNull('US_IMPORTER_NAME')

                    ->get();


                } else if ($filterby2 == 'country') {
                    // dd('CoUNTRY BLOCK');
                // dd('Type',$type,'Role', $role,'searchDetails1',$searchDetails1,'Filter', $filter,'Filterby',$filterby,'Filterby1', $filterby1, 'Filterdata',$filterdata,'Filterby2', $filterby2,'Filterdata1', $filterdata1);
                    $results = $table
                    ->select('*')
                    ->where('PRODUCT_DESCRIPTION', 'LIKE','%'.$searchDetails1 .'%')
                    ->where('ORIGIN_COUNTRY', 'like',  $filterdata1 . '%')
                    ->where(function($query) use ($filter) {
                        $query->where('PRODUCT_DESCRIPTION', 'like', '%' . $filter . '%')
                            ->orWhere('HS_CODE', 'like', $filter . '%')
                            ->orWhere('ORIGIN_COUNTRY', 'like',  $filter . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    })
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like',  $filterdata . '%')
                            ->orWhere('ORIGIN_COUNTRY', 'like',  $filterdata . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    // ->whereNotNull('US_IMPORTER_NAME')

                    ->get();


                } else if ($filterby2 == 'port') {

                    //dd('Base Search', $searchDetails1, 'Filter', $filter, 'Filterdata', $filterdata, 'Filterby', $filterby, 'Filterdata1', $filterdata1);
                    $results = $table
                    ->select('*')
                    ->where('PRODUCT_DESCRIPTION', 'LIKE','%'.$searchDetails1 .'%')
                    ->where('UNLOADING_PORT', 'LIKE', '%' . $filterdata1 . '%')
                    ->where(function($query) use ($filter) {
                        $query->where('PRODUCT_DESCRIPTION', 'like', '%' . $filter . '%')
                            ->orWhere('HS_CODE', 'like',  $filter . '%')
                            ->orWhere('ORIGIN_COUNTRY', 'like',  $filter . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    })
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like',  $filterdata . '%')
                            ->orWhere('ORIGIN_COUNTRY', 'like',  $filterdata . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')

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
                    $results = $table
                        ->select('*')
                        // ->where('UNLOADING_PORT', 'LIKE', '%' . $searchDetails . '%')
                        // ->where('DESTINATION_COUNTRY', 'like',  $filterdata . '%')
                        ->where('HS_CODE', 'LIKE',  $filterdata1 . '%')
                        ->where(function($query) use ($filter) {
                            $query->where('HS_CODE', 'like',  $filter . '%')
                                ->orWhere('DESTINATION_COUNTRY', 'like',  $filter . '%')
                                ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                        })
                        ->where(function($query) use ($filterdata) {
                            $query->where('HS_CODE', 'like',  $filterdata . '%')
                                ->orWhere('DESTINATION_COUNTRY', 'like',  $filterdata . '%')
                                ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                        })
                        ->whereRaw('LENGTH(HS_CODE) <= 12')
                        ->whereNotNull('HS_CODE')
                        // ->whereNotNull('US_EXPORTER_NAME')

                        ->get();
                    // dd('Export last hs_code');
                }else if($filterby2=="country"){
                    //  dd("In Country",$type, $role,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);
                    $results = $table
                    ->select('*')
                    ->where('DESTINATION_COUNTRY', 'like',  $filterdata1 . '%')
                    ->where(function($query) use ($filter) {
                        $query->where('HS_CODE', 'like',  $filter . '%')
                            ->orWhere('DESTINATION_COUNTRY', 'like',  $filter . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    })
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like',  $filterdata . '%')
                            ->orWhere('DESTINATION_COUNTRY', 'like',  $filterdata . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    // ->whereNotNull('US_EXPORTER_NAME')

                    ->get();
                }else if($filterby2=="unloading_port"){
                    // dd("In Port",$type, $role,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);
                    #Unloading_Port
                    $results = $table
                    ->select('*')
                    ->where('UNLOADING_PORT', 'LIKE',  $filterdata1 . '%')
                    ->where(function($query) use ($filter) {
                        $query->where('HS_CODE', 'like',  $filter . '%')
                            ->orWhere('DESTINATION_COUNTRY', 'like',  $filter . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    })
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', $filterdata . '%')
                            ->orWhere('DESTINATION_COUNTRY', 'like',  $filterdata . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    // ->whereNotNull('US_EXPORTER_NAME')

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

                    $results = $table
                    ->select('*')
                    ->where('PRODUCT_DESCRIPTION', 'LIKE','%'.$searchDetails1 .'%')
                    ->where('HS_CODE', 'LIKE', $filterdata1 . '%')
                    ->where(function($query) use ($filter) {
                        $query->where('HS_CODE', 'like',  $filter . '%')
                            ->orWhere('DESTINATION_COUNTRY', 'like',  $filter . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    })
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like',  $filterdata . '%')
                            ->orWhere('DESTINATION_COUNTRY', 'like',  $filterdata . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    ->whereNotNull('US_EXPORTER_NAME')

                    ->get();

                } elseif($filterby2 == 'country') {
                    # code...
                    //dd('PRODUCT_sDESCRIPTION', $searchDetails1,'UNLOADING_PORT', 'DESTINATION_COUNTRY',$filterdata1,$filter,$filterdata1);
                    $results = $table
                    ->select('*')
                    ->where('DESTINATION_COUNTRY', 'like',  $filterdata1 . '%')
                    ->where('PRODUCT_DESCRIPTION', 'LIKE','%'.$searchDetails1 .'%')
                    ->where(function($query) use ($filter) {
                        $query->where('HS_CODE', 'like', $filter . '%')
                            ->orWhere('DESTINATION_COUNTRY', 'like',  $filter . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    })
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like',  $filterdata . '%')
                            ->orWhere('DESTINATION_COUNTRY', 'like',  $filterdata . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    // ->whereNotNull('US_IMPORTER_NAME')

                    ->get();
                    // dd('Export last country non numeric',$results);
                } elseif ($filterby2 == 'port') {
                    # code...

                    $results = $table
                    ->select('*')
                    ->where('UNLOADING_PORT', 'LIKE', '%' . $filterdata1 . '%')
                    ->where('PRODUCT_DESCRIPTION', 'LIKE','%'.$searchDetails1 .'%')
                    ->where(function($query) use ($filter) {
                        $query->where('HS_CODE', 'like',  $filter . '%')
                            ->orWhere('DESTINATION_COUNTRY', 'like',  $filter . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    })
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like',  $filterdata . '%')
                            ->orWhere('DESTINATION_COUNTRY', 'like',  $filterdata . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    // ->whereNotNull('US_EXPORTER_NAME')

                    ->get();
                    // dd('Export last port non numeric',$results);
                }
            }

        }
        // dd($search);
        // Return the view with results
        return view('frontend.livedata.searchfilter-one', [
            'section_type' => $section_type,
            'search_country' => $search_country,
            'result' => $results,
            'mobile_result' => $results,
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
            'search' => count($arg) == 11 ? $search : 'default_search_value'
        ]);
    }
}
