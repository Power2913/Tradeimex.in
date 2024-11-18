@if ($role=='import')
    <section class="container-fluid bg-bluish desktop-view">
        <div class="pdt-2 pdb-2">
            <div class="table-responsive">
                    <table class="table">
                    <thead>
                        <tr>
                            <th class="table-primary p-3">
                                <h4 class="fw-semibold text-start">Date</h4>
                            </th>
                            <th class="table-primary p-3">
                                <h4 class="fw-semibold text-start">HS Code</h4>
                            </th>
                            <th class="table-primary p-3">
                                <h4 class="fw-semibold text-start">Product Description</h4>
                            </th>
                            <th class="table-primary p-3">
                                <h4 class="fw-semibold text-start">Origin Country</h4>
                            </th>
                            <th class="table-primary p-3">
                                <h4 class="fw-semibold text-start">QTY.</h4>
                            </th>
                            <th class="table-primary p-3">
                                <h4 class="fw-semibold text-start">Unit</h4>
                            </th>
                            <th class="table-primary p-3">
                                <h4 class="fw-semibold text-start">Weight</h4>
                            </th>
                            <th class="table-primary p-3">
                                <h4 class="fw-semibold text-start">Value In USD</h4>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $Dresult = $result;
                            $iteration = 0;
                        @endphp

                        @if(isset($Dresult) && $Dresult->count() > 0)
                            @foreach ($Dresult as $Dresult)
                            {{-- @dd($Dresult)  --}}
                                @php
                                    $iteration++;
                                    $res_hs_code = $Dresult->HS_CODE;
                                    // dd($res_hs_code);
                                    $origin_country = $Dresult->ORIGIN_COUNTRY;
                                    $country = $origin_country;
                                    $country= str_ireplace(" ","-",$country);
                                    $unloading_port  = $Dresult->UNLOADING_PORT??'null';
                                    $args = $args??[];
                                    // Hs code Url
                                    $arg = $arg??[];

                                    // dd($filterby1,$filterby,$args,$searchDetails1,$arg,$filterdata1,$filterdata);
                                        //dd($filterby,$filterby1,$args);
                                    $searchDetailsParts = !empty($searchDetails1)?explode(',', $searchDetails1):explode(',', $base_search);
                                    $all_numeric = true;

                                    foreach ($searchDetailsParts as $part) {
                                        if (!is_numeric($part)) {
                                            $all_numeric = false;
                                            break;
                                        }
                                    }
                                    // dd($all_numeric);
                                    if ($all_numeric) {
                                        # code...
                                        $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                        if(count($args)== 6){ //old args 5
                                            // dd($args,$filterby,$filterdata,$hs_code);
                                            if($filterby=='hs_code'){
                                                $hs_code_url = route('hs-code', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby' => 'hs_code', 'filterdata' => $res_hs_code]);
                                                $country_url = route('searchfilterone', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                                $port_url = route('searchfilterone', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'port','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $unloading_port ?? 'null']);
                                            }else if($filterby == 'country'){
                                                $hs_code_url = route('hs-code', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby' => 'hs_code', 'filterdata' => $res_hs_code]);
                                                $country_url = route('search-filter-one', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$base_search,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                                //Port Url
                                                $port_url = route('search-filter-one', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$base_search,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                            } else if($filterby == 'port'){
                                                //Hs Code Url
                                                $hs_code_url = route('hs-code', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby' => 'hs_code', 'filterdata' => $res_hs_code]);
                                                //Coutry Url
                                                $country_url = route('search-filter-one', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$base_search,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                                //Port Url
                                                $port_url = route('search-filter-one', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$base_search,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                            }
                                        }
                                        else if(count($args)==8){ //old args 7
                                                if($filterby1=='hs_code'){
                                                    $hs_code_url =  route('searchfilterone', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'port','filterby'=>$filterby,'filterdata'=>$res_hs_code,'filterdata1' => $unloading_port]);
                                                    $country_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                                    $port_url = route('searchfilterone', ['section_type' => $section_type,'type' => $type, 'role' => $role,'filterby1' => 'port','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $unloading_port]);
                                                }else if($filterby1 == 'port'){
                                                    //dd('In this Group');
                                                    $hs_code_url =  route('searchfilterone', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'port','filterby'=>$filterby,'filterdata'=>$res_hs_code,'filterdata1' => $unloading_port]);
                                                    $country_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                                    $port_url = route('searchfilterone', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'port','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $unloading_port]);
                                                }else if($filterby1=='country'){
                                                // dd($filterby,$filterby1,$args,$filterdata);
                                                    $hs_code_url = route('searchfilterone', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$res_hs_code,'filterdata1' => $country]);
                                                    $country_url = route('searchfilterone', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                                    $port_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $country, 'filterdata1' => $unloading_port]);
                                                }
                                        }
                                        else if(count($args)==10){ //old args 9

                                                if($filterby1 == 'country'){

                                                    // dd('In Country Args',$args,$filterby1,$filterby,$filterdata,$filterdata1,$search,$filterby1);
                                                    //Hs Code URl
                                                    $hs_code_url =  route('search-filter-one', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$res_hs_code??'null', 'filterby1' => $filterby1,'filterby'=>$filterby,'filterdata'=>$filterdata,'filterdata1' => $filterdata1??'null']);

                                                    //Country Url
                                                    $country_url =  route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $country]);

                                                    //Port Url
                                                    $port_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $country]);

                                                }else if($filterby1 == 'hs_code'){
                                                    $base_search = $search;
                                                    $port_url = route('filter-two', [
                                                        'section_type' => $section_type,
                                                        'country'=>$search_country,
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

                                                }else if($filterby1 == 'port'){

                                                    $base_search = $search;
                                                        //dd($search,$filterby,$filterby1,$args);
                                                        $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                                        //Hs code Url
                                                        $hs_code_url =  route('search-filter-one', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$res_hs_code??'null', 'filterby1' => 'port','filterby'=>$filterby,'filterdata'=>$filterdata,'filterdata1' => $unloading_port??'null']);

                                                        //Country Url
                                                        $country_url =  route('search-filter-one', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$searchDetails1, 'filterby1' => 'port','filterby'=>$filterby,'filterdata'=>$filterdata,'filterdata1' => $unloading_port??'null']);

                                                    //Port Url
                                                        $port_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                                }
                                            }
                                            else if(count($arg)==10){ //old args 9
                                                $unloading_port = str_ireplace(" ", "-", $unloading_port);

                                            if($filterby2 == 'hs_code'){
                                                //Hs_code
                                                $hs_code_url = route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                                //Country Url
                                                $country_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                                //Port Url
                                                $port_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                            }else if($filterby2 == 'country'){
                                                //dd($filterby,$filterby1,$arg,$filterby2,$search,$searchDetails1);
                                                //$hs_code_url = route('search-filter-two', ['type' => $type, 'role' => $role,'search'=> $filterby,'searchDetails1'=>$res_hs_code, 'filterby2' => 'country','filterby'=>$filterby1,'filter'=>$filterdata,'filterby1'=>$filterby2,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                                $hs_code_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$res_hs_code,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                                $country_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                                $port_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $filterdata1??'default']);

                                                }else if($filterby2 == 'port'){
                                                    //Hs_code
                                                    $hs_code_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                                    $country_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                                    $port_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                                }
                                            } else if(count($arg)==12){ //old args 11
                                                $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                                //dd($filterby,$filterby1,$arg,$filterby2);
                                            if($filterby2 == 'hs_code'){
                                                //Hs_code
                                                $hs_code_url = route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                                //Country Url
                                                $country_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                                //Port Url
                                                $port_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                            }else if($filterby2 == 'country'){
                                                    $hs_code_url = route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                                    $country_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                                    $port_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);

                                                }else if($filterby2 == 'port'){
                                                    //Hs_code
                                                    $hs_code_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                                    $country_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                                    $port_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);

                                                }
                                            }
                                        else{
                                                $country_url = route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                            }
                                        // $country_url = route('search-filter', ['type' => $type, 'role' => $role,'searchDetails' => $hscode, 'filterby' => 'country', 'filterdata' => $country]);
                                    }else{
                                        // dd('IN Else Block',$filterby2,$filterby,$filterby1,$args,$arg,$filterdata);
                                        if(count($args)==8){ // old args 7
                                                $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                                $filterdata = str_ireplace(" ", "-", $filterdata);
                                                $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                                            if($filterby1 == 'port'){
                                                $country_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $Dresult->ORIGIN_COUNTRY??"null"]);
                                                $hs_code_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role, 'filterby2' => $filterby1,'filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>'hs_code','filterdata' => $res_hs_code??"null", 'filterdata1' => $unloading_port??'null']);
                                                $port_url =   route('searchfilterone', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'port','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $unloading_port??"null"]);

                                            }else if($filterby1=='country'){
                                            //Hs_code Url
                                                $hs_code_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role, 'filterby2' => $filterby1,'filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>'hs_code','filterdata' => $res_hs_code??"null", 'filterdata1' => $filterdata1??'null']);
                                            //Port Url
                                                $port_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $unloading_port]);
                                            //Country Url
                                                $country_url = route('searchfilterone', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);

                                            }else if($filterby1=='hs_code'){
                                            //dd('In this Block');
                                            $hs_code_url = route('searchfilterone', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'hs_code','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $filterdata1]);
                                            $country_url = route('search-filter-one', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$filterby,'base_search'=>$searchDetails1, 'filterby1' => 'country','filterby'=>$filterby1,'filterdata'=>$filterdata1,'filterdata1' => $country??'null']);
                                            $port_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $unloading_port]);
                                            }
                                        }
                                        else if(count($args)==10){ //old args 9
                                                $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                                $filterdata = str_ireplace(" ", "-", $filterdata);
                                                $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                                            if($filterby1 == 'country'){

                                                // dd('In Country Args',$args,'search',$search,'searchDetails1',$searchDetails1,'filterby1',$filterby1,'filterby',$filterby,'filter',$filterdata,'filterdata', $filterdata1);
                                                //Hs Code URl
                                                if($filterby=='hs_code'){
                                                    $hs_code_url =  route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' =>  $res_hs_code??"null", 'filterdata1' => $country]);
                                                    $port_url =route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'port','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $unloading_port??'Default']);
                                                }else{
                                                    $hs_code_url =  route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby1,'filterby'=>'hs_code','filter'=>$res_hs_code,'filterby1'=>$filterby,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                                    $port_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $country]);
                                                }

                                                //Country Url
                                                $country_url =  route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $country]);

                                                //Port Url
                                                //$port_url =route('search-filter-two', ['type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'port','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $unloading_port??'Default']);


                                            }else if($filterby1 == 'hs_code'){
                                                $base_search = $search;
                                                $port_url = route('filter-two', [
                                                    'section_type' => $section_type,
                                                    'country'=>$search_country,
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

                                            }else if($filterby1 == 'port'){
                                                //dd($filterby1,$filterdata1,$filterby,$filterdata,$searchDetails1,$search,$args);
                                                $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                                $filterdata = str_ireplace(" ", "-", $filterdata);
                                                $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                                                //dd('In Country Args',$args,'search',$search,'searchDetails1',$searchDetails1,'filterby1',$filterby1,'filterby',$filterby,'filter',$filterdata,'filterdata', $filterdata1);
                                                //Hs Code URl
                                                if($filterby=='hs_code'){
                                                //Hs_code Url
                                                $hs_code_url =  route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $res_hs_code??"null", 'filterdata1' => $unloading_port??'Default']);
                                                //Port Url
                                                $port_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $filterdata1]);
                                                //Country Url
                                                $country_url =  route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $country??'Default']);
                                                }else{
                                                    $hs_code_url =  route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby1,'filterby'=>'hs_code','filter'=>$res_hs_code,'filterby1'=>$filterby,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                                    $port_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $filterdata1]);
                                                    $country_url =  route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $filterdata1]);
                                                }

                                                //Port Url
                                                //$port_url =route('search-filter-two', ['type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'port','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $unloading_port??'Default']);
                                            }
                                        }
                                        else if(count($arg)==10){ // old args 9
                                            $unloading_port = str_ireplace(" ", "-", $unloading_port);

                                            if($filterby2 == 'country'){
                                            $hs_code_url =  route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $country]);
                                            $country_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                            $port_url =route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'port','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $unloading_port??'Default']);
                                            }else if($filterby2 == 'port'){

                                                $base_search = $search;
                                                    $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                                    //Hs code Url
                                                    $hs_code_url =   route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                                    //dd($type, $role,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);
                                                    //Country Url
                                                    $country_url  = route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$filterby,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby1,'filter'=>$filterdata,'filterby1'=>$filterby2,'filterdata' => $filterdata1,'filterdata1' => $country??'Default']);

                                                //Port Url
                                                    $port_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);

                                            //$country_url = route('searchfiltertwo', ['type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                            }
                                        }else if(count($arg)==12){ //old args 11
                                            $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                                // dd($type, $role,$search,$searchDetails1,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);
                                            if($filterby2 == 'hs_code'){
                                                //Hs_code
                                                $hs_code_url = route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                                //Country Url
                                                $country_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                                //Port Url
                                                $port_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                            }else if($filterby2 == 'country'){
                                            //HS_code Url
                                                    $filterdata = str_ireplace(" ", "-", $filterdata);
                                                    $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                                                //Hs_code
                                                //dd($type, $role,$search,$searchDetails1,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);

                                                $hs_code_url  = route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$res_hs_code,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                                //Country url
                                                $country_url  =route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                                //Port Url
                                                $port_url  =route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);


                                            }else if($filterby2 == 'port'){
                                                $filterdata = str_ireplace(" ", "-", $filterdata);
                                                $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                                                //Hs_code
                                                //dd($type, $role,$search,$searchDetails1,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);

                                                $hs_code_url  = route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'port','filterby'=>$filterby,'filter'=>$res_hs_code,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                                //Country url
                                                $country_url  =route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'port','filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                                //Port Url
                                                $port_url  =route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'port','filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);

                                                }
                                            }
                                        else{
                                                $country_url = route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                            }
                                    }

                                @endphp
                                {{-- @dd($hs_code_url) --}}
                                <tr>
                                    <td class="fw-normal text-gray p-3">{{$Dresult->MONTH}}</td>

                                        <td class="fw-normal text-gray p-3">
                                            <a href="{{ $hs_code_url }}">
                                                {{$Dresult->HS_CODE}}
                                            </a>
                                        </td>

                                    <td class="fw-normal text-gray line-clamp-7">
                                        <p>
                                            {{$Dresult->PRODUCT_DESCRIPTION}}
                                        </p>
                                    </td>
                                    <td class="fw-normal text-gray p-3">
                                        <a href="{{ $country_url }}">
                                            {{$origin_country}}
                                        </a>

                                    </td>
                                    <td class="fw-normal text-gray p-3">
                                        {{$Dresult->QTY}}
                                    </td>
                                    <td class="fw-normal text-gray p-3">
                                        {{$Dresult->UNIT}}
                                    </td>
                                    <td class="fw-normal text-gray p-3">
                                        {{$Dresult->NET_WEIGHT}}
                                    </td>
                                    <td class="fw-normal text-gray p-3">
                                        {{$Dresult->VALUE_IN_USD}}
                                    </td>
                                </tr>
                                @if($iteration == 10)
                                    @break
                                @endif
                            @endforeach
                            @else
                            <tr>
                                Data Not found
                            </tr>
                        @endif
                </tbody>
                </table>
            </div>

            <!--pagination-->
            @include('frontend.livedata.pagination')
        </div>
    </section>

    <!--mobile view-->
    <section class="container-fluid bg-bluish mobile-view">
        <div class="container pdt-5 pdb-5">
            @php
                $Mresult = $result;
                $iteration = 0;
            @endphp

            @if(isset($Mresult) && $Mresult->count() > 0)
                @foreach ($Mresult as $Mresult)
                    @php
                        $iteration++;
                        $res_hs_code = $Mresult->HS_CODE;
                        // dd($res_hs_code);
                        $country = $Mresult->ORIGIN_COUNTRY;
                        $country= str_ireplace(" ","-",$country);
                        $unloading_port  = $Mresult->UNLOADING_PORT??"null";
                        $args = $args??[];
                        // Hs code Url
                        $arg = $arg??[];

                        //dd($filterby1,$filterby,$args,$searchDetails1,$arg,$filterdata1,$filterdata);
                            //dd($filterby,$filterby1,$args);
                        $searchDetailsParts = !empty($searchDetails1)?explode(',', $searchDetails1):explode(',', $base_search);
                        $all_numeric = true;

                        foreach ($searchDetailsParts as $part) {
                            if (!is_numeric($part)) {
                                $all_numeric = false;
                                break;
                            }
                        }
                        // dd($all_numeric);
                        if ($all_numeric) {
                            # code...
                            $unloading_port = str_ireplace(" ", "-", $unloading_port);
                            if(count($args)== 6){ //old args 5
                                // dd($args,$filterby,$filterdata,$hs_code);
                                if($filterby=='hs_code'){
                                    $hs_code_url = route('hs-code', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby' => 'hs_code', 'filterdata' => $res_hs_code]);
                                    $country_url = route('searchfilterone', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                    $port_url = route('searchfilterone', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'port','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $unloading_port ?? 'null']);
                                }else if($filterby == 'country'){
                                    $hs_code_url = route('hs-code', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby' => 'hs_code', 'filterdata' => $res_hs_code]);
                                    $country_url = route('search-filter-one', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$base_search,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                    //Port Url
                                    $port_url = route('search-filter-one', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$base_search,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                } else if($filterby == 'port'){
                                    //Hs Code Url
                                    $hs_code_url = route('hs-code', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby' => 'hs_code', 'filterdata' => $res_hs_code]);
                                    //Coutry Url
                                    $country_url = route('search-filter-one', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$base_search,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                    //Port Url
                                    $port_url = route('search-filter-one', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$base_search,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                }
                            }
                            else if(count($args)==8){ //old args 7
                                    if($filterby1=='hs_code'){
                                        $hs_code_url =  route('searchfilterone', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'port','filterby'=>$filterby,'filterdata'=>$res_hs_code,'filterdata1' => $unloading_port]);
                                        $country_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                        $port_url = route('searchfilterone', ['section_type' => $section_type,'type' => $type, 'role' => $role,'filterby1' => 'port','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $unloading_port]);
                                    }else if($filterby1 == 'port'){
                                        //dd('In this Group');
                                        $hs_code_url =  route('searchfilterone', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'port','filterby'=>$filterby,'filterdata'=>$res_hs_code,'filterdata1' => $unloading_port]);
                                        $country_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                        $port_url = route('searchfilterone', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'port','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $unloading_port]);
                                    }else if($filterby1=='country'){
                                    // dd($filterby,$filterby1,$args,$filterdata);
                                        $hs_code_url = route('searchfilterone', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$res_hs_code,'filterdata1' => $country]);
                                        $country_url = route('searchfilterone', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                        $port_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $country, 'filterdata1' => $unloading_port]);
                                    }
                            }
                            else if(count($args)==10){ //old args 9

                                    if($filterby1 == 'country'){

                                        //dd('In Country Args',$args,$filterby1,$filterby,$filterdata,$filterdata1,$search,$filterby1);
                                        //Hs Code URl
                                        $hs_code_url =  route('search-filter-one', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$res_hs_code??'null', 'filterby1' => $filterby1,'filterby'=>$filterby,'filterdata'=>$filterdata,'filterdata1' => $filterdata1??'null']);

                                        //Country Url
                                        $country_url =  route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $country]);

                                        //Port Url
                                        $port_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $country]);

                                    }else if($filterby1 == 'hs_code'){
                                        $base_search = $search;
                                        $port_url = route('filter-two', [
                                            'section_type' => $section_type,
                                            'country'=>$search_country,
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

                                    }else if($filterby1 == 'port'){

                                        $base_search = $search;
                                            //dd($search,$filterby,$filterby1,$args);
                                            $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                            //Hs code Url
                                            $hs_code_url =  route('search-filter-one', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$res_hs_code??'null', 'filterby1' => 'port','filterby'=>$filterby,'filterdata'=>$filterdata,'filterdata1' => $unloading_port??'null']);

                                            //Country Url
                                            $country_url =  route('search-filter-one', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$searchDetails1, 'filterby1' => 'port','filterby'=>$filterby,'filterdata'=>$filterdata,'filterdata1' => $unloading_port??'null']);

                                        //Port Url
                                            $port_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                    }
                                }
                                else if(count($arg)==10){ //old args 9
                                    $unloading_port = str_ireplace(" ", "-", $unloading_port);

                                if($filterby2 == 'hs_code'){
                                    //Hs_code
                                    $hs_code_url = route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                    //Country Url
                                    $country_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                    //Port Url
                                    $port_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                }else if($filterby2 == 'country'){
                                    //dd($filterby,$filterby1,$arg,$filterby2,$search,$searchDetails1);
                                    //$hs_code_url = route('search-filter-two', ['type' => $type, 'role' => $role,'search'=> $filterby,'searchDetails1'=>$res_hs_code, 'filterby2' => 'country','filterby'=>$filterby1,'filter'=>$filterdata,'filterby1'=>$filterby2,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                    $hs_code_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$res_hs_code,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                    $country_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                    $port_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $filterdata1??'default']);

                                    }else if($filterby2 == 'port'){
                                        //Hs_code
                                        $hs_code_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                        $country_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                        $port_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                    }
                                } else if(count($arg)==12){ //old args 11
                                    $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                    //dd($filterby,$filterby1,$arg,$filterby2);
                                if($filterby2 == 'hs_code'){
                                    //Hs_code
                                    $hs_code_url = route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                    //Country Url
                                    $country_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                    //Port Url
                                    $port_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                }else if($filterby2 == 'country'){
                                        $hs_code_url = route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                        $country_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                        $port_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);

                                    }else if($filterby2 == 'port'){
                                        //Hs_code
                                        $hs_code_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                        $country_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                        $port_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);

                                    }
                                }
                            else{
                                    $country_url = route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                }
                            // $country_url = route('search-filter', ['type' => $type, 'role' => $role,'searchDetails' => $hscode, 'filterby' => 'country', 'filterdata' => $country]);
                        }else{
                            //dd('IN Else Block',$filterby2,$filterby,$filterby1,$args,$arg,$filterdata);
                            if(count($args)==8){ // old args 7
                                if($filterby1 == 'port'){
                                    $country_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $Dresult->ORIGIN_COUNTRY??"null"]);
                                    $hs_code_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role, 'filterby2' => $filterby1,'filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>'hs_code','filterdata' => $res_hs_code??"null", 'filterdata1' => $unloading_port??'null']);
                                    $port_url =   route('searchfilterone', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'port','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $unloading_port??"null"]);

                                }else if($filterby1=='country'){
                                //Hs_code Url
                                    $hs_code_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role, 'filterby2' => $filterby1,'filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>'hs_code','filterdata' => $res_hs_code??"null", 'filterdata1' => $filterdata1??'null']);
                                //Port Url
                                    $port_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $unloading_port]);
                                //Country Url
                                    $country_url = route('searchfilterone', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);

                                }else if($filterby1=='hs_code'){
                                //dd('In this Block');
                                $hs_code_url = route('searchfilterone', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'hs_code','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $filterdata1]);
                                $country_url = route('search-filter-one', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$filterby,'base_search'=>$searchDetails1, 'filterby1' => 'country','filterby'=>$filterby1,'filterdata'=>$filterdata1,'filterdata1' => $country??'null']);
                                $port_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $unloading_port]);
                                }
                            }
                            else if(count($args)==10){ //old args 9
                                if($filterby1 == 'country'){
                                    $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                    $filterdata = str_ireplace(" ", "-", $filterdata);
                                    $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                                    //dd('In Country Args',$args,'search',$search,'searchDetails1',$searchDetails1,'filterby1',$filterby1,'filterby',$filterby,'filter',$filterdata,'filterdata', $filterdata1);
                                    //Hs Code URl
                                    if($filterby=='hs_code'){
                                        $hs_code_url =  route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' =>  $res_hs_code??"null", 'filterdata1' => $country]);
                                        $port_url =route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'port','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $unloading_port??'Default']);
                                    }else{
                                        $hs_code_url =  route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby1,'filterby'=>'hs_code','filter'=>$res_hs_code,'filterby1'=>$filterby,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                        $port_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $country]);
                                    }

                                    //Country Url
                                    $country_url =  route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $country]);

                                    //Port Url
                                    //$port_url =route('search-filter-two', ['type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'port','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $unloading_port??'Default']);


                                }else if($filterby1 == 'hs_code'){
                                    $base_search = $search;
                                    $port_url = route('filter-two', [
                                        'section_type' => $section_type,
                                        'country'=>$search_country,
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

                                }else if($filterby1 == 'port'){
                                    //dd($filterby1,$filterdata1,$filterby,$filterdata,$searchDetails1,$search,$args);
                                    $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                    $filterdata = str_ireplace(" ", "-", $filterdata);
                                    $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                                    //dd('In Country Args',$args,'search',$search,'searchDetails1',$searchDetails1,'filterby1',$filterby1,'filterby',$filterby,'filter',$filterdata,'filterdata', $filterdata1);
                                    //Hs Code URl
                                    if($filterby=='hs_code'){
                                    //Hs_code Url
                                    $hs_code_url =  route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $res_hs_code??"null", 'filterdata1' => $unloading_port??'Default']);
                                    //Port Url
                                    $port_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $filterdata1]);
                                    //Country Url
                                    $country_url =  route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $country??'Default']);
                                    }else{
                                        $hs_code_url =  route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby1,'filterby'=>'hs_code','filter'=>$res_hs_code,'filterby1'=>$filterby,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                        $port_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $filterdata1]);
                                        $country_url =  route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $filterdata1]);
                                    }

                                    //Port Url
                                    //$port_url =route('search-filter-two', ['type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'port','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $unloading_port??'Default']);
                                }
                            }
                            else if(count($arg)==10){ // old args 9
                                $unloading_port = str_ireplace(" ", "-", $unloading_port);

                                if($filterby2 == 'country'){
                                $hs_code_url =  route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $country]);
                                $country_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                $port_url =route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'port','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $unloading_port??'Default']);
                                }else if($filterby2 == 'port'){

                                    $base_search = $search;
                                        $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                        //Hs code Url
                                        $hs_code_url =   route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                        //dd($type, $role,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);
                                        //Country Url
                                        $country_url  = route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$filterby,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby1,'filter'=>$filterdata,'filterby1'=>$filterby2,'filterdata' => $filterdata1,'filterdata1' => $country??'Default']);

                                    //Port Url
                                        $port_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);

                                //$country_url = route('searchfiltertwo', ['type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                }
                            }else if(count($arg)==12){ //old args 11
                                $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                    // dd($type, $role,$search,$searchDetails1,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);
                                if($filterby2 == 'hs_code'){
                                    //Hs_code
                                    $hs_code_url = route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                    //Country Url
                                    $country_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                    //Port Url
                                    $port_url = route('searchfiltertwo', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                }else if($filterby2 == 'country'){
                                //HS_code Url
                                        $filterdata = str_ireplace(" ", "-", $filterdata);
                                        $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                                    //Hs_code
                                    //dd($type, $role,$search,$searchDetails1,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);

                                    $hs_code_url  = route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$res_hs_code,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                    //Country url
                                    $country_url  =route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                    //Port Url
                                    $port_url  =route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);


                                }else if($filterby2 == 'port'){
                                    $filterdata = str_ireplace(" ", "-", $filterdata);
                                    $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                                    //Hs_code
                                    //dd($type, $role,$search,$searchDetails1,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);

                                    $hs_code_url  = route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'port','filterby'=>$filterby,'filter'=>$res_hs_code,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                    //Country url
                                    $country_url  =route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'port','filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                    //Port Url
                                    $port_url  =route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'port','filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);

                                    }
                                }
                            else{
                                    $country_url = route('search-filter-two', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                }
                        }

                    @endphp

                    <div class="data-mobile-card mb-4">
                        <h1 class="fs-3 fw-normal text-center bg-bluish p-2 mb-3">
                            Shipment No. {{ $loop->iteration }}
                        </h1>
                        <div class="row col-sm-12 col-md-12">
                            <div class="col-sm-6 col-md-6 text-center">
                                <h2 class="fs-4 fw-normal">Date</h2>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <p class="fs-6 fw-light p-2">
                                    {{$Mresult->MONTH}}
                                </p>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <h2 class="fs-4 fw-normal">HS CODE</h2>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <a href="{{ $hs_code_url }}">
                                    <p class="fs-6 fw-light">
                                        @foreach (explode(',', $Mresult->HS_CODE) as $code)
                                            {{ $code }}
                                        @endforeach
                                    </p>
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <h2 class="fs-4 fw-normal">Product Description</h2>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <p class="fs-6 fw-light p-2" style="word-break: break-all;">
                                    {{$Mresult->PRODUCT_DESCRIPTION}}
                                </p>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <h2 class="fs-4 fw-normal">Origin Country</h2>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <a href="{{ $country_url }}">
                                    <p class="fs-6 fw-light">
                                        {{$Mresult->ORIGIN_COUNTRY}}
                                    </p>
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <h2 class="fs-4 fw-normal">Unloading Port</h2>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <a href="{{ $port_url }}" class="fs-5 fw-light">
                                    <p class="fs-6 fw-light p-3">
                                        {{$Mresult->ORIGIN_COUNTRY}}
                                    </p>
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <h2 class="fs-4 fw-normal">QTY</h2>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <p class="fs-6 fw-light p-2">
                                    {{$Mresult->QTY}}
                                </p>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <h2 class="fs-4 fw-normal">Unit</h2>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <p class="fs-6 fw-light p-2">
                                    {{$Mresult->UNIT}}
                                </p>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <h2 class="fs-4 fw-normal">Weight</h2>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <p class="fs-6 fw-light p-2">
                                    {{$Mresult->NET_WEIGHT}}
                                </p>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <h2 class="fs-4 fw-normal">Value In USD</h2>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                {{$Mresult->VALUE_IN_USD}}
                            </div>
                        </div>
                    </div>

                    @if($iteration == 10)
                        @break
                    @endif
                @endforeach
            @else
                <tr>
                    Data Not found
                </tr>
            @endif
        </div>
    </section>
@else
    <section class="container-fluid bg-bluish">
        <div class="pdt-2 pdb-5">
            <div class="table-reponsive">
                 <table class="table">
                    <thead>
                        <tr>
                            <th class="table-primary">
                                <h4 class="fw-bolder">Date</h4>
                            </th>
                            <th class="table-primary">
                                <h4 class="fw-bolder">HS Code</h4>
                            </th>
                            <th class="table-primary">
                                <h4 class="fw-bolder">Product Description</h4>
                            </th>
                            <th class="table-primary">
                                <h4 class="fw-bolder">Origin Country</h4>
                            </th>
                            <th class="table-primary">
                                <h4 class="fw-bolder">Unloading Port</h4>
                            </th>
                            <th class="table-primary">
                                <h4 class="fw-bolder">QTY.</h4>
                            </th>
                            <th class="table-primary">
                                <h4 class="fw-bolder">Unit</h4>
                            </th>
                            <th class="table-primary">
                                <h4 class="fw-bolder">Weight</h4>
                            </th>
                            <th class="table-primary">
                                <h4 class="fw-bolder">Expoter Name</h4>
                            </th>
                        </tr>
                </thead>
                    <tbody>
                        @php
                            $result = $result;
                            $iteration = 0;
                        @endphp
                        @if(isset($result) && $result->count() > 0)
                            @foreach ($result as $result)
                                @php
                                    $iteration++;
                                    $res_hs_code = $Dresult->HS_CODE;
                                    // dd($res_hs_code);
                                    $country = $Dresult->DESTINATION_COUNTRY;
                                    $country= str_ireplace(" ","-",$country);
                                    $unloading_port  = $Dresult->UNLOADING_PORT;
                                    $args = $args??[];
                                    // Hs code Url
                                    $arg = $arg??[];

                                    // dd($filterby1,$filterby,$args,$searchDetails1,$arg,$filterdata1,$filterdata);
                                        //dd($filterby,$filterby1,$args);
                                    $searchDetailsParts = !empty($searchDetails1)?explode(',', $searchDetails1):explode(',', $base_search);
                                    $all_numeric = true;

                                    foreach ($searchDetailsParts as $part) {
                                        if (!is_numeric($part)) {
                                            $all_numeric = false;
                                            break;
                                        }
                                    }
                                    // dd($all_numeric);
                                    if ($all_numeric) {
                                        # code...
                                        $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                        if(count($args)== 6){ // old args 5
                                            // dd($args,$filterby,$filterdata,$hs_code);
                                            if($filterby=='hs_code'){
                                                $hs_code_url = route('hs-code', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby' => 'hs_code', 'filterdata' => $res_hs_code]);
                                                $country_url = route('searchfilterone', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                                $port_url = route('searchfilterone', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'port','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $unloading_port ?? 'null']);
                                            }else if($filterby == 'country'){
                                                $hs_code_url = route('hs-code', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby' => 'hs_code', 'filterdata' => $res_hs_code]);
                                                $country_url = route('search-filter-one', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$base_search,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                                $port_url = route('search-filter-one', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$base_search,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                            } else if($filterby == 'port'){
                                                //Hs Code Url
                                                $hs_code_url = route('hs-code', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby' => 'hs_code', 'filterdata' => $res_hs_code]);
                                                //Coutry Url
                                                $country_url = route('search-filter-one', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$base_search,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                                //Port Url
                                                $port_url = route('search-filter-one', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$base_search,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                            }
                                        }
                                        else if(count($args)==8){ //old args 7
                                                if($filterby1=='hs_code'){
                                                    $hs_code_url =  route('searchfilterone', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'port','filterby'=>$filterby,'filterdata'=>$res_hs_code,'filterdata1' => $unloading_port]);
                                                    $country_url = route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $Dresult->DESTINATION_COUNTRY]);
                                                    $port_url = route('searchfilterone', ['section_type'=> $section_type,'type' => $type, 'role' => $role,'filterby1' => 'port','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $unloading_port]);
                                                }else if($filterby1 == 'port'){
                                                    //dd('In this Group');
                                                    $hs_code_url =  route('searchfilterone', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'port','filterby'=>$filterby,'filterdata'=>$res_hs_code,'filterdata1' => $unloading_port]);
                                                    $country_url = route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $Dresult->DESTINATION_COUNTRY]);
                                                    $port_url = route('searchfilterone', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'port','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $unloading_port]);
                                                }else if($filterby1=='country'){
                                                    // dd($filterby,$filterby1,$args,$filterdata);
                                                    $hs_code_url = route('searchfilterone', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$res_hs_code,'filterdata1' => $country]);
                                                    $country_url = route('searchfilterone', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                                    $port_url = route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $country, 'filterdata1' => $unloading_port]);
                                                }
                                        }
                                        else if(count($args)==10){ // old args 9

                                                if($filterby1 == 'country'){

                                                    //dd('In Country Args',$args,$filterby1,$filterby,$filterdata,$filterdata1,$search,$filterby1);
                                                    //Hs Code URl
                                                    $hs_code_url =  route('search-filter-one', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$res_hs_code??'null', 'filterby1' => $filterby1,'filterby'=>$filterby,'filterdata'=>$filterdata,'filterdata1' => $filterdata1??'null']);

                                                    //Country Url
                                                    $country_url =  route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $country]);

                                                    //Port Url
                                                    $port_url = route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $country]);

                                                }else if($filterby1 == 'hs_code'){
                                                    $base_search = $search;
                                                    $port_url = route('filter-two', [
                                                        'section_type'=> $section_type,
                                                        'country'=>$search_country,
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

                                                }else if($filterby1 == 'port'){

                                                    $base_search = $search;
                                                        //dd($search,$filterby,$filterby1,$args);
                                                        $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                                        //Hs code Url
                                                        $hs_code_url =  route('search-filter-one', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$res_hs_code??'null', 'filterby1' => 'port','filterby'=>$filterby,'filterdata'=>$filterdata,'filterdata1' => $unloading_port??'null']);

                                                        //Country Url
                                                        $country_url =  route('search-filter-one', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$searchDetails1, 'filterby1' => 'port','filterby'=>$filterby,'filterdata'=>$filterdata,'filterdata1' => $unloading_port??'null']);

                                                    //Port Url
                                                        $port_url = route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                                }
                                            }
                                            else if(count($arg)==10){ // old args 9
                                                $unloading_port = str_ireplace(" ", "-", $unloading_port);

                                            if($filterby2 == 'hs_code'){
                                                //Hs_code
                                                $hs_code_url = route('search-filter-two', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                                //Country Url
                                                $country_url = route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->DESTINATION_COUNTRY]);
                                                //Port Url
                                                $port_url = route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                            }else if($filterby2 == 'country'){
                                                //dd($filterby,$filterby1,$arg,$filterby2,$search,$searchDetails1);
                                                //$hs_code_url = route('search-filter-two', ['type' => $type, 'role' => $role,'search'=> $filterby,'searchDetails1'=>$res_hs_code, 'filterby2' => 'country','filterby'=>$filterby1,'filter'=>$filterdata,'filterby1'=>$filterby2,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                                $hs_code_url = route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$res_hs_code,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->DESTINATION_COUNTRY]);
                                                $country_url = route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->DESTINATION_COUNTRY]);
                                                $port_url = route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $filterdata1??'default']);

                                                }else if($filterby2 == 'port'){
                                                //Hs_code
                                                $hs_code_url = route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                                //Country url
                                                $country_url = route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                                //Port Url                                                           //Port Url
                                                $port_url = route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);

                                                }
                                            } else if(count($arg)==12){ //old args 11
                                                $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                                //dd($filterby,$filterby1,$arg,$filterby2);
                                            if($filterby2 == 'hs_code'){
                                                //Hs_code
                                                $hs_code_url = route('search-filter-two', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                                //Country Url
                                                $country_url = route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->DESTINATION_COUNTRY]);
                                                //Port Url
                                                $port_url = route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                            }else if($filterby2 == 'country'){
                                                $hs_code_url = route('search-filter-two', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                                $country_url = route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->DESTINATION_COUNTRY]);
                                                $port_url = route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);

                                                }else if($filterby2 == 'port'){
                                                //Hs_code
                                                $hs_code_url = route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                                //Country url
                                                $country_url = route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                                //Port Url                                                           //Port Url
                                                $port_url = route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);

                                                }
                                            }
                                        else{
                                                $country_url = route('search-filter-two', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $Dresult->DESTINATION_COUNTRY]);
                                            }
                                        // $country_url = route('search-filter', ['type' => $type, 'role' => $role,'searchDetails' => $hscode, 'filterby' => 'country', 'filterdata' => $country]);
                                    }else{
                                        //dd('IN Else Block',$filterby2,$filterby,$filterby1,$args,$arg,$filterdata);
                                        $unloading_port = str_ireplace(" ", "-", $unloading_port);

                                        if(count($args)==8){ //old args 7
                                            if($filterby1 == 'port'){
                                                $country_url = route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $Dresult->DESTINATION_COUNTRY]);
                                                $hs_code_url = route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role, 'filterby2' => $filterby1,'filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>'hs_code','filterdata' => $res_hs_code??"null", 'filterdata1' => $unloading_port??'null']);
                                                $port_url =   route('searchfilterone', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'port','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $unloading_port??"null"]);

                                            }else if($filterby1=='country'){
                                            //Hs_code Url
                                                $hs_code_url = route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role, 'filterby2' => $filterby1,'filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>'hs_code','filterdata' => $res_hs_code??"null", 'filterdata1' => $filterdata1??'null']);
                                            //Port Url
                                                $port_url = route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $unloading_port]);
                                            //Country Url
                                                $country_url = route('searchfilterone', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);

                                            }else if($filterby1=='hs_code'){
                                                //dd('In this Block');
                                                $hs_code_url = route('searchfilterone', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'hs_code','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $filterdata1]);
                                                $country_url = route('search-filter-one', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$filterby,'base_search'=>$searchDetails1, 'filterby1' => 'country','filterby'=>$filterby1,'filterdata'=>$filterdata1,'filterdata1' => $country??'null']);
                                                $port_url = route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $unloading_port]);
                                            }
                                        }
                                        else if(count($args)==10){ //old args 9
                                            if($filterby1 == 'country'){
                                                $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                                $filterdata = str_ireplace(" ", "-", $filterdata);
                                                $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                                                //dd('In Country Args',$args,'search',$search,'searchDetails1',$searchDetails1,'filterby1',$filterby1,'filterby',$filterby,'filter',$filterdata,'filterdata', $filterdata1);
                                                //Hs Code URl
                                                if($filterby=='hs_code'){
                                                $hs_code_url =  route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' =>  $res_hs_code??"null", 'filterdata1' => $country]);
                                                $port_url =route('search-filter-two', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'port','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $unloading_port??'Default']);
                                                }else{
                                                $hs_code_url =  route('search-filter-two', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby1,'filterby'=>'hs_code','filter'=>$res_hs_code,'filterby1'=>$filterby,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                                $port_url = route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $country]);
                                                }

                                                //Country Url
                                                $country_url =  route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $country]);

                                                //Port Url
                                                //$port_url =route('search-filter-two', ['type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'port','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $unloading_port??'Default']);


                                            }else if($filterby1 == 'hs_code'){
                                                $base_search = $search;
                                                $port_url = route('filter-two', [
                                                    'section_type'=> $section_type,
                                                    'country'=>$search_country,
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

                                            }else if($filterby1 == 'port'){
                                                //dd($filterby1,$filterdata1,$filterby,$filterdata,$searchDetails1,$search,$args);
                                                $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                                $filterdata = str_ireplace(" ", "-", $filterdata);
                                                $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                                                //dd('In Country Args',$args,'search',$search,'searchDetails1',$searchDetails1,'filterby1',$filterby1,'filterby',$filterby,'filter',$filterdata,'filterdata', $filterdata1);
                                                //Hs Code URl
                                                if($filterby=='hs_code'){
                                                    //Hs_code Url
                                                    $hs_code_url =  route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $res_hs_code??"null", 'filterdata1' => $unloading_port??'Default']);
                                                    //Port Url
                                                    $port_url = route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $filterdata1]);
                                                    //Country Url
                                                    $country_url =  route('search-filter-two', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $country??'Default']);
                                                }else{
                                                    $hs_code_url =  route('search-filter-two', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby1,'filterby'=>'hs_code','filter'=>$res_hs_code,'filterby1'=>$filterby,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                                    $port_url = route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $filterdata1]);
                                                    $country_url =  route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $filterdata1]);
                                                }

                                                //Port Url
                                                //$port_url =route('search-filter-two', ['type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'port','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $unloading_port??'Default']);
                                            }
                                        }
                                        else if(count($arg)==10){ // old args 9
                                            $unloading_port = str_ireplace(" ", "-", $unloading_port);

                                            if($filterby2 == 'country'){
                                                $hs_code_url =  route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $country]);
                                                $country_url = route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->DESTINATION_COUNTRY]);
                                                $port_url =route('search-filter-two', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'port','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $unloading_port??'Default']);
                                            }else if($filterby2 == 'port'){

                                                $base_search = $search;
                                                    $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                                    //Hs code Url
                                                    $hs_code_url =   route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                                    //dd($type, $role,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);
                                                    //Country Url
                                                    $country_url  = route('search-filter-two', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$filterby,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby1,'filter'=>$filterdata,'filterby1'=>$filterby2,'filterdata' => $filterdata1,'filterdata1' => $country??'Default']);

                                                //Port Url
                                                    $port_url = route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);

                                            //$country_url = route('searchfiltertwo', ['type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                            }
                                        }else if(count($arg)==12){ // old args 11
                                            $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                                // dd($type, $role,$search,$searchDetails1,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);
                                            if($filterby2 == 'hs_code'){
                                                //Hs_code
                                                $hs_code_url = route('search-filter-two', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                                //Country Url
                                                $country_url = route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->DESTINATION_COUNTRY]);
                                                //Port Url
                                                $port_url = route('searchfiltertwo', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                            }else if($filterby2 == 'country'){
                                            //HS_code Url
                                                    $filterdata = str_ireplace(" ", "-", $filterdata);
                                                    $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                                                //Hs_code
                                                //dd($type, $role,$search,$searchDetails1,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);

                                                $hs_code_url  = route('search-filter-two', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$res_hs_code,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                                //Country url
                                                $country_url  =route('search-filter-two', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                                //Port Url
                                                $port_url  =route('search-filter-two', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);


                                            }else if($filterby2 == 'port'){
                                                    $filterdata = str_ireplace(" ", "-", $filterdata);
                                                    $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                                                    //Hs_code
                                                    //dd($type, $role,$search,$searchDetails1,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);

                                                    $hs_code_url  = route('search-filter-two', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'port','filterby'=>$filterby,'filter'=>$res_hs_code,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                                    //Country url
                                                    $country_url  =route('search-filter-two', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'port','filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                                    //Port Url
                                                    $port_url  =route('search-filter-two', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'port','filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);

                                                }
                                            }
                                        else{
                                                $country_url = route('search-filter-two', ['section_type'=> $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                            }
                                    }

                                @endphp
                                <tr>
                                    <td class="fw-bolder text-center text-gray">
                                        {{$result->DATE}}
                                    </td>
                                    <td class="fw-bolder text-center text-gray">
                                        <a href="{{ $hs_code_url }}" class="font-medium text-blue-600 hover:underline">
                                            {{-- {{ $result->HS_CODE }} --}}
                                            @foreach (explode(',', $result->HS_CODE) as $code)
                                                <div>{{ $code }}</div>
                                            @endforeach
                                        </a>
                                    </td>
                                    <td class="fw-bolder text-center text-gray">
                                        {{$result->PRODUCT_DESCRIPTION}}
                                    </td>
                                    <td class="fw-bolder text-center text-gray">
                                        <a href="{{ $country_url }}" class="font-medium text-blue-600 hover:underline">
                                                {{$result->DESTINATION_COUNTRY}}
                                        </a>
                                    </td>
                                    <td class="fw-bolder text-center text-gray">
                                        <a href="{{ $port_url }}" class="font-medium text-blue-600 hover:underline">
                                            {{$result->UNLOADING_PORT}}
                                        </a>
                                    </td>
                                    <td class="fw-bolder text-center text-gray">
                                        {{$result->QUANTITY}}
                                    </td>
                                    <td class="fw-bolder text-center text-gray">
                                        {{$result->UNIT}}
                                    </td>
                                    <td class="fw-bolder text-center text-gray">
                                        {{$result->WEIGHT}}
                                    </td>
                                    <td class="fw-bolder text-center text-gray">
                                        {{$result->US_EXPORTER_NAME}}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                Data Not found
                            </tr>
                        @endif
                </tbody>
                </table>
            </div>

            <!--pagination-->
            @include('frontend.livedata.pagination')
        </div>
    </section>
@endif
@include('frontend.livedata.filterOne')
