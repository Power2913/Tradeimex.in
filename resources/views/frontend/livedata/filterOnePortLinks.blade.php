@php
function generatePortUrl($all_numeric, $args, $section_type, $filterby, $filterby1, $filterby2, $search_country, $type, $role, $search, $base_search, $searfilterdata, $unloading_port, $country, $filterdata, $filterdata1, $searchDetails1) {
    // Replace spaces with dashes in unloading_port
    $unloading_port =  Str::slug(str_replace(' ', '-', preg_replace('/\s+/', ' ', $unloading_port??"null")), '-');
    $port_url = null;

    if ($all_numeric) {
        if (count($args) == 6) { //old args 5
            if ($filterby == 'hs_code') {
                $port_url = route('searchfilterone', [
                    'section_type' => $section_type,
                    'country' => $search_country,
                    'type' => $type,
                    'role' => $role,
                    'filterby1' => 'port',
                    'filterby' => $filterby,
                    'filterdata' => $searfilterdata,
                    'filterdata1' => $unloading_port ?? 'null'
                ]);
            } else if ($filterby == 'country' || $filterby == 'port') {
                $port_url = route('search-filter-one', [
                    'section_type' => $section_type,
                    'country' => $search_country,
                    'type' => $type,
                    'role' => $role,
                    'search' => $search,
                    'base_search' => $base_search,
                    'filterby1' => 'country',
                    'filterby' => $filterby,
                    'filterdata' => $searfilterdata,
                    'filterdata1' => $country
                ]);
            }
        } else if (count($args) == 8) { //old args 7
            if ($filterby1 == 'hs_code' || $filterby1 == 'port') {
                $port_url = route('searchfilterone', [
                    'section_type' => $section_type,
                    'country' => $search_country,
                    'type' => $type,
                    'role' => $role,
                    'filterby1' => 'port',
                    'filterby' => $filterby,
                    'filterdata' => $searfilterdata,
                    'filterdata1' => $unloading_port
                ]);
            } else if ($filterby1 == 'country') {
                $port_url = route('searchfiltertwo', [
                    'section_type' => $section_type,
                    'country' => $search_country,
                    'type' => $type,
                    'role' => $role,
                    'filterby2' => 'port',
                    'filterby' => $filterby,
                    'filter' => $searchDetails1,
                    'filterby1' => $filterby1,
                    'filterdata' => $country,
                    'filterdata1' => $unloading_port
                ]);
            }
        } else if (count($args) == 10) { //old args 9
            if ($filterby1 == 'country' || $filterby1 == 'port') {
                $port_url = route('searchfiltertwo', [
                    'section_type' => $section_type,
                    'country' => $search_country,
                    'type' => $type,
                    'role' => $role,
                    'filterby2' => 'port',
                    'filterby' => $search,
                    'filter' => $searchDetails1,
                    'filterby1' => $filterby,
                    'filterdata' => $filterdata,
                    'filterdata1' => $country
                ]);
            } else if ($filterby1 == 'hs_code') {
                $base_search = $search;
                $port_url = route('filter-two', [
                    'section_type' => $section_type,
                    'country' => $search_country,
                    'type' => $type,
                    'role' => $role,
                    'search' => $base_search,
                    'searchDetails1' => $searchDetails1,
                    'filterby2' => 'port',
                    'filterby' => $filterby,
                    'filter' => $filterdata,
                    'filterby1' => $filterby1,
                    'filterdata' => $filterdata1,
                    'filterdata1' => $unloading_port ?? 'Default'
                ]);
            }
        } else if (count($args) == 12) { //old args 11
            if ($filterby2 == 'hs_code' || $filterby2 == 'country' || $filterby2 == 'port') {
                $port_url = route('searchfiltertwo', [
                    'section_type' => $section_type,
                    'country' => $search_country,
                    'type' => $type,
                    'role' => $role,
                    'filterby2' => 'port',
                    'filterby' => $filterby,
                    'filter' => $searchDetails1,
                    'filterby1' => $filterby1,
                    'filterdata' => $filterdata,
                    'filterdata1' => $unloading_port ?? 'default'
                ]);
            }
        }
    } else {
        // Handle the case where all_numeric is false
        if (count($args) == 8) { //old args 7
            if ($filterby1 == 'country' || $filterby1 == 'hs_code') {
                $port_url = route('searchfiltertwo', [
                    'section_type' => $section_type,
                    'country' => $search_country,
                    'type' => $type,
                    'role' => $role,
                    'filterby2' => 'port',
                    'filterby' => $filterby,
                    'filter' => $searchDetails1,
                    'filterby1' => $filterby1,
                    'filterdata' => $filterdata1,
                    'filterdata1' => $unloading_port ?? 'null'
                ]);
            }else{
               $port_url = route('searchfilterone', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'port','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $unloading_port??"null"]);
            }
        } else if (count($args) == 10) { //old args 9
            if ($filterby1 == 'country' || $filterby1 == 'port') {
                $port_url = route('search-filter-two', [
                    'section_type' => $section_type,
                    'country' => $search_country,
                    'type' => $type,
                    'role' => $role,
                    'search' => $search,
                    'searchDetails1' => $searchDetails1,
                    'filterby2' => 'port',
                    'filterby' => $filterby,
                    'filter' => $filterdata,
                    'filterby1' => $filterby1,
                    'filterdata' => $filterdata1,
                    'filterdata1' => $unloading_port ?? 'Default'
                ]);
            } else if ($filterby1 == 'hs_code') {
                $base_search = $search;
                $port_url = route('filter-two', [
                    'section_type' => $section_type,
                    'country' => $search_country,
                    'type' => $type,
                    'role' => $role,
                    'search' => $base_search,
                    'searchDetails1' => $searchDetails1,
                    'filterby2' => 'port',
                    'filterby' => $filterby,
                    'filter' => $filterdata,
                    'filterby1' => $filterby1,
                    'filterdata' => $filterdata1,
                    'filterdata1' => $unloading_port ?? 'Default'
                ]);
            }
        } else if (count($args) == 12) { //old args 11
            $port_url = route('searchfiltertwo', [
                'section_type' => $section_type,
                'country' => $search_country,
                'type' => $type,
                'role' => $role,
                'filterby2' => 'port',
                'filterby' => $filterby,
                'filter' => $searchDetails1,
                'filterby1' => $filterby1,
                'filterdata' => $filterdata,
                'filterdata1' => $filterdata1
            ]);
        }
    }

    return $port_url;
}

@endphp
