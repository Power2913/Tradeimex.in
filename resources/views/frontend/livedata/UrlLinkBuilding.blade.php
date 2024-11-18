@php
    if($role == 'import'){
        $iteration++;
        $res_hs_code = $Dresult->HS_CODE;
        $origin_country = $Dresult->ORIGIN_COUNTRY;
        $unloading_port = $Dresult->UNLOADING_PORT;
        $origin_country = str_ireplace(' ','-',$Dresult->ORIGIN_COUNTRY);
        $unloading_port = str_ireplace(' ','-',$Dresult->UNLOADING_PORT);

        //dd('In this Group',$hs_code);
        if ($hs_code && $desc && $hs_code !== ' ' && $desc !== ' ') {
             //dd("inn this block",$search,$base_desc);
            # code...
            $hs_code_url = route('search-filter', ['country'=>$country,'type' => $type, 'role' => $role,'search'=>$product,'base_search' => $desc, 'filterby' => 'hs_code', 'filterdata' => $res_hs_code??"null"]);

        }elseif($desc!==' ' && $desc !== null){
            # code...
            //dd("inn this desc block",$base_desc);
            $hs_code_url = route('search-filter', ['country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_desc, 'filterby' => 'hs_code', 'filterdata' => $res_hs_code??"null"]);
             //dd("inn this block",$search,$base_desc,$hs_code_url);
        } elseif ($hs_code!==' ' && $hs_code!==null) {
            # code...
            //dd('In hs_code group');
            $hs_code_url = route('hs-code', ['country'=>$country,'type' => $type, 'role' => $role,'filterby' => 'hs_code', 'filterdata' => $res_hs_code]);
        }
        // Country URl
        if ($hs_code && $desc && $hs_code !== ' ' && $desc !== ' ') {
            # code...
            $country = str_ireplace(" ", "-", $country);

            $country_url =  route('searchfiltertwo', ['country'=>$country,'type' => $type, 'role' => $role,'filterby2' => 'country','filterby'=>$product,'filter'=>$desc,'filterby1'=>$hscode,'filterdata' => $res_hs_code, 'filterdata1' => $origin_country??"null"]);
        } elseif ($hs_code!==' ' && $hs_code!==null) {
            # code...
            $country_url = route('search-filter', ['country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_hs_code, 'filterby' => 'country', 'filterdata' => $origin_country??"null"]);
        } elseif ($desc!==' ' && $desc !== null) {
            # code...
            $country = str_ireplace(" ", "-", $country);

            $country_url = route('search-filter', ['country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_desc??"null", 'filterby' => 'country', 'filterdata' => $origin_country??"null"]);
        }
        // Port Url
        // Port Url
        if ($hs_code && $desc && $hs_code !== ' ' && $desc !== ' ') {
            # code...
            $unloading_port = str_ireplace(" ", "-", $unloading_port);
            $port_url = route('searchfiltertwo', ['country'=>$country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$product,'filter'=>$desc,'filterby1'=>$hscode,'filterdata' => $hs_code ,'filterdata1' => $unloading_port??'default']);
        }
        elseif ($hs_code!==' ' && $hs_code!==null) {
            # code...
            $unloading_port = str_ireplace(" ", "-", $unloading_port);
            $port_url = route('search-filter', ['country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_hs_code, 'filterby' => 'port', 'filterdata' => $unloading_port]);
        } elseif($desc!==' ' && $desc !== null) {
            # code...
            $unloading_port = str_ireplace(" ", "-", $unloading_port);
            $port_url = route('search-filter', ['country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_desc, 'filterby' => 'port', 'filterdata' => $unloading_port]);
        }

    }elseif($role == 'export'){

    }
@endphp
