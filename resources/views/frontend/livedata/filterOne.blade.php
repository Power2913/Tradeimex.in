        @if($role == 'import')
            @php
                $Dresult = $result;
                $iteration = 0;
            @endphp
            @if(isset($Dresult) && $Dresult->count() > 0)
                @foreach ($Dresult as $Dresult)
                    {{-- @dd($searchDetails1) --}}
                    @php
                        $iteration++;
                        $res_hs_code = $Dresult->HS_CODE;
                        // dd($res_hs_code);
                        $country = $Dresult->ORIGIN_COUNTRY;
                        $country= str_ireplace(" ","-",$country);
                        $unloading_port  = $Dresult->UNLOADING_PORT??"null";
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
                            if(count($args)== 6) { //old args 5
                                // dd($args,$filterby,$filterdata,$hs_code);
                                if($filterby=='hs_code'){
                                    $hs_code_url = route('hs-code', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby' => 'hs_code', 'filterdata' => $res_hs_code]);
                                    $country_url = route('searchfilterone', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                    $port_url = route('searchfilterone', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'unloading_port','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $unloading_port ?? 'null']);
                                }else if($filterby == 'country'){
                                    $hs_code_url = route('hs-code', ['section_type' => $section_type,'country'=>$search_country,'type' => $type, 'role' => $role,'filterby' => 'hs_code', 'filterdata' => $res_hs_code]);
                                    $country_url = route('search-filter-one', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$base_search,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                    //Port Url
                                    $port_url = route('search-filter-one', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$base_search,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                } else if($filterby == 'unloading_port'){
                                    //Hs Code Url
                                    $hs_code_url = route('hs-code', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby' => 'hs_code', 'filterdata' => $res_hs_code]);
                                    //Coutry Url
                                    $country_url = route('search-filter-one', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$base_search,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                    //Port Url
                                    $port_url = route('search-filter-one', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$base_search,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                }
                            }
                            else if(count($args)==8){ //old args 7
                                    if($filterby1=='hs_code'){
                                        $hs_code_url =  route('searchfilterone', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'unloading_port','filterby'=>$filterby,'filterdata'=>$res_hs_code,'filterdata1' => $unloading_port]);
                                        $country_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                        $port_url = route('searchfilterone', ['section_type' => $section_type, 'type' => $type, 'role' => $role,'filterby1' => 'unloading_port','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $unloading_port]);
                                    }else if($filterby1=='unloading_port'){
                                        //dd('In this Group');
                                        $hs_code_url =  route('searchfilterone', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'unloading_port','filterby'=>$filterby,'filterdata'=>$res_hs_code,'filterdata1' => $unloading_port]);
                                        $country_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                        $port_url = route('searchfilterone', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'unloading_port','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $unloading_port]);
                                    }else if($filterby1=='country'){
                                    // dd($filterby,$filterby1,$args,$filterdata);
                                    $hs_code_url = route('searchfilterone', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$res_hs_code,'filterdata1' => $country]);
                                    $country_url = route('searchfilterone', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                    $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $country, 'filterdata1' => $unloading_port]);
                                    }
                            }
                            else if(count($args)==10){ //old args 9

                                    if($filterby1 == 'country'){

                                        //dd('In Country Args',$args,$filterby1,$filterby,$filterdata,$filterdata1,$search,$filterby1);
                                        //Hs Code URl
                                        $hs_code_url =  route('search-filter-one', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$res_hs_code??'null', 'filterby1' => $filterby1,'filterby'=>$filterby,'filterdata'=>$filterdata,'filterdata1' => $filterdata1??'null']);

                                        //Country Url
                                        $country_url =  route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $country]);

                                        //Port Url
                                        $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $country]);

                                    }else if($filterby1 == 'hs_code'){
                                        $base_search = $search;
                                        $port_url = route('filter-two', [
                                            'section_type' => $section_type,
                                            'country'=>$search_country,
                                            'type' => $type,
                                            'role' => $role,
                                            'search' => $base_search,
                                            'searchDetails1' => $searchDetails1,
                                            'filterby2' => 'unloading_port',
                                            'filterby' => $filterby,
                                            'filter' => $filterdata,
                                            'filterby1' => $filterby1,
                                            'filterdata' => $filterdata1,
                                            'filterdata1' => $unloading_port ?? 'Default'
                                        ]);

                                    }else if($filterby1 == 'unloading_port'){

                                        $base_search = $search;
                                            //dd($search,$filterby,$filterby1,$args);
                                            $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                            //Hs code Url
                                            $hs_code_url =  route('search-filter-one', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$res_hs_code??'null', 'filterby1' => 'unloading_port','filterby'=>$filterby,'filterdata'=>$filterdata,'filterdata1' => $unloading_port??'null']);

                                            //Country Url
                                            $country_url =  route('search-filter-one', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$searchDetails1, 'filterby1' => 'unloading_port','filterby'=>$filterby,'filterdata'=>$filterdata,'filterdata1' => $unloading_port??'null']);

                                        //Port Url
                                            $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                    }
                                }
                                else if(count($arg)==10){ //old args 9
                                    $unloading_port = str_ireplace(" ", "-", $unloading_port);

                                if($filterby2 == 'hs_code'){
                                    //Hs_code
                                    $hs_code_url = route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                    //Country Url
                                    $country_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                    //Port Url
                                    $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                }else if($filterby2 == 'country'){
                                    //dd($filterby,$filterby1,$arg,$filterby2,$search,$searchDetails1);
                                        //$hs_code_url = route('search-filter-two', ['type' => $type, 'role' => $role,'search'=> $filterby,'searchDetails1'=>$res_hs_code, 'filterby2' => 'country','filterby'=>$filterby1,'filter'=>$filterdata,'filterby1'=>$filterby2,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                        $hs_code_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$res_hs_code,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                        $country_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                        $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $filterdata1??'default']);

                                    }else if($filterby2 == 'unloading_port'){
                                        //Hs_code
                                        $hs_code_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                        $country_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                        $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);

                                    }
                                } else if(count($arg)==12){ //old args 11
                                    $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                    //dd($filterby,$filterby1,$arg,$filterby2);
                                if($filterby2 == 'hs_code'){
                                    //Hs_code
                                    $hs_code_url = route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                    //Country Url
                                    $country_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                    //Port Url
                                    $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                }else if($filterby2 == 'country'){
                                    $hs_code_url = route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                    $country_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                    $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);

                                    }else if($filterby2 == 'unloading_port'){
                                        //Hs_code
                                        $hs_code_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                        $country_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                        $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);

                                    }
                                }
                            else{
                                    $country_url = route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $Dresult->ORIGIN_COUNTRY??"null"]);
                                }
                            // $country_url = route('search-filter', ['type' => $type, 'role' => $role,'searchDetails' => $hscode, 'filterby' => 'country', 'filterdata' => $country]);
                        }else{
                            //dd('IN Else Block',$filterby,$filterby1,$args,$arg,$filterdata);
                            if(count($args)==8){ //old args 7
                                if($filterby1=='unloading_port'){
                                    $country_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $Dresult->ORIGIN_COUNTRY??"null"]);
                                    $hs_code_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role, 'filterby2' => $filterby1,'filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>'hs_code','filterdata' => $res_hs_code??"null", 'filterdata1' => $unloading_port??'null']);
                                    $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $unloading_port??"null"]);

                                }else if($filterby1=='country'){
                                    $hs_code_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role, 'filterby2' => $filterby1,'filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>'hs_code','filterdata' => $res_hs_code??"null", 'filterdata1' => $filterdata1??'null']);
                                    $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $unloading_port]);
                                    $country_url = route('searchfilterone', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => str_ireplace(" ","-",$country)]);

                                }else if($filterby1=='hs_code'){
                                    $hs_code_url = route('searchfilterone', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'hs_code','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $filterdata1]);
                                    $country_url = route('search-filter-one', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$filterby,'base_search'=>$searchDetails1, 'filterby1' => 'country','filterby'=>$filterby1,'filterdata'=>$filterdata1,'filterdata1' => $country??'null']);
                                    $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $unloading_port]);
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
                                        $hs_code_url =  route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' =>  $res_hs_code??"null", 'filterdata1' => $country]);
                                        $port_url =route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $unloading_port??'Default']);
                                    }else{
                                        $hs_code_url =  route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby1,'filterby'=>'hs_code','filter'=>$res_hs_code,'filterby1'=>$filterby,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                        $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $country]);
                                    }
                                    //Country Url
                                    $country_url =  route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $country]);

                                    //Port Url
                                    //$port_url =route('search-filter-two', ['type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $unloading_port??'Default']);


                                }else if($filterby1 == 'hs_code'){
                                    $base_search = $search;
                                    $port_url = route('filter-two', [
                                        'section_type' => $section_type,
                                        'country'=>$search_country,
                                        'type' => $type,
                                        'role' => $role,
                                        'search' => $base_search,
                                        'searchDetails1' => $searchDetails1,
                                        'filterby2' => 'unloading_port',
                                        'filterby' => $filterby,
                                        'filter' => $filterdata,
                                        'filterby1' => $filterby1,
                                        'filterdata' => $filterdata1,
                                        'filterdata1' => $unloading_port ?? 'Default'
                                    ]);

                                }else if($filterby1 == 'unloading_port'){
                                    //dd($filterby1,$filterdata1,$filterby,$filterdata,$searchDetails1,$search,$args);
                                    $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                    $filterdata = str_ireplace(" ", "-", $filterdata);
                                    $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                                    //dd('In Country Args',$args,'search',$search,'searchDetails1',$searchDetails1,'filterby1',$filterby1,'filterby',$filterby,'filter',$filterdata,'filterdata', $filterdata1);
                                    //Hs Code URl
                                    if($filterby=='hs_code'){
                                    //Hs_code Url
                                    $hs_code_url =  route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $res_hs_code??"null", 'filterdata1' => $unloading_port??'Default']);
                                    //Port Url
                                    $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $filterdata1]);
                                    //Country Url
                                    $country_url =  route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $country??'Default']);
                                    }else{
                                        $hs_code_url =  route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby1,'filterby'=>'hs_code','filter'=>$res_hs_code,'filterby1'=>$filterby,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                        $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $filterdata1]);
                                        $country_url =  route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $filterdata1]);
                                    }

                                    //Port Url
                                    //$port_url =route('search-filter-two', ['type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $unloading_port??'Default']);
                                }
                            }
                            else if(count($arg)==10){ //old args 9
                                $unloading_port = str_ireplace(" ", "-", $unloading_port);

                                if($filterby2 == 'country'){
                                    $hs_code_url =  route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $country]);
                                    $country_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                    $port_url =route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $unloading_port??'Default']);
                                }else if($filterby2 == 'unloading_port'){

                                    $base_search = $search;
                                        $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                        //Hs code Url
                                        $hs_code_url =   route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                        //dd($type, $role,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);
                                        //Country Url
                                        $country_url  = route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$filterby,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby1,'filter'=>$filterdata,'filterby1'=>$filterby2,'filterdata' => $filterdata1,'filterdata1' => $country??'Default']);
                                        $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);

                                    //$country_url = route('searchfiltertwo', ['type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                }
                            }else if(count($arg)==12){ //old args 11
                                $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                    // dd($type, $role,$search,$searchDetails1,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);
                                if($filterby2 == 'hs_code'){
                                    //Hs_code
                                    $hs_code_url = route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                    //Country Url
                                    $country_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                    //Port Url
                                    $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                }else if($filterby2 == 'country'){
                                //HS_code Url
                                        $filterdata = str_ireplace(" ", "-", $filterdata);
                                        $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                                    //Hs_code
                                    //dd($type, $role,$search,$searchDetails1,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);

                                    $hs_code_url  = route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$res_hs_code,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                    //Country url
                                    $country_url  =route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                    //Port Url
                                    $port_url  =route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);


                                }else if($filterby2 == 'unloading_port'){
                                        $filterdata = str_ireplace(" ", "-", $filterdata);
                                        $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                                    //Hs_code
                                    //dd($type, $role,$search,$searchDetails1,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);

                                    $hs_code_url  = route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$res_hs_code,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                    //Country url
                                    $country_url  =route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                    //Port Url
                                    $port_url  =route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);

                                    }
                                }
                            else{
                                $country_url = route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                            }
                        }
                    @endphp
             @endforeach
        @endif
       @elseif($role == 'export')
            @php
                $Dresult = $result;
                // dd($Dresult);
                $iteration = 0;
            @endphp
            @if(isset($Dresult) && $Dresult->count() > 0)
                @foreach ($Dresult as $Dresult)
                    {{-- @dd($searchDetails1) --}}
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
                                if(count($args)== 6) { //old args 5
                                    // dd($args,$filterby,$filterdata,$hs_code);
                                    if($filterby=='hs_code'){
                                        $hs_code_url = route('hs-code', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby' => 'hs_code', 'filterdata' => $res_hs_code]);
                                        $country_url = route('searchfilterone', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                        $port_url = route('searchfilterone', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'unloading_port','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $unloading_port ?? 'null']);
                                    }else if($filterby == 'country'){
                                        $hs_code_url = route('hs-code', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby' => 'hs_code', 'filterdata' => $res_hs_code]);
                                        $country_url = route('search-filter-one', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$base_search,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                        //Port Url
                                        $port_url = route('search-filter-one', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$base_search,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                    } else if($filterby == 'unloading_port'){
                                        //Hs Code Url
                                        $hs_code_url = route('hs-code', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby' => 'hs_code', 'filterdata' => $res_hs_code]);
                                        //Coutry Url
                                        $country_url = route('search-filter-one', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$base_search,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                        //Port Url
                                        $port_url = route('search-filter-one', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$base_search,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                    }
                                }
                                else if(count($args)==8){ //old args 7
                                    if($filterby1=='hs_code'){
                                        $hs_code_url =  route('searchfilterone', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'unloading_port','filterby'=>$filterby,'filterdata'=>$res_hs_code,'filterdata1' => $unloading_port]);
                                        $country_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $Dresult->DESTINATION_COUNTRY]);
                                        $port_url = route('searchfilterone', ['section_type' => $section_type, 'type' => $type, 'role' => $role,'filterby1' => 'unloading_port','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $unloading_port]);
                                    }else if($filterby1=='unloading_port'){
                                        //dd('In this Group');
                                        $hs_code_url =  route('searchfilterone', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'unloading_port','filterby'=>$filterby,'filterdata'=>$res_hs_code,'filterdata1' => $unloading_port]);
                                        $country_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $Dresult->DESTINATION_COUNTRY]);
                                        $port_url = route('searchfilterone', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'unloading_port','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $unloading_port]);
                                    }else if($filterby1=='country'){
                                        // dd($filterby,$filterby1,$args,$filterdata);
                                        $hs_code_url = route('searchfilterone', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$res_hs_code,'filterdata1' => $country]);
                                        $country_url = route('searchfilterone', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                        $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $country, 'filterdata1' => $unloading_port]);
                                    }
                                }
                                else if(count($args)==10){ //old args 9

                                        if($filterby1 == 'country'){

                                            //dd('In Country Args',$args,$filterby1,$filterby,$filterdata,$filterdata1,$search,$filterby1);
                                            //Hs Code URl
                                            $hs_code_url =  route('search-filter-one', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$res_hs_code??'null', 'filterby1' => $filterby1,'filterby'=>$filterby,'filterdata'=>$filterdata,'filterdata1' => $filterdata1??'null']);

                                            //Country Url
                                            $country_url =  route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $country]);

                                            //Port Url
                                            $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $country]);

                                        }else if($filterby1 == 'hs_code'){
                                            $base_search = $search;
                                            $port_url = route('filter-two', [
                                                'section_type' => $section_type,
                                                'country'=>$search_country,
                                                'type' => $type,
                                                'role' => $role,
                                                'search' => $base_search,
                                                'searchDetails1' => $searchDetails1,
                                                'filterby2' => 'unloading_port',
                                                'filterby' => $filterby,
                                                'filter' => $filterdata,
                                                'filterby1' => $filterby1,
                                                'filterdata' => $filterdata1,
                                                'filterdata1' => $unloading_port ?? 'Default'
                                            ]);

                                        }else if($filterby1 == 'unloading_port'){

                                            $base_search = $search;
                                                //dd($search,$filterby,$filterby1,$args);
                                                $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                                //Hs code Url
                                                $hs_code_url =  route('search-filter-one', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$res_hs_code??'null', 'filterby1' => 'unloading_port','filterby'=>$filterby,'filterdata'=>$filterdata,'filterdata1' => $unloading_port??'null']);

                                                //Country Url
                                                $country_url =  route('search-filter-one', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$searchDetails1, 'filterby1' => 'unloading_port','filterby'=>$filterby,'filterdata'=>$filterdata,'filterdata1' => $unloading_port??'null']);

                                            //Port Url
                                                $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                        }
                                    }
                                    else if(count($arg)==10){ //old args 9
                                        $unloading_port = str_ireplace(" ", "-", $unloading_port);

                                    if($filterby2 == 'hs_code'){
                                        //Hs_code
                                        $hs_code_url = route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                        //Country Url
                                        $country_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->DESTINATION_COUNTRY]);
                                        //Port Url
                                        $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                    }else if($filterby2 == 'country'){
                                        //dd($filterby,$filterby1,$arg,$filterby2,$search,$searchDetails1);
                                        //$hs_code_url = route('search-filter-two', ['type' => $type, 'role' => $role,'search'=> $filterby,'searchDetails1'=>$res_hs_code, 'filterby2' => 'country','filterby'=>$filterby1,'filter'=>$filterdata,'filterby1'=>$filterby2,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                        $hs_code_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$res_hs_code,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->DESTINATION_COUNTRY]);
                                        $country_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->DESTINATION_COUNTRY]);
                                        $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $filterdata1??'default']);

                                        }else if($filterby2 == 'unloading_port'){
                                        //Hs_code
                                        $hs_code_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                        $country_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                        $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);

                                        }
                                    } else if(count($arg)==12){ //old agrs 11
                                        $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                        //dd($filterby,$filterby1,$arg,$filterby2);
                                    if($filterby2 == 'hs_code'){
                                        //Hs_code
                                        $hs_code_url = route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                        //Country Url
                                        $country_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->DESTINATION_COUNTRY]);
                                        //Port Url
                                        $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                    }else if($filterby2 == 'country'){
                                        $hs_code_url = route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                        $country_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->DESTINATION_COUNTRY]);
                                        $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);

                                        }else if($filterby2 == 'unloading_port'){
                                            $hs_code_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                            $country_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                            $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                        }
                                    }
                                else{
                                        $country_url = route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $Dresult->DESTINATION_COUNTRY]);
                                    }
                                // $country_url = route('search-filter', ['type' => $type, 'role' => $role,'searchDetails' => $hscode, 'filterby' => 'country', 'filterdata' => $country]);
                            }else{
                                //dd('IN Else Block',$filterby2,$filterby,$filterby1,$args,$arg,$filterdata);
                                if(count($args)==8){ //old args 7
                                    if($filterby1=='unloading_port'){
                                        $country_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $Dresult->DESTINATION_COUNTRY]);
                                        $hs_code_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role, 'filterby2' => $filterby1,'filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>'hs_code','filterdata' => $res_hs_code??"null", 'filterdata1' => $unloading_port??'null']);
                                        $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $unloading_port??"null"]);

                                    }else if($filterby1=='country'){
                                    //Hs_code Url
                                        $hs_code_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role, 'filterby2' => $filterby1,'filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>'hs_code','filterdata' => $res_hs_code??"null", 'filterdata1' => $filterdata1??'null']);
                                    //Port Url
                                        $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $unloading_port]);
                                    //Country Url
                                        $country_url = route('searchfilterone', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);

                                    }else if($filterby1=='hs_code'){
                                        //dd('In this Block');
                                        $hs_code_url = route('searchfilterone', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'hs_code','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $filterdata1]);
                                        $country_url = route('search-filter-one', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$filterby,'base_search'=>$searchDetails1, 'filterby1' => 'country','filterby'=>$filterby1,'filterdata'=>$filterdata1,'filterdata1' => $country??'null']);
                                        $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $unloading_port]);
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
                                            $hs_code_url =  route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' =>  $res_hs_code??"null", 'filterdata1' => $country]);
                                            $port_url =route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $unloading_port??'Default']);
                                        }else{
                                            $hs_code_url =  route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby1,'filterby'=>'hs_code','filter'=>$res_hs_code,'filterby1'=>$filterby,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                            $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $country]);
                                        }

                                        //Country Url
                                        $country_url =  route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $country]);

                                        //Port Url
                                        //$port_url =route('search-filter-two', ['type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $unloading_port??'Default']);


                                    }else if($filterby1 == 'hs_code'){
                                        $base_search = $search;
                                        $port_url = route('filter-two', [
                                            'section_type' => $section_type,
                                            'country'=>$search_country,
                                            'type' => $type,
                                            'role' => $role,
                                            'search' => $base_search,
                                            'searchDetails1' => $searchDetails1,
                                            'filterby2' => 'unloading_port',
                                            'filterby' => $filterby,
                                            'filter' => $filterdata,
                                            'filterby1' => $filterby1,
                                            'filterdata' => $filterdata1,
                                            'filterdata1' => $unloading_port ?? 'Default'
                                        ]);

                                    }else if($filterby1 == 'unloading_port'){
                                        //dd($filterby1,$filterdata1,$filterby,$filterdata,$searchDetails1,$search,$args);
                                        $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                        $filterdata = str_ireplace(" ", "-", $filterdata);
                                        $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                                        //dd('In Country Args',$args,'search',$search,'searchDetails1',$searchDetails1,'filterby1',$filterby1,'filterby',$filterby,'filter',$filterdata,'filterdata', $filterdata1);
                                        //Hs Code URl
                                        if($filterby=='hs_code'){
                                        //Hs_code Url
                                        $hs_code_url =  route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $res_hs_code??"null", 'filterdata1' => $unloading_port??'Default']);
                                        //Port Url
                                        $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $filterdata1]);
                                        //Country Url
                                        $country_url =  route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $country??'Default']);
                                        }else{
                                        $hs_code_url =  route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby1,'filterby'=>'hs_code','filter'=>$res_hs_code,'filterby1'=>$filterby,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                        $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $filterdata1]);
                                        $country_url =  route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $filterdata1]);
                                        }

                                        //Port Url
                                        //$port_url =route('search-filter-two', ['type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $unloading_port??'Default']);
                                    }
                                }
                                else if(count($arg)==10){ //old args 9
                                    $unloading_port = str_ireplace(" ", "-", $unloading_port);

                                    if($filterby2 == 'country'){
                                    $hs_code_url =  route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $country]);
                                    $country_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->DESTINATION_COUNTRY]);
                                    //Port Url
                                    $port_url =route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $unloading_port??'Default']);
                                    }else if($filterby2 == 'unloading_port'){

                                        $base_search = $search;
                                            $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                            //Hs code Url
                                            $hs_code_url =   route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                            //dd($type, $role,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);
                                            //Country Url
                                            $country_url  = route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$filterby,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby1,'filter'=>$filterdata,'filterby1'=>$filterby2,'filterdata' => $filterdata1,'filterdata1' => $country??'Default']);

                                        //Port Url
                                            $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);

                                    //$country_url = route('searchfiltertwo', ['type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                    }
                                }else if(count($arg)==12){ //old args 11
                                    $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                        // dd($type, $role,$search,$searchDetails1,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);
                                    if($filterby2 == 'hs_code'){
                                        //Hs_code
                                        $hs_code_url = route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                        //Country Url
                                        $country_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->DESTINATION_COUNTRY]);
                                        //Port Url
                                        $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                    }else if($filterby2 == 'country'){
                                    //HS_code Url
                                            $filterdata = str_ireplace(" ", "-", $filterdata);
                                            $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                                        //Hs_code
                                        //dd($type, $role,$search,$searchDetails1,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);

                                        $hs_code_url  = route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$res_hs_code,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                        //Country url
                                        $country_url  =route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                        //Port Url
                                        $port_url  =route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);


                                    }else if($filterby2 == 'unloading_port'){
                                            $filterdata = str_ireplace(" ", "-", $filterdata);
                                            $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                                        //Hs_code
                                        //dd($type, $role,$search,$searchDetails1,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);

                                        $hs_code_url  = route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$res_hs_code,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                        //Country url
                                        $country_url  =route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                        //Port Url
                                        $port_url  =route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);

                                        }
                                    }
                                else{
                                        $country_url = route('search-filter-two', ['section_type' => $section_type, 'country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                    }
                            }

                        @endphp
                    @endforeach
                @endif
       @endif

    <section class="container-fluid bg-bluish">
        <div class="container pdt-2 pdb-2">
            @php
                // Initialize the variables before rendering the divs

                $Unloading_port_url = $port_url ?? '';
                $search = $search??"null";
                $search_country = $search_country??"null";
                $base_search = $base_search??'null';
                $all_numeric = $all_numeric??"not null";
                $filteby1 = $filterby1??"null";
                $filterby2 = $filterby2??"null";
                $searchDetails1 = $searchDetails1??"null"
            @endphp

            <div class="row">
                {{-- HS CODE --}}
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="filter-card">
                        <div class="head">
                            <h2 class="fs-4 mb-0" style="font-weight: 300;">
                                HS Code
                            </h2>
                        </div>
                        <div class="filter-list tree-view">
                                <ul>
                                    @php
                                        $Fresult = $result;
                                        $groupedData = [];

                                        // Loop through each result to create URLs and group HS codes
                                        foreach ($Fresult as $item) {
                                            $hsCode = $item->HS_CODE;
                                            $twoDigit = substr($hsCode, 0, 2);
                                            $sixDigit = substr($hsCode, 0, 6);
                                            $eightDigit = $hsCode;
                                            $country = $role == "import"?$item->ORIGIN_COUNTRY:$item->DESTINATION_COUNTRY;
                                            // Organizing the data into a nested array structure and count 8-digit occurrences
                                            if (!isset($groupedData[$twoDigit])) {
                                                $groupedData[$twoDigit] = [];
                                            }
                                            if (!isset($groupedData[$twoDigit][$sixDigit])) {
                                                $groupedData[$twoDigit][$sixDigit] = [];
                                            }
                                            // Count the occurrences of the 8-digit HS codes
                                            if (!isset($groupedData[$twoDigit][$sixDigit][$eightDigit])) {
                                                $groupedData[$twoDigit][$sixDigit][$eightDigit] = 0;
                                            }
                                            $groupedData[$twoDigit][$sixDigit][$eightDigit]++;
                                        }

                                        // Sort the grouped data based on the count at each level
                                        foreach ($groupedData as $twoDigit => &$sixDigitGroup) {
                                            // Sort six-digit groups by the total number of eight-digit codes
                                            uasort($sixDigitGroup, function ($a, $b) {
                                                return array_sum($b) - array_sum($a);
                                            });
                                            // Sort Eight digit code
                                            foreach($sixDigitGroup  as &$eightDigitGroup){
                                                arsort($eightDigitGroup);
                                            }
                                        }

                                        // Sort two-digit groups by the total number of HS codes in each group
                                        uasort($groupedData, function ($a, $b) {
                                            return array_sum(array_map('array_sum', $b)) - array_sum(array_map('array_sum', $a));
                                        });
                                    @endphp
                                    @include('frontend.livedata.filterOneLinks')

                                    @if(!empty($groupedData))
                                        @foreach($groupedData as $twoDigit => $sixDigitGroup)
                                            <li>
                                                <span onclick="toggleNested('two-{{ $twoDigit }}', this)" style="cursor: pointer;">
                                                    <i class="fa-regular fa-square-plus fa-lg me-2" style="color: #0d6efd;"></i>
                                                    <i class="fa-regular fa-square-minus fa-lg me-2" style="color: #0d6efd; display:none;"></i>
                                                </span>
                                                <a href="{{ generateUrl($twoDigit, $args,$arg, $section_type, $search_country,$country, $type, $role, $filterby, $filterby2??"null", $filterdata, $searchDetails1,$unloading_port, $search, $filterby1??"null", $filterdata1,$all_numeric) }}" class="fs-5 fw-normal">
                                                    {{ $twoDigit }} ({{ array_sum(array_map('array_sum', $sixDigitGroup)) }})
                                                </a>
                                                    <hr style="margin: 8px;">
                                                <ul id="two-{{ $twoDigit }}" style="display:none;padding-left: 18px;">
                                                    @foreach($sixDigitGroup as $sixDigit => $eightDigitGroup)
                                                        <li>
                                                            <span class="toggler" onclick="toggleNested('six-{{ $sixDigit }}', this)" style="cursor: pointer;">
                                                                <i class="fa-regular fa-square-plus fa-lg me-2" style="color: #0d6efd;"></i>
                                                                <i class="fa-regular fa-square-minus fa-lg me-2" style="color: #0d6efd; display:none;"></i>
                                                            </span>
                                                            <a href="{{ generateUrl($sixDigit, $args,$arg, $section_type, $search_country,$country, $type, $role, $filterby, $filterby2??"null", $filterdata,$searchDetails1, $unloading_port, $search, $filterby1??"null", $filterdata1,$all_numeric,$section_type) }}" class="fs-5 fw-normal">
                                                                {{ $sixDigit }} ({{ array_sum($eightDigitGroup) }})
                                                            </a>
                                                                <hr style="margin: 8px;">
                                                            <ul id="six-{{ $sixDigit }}" style="display:none;padding-left: 24px;">
                                                                @foreach($eightDigitGroup as $hsCode => $count)
                                                                    <li>
                                                                        <a href="{{ generateUrl($hsCode, $args,$arg, $section_type, $search_country,$country, $type, $role, $filterby,$filterby2??"null", $filterdata,$searchDetails1, $unloading_port, $search, $filterby1??"null", $filterdata1,$all_numeric,$section_type) }}" class="fs-5 fw-normal">
                                                                            {{ $hsCode }} ({{ $count }})
                                                                        </a>
                                                                            <hr style="margin: 8px;">
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                    @else
                                        <li>No HS codes found.</li>
                                    @endif
                                </ul>
                        </div>
                    </div>
                </div>


                {{-- Origin Country --}}
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="filter-card">
                        <div class="head">
                            <h2 class="fs-4 mb-0" style="font-weight: 300;">
                                Origin Country
                            </h2>
                        </div>
                        <div class="filter-list tree-view">
                            <ul>
                                @php
                                    $Fresult = $result;
                                    $iteration = 0;

                                    // Initialize an array to hold unique origin countries
                                    $uniqueCountries = [];
                                    $countryCounts = [];
                                    // Loop through each result to collect unique origin countries
                                    foreach ($Fresult as $item) {
                                        $result_country = $role == "import"?$item->ORIGIN_COUNTRY:$item->DESTINATION_COUNTRY;
                                        if(isset($countryCounts[$result_country])){
                                            $countryCounts[$result_country]++;
                                        }else{
                                            $countryCounts[$result_country] = 1;
                                        }
                                        // Only add unique countries
                                        arsort($countryCounts);
                                    }
                                @endphp
                                @include('frontend.livedata.filterOneCountryLinks')

                                @if(isset($countryCounts) && count($countryCounts) > 0)
                                    @foreach ($countryCounts as $res_country=>$counts)
                                        @php
                                            // Ensure that both $country and $origin_country are handled separately and not overwritten
                                            $formatted_country = str_ireplace(" ", "-", $res_country); // For $country variable

                                        @endphp

                                        <li class="mb-2">
                                            <a href="{{generateCountryUrl($all_numeric, $args, $section_type, $search_country, $formatted_country, $type, $role, $filterby, $filterby1??"null", $filterby2, $filterdata, $filterdata1, $search, $searchDetails1, $unloading_port, $Dresult) }}" class="fs-5" style="font-weight: 400;">
                                                {{ $formatted_country }}({{$counts}})

                                            </a>
                                            <hr style="margin: 8px;">
                                        </li>
                                    @endforeach
                                @else
                                    <li>No origin countries found.</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Unloading Port --}}
                @if ($section_type != 'stat-data')
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="filter-card">
                            <div class="head">
                                <h2 class="fs-4 mb-0" style="font-weight: 300;">
                                    Unloading Port
                                </h2>
                            </div>
                            <div class="filter-list tree-view">
                                <ul>
                                    @php
                                        $Fresult = $result;
                                        $iteration = 0;
                                            // Initialize an array to hold unique unloading ports
                                            $uniquePorts = [];
                                            $unloadingPortsCount = [];
                                            // Loop through each result to collect unique unloading ports
                                            foreach ($Fresult as $item) {
                                                $country = $role == "import"?$item->ORIGIN_COUNTRY:$item->DESTINATION_COUNTRY;
                                                $unloading_port = $item->UNLOADING_PORT??"null";
                                                if(isset($unloadingPortsCount[$unloading_port])){
                                                    $unloadingPortsCount[$unloading_port]++;
                                                }else{
                                                    $unloadingPortsCount[$unloading_port] = 1;
                                                }
                                                // Only add unique unloading ports
                                                arsort($unloadingPortsCount);
                                            }
                                    @endphp
                                    @include('frontend.livedata.filterOnePortLinks')

                                    @if(isset($unloadingPortsCount) && count($unloadingPortsCount) > 0)
                                        @foreach ($unloadingPortsCount as $unloading_port=>$count)
                                            @php
                                                // Replace spaces with dashes for the URL
                                                $formatted_port = str_ireplace(" ", "-", $unloading_port);
                                            @endphp

                                            <li class="mb-2">
                                                <a href="{{$port_url = generatePortUrl($all_numeric, $args, $section_type, $filterby??"null", $filterby1??"null", $filterby2??"null", $search_country??"null", $type, $role, $search??"null", $base_search??'null', $searfilterdata??"null", $unloading_port, $country, $filterdata, $filterdata1, $searchDetails1??"null");}}" class="fs-5" style="font-weight: 400;">
                                                    {{ $unloading_port }}({{$count}})
                                                    <hr style="margin: 8px;">
                                                </a>
                                            </li>
                                        @endforeach
                                    @else
                                        <li>No unloading ports found.</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
