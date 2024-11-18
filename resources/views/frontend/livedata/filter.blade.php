       {{-- filter --}}
    <section class="container-fluid bg-bluish">
        <div class="container pdt-2 pdb-2">
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

                                @if(!empty($groupedData))
                                    @foreach($groupedData as $twoDigit => $sixDigitGroup)
                                        <li>
                                            <span onclick="toggleNested('two-{{ $twoDigit }}', this)" style="cursor: pointer;">
                                                <i class="fa-regular fa-square-plus fa-lg me-2" style="color: #0d6efd;"></i>
                                                <i class="fa-regular fa-square-minus fa-lg me-2" style="color: #0d6efd; display:none;"></i>
                                            </span>
                                                @php
                                                    if ($hs_code && $desc && $hs_code !== ' ' && $desc !== ' ') {
                                                         //dd("inn this block",$search,$base_desc);
                                                        # code...
                                                        $hs_code_url = route('search-filter', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'search'=>$product,'base_search' => $desc, 'filterby' => 'hs_code', 'filterdata' => $twoDigit??"null"]);

                                                    } elseif($desc!==' ' && $desc !== null) {
                                                        # code...
                                                        //dd("inn this desc block",$base_desc);
                                                        $hs_code_url = route('search-filter', ['section_type' => $section_type,'country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_desc, 'filterby' => 'hs_code', 'filterdata' => $twoDigit??"null"]);
                                                    } elseif ($hs_code!==' ' && $hs_code!==null) {
                                                        # code...
                                                        //dd('In hs_code group');
                                                        $hs_code_url = route('hs-code', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'filterby' => 'hs_code', 'filterdata' => $twoDigit]);
                                                    }
                                                @endphp
                                            <a href="{{ $hs_code_url }}" class="fs-5 fw-normal">
                                                {{ $twoDigit }} ({{ array_sum(array_map('array_sum', $sixDigitGroup)) }})
                                            </a>
                                            <hr style="margin: 6px;">
                                            <ul id="two-{{ $twoDigit }}" style="display:none;padding-left: 18px;">
                                                @foreach($sixDigitGroup as $sixDigit => $eightDigitGroup)
                                                    <li>
                                                        <span class="toggler" onclick="toggleNested('six-{{ $sixDigit }}', this)" style="cursor: pointer;">
                                                            <i class="fa-regular fa-square-plus fa-lg me-2" style="color: #0d6efd;"></i>
                                                            <i class="fa-regular fa-square-minus fa-lg me-2" style="color: #0d6efd; display:none;"></i>
                                                        </span>
                                                        @php
                                                            if ($hs_code && $desc && $hs_code !== ' ' && $desc !== ' ') {
                                                                 //dd("inn this block",$search,$base_desc);
                                                                # code...
                                                                $hs_code_url = route('search-filter', ['section_type' => $section_type,'country'=>$country,'type' => $type, 'role' => $role,'search'=>$product,'base_search' => $desc, 'filterby' => 'hs_code', 'filterdata' => $sixDigit ?? "null"]);

                                                            }elseif($desc!==' ' && $desc !== null){
                                                                # code...
                                                                //dd("inn this desc block",$base_desc);
                                                                $hs_code_url = route('search-filter', ['section_type' => $section_type,'country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_desc, 'filterby' => 'hs_code', 'filterdata' => $sixDigit ?? "null"]);
                                                            } elseif ($hs_code!==' ' && $hs_code!==null) {
                                                                # code...
                                                                //dd('In hs_code group');
                                                                $hs_code_url = route('hs-code', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'filterby' => 'hs_code', 'filterdata' => $sixDigit ?? "null"]);
                                                            }
                                                        @endphp

                                                        <a href="{{ $hs_code_url }}" class="fs-5 fw-normal">
                                                            {{ $sixDigit }} ({{ array_sum($eightDigitGroup) }})
                                                        </a>
                                                        <hr style="margin: 6px;">
                                                        <ul id="six-{{ $sixDigit }}" style="display:none;padding-left: 24px;">
                                                            @foreach($eightDigitGroup as $hsCode => $count)
                                                                <li>
                                                                    @php
                                                                        if ($hs_code && $desc && $hs_code !== ' ' && $desc !== ' ') {
                                                                             //dd("inn this block",$search,$base_desc);
                                                                            # code...
                                                                            $hs_code_url = route('search-filter', ['section_type' => $section_type,'country'=>$country,'type' => $type, 'role' => $role,'search'=>$product,'base_search' => $desc, 'filterby' => 'hs_code', 'filterdata' => $hsCode ?? "null"]);

                                                                        }elseif($desc!==' ' && $desc !== null) {
                                                                            # code...
                                                                            //dd("inn this desc block",$base_desc);
                                                                            $hs_code_url = route('search-filter', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_desc, 'filterby' => 'hs_code', 'filterdata' => $hsCode ?? "null"]);
                                                                        } elseif ($hs_code!==' ' && $hs_code!==null) {
                                                                            # code...
                                                                            //dd('In hs_code group');
                                                                            $hs_code_url = route('hs-code', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'filterby' => 'hs_code', 'filterdata' => $hsCode ?? "null"]);
                                                                        }
                                                                    @endphp

                                                                    <a href="{{ $hs_code_url }}" class="fs-5 fw-normal">
                                                                        {{ $hsCode }} ({{ $count }})
                                                                    </a>
                                                                    <hr style="margin: 6px;">
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

                                @if(isset($countryCounts) && count($countryCounts) > 0)
                                    @foreach ($countryCounts as $res_country=>$counts)
                                        @php
                                            // Ensure that both $country and $origin_country are handled separately and not overwritten
                                            $formatted_country = str_ireplace(" ", "-", $res_country); // For $country variable

                                            // Country URL logic
                                                if ($hs_code && $desc && $hs_code !== ' ' && $desc !== ' ') {
                                                    # code...
                                                    $country = str_ireplace(" ", "-", $country);

                                                    $country_url =  route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'filterby2' => 'country','filterby'=>$product,'filter'=>$desc,'filterby1'=>$hscode,'filterdata' => $res_hs_code, 'filterdata1' => $formatted_country ?? "null"]);
                                                } elseif ($hs_code!==' ' && $hs_code!==null) {
                                                    # code...
                                                    $country_url = route('search-filter', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_hs_code, 'filterby' => 'country', 'filterdata' => $formatted_country ?? "null"]);
                                                } elseif ($desc!==' ' && $desc !== null) {
                                                    # code...
                                                    $country = str_ireplace(" ", "-", $country);

                                                    $country_url = route('search-filter', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_desc??"null", 'filterby' => 'country', 'filterdata' => $formatted_country ?? "null"]);
                                                }
                                        @endphp

                                        <li class="mb-2">
                                            <a href="{{ $country_url }}" class="fs-5" style="font-weight: 400;">
                                                {{ $formatted_country }}({{$counts}})
                                                <hr style="margin: 8px;">
                                            </a>
                                        </li>
                                    @endforeach
                                @else
                                    <li>No origin countries found.</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- @dd($section_type) --}}
                @if($section_type != 'stat-data')
                    {{-- Unloading Port --}}
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
                                            $unloading_port = $item->UNLOADING_PORT??'null';
                                            if(isset($unloadingPortsCount[$unloading_port])){
                                            $unloadingPortsCount[$unloading_port]++;
                                            }else{
                                            $unloadingPortsCount[$unloading_port] = 1;
                                            }
                                            // Only add unique unloading ports
                                            arsort($unloadingPortsCount);
                                        }
                                    @endphp

                                    @if(isset($unloadingPortsCount) && count($unloadingPortsCount) > 0)
                                        @foreach ($unloadingPortsCount as $unloading_port=>$count)
                                            @php
                                                // Replace spaces with dashes for the URL
                                                $formatted_port = str_ireplace(" ", "-", $unloading_port);

                                                // Generate the URL for the unloading port

                                                if ($hs_code && $desc && $hs_code !== ' ' && $desc !== ' ') {
                                                    # code...
                                                    $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                                    $port_url = route('searchfiltertwo', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'filterby2' => 'port','filterby'=>$product,'filter'=>$desc,'filterby1'=>$hscode,'filterdata' => $hs_code ,'filterdata1' => $formatted_port ?? "null"]);
                                                }
                                                elseif ($hs_code!==' ' && $hs_code!==null) {
                                                    # code...
                                                    $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                                    $port_url = route('search-filter', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_hs_code, 'filterby' => 'port', 'filterdata' => $formatted_port ?? "null"]);
                                                } elseif($desc!==' ' && $desc !== null) {
                                                    # code...
                                                    $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                                    $port_url = route('search-filter', ['section_type' => $section_type, 'country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_desc, 'filterby' => 'port', 'filterdata' => $formatted_port ?? "null"]);
                                                }
                                            @endphp

                                            <li class="mb-2">
                                                <a href="{{ $port_url }}" class="fs-5" style="font-weight: 400;">
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
