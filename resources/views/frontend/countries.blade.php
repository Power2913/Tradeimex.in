<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="google-site-verification" content="kevV-HFG1JijHyuKnnkIeN6dY_Hb-ueXuqoUv-pPWUU" />
        <meta name="ahrefs-site-verification" content="167ef56daf7b5a6af88ecea027be9df8f7a528cfe6be55f3f794a32094b792f2">
        @foreach ($countrydata as $country)
            <meta name="keywords" content="{{$country->mf_content_metakeywords}}" />
            <meta name="description" content="{{$country->mf_content_metadescription}}" />
        @endforeach
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
        <title>
            @foreach ($countrydata as $country)
                {{$country->mf_content_metatitle}}
            @endforeach
        </title>

        <link rel="icon" type="image/x-icon" href="public/frontend/image/img/Favicon Logo.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        @include('frontend.link')
        <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
        <style>
            #bl-sample{
                display: none;
            }
        </style>
    </head>
    <body>
        @include('frontend.header')
        <!-- Breadcrumb & Import/Export Button -->
        <div class="container-fluid bg-bluish pdt-2">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-bluish">
                                <li class="breadcrumb-item">
                                    <a class="text-hover" href="/">Home</a>
                                </li>
                                <!-- Continent Name -->
                                <li class="breadcrumb-item" aria-current="page">



                                    @foreach ($continentData as $continent)

                                    @php
                                        $cntnt_id = $continent->continent_code;
                                    @endphp


                                @endforeach

                                @foreach ($countrydata as $country)
                                    @if (\Illuminate\Support\Str::before($country->country_code, '-') == 'TAS')
                                        <a href="/asia-trade-data" class="text-hover">Asia Trade Data</a>
                                    @endif
                                    @if (\Illuminate\Support\Str::before($country->country_code, '-') == 'TNA')
                                     <a href="/north-america-trade-data" class="text-hover">North America Trade Data</a>
                                    @endif
                                    @if (\Illuminate\Support\Str::before($country->country_code, '-') == 'TAF')
                                    <a href="/africa-trade-data" class="text-hover">Africa Trade Data</a>
                                    @endif
                                    @if (\Illuminate\Support\Str::before($country->country_code, '-') == 'TEU')
                                    <a href="/europe-trade-data" class="text-hover">Europe Trade Data</a>
                                    @endif
                                    @if (\Illuminate\Support\Str::before($country->country_code, '-') == 'TSA')
                                    <a href="/south-america-trade-data" class="text-hover">South America Trade Data</a>
                                    @endif
                                    @if (\Illuminate\Support\Str::before($country->country_code, '-') == 'TOC')
                                    <a href="/oceania-trade-data" class="text-hover">Oceania Trade Data</a>
                                    @endif
                                @endforeach
                                </li>

                                <!-- Country Name -->
                                <li class="breadcrumb-item active text-capitalize" aria-current="page">
                                    @foreach ($countrydata as $country)
                                      {{$country->country}} {{$country->Datatype}} Data
                                    @endforeach
                                </li>
                            </ol>
                        </nav>
                    </div>
                    {{-- @dd("countrydata",$countrydata) --}}
                    @foreach ($countrydata as $country)
                    <!-- Import Export Button -->
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        @if ($country->country != 'Iraq' && $country->country != 'Kenya')
                            <div class="btn btn-group" style="display: flex;justify-content: end">
                                @if ($country->Datatype == 'import')
                                <a href="{{ route('countryalldata', [strtolower($country->country), 'import']) }}" class="btn btn-primary">
                                    IMPORT
                                </a>
                                <a href="{{ route('countryalldata', [strtolower($country->country), 'export']) }}" class="btn btn-outline">
                                    EXPORT
                                </a>
                                @else
                                <a href="{{ route('countryalldata', [strtolower($country->country), 'import']) }}" class="btn btn-outline">
                                    IMPORT
                                </a>
                                <a href="{{ route('countryalldata', [strtolower($country->country), 'export']) }}" class="btn btn-primary">
                                    EXPORT
                                </a>
                                @endif
                            </div>
                       @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- overview of country -->
        <div class="container-fluid padding-tb bg-bluish slanted-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="text-content">
                            <span>{{$country->country}} {{$country->Datatype}} Statistics</span>
                            <h1 class="gradient-h2" style="font-size: 48px;font-weight: 500;">
                                {{$country->mf_content_heading}}
                            </h1>
                            <p>
                                {!! $country->mf_content_editordata !!}
                            </p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="data-img img-aspect">
                            @if ($country->mf_content_images)
                                @php
                                    // Construct the full image URL using the base URL and the image filename.
                                    $imageURL = asset('https://cms.tradeimex.in/public/frontend/img/import/' . $country->mf_content_images);

                                @endphp
                            @endif
                            @if (!empty($imageURL))
                            <img src="{{ $imageURL }}" alt=" {{$country->mf_content_metatitle}}">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Key Points-->
        <div class="container-fluid pdt-2 pdb-5">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                        <div class="card-content cdh-15">
                            <div class="icon">
                                <img src="public/frontend/image/img/rank.png" width="20%" style="padding: 0px 0px 0px 10px;">
                                {{-- @if ($country->kpimages)
                                    @php
                                        // Construct the full image URL using the base URL and the image filename.
                                        $imageURL = asset('https://cms.tradeimex.in/public/frontend/img/import/' . $country->kpimages);

                                    @endphp
                                @endif
                                @if (!empty($imageURL))
                                <img src="{{ $imageURL }}"  style="width: 100%">
                                @endif --}}
                            </div>
                            <div class="head">
                                <h3>{{$country->kp_head}}</h3>
                            </div>
                            <p>
                                {!!$country->kpeditordata!!}
                            </p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                        <div class="card-content cdh-15">
                            <div class="icon">
                                <img src="public/frontend/image/img/shares.png" width="20%" style="padding: 0px 0px 0px 10px;">
                                {{-- @if ($country->kpimages_two)
                                    @php
                                        // Construct the full image URL using the base URL and the image filename.
                                        $imageURL = asset('https://cms.tradeimex.in/public/frontend/img/import/' . $country->kpimages_two);

                                    @endphp
                                @endif
                                @if (!empty($imageURL))
                                    <img src="{{ $imageURL }}" style="width: 100%">
                                @endif --}}
                            </div>
                            <div class="head">
                                <h3>{{$country->kp_head_two}}</h3>
                            </div>
                            <p>
                                {!!$country->kpeditordata_two!!}
                            </p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                        <div class="card-content cdh-15">
                            <div class="icon">
                                {{-- <img src="public/frontend/image/img/countries.png" width="20%" style="padding: 0px 0px 0px 10px;"> --}}
                                @if ($country->kpimages_three)
                                    @php
                                        // Construct the full image URL using the base URL and the image filename.
                                        $imageURL = asset('https://cms.tradeimex.in/public/frontend/img/import/' . $country->kpimages_three);

                                    @endphp
                                @endif
                                @if (!empty($imageURL))
                                <img src="{{ $imageURL }}" style="width: 20%">
                                @endif
                            </div>
                            <div class="head">
                                <h3>{{$country->kp_head_three}}</h3>
                            </div>
                            <p>
                                {!!$country->kpeditordata_three!!}
                            </p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                        <div class="card-content cdh-15">
                            <div class="icon">
                                {{-- <img src="public/frontend/image/img/products.png" width="20%" style="padding: 0px 0px 0px 10px;"> --}}
                                @if ($country->kpimages_four)
                                    @php
                                        // Construct the full image URL using the base URL and the image filename.
                                        $imageURL = asset('https://cms.tradeimex.in/public/frontend/img/import/' . $country->kpimages_four);
                                    @endphp
                                @endif
                                @if (!empty($imageURL))
                                    <img src="{{ $imageURL }}" style="width: 16%">
                                @endif
                            </div>
                            <div class="head">
                                <h3>{{$country->kp_head_four}}</h3>
                            </div>
                            <p>
                                {!!$country->kpeditordataa_four!!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php
            $customcountry = [
                'Argentina',
                'Brazil',
                'Chile',
                'Colombia',
                'Ecuador',
                'Paraguay',
                'Peru',
                'Uruguay',
                'Venezuela',
                'Panama',
                'US',
            ];
        @endphp
        @foreach($customcountry as $customcountry)
            @if($customcountry == $country->country)
                 {{-- search bar --}}
                <section class="container-fluid bg-green pdt-2 pdb-2">
                    <div class="text-content text-center">
                        <h2 class="fs-2 mb-3">
                            Search live {{$country->country}} Customs {{$country->Datatype}} data
                        </h2>

                        <!--@if($country->Datatype == "import")-->
                        <!--    <p class="fs-6 text-center">-->
                        <!--        Access the latest Ecuador customs import data that keeps you updated with all the live import shipments of Ecuador, with our Ecuador shipment data and Ecuador trade records. Connect with profitable buyers & importers in Ecuador with our frequently updated Importers-Exporters data of Ecuador, search live Ecuador import Data by HS code, country, product, and port.-->
                        <!--    </p>-->
                        <!--@elseif($country->Datatype == "export")-->
                        <!--    <p class="fs-6 text-center">-->
                        <!--        Access the latest Ecuador customs export data that keeps you updated with all the live export shipments of Ecuador, with our Ecuador shipment data and Ecuador trade records. Connect with profitable suppliers & exporters in Ecuador with our frequently updated Importers-Exporters data of Ecuador, search live Ecuador Export Data by HS code, country, product, and port.-->
                        <!--    </p>-->
                        <!--@endif-->


                    </div>
                    <div class="container">
                        <form method="GET" action="{{ route('product.list') }}" enctype="multipart/form-data" id="searchForm">
                            @csrf
                            <div class="flex justify-content-center align-items-center">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group" name="type">
                                    {{-- <input name="type" type="radio" class="btn-check" value="data" id="btnradio1" autocomplete="off" checked>
                                    <label class="btn btn-outline-primary type-btn" for="btnradio1">Data</label> --}}

                                    <input name="type" type="hidden" value="data">

                                    {{-- <input name="type" type="radio" class="btn-check" value="company" id="btnradio2" autocomplete="off">
                                    <label class="btn btn-outline-primary type-btn" for="btnradio2">Company</label> --}}
                                </div>
                            </div>

                            <div class="row bg-white" style="border-radius: 1rem;">
                                <div class="search-bar searchbox col-sm-2 col-md-2 col-lg-2">
                                    <!-- Search Bar -->
                                    <div id="country-select" class="search-bar" style="display: flex;align-items: center;">
                                        <span>
                                            <!-- Load country and flag dynamically from the backend on page load -->
                                            <img class="search_input_img" src="{{ asset('public/frontend/image/flags/' . strtolower($country->country) . '_rectangular_icon_with_shadow_64.png') }}" alt="{{ $country->country }} Flag">
                                            {{ $country->country }}
                                        </span>
                                    </div>

                                    <!-- Hidden inputs to store the selected country and section type -->
                                    <input type="hidden" id="selected-country" name="country" value="{{ $country->country }}">
                                    <input type="hidden" id="section_type" name="section_type" value="custom"> <!-- Default section type -->
                                </div>
                                @php
                                    $Datatype = $country->Datatype;
                                @endphp
                                <div class="searchbox col-sm-2 col-md-2 col-lg-2">
                                    <select class="form-control" name="role" style="border: 0px transparent !important;">
                                        @if($Datatype == 'import')
                                            <option class="form-control" selected value={{$Datatype}}>{{Str::title($Datatype)}}</option>
                                            <option class="form-control" value='export'>Export</option>
                                        @elseif($Datatype == 'export')
                                            <option class="form-control" selected value={{$Datatype}}>{{Str::title($Datatype)}}</option>
                                            <option class="form-control" value='import'>Import</option>
                                        @endif
                                    </select>
                                </div>

                                <div class="searchbox col-sm-3 col-md-3 col-lg-3">
                                    <input type="text" placeholder="Description" class="form-control" name="description" id="description">
                                </div>

                                <div class="searchbox col-sm-2 col-md-2 col-lg-2">
                                    <input type="text" placeholder="HS Code" class="form-control" name="hs_code" id="hs_code">
                                </div>
                                <div class="searchbox col-sm-3 col-md-3 col-lg-3">
                                    <button type="submit" class="ybtn ybtn-header-color" style="width: 100%;text-align: center;padding: 18px 0px 18px 0px;">
                                        Search
                                    </button>
                                </div>
                            </div>

                            <input type="hidden" name="section_type" id="section_type" value="">
                        </form>

                        <!-- Mega Menu -->
                        <div class="mega-menu p-4" id="mega-menu">
                            <div class="row">
                                <div class="col-md-12">
                                        <div class="tab">
                                            <button class="tablinks active-1" onmouseover="openCity(event, 'custom')">Custom Data</button>
                                            <button class="tablinks" onmouseover="openCity(event, 'bl')">B/L Data</button>
                                            {{-- <button class="tablinks" onmouseover="openCity(event, 'stat')">Statistics Data</button> --}}
                                        </div>

                                        <!-- Custom -->
                                        <div id="custom" class="tabcontent" style="display: block !important;">
                                            <!-- America -->
                                            <div>
                                                <div class="text-content">
                                                    <h2 class="text-center text-white fs-5 fw-normal">North - America</h2>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4 col-md-3 col-lg-2 Flag" onclick="selectCountry('Panama', 'public/frontend/image/flags/panama_rectangular_icon_with_shadow_64.png', 'custom')">
                                                        <img src="public/frontend/image/flags/panama_rectangular_icon_with_shadow_64.png">
                                                        <br>
                                                        <a class="text-hover custom">
                                                            <h4>Panama</h4>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="text-content">
                                                    <h2 class="text-center text-white fs-5 fw-normal">South - America</h2>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4 col-md-3 col-lg-2 Flag" onclick="selectCountry('Argentina', 'public/frontend/image/flags/argentina_rectangular_icon_with_shadow_64.png', 'custom')">
                                                        <img src="public/frontend/image/flags/argentina_rectangular_icon_with_shadow_64.png">
                                                        <br>
                                                        <a class="text-hover custom">
                                                            <h4>Argentina</h4>
                                                        </a>
                                                    </div>
                                                    <!--<div class="col-sm-4 col-md-3 col-lg-2 Flag" onclick="selectCountry('Brazil', 'public/frontend/image/flags/brazil_rectangular_icon_with_shadow_64.png', 'custom')">-->
                                                    <!--    <img src="public/frontend/image/flags/brazil_rectangular_icon_with_shadow_64.png">-->
                                                    <!--    <br>-->
                                                    <!--    <a class="text-hover custom">-->
                                                    <!--        <h4>Brazil</h4>-->
                                                    <!--    </a>-->
                                                    <!--</div>-->
                                                    <div class="col-sm-4 col-md-3 col-lg-2 Flag" onclick="selectCountry('Chile', 'public/frontend/image/flags/chile_rectangular_icon_with_shadow_64.png', 'custom')">
                                                        <img src="public/frontend/image/flags/chile_rectangular_icon_with_shadow_64.png">
                                                        <br>
                                                        <a class="text-hover custom">
                                                            <h4>Chile</h4>
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-4 col-md-3 col-lg-2 Flag" onclick="selectCountry('Colombia', 'public/frontend/image/flags/colombia_rectangular_icon_with_shadow_64.png', 'custom')">
                                                        <img src="public/frontend/image/flags/colombia_rectangular_icon_with_shadow_64.png">
                                                        <br>
                                                        <a class="text-hover custom">
                                                            <h4>Colombia</h4>
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-4 col-md-3 col-lg-2 Flag" onclick="selectCountry('Ecuador', 'public/frontend/image/flags/ecuador_rectangular_icon_with_shadow_64.png', 'custom')">
                                                        <img src="public/frontend/image/flags/ecuador_rectangular_icon_with_shadow_64.png">
                                                        <br>
                                                        <a class="text-hover custom">
                                                            <h4>Ecuador</h4>
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-4 col-md-3 col-lg-2 Flag" onclick="selectCountry('Paraguay', 'public/frontend/image/flags/paraguay_rectangular_icon_with_shadow_64.png', 'custom')">
                                                        <img src="public/frontend/image/flags/paraguay_rectangular_icon_with_shadow_64.png">
                                                        <br>
                                                        <a class="text-hover custom">
                                                            <h4>Paraguay</h4>
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-4 col-md-3 col-lg-2 Flag" onclick="selectCountry('Peru', 'public/frontend/image/flags/peru_rectangular_icon_with_shadow_64.png', 'custom')">
                                                        <img src="public/frontend/image/flags/peru_rectangular_icon_with_shadow_64.png">
                                                        <br>
                                                        <a class="text-hover custom">
                                                            <h4>Peru</h4>
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-4 col-md-3 col-lg-2 Flag" onclick="selectCountry('Uruguay', 'public/frontend/image/flags/uruguay_rectangular_icon_with_shadow_64.png', 'custom')">
                                                        <img src="public/frontend/image/flags/uruguay_rectangular_icon_with_shadow_64.png">
                                                        <br>
                                                        <a class="text-hover custom">
                                                            <h4>Uruguay</h4>
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-4 col-md-3 col-lg-2 Flag" onclick="selectCountry('Venezuela', 'public/frontend/image/flags/venezuela_rectangular_icon_with_shadow_64.png', 'custom')">
                                                        <img src="public/frontend/image/flags/venezuela_rectangular_icon_with_shadow_64.png">
                                                        <br>
                                                        <a class="text-hover custom">
                                                            <h4>Venezuela</h4>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                        <!-- BL Data -->
                                        <div id="bl" class="tabcontent">
                                            <!-- America -->
                                            <div>
                                                <div class="text-content">
                                                    <h2 class="text-center text-white fs-5 fw-normal">North - America</h2>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4 col-md-3 col-lg-2 Flag" onclick="selectCountry('US', 'public/frontend/image/flags/united_states_of_america_rectangular_icon_with_shadow_64.png', 'bl')">
                                                        <img src="public/frontend/image/flags/united_states_of_america_rectangular_icon_with_shadow_64.png">
                                                        <br>
                                                        <a class="text-hover stat">
                                                            <h4>US</h4>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="text-content">
                                                    <h2 class="text-center text-white fs-5 fw-normal">South - America</h2>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4 col-md-3 col-lg-2 Flag" onclick="selectCountry('Brazil', 'public/frontend/image/flags/brazil_rectangular_icon_with_shadow_64.png', 'bl')">
                                                        <img src="public/frontend/image/flags/brazil_rectangular_icon_with_shadow_64.png">
                                                        <br>
                                                        <a class="text-hover custom">
                                                            <h4>Brazil</h4>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
        @endforeach


        <!-- Snackbar -->
        <div id="snackbar">
            Please select a country or provide either a description or HS Code.
        </div>

        <!-- Track Live Shipment Import Export -->
        <!--@if(!empty($country->search_heading))-->
        <!--    <div class="container-fluid pdt-5 pdb-2 bg-img">-->
        <!--        <div class="container">-->
        <!--            <div class="text-content text-center bg-color">-->
        <!--                <h2 style="font-size: 38px;"> -->
        <!--                    {{$country->search_heading}}-->
        <!--                </h2>-->
        <!--                <p class="text-center">-->
        <!--                    {{$country->search_paragraph}}-->
        <!--                </p>-->
        <!--            </div>-->
        <!--            <form>-->
        <!--                <div class="row bg-green" style="border-radius: 1rem;">-->
        <!--                    <div class="searchbox col-sm-2 col-md-2 col-lg-2"> -->
        <!--                        <select class="form-control" style="border: 0px transparent !important;">-->
        <!--                            <option class="form-control" value="">Select Country</option> -->
        <!--                            <option class="form-control" value="Asia">Asia</option> -->
        <!--                            <option class="form-control" value="Bangladesh">Bangladesh</option>-->
        <!--                            <option class="form-control" value="China">China</option>-->
        <!--                            <option class="form-control" value="Egypt">Egypt</option>-->
        <!--                            <option class="form-control" value="Indonesia">Indonesia</option>-->
        <!--                            <option class="form-control" value="Iran">Iran</option>-->
        <!--                            <option class="form-control" value="Iraq">Iraq</option>-->
        <!--                            <option class="form-control" value="Japan">Japan</option>-->
        <!--                            <option class="form-control" value="Kazakhstan">Kazakhstan</option>-->
        <!--                            <option class="form-control" value="Kuwait">Kuwait</option>-->
        <!--                            <option class="form-control" value="Malaysia">Malaysia</option>-->
        <!--                            <option class="form-control" value="Pakistan">Pakistan</option>-->
        <!--                            <option class="form-control" value="Philippines">Philippines</option>-->
        <!--                            <option class="form-control" value="Qatar">Qatar</option>-->
        <!--                            <option class="form-control" value="Saudi Arabia">Saudi Arabia</option>-->
        <!--                            <option class="form-control" value="Singapore">Singapore</option>-->
        <!--                            <option class="form-control" value="South Korea">South Korea</option>-->
        <!--                            <option class="form-control" value="Sri Lanka">Sri Lanka</option>-->
        <!--                            <option class="form-control" value="Taiwan">Taiwan</option>-->
        <!--                            <option class="form-control" value="Thailand">Thailand</option>-->
        <!--                            <option class="form-control" value="Turkey">Turkey</option>-->
        <!--                            <option class="form-control" value="UAE">UAE</option>-->
        <!--                            <option class="form-control" value="Ukraine">Ukraine</option>-->
        <!--                            <option class="form-control" value="Uzbekistan">Uzbekistan</option>-->
        <!--                            <option class="form-control" value="Vietnam">Vietnam</option> -->
        <!--                            <option class="form-control" value="Botswana">Botswana</option>-->
        <!--                            <option class="form-control" value="Cameroon">Cameroon</option>-->
        <!--                            <option class="form-control" value="Central Africa">Central Africa</option>-->
        <!--                            <option class="form-control" value="Chad">Chad</option>-->
        <!--                            <option class="form-control" value="">DR Congo</option>-->
        <!--                            <option class="form-control" value="">Ethiopia</option>-->
        <!--                            <option class="form-control" value="">Ghana</option>-->
        <!--                            <option class="form-control" value="">Ivory Coast</option>-->
        <!--                            <option class="form-control" value="">Kenya</option>-->
        <!--                            <option class="form-control" value="">Lesotho</option>-->
        <!--                            <option class="form-control" value="">Liberia</option>-->
        <!--                            <option class="form-control" value="">Malawi</option>-->
        <!--                            <option class="form-control" value="">Namibia</option>-->
        <!--                            <option class="form-control" value="">Niger</option>-->
        <!--                            <option class="form-control" value="">Nigeria</option>-->
        <!--                            <option class="form-control" value="">Sao Tome</option>-->
        <!--                            <option class="form-control" value="">Senegal</option>-->
        <!--                            <option class="form-control" value="">Sierra Leone</option>-->
        <!--                            <option class="form-control" value="">South Africa</option>-->
        <!--                            <option class="form-control" value="">Tanzamia</option>-->
        <!--                            <option class="form-control" value="">Togo</option>-->
        <!--                            <option class="form-control" value="">Uganda</option>-->
        <!--                            <option class="form-control" value="">Zambia</option>-->
        <!--                            <option class="form-control" value="">Zimbabwe</option> -->
        <!--                            <option class="form-control" value="">America</option> -->
        <!--                            <option class="form-control" value="">Canada</option>-->
        <!--                            <option class="form-control" value="">Costa Rica</option>-->
        <!--                            <option class="form-control" value="">El Salvador</option>-->
        <!--                            <option class="form-control" value="">Guatemala</option>-->
        <!--                            <option class="form-control" value="">Honduras</option>-->
        <!--                            <option class="form-control" value="">Mexico</option>-->
        <!--                            <option class="form-control" value="">Panama</option>-->
        <!--                            <option class="form-control" value="">US</option>-->
        <!--                            <option class="form-control" value="">Argentina</option>-->
        <!--                            <option class="form-control" value="">Bolivia</option>-->
        <!--                            <option class="form-control" value="">Brazil</option>-->
        <!--                            <option class="form-control" value="">Chile</option>-->
        <!--                            <option class="form-control" value="">Colombia</option>-->
        <!--                            <option class="form-control" value="">Ecuador</option>-->
        <!--                            <option class="form-control" value="">Guyana</option>-->
        <!--                            <option class="form-control" value="">Paraguay</option>-->
        <!--                            <option class="form-control" value="">Peru</option>-->
        <!--                            <option class="form-control" value="">Uruguay</option>-->
        <!--                            <option class="form-control" value="">Venezuela</option> -->
        <!--                            <option class="form-control" value="">Europe</option> -->
        <!--                            <option class="form-control" value="">Austria</option>-->
        <!--                            <option class="form-control" value="">Belgium</option>-->
        <!--                            <option class="form-control" value="">Bulgaria</option>-->
        <!--                            <option class="form-control" value="">Croatia</option>-->
        <!--                            <option class="form-control" value="">Cyprus</option>-->
        <!--                            <option class="form-control" value="">Czech</option>-->
        <!--                            <option class="form-control" value="">Denmark</option>-->
        <!--                            <option class="form-control" value="">Estonia</option>-->
        <!--                            <option class="form-control" value="">Finland</option>-->
        <!--                            <option class="form-control" value="">France</option>-->
        <!--                            <option class="form-control" value="">Germany</option>-->
        <!--                            <option class="form-control" value="">Greece</option>-->
        <!--                            <option class="form-control" value="">Hungary</option>-->
        <!--                            <option class="form-control" value="">Ireland</option>-->
        <!--                            <option class="form-control" value="">Italy</option>-->
        <!--                            <option class="form-control" value="">Kazakhstan</option>-->
        <!--                            <option class="form-control" value="">Kosovo</option>-->
        <!--                            <option class="form-control" value="">Latvia</option>-->
        <!--                            <option class="form-control" value="">Lithuania</option>-->
        <!--                            <option class="form-control" value="">Luxembourg</option>-->
        <!--                            <option class="form-control" value="">Malta</option>-->
        <!--                            <option class="form-control" value="">Moldova</option>-->
        <!--                            <option class="form-control" value="">Netherlands</option>-->
        <!--                            <option class="form-control" value="">Poland</option>-->
        <!--                            <option class="form-control" value="">Portugal</option>-->
        <!--                            <option class="form-control" value="">Russia</option>-->
        <!--                            <option class="form-control" value="">Romania</option>-->
        <!--                            <option class="form-control" value="">Slovenia</option>-->
        <!--                            <option class="form-control" value="">Spain</option>-->
        <!--                            <option class="form-control" value="">Sweden</option>-->
        <!--                            <option class="form-control" value="">Uk</option>-->
        <!--                            <option class="form-control" value="">Ukraine</option>-->
        <!--                            <option class="form-control" value="">Uzbekistan</option> Oceania <option-->
        <!--                                class="form-control" value="">Australia</option>-->
        <!--                            <option class="form-control" value="">Fiji</option>-->
        <!--                            <option class="form-control" value="">New Zealand</option>-->
        <!--                        </select> -->
        <!--                    </div>-->
        <!--                    <div class="searchbox col-sm-2 col-md-2 col-lg-2"> -->
        <!--                        <select class="form-control" style="border: 0px transparent !important;">-->
        <!--                            <option class="form-control" value="">Import</option>-->
        <!--                            <option class="form-control" value="">Export</option>-->
        <!--                        </select> -->
        <!--                    </div>-->
        <!--                    <div class="searchbox col-sm-3 col-md-3 col-lg-3"> -->
        <!--                        <input type="text" placeholder="Description" class="form-control"> -->
        <!--                    </div>-->
        <!--                    <div class="searchbox col-sm-2 col-md-2 col-lg-2"> -->
        <!--                        <input type="text" placeholder="HS Code" class="form-control"> -->
        <!--                    </div>-->
        <!--                    <div class="searchbox col-sm-3 col-md-3 col-lg-3"> -->
        <!--                        <a class="ybtn ybtn-header-color" style="width: 100%;text-align: center;padding: 18px 0px 18px 0px;">-->
        <!--                            Search-->
        <!--                        </a> -->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </form>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--@endif-->

        <!-- Search Live Import Export -->
        <!--{{-- <div class="container-fluid padding-tb bg-img">-->
        <!--    <div class="text-content text-center bg-color">-->
        <!--        <h2 style="font-size: 38px;">-->
        <!--            Search Import Export Live Data-->
        <!--        </h2>-->
        <!--    </div>-->
        <!--    <div class="container">-->
        <!--        <div class="row bg-green" style="border-radius: 1rem;">-->
        <!--            <div class="searchbox col-sm-2 col-md-2  col-lg-2">-->
        <!--                <select class="form-control"  style="border: 0px transparent !important;">-->
        <!--                    <option class="form-control" value="">Select Country</option>-->
        <!--                    Asia -->
        <!--                    <option class="form-control" value="">Bangladesh</option>-->
        <!--                    <option class="form-control" value="">China</option>-->
        <!--                    <option class="form-control" value="">Egypt</option>-->
        <!--                    <option class="form-control" value="">Indonesia</option>-->
        <!--                    <option class="form-control" value="">Iran</option>-->
        <!--                    <option class="form-control" value="">Iraq</option>-->
        <!--                    <option class="form-control" value="">Japan</option>-->
        <!--                    <option class="form-control" value="">Kazakhstan</option>-->
        <!--                    <option class="form-control" value="">Kuwait</option>-->
        <!--                    <option class="form-control" value="">Malaysia</option>-->
        <!--                    <option class="form-control" value="">Pakistan</option>-->
        <!--                    <option class="form-control" value="">Philippines</option>-->
        <!--                    <option class="form-control" value="">Qatar</option>-->
        <!--                    <option class="form-control" value="">Saudi Arabia</option>-->
        <!--                    <option class="form-control" value="">Singapore</option>-->
        <!--                    <option class="form-control" value="">South Korea</option>-->
        <!--                    <option class="form-control" value="">Sri Lanka</option>-->
        <!--                    <option class="form-control" value="">Taiwan</option>-->
        <!--                    <option class="form-control" value="">Thailand</option>-->
        <!--                    <option class="form-control" value="">Turkey</option>-->
        <!--                    <option class="form-control" value="">UAE</option>-->
        <!--                    <option class="form-control" value="">Ukraine</option>-->
        <!--                    <option class="form-control" value="">Uzbekistan</option>-->
        <!--                    <option class="form-control" value="">Vietnam</option>-->
        <!--                    Africa-->
        <!--                    <option class="form-control" value="">Botswana</option>-->
        <!--                    <option class="form-control" value="">Cameroon</option>-->
        <!--                    <option class="form-control" value="">Central Africa</option>-->
        <!--                    <option class="form-control" value="">Chad</option>-->
        <!--                    <option class="form-control" value="">DR Congo</option>-->
        <!--                    <option class="form-control" value="">Ethiopia</option>-->
        <!--                    <option class="form-control" value="">Ghana</option>-->
        <!--                    <option class="form-control" value="">Ivory Coast</option>-->
        <!--                    <option class="form-control" value="">Kenya</option>-->
        <!--                    <option class="form-control" value="">Lesotho</option>-->
        <!--                    <option class="form-control" value="">Liberia</option>-->
        <!--                    <option class="form-control" value="">Malawi</option>-->
        <!--                    <option class="form-control" value="">Namibia</option>-->
        <!--                    <option class="form-control" value="">Niger</option>-->
        <!--                    <option class="form-control" value="">Nigeria</option>-->
        <!--                    <option class="form-control" value="">Sao Tome</option>-->
        <!--                    <option class="form-control" value="">Senegal</option>-->
        <!--                    <option class="form-control" value="">Sierra Leone</option>-->
        <!--                    <option class="form-control" value="">South Africa</option>-->
        <!--                    <option class="form-control" value="">Tanzamia</option>-->
        <!--                    <option class="form-control" value="">Togo</option>-->
        <!--                    <option class="form-control" value="">Uganda</option>-->
        <!--                    <option class="form-control" value="">Zambia</option>-->
        <!--                    <option class="form-control" value="">Zimbabwe</option>-->
        <!--                    America-->
        <!--                    <option class="form-control" value="">Canada</option>-->
        <!--                    <option class="form-control" value="">Costa Rica</option>-->
        <!--                    <option class="form-control" value="">El Salvador</option>-->
        <!--                    <option class="form-control" value="">Guatemala</option>-->
        <!--                    <option class="form-control" value="">Honduras</option>-->
        <!--                    <option class="form-control" value="">Mexico</option>-->
        <!--                    <option class="form-control" value="">Panama</option>-->
        <!--                    <option class="form-control" value="">US</option>-->
        <!--                    <option class="form-control" value="">Argentina</option>-->
        <!--                    <option class="form-control" value="">Bolivia</option>-->
        <!--                    <option class="form-control" value="">Brazil</option>-->
        <!--                    <option class="form-control" value="">Chile</option>-->
        <!--                    <option class="form-control" value="">Colombia</option>-->
        <!--                    <option class="form-control" value="">Ecuador</option>-->
        <!--                    <option class="form-control" value="">Guyana</option>-->
        <!--                    <option class="form-control" value="">Paraguay</option>-->
        <!--                    <option class="form-control" value="">Peru</option>-->
        <!--                    <option class="form-control" value="">Uruguay</option>-->
        <!--                    <option class="form-control" value="">Venezuela</option>-->
        <!--                    Europe-->
        <!--                    <option class="form-control" value="">Austria</option>-->
        <!--                    <option class="form-control" value="">Belgium</option>-->
        <!--                    <option class="form-control" value="">Bulgaria</option>-->
        <!--                    <option class="form-control" value="">Croatia</option>-->
        <!--                    <option class="form-control" value="">Cyprus</option>-->
        <!--                    <option class="form-control" value="">Czech</option>-->
        <!--                    <option class="form-control" value="">Denmark</option>-->
        <!--                    <option class="form-control" value="">Estonia</option>-->
        <!--                    <option class="form-control" value="">Finland</option>-->
        <!--                    <option class="form-control" value="">France</option>-->
        <!--                    <option class="form-control" value="">Germany</option>-->
        <!--                    <option class="form-control" value="">Greece</option>-->
        <!--                    <option class="form-control" value="">Hungary</option>-->
        <!--                    <option class="form-control" value="">Ireland</option>-->
        <!--                    <option class="form-control" value="">Italy</option>-->
        <!--                    <option class="form-control" value="">Kazakhstan</option>-->
        <!--                    <option class="form-control" value="">Kosovo</option>-->
        <!--                    <option class="form-control" value="">Latvia</option>-->
        <!--                    <option class="form-control" value="">Lithuania</option>-->
        <!--                    <option class="form-control" value="">Luxembourg</option>-->
        <!--                    <option class="form-control" value="">Malta</option>-->
        <!--                    <option class="form-control" value="">Moldova</option>-->
        <!--                    <option class="form-control" value="">Netherlands</option>-->
        <!--                    <option class="form-control" value="">Poland</option>-->
        <!--                    <option class="form-control" value="">Portugal</option>-->
        <!--                    <option class="form-control" value="">Russia</option>-->
        <!--                    <option class="form-control" value="">Romania</option>-->
        <!--                    <option class="form-control" value="">Slovenia</option>-->
        <!--                    <option class="form-control" value="">Spain</option>-->
        <!--                    <option class="form-control" value="">Sweden</option>-->
        <!--                    <option class="form-control" value="">Uk</option>-->
        <!--                    <option class="form-control" value="">Ukraine</option>-->
        <!--                    <option class="form-control" value="">Uzbekistan</option>-->
        <!--                    Oceania-->
        <!--                    <option class="form-control" value="">Australia</option>-->
        <!--                    <option class="form-control" value="">Fiji</option>-->
        <!--                    <option class="form-control" value="">New Zealand</option>-->
        <!--                </select>-->
        <!--            </div>-->
        <!--            <div class="searchbox col-sm-2 col-md-2 col-lg-2">-->
        <!--                <select class="form-control" style="border: 0px transparent !important;">-->
        <!--                    <option class="form-control" value="">Import</option>-->
        <!--                    <option class="form-control" value="">Export</option>-->
        <!--                </select>-->
        <!--            </div>-->
        <!--            <div class="searchbox col-sm-3 col-md-3 col-lg-3">-->
        <!--                <input type="text" placeholder="Description" class="form-control">-->
        <!--            </div>-->
        <!--            <div class="searchbox col-sm-2 col-md-2 col-lg-2">-->
        <!--                <input type="text" placeholder="HS Code" class="form-control">-->
        <!--            </div>-->
        <!--            <div class="searchbox col-sm-3 col-md-3 col-lg-3">-->
        <!--                <a class="ybtn ybtn-header-color" style="width: 100%;text-align: center;padding: 18px 0px 18px 0px;">-->
        <!--                    Search-->
        <!--                </a>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div> --}}-->

        <!-- Top 10 products of country -->
        <div class="container-fluid pdt-2 pdb-2">
            <div class="container">
                <div class="text-content">
                    <span>{{$country->Datatype}}</span>
                    <h2>
                       {{$country->uc_heading}}
                    </h2>
                    <p>
                        {!!$country->uc_para!!}
                    </p>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        @php
                            $country_import = explode("\n", $country->uc_product);
                        @endphp
                        @foreach($country_import as $country_imports)
                            @if(trim($country_imports) !== "")
                                <div class="list-pd" >{!! $country_imports !!}</div>
                            @endif
                        @endforeach
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mobile-breadcrumb">
                        <figure class="highcharts-figure">
                            <div id="container"></div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Of Top 10 products of country -->

        <!-- Top 10 Imports Exports of country -->
        <div class="container-fluid pdb-5 pdt-2">
            <div class="container">
                <div class="text-content">
                    <span>Partners</span>
                    <h2>
                      {{$country->cp_heading}}
                    </h2>
                    <p>
                        {!!$country->country_partner_para!!}
                    </p>
                </div>
            </div>
            <div class="container pdt-2">
                <div  class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                        <div class="text-content">
                            <p style="color: black;">
                                <b>Value In Percentage(%)</b>
                            </p>
                        </div>
                        <div style="justify-content: center;display: flex;">
                            <canvas id="10_partners"></canvas>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        @php
                        $partners = explode("\n", $country->country_partner_name);
                        @endphp
                        @foreach($partners as $partner)
                            @if(trim($partner) !== "")
                                <div class="list-pd">
                                    {!! $partner !!}
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!--{{-- Top 10 US Importer Companies --}}-->
        <!--@if(!empty($country->comp_main_head))-->
        <!--    <div class="container-fluid pdb-5 pdt-2">-->
        <!--        <div class="container">-->
        <!--            <div class="row">-->
        <!--                <div class="col-sm-12 col-md-6 col-lg-6 d-flex align-items-center">-->
        <!--                    <div class="text-content">-->
        <!--                        <h1>-->
        <!--                            {{$country->comp_main_head}}-->
        <!--                        </h1>-->
        <!--                        <p>-->
        <!--                            {{$country->comp_main_para}}-->
        <!--                        </p>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="col-sm-12 col-md-6 col-lg-6" style="max-height: 24rem;overflow-x: auto;">-->
        <!--                     Timeline -->
        <!--                    <div class="timeline timeline-one">-->
        <!--                         Timeline Item 1 -->
        <!--                        <div class="timeline-item">-->
        <!--                            <span class="icon icon-info icon-lg">-->
        <!--                                <i class="fa-solid fa-boxes-stacked"></i>-->
        <!--                            </span>-->
        <!--                            <h5 class="my-3">-->
        <!--                                {{$country->comp_kp_head_1}}-->
        <!--                            </h5>-->
        <!--                            <p style="color: #425466;">-->
        <!--                                {{$country->comp_kp_para_1}}-->
        <!--                            </p>-->
        <!--                        </div>-->
        <!--                         Timeline Item 2 -->
        <!--                        <div class="timeline-item">-->
        <!--                            <span class="icon icon-secondary">-->
        <!--                                <i class="fa-solid fa-boxes-stacked"></i>-->
        <!--                            </span>-->
        <!--                            <h5 class="my-3">-->
        <!--                                {{$country->comp_kp_head_2}}-->
        <!--                            </h5>-->
        <!--                            <p style="color: #425466;">-->
        <!--                                {{$country->comp_kp_para_2}}-->
        <!--                            </p>-->
        <!--                        </div>-->
        <!--                         Timeline Item 3 -->
        <!--                        <div class="timeline-item">-->
        <!--                            <span class="icon icon-danger">-->
        <!--                                <i class="fa-solid fa-boxes-stacked"></i>-->
        <!--                            </span>-->
        <!--                            <h5 class="my-3">-->
        <!--                                {{$country->comp_kp_head_3}}-->
        <!--                            </h5>-->
        <!--                            <p style="color: #425466;">-->
        <!--                                {{$country->comp_kp_para_3}}-->
        <!--                            </p>-->
        <!--                        </div>-->
        <!--                        <div class="timeline-item">-->
        <!--                            <span class="icon icon-danger">-->
        <!--                                <i class="fa-solid fa-boxes-stacked"></i>-->
        <!--                            </span>-->
        <!--                            <h5 class="my-3">-->
        <!--                                {{$country->comp_kp_head_4}}-->
        <!--                            </h5>-->
        <!--                            <p style="color: #425466;">-->
        <!--                                {{$country->comp_kp_para_4}}-->
        <!--                            </p>-->
        <!--                        </div>-->
        <!--                        <div class="timeline-item">-->
        <!--                            <span class="icon icon-danger">-->
        <!--                                <i class="fa-solid fa-boxes-stacked"></i>-->
        <!--                            </span>-->
        <!--                            <h5 class="my-3">-->
        <!--                                {{$country->comp_kp_head_5}}-->
        <!--                            </h5>-->
        <!--                            <p style="color: #425466;">-->
        <!--                                {{$country->comp_kp_para_5}}-->
        <!--                            </p>-->
        <!--                        </div>-->
        <!--                        <div class="timeline-item">-->
        <!--                            <span class="icon icon-danger">-->
        <!--                                <i class="fa-solid fa-boxes-stacked"></i>-->
        <!--                            </span>-->
        <!--                            <h5 class="my-3">-->
        <!--                                {{$country->comp_kp_head_6}}-->
        <!--                            </h5>-->
        <!--                            <p style="color: #425466;">-->
        <!--                                {{$country->comp_kp_para_6}}-->
        <!--                            </p>-->
        <!--                        </div>-->
        <!--                        <div class="timeline-item">-->
        <!--                            <span class="icon icon-danger">-->
        <!--                                <i class="fa-solid fa-boxes-stacked"></i>-->
        <!--                            </span>-->
        <!--                            <h5 class="my-3">-->
        <!--                                {{$country->comp_kp_head_7}}-->
        <!--                            </h5>-->
        <!--                            <p style="color: #425466;">-->
        <!--                                {{$country->comp_kp_para_7}}-->
        <!--                            </p>-->
        <!--                        </div>-->
        <!--                        <div class="timeline-item">-->
        <!--                            <span class="icon icon-danger">-->
        <!--                                <i class="fa-solid fa-boxes-stacked"></i>-->
        <!--                            </span>-->
        <!--                            <h5 class="my-3">-->
        <!--                                {{$country->comp_kp_head_8}}-->
        <!--                            </h5>-->
        <!--                            <p style="color: #425466;">-->
        <!--                                {{$country->comp_kp_para_8}}-->
        <!--                            </p>-->
        <!--                        </div>-->
        <!--                        <div class="timeline-item">-->
        <!--                            <span class="icon icon-danger">-->
        <!--                                <i class="fa-solid fa-boxes-stacked"></i>-->
        <!--                            </span>-->
        <!--                            <h5 class="my-3">-->
        <!--                                {{$country->comp_kp_head_9}}-->
        <!--                            </h5>-->
        <!--                            <p style="color: #425466;">-->
        <!--                                {{$country->comp_kp_para_9}}-->
        <!--                            </p>-->
        <!--                        </div>-->
        <!--                        <div class="timeline-item">-->
        <!--                            <span class="icon icon-danger">-->
        <!--                                <i class="fa-solid fa-boxes-stacked"></i>-->
        <!--                            </span>-->
        <!--                            <h5 class="my-3">-->
        <!--                                {{$country->comp_kp_head_10}}-->
        <!--                            </h5>-->
        <!--                            <p style="color: #425466;">-->
        <!--                                {{$country->comp_kp_para_10}}-->
        <!--                            </p>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    End of Timeline-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--@endif-->

        <!--{{-- Ports --}}-->
        <!--@if(!empty($country->port_main_head))-->
        <!--    <div class="container-fluid pdb-5 pdt-5 bg-dark-custom">-->
        <!--        <div class="container">-->
        <!--            <div class="text-content">-->
        <!--                <h1 class="text-center text-white">-->
        <!--                    {{$country->port_main_head}}-->
        <!--                </h1>-->
        <!--                <p class="text-center text-white">-->
        <!--                    {{$country->port_main_para}}-->
        <!--                </p>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--        <div class="row gx-2 gy-3 justify-content-center">-->
        <!--            <div class="col-auto">-->
        <!--                <button type="button" class="btn bg-white d-flex align-items-center padding-75">-->
        <!--                    <i class="fa-solid fa-ship fa-lg me-2" style="color: #0a2540;"></i>-->
        <!--                    {{$country->port_name_1}}-->
        <!--                </button>-->
        <!--            </div>-->
        <!--            <div class="col-auto">-->
        <!--                <button type="button" class="btn bg-white d-flex align-items-center padding-75">-->
        <!--                    <i class="fa-solid fa-ship fa-lg me-2" style="color: #0a2540;"></i>-->
        <!--                    {{$country->port_name_2}}-->
        <!--                  </button>-->
        <!--            </div>-->
        <!--            <div class="col-auto">-->
        <!--                <button type="button" class="btn bg-white d-flex align-items-center padding-75">-->
        <!--                    <i class="fa-solid fa-ship fa-lg me-2" style="color: #0a2540;"></i>-->
        <!--                    {{$country->port_name_3}}-->
        <!--                </button>-->
        <!--            </div>-->
        <!--            <div class="col-auto">-->
        <!--                <button type="button" class="btn bg-white d-flex align-items-center padding-75">-->
        <!--                    <i class="fa-solid fa-ship fa-lg me-2" style="color: #0a2540;"></i>-->
        <!--                    {{$country->port_name_4}}-->
        <!--                </button>-->
        <!--            </div>-->
        <!--            <div class="col-auto">-->
        <!--                <button type="button" class="btn bg-white d-flex align-items-center padding-75">-->
        <!--                    <i class="fa-solid fa-ship fa-lg me-2" style="color: #0a2540;"></i>-->
        <!--                    {{$country->port_name_5}}-->
        <!--                </button>-->
        <!--            </div>-->
        <!--            <div class="col-auto">-->
        <!--                <button type="button" class="btn bg-white d-flex align-items-center padding-75">-->
        <!--                    <i class="fa-solid fa-ship fa-lg me-2" style="color: #0a2540;"></i>-->
        <!--                    {{$country->port_name_6}}-->
        <!--                </button>-->
        <!--            </div>-->
        <!--            <div class="col-auto">-->
        <!--                <button type="button" class="btn bg-white d-flex align-items-center padding-75">-->
        <!--                    <i class="fa-solid fa-ship fa-lg me-2" style="color: #0a2540;"></i>-->
        <!--                    {{$country->port_name_7}}-->
        <!--                </button>-->
        <!--            </div>-->
        <!--            <div class="col-auto">-->
        <!--                <button type="button" class="btn bg-white d-flex align-items-center padding-75">-->
        <!--                    <i class="fa-solid fa-ship fa-lg me-2" style="color: #0a2540;"></i>-->
        <!--                    {{$country->port_name_8}}-->
        <!--                </button>-->
        <!--            </div>-->
        <!--            <div class="col-auto">-->
        <!--                <button type="button" class="btn bg-white d-flex align-items-center padding-75">-->
        <!--                    <i class="fa-solid fa-ship fa-lg me-2" style="color: #0a2540;"></i>-->
        <!--                    {{$country->port_name_9}}-->
        <!--                </button>-->
        <!--            </div>-->
        <!--            <div class="col-auto">-->
        <!--                <button type="button" class="btn bg-white d-flex align-items-center padding-75">-->
        <!--                    <i class="fa-solid fa-ship fa-lg me-2" style="color: #0a2540;"></i>-->
        <!--                    {{$country->port_name_10}}-->
        <!--                </button>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--@endif-->

        <!--{{-- Key Components --}}-->
        <!--<div class="container-fluid bg-bluish padding-tb">-->
        <!--    <div class="container">-->
        <!--        <div class="row">-->
        <!--            <div class="col-sm-12 col-md-4 col-lg-4 highlight-card d-flex align-items-center">-->
        <!--                <div class="bg-gradient">-->
        <!--                    <h3 class="fs-2 gradient-h2">-->
        <!--                        Key Components Covered in {{$country->country}} Customs Data-->
        <!--                    </h3>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="col-sm-12 col-md-8 col-lg-8 d-flex align-items-center justify-content-center">-->
        <!--                <div class="row col-sm-12 col-md-12 col-lg-12">-->
        <!--                    <div class="col-sm-12 col-md-4 col-lg-4 fs-6 fw-500 padding-75">-->
        <!--                        <span style="display:inline-block;background-color:#00506e;width: 0.625rem;height:0.625rem;margin-inline-end:0.375rem;border-radius:9999px;"></span>-->
        <!--                        Date-->
        <!--                    </div>-->
        <!--                    <div class="col-sm-12 col-md-4 col-lg-4 fs-6 fw-500 padding-75">-->
        <!--                        <span style="display:inline-block;background-color:#00506e;width: 0.625rem;height:0.625rem;margin-inline-end:0.375rem;border-radius:9999px;"></span>-->
        <!--                        Quantity value-->
        <!--                    </div>-->
        <!--                    <div class="col-sm-12 col-md-4 col-lg-4 fs-6 fw-500 padding-75">-->
        <!--                        <span style="display:inline-block;background-color:#00506e;width: 0.625rem;height:0.625rem;margin-inline-end:0.375rem;border-radius:9999px;"></span>-->
        <!--                        Unit port-->
        <!--                    </div>-->
        <!--                    <div class="col-sm-12 col-md-4 col-lg-4 fs-6 fw-500 padding-75">-->
        <!--                        <span style="display:inline-block;background-color:#00506e;width: 0.625rem;height:0.625rem;margin-inline-end:0.375rem;border-radius:9999px;"></span>-->
        <!--                        Destination nation-->
        <!--                    </div>-->
        <!--                    <div class="col-sm-12 col-md-4 col-lg-4 fs-6 fw-500 padding-75">-->
        <!--                        <span style="display:inline-block;background-color:#00506e;width: 0.625rem;height:0.625rem;margin-inline-end:0.375rem;border-radius:9999px;"></span>-->
        <!--                        Product description-->
        <!--                    </div>-->
        <!--                    <div class="col-sm-12 col-md-4 col-lg-4 fs-6 fw-500 padding-75">-->
        <!--                        <span style="display:inline-block;background-color:#00506e;width: 0.625rem;height:0.625rem;margin-inline-end:0.375rem;border-radius:9999px;"></span>-->
        <!--                        HS code-->
        <!--                    </div>-->
        <!--                    <div class="col-sm-12 col-md-4 col-lg-4 fs-6 fw-500 padding-75">-->
        <!--                        <span style="display:inline-block;background-color:#00506e;width: 0.625rem;height:0.625rem;margin-inline-end:0.375rem;border-radius:9999px;"></span>-->
        <!--                        Name of the {{$country->country}} exporter-->
        <!--                    </div>-->
        <!--                    <div class="col-sm-12 col-md-4 col-lg-4 fs-6 fw-500 padding-75">-->
        <!--                        <span style="display:inline-block;background-color:#00506e;width: 0.625rem;height:0.625rem;margin-inline-end:0.375rem;border-radius:9999px;"></span>-->
        <!--                        Name of foreign buyer-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->

        <!-- Sample Data -->

        <div class="container-fluid padding-tb bg-dark-custom">
            <div class="container">
                <div class="text-content">
                    <span>Sample Data</span>
                    <h2 class="text-white">
                        {{$country->sd_heading}}
                    </h2>
                    <p class="text-white">
                        We obtain trustworthy data from organizations, shipping businesses, and customs ports. This Trade Data
                        contains a wide range of fields, such as HS codes, product descriptions, prices, quantities, origin country,
                        destination country, and port names together with currency values. For traders and marketers, this trade data is
                        crucial information that helps them to make informed decisions. From the HS codes and product descriptions to
                        the quantity and cost of each product, everything can be obtained through this trade data.
                        We have included a sample of this trade data for your convenience and greater understanding so
                        that you can see what the trade data looks like as a whole, with complete details.
                    </p>
                    <p class="text-white">
                        {!! strip_tags(html_entity_decode($country->sd_para)) !!}
                    </p>
                </div>


                {{-- @dd($sampleResult) --}}
                @if($sampleResult !== [] && $sampleResult->isNotEmpty())
                    <div class="d-flex table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="table-primary">
                                    <th colspan="4" class="text-center fs-4 fw-normal">
                                        {{$country->country}} {{ucfirst($country->Datatype)}} Data
                                    </th>
                                </tr>
                            </thead>
                            <tbody style="background-color: #00506E;">

                                @foreach ($sampleResult as $row)
                                        @php
                                            $columns = array_keys((array) $row); // Retrieve column names dynamically
                                        @endphp
                                        @for ($i = 0; $i < count($columns); $i+=2)
                                            <tr>
                                                <td class="fs-5 fw-normal text-white">
                                                    {{ ucwords(str_replace('_', ' ', $columns[$i])) }} <!-- First Column Name -->
                                                </td>
                                                <td class="fs-5 fw-normal text-white">
                                                    {{ $row->{$columns[$i]} ?? '' }} <!-- First Column Value -->
                                                </td>

                                                @if (isset($columns[$i+1]))
                                                    <td class="fs-5 fw-normal text-white">
                                                        {{ ucwords(str_replace('_', ' ', $columns[$i+1])) }} <!-- Second Column Name -->
                                                    </td>
                                                    <td class="fs-5 fw-normal text-white">
                                                        {{ $row->{$columns[$i+1]} ?? '' }} <!-- Second Column Value -->
                                                    </td>
                                                @else
                                                    <td class="fs-5 fw-normal text-white"></td>
                                                    <td class="fs-5 fw-normal text-white"></td>
                                                @endif
                                            </tr>
                                        @endfor
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    @if ($country->country == "Japan"||$country->country == "Singapore"||$country->country == "Taiwan"||$country->country == "Malaysia"||$country->country == "Belgium"||$country->country == "Germany"||$country->country == "Greece"||$country->country == "Italy"||$country->country == "Netherlands"||$country->country == "Spain"||$country->country == "UK"||$country->country == "Canada"||$country->country == "Australia")
                        {{-- B/L Sample Data Tab --}}
                        <div class="container pdt-2" id="bl-sample">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button onclick="stats()" class="btn btn-outline" type="button" style="color: white;">Statistical Data</button>
                                <button onclick="bl()" class="btn btn-primary" type="button">B/L Data</button>
                            </div>
                            <div class="flex" style="justify-content: center;">
                                @if ($country->bl_data_img)
                                @php
                                    // Construct the full image URL using the base URL and the image filename.
                                    $blimageURL = asset('https://cms.tradeimex.in/public/frontend/img/bldata/' . $country->bl_data_img);
                                @endphp
                                @endif
                                @if (!empty($blimageURL))
                                    <img src="{{ $blimageURL }}" class="image-container-sample mt-8-sample" style="width: 40%;">
                                @endif
                            </div>
                            @if ($country->bl_data_file)
                                @php
                                    // Construct the full image URL using the base URL and the image filename.
                                    $blfileURL = asset('https://cms.tradeimex.in/public/frontend/files/' . $country->bl_data_file);

                                @endphp

                                <div class="buttons-holder download-sample" style="margin-top: 2%;">
                                    <a href="{{ $blfileURL }}" download="sample_data.jpg" class="ybtn ybtn-accent-color">
                                        Download Sample &nbsp;
                                        <i class="fa-solid fa-file-arrow-down fa-xl" style="color: #fbfbfe;"></i>
                                    </a>
                                </div>
                            @endif
                        </div>

                        {{-- Statistical Sample Data Tab --}}
                        <div class="container pdt-2" id="stats-sample">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button onclick="stats()" class="btn btn-primary" type="button">Statistical Data</button>
                                <button onclick="bl()" class="btn btn-outline" type="button" style="color: white;">B/L Data</button>
                            </div>
                            <div class="flex" style="justify-content: center;">
                                @if ($country->stats_data_img)
                                @php
                                    // Construct the full image URL using the base URL and the image filename.
                                    $statsimageURL = asset('https://cms.tradeimex.in/public/frontend/img/stasticaldata/' . $country->stats_data_img);
                                @endphp
                                @endif
                                @if (!empty($statsimageURL))
                                    <img src="{{ $statsimageURL }}" class="image-container-sample mt-8-sample " style="width: 40%;">
                                @endif
                            </div>
                            @if ($country->stats_data_file)
                                @php
                                    // Construct the full image URL using the base URL and the image filename.
                                    $samplefileURL = asset('https://cms.tradeimex.in/public/frontend/files/' . $country->data_file);

                                @endphp

                                <div class="buttons-holder download-sample" style="margin-top: 2%;">
                                    <a href="{{ $samplefileURL }}" download="sample_data.jpg" class="ybtn ybtn-accent-color">
                                        Download Sample &nbsp;
                                        <i class="fa-solid fa-file-arrow-down fa-xl" style="color: #fbfbfe;"></i>
                                    </a>
                                </div>
                            @endif
                        </div>

                    @else
                        <div class="container" style="padding-top: 1%;">
                            <div class="flex" style="justify-content: center;">
                                {{-- <img class="image-container" src="public/frontend/image/img/Statistical Data.png" style="border-radius: 12px;"> --}}

                                @if ($country->slider_images_one)
                                        @php
                                            // Construct the full image URL using the base URL and the image filename.
                                            $sampleURL = asset('https://cms.tradeimex.in/public/frontend/img/others/' . $country->slider_images_one);
                                        @endphp
                                    @endif
                                    @if (!empty($sampleURL))
                                    <img src="{{ $sampleURL }}" style="width: 40%;"  class="image-container-sample">
                                @endif
                            </div>
                            @if ($country->data_file)
                                @php
                                    // Construct the full image URL using the base URL and the image filename.
                                    $samplefileURL = asset('https://cms.tradeimex.in/public/frontend/files/' . $country->data_file);

                                @endphp

                                <div class="buttons-holder download-sample" style="margin-top: 2%;">
                                    <a href="{{ $samplefileURL }}" download="sample_data.jpg" class="ybtn ybtn-accent-color">
                                        Download Sample &nbsp;
                                        <i class="fa-solid fa-file-arrow-down fa-xl" style="color: #fbfbfe;"></i>
                                    </a>
                                </div>
                            @endif
                        </div>
                    @endif
                @endif
            </div>
        </div>

        <!-- Benefits -->
        <div class="container-fluid padding-tb bg-bluish">
            <div class="container">
                <div class="text-content">
                    <span>Benefits</span>
                    <h2>
                        {{$country->benifit_heading}}
                    </h2>
                    <p>
                        {!!$country->benifit_para!!}
                    </p>
                </div>
            </div>
            <div class="container">
                <div class="text-content">
                    @php
                    $benifits = explode("\n", $country->benifit_name);
                    @endphp
                    @foreach($benifits as $benifit)
                        @if(trim($benifit) !== "")
                            <div class="list-pd">
                                {!! $benifit !!}
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Faqs -->
        <div class="container-fluid pdt-2 pdb-2 bg-bluish">
            <div class="container">
                <div class="text-content">
                    <h1>Frequently Asked Questions!!</h1>
                </div>
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                {{$country->Faq_heading_one}}
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body" style="color: #425466;">
                                {!!$country->Faq_para_one!!}
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                 {{$country->Faq_heading_two}}
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body" style="color: #425466;">
                                {!!$country->Faq_para_two!!}
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                 {{$country->Faq_heading_three}}
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body" style="color: #425466;">
                                {!!$country->Faq_para_three!!}
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                              {{$country->Faq_heading_four}}
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body" style="color: #425466;">
                                {!!$country->Faq_para_four!!}
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                              {{$country->Faq_heading_five}}
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body" style="color: #425466;">
                                {!!$country->Faq_para_five!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reference Countries -->
        <div class="container-fluid bg-gradient-custom bg-bluish pdt-2 pdb-2">
            <div class="container">
                <div class="text-content text-center">
                    <h2 class="text-white">You might be interested in other continents as well</h2>
                </div>
                <div class="row">
                    @foreach ($countrydata as $country)
                        @if (\Illuminate\Support\Str::before($country->country_code, '-') == 'TAS')
                            @foreach ($countryname as $countries)
                                @if ($countries->country == 'South-Korea'||$countries->country == "China"||$countries->country == "Japan"||$countries->country == "Singapore"||$countries->country == "Vietnam"||$countries->country == "Philippines")
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
                                    <div class="searchbox">
                                        <a href="/{{Str::lower($countries->country)}}-import" class="ybtn ybtn-header-color" style="width: 100%;text-align: center;padding: 18px 0px 18px 0px;">
                                            {{ $countries->country }}
                                        </a>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        @endif
                        @if (\Illuminate\Support\Str::before($country->country_code, '-') == 'TNA')
                            @foreach ($countryname as $countries)
                                @if ($countries->country == 'US'||$countries->country == "Canada"||$countries->country == "Mexico"||$countries->country == "Costa-Rica"||$countries->country == "EL-Salvador"||$countries->country == "Guatemala")
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
                                    <div class="searchbox">
                                        <a href="/{{Str::lower($countries->country)}}-import" class="ybtn ybtn-header-color" style="width: 100%;text-align: center;padding: 18px 0px 18px 0px;">
                                            {{ $countries->country }}
                                        </a>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        @endif
                        @if (\Illuminate\Support\Str::before($country->country_code, '-') == 'TAF')
                            @foreach ($countryname as $countries)
                                @if ($countries->country == 'South-Africa'||$countries->country == "Ghana"||$countries->country == "Kenya"||$countries->country == "ivorycoast"||$countries->country == "Algeria"||$countries->country == "Ethiopia"||$countries->country == "Nigeria")
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
                                    <div class="searchbox">
                                        <a href="/{{Str::lower($countries->country)}}-import" class="ybtn ybtn-header-color" style="width: 100%;text-align: center;padding: 18px 0px 18px 0px;">
                                            {{ $countries->country }}
                                        </a>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        @endif
                        @if (\Illuminate\Support\Str::before($country->country_code, '-') == 'TEU')
                            @foreach ($countryname as $countries)
                                @if ($countries->country == 'Germany'||$countries->country == "UK"||$countries->country == "Netherlands"||$countries->country == "Italy"||$countries->country == "France"||$countries->country == "Finland")
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
                                    <div class="searchbox">
                                        <a href="/{{Str::lower($countries->country)}}-import" class="ybtn ybtn-header-color" style="width: 100%;text-align: center;padding: 18px 0px 18px 0px;">
                                            {{ $countries->country }}
                                        </a>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        @endif
                        @if (\Illuminate\Support\Str::before($country->country_code, '-') == 'TSA')
                            @foreach ($countryname as $countries)
                                @if ($countries->country == 'Brazil'||$countries->country == "Chile"||$countries->country == "Argentina"||$countries->country == "Colombia"||$countries->country == "Peru"||$countries->country == "Venezuela")
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
                                    <div class="searchbox">
                                        <a href="/{{Str::lower($countries->country)}}-import" class="ybtn ybtn-header-color" style="width: 100%;text-align: center;padding: 18px 0px 18px 0px;">
                                            {{ $countries->country }}
                                        </a>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        @endif
                        @if (\Illuminate\Support\Str::before($country->country_code, '-') == 'TOC')
                            @foreach ($countryname as $countries)
                                @if ($countries->country == 'Australia'||$countries->country == "New-Zealand"||$countries->country == "Fiji")
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                    <div class="searchbox">
                                        <a href="/{{Str::lower($countries->country)}}-import" class="ybtn ybtn-header-color" style="width: 100%;text-align: center;padding: 18px 0px 18px 0px;">
                                            {{ $countries->country }}
                                        </a>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="searchbox">
                            <a href="/africa-trade-data" class="ybtn ybtn-header-color" style="width: 100%;text-align: center;padding: 18px 0px 18px 0px;">
                                Africa Trade Data
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="searchbox">
                            <a href="/europe-trade-data" class="ybtn ybtn-header-color" style="width: 100%;text-align: center;padding: 18px 0px 18px 0px;">
                                Europe Trade Data
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="searchbox">
                            <a href="/North America-trade-data" class="ybtn ybtn-header-color" style="width: 100%;text-align: center;padding: 18px 0px 18px 0px;">
                                North America
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="searchbox">
                            <a href="/oceania-trade-data" class="ybtn ybtn-header-color" style="width: 100%;text-align: center;padding: 18px 0px 18px 0px;">
                                Oceania Trade Data
                            </a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>

        @endforeach
        @include('frontend.footer')
        @include('frontend.script')

        {{-- snackbar js --}}
        <script>
            document.getElementById('searchForm').addEventListener('submit', function(event) {
                // Clear previous error messages
                const country = document.getElementById('selected-country').value;
                const description = document.getElementById('description').value.trim();
                const hs_code = document.getElementById('hs_code').value.trim();

                let hasError = false;
                let errorMessage = '';

                // Check if country is selected
                if (!country) {
                    errorMessage += 'Please select a country.<br>';
                    hasError = true;
                }

                // Check if either description or hs_code is filled
                if (!description && !hs_code) {
                    errorMessage += 'Please enter either a description or an HS Code.<br>';
                    hasError = true;
                }

                // If there's an error, prevent form submission and show the snackbar
                if (hasError) {
                    event.preventDefault();
                    showSnackbar(errorMessage);
                }
            });

            function showSnackbar(message) {
                const snackbar = document.getElementById('snackbar');
                snackbar.innerHTML = message; // Set the message in the snackbar
                snackbar.classList.add('show'); // Add the 'show' class to display the snackbar

                // Remove the 'show' class after 5 seconds to hide the snackbar smoothly
                setTimeout(function() {
                    snackbar.classList.remove('show');
                }, 5000);
            }
        </script>

        <!--Deepseek code-->
        <script>
            let currentSectionType = 'custom'; // Track the current section type

                // Function to select country and display it in the select box
                function selectCountry(country, flagUrl, sectionType) {
                    const selectBox = document.getElementById("country-select");
                    selectBox.innerHTML = `
                        <span>
                            <img class="search_input_img" src="${flagUrl}" alt="${country} Flag">${country}
                        </span>
                    `;

                    // Update the hidden input with the selected country and section type
                    document.getElementById('selected-country').value = country;
                    document.getElementById('section_type').value = sectionType;

                    // Hide mega menu after selection
                    closeMegaMenu();
                }

                // Show the mega menu when the select box is clicked
                document.getElementById("country-select").addEventListener("click", function (event) {
                    event.preventDefault();
                    event.stopPropagation();

                    const megaMenu = document.getElementById('mega-menu');

                    // Toggle the mega menu display with a fade-in effect
                    if (megaMenu.style.display === 'block') {
                        closeMegaMenu();
                    } else {
                        openMegaMenu();
                    }
                });

                // Switch tab content and update currentSectionType
                function openCity(evt, cityName) {
                    var i, tabcontent, tablinks;

                    // Hide all tab content
                    tabcontent = document.getElementsByClassName("tabcontent");
                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                    }

                    // Remove active class from all tab links
                    tablinks = document.getElementsByClassName("tablinks");
                    for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" active-1", "");
                    }

                    // Show the selected tab content
                    document.getElementById(cityName).style.display = "block";
                    evt.currentTarget.className += " active-1";

                    // Update the current section type based on the active tab
                    currentSectionType = cityName === 'custom' ? 'custom' : 'bl';
                    console.log("Current section type updated to:", currentSectionType);
                }

                // Open the mega menu with a fade-in effect
                function openMegaMenu() {
                    const megaMenu = document.getElementById('mega-menu');
                    megaMenu.style.display = 'block';
                    setTimeout(() => {
                        megaMenu.style.opacity = '1';
                        megaMenu.classList.add('fade-in');
                    }, 10);

                    // Add event listener for clicking outside the mega menu
                    document.addEventListener('click', closeOnClickOutside);
                }

                // Close the mega menu with a fade-out effect
                function closeMegaMenu() {
                    const megaMenu = document.getElementById('mega-menu');
                    megaMenu.style.opacity = '0';
                    setTimeout(() => {
                        megaMenu.style.display = 'none';
                    }, 500);

                    // Remove the event listener to prevent unnecessary calls
                    document.removeEventListener('click', closeOnClickOutside);
                }

                // Detect clicks outside the mega menu to close it
                function closeOnClickOutside(event) {
                    const megaMenu = document.getElementById('mega-menu');
                    if (!megaMenu.contains(event.target) && event.target.id !== "country-select") {
                        closeMegaMenu();
                    }
                }
        </script>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

        <script>
            function stats(){
                document.getElementById("stats-sample").style.display="block";
                document.getElementById("bl-sample").style.display="none";

                document.getElementById("stats-sample-btn").class.add('btn btn-primary');
                document.getElementById("bl-sample-btn").class.remove('btn btn-outline');
            }
            function bl(){
                document.getElementById("stats-sample").style.display="none";
                document.getElementById("bl-sample").style.display="block";

                document.getElementById("bl-sample-btn").class.add('btn btn-primary');
                document.getElementById("stats-sample-btn").class.remove('btn btn-outline');
            }
        </script>

        <!-- Top 10 imports of country (Pie Chart) -->
        <script type="text/javascript">
            (function (H) {
            H.seriesTypes.pie.prototype.animate = function (init) {
                const series = this,
                    chart = series.chart,
                    points = series.points,
                    {
                        animation
                    } = series.options,
                    {
                        startAngleRad
                    } = series;

                function fanAnimate(point, startAngleRad) {
                    const graphic = point.graphic,
                        args = point.shapeArgs;

                    if (graphic && args) {
                        graphic
                            // Set inital animation values
                            .attr({
                                start: startAngleRad,
                                end: startAngleRad,
                                opacity: 1
                            })
                            // Animate to the final position
                            .animate({
                                start: args.start,
                                end: args.end
                            }, {
                                duration: animation.duration / points.length
                            }, function () {
                                // On complete, start animating the next point
                                if (points[point.index + 1]) {
                                    fanAnimate(points[point.index + 1], args.end);
                                }
                                // On the last point, fade in the data labels, then
                                // apply the inner size
                                if (point.index === series.points.length - 1) {
                                    series.dataLabelsGroup.animate({
                                        opacity: 1
                                    },
                                    void 0,
                                    function () {
                                        points.forEach(point => {
                                            point.opacity = 1;
                                        });
                                        series.update({
                                            enableMouseTracking: true
                                        }, false);
                                        chart.update({
                                            plotOptions: {
                                                pie: {
                                                    innerSize: '40%',
                                                    borderRadius: 8
                                                }
                                            }
                                        });
                                    });
                                }
                            });
                    }
                }

                if (init) {
                    // Hide points on init
                    points.forEach(point => {
                        point.opacity = 0;
                    });
                } else {
                    fanAnimate(points[0], startAngleRad);
                }
            };
            }(Highcharts));
            var percentageValues = [
                @foreach($countrydata as $country)
                    @php
                        $percentages = [];
                        preg_match_all('/\d+(\.\d+)?%/', $country->uc_product, $matches);
                        foreach ($matches[0] as $percentage) {
                            $percentages[] = (float) $percentage;
                        }
                        echo json_encode($percentages) . ",";
                    @endphp
                @endforeach
            ];
            console.log('percentageValues',percentageValues)

            Highcharts.chart('container', {
                chart: {
                    type: 'pie'
                },
                title: {
                    text: '',
                    align: 'center'
                },
                tooltip: {
                    pointFormat: ''
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        borderWidth: 2,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}%</b>',
                            distance: 20
                        }
                    }
                },

                series: [{
                    // Disable mouse tracking on load, enable after custom animation
                    enableMouseTracking: false,
                    animation: {
                        duration: 2000
                    },
                    colorByPoint: true,
                    data: [
                        {
                            name:percentageValues[0][0],
                            y: percentageValues[0][0]
                        },
                        {
                            name: percentageValues[0][1],
                            y: percentageValues[0][1]
                        },
                        {
                            name: percentageValues[0][2],
                            y:percentageValues[0][2]
                        },
                        {
                            name:percentageValues[0][3],
                            y:percentageValues[0][3]
                        },
                        {
                            name: percentageValues[0][4],
                            y: percentageValues[0][4]
                        },
                        {
                            name: percentageValues[0][5],
                            y: percentageValues[0][5]
                        },
                        {
                            name: percentageValues[0][6],
                            y: percentageValues[0][6]
                        },
                        {
                            name: percentageValues[0][7],
                            y: percentageValues[0][7]
                        },
                        {
                            name: percentageValues[0][8],
                            y: percentageValues[0][8]
                        },
                        {
                            name: percentageValues[0][9],
                            y: percentageValues[0][9]
                        },
                    ]
                }]
            });

        </script>
        <!-- End of chart js -->

        <!-- Top 10 partners of country (Bar Chart) -->
        <script>
            const ctx = document.getElementById('10_partners');
            var percentageValues = [
                @foreach($countrydata as $country)
                        @php
                            $percentages = [];
                            preg_match_all('/([A-Za-z\s]+):\s([\d\.]+%)/', $country->country_partner_name, $matches, PREG_SET_ORDER);
                            foreach ($matches as $match) {
                                $countryName = $match[1];
                                $percentage = $match[2];
                                $percentages[] = ['countryName' => $countryName, 'percentage' => (float) $percentage];
                            }
                            echo json_encode($percentages) . ",";
                        @endphp
                @endforeach

                ];
                var countryNames = percentageValues.map(function(item) {
                    return item.map(function(subItem) {
                        return subItem.countryName;
                    });
                }).flat();

                var percentageData = percentageValues.map(function(item) {
                    return item.map(function(subItem) {
                        return subItem.percentage;
                    });
                }).flat();
                var value = percentageValues.map(function(item) {
                    return item.map(function(subItem) {
                        return subItem.value;
                    });
                }).flat();
                console.log('countryNames', countryNames);
                console.log('value', value[0]);
            new Chart(ctx, {
                type: 'bar',
                data: {
                labels: [countryNames[0], countryNames[1], countryNames[2], countryNames[3], countryNames[4], countryNames[5], countryNames[6], countryNames[7], countryNames[8],countryNames[9]],
                datasets: [{
                    label: '{{$country->cp_heading}}',
                    data: [percentageData[0], percentageData[1], percentageData[2], percentageData[3], percentageData[4],percentageData[5], percentageData[6], percentageData[7],percentageData[8], percentageData[9]],
                    borderWidth: 1
                }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
        <!-- End of Bar chart js -->
    </body>
</html>


