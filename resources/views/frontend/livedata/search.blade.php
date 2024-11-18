<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{asset('public/frontend/image/img/Favicon Logo.png')}}">
    @php
        $base_search = ($hs_code === null) ? $desc : $hs_code;
    @endphp
    @if($type=='data')
        @if($hs_code && $desc && $hs_code !== ' ' && $desc !== ' ')
            <title>{{$country}} Customs {{$role}} Data of {{$desc}} under HS code {{$hs_code}}</title>
            <meta name="description" content="Live {{$desc}} {{$role}} data of {{$country}} under the HS code {{$hs_code}}, our {{$country}} customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{$country}} {{$desc}} {{$role}}ers data">
        @elseif($hs_code)
            <title>{{$country}} Customs {{$role}}s Data under HS Code {{$base_search}}</title>
            <meta name="description" content="Live {{$role}} data of {{$country}} under the HS code {{$base_search}}, our {{$country}} customs {{$role}} data reports include the date, value, quantity,  product description, HS code, port, country, and {{$country}} {{$role}}ers data">
        @elseif($desc)
            <title>{{$country}} {{$base_search}} {{$role}} Data | {{$country}} {{$base_search}} {{$role}}er</title>
            <meta name="description" content="Live {{$base_search}} {{$role}} data of {{$country}}, our {{$country}} customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{$country}} {{$base_search}} {{$role}}ers data">
        @endif
    @else
        @if($hs_code)
                <title>List of All HS code {{$base_search}} {{$role}}er data in USA </title>
                <meta name="description" content="List of all HS code {{$base_search}} {{$role}}er in usa on the basis of real time shipments data. Our bill of lading reports include HS code, product description, unit, weight, quantity, exporter name & address etc">
        @else
                <title>List of All {{$base_search}} {{$role}}er data in USA </title>
                <meta name="description" content="List of all {{$base_search}} {{$role}}er in usa on the basis of real time shipments data. Our bill of lading reports include HS code, product description, unit, weight, quantity, exporter name & address etc">
        @endif

    @endif
    @include('frontend.link')
    <style>
        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 310px;
            max-width: 800px;
            margin: 1em auto;
        }

        #container {
            height: 400px;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }

        .highcharts-description {
            margin: 0.3rem 10px;
        }
    </style>
</head>
<body>
    @include('frontend.header')
    @if(session('message'))
        <div class="alert alert-warning">
            {{ session('message') }}
        </div>
    @endif

    @php
        $desc = trim($desc, '"');
        $base_search = ($hs_code === null) ? $desc : $hs_code;
        $isNumeric = is_numeric($base_search);
        $search = $isNumeric ? 'hs_code' : 'product';
    @endphp

    <section class="container-fluid padding-tb bg-green">
        <div class="text-content text-center">
            @if($type=='data')
                @if($hs_code && $desc && $hs_code !== ' ' && $desc !== ' ')
                    <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-all;">
                        {{$country}} Customs {{$role}} Data of {{$desc}} under HS code {{$hs_code}}
                    </h1>
                    <p class="fs-6 text-center">
                        Live {{$desc}} {{$role}} data of {{$country}} under the HS code {{$hs_code}}, our {{$country}} customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{$country}} {{$desc}} {{$role}}ers data
                    </p>
                @elseif($hs_code)
                    <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-all;">
                        {{$country}} Customs {{$role}}s Data under HS Code {{$base_search}}
                    </h1>
                    <p class="text-center fs-6">
                        Live {{$role}} data of {{$country}} under the HS code {{$base_search}}, our {{$country}} customs {{$role}} data reports include the date, value, quantity,  product description, HS code, port, country, and  {{$country}} {{$role}}ers data
                    </p>
                @elseif($desc)
                    <h2 class="fs-2 mb-3 text-capitalize" style="word-break:break-all;">
                        {{$country}} {{$base_search}} {{$role}} Data | {{$country}} {{$base_search}} {{$role}}er
                    </h2>
                    <p class="text-center fs-6">
                        Live {{$base_search}} {{$role}} data of {{$country}}, our {{$country}} customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{$country}} {{$base_search}} {{$role}}ers data
                    </p>

                @endif
            @endif
        </div>
        @if(session('error'))
            <div class="d-flex justify-content-center">
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            </div>
        @endif

        <div class="container">
            <form method="GET" action="{{ route('product.list') }}" enctype="multipart/form-data" id="searchForm" >
                @csrf
                <div class="mb-4 mt-4 flex justify-content-center align-items-center">
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
                        <div class="select-box" id="country-select">
                            <span>{{$country}}</span>
                        </div>
                        <input type="hidden" name="country" id="selected-country" value="{{$country}}">
                    </div>

                    <div class="searchbox col-sm-2 col-md-2 col-lg-2">
                        <select class="form-control" name="role" style="border: 0px transparent !important;">
                            @if($role == 'import')
                              <option class="form-control" selected value={{$role}}>{{Str::title($role)}}</option>
                              <option class="form-control" value='export'>Export</option>
                            @elseif($role == 'export')
                              <option class="form-control" selected value={{$role}}>{{Str::title($role)}}</option>
                              <option class="form-control" value='import'>Import</option>
                            @endif
                        </select>
                    </div>

                   @if($hs_code && $desc && $hs_code !== ' ' && $desc !== ' ')
                        <div class="searchbox col-sm-3 col-md-3 col-lg-3">
                            <input type="text" placeholder="Description" class="form-control" name="description" id="description" value ="{{$desc}}">
                        </div>

                        <div class="searchbox col-sm-2 col-md-2 col-lg-2">
                            <input type="text" placeholder="HS Code" class="form-control" name="hs_code" id="hs_code" value ="{{$hs_code}}">
                        </div>
                    @elseif($hs_code && $hs_code !== ' ')
                        <div class="searchbox col-sm-3 col-md-3 col-lg-3">
                            <input type="text" placeholder="Description" class="form-control" name="description" id="description">
                        </div>

                        <div class="searchbox col-sm-2 col-md-2 col-lg-2">
                             <input type="text" placeholder="HS Code" class="form-control" name="hs_code" id="hs_code" value ="{{$hs_code}}">
                        </div>

                    @elseif($desc  && $desc !== ' ')
                        <div class="searchbox col-sm-3 col-md-3 col-lg-3">
                            <input type="text" placeholder="Description" class="form-control" name="description" id="description" value ="{{$desc}}">
                        </div>

                        <div class="searchbox col-sm-2 col-md-2 col-lg-2">
                            <input type="text" placeholder="HS Code" class="form-control" name="hs_code" id="hs_code">
                        </div>

                    @endif
                    <div class="searchbox col-sm-3 col-md-3 col-lg-3">
                        <button type="submit" class="ybtn ybtn-header-color" style="width: 100%;text-align: center;padding: 18px 0px 18px 0px;">
                            Search
                        </button>
                    </div>
                </div>

                @if($section_type == 'bl-data')
                    <input type="hidden" name="section_type" id="section_type" value="bl-data">
                @elseif($section_type == 'customs-data')
                    <input type="hidden" name="section_type" id="section_type" value="customs-data">
                @elseif($section_type == 'stat-data')
                    <input type="hidden" name="section_type" id="section_type" value="stat-data">
                @endif
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
                                        <div class="col-sm-4 col-md-3 col-lg-2 Flag" onclick="selectCountry('Panama', 'public/frontend/image/flags/panama_rectangular_icon_with_shadow_64.png', 'customs-data')">
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
                                        <div class="col-sm-4 col-md-3 col-lg-2 Flag" onclick="selectCountry('Argentina', 'public/frontend/image/flags/argentina_rectangular_icon_with_shadow_64.png', 'customs-data')">
                                            <img src="public/frontend/image/flags/argentina_rectangular_icon_with_shadow_64.png">
                                            <br>
                                            <a class="text-hover custom">
                                                <h4>Argentina</h4>
                                            </a>
                                        </div>
                                        <!--<div class="col-sm-4 col-md-3 col-lg-2 Flag" onclick="selectCountry('Brazil', 'public/frontend/image/flags/brazil_rectangular_icon_with_shadow_64.png', 'customs-data')">-->
                                        <!--    <img src="public/frontend/image/flags/brazil_rectangular_icon_with_shadow_64.png">-->
                                        <!--    <br>-->
                                        <!--    <a class="text-hover custom">-->
                                        <!--        <h4>Brazil</h4>-->
                                        <!--    </a>-->
                                        <!--</div>-->
                                        <div class="col-sm-4 col-md-3 col-lg-2 Flag" onclick="selectCountry('Chile', 'public/frontend/image/flags/chile_rectangular_icon_with_shadow_64.png', 'customs-data')">
                                            <img src="public/frontend/image/flags/chile_rectangular_icon_with_shadow_64.png">
                                            <br>
                                            <a class="text-hover custom">
                                                <h4>Chile</h4>
                                            </a>
                                        </div>
                                        <div class="col-sm-4 col-md-3 col-lg-2 Flag" onclick="selectCountry('Colombia', 'public/frontend/image/flags/colombia_rectangular_icon_with_shadow_64.png', 'customs-data')">
                                            <img src="public/frontend/image/flags/colombia_rectangular_icon_with_shadow_64.png">
                                            <br>
                                            <a class="text-hover custom">
                                                <h4>Colombia</h4>
                                            </a>
                                        </div>
                                        <div class="col-sm-4 col-md-3 col-lg-2 Flag" onclick="selectCountry('Ecuador', 'public/frontend/image/flags/ecuador_rectangular_icon_with_shadow_64.png', 'customs-data')">
                                            <img src="public/frontend/image/flags/ecuador_rectangular_icon_with_shadow_64.png">
                                            <br>
                                            <a class="text-hover custom">
                                                <h4>Ecuador</h4>
                                            </a>
                                        </div>
                                        <div class="col-sm-4 col-md-3 col-lg-2 Flag" onclick="selectCountry('Paraguay', 'public/frontend/image/flags/paraguay_rectangular_icon_with_shadow_64.png', 'customs-data')">
                                            <img src="public/frontend/image/flags/paraguay_rectangular_icon_with_shadow_64.png">
                                            <br>
                                            <a class="text-hover custom">
                                                <h4>Paraguay</h4>
                                            </a>
                                        </div>
                                        <div class="col-sm-4 col-md-3 col-lg-2 Flag" onclick="selectCountry('Peru', 'public/frontend/image/flags/peru_rectangular_icon_with_shadow_64.png', 'customs-data')">
                                            <img src="public/frontend/image/flags/peru_rectangular_icon_with_shadow_64.png">
                                            <br>
                                            <a class="text-hover custom">
                                                <h4>Peru</h4>
                                            </a>
                                        </div>
                                        <div class="col-sm-4 col-md-3 col-lg-2 Flag" onclick="selectCountry('Uruguay', 'public/frontend/image/flags/uruguay_rectangular_icon_with_shadow_64.png', 'customs-data')">
                                            <img src="public/frontend/image/flags/uruguay_rectangular_icon_with_shadow_64.png">
                                            <br>
                                            <a class="text-hover custom">
                                                <h4>Uruguay</h4>
                                            </a>
                                        </div>
                                        <div class="col-sm-4 col-md-3 col-lg-2 Flag" onclick="selectCountry('Venezuela', 'public/frontend/image/flags/venezuela_rectangular_icon_with_shadow_64.png', 'customs-data')">
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
                                        <div class="col-sm-4 col-md-3 col-lg-2 Flag" onclick="selectCountry('US', 'public/frontend/image/flags/united_states_of_america_rectangular_icon_with_shadow_64.png', 'bl-data')">
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
                                        <div class="col-sm-4 col-md-3 col-lg-2 Flag" onclick="selectCountry('Brazil', 'public/frontend/image/flags/brazil_rectangular_icon_with_shadow_64.png', 'bl-data')">
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
    {{-- @dd($country) --}}

    {{-- Result Table --}}
    {{-- @if($country == "US")
        @include('frontend.livedata.US.USTable')
    @elseif($country == 'Austria')
        @include('frontend.livedata.austria.austriaTable')
    @elseif($country == 'Ecuador')
        @include('frontend.livedata.Ecuador.EcTable')
    @elseif($country == 'Argentina')
        @include('frontend.livedata.Argentina.argentinaTable')
    @elseif($country == 'Panama')
        @include('frontend.livedata.Panama.panamaTable')
    @elseif($country == 'Paraguay')
        @include('frontend.livedata.Paraguay.paraguayTable')
    @elseif($country == 'Chile')
        @include('frontend.livedata.Chile.chileTable')
    @elseif($country == 'Uruguay')
        @include('frontend.livedata.Uruguay.uruguayTable')
    @elseif($country == 'Venezuela')
        @include('frontend.livedata.Venezuela.venezuelaTable')
    @elseif($country == 'Brazil')
        @include('frontend.livedata.Brazil.brazilTable')
    @elseif($country == 'Colombia')
        @include('frontend.livedata.Columbia.columbiaTable')
    @elseif($country == 'Peru')
        @include('frontend.livedata.Peru.peruTable')
    @endif --}}

    <section class="container-fluid pdt-2 pdb-2">
        <!-- Button Group -->
        <div class="d-flex justify-content-end mb-3">
            <div class="d-grid gap-2 d-md-block">
                <button class="btn btn-primary" type="button" id="table-view-btn">
                    Table View
                    <i class="fa-solid fa-table-cells me-3"></i>
                </button>
                <button class="btn btn-outline-primary" type="button" id="graphical-view-btn">
                    Graphical View
                    <i class="fa-solid fa-chart-pie me-3"></i>
                </button>
            </div>
        </div>

        <!-- Table View Section -->
        <div id="table-view" class="d-block">
            {{-- Result Table --}}
            @if($country == "US")
                @include('frontend.livedata.US.USTable')
            @elseif($country == 'Austria')
                @include('frontend.livedata.austria.austriaTable')
            @elseif($country == 'Ecuador')
                @include('frontend.livedata.Ecuador.EcTable')
            @elseif($country == 'Argentina')
                @include('frontend.livedata.Argentina.argentinaTable')
            @elseif($country == 'Panama')
                @include('frontend.livedata.Panama.panamaTable')
            @elseif($country == 'Paraguay')
                @include('frontend.livedata.Paraguay.paraguayTable')
            @elseif($country == 'Chile')
                @include('frontend.livedata.Chile.chileTable')
            @elseif($country == 'Uruguay')
                @include('frontend.livedata.Uruguay.uruguayTable')
            @elseif($country == 'Venezuela')
                @include('frontend.livedata.Venezuela.venezuelaTable')
            @elseif($country == 'Brazil')
                @include('frontend.livedata.Brazil.brazilTable')
            @elseif($country == 'Colombia')
                @include('frontend.livedata.Columbia.columbiaTable')
            @elseif($country == 'Peru')
                @include('frontend.livedata.Peru.peruTable')
            @endif
        </div>

        <!-- Graphical View Section -->
        <div id="graphical-view" class="d-none">
            @include('frontend.GraphView')
        </div>
    </section>

    {{-- table view or graphical view script --}}
    <script>
        // Get buttons and content divs
        const tableViewBtn = document.getElementById('table-view-btn');
        const graphicalViewBtn = document.getElementById('graphical-view-btn');
        const tableView = document.getElementById('table-view');
        const graphicalView = document.getElementById('graphical-view');

        // Function to toggle views
        function toggleView(view) {
          if (view === 'table') {
            // Show table view, hide graphical view
            tableView.classList.remove('d-none');
            graphicalView.classList.add('d-none');

            // Set button styles
            tableViewBtn.classList.add('btn-primary');
            tableViewBtn.classList.remove('btn-outline-primary');
            graphicalViewBtn.classList.add('btn-outline-primary');
            graphicalViewBtn.classList.remove('btn-primary');
          } else {
            // Show graphical view, hide table view
            graphicalView.classList.remove('d-none');
            tableView.classList.add('d-none');

            // Set button styles
            graphicalViewBtn.classList.add('btn-primary');
            graphicalViewBtn.classList.remove('btn-outline-primary');
            tableViewBtn.classList.add('btn-outline-primary');
            tableViewBtn.classList.remove('btn-primary');
          }
        }

        // Event listeners for buttons
        tableViewBtn.addEventListener('click', () => toggleView('table'));
        graphicalViewBtn.addEventListener('click', () => toggleView('graphical'));
    </script>



    <script>
    //     Highcharts.chart('container', {
    //         title: {
    //             text: 'Top Countries as shown on table',
    //             align: 'left'
    //         },
    //         xAxis: {
    //             categories: [
    //                 'Brazil', 'Peru', 'Bolivia', 'Colombia', 'Chile'
    //             ]
    //         },
    //         yAxis: {
    //             title: {
    //                 text: 'FOB US $'
    //             }
    //         },
    //         tooltip: {
    //             valueSuffix: ' FOB US $'
    //         },
    //         plotOptions: {
    //             series: {
    //                 borderRadius: '25%'
    //             }
    //         },
    //         series: [{
    //             type: 'column',
    //             name: 'Countries',
    //             data: [250, 300, 100, 500, 50]
    //         },{
    //             type: 'line',
    //             step: 'center',
    //             name: 'Average',
    //             data: [250, 300, 100, 500, 50],
    //             marker: {
    //                 lineWidth: 2,
    //                 lineColor: Highcharts.getOptions().colors[5],
    //                 fillColor: 'white'
    //             }
    //         },{
    //             type: 'pie',
    //             name: 'Total',
    //             data: [{
    //                 name: 'Brazil',
    //                 y: 250,
    //                 color: Highcharts.getOptions().colors[0], // 2020 color
    //                 dataLabels: {
    //                     enabled: true,
    //                     distance: -50,
    //                     format: '{point.total} M',
    //                     style: {
    //                         fontSize: '15px'
    //                     }
    //                 }
    //             }, {
    //                 name: 'peru',
    //                 y: 300,
    //                 color: Highcharts.getOptions().colors[1] // 2021 color
    //             }, {
    //                 name: 'Bolivia',
    //                 y: 100,
    //                 color: Highcharts.getOptions().colors[2] // 2022 color
    //             },  {
    //                 name: 'Colombia',
    //                 y: 500,
    //                 color: Highcharts.getOptions().colors[3] // 2022 color
    //             }, {
    //                 name: 'Chile',
    //                 y: 50,
    //                 color: Highcharts.getOptions().colors[4] // 2022 color
    //             }],
    //             center: [75, 65],
    //             size: 100,
    //             innerSize: '70%',
    //             showInLegend: false,
    //             dataLabels: {
    //                 enabled: false
    //             }
    //         }]
    //     });
    </script>

    <!-- Snackbar -->
    <div id="snackbar">
        Please select a country or provide either a description or HS Code.
    </div>

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
                    <img class="search_input_img" src="{{asset('${flagUrl}')}}" alt="${country} Flag">${country}
                </span>
            `;

            // Update the hidden input with the selected country and section type
            document.getElementById('selected-country').value = country;
            document.getElementById('section_type').value = sectionType;

            // Hide mega menu after selection
            closeMegaMenu();
        }

        // Show the mega menu when the select-box is clicked
        document.getElementById("country-select").addEventListener("click", function (event) {
            event.preventDefault(); // Prevent any default behavior
            event.stopPropagation(); // Prevent the event from bubbling up to the document

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

            // Update the current section type based on the active tab (custom or bl)
            currentSectionType = cityName === 'custom' ? 'custom' : 'bl';
            console.log("Current section type updated to:", currentSectionType);
        }

        // Open the mega menu with a fade-in effect
        function openMegaMenu() {
            const megaMenu = document.getElementById('mega-menu');
            megaMenu.style.display = 'block';
            setTimeout(() => {
                megaMenu.style.opacity = '1';
                megaMenu.classList.add('fade-in'); // Add fade-in class
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
            }, 500); // Delay for the fade-out effect

            // Remove the event listener to prevent unnecessary calls
            document.removeEventListener('click', closeOnClickOutside);
        }

        // Function to detect clicks outside the mega menu
        function closeOnClickOutside(event) {
            const megaMenu = document.getElementById('mega-menu');
            if (!megaMenu.contains(event.target) && event.target.id !== "country-select") {
                closeMegaMenu();
            }
        }

    </script>

    <!--old script wokring fine without outside closing of mega menu-->
    <script>
        // let currentSectionType = 'custom'; // Track the current section type

        // // Function to select country and display it in the select box
        // function selectCountry(country, flagUrl, sectionType) {
        //     const selectBox = document.getElementById("country-select");
        //     selectBox.innerHTML = `
        //         <span>
        //             <img class="search_input_img" src="{{asset('${flagUrl}')}}" alt="${country} Flag">${country}
        //         </span>
        //     `;

        //     // Update the hidden input with the selected country and section type
        //     document.getElementById('selected-country').value = country;
        //     document.getElementById('section_type').value = sectionType;

        //     // Hide mega menu after selection
        //     const megaMenu = document.getElementById('mega-menu');
        //     megaMenu.style.opacity = '0';
        //     setTimeout(() => {
        //         megaMenu.style.display = 'none';
        //     }, 500); // Delay for the fade-out effect
        // }

        // // Show the mega menu when the select-box is clicked
        // document.getElementById("country-select").addEventListener("click", function (event) {
        //     event.preventDefault(); // Prevent any default behavior

        //     const megaMenu = document.getElementById('mega-menu');

        //     // Toggle the mega menu display with a fade-in effect
        //     if (megaMenu.style.display === 'block') {
        //         megaMenu.style.opacity = '0';
        //         setTimeout(() => {
        //             megaMenu.style.display = 'none';
        //         }, 500); // Delay for fade-out effect
        //     } else {
        //         megaMenu.style.display = 'block'; // Show the mega menu
        //         setTimeout(() => {
        //             megaMenu.style.opacity = '1';
        //             megaMenu.classList.add('fade-in'); // Add fade-in class
        //         }, 10);
        //     }
        // });

        // // Switch tab content and update currentSectionType
        // function openCity(evt, cityName) {
        //     var i, tabcontent, tablinks;

        //     // Hide all tab content
        //     tabcontent = document.getElementsByClassName("tabcontent");
        //     for (i = 0; i < tabcontent.length; i++) {
        //         tabcontent[i].style.display = "none";
        //     }

        //     // Remove active class from all tab links
        //     tablinks = document.getElementsByClassName("tablinks");
        //     for (i = 0; i < tablinks.length; i++) {
        //         tablinks[i].className = tablinks[i].className.replace(" active-1", "");
        //     }

        //     // Show the selected tab content
        //     document.getElementById(cityName).style.display = "block";
        //     evt.currentTarget.className += " active-1";

        //     // Update the current section type based on the active tab (custom or bl)
        //     currentSectionType = cityName === 'custom' ? 'custom' : 'bl';
        //     console.log("Current section type updated to:", currentSectionType);
        // }
    </script>


    @include('frontend.tab_inc')
    @include('frontend.footer')
    @include('frontend.script')
</body>
</html>
