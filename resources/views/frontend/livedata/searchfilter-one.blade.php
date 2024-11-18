<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="icon" type="image/x-icon" href="{{asset('public/frontend/image/img/Favicon Logo.png')}}">
    @include('frontend.link')
    @php
        $Dresult = $result;
        $count = 0;
    @endphp
    @if(isset($Dresult) && $Dresult->count() > 0)
        @foreach ($Dresult as $Dresult)
            {{-- @dd($searchDetails1) --}}
            @php
                $count++;
                $res_hs_code = $Dresult->HS_CODE;
                // $country = $Dresult->ORIGIN_COUNTRY;
                // $country = str_ireplace(" ", "-", $country);
                $unloading_port = $Dresult->UNLOADING_PORT??'null';
                $args = $args ?? [];
                $arg = $arg ?? [];
                // dd($role,$filterby1,$filterby,$args,'searchDetails1',$searchDetails1,'filterdata',$filterdata,'filterdata1',$filterdata1,'Search',$search??"null",$arg);
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
                    $filterdata = str_ireplace(" ", "-", $filterdata);
                    $filterdata1 = str_ireplace(" ", "-", $filterdata1??"null");
                    $unloading_port = str_ireplace(" ", "-", $unloading_port);
                @endphp
                {{-- old args 5 --}}
                @if(count($args)== 6)
                    @if($filterby == 'hs_code')
                        <title>{{ucfirst($search_country)}} Customs {{ucfirst($role)}} Data under HS Code {{$filterdata}}</title>
                        <meta name="description" content="Live {{$role}} data of {{ucfirst($search_country)}} under the HS code {{$filterdata}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include the date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$role}}ers data">
                    @elseif($filterby=='country')
                        <title>US HS code {{$searchDetails1}}  {{$role}} Data from {{$filterdata}} At Port {{$filterdata1}}</title>
                        <meta name="description" content="USA imports data under the HS code {{$searchDetails1}} form {{$filterdata}} At Port {{$filterdata1}} . Our US bill of lading data reports, which include HS code, date, b/l number, product description, loading and unloading ports, us importer name, quantity, etc.">
                    @endif
                    {{-- old args 7 --}}
                @elseif(count($args) == 8)
                    @if ($filterby1 == 'hs_code')
                        {{-- Handle hs_code logic --}}
                    @elseif ($filterby1 == 'port')
                        @if($filterby == 'hs_code')
                           <title>{{ucfirst($search_country)}} Customs {{ucfirst($role)}} data under HS Code {{$filterdata}} via Port {{$filterdata1}}</title>
                            <meta name="description" content="Live {{$role}} data of {{ucfirst($search_country)}} under the HS code {{$filterdata}} via port {{$filterdata1}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include the date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$role}}ers data">
                        @elseif($filterby=='country')
                            <title>US HS code {{$searchDetails1}}  {{$role}} Data from {{$filterdata}} At Port {{$filterdata1}}</title>
                            <meta name="description" content="USA imports data under the HS code {{$searchDetails1}} form {{$filterdata}} At Port {{$filterdata1}} . Our US bill of lading data reports, which include HS code, date, b/l number, product description, loading and unloading ports, us importer name, quantity, etc.">
                        @endif
                    @elseif ($filterby1 == 'country')
                        @if($filterby == 'hs_code')
                            @if($role == 'import')

                                <title>{{ucfirst($search_country)}} Customs {{ucfirst($role)}} Data under HS code {{$filterdata}} for {{$role}}s from {{$filterdata1}}</title>
                                <meta name="description" content="Live {{$role}} data of {{ucfirst($search_country)}} {{$role}} from {{ucfirst($filterdata1)}} under the HS code {{$filterdata}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include the date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$role}}ers data">
                            @elseif($role == 'export')
                                <title>{{ucfirst($search_country)}} Customs {{ucfirst($role)}} Data under HS code {{$filterdata}} for {{$role}}s to {{$filterdata1}}</title>
                                <meta name="description" content="Live {{$role}} data of {{ucfirst($search_country)}} {{$role}} to {{ucfirst($filterdata1)}} under the HS code {{$filterdata}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include the date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$role}}ers data">
                            @endif
                        @elseif($filterby=='unloading_port')
                                <title>{{ucfirst($search_country)}} Customs {{ucfirst($role)}} data under HS Code {{$filterdata}} via Port {{$filterdata1}}</title>
                                <meta name="description" content="Live {{$role}} data of {{ucfirst($search_country)}} under the HS code {{$filterdata}} via port {{$filterdata1}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include the date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$role}}ers data">
                        @endif
                    @endif
                    {{-- old args 9 --}}
                @elseif (count($args) == 10)

                    @if ($filterby1 == 'country')

                       @if($filterby == 'port')
                            @if($role == 'import')
                                <title>{{ucfirst($search_country)}} Customs {{$role}} data under HS code {{$searchDetails1}} from {{$filterdata1}} via Port {{$filterdata}} </title>
                                <meta name="description" content="Live {{$role}} data of {{ucfirst($search_country)}} {{$role}} from {{$filterdata1}} under the HS code {{$searchDetails1}} via port {{$filterdata}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include the date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$role}}ers data">
                            @elseif($role == 'export')
                                <title>{{ucfirst($search_country)}} Customs {{$role}} data under HS code {{$searchDetails1}} to {{$filterdata1}} via Port {{$filterdata}} </title>
                                <meta name="description" content="Live {{$role}} data of {{ucfirst($search_country)}} {{$role}} to {{$filterdata1}} under the HS code {{$searchDetails1}} via port {{$filterdata}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include the date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$role}}ers data">
                            @endif
                       @endif
                    @elseif ($filterby1 == 'hs_code')
                        @php
                            $base_search = $search;
                        @endphp

                    @elseif ($filterby1 == 'port')
                        @if($filterby == 'hs_code')

                        @elseif($filterby ==  'country')

                            @if($role == 'import')
                                <title>{{ucfirst($search_country)}} Customs {{$role}} data under HS code {{$searchDetails1}} from {{$filterdata}} via Port {{$filterdata1}} </title>
                                <meta name="description" content="Live {{$role}} data of {{ucfirst($search_country)}} {{$role}} from {{$filterdata}} under the HS code {{$searchDetails1}} via port {{$filterdata1}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include the date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$role}}ers data">
                            @elseif($role == 'export')
                                <title>{{ucfirst($search_country)}} Customs {{$role}} data under HS code {{$searchDetails1}} to {{$filterdata}} via Port {{$filterdata1}} </title>
                                <meta name="description" content="Live {{$role}} data of {{ucfirst($search_country)}} {{$role}} to {{$filterdata}} under the HS code {{$searchDetails1}} via port {{$filterdata1}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include the date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$role}}ers data">
                            @endif
                        @elseif($filterby == 'port')
                                <title>{{ucfirst($search_country)}} Customs {{$role}} data under HS code {{$searchDetails1}} from {{$filterdata}} via Port {{$filterdata1}} </title>
                                <meta name="description" content="Live {{$role}} data of {{ucfirst($search_country)}} {{$role}} from {{$filterdata}} under the HS code {{$searchDetails1}} via port {{$filterdata1}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include the date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$role}}ers data">
                        @endif
                    @endif
                    {{-- old args 9 --}}
                @elseif (count($arg) == 10)
                    @php
                        $unloading_port = str_ireplace(" ", "-", $unloading_port);
                    @endphp

                    @if ($filterby == 'hs_code')
                         <title>US HS code {{$searchDetails1}}  {{$role}} Data from {{$filterdata}} At  {{$filterdata1}}</title>
                         <meta name="description" content="USA imports data under the HS code {{$searchDetails1}} form {{$filterdata}} At {{$filterdata1}} . Our US bill of lading data reports, which include HS code, date, b/l number, product description, loading and unloading ports, us importer name, quantity, etc.">
                    @elseif ($filterby == 'country')
                         <title>US HS code {{$searchDetails1}}  {{$role}} Data from {{$filterdata}} At  {{$filterdata1}}</title>
                         <meta name="description" content="USA imports data under the HS code {{$searchDetails1}} form {{$filterdata}} At {{$filterdata1}} . Our US bill of lading data reports, which include HS code, date, b/l number, product description, loading and unloading ports, us importer name, quantity, etc.">
                    @elseif ($filterby == 'port')
                         <title>US HS code {{$searchDetails1}}  {{$role}} Data from {{$filterdata}} At  {{$filterdata1}}</title>
                         <meta name="description" content="USA imports data under the HS code {{$searchDetails1}} form {{$filterdata}} At {{$filterdata1}} . Our US bill of lading data reports, which include HS code, date, b/l number, product description, loading and unloading ports, us importer name, quantity, etc.">
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
                         @if($filterby1 == 'port')
                            <title>US HS code {{$searchDetails1}}  {{$role}} Data from {{$filterdata2}} At  {{$filterdata1}}</title>
                            <meta name="description" content="USA imports data under the HS code {{$searchDetails1}} form {{$filterdata}} At {{$filterdata1}} . Our US bill of lading data reports, which include HS code, date, b/l number, product description, loading and unloading ports, us importer name, quantity, etc.">
                         @else
                            <title>US HS code {{$searchDetails1}}  {{$role}} Data from {{$filterdata}} At  {{$filterdata1}}</title>
                            <meta name="description" content="USA imports data under the HS code {{$searchDetails1}} form {{$filterdata}} At {{$filterdata1}} . Our US bill of lading data reports, which include HS code, date, b/l number, product description, loading and unloading ports, us importer name, quantity, etc.">
                         @endif
                    @elseif ($filterby2 == 'port')
                         @if($filterby1 == 'port')
                            <title>US HS code {{$searchDetails1}}  {{$role}} Data from {{$filterdata2}} At  {{$filterdata1}}</title>
                            <meta name="description" content="USA imports data under the HS code {{$searchDetails1}} form {{$filterdata}} At {{$filterdata1}} . Our US bill of lading data reports, which include HS code, date, b/l number, product description, loading and unloading ports, us importer name, quantity, etc.">
                         @else
                            <title>US HS code {{$searchDetails1}}  {{$role}} Data from {{$filterdata}} At  {{$filterdata1}}</title>
                            <meta name="description" content="USA imports data under the HS code {{$searchDetails1}} form {{$filterdata}} At {{$filterdata1}} . Our US bill of lading data reports, which include HS code, date, b/l number, product description, loading and unloading ports, us importer name, quantity, etc.">
                         @endif
                    @endif
                @else
                    {{-- Handle else logic --}}
                @endif
            @else
                {{-- old args 5 --}}
                @if(count($args) == 6)
                    @if($filterby1 == 'hs_code')
                        @if($role == 'import')
                            <title>US {{$searchDetails1}} {{$role}}s data by the hs code {{$filterdata1}}</title>
                            <meta name="description" content="Live {{$searchDetails1}} {{$role}} Data of USA under the hs Code {{$filterdata1}} Our bill of lading reports, which include hs code, date, b/l number, product description, loading and unloading ports, us importer name, quantity, etc.">
                        @elseif($role == 'export')
                            <title>US {{$searchDetails1}} {{$role}}s data by the hs code {{$filterdata1}}</title>
                            <meta name="description" content="Live {{$searchDetails1}} {{$role}} Data of USA under the hs Code {{$filterdata1}} Our bill of lading reports, which include hs code, date, b/l number, product description, loading and unloading ports, us importer name, quantity, etc.">
                        @endif
                    @elseif($filterby1 == 'country')
                        @if($role == 'import')
                            <title>US {{$searchDetails1}} {{$role}} Data from {{$filterdata1}}</title>
                            <meta name="description" content="live USA {{$searchDetails1}} {{$role}} data from {{$filterdata1}}, Our US bill of lading data reports, which include hs code, date, b/l number, product description, loading and unloading ports, us importer name, quantity, etc.">
                        @elseif($role == 'export')
                            <<title>US {{$searchDetails1}} {{$role}} Data from {{$filterdata1}}</title>
                            <meta name="description" content="live USA {{$searchDetails1}} {{$role}} data from {{$filterdata1}}, Our US bill of lading data reports, which include hs code, date, b/l number, product description, loading and unloading ports, us importer name, quantity, etc.">
                        @endif
                    @elseif($filterby1 == 'port')
                        @if($role == 'import')
                            <title>US {{$searchDetails1}} {{$role}} Data at port {{$filterdata1}}</title>
                            <meta name="description" content="live USA {{$searchDetails1}} {{$role}} data at port {{$filterdata1}}, Our US bill of lading data reports, which include hs code, date, b/l number, product description, loading and unloading ports, us importer name, quantity, etc.">
                        @elseif($role == 'export')
                            <title>US {{$searchDetails1}} {{$role}} Data at port {{$filterdata1}}</title>
                            <meta name="description" content="live USA {{$searchDetails1}} {{$role}} data at port {{$filterdata1}}, Our US bill of lading data reports, which include hs code, date, b/l number, product description, loading and unloading ports, us importer name, quantity, etc.">
                        @endif
                    @endif
                    {{-- old args 7 --}}
                @elseif (count($args) == 8)
                    @if($filterby1 == 'hs_code')
                        <title>
                            {{$search_country}} Customs {{$role}} Data of {{$searchDetails1}} under HS code {{$filterdata1}}
                        </title>
                        <meta name="description" content="Live {{$searchDetails1}} {{$role}} data of {{$search_country}} under the HS code {{$filterdata1}}, our {{$search_country}} customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{$search_country}} {{$searchDetails1}} {{$role}}ers data">
                    @elseif($filterby1 == 'country')
                        @if($role == 'import')
                            <title>
                                {{$search_country}} Customs {{$role}} Data of {{$searchDetails1}} {{$role}}s from {{$filterdata1}}
                            </title>
                            <meta name="description" content="Live {{$searchDetails1}} {{$role}} data of {{$search_country}} {{$role}}s from {{$filterdata1}}, our {{$search_country}} customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{$search_country}} {{$searchDetails1}} {{$role}}ers data">
                        @elseif($role == 'export')
                            <title>
                                {{$search_country}} Customs {{$role}} Data of {{$searchDetails1}} {{$role}}s to {{$filterdata1}}
                            </title>
                            <meta name="description" content="Live {{$searchDetails1}} {{$role}} data of {{$search_country}} {{$role}}s to {{$filterdata1}}, our {{$search_country}} customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{$search_country}} {{$searchDetails1}} {{$role}}ers data">
                        @endif
                    @elseif($filterby1 == 'port')
                        <title>{{ucfirst($search_country)}} Customs {{ucfirst($role)}} Data of {{ucfirst($searchDetails1)}} {{ucfirst($role)}}s via Port {{$filterdata1}} </title>
                        <meta name="description" content="Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{$search_country}} {{$role}}s via Port {{$filterdata1}}, our {{$search_country}} customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{$search_country}} {{ucfirst($searchDetails1)}} {{ucfirst($role)}}ers data">
                    @endif
                    {{-- old args 9 --}}
                @elseif (count($args) == 10)
                    @if ($filterby1 == 'country')
                        @php
                            $unloading_port = str_ireplace(" ", "-", $unloading_port);
                            $filterdata = str_ireplace(" ", "-", $filterdata);
                            $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                        @endphp
                        @if($filterby == 'hs_code')
                            @if($role == 'import')
                                <title>{{$search_country}} Customs {{ucfirst($role)}} Data of {{$searchDetails1}} {{ucfirst($role)}}s from {{$filterdata1}} under HS Code {{$filterdata}}</title>
                                <meta name="description" content="Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} {{$role}}s from {{$filterdata1}} under the Hs code {{$filterdata}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data">
                            @elseif($role == 'export')
                                <title>{{$search_country}} Customs {{ucfirst($role)}} Data of {{$searchDetails1}} {{ucfirst($role)}}s to {{$filterdata1}} under HS Code {{$filterdata}}</title>
                                <meta name="description" content="Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} {{$role}}s to {{$filterdata1}} under the Hs code {{$filterdata}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data">
                            @endif
                        @elseif($filterby == 'port')
                            @if($role == 'import')
                                <title>{{ucfirst($search_country)}} Customs {{$role}} Data of {{ucfirst($searchDetails1)}} {{ucfirst($role)}}s from {{$filterdata1}} via Port {{$filterdata}}
                                </title>
                                <meta name="description" content="Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} {{$role}}s from {{$filterdata1}}  via port {{$filterdata}}, our Ecuador customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data">
                            @elseif($role == 'export')
                                <title>{{ucfirst($search_country)}} Customs {{$role}} Data of {{ucfirst($searchDetails1)}} {{ucfirst($role)}}s to {{$filterdata1}} via Port {{$filterdata}}</title>
                                <meta name="description" content="Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} {{$role}}s to {{$filterdata1}}  via port {{$filterdata}}, our Ecuador customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data">
                            @endif
                        @endif

                    @elseif ($filterby1 == 'hs_code')
                        @php
                            $base_search = $search;
                        @endphp
                        @if($filterdata == 'country')
                            @if($role == 'import')
                                <title>{{$search_country}} Customs {{ucfirst($role)}} Data of {{$searchDetails1}} {{ucfirst($role)}}s from {{$filterdata1}} under HS Code {{$filterdata}}</title>
                                <meta name="description" content="Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} {{$role}}s from {{$filterdata1}} under the Hs code {{$filterdata}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data">
                            @elseif($role == 'export')
                                <title>{{$search_country}} Customs {{ucfirst($role)}} Data of {{$searchDetails1}} {{ucfirst($role)}}s to {{$filterdata1}} under HS Code {{$filterdata}}</title>
                                <meta name="description" content="Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} {{$role}}s to {{$filterdata1}} under the Hs code {{$filterdata}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data">
                            @endif
                        @elseif($filterby == 'port')
                            @if($role == 'import')
                                <title>{{$search_country}} Customs {{$role}} Data of {{$searchDetails1}} under HS Code {{$filterdata}} via Port {{$filterdata1}}
                                </title>
                                <meta name="description" content="Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} under the HS code {{$filterdata}}, via Port {{$filterdata1}}, our {{ucfirst($search_country)}} customs export data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data">
                            @elseif($role == 'export')
                                <title>{{$search_country}} Customs {{$role}} Data of {{$searchDetails1}} under HS Code {{$filterdata}} via Port {{$filterdata1}}
                                </title>
                                <meta name="description" content="Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} under the HS code {{$filterdata}}, via Port {{$filterdata1}}, our {{ucfirst($search_country)}} customs export data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data">
                            @endif
                        @endif
                    @elseif ($filterby1 == 'port')
                        @php
                            $base_search = $search;
                            $unloading_port = str_ireplace(" ", "-", $unloading_port);
                            $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                        @endphp

                        @if($filterby=='hs_code')
                            @if($role == 'import')
                                <title>{{$search_country}} Customs {{$role}} Data of {{$searchDetails1}} under HS Code {{$filterdata}} via Port {{$filterdata1}}
                                </title>
                                <meta name="description" content="Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} under the HS code {{$filterdata}}, via Port {{$filterdata1}}, our {{ucfirst($search_country)}} customs export data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data">
                            @elseif($role == 'export')
                                <title>{{$search_country}} Customs {{$role}} Data of {{$searchDetails1}} under HS Code {{$filterdata}} via Port {{$filterdata1}}
                                </title>
                                <meta name="description" content="Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} under the HS code {{$filterdata}}, via Port {{$filterdata1}}, our {{ucfirst($search_country)}} customs export data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data">
                            @endif
                        @elseif($filterby == 'country')
                             {{-- @dd('In this block') --}}
                             @if($role == 'import')
                                <title>{{ucfirst($search_country)}} Customs {{$role}} Data of {{ucfirst($searchDetails1)}} {{ucfirst($role)}}s from {{$filterdata}} via Port {{$filterdata1}}
                                </title>
                                <meta name="description" content="Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} {{$role}}s from {{$filterdata}}  via port Data {{$filterdata1}}, our Ecuador customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data">
                             @elseif($role == 'export')
                                <title>{{ucfirst($search_country)}} Customs {{$role}} Data of {{ucfirst($searchDetails1)}} {{ucfirst($role)}}s to {{$filterdata}} via Port {{$filterdata1}}</title>
                                <meta name="description" content="Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} {{$role}}s to {{$filterdata}}  via port Data {{$filterdata1}}, our Ecuador customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data">
                             @endif
                        @endif

                    @endif
                    {{-- old args 9 --}}
                @elseif (count($arg) == 10)
                    @php
                        $unloading_port = str_ireplace(" ", "-", $unloading_port);
                    @endphp
                    @if ($filterby2 == 'country')
                        {{-- Handle country logic --}}
                    @elseif ($filterby2 == 'port')
                        @php
                            $base_search = $search;
                            $unloading_port = str_ireplace(" ", "-", $unloading_port);
                        @endphp
                    @endif
                    {{-- old args 11 --}}
                @elseif (count($arg) == 12)
                    @php
                        $unloading_port = str_ireplace(" ", "-", $unloading_port);
                    @endphp
                    @if ($filterby2 == 'hs_code')
                        {{-- Handle hs_code logic --}}

                    @elseif ($filterby2 == 'country')
                        @php
                            $filterdata = str_ireplace(" ", "-", $filterdata);
                            $filterdata1 = str_ireplace(" ", "-", $filterdata1);

                        @endphp
                        @if($filterby1 == 'port')
                            @if($role == 'import')
                                <title>{{ucfirst($search_country)}} Customs {{$role}} Data of {{ucfirst($searchDetails1)}} {{ucfirst($role)}}s from {{ucfirst($filterdata1)}} under the HS Code {{$filter}} via port {{$filterdata}}</title>
                                <meta name="description" content="Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} {{ucfirst($role)}}s from {{ucfirst($filterdata1)}} under the HS code {{$filter}} via port {{$filterdata}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data">
                            @elseif($role == 'export')
                                <title>{{ucfirst($search_country)}} Customs {{$role}} Data of {{ucfirst($searchDetails1)}} {{ucfirst($role)}}s to {{ucfirst($filterdata1)}} under the HS Code {{$filter}} via port {{$filterdata}}</title>
                                <meta name="description" content="Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} {{ucfirst($role)}}s to {{ucfirst($filterdata1)}} under the HS code {{$filter}} via port {{$filterdata}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data">
                            @endif
                        @elseif($filterby1 == 'hs_code')
                            @if($role == 'import')
                                <title>{{ucfirst($search_country)}} Customs {{$role}} Data of {{ucfirst($searchDetails1)}} {{ucfirst($role)}}s from {{ucfirst($filterdata)}} under the HS Code {{$filter}} via port {{$filterdata1}}</title>
                                <meta name="description" content="Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} {{ucfirst($role)}}s from {{ucfirst($filterdata)}} under the HS code {{$filter}} via port {{$filterdata1}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data">
                            @elseif($role == 'export')
                                <title>{{ucfirst($search_country)}} Customs {{$role}} Data of {{ucfirst($searchDetails1)}} {{ucfirst($role)}}s to {{ucfirst($filterdata)}} under the HS Code {{$filter}} via port {{$filterdata1}}</title>
                                <meta name="description" content="Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} {{ucfirst($role)}}s to {{ucfirst($filterdata)}} under the HS code {{$filter}} via port {{$filterdata1}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data">
                            @endif
                        @endif
                    @elseif ($filterby2 == 'port')
                        @php
                            $filterdata = str_ireplace(" ", "-", $filterdata);
                            $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                        @endphp
                        @if($filterby1 == 'country')
                            @if($role == 'import')
                                <title>{{ucfirst($search_country)}} Customs {{$role}} Data of {{ucfirst($searchDetails1)}} {{ucfirst($role)}}s from {{ucfirst($filterdata)}} under the HS Code {{$filter}} via port {{$filterdata1}}</title>
                                <meta name="description" content="Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} {{ucfirst($role)}}s from {{ucfirst($filterdata)}} under the HS code {{$filter}} via port {{$filterdata1}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data">
                            @elseif($role == 'export')
                                <title>{{ucfirst($search_country)}} Customs {{$role}} Data of {{ucfirst($searchDetails1)}} {{ucfirst($role)}}s to {{ucfirst($filterdata)}} under the HS Code {{$filter}} via port {{$filterdata1}}</title>
                                <meta name="description" content="Live {{ucfirst($searchDetails1)}} {{ucfirst($role)}} data of {{ucfirst($search_country)}} {{ucfirst($role)}}s to {{ucfirst($filterdata)}} under the HS code {{$filter}} via port {{$filterdata1}}, our {{ucfirst($search_country)}} customs {{$role}} data reports include date, value, quantity,  product description, HS code, port, country, and {{ucfirst($search_country)}} {{$searchDetails1}} {{$role}}ers data">
                            @endif
                        @elseif($filterby1 == 'port')

                        @endif
                    @endif
                @else
                    @php
                        $country_url = route('search-filter-two', ['section_type' => $section_type, 'type' => $type, 'role' => $role, 'search' => $search, 'searchDetails1' => $searchDetails1, 'filterby2' => 'country', 'filterby' => $filterby, 'filter' => $filterdata, 'filterby1' => $filterby1, 'filterdata' => $filterdata1, 'filterdata1' => $country ?? "null"]);
                    @endphp
                @endif
            @endif
            @if ($count==1)
                @break
            @endif
        @endforeach
    @endif
</head>
<body>
     @include('frontend.header')
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

    <section class="container-fluid padding-tb bg-green">
        <div class="text-content text-center">
            {{-------Heading--------}}

                 @include('frontend.livedata.headingAndDesc')
        </div>
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
                            <span>{{$search_country}}</span>
                        </div>
                        <input type="hidden" name="country" id="selected-country" value="{{$search_country}}">
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
                    @php
                        $searchDetails1 =  $searchDetails1??"null";
                        $base_search = $base_search??"null";
                    @endphp
                    @if(is_numeric($searchDetails1) && $searchDetails1 !== "null")
                        <div class="searchbox col-sm-3 col-md-3 col-lg-3">
                            <input type="text" placeholder="Description" class="form-control" name="description" id="description" >
                        </div>

                        <div class="searchbox col-sm-2 col-md-2 col-lg-2">
                            <input type="text" placeholder="HS Code" class="form-control" name="hs_code" id="hs_code" value="{{$searchDetails1}}">
                        </div>
                    @else
                        <div class="searchbox col-sm-3 col-md-3 col-lg-3">
                            <input type="text" placeholder="Description" class="form-control" name="description" id="description" value="{{$searchDetails1}}">
                        </div>

                        <div class="searchbox col-sm-2 col-md-2 col-lg-2">
                            <input type="text" placeholder="HS Code" class="form-control" name="hs_code" id="hs_code" >
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

     @include('frontend.livedata.toast')
    {{-- @dd($search_country) --}}
    {{-- Result Table --}}
    @if($search_country == "US")
        @include('frontend.livedata.US.USTableone')
    @elseif($search_country == 'Austria')
        @include('frontend.livedata.austria.austriaTableOne')
    @elseif($search_country == 'Argentina')
        @include('frontend.livedata.Argentina.argentinaTableOne')
    @elseif($search_country == 'Ecuador')
        @include('frontend.livedata.Ecuador.EcTableOne')
    @elseif($search_country == 'Panama')
        @include('frontend.livedata.Panama.panamaTableOne')
    @elseif($search_country == 'Paraguay')
        @include('frontend.livedata.Paraguay.paraguayTableOne')
    @elseif($search_country == 'Chile')
        @include('frontend.livedata.Chile.chileTableOne')
    @elseif($search_country == 'Uruguay')
        @include('frontend.livedata.Uruguay.uruguayTableOne')
    @elseif($search_country == 'Chile')
        @include('frontend.livedata.Chile.chileTableOne')
    @elseif($search_country == 'Venezuela')
        @include('frontend.livedata.Venezuela.venezuelaTableOne')
    @elseif($search_country == 'Brazil')
        @include('frontend.livedata.Brazil.brazilTableOne')
    @elseif($search_country == 'Peru')
        @include('frontend.livedata.Peru.peruTableOne')
    @elseif($search_country == 'Colombia')
        @include('frontend.livedata.Columbia.columbiaTableOne')
    @endif

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

    <!--URL script-->
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            function updateUrl(section_type,filterType, filterValue, type, role, baseSearch, country) {
                let url = new URL(window.location.href);
                let params = url.pathname.split(`/${type}/${role}/`); // Splitting the path segments
                // Remove the specific parameter (HS Code, Country, or Port)
                params = params.filter(param => !param.includes(filterValue));

                // Join the params back together
                const newPath = params.join('/');
                const isNumericBaseSearch = !isNaN(baseSearch);

                // Construct the new URL based on whether baseSearch is numeric
                let newUrl;
                console.log('isNumericBaseSearch:', isNumericBaseSearch,section_type,filterType, filterValue, type, role, baseSearch, country);
                if (isNumericBaseSearch) {
                    // URL for numeric baseSearch
                    newUrl = `${url.origin}/search/${section_type}/${country}/${type}/${role}/hs_code-${baseSearch}`;
                } else {
                    // URL for non-numeric baseSearch
                    newUrl = `${url.origin}/search-data/${section_type}/${country}/${type}/${role}/${baseSearch}`;
                }
                // Redirect to the updated URL
                console.log('Redirecting to:', newUrl); // Debugging log
                setTimeout(() => {
                    window.location.href = newUrl;
                }, 0);
            }

            // Function to update the URL
            function firstdupdateUrl(FilterBy2, FilterData2) {
                let url = new URL(window.location.href);
                console.log('url', url, FilterBy2, FilterData2);

                let params = url.pathname.split('/'); // Splitting the path segments

                // Log the initial path segments
                console.log('Initial Path Segments:', params);

                // Create a filter string in case it includes any URL-encoded characters
                const filterString = `${FilterBy2}-${FilterData2}`;
                console.log('Filter String:', filterString);

                // Use decodeURIComponent to ensure comparison happens correctly
                params = params.filter(param => decodeURIComponent(param) !== filterString);

                // Log the filtered path segments
                console.log('Filtered Path Segments:', params);

                // Join the params back together
                const newPath = params.join('/');
                console.log('New Path:', newPath);

                const newUrl = `${url.origin}${newPath}`;

                // Log the redirection URL immediately for debugging
                console.log('Redirecting to firstdupdateUrl:', newUrl);

                // Redirect after a delay
                setTimeout(() => {
                    window.location.href = newUrl;
                }, 0);
            }


            // Function to update the URL
            function SecondupdateUrl(FilterBy, SearfilterData) {
                let url = new URL(window.location.href);

                let params = url.pathname.split(`/`); // Splitting the path segments
                // Remove the specific parameter (HS Code, Country, or Port)
                params = params.filter(param => !param.includes(FilterBy));

                // Join the params back together
                const newPath = params.join('/');
                const newUrl = `${url.origin}/search-live-data${newPath}`;
                setTimeout(() => {
                    console.log('Redirecting to 2nd URl:', newUrl); // Debugging log
                }, 0)

                // Redirect to the updated URL
                window.location.href = newUrl;
            }

            function thirdupdateUrl(FilterBy, FilterData) {
                let url = new URL(window.location.href);

                // Log the incoming filter values for debugging
                console.log('In thirdupdate FilterBy:', FilterBy, 'FilterData:', FilterData);

                // Split the URL path segments by "/"
                let params = url.pathname.split(`/`);

                // Construct the full filter strings to remove
                let filterStringWithDash;
                let filterStringWithSpace;

                // Determine the filter strings based on the presence of '-'
                if (FilterData.includes('-')) {

                    filterStringWithDash = `${FilterBy}-${FilterData}`; // Directly use FilterData with dash
                    filterStringWithSpace = `${FilterBy}-${encodeURIComponent(FilterData.replace(/-/g, ' '))}`; // Convert dashes to spaces and encode
                    console.log('Filter String with Space:', filterStringWithSpace);
                } else {

                    filterStringWithDash = `${FilterBy}-${FilterData.replace(/ /g, '-')}`; // Replace spaces with dashes
                    filterStringWithSpace = `${FilterBy}-${encodeURIComponent(FilterData)}`; // URL-encode FilterData with spaces
                    console.log('Filter String with Dash:', filterStringWithDash);
                }

                // Filter out the specific parameters
                params = params.filter(param => {
                    const decodedParam = decodeURIComponent(param);
                    // Compare the parameter with both constructed filter strings
                    return decodedParam !== filterStringWithSpace && decodedParam !== filterStringWithDash;
                });

                // Log the filtered path segments for debugging
                console.log('Filtered Path Segments:', params);

                // Join the params back together to form the new path
                const newPath = params.join('/');
                const newUrl = `${url.origin}${newPath}`;

                // Log the new URL for debugging
                console.log('Redirecting to thirdupdateUrl:', newUrl);

                // Delay the redirection by 5 seconds (5000 ms)
                setTimeout(() => {
                    window.location.href = newUrl;
                }, 0);
            }

            // Function to update the URL Base+filterby
            function fourthupdateUrl(FilterBy1, FilterData1) {
                let url = new URL(window.location.href);
                console.log('FilterBy1, FilterData1',FilterBy1, FilterData1)
                let params = url.pathname.split(`/`); // Splitting the path segments
                // Remove the specific parameter (HS Code, Country, or Port)
                const filterString = `${FilterBy1}-${FilterData1}`;
                // Filter out the specific FilterBy1 and FilterData1 segment
                params = params.filter(param => decodeURIComponent(param) !== filterString);

                // Log the filtered path segments
                console.log('Filtered Path Segments:', params);

                // Join the params back together
                const newPath = params.join('/');
                console.log('New Path:', newPath);
                const newUrl = `${url.origin}${newPath}`;
                // Log immediately
                console.log('Redirecting to fourthupdateUrl:', newUrl); // Debugging log

                // Delay the redirection by 5 seconds (5000 ms)
                setTimeout(() => {
                    window.location.href = newUrl;
                }, 0);
                // Redirect to the updated URL

                // window.location.href = newUrl;
            }

            function fifthupdateUrl(FilterBy2, FilterData2) {
                let url = new URL(window.location.href);
                console.log(FilterBy2, FilterData2);

                // Encode the FilterData2 to match URL encoding (e.g., spaces become %20)
                const encodedFilterData2 = encodeURIComponent(FilterData2);
                const filterString = `${FilterBy2}-${encodedFilterData2}`;

                let params = url.pathname.split('/'); // Splitting the path segments

                // Filter out the specific FilterBy2 and FilterData2 segment
                params = params.filter(param => decodeURIComponent(param) !== filterString);

                // Log the filtered path segments
                console.log('Filtered Path Segments:', params);

                // Join the params back together
                const newPath = params.join('/');
                console.log('New Path:', newPath);
                const newUrl = `${url.origin}${newPath}`;

                // Log immediately
                console.log('Redirecting to fifthupdateUrl:', newUrl); // Debugging log

                // Delay the redirection by 50 milliseconds (50 ms)
                setTimeout(() => {
                    window.location.href = newUrl;
                }, 0);
            }
            // Event listeners for closing toasts
            const toasts = document.querySelectorAll('.toast');
                toasts.forEach(toast => {
                const closeButton = toast.querySelector('.btn-close');
                closeButton.addEventListener('click', function() {
                    let section_type   = toast.getAttribute('section_type');
                    const filterType   = toast.getAttribute('data-filter-type');
                    const filterValue  = toast.getAttribute('data-filter-value');
                    const filterType1  = toast.getAttribute('data-filter-type1');
                    const filterValue1 = toast.getAttribute('data-filter-value1');
                    const filterType2  = toast.getAttribute('data-filter-type2');
                    const filterValue2 = toast.getAttribute('data-filter-value2');
                    const type         = toast.getAttribute('data-type');
                    const role         = toast.getAttribute('data-role');
                    const baseSearch   = toast.getAttribute('base-search');
                    const country      = toast.getAttribute('search-country');
                    // console.log('Removing', filterType2, filterValue2'type and role',type,role, 'from URL');

                    // Determine which updateUrl function to call based on filterType
                    if (filterType === 'hs_code') {
                        updateUrl(section_type,filterType, filterValue, type, role, baseSearch, country);
                    } else if (filterType === 'country') {
                        updateUrl(section_type,filterType, filterValue, type, role, baseSearch, country);
                    } else if (filterType === 'port') {
                            updateUrl(section_type,filterType, filterValue, type, role, baseSearch, country);
                    } else if (filterType1 === 'hs_code') {
                        firstdupdateUrl(filterType1, filterValue1);
                    } else if (filterType1 === 'country') {
                            console.log('Removing', filterType1,'filterValue1',filterValue1,'type and role',type,role, 'from URL');
                        fourthupdateUrl(filterType1, filterValue1);
                    } else if (filterType1 === 'port') {
                        console.log('Removing', filterType1,'filterValue1',filterValue1,'type and role',type,role, 'from URL');
                        thirdupdateUrl(filterType1, filterValue1);
                    } else if (filterType2 === 'hs_code') {
                            console.log('Removing', filterType2,'filterValue2',filterValue2,'type and role',type,role, 'from URL');
                        firstdupdateUrl(filterType2, filterValue2);
                    } else if (filterType2 === 'country') {
                        fourthupdateUrl(filterType2, filterValue2);
                    } else if (filterType2 === 'port') {
                        fifthupdateUrl(filterType2, filterValue2);
                    } else {
                        updateUrl(filterValue, type, role, baseSearch, country);  // Default action if none of the conditions match
                    }

                });
            });
        });
    </script>
    @include('frontend.tab_inc')
    @include('frontend.footer')
    @include('frontend.script')
</body>
</html>
