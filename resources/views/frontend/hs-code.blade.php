<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="google-site-verification" content="kevV-HFG1JijHyuKnnkIeN6dY_Hb-ueXuqoUv-pPWUU" />
        <meta name="ahrefs-site-verification" content="167ef56daf7b5a6af88ecea027be9df8f7a528cfe6be55f3f794a32094b792f2">
        <meta name="keywords" content="Import Export Data, Export Import Data Provider, Business Intelligence Report, Import Export Trade Data, Best Market Research, Importers Exporters Data, Buyers List, List of Suppliers, Trade Data, Best Import Export Data" />
        <meta name="robots" content="index, follow" id="robots" />
        <meta name="description" content="We specialize in providing HS codes, offering comprehensive insights to empower your business decisions. TradeImeX simplifies the process of finding and utilizing HS code by providing a comprehensive and updated database. Explore our extensive customs database to get access to HS codes for over 80 countries and unlock the potential of international trade with TradeImeX." />
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
        <title>Harmonised System (HS) Code | HS Code - TradeImeX</title>
        <link rel="icon" type="image/x-icon" href="/public/frontend/image/img/Favicon Logo.png">
        <link rel="canonical" href="https://www.tradeimex.in/hs-code"/>
        @include('frontend.link')
        <style>
            .tbl-dark {
                background-color: #2dd9e0 !important;
            }
        </style>
    </head>
    <body>
        @include('frontend.header')

        <!-- Search Live Import Export -->
        <div class="container-fluid pdt-2 pdt-2 bg-bluish">
            <div class="text-content text-center bg-color">
                <h1 style="font-size: 38px;">
                    Search By Harmonized Code System
                </h1>
            </div>
            <div class="container">
                <div class="row bg-green" style="border-radius: 1rem;">
                    {{-- Country select page --}}
                    {{-- <div class="searchbox col-sm-2 col-md-2  col-lg-2">
                        <select class="form-control"  style="border: 0px transparent !important;">
                            <option class="form-control" value="">Select Country</option>
                            <!-- Asia -->
                            <option class="form-control" value="">Bangladesh</option>
                            <option class="form-control" value="">China</option>
                            <option class="form-control" value="">Egypt</option>
                            <option class="form-control" value="">Indonesia</option>
                            <option class="form-control" value="">Iran</option>
                            <option class="form-control" value="">Iraq</option>
                            <option class="form-control" value="">Japan</option>
                            <option class="form-control" value="">Kazakhstan</option>
                            <option class="form-control" value="">Kuwait</option>
                            <option class="form-control" value="">Malaysia</option>
                            <option class="form-control" value="">Pakistan</option>
                            <option class="form-control" value="">Philippines</option>
                            <option class="form-control" value="">Qatar</option>
                            <option class="form-control" value="">Saudi Arabia</option>
                            <option class="form-control" value="">Singapore</option>
                            <option class="form-control" value="">South Korea</option>
                            <option class="form-control" value="">Sri Lanka</option>
                            <option class="form-control" value="">Taiwan</option>
                            <option class="form-control" value="">Thailand</option>
                            <option class="form-control" value="">Turkey</option>
                            <option class="form-control" value="">UAE</option>
                            <option class="form-control" value="">Ukraine</option>
                            <option class="form-control" value="">Uzbekistan</option>
                            <option class="form-control" value="">Vietnam</option>
                            <!-- Africa -->
                            <option class="form-control" value="">Botswana</option>
                            <option class="form-control" value="">Cameroon</option>
                            <option class="form-control" value="">Central Africa</option>
                            <option class="form-control" value="">Chad</option>
                            <option class="form-control" value="">DR Congo</option>
                            <option class="form-control" value="">Ethiopia</option>
                            <option class="form-control" value="">Ghana</option>
                            <option class="form-control" value="">Ivory Coast</option>
                            <option class="form-control" value="">Kenya</option>
                            <option class="form-control" value="">Lesotho</option>
                            <option class="form-control" value="">Liberia</option>
                            <option class="form-control" value="">Malawi</option>
                            <option class="form-control" value="">Namibia</option>
                            <option class="form-control" value="">Niger</option>
                            <option class="form-control" value="">Nigeria</option>
                            <option class="form-control" value="">Sao Tome</option>
                            <option class="form-control" value="">Senegal</option>
                            <option class="form-control" value="">Sierra Leone</option>
                            <option class="form-control" value="">South Africa</option>
                            <option class="form-control" value="">Tanzamia</option>
                            <option class="form-control" value="">Togo</option>
                            <option class="form-control" value="">Uganda</option>
                            <option class="form-control" value="">Zambia</option>
                            <option class="form-control" value="">Zimbabwe</option>
                            <!-- America -->
                            <option class="form-control" value="">Canada</option>
                            <option class="form-control" value="">Costa Rica</option>
                            <option class="form-control" value="">El Salvador</option>
                            <option class="form-control" value="">Guatemala</option>
                            <option class="form-control" value="">Honduras</option>
                            <option class="form-control" value="">Mexico</option>
                            <option class="form-control" value="">Panama</option>
                            <option class="form-control" value="">US</option>
                            <option class="form-control" value="">Argentina</option>
                            <option class="form-control" value="">Bolivia</option>
                            <option class="form-control" value="">Brazil</option>
                            <option class="form-control" value="">Chile</option>
                            <option class="form-control" value="">Colombia</option>
                            <option class="form-control" value="">Ecuador</option>
                            <option class="form-control" value="">Guyana</option>
                            <option class="form-control" value="">Paraguay</option>
                            <option class="form-control" value="">Peru</option>
                            <option class="form-control" value="">Uruguay</option>
                            <option class="form-control" value="">Venezuela</option>
                            <!-- Europe -->
                            <option class="form-control" value="">Austria</option>
                            <option class="form-control" value="">Belgium</option>
                            <option class="form-control" value="">Bulgaria</option>
                            <option class="form-control" value="">Croatia</option>
                            <option class="form-control" value="">Cyprus</option>
                            <option class="form-control" value="">Czech</option>
                            <option class="form-control" value="">Denmark</option>
                            <option class="form-control" value="">Estonia</option>
                            <option class="form-control" value="">Finland</option>
                            <option class="form-control" value="">France</option>
                            <option class="form-control" value="">Germany</option>
                            <option class="form-control" value="">Greece</option>
                            <option class="form-control" value="">Hungary</option>
                            <option class="form-control" value="">Ireland</option>
                            <option class="form-control" value="">Italy</option>
                            <option class="form-control" value="">Kazakhstan</option>
                            <option class="form-control" value="">Kosovo</option>
                            <option class="form-control" value="">Latvia</option>
                            <option class="form-control" value="">Lithuania</option>
                            <option class="form-control" value="">Luxembourg</option>
                            <option class="form-control" value="">Malta</option>
                            <option class="form-control" value="">Moldova</option>
                            <option class="form-control" value="">Netherlands</option>
                            <option class="form-control" value="">Poland</option>
                            <option class="form-control" value="">Portugal</option>
                            <option class="form-control" value="">Russia</option>
                            <option class="form-control" value="">Romania</option>
                            <option class="form-control" value="">Slovenia</option>
                            <option class="form-control" value="">Spain</option>
                            <option class="form-control" value="">Sweden</option>
                            <option class="form-control" value="">Uk</option>
                            <option class="form-control" value="">Ukraine</option>
                            <option class="form-control" value="">Uzbekistan</option>
                            <!-- Oceania -->
                            <option class="form-control" value="">Australia</option>
                            <option class="form-control" value="">Fiji</option>
                            <option class="form-control" value="">New Zealand</option>
                        </select>
                    </div> --}}

                    {{-- This tab will be used in database page --}}
                    {{-- <div class="searchbox col-sm-2 col-md-2 col-lg-2">
                        <select class="form-control" style="border: 0px transparent !important;">
                            <option class="form-control" value="">Import</option>
                            <option class="form-control" value="">Export</option>
                        </select>
                    </div> --}}
                    <form class="form-flex" action="{{ url('/search') }}" method="get" enctype="multipart/form-data">
                        @csrf
                        <div class="searchbox col-sm-5 col-md-5 col-lg-5">
                            <input type="text" name="hs-code" placeholder="Search By HS Code" class="form-control">
                        </div>
                        <div class="searchbox col-sm-5 col-md-5 col-lg-5">
                            <input type="text" name="description" placeholder="Search By Description" class="form-control">
                        </div>
                        <div class="searchbox col-sm-2 col-md-2 col-lg-2">
                            <button class="ybtn ybtn-header-color" style="width: 100%;text-align: center;padding: 18px 0px 18px 0px;">
                                Search
                            </button>
                        </div>
                    </form>                                     
                </div>
            </div>

            <!-- Table Of HS Code -->
            <div class="container padding-tb">
                <div class="text-content text-center bg-color">
                    @if(isset($error_hscode))
                        <div class="alert alert-danger">
                            {{ $error_hscode }}
                        </div>
                    @endif
                    @if (!empty($hscode))
                        <h1 style="font-size: 38px;">
                            HS Code - {{ $hscode }}
                        </h1>
                    @endif
                    @if (!empty($desc))
                        <h1 style="font-size: 38px;">
                            HS Description - {{ $desc }}
                        </h1>
                    @endif
                </div>
                <table class="table table-responsive table-hover table-rounded">
                    <thead>
                        <tr>
                            <th scope="col" class="table-primary">
                                <h4>
                                    <b>HS Code</b>
                                </h4>
                            </th>
                            <th scope="col">
                                <h4>
                                    <b>Description</b>
                                </h4>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(session('searcherror'))
                            <div class="alert alert-danger" id="error-alert">
                               <h3 style="text-align: center;"> {{ session('searcherror') }}</h3>
                            </div>
                        @endif
                        @if (isset($results) && $results->count() > 0)
               
                            @foreach ($results as $result)
                                @php
                                    $description = $result->Description;
                                @endphp

                                <tr>
                                    <th class="table-primary">
                                        <a class="text-hover" href="{{ route('search.list', ['hsCode' => $result->hs_code,  'description' => Str::lower($description)]) }}">{{ $result->hs_code }}</a>
                                    </th>
                                    <td class="tbl-dark">
                                        <a class="text-hover" href="{{ route('search.list', ['hsCode' => $result->hs_code,  'description' => Str::lower($description)]) }}">{{ $result->Description }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        @elseif (isset($chapters))
                            @foreach ($chapters as $chapterCode => $chapter)
                                @php
                                    $description = $chapter['description']
                                @endphp
                                <tr>
                                    <th class="table-primary">
                                        <a class="text-hover" href="{{ route('subchapter.list', ['chapterCode' => $chapterCode , 'description' => Str::lower($description)]) }}">Chapter {{ $chapterCode }}</a>
                                    </th>
                                    <th class="tbl-dark">
                                        <a class="text-hover" href="{{ route('subchapter.list', ['chapterCode' => $chapterCode, 'description' => Str::lower($description)]) }}">{{ $chapter['description'] }}</a>
                                    </th>
                                </tr>
                            @endforeach   
                        @else
                            <div class="text-content ">
                                <h3 class="text-center">HS-Code ends here...</h3>
                            </div>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>

        <!-- Discover World Trade Data -->
        <div class="container-fluid pdt-2 pdb-2 bg-bluish">
            <div class="container">
                <div class="text-content">
                    <h2>Discover World By Trade Data</h2>
                    <p>
                        The importance of accurate HS code or Harmonized System code classification cannot be
                        overstated in international trade. With the complexity and vastness of global trade, using a
                        reliable platform like TradeImeX is essential for efficient HS code retrieval and analysis.
                        TradeImeX simplifies the process of finding and utilizing HS codes by providing a comprehensive
                        and up-to-date database, along with powerful search functionalities. By leveraging the data
                        resources offered by TradeImeX, businesses can optimize their trade operations, navigate
                        regulatory requirements, and make informed decisions based on reliable trade data. TradeImeX
                        helps businesses comply with customs regulations by providing the most up-to-date HS codes.
                        This ensures smooth customs clearance and minimizes the chances of audits or penalties.
                        Experience the power of HS codes with TradeImeX and unlock the full potential of international
                        trade today.
                    </p>
                </div>
            </div>
        </div>
        <!-- End Of Discover World Trade Data -->

        <!-- Overview Of HS Code -->
        <div class="container-fluid pdt-2 pdb-2 bg-bluish">
            <div class="container">
                <div class="text-content">
                    <span>OverView Of HS Code</span>
                    <h2>
                        What are HS Codes?
                    </h2>
                    <p>
                        HS codes, also known as Harmonized System codes, are a standardized numerical classification
                        system used to classify and identify products in international trade. These codes are recognized
                        and utilized by customs authorities worldwide to streamline the movement of goods across
                        borders.
                    </p>
                </div>
            </div>
            <div class="container pdt-2">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 flex" style="align-items: center;">
                        <div class="hero-title" style="padding: 50px 0px 50px 0px;">
                            <h1 class="gradient-h2">
                                HS CODE
                            </h1>
                            <span>
                                A Powerfull Bit Of Information
                            </span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="card-content cdh-none">
                                    <!-- <div class="icon">
                                        <img src="assets/img/growth.png" width="20%" style="padding: 0px 0px 0px 10px;">
                                    </div> -->
                                    <div class="head">
                                        <h3>The importance of accurate HS code classification:</h3>
                                    </div>
                                    <li class="list text-white">Ensuring compliance with import and export regulations</li>
                                    <li class="list text-white">Facilitating trade negotiations and agreements</li>
                                    <li class="list text-white">Enabling proper identification and categorization of goods</li>
                                    <li class="list text-white">Simplifying customs procedures and clearance</li>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="card-content cdh-none">
                                    <div class="head">
                                        <h3>Accurate and up-to-date HS code database:</h3>
                                    </div>
                                    <li class="list text-white">Detailed product descriptions and classifications</li>
                                    <li class="list text-white">Comprehensive coverage of import and export data</li>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="card-content cdh-none">
                                    <div class="head">
                                        <h3>Efficiency in trade analysis:</h3>
                                    </div>
                                    <li class="list text-white">Identifying market trends and opportunities</li>
                                    <li class="list text-white">Analyzing import/export volumes and values </li>
                                    <li class="list text-white">Tracking competitors&#39; activities</li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Overview Of HS Code -->

        <!-- Significance -->
        <div class="container-fluid bg-bluish pdt-2 pdb-2 bg-bluish">
            <div class="container">
                <div class="text-content">
                    <h2>
                        The Significance of HS Codes in Global Trade
                    </h2>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="card-content cdh-none">
                                    <!-- <div class="icon">
                                        <img src="assets/img/growth.png" width="20%" style="padding: 0px 0px 0px 10px;">
                                    </div> -->
                                    <div class="head">
                                        <h3>Regulatory Compliance:</h3>
                                    </div>
                                    <p>
                                        HS codes are pivotal in ensuring compliance with customs
                                        regulations and trade policies of different countries. By accurately classifying products
                                        with the appropriate HS codes, importers and exporters can avoid delays, penalties, and
                                        other trade barriers.
                                    </p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="card-content cdh-none">
                                    <div class="head">
                                        <h3>Trade Statistics and Analysis:</h3>
                                    </div>
                                    <p>
                                        HS codes enable governments and international
                                        organizations to collect and analyze trade data more efficiently. By categorizing
                                        products with standardized codes, the global trade community can generate meaningful
                                        insights, track market trends, and develop effective policies.
                                    </p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="card-content cdh-none">
                                    <div class="head">
                                        <h3>Tariffs and Duties:</h3>
                                    </div>
                                    <p>
                                        HS codes are utilized to determine applicable tariffs and duties for
                                        imported or exported goods. Tariff rates often vary based on the classification of
                                        products, making HS codes crucial in calculating the costs associated with international
                                        trade.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 flex" style="align-items: center;">
                        <img src="public/frontend/image/img/HS Code.png" width="100%">
                    </div>
                </div>
            </div>
        </div>

        <!-- Last Content : simplifying -->
        <div class="container-fluid pdt-2 bg-bluish">
            <div class="container">
                <div class="text-content">
                    <h2>TradeImeX: Simplifying HS Codes</h2>
                    <p>
                        TradeImeX is a cutting-edge platform that leverages technology to simplify the world of HS
                        codes. With its user-friendly interface and comprehensive database, TradeImeX empowers
                        businesses to streamline their import-export processes and enhance their overall efficiency.
                        TradeImeX revolutionizes the way businesses manage HS codes through its advanced features
                        and functionalities. By simply entering a product description or a keyword, users can quickly
                        search for the appropriate HS code for their products. The platform&#39;s algorithm performs a
                        sophisticated search, providing accurate and up-to-date results.
                    </p>
                </div>
            </div>
        </div>

        <!-- FAQ section -->
        <div class="container-fluid padding-tb bg-bluish">
            <div class="container">
                <div  class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                <b>What is the purpose of HS codes in international trade?</b>
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body" style="color: #425466;">
                                HS codes are a standardized numerical classification system used to classify and identify
                                products in international trade, recognized and utilized by customs authorities worldwide to
                                streamline the movement of goods across borders.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                <b>How can TradeImeX help businesses with HS code classification?</b>
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body" style="color: #425466;">
                                TradeImeX is essential for efficient HS code retrieval and analysis as it simplifies the process of
                                finding and utilizing HS codes by providing a comprehensive and up-to-date database, along
                                with powerful search functionalities.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                <b>Are HS codes the same for all countries?</b>
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body" style="color: #425466;">
                                Though there are a few deviations, most nations in the globe harmonize their HS codes.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapsefour" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                <b>What are the benefits of using an accurate and up-to-date HS code database?</b>
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapsefour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body" style="color: #425466;">
                                The benefits of using an accurate and up-to-date HS code database include Saving time and
                                effort by eliminating manual research, minimizing errors, reducing the risk of non-compliance,
                                and enhancing transparency in trade data for better decision-making.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapsefive" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                <b>What search functionalities does TradeImeX offer for HS code retrieval?</b>
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapsefive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body" style="color: #425466;">
                                TradeImeX offers keyword search with relevant suggestions and advanced filters for specific
                                product categories as search functionalities for HS code retrieval.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapsesix" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                <b>What is an HS code with 6 digits?</b>
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapsesix" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body" style="color: #425466;">
                                The six-digit HS code is divided into three sections: Headings (the first four digits), Subheadings
                                (the next two digits), and Chapters (the first two digits). Depending on the nation of trade, the
                                HS codes are further separated into 7 or 12-digit items.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseseven" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                <b>Why are HS codes significant in global trade?</b>
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseseven" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body" style="color: #425466;">
                                HS codes are pivotal in ensuring compliance with customs regulations and trade policies of
                                different countries and also determine applicable tariffs and duties for imported or exported
                                goods which are significant and crucial in global trade.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseeight" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                <b>How does TradeImeX simplify the process of finding and utilizing HS codes?</b>
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseeight" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body" style="color: #425466;">
                                With its user-friendly interface and comprehensive database, TradeImeX empowers businesses
                                to streamline their import-export processes and enhance their overall efficiency.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapsenine" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                <b>What is an HS code for countries?</b>
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapsenine" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body" style="color: #425466;">
                                A standardized numerical categorization system used to identify and classify goods in
                                international trade is called a Harmonized System (HS) code utilized by countries for trade data.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTen" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                <b>How can accurate HS code classification help businesses comply with customs regulations?</b>
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTen" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body" style="color: #425466;">
                                HS code classification is helpful for businesses as, by simply entering a product description or a
                                keyword, users can quickly search for the appropriate HS code for their products with customs
                                regulations.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Last Partner tab -->
        @include('frontend.tab_inc')

        @include('frontend.footer')
        @include('frontend.script')

        <script>
            //faq js
            let question = document.querySelectorAll(".question");

            question.forEach(question => {
                question.addEventListener("click", event => {
                    const active = document.querySelector(".question.active");
                    if(active && active !== question ) {
                    active.classList.toggle("active");
                    active.nextElementSibling.style.maxHeight = 0;
                    }
                    question.classList.toggle("active");
                    const answer = question.nextElementSibling;
                    if(question.classList.contains("active")){
                    answer.style.maxHeight = answer.scrollHeight + "px";
                    } else {
                    answer.style.maxHeight = 0;
                    }
                })
            })
        </script>
    </body>
</html>