<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="google-site-verification" content="kevV-HFG1JijHyuKnnkIeN6dY_Hb-ueXuqoUv-pPWUU"/>
        <meta name="ahrefs-site-verification" content="167ef56daf7b5a6af88ecea027be9df8f7a528cfe6be55f3f794a32094b792f2">
          @foreach ($continentdata as $continent)
          <meta name="keywords" content="{{$continent->mf_content_metakeywords}}" />
          <meta name="description" content="{{$continent->mf_content_metadescription}}" />
          @endforeach

        <meta name="robots" content="index, follow" id="robots"/>

        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
        <title>
            @foreach ($continentdata as $continent)
                {{$continent->mf_content_metatitle}}
            @endforeach
        </title>
        <link rel="icon" type="image/x-icon" href="public/frontend/image/img/Favicon Logo.png">

        @include('frontend.link')
        <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    </head>
    <body>
        @include('frontend.header')
        {{-- @dd($continentdata) --}}
        <!-- Breadcrumb -->
        <div class="container-fluid bg-bluish pdt-2">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-bluish">
                        <li class="breadcrumb-item">
                            <a class="text-hover" href="/">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            @foreach ($continentdata as $continent)
                              {{$continent->continent}} Trade Data
                            @endforeach
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Overview of country -->
        <div class="container-fluid pdt-2 pdb-5 bg-bluish">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="text-content">
                            <span>Overview</span>
                            @foreach ($continentdata as $continent)
                                <h1 class="gradient-h2" style="font-size: 48px;font-weight: 500;">
                                    {{$continent->continent}} Trade Data
                                </h1>
                                <p>
                                    {!!$continent->mf_content_editordata!!}
                                </p>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="data-img img-aspect" style="aspect-ratio: 5/4 !important;">
                            {{-- @dd('continent->mf_content_images',$continent->mf_content_images) --}}
                            @if ($continent->mf_content_images)
                            @php
                                // Construct the full image URL using the base URL and the image filename.
                                $imageURL = asset('https://cms.tradeimex.in/public/frontend/img/continent/' . $continent->mf_content_images);

                            @endphp
                            @endif
                            @if (!empty($imageURL))
                            <img src="{{ $imageURL }}" alt=" {{$continent->mf_content_metatitle}}" width="80%" style="border-radius: 12px;">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Country covered -->
        <div class="continent-tabcontent bg-dark-custom" style="display: block !important;float: none;width: auto;">
            <div class="container">

                   @foreach ($continentdata as $continent)
                    # code...
                    @php
                        $continent_id = $continent->continent_code;
                    @endphp
                    @if ($continent->continent_code === $continent_id)
                        @if ($continent->continent_code ===  'AS-24')
                        <div class="row padding-tb">
                            <div class="text-content">
                                <h2 class="text-white text-center">Countries Covered Under Asia Trade Data</h2>
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/bangladesh.png" alt="Bangladesh Import Export Data">
                                <br>
                                @foreach($countrydata as $country)
                                {{-- {{ $countryData->country }} --}}
                                @if ($country->country=='Bangladesh' && $country->Datatype =='import')
                                <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                    <h4>{{ $country->country }}</h4>
                                </a>
                                @endif

                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/china_rectangular_icon_with_shadow_64.png" alt="China Import Export Data">
                                <br>
                                @foreach($countrydata as $country)
                                    @if ($country->country=='China' && $country->Datatype =='import')
                                    <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                        <h4>{{ $country->country }}</h4>
                                    </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/egypt_rectangular_icon_with_shadow_64.png" alt="Egypt Import Export Data">
                                <br>
                                @foreach($countrydata as $country)
                                    @if ($country->country=='Egypt' && $country->Datatype =='import')
                                    <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
                                        <h4>{{ $country->country }}</h4>
                                    </a>
                                    @endif

                                @endforeach
                            </div>

                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/indonesia_rectangular_icon_with_shadow_64.png" alt="Indonesia Import Export Data">
                                <br>
                                @foreach($countrydata as $country)
                                    @if ($country->country=='Indonesia' && $country->Datatype =='import')
                                    <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                        <h4>{{ $country->country }}</h4>
                                    </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/iran_rectangular_icon_with_shadow_64.png" alt="Iran Import Export Data">
                                <br>
                                @foreach($countrydata as $country)
                                    @if ($country->country=='Iran' && $country->Datatype =='import')
                                    <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
                                        <h4>{{ $country->country }}</h4>
                                    </a>
                                    @endif
                                @endforeach
                            </div>
                                <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                    <img src="public/frontend/image/flags/iraq_rectangular_icon_with_shadow_64.png" alt="Iraq Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Iraq' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                    <img src="public/frontend/image/flags/japan_rectangular_icon_with_shadow_64.png" alt="Japan Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Japan' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                        @endif
                                    @endforeach
                                </div>

                                <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                    <img src="public/frontend/image/flags/kazakhstan_rectangular_icon_with_shadow_64.png" alt="Kazakhstan Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Kazakhstan' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                    <img src="public/frontend/image/flags/kuwait_rectangular_icon_with_shadow_64.png" alt="Kuwait Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Kuwait' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                    <img src="public/frontend/image/flags/malaysia_rectangular_icon_with_shadow_64.png" alt="Malaysia Import Export Data">
                                    <br>

                                    @foreach ($countrydata as $country)
                                    @if($country->country=="Malaysia" && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                    <img src="public/frontend/image/flags/pakistan_rectangular_icon_with_shadow_64.png" alt="Pakistan Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                    @if ($country->country=='Pakistan' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                        @endif
                                    @endforeach

                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                    <img src="public/frontend/image/flags/philippines_rectangular_icon_with_shadow_64.png" alt="Philippines Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                    @if ($country->country=='Philippines' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                    <img src="public/frontend/image/flags/qatar_rectangular_icon_with_shadow_64.png" alt="Qatar Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                    @if ($country->country=='Qatar' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                        @endif
                                    @endforeach

                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                    <img src="public/frontend/image/flags/saudi_arabia_rectangular_icon_with_shadow_64.png" alt="Saudi Arabia Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                    @if ($country->country=='Saudi-Arabia' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                        @endif
                                    @endforeach

                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                    <img src="public/frontend/image/flags/singapore_rectangular_icon_with_shadow_64.png" alt="Singapore Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                    @if ($country->country=='Singapore' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                    <img src="public/frontend/image/flags/korea_south_rectangular_icon_with_shadow_64.png" alt="South Korea Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                    @if ($country->country=='South-Korea' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                        @endif
                                    @endforeach

                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                    <img src="public/frontend/image/flags/sri_lanka_rectangular_icon_with_shadow_64.png" alt="Sri Lanka Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                    @if ($country->country=='Sri-Lanka' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                    <img src="public/frontend/image/flags/republic_of_china_rectangular_icon_with_shadow_64.png" alt="Taiwan Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                    @if ($country->country=='Taiwan' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                    <img src="public/frontend/image/flags/thailand_rectangular_icon_with_shadow_64.png" alt="Thailand Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                    @if ($country->country=='Thailand' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                    <img src="public/frontend/image/flags/turkey_rectangular_icon_with_shadow_64.png" alt="Turkey Import Export Data">
                                    <br>
                                    @foreach($countrydata as $country)
                                        @if ($country->country=='Turkey' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                    <img src="public/frontend/image/flags/united_arab_emirates_rectangular_icon_with_shadow_64.png" alt="UAE Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='UAE' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                    <img src="public/frontend/image/flags//ukraine_rectangular_icon_with_shadow_64.png" alt="Ukraine Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Ukraine' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                    <img src="public/frontend/image/flags/uzbekistan_rectangular_icon_with_shadow_64.png" alt="Uzbekistan Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Uzbekistan' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                    <img src="public/frontend/image/flags/vietnam_rectangular_icon_with_shadow_64 (1).png" alt="Vietnam Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Vietnam' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                        </div>
                        @endif
                        @if ($continent->continent_code === 'AF-24')
                        <div class="row padding-tb">
                            <div class="text-content">
                                <h2 class="text-white text-center">Countries Covered Under Africa Trade Data</h2>
                            </div>
                             <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/botswana_rectangular_icon_with_shadow_64.png" alt="Botswana Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Botswana' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/cameroon_rectangular_icon_with_shadow_64.png" alt="Cameroon Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Cameroon' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/central_african_republic_rectangular_icon_with_shadow_64.png" alt="Central Africa Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Central-Africa' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach

                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/chad_rectangular_icon_with_shadow_64.png" alt="Chad Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Chad' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/democratic_republic_of_the_congo_rectangular_icon_with_shadow_64.png" alt="Congo Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Congo' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/ethiopia_rectangular_icon_with_shadow_64.png" alt="Ethiopia Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Ethiopia' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/ghana_rectangular_icon_with_shadow_64.png" alt="Ghana Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Ghana' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/cote_d_Ivoire_rectangular_icon_with_shadow_64.png" alt="Ivory Coast Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='ivorycoast' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/kenya_rectangular_icon_with_shadow_64.png" alt="Kenya Import Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Kenya' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach

                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/lesotho_rectangular_icon_with_shadow_64.png" alt="Lesotho Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Lesotho' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach

                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/liberia_rectangular_icon_with_shadow_64.png" alt="Liberia Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Liberia' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/malawi_rectangular_icon_with_shadow_64.png" alt="Malawi Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Malawi' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/namibia_rectangular_icon_with_shadow_64.png" alt="Namibia Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Namibia' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach

                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/niger_rectangular_icon_with_shadow_64.png" alt="Niger Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Niger' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach

                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/nigeria_rectangular_icon_with_shadow_64.png" alt="Nigeria Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Nigeria' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach

                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/sao_tome_and_principe_rectangular_icon_with_shadow_64.png" alt="Sao Tome Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Sao-Tome' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/senegal_rectangular_icon_with_shadow_64.png" alt="Senegal Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Senegal' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach

                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/sierra_leone_rectangular_icon_with_shadow_64.png" alt="Sierra Leone Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Sierra-Leone' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/south_africa_rectangular_icon_with_shadow_64.png" alt="South Africa Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='South-Africa' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/tanzania_rectangular_icon_with_shadow_64.png" alt="Tanzania Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Tanzania' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/togo_rectangular_icon_with_shadow_64.png" alt="Togo Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Togo' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach

                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/uganda_rectangular_icon_with_shadow_64.png" alt="Uganda Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Uganda' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach

                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/zambia_rectangular_icon_with_shadow_64.png" alt="Zambia Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Zambia' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach

                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/zimbabwe_rectangular_icon_with_shadow_64.png" alt="Zimbabwe Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Zimbabwe' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach

                            </div>

                        </div>
                        @endif
                        @if ($continent->continent_code === 'EU-34')
                        <div class="row padding-tb">
                            <div class="text-content">
                                <h2 class="text-white text-center">Countries Covered Under Europe Trade Data</h2>
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/austria_rectangular_icon_with_shadow_64.png" alt="Austria Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Austria' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/belgium_rectangular_icon_with_shadow_64.png" alt="Belgium Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Belgium' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/bulgaria_rectangular_icon_with_shadow_64.png" alt="Bulgaria Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Bulgaria' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/croatia_rectangular_icon_with_shadow_64.png" alt="Croatia Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Croatia' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/cyprus_rectangular_icon_with_shadow_64.png" alt="Cyprus Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Cyprus' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/czech_republic_rectangular_icon_with_shadow_64.png" alt="Czech Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Czech' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/denmark_rectangular_icon_with_shadow_64.png" alt="Denmark Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Denmark' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/estonia_rectangular_icon_with_shadow_64.png" alt="Estonia Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Estonia' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/finland_rectangular_icon_with_shadow_64.png" alt="Finland Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Finland' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/france_rectangular_icon_with_shadow_64.png" alt="France Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='France' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/germany_rectangular_icon_with_shadow_64.png" alt="Germany Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Germany' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/greece_rectangular_icon_with_shadow_64.png" alt="Greece Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Greece' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/hungary_rectangular_icon_with_shadow_64.png" alt="Hungary Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Hungary' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/ireland_rectangular_icon_with_shadow_64.png" alt="Ireland Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Ireland' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/italy_rectangular_icon_with_shadow_64.png" alt="Italy Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Italy' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/kazakhstan_rectangular_icon_with_shadow_64.png" alt="Kazakhstan Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Kazakhstan' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/kosovo_rectangular_icon_with_shadow_64 (1).png" alt="Kosovo Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Kosovo' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/latvia_rectangular_icon_with_shadow_64.png" alt="Latvia Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Latvia' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach

                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/lithuania_rectangular_icon_with_shadow_64.png" alt="Lithuania Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Lithuania' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/luxembourg_rectangular_icon_with_shadow_64.png" alt="Luxembourg Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='LuxemBourg' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/malta_rectangular_icon_with_shadow_64.png" alt="Malta Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Malta' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/moldova_rectangular_icon_with_shadow_64.png" alt="Moldova Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Moldova' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/netherlands_rectangular_icon_with_shadow_64.png" alt="Netherlands Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Netherlands' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/poland_rectangular_icon_with_shadow_64.png" alt="Poland Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Poland' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/portugal_rectangular_icon_with_shadow_64.png" alt="Portugal Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Portugal' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/russia_rectangular_icon_with_shadow_64.png" alt="Russia Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Russia' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/romania_rectangular_icon_with_shadow_64.png" alt="Romania Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Romania' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/slovakia_rectangular_icon_with_shadow_64.png" alt="Slovakia Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Slovakia' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/slovenia_rectangular_icon_with_shadow_64.png" alt="Slovenia Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Slovenia' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/spain_rectangular_icon_with_shadow_64.png" alt="Spain Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Spain' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/sweden_rectangular_icon_with_shadow_64.png" alt="Sweden Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Sweden' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/united_kingdom_rectangular_icon_with_shadow_64.png" alt="UK Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='UK' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/ukraine_rectangular_icon_with_shadow_64.png" alt="Ukraine Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Ukraine' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/uzbekistan_rectangular_icon_with_shadow_64.png" alt="Uzbekistan Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Uzbekistan' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        @endif
                        @if ($continent->continent_code === 'NA-9')
                        <div class="row padding-tb">
                            <div class="text-content">
                                <h2 class="text-white text-center">Countries Covered Under North America Trade Data</h2>
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/canada_rectangular_icon_with_shadow_64.png" alt="Canada Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Canada' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/costa_rica_rectangular_icon_with_shadow_64.png" alt="Costa Rica Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Costa-Rica' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/el_salvador_rectangular_icon_with_shadow_64.png" alt="EL Salvador Import Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='EL-Salvador' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/guatemala_rectangular_icon_with_shadow_64.png" alt="Guatemala Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Guatemala' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/honduras_rectangular_icon_with_shadow_64.png" alt="Honduras Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Honduras' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/mexico_rectangular_icon_with_shadow_64.png" alt="Mexico Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Mexico' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach

                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/panama_rectangular_icon_with_shadow_64.png" alt="Panama Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Panama' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/united_states_of_america_rectangular_icon_with_shadow_64.png" alt="US Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='US' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach

                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/nicaragua_rectangular_icon_with_shadow_64.png" alt="Nicaragua Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Nicaragua' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        @endif
                        @if ($continent->continent_code==='OC-3')
                        <div class="row padding-tb" style="justify-content: center;display: flex;">
                            <div class="text-content">
                                <h2 class="text-white text-center">Countries Covered Under Oceania Trade Data</h2>
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/australia_rectangular_icon_with_shadow_64.png" alt="Australia Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Australia' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/fiji_rectangular_icon_with_shadow_64.png" alt="Fiji Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Fiji' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/new_zealand_rectangular_icon_with_shadow_64.png" alt="New Zealand Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='New-Zealand' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        @endif
                        @if ($continent->continent_code === 'SA-11')
                        <div class="row padding-tb">
                            <div class="text-content">
                                <h2 class="text-white text-center">Countries Covered Under South America Trade Data</h2>
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/argentina_rectangular_icon_with_shadow_64.png" alt="Argentina Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Argentina' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/bolivia_rectangular_icon_with_shadow_64.png" alt="Bolivia Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Bolivia' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach

                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/brazil_rectangular_icon_with_shadow_64.png" alt="Brazil Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Brazil' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach

                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/chile_rectangular_icon_with_shadow_64.png" alt="Chile Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Chile' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/colombia_rectangular_icon_with_shadow_64.png" alt="Colombia Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Colombia' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach

                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/ecuador_rectangular_icon_with_shadow_64.png" alt="Ecuador Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Ecuador' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/guyana_rectangular_icon_with_shadow_64.png" alt="Guyana Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Guyana' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/paraguay_rectangular_icon_with_shadow_64.png" alt="Paraguay Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Paraguay' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/peru_rectangular_icon_with_shadow_64.png" alt="Peru Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Peru' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/uruguay_rectangular_icon_with_shadow_64.png" alt="Uruguay Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Uruguay' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                <img src="public/frontend/image/flags/venezuela_rectangular_icon_with_shadow_64.png" alt="Venezuela Import Export Data">
                                <br>
                                @foreach ($countrydata as $country)
                                    @if ($country->country=='Venezuela' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                            <h4>{{ $country->country }}</h4>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        @endif
                    @endif
                @endforeach
                <div class="clearfix"></div>
            </div>
            <div class="text-content flex" style="justify-content: center;">
                <div class="flex text-center" style="align-items: baseline;padding: 2px 15px 2px 4px;">
                    <i class="fa-solid fa-square" style="color: #00ca6f;"></i>
                    <p class="text-black text-white">&nbsp;&nbsp;Customs Data</p>
                </div>
                <div class="flex text-center" style="align-items: baseline;padding: 2px 15px 2px 4px;">
                    <i class="fa-solid fa-square" style="color: #fff;"></i>
                    <p class="text-black text-white">&nbsp;&nbsp;Statistical/BL Data</p>
                </div>
            </div>
        </div>

        @foreach ($continentdata as $continent)


        <!-- Top 10 imports of country -->
        <div class="container-fluid pdt-2 pdb-2">
            <div class="container">
                <div class="text-content">
                    <span>Imports</span>
                    <h2>
                        {{$continent->ci_heading}}
                    </h2>
                    <p>
                        {!!$continent->ci_para!!}
                    </p>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="list">
                            @php
                            $continent_import = explode("\n", $continent->ci_product);
                            @endphp
                            @foreach($continent_import as $continent_import)
                                @if(trim($continent_import) !== "")
                                <div class="list-pd" >{!! $continent_import !!}</div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <figure class="highcharts-figure">
                            <div id="container"></div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top 10 partners of continent-->
        <div class="container-fluid pdb-5 pdt-2">
            <div class="container">
                <div class="text-content">
                    <span>Partners </span>
                    <h2>
                       {{$continent->cp_heading}}
                    </h2>
                    <p>
                       {!!$continent->continent_partner_para!!}
                    </p>
                </div>
            </div>
            <div class="container pdt-2">
                <div  class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                        <figure class="highcharts-figure">
                            <div id="container-bar"></div>
                        </figure>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                        <div class="list">
                            @php
                            $continent_partner = explode("\n", $continent->continent_partner_name);
                            @endphp
                            @foreach($continent_partner as $continent_partner)
                                @if(trim($continent_partner) !== "")
                                <div class="list-pd" >{!! $continent_partner !!}</div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sample Data -->
        <div class="container-fluid padding-tb bg-dark-custom">
            <div class="container">
                <div class="text-content">
                    <span>Sample Data</span>
                    <h2 class="text-white">
                      {{$continent->sd_heading}}
                    </h2>
                    <p class="text-white">
                      {!!strip_tags(html_entity_decode($continent->sd_para))!!}
                    </p>
                </div>
            </div>
            <div class="container pdt-2">
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000">
                            <div class="flex" style="justify-content: center;">
                             @if ($continent->slider_images_one)
                                @php
                                    // Construct the full image URL using the base URL and the image filename.
                                    $imageURL = asset('https://cms.tradeimex.in/public/frontend/img/continent/' . $continent->slider_images_one);

                                @endphp
                            @endif
                            @if (!empty($imageURL))
                            <img src="{{ $imageURL }}" alt=" {{$continent->mf_content_metatitle}}" width="50%" style="border-radius: 12px;">
                            @endif
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="10000">
                            <div class="flex" style="justify-content: center;">
                             @if ($continent->slider_images_two)
                                @php
                                    // Construct the full image URL using the base URL and the image filename.
                                    $imageURL = asset('https://cms.tradeimex.in/public/frontend/img/continent/' . $continent->slider_images_two);

                                @endphp
                            @endif
                            @if (!empty($imageURL))
                            <img src="{{ $imageURL }}" alt=" {{$continent->mf_content_metatitle}}" width="50%" style="border-radius: 12px;">
                            @endif
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="10000">
                            <div class="flex" style="justify-content: center;">
                             @if ($continent->slider_images_three)
                                @php
                                    // Construct the full image URL using the base URL and the image filename.
                                    $imageURL = asset('https://cms.tradeimex.in/public/frontend/img/continent/' . $continent->slider_images_three);

                                @endphp
                            @endif
                            @if (!empty($imageURL))
                            <img src="{{ $imageURL }}" alt=" {{$continent->mf_content_metatitle}}" width="50%" style="border-radius: 12px;">
                            @endif
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="10000">
                            <div class="flex" style="justify-content: center;">
                            @if ($continent->slider_images_four)
                                @php
                                    // Construct the full image URL using the base URL and the image filename.
                                    $imageURL = asset('https://cms.tradeimex.in/public/frontend/img/continent/' . $continent->slider_images_four);

                                @endphp
                            @endif
                            @if (!empty($imageURL))
                            <img src="{{ $imageURL }}" alt=" {{$continent->mf_content_metatitle}}" width="50%" style="border-radius: 12px;">
                            @endif
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="10000">
                            <div class="flex" style="justify-content: center;">
                            @if ($continent->slider_images_five)
                                @php
                                    // Construct the full image URL using the base URL and the image filename.
                                    $imageURL = asset('https://cms.tradeimex.in/public/frontend/img/continent/' . $continent->slider_images_five);

                                @endphp
                            @endif
                            @if (!empty($imageURL))
                            <img src="{{ $imageURL }}" alt=" {{$continent->mf_content_metatitle}}" width="50%" style="border-radius: 12px;">
                            @endif
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                        <div class="bg-caret">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </div>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                        <div class="bg-caret">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </div>
                    </button>
                </div>
            </div>
        </div>
        @endforeach
        <!-- Benefits -->
        <!-- <div class="container-fluid padding-tb bg-bluish">
            <div class="container">
                <div class="text-content">
                    <span>Benefits</span>
                    <h2>
                        Don’t waste time reinventing the payments wheel
                    </h2>
                    <p>
                        Building a conversion-optimized payments experience is hard.
                        Elements lets you take advantage of Stripe’s collective experience
                        across front-end, design, and analytics, so that you can spend less
                        time on payments and more time on your product.
                    </p>
                </div>
            </div>
            <div class="container pdt-2">
                New Card Design will be implented here for benefits -->
                <!-- <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="card-content pdb-2">
                            <div class="head">
                                <h3>UI Optimizations</h3>
                            </div>
                            <li class="list">Client-side input validation</li>
                            <li class="list">Input masking</li>
                            <li class="list">Card-specific CVC hints</li>
                            <li class="list">Built-in accessibility (ARIA)</li>
                            <li class="list">Autofill via browser</li>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="card-content pdb-2">
                            <div class="head">
                                <h3>UI Optimizations</h3>
                            </div>
                            <li class="list">Client-side input validation</li>
                            <li class="list">Input masking</li>
                            <li class="list">Card-specific CVC hints</li>
                            <li class="list">Built-in accessibility (ARIA)</li>
                            <li class="list">Autofill via browser</li>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="card-content pdb-2">
                            <div class="head">
                                <h3>UI Optimizations</h3>
                            </div>
                            <li class="list">Client-side input validation</li>
                            <li class="list">Input masking</li>
                            <li class="list">Card-specific CVC hints</li>
                            <li class="list">Built-in accessibility (ARIA)</li>
                            <li class="list">Autofill via browser</li>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="card-content pdb-2">
                            <div class="head">
                                <h3>UI Optimizations</h3>
                            </div>
                            <li class="list">Client-side input validation</li>
                            <li class="list">Input masking</li>
                            <li class="list">Card-specific CVC hints</li>
                            <li class="list">Built-in accessibility (ARIA)</li>
                            <li class="list">Autofill via browser</li>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Last Partner tab -->

        @include('frontend.tab_inc')

        @include('frontend.footer')

        @include('frontend.script')


        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

        <!-- Top 10 imports of continent (Pie Chart) -->
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
            var Tradedgoods = [
                    @foreach($continentdata as $continent)
                        @php
                            $products = [];
                            preg_match_all('/([A-Za-z\s]+):\s\$([\d\.]+) billion/', $continent->ci_product, $matches, PREG_SET_ORDER);
                            foreach ($matches as $match) {
                                $product = [
                                    'category' => $match[1],
                                    'value' => (float) $match[2]
                                ];
                                $products[] = $product;
                            }
                            echo json_encode($products) . ",";
                        @endphp
                    @endforeach
                ];

                // Now you can access the extracted data like this:
                console.log("Tradedgoods",Tradedgoods);

                var category = Tradedgoods.map(function(item) {
                    return item.map(function(subItem) {
                        return subItem.category;
                    });
                }).flat();

                var value = Tradedgoods.map(function(item) {
                    return item.map(function(subItem) {
                        return subItem.value;
                    });
                }).flat();

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
                            format: '<b>{point.name}</b>',
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
                            name: value[0],
                            y: value[0]
                        },
                        {
                            name: value[1],
                            y: value[1]
                        },
                        {
                            name: value[2],
                            y: value[2]
                        },
                        {
                            name: value[3],
                            y:  value[2]
                        },
                        {
                            name: value[4],
                            y: value[4]
                        },
                        {
                            name: value[5],
                            y: value[5]
                        },
                        {
                            name: value[6],
                            y: value[6]
                        },
                        {
                            name: value[7],
                            y: value[7]
                        },
                        {
                            name: value[8],
                            y: value[8]
                        },
                        {
                            name: value[9],
                            y: value[9]
                        },
                    ]
                }]
            });

        </script>
        <!-- End of chart js -->

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


        <!-- Top 10 partners of country (Bar Chart) -->
        <script>
            var Tradeddata = [
                @foreach($continentdata as $continent)
                    @php
                        $products = [];
                        preg_match_all('/([A-Za-z\s]+):\sExports \(\$([\d\.]+) billion\), Imports \(\$([\d\.]+) billion\)/', $continent->continent_partner_name, $matches, PREG_SET_ORDER);
                        foreach ($matches as $match) {
                            $product = [
                                'country' => $match[1],
                                'exports' => (float) $match[2],
                                'imports' => (float) $match[3]
                            ];
                            $products[] = $product;
                        }
                        echo json_encode($products) . ",";
                    @endphp
                @endforeach
            ];
            console.log("Tradeddata",Tradeddata);
                var country = Tradeddata.map(function(item) {
                    return item.map(function(subItem) {
                        return subItem.country;
                    });
                }).flat();

                var exports = Tradeddata.map(function(item) {
                    return item.map(function(subItem) {
                        return subItem.exports;
                    });
                }).flat();
                var imports = Tradeddata.map(function(item) {
                    return item.map(function(subItem) {
                        return subItem.imports;
                    });
                }).flat();
            Highcharts.chart('container-bar', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Top 10 Trade Partners {{$continent->continent}}',
                    align: 'left'
                },
                subtitle: {
                    text: 'Source: <a ' +
                        '',
                    align: 'left'
                },
                xAxis: {
                    categories: country,
                    title: {
                        text: null
                    },
                    gridLineWidth: 1,
                    lineWidth: 0
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: '',
                        align: 'high'
                    },
                    labels: {
                        overflow: 'justify'
                    },
                    gridLineWidth: 0
                },
                tooltip: {
                    valueSuffix: ''
                },
                plotOptions: {
                    bar: {
                        borderRadius: '50%',
                        dataLabels: {
                            enabled: true
                        },
                        groupPadding: 0.1
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'top',
                    x: -40,
                    y: 0,
                    floating: true,
                    borderWidth: 1,
                    backgroundColor:
                        Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
                    shadow: true
                },
                credits: {
                    enabled: false
                },
                series: [{
                    name: 'Export',
                    data: exports
                }, {
                    name: 'Import',
                    data: imports
                }, ]
            });
        </script>

        <!-- End of Bar chart js -->

        <!-- Flag JS -->
        <script type="text/javascript">
            function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active-1", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active-1";
            }
        </script>
        <!-- End Of Flag JS -->
    </body>
</html>
