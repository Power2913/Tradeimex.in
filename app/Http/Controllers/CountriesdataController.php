<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
class CountriesdataController extends Controller
{
    //
    // function countrydata() {
    //     try {
    //         $countrydata = DB::table('import')
    //         -> select('country','country_code','Datatype')
    //         -> union(DB::table('export')->select('country','country_code','Datatype'))
    //         -> get();
    //         try {
    //             // Fetch the title, summary, and image_big columns from the posts table
    //             $recentPosts = DB::table('posts')->select('title', 'summary', 'image_big')
    //                 ->orderByDesc('created_at')->take(4)->get();

    //             // Return the data to your view or do whatever you want with it
    //             // return view('frontend.index', compact('recentPosts'));
    //         } catch (QueryException $e) {
    //             // Handle database query exception
    //             // Log the error, redirect, or display a custom error message
    //             return back()->withError('Error fetching recent posts: ' . $e->getMessage())->withInput();
    //         }
    //         return view('frontend.index', ['countrydata' => $countrydata,'recentPosts'=>$recentPosts]);
    //     } catch (\Exception $e) {
    //         // Log the error
    //         Log::error('Error in countrydata method: ' . $e->getMessage());
    //     }

    // }
    function countrydata() {
        try {
            // Fetch country data from 'import' and 'export' tables
            $countrydata = DB::table('import')
                ->select('country', 'country_code', 'Datatype')
                ->union(DB::table('export')->select('country', 'country_code', 'Datatype'))
                ->get();

            // Fetch recent posts from 'posts' table
            $recentPosts = DB::table('posts')
                ->select('title','title_slug', 'summary', 'image_big')
                ->orderByDesc('created_at')
                ->take(6)
                ->get();
            // dd(' recentPosts', $recentPosts);
            // Return the data to your view
            return view('frontend.index', compact('countrydata', 'recentPosts'));
        } catch (QueryException $e) {
            // Handle database query exception
            Log::error('Error fetching data: ' . $e->getMessage());
            return back()->withError('Error fetching data: ' . $e->getMessage())->withInput();
        } catch (\Exception $e) {
            // Log any other exceptions
            Log::error('Error in countrydata method: ' . $e->getMessage());
            return back()->withError('Error: ' . $e->getMessage())->withInput();
        }
    }
    function customsdata() {
        try {
            $countrydata = DB::table('import')
            -> select('country','country_code','Datatype')
            -> union(DB::table('export')->select('country','country_code','Datatype'))
            -> get();

            return view('frontend.customs-data', ['countrydata' => $countrydata]);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error in countrydata method: ' . $e->getMessage());
        }
    }
    function globaltradedata() {
        try {
            $countrydata = DB::table('import')
            -> select('country','country_code','Datatype')
            -> union(DB::table('export')->select('country','country_code','Datatype'))
            -> get();

            return view('frontend.global-trade-data', ['countrydata' => $countrydata]);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error in countrydata method: ' . $e->getMessage());
        }

    }
    function statisticaldata() {
        try {
            $countrydata = DB::table('import')
            -> select('country','country_code','Datatype')
            -> union(DB::table('export')->select('country','country_code','Datatype'))
            -> get();

            return view('frontend.statistical-data', ['countrydata' => $countrydata]);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error in countrydata method: ' . $e->getMessage());
        }
    }
    // Bl-Data
    function blreport() {
        try {
            $countrydata = DB::table('import')
            -> select('country','country_code','Datatype')
            -> union(DB::table('export')->select('country','country_code','Datatype'))
            -> get();

            return view('frontend.bl-data', ['countrydata' => $countrydata]);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error in countrydata method: ' . $e->getMessage());
        }

    }
     // Private function to get the table
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
                return DB::connection($secondDbConnection)->table('austria');
            } elseif ($role == 'export') {
                return DB::connection($secondDbConnection)->table('austria');
            }
        }elseif ($search_country == 'ecuador') {
            # code...
            if ($role == 'import') {
                # code...
                return DB::connection($secondDbConnection)->table('Ecuador_Import');
            } elseif($role == 'export') {
                # code...
                return DB::connection($secondDbConnection)->table('Ecuador_Export');
            }

        }elseif ($search_country == 'argentina') {
            # code...
            if ($role == 'import') {
                # code...
                return DB::connection($thirdDbConnection)->table('Argentina_Import');
            } elseif($role == 'export') {
                # code...
                return DB::connection($secondDbConnection)->table('argentina_export');
            }

        }elseif ($search_country == 'panama') {
            # code...
            if ($role == 'import') {
                # code...
                return DB::connection($secondDbConnection)->table('Panama_import');
            } elseif($role == 'export') {
                # code...
                return DB::connection($secondDbConnection)->table('Panama_Export');
            }

        }elseif ($search_country == 'chile') {
            # code...
            if ($role == 'import') {
                # code...
                return DB::connection($secondDbConnection)->table('Chile_import');
            } elseif($role == 'export') {
                # code...
                return DB::connection($secondDbConnection)->table('Chile_Export');
            }

        }elseif ($search_country == 'paraguay') {
            # code...
            if ($role == 'import') {
                # code...
                return DB::connection($secondDbConnection)->table('Paraguay_Import');
            } elseif($role == 'export') {
                # code...
                return DB::connection($secondDbConnection)->table('Paraguay_Export');
            }

        }elseif ($search_country == 'uruguay') {
            # code...
            if ($role == 'import') {
                # code...
                return DB::connection($secondDbConnection)->table('Uruguay_Import');
            } elseif($role == 'export') {
                # code...
                return DB::connection($secondDbConnection)->table('Uruguay_Export');
            }

        }elseif ($search_country == 'venezuela') {
            # code...
            if ($role == 'import') {
                # code...
                return DB::connection($secondDbConnection)->table('Venezuela_Import');
            } elseif($role == 'export') {
                # code...
                return DB::connection($secondDbConnection)->table('Venezuela_Export');
            }

        }elseif ($search_country == 'brazil') {
            # code...
            if ($role == 'import') {
                # code...
                return DB::connection($thirdDbConnection)->table('Brazil_Import');
            } elseif($role == 'export') {
                # code...
                return DB::connection($thirdDbConnection)->table('Brazil_Export');
            }

        }elseif ($search_country == 'peru') {
            # code...
            if ($role == 'import') {
                # code...
                return DB::connection($thirdDbConnection)->table('Peru_Import');
            } elseif($role == 'export') {
                # code...
                return DB::connection($secondDbConnection)->table('PERU_EXPORT');
            }

        }elseif ($search_country == 'colombia') {
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

    function countryalldata($country, $Datatype) {
        try {
            // Fetch country data
            $countrydata = DB::table('import')
                ->select('*')
                ->where('country', $country)
                ->where('Datatype', $Datatype)
                ->union(
                    DB::table('export')
                        ->select('*')
                        ->where('country', $country)
                        ->where('Datatype', $Datatype)
                )
                ->get()
                ->map(function ($item) {
                    // Format DATE or Date fields
                    if (isset($item->DATE)) {
                        $item->DATE = Carbon::parse($item->DATE)->format('Y-m-d');
                    } elseif (isset($item->Date)) {
                        $item->Date = Carbon::parse($item->Date)->format('Y-m-d');
                    }
                    return $item;
                });

            // Fetch country names
            $countryname = DB::table('import')
                ->select('country', 'country_code')
                ->union(DB::table('export')->select('country', 'country_code'))
                ->get();


            // starting of sample result desired
            $sampleResult = [];
            $caseStatement = null; // Default to null

            if ($table = $this->table($country, $Datatype)) {
                // Assign HS code based on country and datatype
                if ($country == 'peru') {
                    $caseStatement = ($Datatype == 'import') ? '2701120000' : ($Datatype == 'export' ? '26' : null);
                } elseif ($country == 'argentina') {
                    $caseStatement = ($Datatype == 'import') ? '84' : ($Datatype == 'export' ? '1008' : null);
                } elseif ($country == 'brazil') {
                    $caseStatement = ($Datatype == 'import') ? '27' : ($Datatype == 'export' ? '1209' : null);
                } elseif ($country == 'chile') {
                    $caseStatement = ($Datatype == 'import') ? '27' : ($Datatype == 'export' ? '74' : null);
                } elseif ($country == 'colombia') {
                    $caseStatement = ($Datatype == 'import') ? '27' : ($Datatype == 'export' ? '71' : null);
                } elseif ($country == 'ecuador') {
                    $caseStatement = ($Datatype == 'import') ? '84' : ($Datatype == 'export' ? '03' : null);
                } elseif ($country == 'paraguay') {
                    $caseStatement = ($Datatype == 'import') ? '85' : ($Datatype == 'export' ? '12' : null);
                } elseif ($country == 'uruguay') {
                    $caseStatement = ($Datatype == 'import') ? '87' : ($Datatype == 'export' ? '0204' : null);
                } elseif ($country == 'venezuela') {
                    $caseStatement = ($Datatype == 'import') ? '85' : ($Datatype == 'export' ? '72' : null);
                }

                // Proceed only if a valid HS code is set in $caseStatement
                if ($caseStatement) {
                    // dd($caseStatement);
                    $sampleResult = $table->select('*')
                        ->whereNotNull('HS_CODE') // Ensure HS_CODE is not null
                        ->whereRaw("HS_CODE = ?", [$caseStatement]) // Bind parameter for safety
                        ->orderByRaw('LENGTH(HS_CODE), HS_CODE')
                        ->limit(1)
                        ->get()
                        ->map(function ($item) {
                            // Format DATE or Date fields
                            if (isset($item->DATE)) {
                                $item->DATE = Carbon::parse($item->DATE)->format('Y-m-d');
                            } elseif (isset($item->Date)) {
                                $item->Date = Carbon::parse($item->Date)->format('Y-m-d');
                            }
                            return $item;
                        });
                } else {
                    // Handle case when there’s no HS code match
                    dd('No matching HS code found for the given country and datatype');
                }

                // dd($table); // Output the result for debugging
            }

            // Get Data of Continents
            $continentData = DB::select('select * from continent');

            dd($sampleResult);

            // Return view with data
            return view('frontend.countries', [
                'countrydata' => $countrydata,
                'continentData' => $continentData,
                'countryname' => $countryname,
                'sampleResult' => $sampleResult ?? "null"
            ]);

        } catch (\Exception $e) {
            // Log the error
            // Log::error('Error in countryalldata method: ' . $e->getMessage());
            // return redirect()->back()->with('error', 'An error occurred while processing your request.');

            echo 'In Catch section';
        }
    }


    // old monk
    // function countryalldata($country, $Datatype) {
    //     try {
    //         $table = $this->table($country, $Datatype);
    //          //dd($type,$role,$search_country,$table);

    //         $countrydata = DB::table('import')
    //         -> select('*')
    //         -> where('country'     , $country)
    //         -> where('Datatype'    , $Datatype)
    //         -> union(
    //             DB::table('export')
    //         -> select('*')
    //         -> where('country'     , $country)
    //         -> where('Datatype'    , $Datatype)
    //         )
    //         ->get()
    //         ->map(function ($item) {
    //             if (isset($item->DATE)) {
    //                 $item->DATE = Carbon::parse($item->DATE)->format('Y-m-d');
    //             } elseif (isset($item->Date)) {
    //                 $item->Date = Carbon::parse($item->Date)->format('Y-m-d');
    //             }
    //             return $item;
    //         });

    //         $countryname = DB::table('import')
    //         -> select('country','country_code')
    //         -> union(DB::table('export')->select('country','country_code'))
    //         -> get();
    //         //    dd($country);

    //         // Get Sample result of country

    //         // $sampleResult = [];
    //         if ($table) {
    //             $sampleResult = $table->select('*')
    //                 ->whereNotNull('HS_CODE')
    //                 ->orderByRaw('LENGTH(HS_CODE), HS_CODE')
    //                 // ->LEFT('DATE, 5')
    //                 ->limit(1)
    //                 ->get()
    //                 ->map(function ($item) {
    //                     if (isset($item->DATE)) {
    //                         $item->DATE = Carbon::parse($item->DATE)->format('Y-m-d');
    //                     } elseif (isset($item->Date)) {
    //                         $item->Date = Carbon::parse($item->Date)->format('Y-m-d');
    //                     }
    //                     return $item;
    //                 });
    //         }

    //         // dd($table);
    //         // Get Data of Continents
    //         $continentData = DB::select('select * from continent');
    //         return view('frontend.countries', [
    //             'countrydata' => $countrydata,
    //             'continentData' => $continentData ,
    //             'countryname' => $countryname,
    //             'sampleResult'=>$sampleResult??"null"
    //         ]);
    //     } catch (\Exception $e) {
    //         // Log the error
    //         Log::error('Error in countryalldata method: ' . $e->getMessage());
    //     }
    // }
}
