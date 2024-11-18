<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="google-site-verification" content="kevV-HFG1JijHyuKnnkIeN6dY_Hb-ueXuqoUv-pPWUU" />
        <meta name="ahrefs-site-verification" content="167ef56daf7b5a6af88ecea027be9df8f7a528cfe6be55f3f794a32094b792f2">
        <meta name="keywords" content="Import Export Data, Export Import Data Provider, Business Intelligence Report, Import Export Trade Data, Best Market Research, Importers Exporters Data, Buyers List, List of Suppliers, Trade Data, Best Import Export Data" />
        <meta name="robots" content="index, follow" id="robots" />
        <meta name="description" content="Get accurate and comprehensive global trade data at TradeImeX- the leading import-export data provider. Access market exploration and trade perceptivity for over 80 countries to make informed business opinions. TradeImeX, with its comprehensive and accurate global trade data, empowers importers and exporters by furnishing them with the means to make informed opinions in the world of Global trade. Stay ahead in transnational trade with our dependable and latest data results." />
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
        <title>Global Trade Data Provider | Trade Statistics & Analysis - TradeImeX</title>
        <link rel="icon" type="image/x-icon" href="public/frontend/image/img/Favicon Logo.png">
        <link rel="canonical" href="https://www.tradeimex.in/globe-trade-data"/>

       @include('frontend.link')   
    </head>
    <body>
        @include('frontend.header')

        <!-- Overview content -->
        <div class="container-fluid padding-tb bg-bluish">
            <div class="container">
                <div class="text-content">
                   <h1 class="gradient-h2">FASCINATING INSIGHTS ABOUT GLOBAL TRADE DATA</h1>
                   <p>
                        TradeImeX simplifies the process of international trade data by providing businesses with
                        access to extensive international trade information and market research intelligence. Exporters
                        and importers need to have access to global trade data because it facilitates the process of
                        identifying potential customers for their goods and projecting earnings in those areas. To obtain
                        a competitive edge over other vendors, exporters are recommended to closely monitor any
                        upgrades that might surface at any point. With data spanning more than 80 countries and 6
                        continents, companies can make informed decisions, identify new business prospects, and
                        mitigate risks associated with global trade and import-export data. With its thorough and
                        precise trade data insights, TradeImeX gives importers and exporters the tools they need to
                        make wise decisions, empowering them. Businesses may remain ahead of the competition,
                        accelerate their growth, and prosper in the fast-paced world of international trade by utilizing
                        the power of global trade data.
                    </p>
                </div>
            </div>
        </div>

        <!-- Countires list -->
        <div class="container-fluid pdt-5 pdb-2 slanted-bottom bg-dark-custom">
            <div class="container pdb-5">
                <div class="country-tab">
                    <button class="country-tablink active-1" onclick="openLink(event, 'custom')">
                        <i class="fa-solid fa-file-pen fa-lg"></i> &nbsp;Custom Data
                    </button>
                    <button class="country-tablink" onclick="openLink(event, 'stat')">
                        <i class="fa-solid fa-magnifying-glass-chart fa-lg"></i> &nbsp;Statistical Data
                    </button>
                    <button class="country-tablink" onclick="openLink(event, 'bl')">
                        <i class="fa-solid fa-chart-simple fa-lg"></i> &nbsp;B/L Data
                    </button>
                </div>

                <!-- Custom -->
                <div id="custom" class="country-tabcontent" style="display:flex">
                    <div class="container">
                        <!-- Africa -->
                        <div class="container">
                            <div class="text-content">
                                <h2 class="text-center text-white">Africa</h2>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/botswana_rectangular_icon_with_shadow_64.png" alt="Botswana Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Botswana' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/cameroon_rectangular_icon_with_shadow_64.png" alt="Cameroon Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Cameroon' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/central_african_republic_rectangular_icon_with_shadow_64.png" alt="Centra-Africa Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Central-Africa' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="/public/frontend/image/flags/chad_rectangular_icon_with_shadow_64.png" alt="Chad Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Chad' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="/public/frontend/image/flags/democratic_republic_of_the_congo_rectangular_icon_with_shadow_64.png" alt="Congo Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Congo' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/ethiopia_rectangular_icon_with_shadow_64.png" alt="Ethiopia Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Ethiopia' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/ghana_rectangular_icon_with_shadow_64.png" alt="Ghana Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Ghana' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/cote_d_Ivoire_rectangular_icon_with_shadow_64.png" alt="Ivory Coast Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='ivorycoast' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/kenya_rectangular_icon_with_shadow_64.png" alt="Kenya Import Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Kenya' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/lesotho_rectangular_icon_with_shadow_64.png" alt="Lesotho Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Lesotho' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/liberia_rectangular_icon_with_shadow_64.png" alt="Liberia Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Liberia' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/malawi_rectangular_icon_with_shadow_64.png" alt="Malawi Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Malawi' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/namibia_rectangular_icon_with_shadow_64.png" alt="Namibia Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Namibia' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/niger_rectangular_icon_with_shadow_64.png" alt="Niger Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Niger' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/nigeria_rectangular_icon_with_shadow_64.png" alt="Nigeria Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Nigeria' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/sao_tome_and_principe_rectangular_icon_with_shadow_64.png" alt="Sao Tome Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Sao-Tome' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/senegal_rectangular_icon_with_shadow_64.png" alt="Senegal Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Senegal' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/sierra_leone_rectangular_icon_with_shadow_64.png" alt="Sierra Leone Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Sierra-Leone' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/tanzania_rectangular_icon_with_shadow_64.png" alt="Tanzania Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Tanzania' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/togo_rectangular_icon_with_shadow_64.png" alt="Togo Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Togo' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/uganda_rectangular_icon_with_shadow_64.png" alt="Uganda Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Uganda' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/zambia_rectangular_icon_with_shadow_64.png" alt="Zambia Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Zambia' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/zimbabwe_rectangular_icon_with_shadow_64.png" alt="Zimbabwe Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Zimbabwe' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Asia -->
                        <div class="container">
                            <div class="text-content">
                                <h2 class="text-center text-white">Asia</h2>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/bangladesh.png" alt="Bangladesh Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Bangladesh' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/indonesia_rectangular_icon_with_shadow_64.png" alt="Indonesia Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Indonesia' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/kazakhstan_rectangular_icon_with_shadow_64.png" alt="Kazakhstan Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Kazakhstan' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/pakistan_rectangular_icon_with_shadow_64.png" alt="Pakistan Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Pakistan' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/philippines_rectangular_icon_with_shadow_64.png" alt="Philippines Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Philippines' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/sri_lanka_rectangular_icon_with_shadow_64.png" alt="Sri Lanka Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Sri-Lanka' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [strtolower($country->country), $country->Datatype]) }}" class="text-hover custom">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/thailand_rectangular_icon_with_shadow_64.png" alt="Thailand Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Thailand' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/turkey_rectangular_icon_with_shadow_64.png" alt="Turkey Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Turkey' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags//ukraine_rectangular_icon_with_shadow_64.png" alt="Ukraine Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Ukraine' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/uzbekistan_rectangular_icon_with_shadow_64.png" alt="Uzbekistan Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Uzbekistan' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/vietnam_rectangular_icon_with_shadow_64 (1).png" alt="Vietnam Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Vietnam' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Europe -->
                        <div class="container">
                            <div class="text-content">
                                <h2 class="text-center text-white">Europe</h2>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/kazakhstan_rectangular_icon_with_shadow_64.png" alt="Kazakhstan Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Kazakhstan' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/kosovo_rectangular_icon_with_shadow_64 (1).png" alt="Kosovo Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Kosovo' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/moldova_rectangular_icon_with_shadow_64.png" alt="Moldova Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Moldova' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/russia_rectangular_icon_with_shadow_64.png" alt="Russia Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Russia' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/ukraine_rectangular_icon_with_shadow_64.png" alt="Ukraine Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Ukraine' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/uzbekistan_rectangular_icon_with_shadow_64.png" alt="Uzbekistan Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Uzbekistan' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- America -->
                        <div class="container">
                            <div class="text-content">
                                <h2 class="text-center text-white">North - America</h2>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/costa_rica_rectangular_icon_with_shadow_64.png" alt="Costa Rica Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Costa-Rica' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/mexico_rectangular_icon_with_shadow_64.png" alt="Mexico Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Mexico' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/el_salvador_rectangular_icon_with_shadow_64.png" alt="EL Salvador Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='EL-Salvador' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/panama_rectangular_icon_with_shadow_64.png" alt="Panama Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Panama' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/nicaragua_rectangular_icon_with_shadow_64.png" alt="Nicaragua Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Nicaragua' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                {{-- <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/honduras_rectangular_icon_with_shadow_64.png" alt="Honduras Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Honduras' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/united_states_of_america_rectangular_icon_with_shadow_64.png" alt="US Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='US' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div> --}}
                            </div>
                            <div class="text-content">
                                <h2 class="text-center text-white">South - America</h2>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/argentina_rectangular_icon_with_shadow_64.png" alt="Argentina Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Argentina' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/bolivia_rectangular_icon_with_shadow_64.png" alt="Bolivia Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Bolivia' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/brazil_rectangular_icon_with_shadow_64.png" alt="Brazil Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Brazil' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/chile_rectangular_icon_with_shadow_64.png" alt="Chile Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Chile' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/colombia_rectangular_icon_with_shadow_64.png" alt="Colombia Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Colombia' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/ecuador_rectangular_icon_with_shadow_64.png" alt="Ecuador Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Ecuador' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/guyana_rectangular_icon_with_shadow_64.png" alt="Guyana Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Guyana' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/paraguay_rectangular_icon_with_shadow_64.png" alt="Paraguay Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Paraguay' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/peru_rectangular_icon_with_shadow_64.png" alt="Peru Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Peru' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/uruguay_rectangular_icon_with_shadow_64.png" alt="Uruguay Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Uruguay' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/venezuela_rectangular_icon_with_shadow_64.png" alt="Venezuela Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Venezuela' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Oceania -->
                        <div class="container">
                            <div class="text-content">
                                <h2 class="text-center text-white">Oceania</h2>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-md-3 col-lg-2 Flag">
                                    <img src="public/frontend/image/flags/fiji_rectangular_icon_with_shadow_64.png" alt="Fiji Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Fiji' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <!-- Stats -->
                <div id="stat" class="country-tabcontent">
                    <div class="container">
                        <!-- Africa -->
                        <div class="container">
                            <div class="text-content">
                                <h2 class="text-center text-white">Africa</h2>
                            </div>
                            <div class="row">
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
                            </div>
                        </div>

                        <!-- Asia -->
                        <div class="container">
                            <div class="text-content">
                                <h2 class="text-center text-white">Asia</h2>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                    <img src="public/frontend/image/flags/china_rectangular_icon_with_shadow_64.png" alt="China Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='China' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover text-white">
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
                            </div>
                        </div>

                        <!-- Europe -->
                        <div class="container">
                            <div class="text-content">
                                <h2 class="text-center text-white">Europe</h2>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                    <img src="public/frontend/image/flags/austria_rectangular_icon_with_shadow_64.png" alt="Austria Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Austria' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
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
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
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
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
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
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
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
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
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
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
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
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
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
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
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
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
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
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
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
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
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
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
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
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
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
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
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
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
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
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
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
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
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
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
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
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
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
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
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
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
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
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
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
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
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
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
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
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
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
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
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
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
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
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- America -->
                        <div class="container">
                            <div class="text-content">
                                <h2 class="text-center text-white">North - America</h2>
                            </div>
                            <div class="row">
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
                            </div>
                        </div>

                        <!-- Oceania -->
                        <div class="container">
                            <div class="text-content">
                                <h2 class="text-center text-white">Oceania</h2>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                    <img src="public/frontend/image/flags/australia_rectangular_icon_with_shadow_64.png" alt="Australia Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Australia' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [  strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
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
                                            <a href="{{ route('countryalldata', [strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <!-- BL Data -->
                <div id="bl" class="country-tabcontent">
                    <div class="container">
                        <!-- Asia -->
                        <div class="container">
                            <div class="text-content">
                                <h2 class="text-center text-white">Asia</h2>
                            </div>
                            <div class="row">
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
                                    <img src="public/frontend/image/flags/kuwait_rectangular_icon_with_shadow_64.png" alt="Kuwait Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Kuwait' && $country->Datatype =='import')
                                        <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
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
                            </div>
                        </div>

                        <!-- Europe -->
                        <div class="container">
                            <div class="text-content">
                                <h2 class="text-center text-white">Europe</h2>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                    <img src="public/frontend/image/flags/belgium_rectangular_icon_with_shadow_64.png" alt="Belgium Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='Belgium' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
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
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
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
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
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
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
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
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
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
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-3 Flag">
                                    <img src="public/frontend/image/flags/united_kingdom_rectangular_icon_with_shadow_64.png" alt="United Kingdom Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='UK' && $country->Datatype =='import')
                                            <a href="{{ route('countryalldata', [ strtolower($country->country), $country->Datatype]) }}" class="text-hover stat">
                                                <h4>{{ $country->country }}</h4>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- America -->
                        <div class="container">
                            <div class="text-content">
                                <h2 class="text-center text-white">North - America</h2>
                            </div>
                            <div class="row">
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
                                    <img src="public/frontend/image/flags/el_salvador_rectangular_icon_with_shadow_64.png" alt="EL Salvador Import Export Data">
                                    <br>
                                    @foreach ($countrydata as $country)
                                        @if ($country->country=='EL-Salvador' && $country->Datatype =='import')
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
                            </div>
                        </div>

                        <!-- Oceania -->
                        <div class="container">
                            <div class="text-content">
                                <h2 class="text-center text-white">Oceania</h2>
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
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Global Trade Data -->
        <div class="container-fluid pdt-2 pdb-2 bg-white">
            <div class="container">
                <div class="text-content">
                    <span>Global Trade Data</span>
                    <h2>What is Global Trade Data?</h2>
                </div>
                <div class="text-content">
                   <p>
                        The process of trading products and services across international borders is known as global
                        trade, and the trade information regarding international shipments which includes the global
                        import-export data is called the global trade data. Since the advent of globalization in 1991,
                        trade between countries has increased dramatically. The global reach of local dealers&#39; and
                        vendors&#39; items is a result of this data. It also lessens global poverty and promotes economic
                        prosperity. Global trade is a major factor in the economic growth and development of today&#39;s
                        connected globe. Businesses require access to precise and dependable global trade data to
                        successfully traverse the intricate web of international markets. With the help of TradeImeX
                        and its all-inclusive solution, businesses can leverage the power of international trade data to
                        help importers and exporters make wise decisions and seize new business opportunities.
                    </p>
                </div>
            </div>
        </div>

        <!-- Leveraging -->
        <div class="container-fluid pdt-2 pdb-2 bg-dark-custom">
            <div class="container">
                <div class="text-content">
                    <span>Leveraging</span>
                    <h2 class="text-white">Leveraging TradeImeX Global Trade Data</h2>
                    <p class="text-white">
                        Global trade data provides vital insights into international markets, helping businesses identify
                        emerging trends, evaluate their competitors, and make data-driven decisions. Having access to
                        accurate and comprehensive trade data is essential for businesses looking to expand into new
                        markets, optimize supply chains, and identify potential partners or suppliers. Global trade data
                        is a valuable resource for businesses seeking to seize new opportunities, expand into new
                        markets, and optimize their operations. TradeImeX, with its comprehensive and accurate trade
                        data insights, empowers importers and exporters by providing them with the means to make
                        informed decisions. By leveraging the power of global trade data, businesses can stay ahead of
                        the competition, boost their growth, and thrive in the dynamic world of international trade.
                    </p>
                </div>
            </div>
        </div>

        <!-- Significance -->
        <div class="container-fluid pdt-2 pdb-2 bg-white">
            <div class="container">
                <div class="text-content">
                    <span>The Significance</span>
                    <h2>The Significance of Reliable Global Trade Data</h2>
                </div>
                <div class="text-content">
                    <p>
                        One of the three Cs of overseas trade is global trade. It captures all the details required to meet
                        the demands of traders and marketers, including price, quantity, specific codes, and much more
                        about the goods that are imported or exported. Every nation engages in frequent trade, which
                        leads to a large number of import and export-related transactions. Global trade data keeps
                        things simple and easy to comprehend for traders by bringing all the information together in
                        one location.
                    </p>
                    <p>
                        Global trade data is crucial for exporters because it makes it easier for them to identify possible
                        markets for their goods and to project earnings in those markets. To gain an advantage over
                        other dealers, exporters are advised to keep a careful watch on any updates that may appear at
                        any time.
                    </p>
                    <p>
                        This information is crucial for importers as well since it aids in their analysis of the foreign
                        product&#39;s potential for growth in the home market. Importers import items from a particular
                        country based on the results.
                    </p>
                </div>
            </div>
        </div>

        <!-- Last Partner tab -->
        @include('frontend.tab_inc')
        @include('frontend.footer')
        @include('frontend.script')

        <!-- Country Tab -->
        <script>
            function openLink(evt, animName) {
                var i, x, tablinks;
                x = document.getElementsByClassName("country-tabcontent");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("country-tablink");
                for (i = 0; i < x.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active-1", "");
                }
                document.getElementById(animName).style.display = "flex";
                evt.currentTarget.className += " active-1"
            }
        </script>
        <!-- End Of Country -->
    </body>
</html>