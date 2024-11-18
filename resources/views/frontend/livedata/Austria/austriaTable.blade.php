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
                                    $origin_country = $Dresult->ORIGIN_COUNTRY;
                                    $unloading_port  = $Dresult->UNLOADING_PORT??'null';
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
                                        <a href="{{$country_url}}">
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
                        $origin_country = $Mresult->ORIGIN_COUNTRY;
                        $unloading_port  = $Mresult->UNLOADING_PORT??'null';
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
        <div class="pdt-2 pdb-2">
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
                                    <td class="fw-bolder text-center text-gray">
                                        {{$result->MONTH}}
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
@include('frontend.livedata.filter')
