@php
function generateCountryUrl($all_numeric, $args,$section_type,$search_country, $formatted_country, $type, $role, $filterby, $filterby1, $filterby2, $filterdata, $filterdata1, $search, $searchDetails1, $unloading_port = null, $Dresult = null) {
        if ($all_numeric) {
            $unloading_port = str_ireplace(" ", "-", $unloading_port);

            if (count($args) == 6) { //old args 5
                if ($filterby == 'hs_code') {
                    return route('searchfilterone', ['section_type' => $section_type, 'country' => $search_country, 'type' => $type, 'role' => $role, 'filterby1' => 'country', 'filterby' => $filterby, 'filterdata' => $filterdata, 'filterdata1' => $formatted_country]);
                } elseif ($filterby == 'country') {
                    return route('search-filter-one', ['section_type' => $section_type, 'country' => $search_country, 'type' => $type, 'role' => $role, 'search' => $search, 'base_search' => $search, 'filterby1' => 'country', 'filterby' => $filterby, 'filterdata' => $filterdata, 'filterdata1' => $formatted_country]);
                } elseif ($filterby == 'port') {
                    return route('search-filter-one', ['section_type' => $section_type, 'country' => $search_country, 'type' => $type, 'role' => $role, 'search' => $search, 'base_search' => $search, 'filterby1' => 'country', 'filterby' => $filterby, 'filterdata' => $filterdata, 'filterdata1' => $formatted_country]);
                }
            } elseif (count($args) == 8) { //old args 7
                if ($filterby1 == 'hs_code') {
                    return route('searchfiltertwo', ['section_type' => $section_type, 'country' => $search_country, 'type' => $type, 'role' => $role, 'filterby2' => 'country', 'filterby' => $filterby, 'filter' => $filterdata, 'filterby1' => $filterby1, 'filterdata' => $filterdata1, 'filterdata1' => $formatted_country]);
                } elseif ($filterby1 == 'port') {
                    return route('searchfiltertwo', ['section_type' => $section_type, 'country' => $search_country, 'type' => $type, 'role' => $role, 'filterby2' => 'country', 'filterby' => $filterby, 'filter' => $filterdata, 'filterby1' => $filterby1, 'filterdata' => $filterdata1, 'filterdata1' => $formatted_country]);
                } elseif ($filterby1 == 'country') {
                    return route('searchfilterone', ['section_type' => $section_type, 'country' => $search_country, 'type' => $type, 'role' => $role, 'filterby1' => 'country', 'filterby' => $filterby, 'filterdata' => $filterdata, 'filterdata1' => $formatted_country]);
                }
            } elseif (count($args) == 10) { //old args 9
                if ($filterby1 == 'country') {
                    return route('searchfiltertwo', ['section_type' => $section_type, 'country' => $search_country, 'type' => $type, 'role' => $role, 'filterby2' => $filterby1, 'filterby' => $search, 'filter' => $searchDetails1, 'filterby1' => $filterby, 'filterdata' => $filterdata, 'filterdata1' => $formatted_country]);
                } elseif ($filterby1 == 'port') {
                    $base_search = $search;
                    return route('search-filter-one', ['section_type' => $section_type, 'country' => $search_country, 'type' => $type, 'role' => $role, 'search' => $search, 'base_search' => $searchDetails1, 'filterby1' => 'port', 'filterby' => $filterby, 'filterdata' => $filterdata, 'filterdata1' => $unloading_port ?? 'null']);
                }
            }
        }else{
            if (count($args) == 8) {  //old args 7
                if ($filterby1 == 'hs_code') {
                    return route('searchfiltertwo', ['section_type' => $section_type, 'country' => $search_country, 'type' => $type, 'role' => $role, 'filterby2' => 'country', 'filterby' => $filterby, 'filter' => $filterdata, 'filterby1' => $filterby1, 'filterdata' => $filterdata1, 'filterdata1' => $formatted_country]);
                } elseif ($filterby1 == 'port') {
                    return route('search-filter-one', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$filterby,'base_search'=>$searchDetails1, 'filterby1' => 'country','filterby'=>$filterby1,'filterdata'=>$filterdata1,'filterdata1' => $formatted_country??'null']);
                } elseif ($filterby1 == 'country') {
                    return route('searchfilterone', ['section_type' => $section_type, 'country' => $search_country, 'type' => $type, 'role' => $role, 'filterby1' => 'country', 'filterby' => $filterby, 'filterdata' => $filterdata, 'filterdata1' => $formatted_country??"null"]);
                }
            } elseif (count($args) == 10) { //old args 9
                if ($filterby1 == 'country') {
                    return route('searchfiltertwo', ['section_type' => $section_type, 'country' => $search_country, 'type' => $type, 'role' => $role, 'filterby2' => $filterby1, 'filterby' => $search, 'filter' => $searchDetails1, 'filterby1' => $filterby, 'filterdata' => $filterdata, 'filterdata1' => $formatted_country]);
                } elseif ($filterby1 == 'port') {
                    $base_search = $search;
                    if($filterby=='hs_code'){
                        return route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $formatted_country??'Default']);
                    }else{
                        return route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $filterdata1]);
                    }
                }
            } elseif (count($args) == 12){ //old args 11
                if($filterby2 == 'hs_code'){

                    //Country Url
                     return route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);

                }else if($filterby2 == 'country'){
                     //HS_code Url
                        $filterdata = str_ireplace(" ", "-", $filterdata);
                        $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                    //Hs_code
                    //dd($type, $role,$search,$searchDetails1,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);

                    //Country url
                     return route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);

                }else if($filterby2 == 'port'){
                        $filterdata = str_ireplace(" ", "-", $filterdata);
                        $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                    //Hs_code
                    //dd($type, $role,$search,$searchDetails1,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);

                    //Country url
                    return route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'port','filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);

                }
            }
        }
        return null;  // Fallback, if none of the conditions match
    }
@endphp
