@php
    $desc = trim($desc, '"');
    # code...
    $base_search = ($hs_code === null) ? $desc : $hs_code;
    $isNumeric = is_numeric($base_search);
    $base_desc = $base_search;
    $search = $isNumeric ? 'hs_code' : 'product';
    if ($hs_code !== null && $desc !== null) {
        # code...
        $product = 'product';
        $hscode = 'hs_code';
    }
@endphp
@if ($role =='import')
    <!--desktop view-->
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
                            <h4 class="fw-semibold text-start">Unloading Port</h4>
                            </th>
                            <th class="table-primary p-3">
                                <h4 class="fw-semibold text-start">QTY.</h4>
                            </th>
                            <th class="table-primary p-3">
                                <h4 class="fw-semibold text-start">Unit</h4>
                            </th>
                            <th class="table-primary p-3">
                                <h4 class="fw-semibold text-start">Value($)</h4>
                            </th>
                            <th class="table-primary p-3">
                                <h4 class="fw-semibold text-start">Importer Name</h4>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $Dresult = $result;
                                $hsCodeCounts = [];
                                $hsCodeData = [];

                                foreach ($Dresult as $item) {
                                    $res_hs_code = $item->HS_CODE ?? 'null';

                                    // Count HS_CODE occurrences
                                    if (!isset($hsCodeCounts[$res_hs_code])) {
                                        $hsCodeCounts[$res_hs_code] = 0;
                                    }
                                    $hsCodeCounts[$res_hs_code]++;

                                    // Store the first occurrence of each HS_CODE
                                    if (!isset($hsCodeData[$res_hs_code])) {
                                        $hsCodeData[$res_hs_code] = $item;
                                    }
                                }

                                // Sort HS_CODEs by occurrence (highest first)
                                arsort($hsCodeCounts);
                            $iteration = 0;
                        @endphp

                        @if(count($hsCodeCounts) > 0)
                            @foreach ($hsCodeCounts as $count_hs_code => $count)
                                @php
                                    $Dresult = $hsCodeData[$count_hs_code];  // Get the first record for each HS_CODE
                                @endphp

                                @php
                                    $iteration++;
                                    $res_hs_code = $Dresult->HS_CODE;
                                    $origin_country = $Dresult->ORIGIN_COUNTRY;
                                    $unloading_port  = $Dresult->UNLOADING_PORT;
                                    //dd('In this Group',$hs_code);

                                    // dd($section_type);

                                    if ($hs_code && $desc && $hs_code !== ' ' && $desc !== ' ') {
                                        //dd("inn this block",$search,$base_desc);
                                        # code...
                                        $hs_code_url = route('search-filter', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'search'=>$product,'base_search' => $desc, 'filterby' => 'hs_code', 'filterdata' => $res_hs_code??"null"]);

                                    }elseif($desc!==' ' && $desc !== null) {
                                        # code...
                                        // dd("in this desc block",$base_desc);
                                        $hs_code_url = route('search-filter', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_desc, 'filterby' => 'hs_code', 'filterdata' => $res_hs_code??"null"]);
                                        // dd($hs_code_url);
                                    } elseif ($hs_code!==' ' && $hs_code!==null) {
                                        # code...
                                        //dd('In hs_code group');
                                        $hs_code_url = route('hs-code', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'filterby' => 'hs_code', 'filterdata' => $res_hs_code]);
                                    }
                                    // Country URl
                                    if ($hs_code && $desc && $hs_code !== ' ' && $desc !== ' ') {
                                        # code...
                                        $country = str_ireplace(" ", "-", $country);

                                        $country_url =  route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'filterby2' => 'country','filterby'=>$product,'filter'=>$desc,'filterby1'=>$hscode,'filterdata' => $res_hs_code, 'filterdata1' => $origin_country??"null"]);
                                    } elseif ($hs_code!==' ' && $hs_code!==null) {
                                        # code...
                                        $country_url = route('search-filter', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_hs_code, 'filterby' => 'country', 'filterdata' => $origin_country??"null"]);
                                    } elseif ($desc!==' ' && $desc !== null) {
                                        # code...
                                        $country = str_ireplace(" ", "-", $country);

                                        $country_url = route('search-filter', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_desc??"null", 'filterby' => 'country', 'filterdata' => $origin_country??"null"]);
                                    }
                                    // Port Url
                                    // Port Url
                                    if ($hs_code && $desc && $hs_code !== ' ' && $desc !== ' ') {
                                        # code...
                                        $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                        $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$product,'filter'=>$desc,'filterby1'=>$hscode,'filterdata' => $hs_code ,'filterdata1' => $unloading_port??'default']);
                                    }
                                    elseif ($hs_code!==' ' && $hs_code!==null) {
                                        # code...
                                        $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                        $port_url = route('search-filter', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_hs_code, 'filterby' => 'port', 'filterdata' => $unloading_port]);
                                    } elseif($desc!==' ' && $desc !== null) {
                                        # code...
                                        $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                        $port_url = route('search-filter', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_desc, 'filterby' => 'port', 'filterdata' => $unloading_port]);
                                    }
                                @endphp
                                <tr>
                                    <td class="fw-normal text-gray p-3">
                                        {{$Dresult->Date}}
                                    </td>
                                    <td class="fw-normal text-gray p-3">
                                        <a href="{{ $hs_code_url }}">
                                            {{-- {{ $result->HS_CODE }} --}}
                                            @foreach (explode(',', $Dresult->HS_CODE) as $code)
                                                <div>{{ $code }}</div>
                                            @endforeach
                                        </a>
                                    </td>
                                    <td class="fw-normal text-gray p-3">
                                        <p class="line-clamp-7">
                                            {{$Dresult->PRODUCT_DESCRIPTION}}
                                        </p>
                                    </td>
                                    <td class="fw-normal text-gray p-3">
                                        <a href="{{ $country_url }}">
                                            {{$Dresult->ORIGIN_COUNTRY}}
                                        </a>
                                    </td>
                                    <td class="fw-normal text-gray p-3">
                                        <a href="{{ $port_url }}">
                                            {{$Dresult->UNLOADING_PORT}}
                                        </a>
                                    </td>
                                    <td class="fw-normal text-gray p-3">
                                        {{$Dresult->Quantity}}
                                    </td>
                                    <td class="fw-normal text-gray p-3">
                                        {{$Dresult->Unit_of_measure}}
                                    </td>
                                    <td class="fw-normal text-gray p-3">
                                        {{$Dresult->US_CIF}}
                                    </td>
                                    <td class="fw-normal text-gray p-3">
                                        <a href="#" id="importer-name-link">
                                            Importer Name
                                        </a>
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

            <!--Pagination-->
            @include('frontend.livedata.pagination')
        </div>
    </section>

    <!--Mobile view-->
    <section class="container-fluid bg-bluish mobile-view">
        <div class="container pdt-2 pdb-2">
            @php
                $Mresult = $result;
                $iteration = 0;
            @endphp

            @if(isset($Mresult) && $Mresult->count() > 0)
                @foreach ($Mresult as $Mresult)
                    @php
                        $iteration++;
                        $res_hs_code = $Mresult->HS_CODE;
                        $origin_country = $Mresult->ORIGIN_COUNTRY;
                        $unloading_port  = $Mresult->UNLOADING_PORT;
                        //dd('In this Group',$country);
                        // Hs code Url
                        if ($hs_code) {
                            # code...
                            $hs_code_url = route('hs-code', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'filterby' => 'hs_code', 'filterdata' => $res_hs_code]);
                        } else {
                            # code...
                            $hs_code_url = route('search-filter', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_desc, 'filterby' => 'hs_code', 'filterdata' => $res_hs_code??"null"]);
                        }
                        // Country URl
                        if ($hs_code) {
                            # code...
                            $country_url = route('search-filter', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_hs_code, 'filterby' => 'country', 'filterdata' => $origin_country??"null"]);
                        } else {
                            # code...
                            $country = str_ireplace(" ", "-", $country);
                            $country_url = route('search-filter', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_desc, 'filterby' => 'country', 'filterdata' => $origin_country??"null"]);
                        }
                        // Port Url
                        if ($hs_code) {
                            # code...
                            $unloading_port = str_ireplace(" ", "-", $unloading_port);
                            $port_url = route('search-filter', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_hs_code, 'filterby' => 'port', 'filterdata' => $unloading_port]);
                        } else {
                            # code...
                            $unloading_port = str_ireplace(" ", "-", $unloading_port);
                            $port_url = route('search-filter', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_desc, 'filterby' => 'port', 'filterdata' => $unloading_port]);
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
                                    {{$Mresult->Date}}
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
                                        {{$Mresult->UNLOADING_PORT}}
                                    </p>
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <h2 class="fs-4 fw-normal">QTY</h2>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <p class="fs-6 fw-light p-2">
                                    {{$Mresult->Quantity}}
                                </p>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <h2 class="fs-4 fw-normal">Unit</h2>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <p class="fs-6 fw-light p-2">
                                    {{$Mresult->Unit_of_measure}}
                                </p>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <h2 class="fs-4 fw-normal">Value($)</h2>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <p class="fs-6 fw-light p-2">
                                    {{$Mresult->US_CIF}}
                                </p>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <h2 class="fs-4 fw-normal">Importer Name</h2>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <a href="#" id="importer-name-link">
                                    <p class="fs-6 fw-light p-2">
                                        Importer Name
                                    </p>
                                </a>
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

@elseif ($role == 'export')
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
                                <h4 class="fw-semibold text-start">Destination Country</h4>
                            </th>
                            <th class="table-primary p-3">
                                <h4 class="fw-semibold text-start">Unloading Port</h4>
                            </th>
                            <th class="table-primary p-3">
                                <h4 class="fw-semibold text-start">QTY.</h4>
                            </th>
                            <th class="table-primary p-3">
                                <h4 class="fw-semibold text-start">Unit</h4>
                            </th>
                            <th class="table-primary p-3">
                                <h4 class="fw-semibold text-start">Value($)</h4>
                            </th>
                            <th class="table-primary p-3">
                                <h4 class="fw-semibold text-start">Expoter Name</h4>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                            @php
                                $Dresult = $exportresult;
                                $hsCodeCounts = [];
                                $hsCodeData = [];

                                foreach ($Dresult as $item) {
                                    $res_hs_code = $item->HS_CODE ?? 'null';

                                    // Count HS_CODE occurrences
                                    if (!isset($hsCodeCounts[$res_hs_code])) {
                                        $hsCodeCounts[$res_hs_code] = 0;
                                    }
                                    $hsCodeCounts[$res_hs_code]++;

                                    // Store the first occurrence of each HS_CODE
                                    if (!isset($hsCodeData[$res_hs_code])) {
                                        $hsCodeData[$res_hs_code] = $item;
                                    }
                                }

                                // Sort HS_CODEs by occurrence (highest first)
                                arsort($hsCodeCounts);
                                $iteration = 0;
                            @endphp

                            @if(count($hsCodeCounts) > 0)
                                @foreach ($hsCodeCounts as $count_hs_code => $count)
                                    @php
                                        $Dresult = $hsCodeData[$count_hs_code];  // Get the first record for each HS_CODE
                                    @endphp
                                    @php
                                        $iteration++;
                                        $res_hs_code = $Dresult->HS_CODE;
                                        $destination_country = $Dresult->DESTINATION_COUNTRY;
                                        $unloading_port  = $Dresult->UNLOADING_PORT;
                                        // dd($hs_code,$section_type);
                                        if ($hs_code && $desc && $hs_code !== ' ' && $desc !== ' ') {
                                            //dd("inn this block",$search,$base_desc);
                                            # code...
                                            $hs_code_url = route('search-filter', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'search'=>$product,'base_search' => $desc, 'filterby' => 'hs_code', 'filterdata' => $res_hs_code??"null"]);

                                        }elseif($desc!==' ' && $desc !== null){
                                            # code...
                                            //dd("inn this desc block",$base_desc);
                                            $hs_code_url = route('search-filter', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_desc, 'filterby' => 'hs_code', 'filterdata' => $res_hs_code??"null"]);
                                        } elseif ($hs_code!==' ' && $hs_code!==null) {
                                            # code...
                                            //dd('In hs_code group');
                                            $hs_code_url = route('hs-code', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'filterby' => 'hs_code', 'filterdata' => $res_hs_code]);
                                        }
                                        // Country URl
                                        if ($hs_code && $desc && $hs_code !== ' ' && $desc !== ' ') {
                                            # code...
                                            $country = str_ireplace(" ", "-", $country);

                                            $country_url =  route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'filterby2' => 'country','filterby'=>$product,'filter'=>$desc,'filterby1'=>$hscode,'filterdata' => $res_hs_code, 'filterdata1' => $destination_country]);
                                        } elseif ($hs_code!==' ' && $hs_code!==null) {
                                            # code...
                                            $country_url = route('search-filter', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_hs_code, 'filterby' => 'country', 'filterdata' => $destination_country]);
                                        } elseif ($desc!==' ' && $desc !== null) {
                                            # code...
                                            $country = str_ireplace(" ", "-", $country);

                                            $country_url = route('search-filter', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_desc??"null", 'filterby' => 'country', 'filterdata' => $destination_country??"null"]);
                                        }
                                        // Port Url
                                        // Port Url
                                        if ($hs_code && $desc && $hs_code !== ' ' && $desc !== ' ') {
                                            # code...
                                            $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                            $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$product,'filter'=>$desc,'filterby1'=>$hscode,'filterdata' => $hs_code ,'filterdata1' => $unloading_port??'default']);
                                        }
                                        elseif ($hs_code!==' ' && $hs_code!==null) {
                                            # code...
                                            $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                            $port_url = route('search-filter', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_hs_code, 'filterby' => 'port', 'filterdata' => $unloading_port]);
                                        } elseif($desc!==' ' && $desc !== null) {
                                            # code...
                                            $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                            $port_url = route('search-filter', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_desc, 'filterby' => 'port', 'filterdata' => $unloading_port]);
                                        }

                                    @endphp
                                    <tr>
                                        <td class="fw-normal text-gray p-3">
                                            {{date('F j, Y', strtotime($Dresult->Date))  }}
                                        </td>
                                        <td class="fw-normal text-gray p-3">
                                            <a href="{{ $hs_code_url }}">
                                                {{-- {{ $result->HS_CODE }} --}}
                                                @foreach (explode(',', $Dresult->HS_CODE) as $code)
                                                    <div>{{ $code }}</div>
                                                @endforeach
                                            </a>
                                        </td>
                                        <td class="fw-normaltext-gray p-3">
                                            <p class="line-clamp-7">
                                                {{$Dresult->PRODUCT_DESCRIPTION}}
                                            </p>
                                        </td>
                                        <td class="fw-normal text-gray p-3">
                                            <a href="{{ $country_url }}">
                                                {{$Dresult->DESTINATION_COUNTRY}}
                                            </a>
                                        </td>
                                        <td class="fw-normal text-gray p-3">
                                            <a href="{{ $port_url }}">
                                                {{$Dresult->UNLOADING_PORT}}
                                            </a>
                                        </td>
                                        <td class="fw-normal text-gray p-3">
                                            {{$Dresult->Quantity}}
                                        </td>
                                        <td class="fw-normal text-gray p-3">
                                            {{$Dresult->Unit_of_measure}}
                                        </td>
                                        <td class="fw-normal text-gray p-3">
                                            {{$Dresult->US_FOB}}
                                        </td>
                                        <td class="fw-normal text-gray p-3">
                                            <a href="#" id="importer-name-link">
                                                Exporter Name
                                            </a>
                                        </td>
                                    </tr>
                                @if ($iteration==10)
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

            <!--Pagination-->
            @include('frontend.livedata.pagination')
        </div>
    </section>

    <!--Mobile view-->
    <section class="container-fluid bg-bluish mobile-view">
        <div class="container pdt-2 pdb-2">
            @php
                $Mresult = $result;
                $iteration = 0;
            @endphp

            @if(isset($Mresult) && $Mresult->count() > 0)
                @foreach ($Mresult as $Mresult)
                    @php
                        $iteration++;
                        $res_hs_code = $Mresult->HS_CODE;
                        $origin_country = $Mresult->ORIGIN_COUNTRY;
                        $unloading_port  = $Mresult->UNLOADING_PORT;
                        //dd('In this Group',$country);
                        // Hs code Url
                        if ($hs_code) {
                            # code...
                            $hs_code_url = route('hs-code', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'filterby' => 'hs_code', 'filterdata' => $res_hs_code]);
                        } else {
                            # code...
                            $hs_code_url = route('search-filter', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_desc, 'filterby' => 'hs_code', 'filterdata' => $res_hs_code??"null"]);
                        }
                        // Country URl
                        if ($hs_code) {
                            # code...
                            $country_url = route('search-filter', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_hs_code, 'filterby' => 'country', 'filterdata' => $origin_country??"null"]);
                        } else {
                            # code...
                            $country = str_ireplace(" ", "-", $country);
                            $country_url = route('search-filter', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_desc, 'filterby' => 'country', 'filterdata' => $origin_country??"null"]);
                        }
                        // Port Url
                        if ($hs_code) {
                            # code...
                            $unloading_port = str_ireplace(" ", "-", $unloading_port);
                            $port_url = route('search-filter', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_hs_code, 'filterby' => 'port', 'filterdata' => $unloading_port]);
                        } else {
                            # code...
                            $unloading_port = str_ireplace(" ", "-", $unloading_port);
                            $port_url = route('search-filter', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_desc, 'filterby' => 'port', 'filterdata' => $unloading_port]);
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
                                    {{$Mresult->Date}}
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
                                        {{$Mresult->DESTINATION_COUNTRY}}
                                    </p>
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <h2 class="fs-4 fw-normal">Unloading Port</h2>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <a href="{{ $port_url }}" class="fs-5 fw-light">
                                    <p class="fs-6 fw-light p-3">
                                        {{$Mresult->UNLOADING_PORT}}
                                    </p>
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <h2 class="fs-4 fw-normal">QTY</h2>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <p class="fs-6 fw-light p-2">
                                    {{$Mresult->Quantity}}
                                </p>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <h2 class="fs-4 fw-normal">Unit</h2>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <p class="fs-6 fw-light p-2">
                                    {{$Mresult->Unit_of_measure}}
                                </p>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <h2 class="fs-4 fw-normal">Value($)</h2>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <p class="fs-6 fw-light p-2">
                                    {{$Mresult->US_FOB}}
                                </p>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <h2 class="fs-4 fw-normal">Importer Name</h2>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <a href="#" id="importer-name-link">
                                    <p class="fs-6 fw-light p-2">
                                        Importer Name
                                    </p>
                                </a>
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
@endif

@include('frontend.livedata.filter')
