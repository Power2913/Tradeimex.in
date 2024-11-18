<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class HsCodeController extends Controller
{
    // Hs code
    function hscode() {
        // Fetch all data from the 'taric' table
        $hscodeData = DB::table('taric')->get();
        // Initialize arrays to hold chapters, sub-chapters, and lists
        $chapters = [];
       
        $lists = [];
    
        // Loop through the dataset and parse HS_code values
        foreach ($hscodeData as $row) {
            $hsCode = $row->hs_code;
            $description = $row->Description;
    
            // Determine the level of the entry (chapter, sub-chapter, or list)
            $level = strlen($hsCode);
    
            // Add the entry to the appropriate array based on the level
            switch ($level) {
                case 2:
                    // Chapter
                    $chapters[$hsCode] = ['description' => $description, 'subchapters' => []];
                    break;
                default:
                    // Handle invalid HS_code values
                    break;
            }
        }
    
        // Pass the organized data to the view
      return view('frontend.hs-code', compact('chapters'));
    }
 
    // Subchapter Page

    function subchapterPage($description,$chapterCode)
    {
    //    dd($chapterCode);
        $subchapters = DB::table('taric')
            ->select('hs_code', 'Description')
            ->where('hs_code', 'like', $chapterCode . '__')
            ->whereRaw('LENGTH(hs_code) = 4') 
            ->get();
            // dd($subchapters);
         return view('frontend.hscode-subchapter', ['subchapters' =>  $subchapters,'chapterCode' => $chapterCode , 'description' => $description]);
    }

    // Subchapter list page
    function subchapterListPage($subchapterdescription,$subchaptercode)
    {
  
        $subchapterslist = DB::table('taric')
        ->select('hs_code', 'Description')
        ->where('hs_code', 'like', $subchaptercode . '%')
        ->whereRaw('LENGTH(hs_code) >= 4 AND LENGTH(hs_code) <= 12')
        ->distinct()
        ->get();
        //  dd($subchapterslist);
         return view('frontend.hscode-subchapterlist', ['subchapterslist' => $subchapterslist, 'subchaptercode' =>$subchaptercode, 'subchapterdescription' => $subchapterdescription]);
    }
    // Subchapter list perticular page
    function ListPage($listdescription,$listhscode)
    {
  
        $subchapterslist = DB::table('taric')
        ->select('hs_code', 'Description')
        ->where('hs_code', 'like', $listhscode . '%')
        ->whereRaw('LENGTH(hs_code) >= 4 AND LENGTH(hs_code) <= 12')
        ->distinct()
        ->get();
        //  dd($subchapterslist);
         return view('frontend.hscode-subchapterlist', ['subchapterslist' => $subchapterslist, 'subchaptercode' =>$listhscode, 'subchapterdescription' => $listdescription]);
    }
    // Search function

    function searchHSCode(Request $request){
        $results = [];
        $validate = $request->validate([
            'hs-code' => 'nullable',
            'description' => 'nullable'
        ]);
        $hscode = $request['hs-code'];
        $desc = $request['description'];

  
        if ($request['hs-code'] && $request['description']) {

            
            $results = DB::table('taric')
            ->select('*')
            ->where('hs_code', 'like', $hscode . '%')
            ->where('Description', 'LIKE', '%' . $desc . '%')
            ->get();

        } elseif ($request['hs-code']) {
            $hscode = strtoupper($request['hs-code']);
            $results = DB::table('taric')
            ->select('*')
            ->where('hs_code', 'like', $hscode . '%')
            ->get();

        } elseif ($request['description']) {
                $desc = $request['description'];
                $results = DB::table('taric')
                    ->select('*')
                    ->where('Description', $desc) // Search for exact match
                    ->orWhere('Description', 'LIKE', '% ' . $desc . ' %') // Search for related rows
                    ->orWhere('Description', 'LIKE', $desc . ' %')
                    ->orWhere('Description', 'LIKE', '% ' . $desc)
                    ->get();
            
                if ($results->isEmpty()) {
                    // If no results found, return a message or handle as needed
                    return redirect()->back()->with('searcherror', 'Data not found related to search');
                }

        } else{
            $results = DB::table('taric')->select('*')->where('hs_code','description')->get();
        }
        return view ('frontend.hs-code', ['results'=>$results , 'hscode' => $hscode, 'desc' => $desc]);
    }
    // Data Table after Search 
    function searchlist($description, $hsCode)
    {
    
        try {
            $results = DB::table('taric')
            ->select('hs_code', 'Description')
            ->where('hs_code', $hsCode)
            ->get();
      
            if ($results->isEmpty()) {
              return view('frontend.hs-code')->with('error-hscode', 'Your message has not been sent, please check the form and try again!');
            }
    
            return view('frontend.hs-code', ['results' => $results]);
        } catch (Exception $e) {
            // Handle the exception (e.g., log, display error message)
            dd($e->getMessage());
        }
    }
}
