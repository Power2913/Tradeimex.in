<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="public/frontend/image/img/Favicon Logo.png">
    @include('frontend.link')
    <title>Filter Search - US Import Data</title>
</head>
<body>
     @include('frontend.header')

    <section class="container-fluid padding-tb bg-green">
        <div class="text-content text-center">
            <h1 class="mb-3" style="color: rgb(30 41 59);"> 
                  {{$role}} Data of {{$country}} 
            </h1>
            <p class="mb-3 text-center fs-6" style="color: rgb(71 85 105);">
                Monitor business competitions through detailed rubber import data of Bangladesh. 
                Our Bangladesh trade data of import contains value, price, quantity, name of rubber 
                importer in Bangladesh and more shipment details.
            </p>
        </div>
        <div class="container">
            <form method="POST">
                @csrf
                <div class="mb-4 mt-4 flex justify-content-center align-items-center">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group" name = "type">
                        <input name="type" type="radio" class="btn-check" value="data" id="btnradio1" autocomplete="off" checked>
                        <label class="btn btn-outline-primary type-btn" for="btnradio1">Data</label>
                      
                        <input name="type" type="radio" class="btn-check" value="company" id="btnradio2" autocomplete="off">
                        <label class="btn btn-outline-primary type-btn" for="btnradio2">Company</label>
                    </div>
                </div>
                <div class="row bg-white" style="border-radius: 1rem;">
                    <div class="searchbox col-sm-2 col-md-2 col-lg-2"> 
                        <select class="form-control" style="border: 0px transparent !important;" name='country'>
                            <!--<option class="form-control" value="">Select Country</option> -->
                            <!--<option class="form-control" value="Asia">Asia</option> -->
                            <!--<option class="form-control" value="Bangladesh">Bangladesh</option>-->
                            <!--<option class="form-control" value="China">China</option>-->
                            <!--<option class="form-control" value="Egypt">Egypt</option>-->
                            <!--<option class="form-control" value="Indonesia">Indonesia</option>-->
                            <!--<option class="form-control" value="Iran">Iran</option>-->
                            <!--<option class="form-control" value="Iraq">Iraq</option>-->
                            <!--<option class="form-control" value="Japan">Japan</option>-->
                            <!--<option class="form-control" value="Kazakhstan">Kazakhstan</option>-->
                            <!--<option class="form-control" value="Kuwait">Kuwait</option>-->
                            <!--<option class="form-control" value="Malaysia">Malaysia</option>-->
                            <!--<option class="form-control" value="Pakistan">Pakistan</option>-->
                            <!--<option class="form-control" value="Philippines">Philippines</option>-->
                            <!--<option class="form-control" value="Qatar">Qatar</option>-->
                            <!--<option class="form-control" value="Saudi Arabia">Saudi Arabia</option>-->
                            <!--<option class="form-control" value="Singapore">Singapore</option>-->
                            <!--<option class="form-control" value="South Korea">South Korea</option>-->
                            <!--<option class="form-control" value="Sri Lanka">Sri Lanka</option>-->
                            <!--<option class="form-control" value="Taiwan">Taiwan</option>-->
                            <!--<option class="form-control" value="Thailand">Thailand</option>-->
                            <!--<option class="form-control" value="Turkey">Turkey</option>-->
                            <!--<option class="form-control" value="UAE">UAE</option>-->
                            <!--<option class="form-control" value="Ukraine">Ukraine</option>-->
                            <!--<option class="form-control" value="Uzbekistan">Uzbekistan</option>-->
                            <!--<option class="form-control" value="Vietnam">Vietnam</option> -->
                            <!--<option class="form-control" value="Africa">Africa</option> -->
                            <!--<option class="form-control" value="Botswana">Botswana</option>-->
                            <!--<option class="form-control" value="Cameroon">Cameroon</option>-->
                            <!--<option class="form-control" value="Central Africa">Central Africa</option>-->
                            <!--<option class="form-control" value="Chad">Chad</option>-->
                            <!--<option class="form-control" value="DR Congo">DR Congo</option>-->
                            <!--<option class="form-control" value="Ethiopia">Ethiopia</option>-->
                            <!--<option class="form-control" value="Ghana">Ghana</option>-->
                            <!--<option class="form-control" value="Ivory Coast">Ivory Coast</option>-->
                            <!--<option class="form-control" value="Kenya">Kenya</option>-->
                            <!--<option class="form-control" value="Lesotho">Lesotho</option>-->
                            <!--<option class="form-control" value="Liberia">Liberia</option>-->
                            <!--<option class="form-control" value="Malawi">Malawi</option>-->
                            <!--<option class="form-control" value="Namibia">Namibia</option>-->
                            <!--<option class="form-control" value="Niger">Niger</option>-->
                            <!--<option class="form-control" value="Nigeria">Nigeria</option>-->
                            <!--<option class="form-control" value="Sao Tome">Sao Tome</option>-->
                            <!--<option class="form-control" value="Senegal">Senegal</option>-->
                            <!--<option class="form-control" value="Sierra Leone">Sierra Leone</option>-->
                            <!--<option class="form-control" value="South Africa">South Africa</option>-->
                            <!--<option class="form-control" value="Tanzania">Tanzania</option>-->
                            <!--<option class="form-control" value="Togo">Togo</option>-->
                            <!--<option class="form-control" value="Uganda">Uganda</option>-->
                            <!--<option class="form-control" value="Zambia">Zambia</option>-->
                            <!--<option class="form-control" value="Zimbabwe">Zimbabwe</option> -->
                            <!--<option class="form-control" value="America">America</option> -->
                            <!--<option class="form-control" value="Canada">Canada</option>-->
                            <!--<option class="form-control" value="Costa Rica">Costa Rica</option>-->
                            <!--<option class="form-control" value="El Salvador">El Salvador</option>-->
                            <!--<option class="form-control" value="Guatemala">Guatemala</option>-->
                            <!--<option class="form-control" value="Honduras">Honduras</option>-->
                            <!--<option class="form-control" value="Mexico">Mexico</option>-->
                            <!--<option class="form-control" value="Panama">Panama</option>-->
                            <option class="form-control" value="US">US</option>
                            <!--<option class="form-control" value="Argentina">Argentina</option>-->
                            <!--<option class="form-control" value="Bolivia">Bolivia</option>-->
                            <!--<option class="form-control" value="Brazil">Brazil</option>-->
                            <!--<option class="form-control" value="Chile">Chile</option>-->
                            <!--<option class="form-control" value="Colombia">Colombia</option>-->
                            <!--<option class="form-control" value="Ecuador">Ecuador</option>-->
                            <!--<option class="form-control" value="Guyana">Guyana</option>-->
                            <!--<option class="form-control" value="Paraguay">Paraguay</option>-->
                            <!--<option class="form-control" value="Peru">Peru</option>-->
                            <!--<option class="form-control" value="Uruguay">Uruguay</option>-->
                            <!--<option class="form-control" value="Venezuela">Venezuela</option> -->
                            <!--<option class="form-control" value="Europe">Europe</option> -->
                            <!--<option class="form-control" value="Austria">Austria</option>-->
                            <!--<option class="form-control" value="Belgium">Belgium</option>-->
                            <!--<option class="form-control" value="Bulgaria">Bulgaria</option>-->
                            <!--<option class="form-control" value="Croatia">Croatia</option>-->
                            <!--<option class="form-control" value="Cyprus">Cyprus</option>-->
                            <!--<option class="form-control" value="Czech">Czech</option>-->
                            <!--<option class="form-control" value="Denmark">Denmark</option>-->
                            <!--<option class="form-control" value="Estonia">Estonia</option>-->
                            <!--<option class="form-control" value="Finland">Finland</option>-->
                            <!--<option class="form-control" value="France">France</option>-->
                            <!--<option class="form-control" value="Germany">Germany</option>-->
                            <!--<option class="form-control" value="Greece">Greece</option>-->
                            <!--<option class="form-control" value="Hungary">Hungary</option>-->
                            <!--<option class="form-control" value="Ireland">Ireland</option>-->
                            <!--<option class="form-control" value="Italy">Italy</option>-->
                            <!--<option class="form-control" value="Kazakhstan">Kazakhstan</option>-->
                            <!--<option class="form-control" value="Kosovo">Kosovo</option>-->
                            <!--<option class="form-control" value="Latvia">Latvia</option>-->
                            <!--<option class="form-control" value="Lithuania">Lithuania</option>-->
                            <!--<option class="form-control" value="Luxembourg">Luxembourg</option>-->
                            <!--<option class="form-control" value="Malta">Malta</option>-->
                            <!--<option class="form-control" value="Moldova">Moldova</option>-->
                            <!--<option class="form-control" value="Netherlands">Netherlands</option>-->
                            <!--<option class="form-control" value="Poland">Poland</option>-->
                            <!--<option class="form-control" value="Portugal">Portugal</option>-->
                            <!--<option class="form-control" value="Russia">Russia</option>-->
                            <!--<option class="form-control" value="Romania">Romania</option>-->
                            <!--<option class="form-control" value="Slovenia">Slovenia</option>-->
                            <!--<option class="form-control" value="Spain">Spain</option>-->
                            <!--<option class="form-control" value="Sweden">Sweden</option>-->
                            <!--<option class="form-control" value="Uk">UK</option>-->
                            <!--<option class="form-control" value="Ukraine">Ukraine</option>-->
                            <!--<option class="form-control" value="Uzbekistan">Uzbekistan</option> -->
                            <!--<option class="form-control" value="Oceania">Oceania</option> -->
                            <!--<option class="form-control" value="Australia">Australia</option>-->
                            <!--<option class="form-control" value="Fiji">Fiji</option>-->
                            <!--<option class="form-control" value="New Zealand">New Zealand</option>-->

                        </select> 
                    </div>
                    <div class="searchbox col-sm-2 col-md-2 col-lg-2"> 
                        <select class="form-control" style="border: 0px transparent !important;" name='role'>
                            <option class="form-control" value="">Import</option>
                            <option class="form-control" value="">Export</option>
                        </select> 
                    </div>
                    <div class="searchbox col-sm-3 col-md-3 col-lg-3"> 
                        <input type="text" placeholder="Description" name="desc" class="form-control"> 
                    </div>
                    <div class="searchbox col-sm-2 col-md-2 col-lg-2"> 
                        <input type="text" placeholder="HS Code" name="hs_code" class="form-control"> 
                    </div>
                    <div class="searchbox col-sm-3 col-md-3 col-lg-3"> 
                        <a class="ybtn ybtn-header-color" style="width: 100%;text-align: center;padding: 18px 0px 18px 0px;">
                            Search
                        </a> 
                    </div>
                </div>
            </form>
        </div>
    </section>
    {{-- Result Table --}}
    @if($country == "US")
        @include('frontend.livedata.US.USTableone')  
    @elseif($country == 'Austria')
        @include('frontend.livedata.austriaTable')
    @endif
    @include('frontend.tab_inc')
    @include('frontend.footer')
    @include('frontend.script')
</body>
</html>