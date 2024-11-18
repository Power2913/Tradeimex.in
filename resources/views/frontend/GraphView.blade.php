<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-8">
        <figure class="highcharts-figure">
            <div id="container"></div>
        </figure>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="pdt-2 pdb-2">
            <div class="d-flex flex-column">
                <h2 class="text-start fs-5 mb-2 font-semibold">
                    Select Operation Of Data
                </h2>
                <div>
                    <select name="operation" class="form-select form-select-md mb-3" aria-label=".form-select-md example">
                        <option value="countries">Countries</option>
                        <option value="tariff">Tariff</option>
                        <option value="companies">Companies</option>
                    </select>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="table-primary p-2">
                                <h2 class="fs-5 font-semibold text-center mb-0">
                                    No.
                                </h2>
                            </th>
                            <th class="table-primary p-2">
                                <h2 class="fs-5 font-semibold text-center mb-0">
                                    Countries
                                </h2>
                            </th>
                            <th class="table-primary p-2">
                                <h2 class="fs-5 font-semibold text-center mb-0">
                                    FOB US$
                                </h2>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $Dresult = $result;
                            $hsCodeCounts = [];
                            $hsCodeData = [];
                            $Graph = $Dresult;

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

                        @endphp

                        @if(count($hsCodeCounts) > 0)
                            @php
                                $iteration = 0;
                                $i=1;
                                $DisplayedCountry = [];
                            @endphp
                            @foreach ($hsCodeCounts as $count_hs_code => $count)
                                @php
                                    $Dresult = $hsCodeData[$count_hs_code];  // Get the first record for each HS_CODE
                                @endphp

                                @php
                                    $iteration++;
                                    $res_hs_code = $Dresult->HS_CODE;
                                    $origin_country = $Dresult->ORIGIN_COUNTRY;
                                    $us_fob = $Dresult->US_FOB??"null";
                                @endphp
                                @if(!array_key_exists($origin_country,$DisplayedCountry) && $origin_country != 'null')
                                    <tr>
                                        <td class="fs-light text-center text-gray p-3">
                                            {{ $i }}
                                        </td>
                                        <td class="fs-light text-center text-gray p-3">
                                            {{ $origin_country }}
                                        </td>
                                        <td class="fs-light text-center text-gray p-3">
                                            {{ $Dresult->US_FOB??"null" }}
                                        </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endif
                                @php
                                    $DisplayedCountry[$origin_country] = $us_fob;
                                @endphp
                                @if($iteration >= 10)
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
        </div>
    </div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

@php
    $categories = [];
    $columnData = [];
    $lineData = [];
    $pieData = [];
    $i = 0;
    $DisplayedGraphCountry = [];
    $graphResult = $Graph;
    foreach ($DisplayedCountry as $country=>$fob_value) {
        $origin_country = $country;
        $fob_value = $fob_value;
        $i++;

        if(!in_array($origin_country,$DisplayedGraphCountry) && $origin_country != 'null') {
            $categories[] = $origin_country;
            $columnData[] = $fob_value;
            $lineData[] = $fob_value;
            $pieData[] = [
                'name' => $origin_country,
                'y' => $fob_value,
                'color' => 'color' . (count($pieData) + 1) // Use a placeholder for color
            ];
            if($i >= 10) {
                break;
            }
            $DisplayedGraphCountry[] = $origin_country;
        }
    }
@endphp

<script>
    Highcharts.chart('container', {
        title: {
            text: 'Top Countries as shown on table',
            align: 'left'
        },
        xAxis: {
            categories: <?php echo json_encode($categories); ?>
        },
        yAxis: {
            title: {
                text: 'FOB US $'
            }
        },
        tooltip: {
            valueSuffix: ' FOB US $'
        },
        plotOptions: {
            series: {
                borderRadius: '25%'
            }
        },
        series: [{
            type: 'column',
            name: 'Countries',
            data: <?php echo json_encode($columnData); ?>
        }, {
            type: 'line',
            step: 'center',
            name: 'Average',
            data: <?php echo json_encode($lineData); ?>,
            marker: {
                lineWidth: 2,
                lineColor: Highcharts.getOptions().colors[5],
                fillColor: 'white'
            }
        }, {
            type: 'pie',
            name: 'Total',
            data: <?php echo json_encode($pieData); ?>,
            center: [75, 65],
            size: 100,
            innerSize: '70%',
            showInLegend: false,
            dataLabels: {
                enabled: false
            }
        }]
    });
</script>
