<div class="px-5 mb-12">

    @php
        $args = $args ?? [];
        $arg = $arg ?? [];
        // dd($filterby,$filterby1,$args,$searchDetails1,$arg);
        $searchDetailsParts = explode(',', $searchDetails1);
        $all_numeric = true;

        foreach ($searchDetailsParts as $part) {
            if (!is_numeric($part)) {
                $all_numeric = false;
                break;
            }
        }
    @endphp

    @if ($all_numeric)
        @php
            $filterdata = str_ireplace("-", " ", $filterdata??"null");
            $filterdata1 = str_ireplace("-", " ", $filterdata1??"null");

        @endphp
        {{-- old args 5 --}}
        @if(count($args) == 6)
            @if($filterby == 'hs_code')
                    <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">
                        {{$search_country}} Customs {{ $role }} Data under HS Code {{$searchDetails1}}
                    </h1>
                    <p class="text-center fs-6" style="word-break:break-word;">
                        Live {{ $role }} data of {{$search_country}} under the HS code {{$searchDetails1}}, our {{$search_country}} customs {{ $role }} data reports include the date, value, quantity,  product description, HS code, port, country, and {{$search_country}} {{ $role }}ers data
                    </p>
            @endif
            {{-- old args 7 --}}
        @elseif (count($args) == 8)

            @if ($filterby1 == 'hs_code')
                {{-- Handle hs_code logic --}}

            @elseif ($filterby1 == 'port')
                @if($filterby == 'hs_code')
                     @if($role == 'import')
                        <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">
                            {{ucfirst($search_country)}} Customs {{ucfirst($role)}} data under HS Code {{$filterdata}} via Port {{$filterdata1}}
                        </h1>
                        <p class="text-center fs-6" style="word-break:break-word;">
                            Live {{$role}} data of {{ucfirst($search_country)}} under the HS code {{$filterdata}} via port {{$filterdata1}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include the date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$role}}ers data
                        </p>
                     @elseif($role == 'export')
                        <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">
                           {{ucfirst($search_country)}} Customs {{ucfirst($role)}} data under HS Code {{$filterdata}} via Port {{$filterdata1}}
                        </h1>
                        <p class="text-center fs-6" style="word-break:break-word;">
                            Live {{$role}} data of {{ucfirst($search_country)}} under the HS code {{$filterdata}} via port {{$filterdata1}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include the date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$role}}ers data
                        </p>
                     @endif
                @elseif($filterby=='country')
                    <title>{{$search_country}} HS code {{$searchDetails1}}  {{$role}} Data from {{$filterdata}} At Port {{$filterdata1}}</title>
                    <meta name="description" content="{{$search_country}} imports data under the HS code {{$searchDetails1}} form {{$filterdata}} At Port {{$filterdata1}} . Our {{$search_country}} bill of lading data reports, which include HS code, date, b/l number, product description, loading and unloading ports, {{$search_country}} importer name, quantity, etc.">
                @endif
            @elseif ($filterby1 == 'country')
                @if($filterby == 'hs_code')
                     @if($role == 'import')

                        <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">
                            {{ucfirst($search_country)}} Customs {{ucfirst($role)}} Data under HS code {{$filterdata}} for {{$role}}s from {{$filterdata1}}
                        </h1>
                        <p class="text-center fs-6" style="word-break:break-word;">
                           Live {{$role}} data of {{ucfirst($search_country)}} {{$role}} from {{$filterdata1}} under the HS code {{$searchDetails1}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include the date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$role}}ers data
                        </p>
                     @elseif($role == 'export')
                        <h1 class="mb-3 text-center text-white font-medium text-2xl text-capitalize" style="word-break:break-word;">
                           {{ucfirst($search_country)}} Customs {{ucfirst($role)}} Data under HS code {{$filterdata}} for {{$role}}s to {{$filterdata1}}
                        </h1>
                        <p class="text-center fs-6" style="word-break:break-word;">
                           Live {{$role}} data of {{ucfirst($search_country)}} {{$role}} to {{$filterdata1}} under the HS code {{$searchDetails1}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include the date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$role}}ers data
                        </p>
                     @endif
                @elseif($filterby=='unloading_port')
                    <title> {{$search_country}} HS Code {{$filterdata}} {{$role}} data from {{$filterdata1}} </title>
                    <meta name="description" content="{{$search_country}} {{$role}}s data under the HS code {{$filterdata}} form {{$filterdata1}} .  Our bill of lading reports, which include hs code, date, b/l number, product description, loading and unloading ports, {{$search_country}} {{$role}}er name, quantity, etc.">
                @endif
            @endif
            {{-- old args 9 --}}
        @elseif (count($args) == 10)
            @if ($filterby1 == 'country')

               @if($filterby == 'port')
                    @if($role == 'import')
                        <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">{{ucfirst($search_country)}} Customs {{$role}} data under HS code {{$searchDetails1}} from {{$filterdata1}} via Port {{$filterdata}} </h1>
                        <p class="text-center fs-6" style="word-break:break-word;">Live {{$role}} data of {{ucfirst($search_country)}} {{$role}} from {{$filterdata1}} under the HS code {{$searchDetails1}} via port {{$filterdata}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include the date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$role}}ers data</p>
                    @elseif($role == 'export')
                        <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">{{ucfirst($search_country)}} Customs {{$role}} data under HS code {{$searchDetails1}} to {{$filterdata1}} via Port {{$filterdata}} </h1>
                        <p class="text-center fs-6" style="word-break:break-word;">Live {{$role}} data of {{ucfirst($search_country)}} {{$role}} to {{$filterdata1}} under the HS code {{$searchDetails1}} via port {{$filterdata}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include the date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$role}}ers data</p>
                    @endif
               @endif
            @elseif ($filterby1 == 'hs_code')
                @if($filterby == 'hs_code')
                    @if($role == 'import')
                        <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">
                            {{$search_country}} {{ $role }} Data from {{$filterdata}} At port {{$filterdata1}} by the HS Code {{$searchDetails1}}
                        </h1>
                        <p class="text-center fs-6" style="word-break:break-word;">
                            Search Live {{$search_country}} {{ $role }}s Data from {{$filterdata}} at port {{$filterdata1}} and Understand what Commodities {{$search_country}} {{ $role }}s from {{$filterdata}} at port {{$filterdata1}} under this HS Code
                        </p>
                    @elseif($role == 'export')
                        <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">
                            {{$search_country}} {{ $role }} Data to {{$filterdata}} At port {{$filterdata1}} by the HS Code {{$searchDetails1}}
                        </h1>
                        <p class="text-center fs-6" style="word-break:break-word;">
                            Search Live {{$search_country}} {{ $role }}s Data to {{$filterdata}} at port {{$filterdata1}} and Understand what Commodities {{$search_country}} {{ $role }}s to {{$filterdata}} At port {{$filterdata1}} under this HS Code
                        </p>
                    @endif
                @elseif($filterby ==  'unloading_port')
                     @if($role == 'import')
                        <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">
                            {{$search_country}} {{ $role }} Data from {{$filterdata}} At port {{$filterdata1}} by the HS Code {{$searchDetails1}}
                        </h1>
                        <p class="text-center fs-6" style="word-break:break-word;">
                            Search Live {{$search_country}} {{ $role }}s Data from {{$filterdata}} at port {{$filterdata1}} and Understand what Commodities {{$search_country}} {{ $role }}s from {{$filterdata}} at port {{$filterdata1}} under this HS Code
                        </p>
                     @elseif($role == 'export')
                        <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">
                            {{$search_country}} {{ $role }} Data to {{$filterdata}} At port {{$filterdata1}} by the HS Code {{$searchDetails1}}
                        </h1>
                        <p class="text-center fs-6" style="word-break:break-word;">
                            Search Live {{$search_country}} {{ $role }}s Data to {{$filterdata}} at port {{$filterdata1}} and Understand what Commodities {{$search_country}} {{ $role }}s to {{$filterdata}} At port {{$filterdata1}} under this HS Code
                        </p>
                     @endif
                @endif

            @elseif ($filterby1 == 'port')

                @if($filterby == 'hs_code')

                @elseif($filterby ==  'country')
                    @if($role == 'import')
                        <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">{{ucfirst($search_country)}} Customs {{$role}} data under HS code {{$searchDetails1}} from {{$filterdata}} via Port {{$filterdata1}} </h1>
                        <p class="text-center fs-6" style="word-break:break-word;">Live {{$role}} data of {{ucfirst($search_country)}} {{$role}} from {{$filterdata}} under the HS code {{$searchDetails1}} via port {{$filterdata1}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include the date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$role}}ers data</p>
                    @elseif($role == 'export')
                        <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">{{ucfirst($search_country)}} Customs {{$role}} data under HS code {{$searchDetails1}} to {{$filterdata}} via Port {{$filterdata1}} </h1>
                        <p class="text-center fs-6 text-capitalize" style="word-break:break-word;">Live {{$role}} data of {{ucfirst($search_country)}} {{$role}} to {{$filterdata}} under the HS code {{$searchDetails1}} via port {{$filterdata1}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include the date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$role}}ers data</p>
                    @endif
                @elseif($filterby == 'port')
                    <title>{{$search_country}} HS code {{$searchDetails1}}  {{$role}} Data from {{$filterdata}} At  {{$filterdata1}}</title>
                    <meta name="description" content="{{$search_country}} imports data under the HS code {{$searchDetails1}} form {{$filterdata}} At  {{$filterdata1}} . Our {{$search_country}} bill of lading data reports, which include HS code, date, b/l number, product description, loading and unloading ports, {{$search_country}} importer name, quantity, etc.">
                @endif
            @endif
            {{-- old args 9 --}}
        @elseif (count($arg) == 10)
            @if ($filterby2 == 'hs_code')
                 <title>{{$search_country}} HS code {{$searchDetails1}}  {{$role}} Data from {{$filterdata}} At  {{$filterdata1}}</title>
                 <meta name="description" content="{{$search_country}} imports data under the HS code {{$searchDetails1}} form {{$filterdata}} At {{$filterdata1}} . Our {{$search_country}} bill of lading data reports, which include HS code, date, b/l number, product description, loading and unloading ports, {{$search_country}} importer name, quantity, etc.">
            @elseif ($filterby2 == 'country')
                @if($filterby1 == 'hs_code')

                @elseif($filterby1 == 'port')
                    @if($role == 'import')
                        <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">
                            {{$search_country}} {{ $role }} Data from {{$filterdata1}} At Port {{$filterdata}} by the HS Code {{$searchDetails1}}
                        </h1>
                        <p class="text-center fs-6" style="word-break:break-word;">
                            Search Live {{$search_country}} {{ $role }}s Data from {{$filterdata1}} at port {{$filterdata}} and Understand what Commodities {{$search_country}} imports from {{$filterdata1}} At port {{$filterdata}} under this HS Code
                        </p>
                    @elseif($role == 'export')
                        <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">
                             {{$search_country}} {{ $role }} Data to {{$filterdata1}} At Port {{$filterdata}} by the HS Code {{$searchDetails1}}
                        </h1>
                        <p class="text-center fs-6" style="word-break:break-word;">
                            Search Live {{$search_country}} {{ $role }}s Data to {{$filterdata1}} at port {{$filterdata}} and Understand what Commodities {{$search_country}} {{ $role }}s to {{$filterdata1}} At port {{$filterdata}} under this HS Code
                        </p>
                    @endif
                 @endif
            @elseif ($filterby2 == 'port')
                 @if($filterby1 == 'hs_code')

                 @elseif($filterby1 == 'country')
                    @if($role == 'import')
                        <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">
                            {{$search_country}} {{ $role }} Data from {{$filterdata}} At Port by the HS Code {{$searchDetails1}}
                        </h1>
                        <p class="text-center fs-6" style="word-break:break-word;">
                            Search Live {{$search_country}} {{ $role }}s Data from {{$filterdata}} at port {{$filterdata1}} and Understand what Commodities {{$search_country}} imports from {{$filterdata}} At port {{$filterdata1}} under this HS Code
                        </p>
                    @elseif($role == 'export')
                        <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">
                             {{$search_country}} {{ $role }} Data to {{$filterdata}} At Port {{$filterdata1}} by the HS Code {{$searchDetails1}}
                        </h1>
                        <p class="text-center fs-6" style="word-break:break-word;">
                            Search Live {{$search_country}} {{ $role }}s Data to {{$filterdata}} at port {{$filterdata1}} and Understand what Commodities {{$search_country}} {{ $role }}s to {{$filterdata}} At port {{$filterdata1}} under this HS Code
                        </p>
                    @endif
                 @endif
            @endif
            {{-- old args 11 --}}
        @elseif (count($arg) == 12)
            @php
                $unloading_port = str_ireplace(" ", "-", $unloading_port);
            @endphp
            @if ($filterby2 == 'hs_code')
                {{-- Handle hs_code logic --}}

            @elseif ($filterby2 == 'country')
                {{-- Handle country logic --}}
            @elseif ($filterby2 == 'port')
                {{-- Handle unloading_port logic --}}
            @endif
        @else
            {{-- Handle else logic --}}
        @endif
    @else
        {{-- old args 7 --}}
        @if (count($args) == 8)

            @if($filterby1 == 'hs_code')
                <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">
                       {{$search_country}} Customs {{$role}} Data of {{$searchDetails1}} under HS code {{$filterdata1}}
                </h1>
                <p class="text-center fs-6" style="word-break:break-word;">
                     Live {{$searchDetails1}} {{$role}} data of {{$search_country}} under the HS code {{$filterdata1}}, our {{$search_country}} customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{$search_country}} {{$searchDetails1}} {{$role}}ers data
                </p>
            @elseif($filterby1 == 'country')
                @if($role == 'import')
                    <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">
                         {{$search_country}} Customs {{$role}} Data of {{$searchDetails1}} {{$role}}s from {{$filterdata1}}
                    </h1>
                    <p class="text-center fs-6" style="word-break:break-word;">
                       Live {{$searchDetails1}} {{$role}} data of {{$search_country}} {{$role}}s from {{$filterdata1}}, our {{$search_country}} customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{$search_country}} {{$searchDetails1}} {{$role}}ers data
                    </p>
                @elseif($role == 'export')
                     <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">
                       {{$search_country}} Customs {{$role}} Data of {{$searchDetails1}} {{$role}}s to {{$filterdata1}}
                    </h1>
                    <p class="text-center fs-6" style="word-break:break-word;">
                       Live {{$searchDetails1}} {{$role}} data of {{$search_country}} {{$role}}s to {{$filterdata1}}, our {{$search_country}} customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{$search_country}} {{$searchDetails1}} {{$role}}ers data
                    </p>
                @endif
            @elseif($filterby1 == 'port')
                 <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">
                        {{ucfirst($search_country)}} Customs {{ucfirst($role)}} Data of {{ucfirst($searchDetails1)}} {{ucfirst($role)}}s via Port {{$filterdata1}}
                    </h1>
                    <p class="text-center fs-6" style="word-break:break-word;">
                      Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{$search_country}} {{$role}}s via Port {{$filterdata1}}, our {{$search_country}} customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{$search_country}} {{ucfirst($searchDetails1)}} {{ucfirst($role)}}ers data
                    </p>
            @endif
            {{-- old args 9 --}}
        @elseif (count($args) == 10)
            @if ($filterby1 == 'country')
                @php
                    $unloading_port = str_ireplace(" ", "-", $unloading_port??"null");
                    $filterdata = str_ireplace(" ", "-", $filterdata);
                    $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                @endphp
                @if($filterby == 'hs_code')
                    @if($role == 'import')
                       <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">
                           {{$search_country}} Customs {{ucfirst($role)}} Data of {{$searchDetails1}} {{ucfirst($role)}}s from {{$filterdata1}} under HS Code {{$filterdata}}
                        </h1>
                         <p class="text-center fs-6" style="word-break:break-word;">Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} {{$role}}s from {{$filterdata1}} under the Hs code {{$filterdata}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data</p>
                    @elseif($role == 'export')
                        <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">
                            {{$search_country}} Customs {{ucfirst($role)}} Data of {{$searchDetails1}} {{ucfirst($role)}}s to {{$filterdata1}} under HS Code {{$filterdata}}
                        </h1>
                         <p class="text-center fs-6" style="word-break:break-word;">Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} {{$role}}s to {{$filterdata1}} under the Hs code {{$filterdata}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data</p>
                    @endif
                @elseif($filterby == 'port')
                    @if($role == 'import')
                        <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">
                            {{ucfirst($search_country)}} Customs {{$role}} Data of {{ucfirst($searchDetails1)}} {{ucfirst($role)}}s from {{$filterdata1}} via Port {{$filterdata}}
                        </h1>
                         <p class="text-center fs-6" style="word-break:break-word;">Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} {{$role}}s from {{$filterdata1}}  via port {{$filterdata}}, our Ecuador customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data</p>
                    @elseif($role == 'export')
                        <h1>{{ucfirst($search_country)}} Customs {{$role}} Data of {{ucfirst($searchDetails1)}} {{ucfirst($role)}}s to {{$filterdata1}} via Port {{$filterdata}}</h1>
                         <p class="text-center fs-6 text-md lg:text-lg" style="word-break:break-word;">Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} {{$role}}s to {{$filterdata1}}  via port {{$filterdata}}, our Ecuador customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data</p>
                    @endif
                @endif

            @elseif ($filterby1 == 'hs_code')
                @php
                    $base_search = $search;
                @endphp
                @if($filterdata == 'country')
                    @if($role == 'import')
                        <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">
                            {{$search_country}} Customs {{ucfirst($role)}} Data of {{$searchDetails1}} {{ucfirst($role)}}s from {{$filterdata1}} under HS Code {{$filterdata}}</h1>
                         <p class="text-center fs-6" style="word-break:break-word;">Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} {{$role}}s from {{$filterdata1}} under the Hs code {{$filterdata}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data</p>
                    @elseif($role == 'export')
                        <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">
                            {{$search_country}} Customs {{ucfirst($role)}} Data of {{$searchDetails1}} {{ucfirst($role)}}s to {{$filterdata1}} under HS Code {{$filterdata}}
                        </h1>
                         <p class="text-center fs-6" style="word-break:break-word;">Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} {{$role}}s to {{$filterdata1}} under the Hs code {{$filterdata}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data</p>
                    @endif
                @elseif($filterby == 'port')
                    @if($role == 'import')
                       <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">
                           {{$search_country}} Customs {{$role}} Data of {{$searchDetails1}} under HS Code {{$filterdata}} via Port {{$filterdata1}}
                        </h1>
                         <p class="text-center fs-6" style="word-break:break-word;">Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} under the HS code {{$filterdata}}, via Port {{$filterdata1}}, our {{ucfirst($search_country)}} customs export data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data</p>
                    @elseif($role == 'export')
                        <title>{{$search_country}} Customs {{$role}} Data of {{$searchDetails1}} under HS Code {{$filterdata}} via Port {{$filterdata1}}
                        </title>
                        <p class="text-center fs-6" style="word-break:break-word;">Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} under the HS code {{$filterdata}}, via Port {{$filterdata1}}, our {{ucfirst($search_country)}} customs export data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data</p>
                    @endif
                @endif
            @elseif ($filterby1 == 'port')
                @php
                    $base_search = $search;
                    $unloading_port = str_ireplace(" ", "-", $unloading_port??"null");
                    $filterdata1 = str_ireplace(" ", "-", $filterdata1??"null");
                @endphp

                @if($filterby=='hs_code')
                    @if($role == 'import')
                        <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">{{$search_country}} Customs {{$role}} Data of {{$searchDetails1}} under HS Code {{$filterdata}} via Port {{$filterdata1}}
                        </h1>
                         <p class="text-center fs-6" style="word-break:break-word;">Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} under the HS code {{$filterdata}}, via Port {{$filterdata1}}, our {{ucfirst($search_country)}} customs export data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data</p>
                    @elseif($role == 'export')
                        <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">
                            {{$search_country}} Customs {{$role}} Data of {{$searchDetails1}} under HS Code {{$filterdata}} via Port {{$filterdata1}}
                        </h1>
                         <p class="text-center fs-6" style="word-break:break-word;">Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} under the HS code {{$filterdata}}, via Port {{$filterdata1}}, our {{ucfirst($search_country)}} customs export data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data</p>
                    @endif
                @elseif($filterby == 'country')
                     {{-- @dd('In this block') --}}

                     @if($role == 'import')
                        <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">
                            {{ucfirst($search_country)}} Customs {{$role}} Data of {{ucfirst($searchDetails1)}} {{ucfirst($role)}}s from {{$filterdata}} via Port {{$filterdata1}}
                        </h1>
                        <p class="text-center fs-6" style="word-break:break-word;">Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} {{$role}}s from {{$filterdata}}  via port Data {{$filterdata1}}, our Ecuador customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data</p>
                     @elseif($role == 'export')
                        <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">
                            {{ucfirst($search_country)}} Customs {{$role}} Data of {{ucfirst($searchDetails1)}} {{ucfirst($role)}}s to {{$filterdata}} via Port {{$filterdata1}}
                        </h1>
                         <p class="text-center fs-6" style="word-break:break-word;">Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} {{$role}}s to {{$filterdata}}  via port Data {{$filterdata1}}, our Ecuador customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data
                         </p>
                     @endif
                @endif

            @endif

            {{-- old args 9 --}}
        @elseif (count($arg) == 10)
            @if ($filterby2 == 'country')
                {{-- Handle country logic --}}
            @elseif ($filterby2 == 'port')
                @php
                    $base_search = $search;

                @endphp
            @endif
            {{-- old args 11 --}}
        @elseif (count($arg) == 12)
            @if ($filterby2 == 'hs_code')
                @if($role == 'import')
                    <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">
                        {{$search_country}} {{$searchDetails1}} {{ $role }} data from {{$filterdata}} at port {{$filterdata1}} under the hs code {{$filter}}
                    </h1>
                    <p class="text-center fs-6 text-md lg:text-lg" style="word-break:break-word;">
                       Search live {{$search_country}} {{$searchDetails1}} {{ $role }}s data from {{$filterdata}} by the hs code {{$filter}} At port {{$filterdata1}} understand {{$search_country}} {{ $searchDetails1 }} {{ $role }}s activities from {{$filterdata}} At port {{$filterdata1}} under this hs code
                    </p>
                @elseif($role == 'export')
                    <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">
                        {{$search_country}} {{$searchDetails1}} {{ $role }} data to {{$filterdata}} at port {{$filterdata1}} under the hs code {{$filter}}
                    </h1>
                    <p class="text-center fs-6 text-md lg:text-lg" style="word-break:break-word;">
                       Search live {{$search_country}} {{$searchDetails1}} {{ $role }}s data to {{$filterdata}} by the hs code {{$filter}} At port {{$filterdata1}} understand {{$search_country}} {{ $searchDetails1 }} {{ $role }}s activities to {{$filterdata}} At port {{$filterdata1}} under this hs code
                    </p>
                @endif
            @elseif ($filterby2 == 'country')

                @php
                    $filterdata = str_ireplace(" ", "-", $filterdata);
                    $filterdata1 = str_ireplace(" ", "-", $filterdata1);

                @endphp
                @if($filterby1 == 'port')
                    @if($role == 'import')
                        <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">
                            {{ucfirst($search_country)}} Customs {{$role}} Data of {{ucfirst($searchDetails1)}} {{ucfirst($role)}}s from {{ucfirst($filterdata1)}} under the HS Code {{$filter}} via port {{$filterdata}}</h1>
                        <p class="text-center fs-6 text-md lg:text-lg" style="word-break:break-word;">
                            Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} {{ucfirst($role)}}s from {{ucfirst($filterdata1)}} under the HS code {{$filter}} via port {{$filterdata}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data
                        </p>
                    @elseif($role == 'export')
                        <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">
                            {{ucfirst($search_country)}} Customs {{$role}} Data of {{ucfirst($searchDetails1)}} {{ucfirst($role)}}s to {{ucfirst($filterdata1)}} under the HS Code {{$filter}} via port {{$filterdata}}
                        </h1>
                        <p class="text-center fs-6 text-md lg:text-lg" style="word-break:break-word;">
                            Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} {{ucfirst($role)}}s to {{ucfirst($filterdata1)}} under the HS code {{$filter}} via port {{$filterdata}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data
                        </p>
                    @endif
                @elseif($filterby1 == 'hs_code')
                    @if($role == 'import')
                        <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">
                            {{ucfirst($search_country)}} Customs {{ucfirst($role)}} Data of {{ucfirst($searchDetails1)}} {{ucfirst($role)}}s from {{ucfirst($filterdata)}} under the HS Code {{$filter}} via port {{$filterdata1}}
                        </h1>
                        <p class="text-center fs-6 text-md lg:text-lg" style="word-break:break-word;">
                            Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} {{ucfirst($role)}}s from {{ucfirst($filterdata)}} under the HS code {{$filter}} via port {{$filterdata1}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data
                        </p>
                    @elseif($role == 'export')
                        <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">
                            {{ucfirst($search_country)}} Customs {{ucfirst($role)}} Data of {{ucfirst($searchDetails1)}} {{ucfirst($role)}}s to {{ucfirst($filterdata)}} under the HS Code {{$filter}} via port {{$filterdata1}}
                        </h1>
                       <p class="text-center fs-6 text-md lg:text-lg" style="word-break:break-word;">
                           Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} {{ucfirst($role)}}s to {{ucfirst($filterdata)}} under the HS code {{$filter}} via port {{$filterdata1}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data
                        </p>
                    @endif
                @endif

            @elseif ($filterby2 == 'port')
                @php
                    $filterdata = str_ireplace(" ", "-", $filterdata);
                    $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                @endphp

                @if($role == 'import')
                    <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">
                       {{ucfirst($search_country)}} Customs {{$role}} Data of {{ucfirst($searchDetails1)}} {{ucfirst($role)}}s from {{ucfirst($filterdata)}} under the HS Code {{$filter}} via port {{$filterdata1}}
                    </h1>
                    <p class="text-center fs-6 text-md lg:text-lg" style="word-break:break-word;">Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} {{ucfirst($role)}}s from {{ucfirst($filterdata)}} under the HS code {{$filter}} via port {{$filterdata1}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data
                    </p>
                @elseif($role == 'export')
                    <h1 class="fs-2 mb-3 text-capitalize" style="word-break:break-word;">
                        {{ucfirst($search_country)}} Customs {{$role}} Data of {{ucfirst($searchDetails1)}} {{ucfirst($role)}}s to {{ucfirst($filterdata)}} under the HS Code {{$filter}} via port {{$filterdata1}}
                    </h1>
                    <p class="text-center fs-6 text-md lg:text-lg" style="word-break:break-word;"> {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} {{ucfirst($role)}}s to {{ucfirst($filterdata)}} under the HS code {{$filter}} via port {{$filterdata1}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data </p>
                @endif
            @endif
        @endif
    @endif

</div>
