<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bill of Lading Data of Mahindra Importer In US</title>
    @include('frontend.link')
    <style>
        #container {
            height: 550px;
            max-width: 850px;
            margin: 0 auto;
        }

        .highcharts-tooltip > span {
            padding: 10px;
            white-space: normal !important;
            width: 200px;
        }

        .loading {
            margin-top: 10em;
            text-align: center;
            color: gray;
        }

        .f32 .flag {
            vertical-align: middle !important;
        }
    </style>
</head>
<body>
    @include('frontend.header')

    <section class="container-fluid pdt-1 pdb-1 bg-green">
        <div class="d-flex justify-content-center align-items-center">
            <h1 class="fs-2 fw-500" style="color: white;">
                COMPANY INFORMATION
            </h1>
        </div>
    </section>

    <section class="container-fluid">
        <div class="pdt-2 pdb-2">
            <div class="row col-sm-12 col-md-12 col-lg-12">
                <div class="col-sm-1 col-md-3 col-lg-3">
                    <div class="datacard p-3">
                        <div class="aside-card">
                            <h6 class="text-muted">Name</h6>
                            <p class="fs-5">KIRWIN BROTHERS LTD.</p>
                        </div>
                        <div class="aside-card">
                            <h6 class="text-muted">Address</h6>
                            <p class="fs-5">North Quay Fish Docks Grimsby, DN31 3SY</p>
                        </div>
                        <div class="aside-card">
                            <h6 class="text-muted">City-State</h6>
                            <p class="fs-5">North East Lincolnshire</p>
                        </div>
                        <div class="aside-card">
                            <h6 class="text-muted">Country and Country Groups of Origin</h6>
                            <p class="fs-5">All Countries</p>
                        </div>
                        <div class="aside-card">
                            <h6 class="text-muted">Website</h6>
                            <p class="fs-5">-</p>
                        </div>
                        <div class="aside-card">
                            <h6 class="text-muted">E-Mail</h6>
                            <p class="fs-5">-</p>
                        </div>
                        <div class="aside-card">
                            <h6 class="text-muted">Phone</h6>
                            <p class="fs-5">-</p>
                        </div>
                        <div class="aside-card">
                            <h6 class="text-muted">Fax</h6>
                            <p class="fs-5">-</p>
                        </div>
                        <hr>
                        <div class="aside-card">
                            <h6 class="text-muted">Trademarks</h6>
                            <p class="fs-5">-</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1 col-md-9 col-lg-9">
                    <div class="mb-2 mt-2">
                        <h1 class="mb-3 fs-2 fw-500 text-center">
                            KIRWIN BROTHERS LTD.
                        </h1>
                        <div class="bg-bluish p-3 row col-sm-12 col-md-12 col-lg-12" style="border-radius: 1rem;">
                            <div class="col-sm-1 col-md-4 col-lg-4">
                                <div class="text-center p-2 d-flex justify-content-center align-items-center">
                                    <h1 class="fs-4 fw-500">
                                        5.28 M 
                                        <span class="fs-6 fw-400">
                                            Shipments
                                        </span> 
                                    </h1>
                                </div>
                            </div>
                            <div class="col-sm-1 col-md-4 col-lg-4 company-card-border">
                                <div class="text-center p-2 d-flex justify-content-center align-items-center">
                                    <h1 class="fs-4 fw-500">
                                        4 <span class="fs-6 fw-400">Trading Partners</span> 
                                    </h1>
                                </div>
                            </div>
                            <div class="col-sm-1 col-md-4 col-lg-4">
                                <div class="text-center p-2 d-flex justify-content-center align-items-center">
                                    <h1 class="fs-4 fw-500">
                                        USD 88.85 M <span class="fs-6 fw-400">Trade Value</span> 
                                    </h1>
                                </div>
                            </div>
                        </div>
                        {{-- <button type="button" class="btn btn-success">
                            Download
                        </button> --}}
                    </div>
                    <div class="datatable">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="table-primary-custom">
                                    <th>
                                        <h1 class="fs-5 fw-500">Date</h1>
                                    </th>
                                    <td>
                                        <p class="fs-6 fw-400">31/May/2024</p>
                                    </td>
                                </tr>
                                <tr class="table-secondary-custom">
                                    <th>
                                        <h1 class="fs-5 fw-500">Bill Type</h1>
                                    </th>
                                    <td>
                                        <p class="fs-6 fw-400">HOUSE BILL</p>
                                    </td>
                                </tr>
                                <tr class="table-primary-custom">
                                    <th>
                                         <h1 class="fs-5 fw-500">Bill Of Lading Number</h1>
                                    </th>
                                    <td>
                                        <p class="fs-6 fw-400">MAEU237543147</p>
                                    </td>
                                </tr>
                                <tr class="table-secondary-custom">
                                    <th>
                                        <h1 class="fs-5 fw-500">US IMPORTER NAME</h1>
                                    </th>
                                    <td>
                                        <p class="fs-6 fw-400">GOLANI INTERNATIONAL ENTERPRISES LL</p>
                                    </td>
                                </tr>
                                <tr class="table-primary-custom">
                                    <th>
                                        <h1 class="fs-5 fw-500">US IMPORTER ADDRESS</h1>
                                    </th>
                                    <td>
                                        <p class="fs-6 fw-400">
                                            11013 NW 30TH STREET, SUITE 105,D ORAL, FL, 33172,USA
                                        </p>
                                    </td>
                                </tr>
                                <tr class="table-secondary-custom">
                                    <th>
                                        <h1 class="fs-5 fw-500">
                                            FOREIGN EXPORTER NAME
                                        </h1>
                                    </th>
                                    <td>
                                        <p class="fs-6 fw-400">
                                            GENERAL RUBBER THAILAND CO.,LTD
                                        </p>
                                    </td>
                                </tr>
                                <tr class="table-primary-custom">
                                    <th>
                                        <h1 class="fs-5 fw-500">
                                            FOREIGN EXPORTER ADDRESS
                                        </h1>
                                    </th>
                                    <td>
                                        <p class="fs-6 fw-400">
                                            NO.7/538 MOO.6 T. MABYANGPORN,
                                            A.PLU AKDAENG, RAYONG 21140 
                                            HEADOFFICE
                                        </p>
                                    </td>
                                </tr>
                                <tr class="table-secondary-custom">
                                    <th>
                                        <h1 class="fs-5 fw-500">
                                            NOTIFY PARTY NAME
                                        </h1>
                                    </th>
                                    <td>
                                        <p class="fs-6 fw-400">
                                            GOLANI INTERNATIONAL ENTERPRISES LL
                                        </p>
                                    </td>
                                </tr>
                                <tr class="table-primary-custom">
                                    <th>
                                        <h1 class="fs-5 fw-500">
                                            NOTIFY PARTY ADDRESS
                                        </h1>
                                    </th>
                                    <td>
                                        <p class="fs-6 fw-400">
                                            11013 NW 30TH STREET,
                                            SUITE 105,D ORAL, FL, 
                                            33172,USA
                                        </p>
                                    </td>
                                </tr>
                                <tr class="table-secondary-custom">
                                    <th>
                                        <h1 class="fs-5 fw-500">
                                            HS CODE
                                        </h1>
                                    </th>
                                    <td>
                                        <p class="fs-6 fw-400">
                                            40111000
                                        </p>
                                    </td>
                                </tr>
                                <tr class="table-primary-custom">
                                    <th>
                                        <h1 class="fs-5 fw-500">
                                            Product Description
                                        </h1>
                                    </th>
                                    <td>
                                        <p class="fs-6 fw-400">
                                            PASSENGER CAR RADIALHS CODE : 4011.10.000
                                        </p>
                                    </td>
                                </tr>
                                <tr class="table-secondary-custom">
                                    <th>
                                        <h1 class="fs-5 fw-500">
                                            Quantity
                                        </h1>
                                    </th>
                                    <td>
                                        <p class="fs-6 fw-400">
                                            1536
                                        </p>
                                    </td>
                                </tr>
                                <tr class="table-primary-custom">
                                    <th>
                                        <h1 class="fs-5 fw-500">
                                            Unit
                                        </h1>   
                                    </th>
                                    <td>
                                        <p class="fs-6 fw-400">
                                            PCS
                                        </p>
                                    </td>
                                </tr>
                                <tr class="table-secondary-custom">
                                    <th>
                                        <h1 class="fs-5 fw-500">
                                            WEIGHT
                                        </h1>
                                    </th>
                                    <td>
                                        <p class="fs-6 fw-400">
                                            18545
                                        </p>
                                    </td>
                                </tr>
                                <tr class="table-primary-custom">
                                    <th>
                                        <h1 class="fs-5 fw-500">
                                            WEIGHT UNIT
                                        </h1>
                                    </th>
                                    <td>
                                        <p class="fs-6 fw-400">KG</p>
                                    </td>
                                </tr>
                                <tr class="table-secondary-custom">
                                    <th>
                                        <h1 class="fs-5 fw-500">TEU</h1>
                                    </th>
                                    <td>
                                        <p class="fs-6 fw-400">4</p>
                                    </td>
                                </tr>
                                <tr class="table-primary-custom">
                                    <th>
                                        <h1 class="fs-5 fw-500">
                                            LOADING PORT
                                        </h1>
                                    </th>
                                    <td>
                                        <p class="fs-6 fw-400">
                                            SINGAPORE
                                        </p>
                                    </td>
                                </tr>
                                <tr class="table-secondary-custom">
                                    <th>
                                        <h1 class="fs-5 fw-500">
                                            UNLOADING PORT
                                        </h1>
                                    </th>
                                    <td>
                                        <p class="fs-6 fw-400">
                                            SINGAPORE
                                        </p>
                                    </td>
                                </tr>
                                <tr class="table-primary-custom">
                                    <th>
                                        <h1 class="fs-5 fw-500">
                                            ORIGIN COUNTRY
                                        </h1>
                                    </th>
                                    <td>
                                        <p class="fs-6 fw-400">
                                            SINGAPORE
                                        </p> 
                                    </td>
                                </tr>
                                <tr class="table-secondary-custom">
                                    <th>
                                        <h1 class="fs-5 fs-500">
                                            SHIPPING COUNTRY
                                        </h1>
                                    </th>
                                    <td>
                                        <p class="fs-6 fw-400">
                                            DENMARK
                                        </p>
                                    </td>
                                </tr>
                                <tr class="table-primary-custom">
                                    <th>
                                        <h1 class="fs-5 fw-500">
                                            DESTINATION COUNTRY
                                        </h1>
                                    </th>
                                    <td>
                                        <h1 class="fs-6 fw-400">
                                            UNITED STATES
                                        </h1>
                                    </td>
                                </tr>
                                <tr class="table-secondary-custom">
                                    <th>
                                        <h1 class="fs-5 fw-500">
                                            TRANSPORT TYPE
                                        </h1>
                                    </th>
                                    <td>
                                        <p class="fs-6 fw-400">
                                            SEA CONTAINERIZED
                                        </p>
                                    </td>
                                </tr>
                                <tr class="table-primary-custom">
                                    <th>
                                        <h1 class="fs-5 fs-500">   
                                            CARRIER NAME
                                        </h1>
                                    </th>
                                    <td>
                                        <p class="fs-6 fw-400">
                                            LVLO
                                        </p>
                                    </td>
                                </tr>
                                <tr class="table-secondary-custom">
                                    <th>
                                        <h1 class="fs-5 fw-500">
                                            VESSEL NAME
                                        </h1>
                                    </th>
                                    <td>
                                        <p class="fs-6 fw-400">
                                            GERDA MAERSK
                                        </p>
                                    </td>
                                </tr>
                                <tr class="table-primary-custom">
                                    <th>
                                        <h1 class="fs-5 fs-500">
                                            CONTAINER NUMBER
                                        </h1>
                                    </th>
                                    <td>
                                        <p class="fs-6 fw-400">
                                            MSKU0926276
                                        </p>
                                    </td>
                                </tr>
                                <tr class="table-secondary-custom">
                                    <th>
                                        <h1 class="fs-5 fw-500">
                                            MEASUREMENT
                                        </h1>
                                    </th>
                                    <td>
                                        <p class="fs-6 fw-400">
                                            CUBIC
                                        </p>
                                    </td>
                                </tr>
                                <tr class="table-primary-custom">
                                    <th>
                                        <p class="fs-5 fw-500">
                                            VOYAGE
                                        </p>
                                    </th>
                                    <td>
                                        <p class="fs-6 fw-400">
                                            414W
                                        </p>
                                    </td>
                                </tr>
                                <tr class="table-secondary-custom">
                                    <th>
                                        <h1 class="fs-5 fw-500">
                                            CONVEYANCE
                                        </h1>   
                                    </th>
                                    <td>
                                        <p class="fs-6 fw-400">
                                            CONVEYANCE NAME: GERDA MAERSK
                                        </p>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid">
        <div class="bg-white pdt-2 pdb-2">
            <div>
                <h1 class="fs-3 fw-500 text-center">
                    Reveal patterns in global trade
                </h1>
            </div>
            <div id="container"></div>
        </div>
    </section>
    
    {{-- Map js --}}
    <script>
        (async () => {
        
            const topology = await fetch(
                'https://code.highcharts.com/mapdata/custom/world.topo.json'
            ).then(response => response.json());

            const data = {!! json_encode($data) !!};
        
            // Prevent logarithmic errors in color calculation
            data.forEach(function (p) {
                p.value = (p.value < 1 ? 1 : p.value);
            });
        
            // Initialize the chart
            Highcharts.mapChart('container', {
        
                chart: {
                    map: topology
                },
        
                title: {
                    text: ''
                },
        
                legend: {
                    title: {
                        text: '',
                    }
                },
        
                mapNavigation: {
                    enabled: false,
                    buttonOptions: {
                        verticalAlign: ''
                    }
                },
        
                tooltip: {
                    backgroundColor: 'none',
                    borderWidth: 0,
                    shadow: false,
                    useHTML: true,
                    padding: 0,
                    pointFormat: '<span class="f32"><span class="flag ' +
                        '{point.properties.hc-key}">' +
                        '</span></span> <p style="font-size:18px;font-weight:500;margin:0;">{point.name}</p><br>' +
                        '<span style="font-size:18px;font-weight:500;">{point.import} $ (Import)</span><br>' +
                        '<span style="font-size:18px;font-weight:500;">{point.export} $ (Export)</span>',
                    positioner: function () {
                        return { x: 0, y: 250 };
                    }
                },
        
                series: [{
                    data: data,
                    joinBy: ['iso-a3', 'code3'],
                    name: ''
                }]
            });
        
        })();
    </script>

    @include('frontend.footer')
    @include('frontend.script')
</body>
</html>