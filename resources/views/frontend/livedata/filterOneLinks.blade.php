 @php
    function generateUrl($digit, $args,$arg, $section_type, $search_country,$country, $type, $role, $filterby,$filterby2, $filterdata,$searchDetails1, $unloading_port, $search, $filterby1, $filterdata1,$all_numeric) {
        $unloading_port = str_ireplace(" ", "-", $unloading_port);
            if ($all_numeric) {
                if (count($args) == 6) { //old args 5
                    return route('hs-code', [
                        'section_type' => $section_type,
                        'country' => $search_country,
                        'type' => $type,
                        'role' => $role,
                        'filterby' => 'hs_code',
                        'filterdata' => $digit,
                    ]);
                } elseif (count($args) == 8) { //old args 7
                    return route('searchfilterone', [
                        'section_type' => $section_type,
                        'country' => $search_country,
                        'type' => $type,
                        'role' => $role,
                        'filterby1' => 'port',
                        'filterby' => $filterby,
                        'filterdata' => $digit,
                        'filterdata1' => $unloading_port
                    ]);
                } elseif (count($args) == 10) { //old args 9
                    return route('search-filter-one', [
                        'section_type' => $section_type,
                        'country' => $search_country,
                        'type' => $type,
                        'role' => $role,
                        'search' => $search,
                        'base_search' => $digit,
                        'filterby1' => $filterby1,
                        'filterby' => $filterby,
                        'filterdata' => $filterdata,
                        'filterdata1' => $filterdata1 ?? 'null'
                    ]);
                }

            }else{
                // Handle the else case here if needed
                if (count($args) == 8) { //old args 7
                    if($filterby1 == "hs_code"){
                        return route('searchfilterone', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'hs_code','filterby'=>$filterby,'filterdata'=>$filterdata,'filterdata1' => $digit]);
                    }else{
                        return route('searchfiltertwo', [
                            'section_type' => $section_type,
                            'country' => $search_country,
                            'type' => $type,
                            'role' => $role,
                            'filterby2' => $filterby1,
                            'filterby' => $filterby,
                            'filter' => $filterdata,
                            'filterby1' => 'hs_code',
                            'filterdata' => $digit ?? 'null',
                            'filterdata1' => $filterdata1 ?? 'null'
                        ]);
                    }
                } elseif (count($args) == 10) {  //old args 9
                        if($filterby=='hs_code'){
                            //Hs_code Url
                           return route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' =>  $digit ?? 'null', 'filterdata1' => $filterdata1??"null"]);

                        }else{
                            return  route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby1,'filterby'=>'hs_code','filter'=>$digit ?? 'null','filterby1'=>$filterby,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                        }

                } elseif(count($arg) == 12){ //old args 11
                    if($filterby2 == 'hs_code'){
                        return route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                    }elseif($filterby2 == 'country'){
                        return  route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$digit ?? 'null','filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                    }elseif($filterby2 == 'port'){
                        return route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'port','filterby'=>$filterby,'filter'=>$digit ?? 'null','filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                    }
                }

                return '#'; // Default fallback URL
            }
    }
@endphp
