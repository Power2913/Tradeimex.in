<a href="#" id="scroll" style="display: inline;"><span></span></a>
<footer class="text-center text-lg-start bg-bluish">
    <!-- Forms & Links -->
    <div class="container text-center">
        <div class="row">
            <div class="col-md-12 col-lg-3 col-xl-3 mx-auto mb-4" style="margin-top: 2.5rem;">
                <h5 class="text-uppercase mb-4 col-xs-12" style="font-weight: 500;">
                    Contact us
                </h5>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <form  method="POST" action="{{ url('/contact') }}" onsubmit="return validateForm()" id="FooterForm" enctype="multipart/form-data">

                    @csrf
                    <input type="hidden" name="user_ip" value="{{ request()->ip() }}">
                    <div class="input-group mb-3">
                        <input name="name" autocomplete="off" required type="text" class="form-control" placeholder="Name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">@</span>
                        <input name="email" autocomplete="off" required type="text" class="form-control" placeholder="Email" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <select name="country_region" class="form-control" id="countries">
                            <option selected>Select Region</option>
                            <option value="Afghanistan" data-capital="Kabul">Afghanistan</option>
                            <option value="Aland Islands" data-capital="Mariehamn">Aland Islands</option>
                            <option value="Albania" data-capital="Tirana">Albania</option>
                            <option value="Algeria" data-capital="Algiers">Algeria</option>
                            <option value="American Samoa" data-capital="Pago Pago">American Samoa</option>
                            <option value="Andorra" data-capital="Andorra la Vella">Andorra</option>
                            <option value="Angola" data-capital="Luanda">Angola</option>
                            <option value="Anguilla" data-capital="The Valley">Anguilla</option>
                            <option value="Antigua and Barbuda" data-capital="St. John's">Antigua and Barbuda</option>
                            <option value="Argentina" data-capital="Buenos Aires">Argentina</option>
                            <option value="Armenia" data-capital="Yerevan">Armenia</option>
                            <option value="Aruba" data-capital="Oranjestad">Aruba</option>
                            <option value="Australia" data-capital="Canberra">Australia</option>
                            <option value="Austria" data-capital="Vienna">Austria</option>
                            <option value="Azerbaijan" data-capital="Baku">Azerbaijan</option>
                            <option value="Bahamas" data-capital="Nassau">Bahamas</option>
                            <option value="Bahrain" data-capital="Manama">Bahrain</option>
                            <option value="Bangladesh" data-capital="Dhaka">Bangladesh</option>
                            <option value="Barbados" data-capital="Bridgetown">Barbados</option>
                            <option value="Belarus" data-capital="Minsk">Belarus</option>
                            <option value="Belgium" data-capital="Brussels">Belgium</option>
                            <option value="Belize" data-capital="Belmopan">Belize</option>
                            <option value="Benin" data-capital="Porto-Novo">Benin</option>
                            <option value="Bermuda" data-capital="Hamilton">Bermuda</option>
                            <option value="Bhutan" data-capital="Thimphu">Bhutan</option>
                            <option value="Bolivia" data-capital="Sucre">Bolivia</option>
                            <option value="Bosnia and Herzegovina" data-capital="Sarajevo">Bosnia and Herzegovina</option>
                            <option value="Botswana" data-capital="Gaborone">Botswana</option>
                            <option value="Brazil" data-capital="Brasília">Brazil</option>
                            <option value="British Indian Ocean Territory" data-capital="Diego Garcia">British Indian Ocean Territory</option>
                            <option value="Brunei Darussalam" data-capital="Bandar Seri Begawan">Brunei Darussalam</option>
                            <option value="Bulgaria" data-capital="Sofia">Bulgaria</option>
                            <option value="Burkina Faso" data-capital="Ouagadougou">Burkina Faso</option>
                            <option value="Burundi" data-capital="Bujumbura">Burundi</option>
                            <option value="Cabo Verde" data-capital="Praia">Cabo Verde</option>
                            <option value="Cambodia" data-capital="Phnom Penh">Cambodia</option>
                            <option value="Cameroon" data-capital="Yaoundé">Cameroon</option>
                            <option value="Canada" data-capital="Ottawa">Canada</option>
                            <option value="Cayman Islands" data-capital="George Town">Cayman Islands</option>
                            <option value="Central African Republic" data-capital="Bangui">Central African Republic</option>
                            <option value="Chad" data-capital="N'Djamena">Chad</option>
                            <option value="Chile" data-capital="Santiago">Chile</option>
                            <option value="China" data-capital="Beijing">China</option>
                            <option value="Christmas Island" data-capital="Flying Fish Cove">Christmas Island</option>
                            <option value="Cocos (Keeling) Islands" data-capital="West Island">Cocos (Keeling) Islands</option>
                            <option value="Colombia" data-capital="Bogotá">Colombia</option>
                            <option value="Comoros" data-capital="Moroni">Comoros</option>
                            <option value="Cook Islands" data-capital="Avarua">Cook Islands</option>
                            <option value="Costa Rica" data-capital="San José">Costa Rica</option>
                            <option value="Croatia" data-capital="Zagreb">Croatia</option>
                            <option value="Cuba" data-capital="Havana">Cuba</option>
                            <option value="Curaçao" data-capital="Willemstad">Curaçao</option>
                            <option value="Cyprus" data-capital="Nicosia">Cyprus</option>
                            <option value="Czech Republic" data-capital="Prague">Czech Republic</option>
                            <option value="Côte d'Ivoire" data-capital="Yamoussoukro">Côte d'Ivoire</option>
                            <option value="Democratic Republic of the Congo" data-capital="Kinshasa">Democratic Republic of the Congo</option>
                            <option value="Denmark" data-capital="Copenhagen">Denmark</option>
                            <option value="Djibouti" data-capital="Djibouti">Djibouti</option>
                            <option value="Dominica" data-capital="Roseau">Dominica</option>
                            <option value="Dominican Republic" data-capital="Santo Domingo">Dominican Republic</option>
                            <option value="Ecuador" data-capital="Quito">Ecuador</option>
                            <option value="Egypt" data-capital="Cairo">Egypt</option>
                            <option value="El Salvador" data-capital="San Salvador">El Salvador</option>
                            <option value="Equatorial Guinea" data-capital="Malabo">Equatorial Guinea</option>
                            <option value="Eritrea" data-capital="Asmara">Eritrea</option>
                            <option value="Estonia" data-capital="Tallinn">Estonia</option>
                            <option value="Ethiopia" data-capital="Addis Ababa">Ethiopia</option>
                            <option value="Falkland Islands" data-capital="Stanley">Falkland Islands</option>
                            <option value="Faroe Islands" data-capital="Tórshavn">Faroe Islands</option>
                            <option value="Federated States of Micronesia" data-capital="Palikir">Federated States of Micronesia</option>
                            <option value="Fiji" data-capital="Suva">Fiji</option>
                            <option value="Finland" data-capital="Helsinki">Finland</option>
                            <option value="Former Yugoslav Republic of Macedonia" data-capital="Skopje">Former Yugoslav Republic of Macedonia</option>
                            <option value="France" data-capital="Paris">France</option>
                            <option value="French Polynesia" data-capital="Papeete">French Polynesia</option>
                            <option value="Gabon" data-capital="Libreville">Gabon</option>
                            <option value="Gambia" data-capital="Banjul">Gambia</option>
                            <option value="Georgia" data-capital="Tbilisi">Georgia</option>
                            <option value="Germany" data-capital="Berlin">Germany</option>
                            <option value="Ghana" data-capital="Accra">Ghana</option>
                            <option value="Gibraltar" data-capital="Gibraltar">Gibraltar</option>
                            <option value="Greece" data-capital="Athens">Greece</option>
                            <option value="Greenland" data-capital="Nuuk">Greenland</option>
                            <option value="Grenada" data-capital="St. George's">Grenada</option>
                            <option value="Guam" data-capital="Hagåtña">Guam</option>
                            <option value="Guatemala" data-capital="Guatemala City">Guatemala</option>
                            <option value="Guernsey" data-capital="Saint Peter Port">Guernsey</option>
                            <option value="Guinea" data-capital="Conakry">Guinea</option>
                            <option value="Guinea-Bissau" data-capital="Bissau">Guinea-Bissau</option>
                            <option value="Guyana" data-capital="Georgetown">Guyana</option>
                            <option value="Haiti" data-capital="Port-au-Prince">Haiti</option>
                            <option value="Holy See" data-capital="Vatican City">Holy See</option>
                            <option value="Honduras" data-capital="Tegucigalpa">Honduras</option>
                            <option value="Hong Kong" data-capital="Hong Kong">Hong Kong</option>
                            <option value="Hungary" data-capital="Budapest">Hungary</option>
                            <option value="Iceland" data-capital="Reykjavik">Iceland</option>
                            <option value="India" data-capital="New Delhi">India</option>
                            <option value="Indonesia" data-capital="Jakarta">Indonesia</option>
                            <option value="Iran" data-capital="Tehran">Iran</option>
                            <option value="Iraq" data-capital="Baghdad">Iraq</option>
                            <option value="Ireland" data-capital="Dublin">Ireland</option>
                            <option value="Isle of Man" data-capital="Douglas">Isle of Man</option>
                            <option value="Israel" data-capital="Jerusalem">Israel</option>
                            <option value="Italy" data-capital="Rome">Italy</option>
                            <option value="Jamaica" data-capital="Kingston">Jamaica</option>
                            <option value="Japan" data-capital="Tokyo">Japan</option>
                            <option value="Jersey" data-capital="Saint Helier">Jersey</option>
                            <option value="Jordan" data-capital="Amman">Jordan</option>
                            <option value="Kazakhstan" data-capital="Astana">Kazakhstan</option>
                            <option value="Kenya" data-capital="Nairobi">Kenya</option>
                            <option value="Kiribati" data-capital="Tarawa">Kiribati</option>
                            <option value="Kuwait" data-capital="Kuwait City">Kuwait</option>
                            <option value="Kyrgyzstan" data-capital="Bishkek">Kyrgyzstan</option>
                            <option value="Laos" data-capital="Vientiane">Laos</option>
                            <option value="Latvia" data-capital="Riga">Latvia</option>
                            <option value="Lebanon" data-capital="Beirut">Lebanon</option>
                            <option value="Lesotho" data-capital="Maseru">Lesotho</option>
                            <option value="Liberia" data-capital="Monrovia">Liberia</option>
                            <option value="Libya" data-capital="Tripoli">Libya</option>
                            <option value="Liechtenstein" data-capital="Vaduz">Liechtenstein</option>
                            <option value="Lithuania" data-capital="Vilnius">Lithuania</option>
                            <option value="Luxembourg" data-capital="Luxembourg">Luxembourg</option>
                            <option value="Madagascar" data-capital="Antananarivo">Madagascar</option>
                            <option value="Malawi" data-capital="Lilongwe">Malawi</option>
                            <option value="Malaysia" data-capital="Kuala Lumpur">Malaysia</option>
                            <option value="Maldives" data-capital="Malé">Maldives</option>
                            <option value="Mali" data-capital="Bamako">Mali</option>
                            <option value="Malta" data-capital="Valletta">Malta</option>
                            <option value="Marshall Islands" data-capital="Majuro">Marshall Islands</option>
                            <option value="Mauritania" data-capital="Nouakchott">Mauritania</option>
                            <option value="Mauritius" data-capital="Port Louis">Mauritius</option>
                            <option value="Mexico" data-capital="Mexico City">Mexico</option>
                            <option value="Moldova" data-capital="Chisinau">Moldova</option>
                            <option value="Monaco" data-capital="Monaco">Monaco</option>
                            <option value="Mongolia" data-capital="Ulaanbaatar">Mongolia</option>
                            <option value="Montenegro" data-capital="Podgorica">Montenegro</option>
                            <option value="Montserrat" data-capital="Plymouth">Montserrat</option>
                            <option value="Morocco" data-capital="Rabat">Morocco</option>
                            <option value="Mozambique" data-capital="Maputo">Mozambique</option>
                            <option value="Myanmar" data-capital="Nay Pyi Taw">Myanmar</option>
                            <option value="Namibia" data-capital="Windhoek">Namibia</option>
                            <option value="Nauru" data-capital="Yaren">Nauru</option>
                            <option value="Nepal" data-capital="Kathmandu">Nepal</option>
                            <option value="Netherlands" data-capital="Amsterdam">Netherlands</option>
                            <option value="New Caledonia" data-capital="Nouméa">New Caledonia</option>
                            <option value="New Zealand" data-capital="Wellington">New Zealand</option>
                            <option value="Nicaragua" data-capital="Managua">Nicaragua</option>
                            <option value="Niger" data-capital="Niamey">Niger</option>
                            <option value="Nigeria" data-capital="Abuja">Nigeria</option>
                            <option value="Niue" data-capital="Alofi">Niue</option>
                            <option value="Norfolk Island" data-capital="Kingston">Norfolk Island</option>
                            <option value="North Korea" data-capital="Pyongyang">North Korea</option>
                            <option value="Northern Mariana Islands" data-capital="Saipan">Northern Mariana Islands</option>
                            <option value="Norway" data-capital="Oslo">Norway</option>
                            <option value="Oman" data-capital="Muscat">Oman</option>
                            <option value="Pakistan" data-capital="Islamabad">Pakistan</option>
                            <option value="Palau" data-capital="Ngerulmud">Palau</option>
                            <option value="Palestine" data-capital="Jerusalem">Palestine</option>
                            <option value="Panama" data-capital="Panama City">Panama</option>
                            <option value="Papua New Guinea" data-capital="Port Moresby">Papua New Guinea</option>
                            <option value="Paraguay" data-capital="Asunción">Paraguay</option>
                            <option value="Peru" data-capital="Lima">Peru</option>
                            <option value="Philippines" data-capital="Manila">Philippines</option>
                            <option value="Pitcairn" data-capital="Adamstown">Pitcairn</option>
                            <option value="Poland" data-capital="Warsaw">Poland</option>
                            <option value="Portugal" data-capital="Lisbon">Portugal</option>
                            <option value="Puerto Rico" data-capital="San Juan">Puerto Rico</option>
                            <option value="Qatar" data-capital="Doha">Qatar</option>
                            <option value="Republic of the Congo" data-capital="Brazzaville">Republic of the Congo</option>
                            <option value="Romania" data-capital="Bucharest">Romania</option>
                            <option value="Russia" data-capital="Moscow">Russia</option>
                            <option value="Rwanda" data-capital="Kigali">Rwanda</option>
                            <option value="Réunion" data-capital="Saint-Denis">Réunion</option>
                            <option value="Saint Barthélemy" data-capital="Gustavia">Saint Barthélemy</option>
                            <option value="Saint Helena" data-capital="Jamestown">Saint Helena</option>
                            <option value="Saint Kitts and Nevis" data-capital="Basseterre">Saint Kitts and Nevis</option>
                            <option value="Saint Lucia" data-capital="Castries">Saint Lucia</option>
                            <option value="Saint Martin" data-capital="Marigot">Saint Martin</option>
                            <option value="Saint Pierre and Miquelon" data-capital="Saint-Pierre">Saint Pierre and Miquelon</option>
                            <option value="Saint Vincent and the Grenadines" data-capital="Kingstown">Saint Vincent and the Grenadines</option>
                            <option value="Samoa" data-capital="Apia">Samoa</option>
                            <option value="San Marino" data-capital="San Marino">San Marino</option>
                            <option value="Sao Tome and Principe" data-capital="São Tomé">Sao Tome and Principe</option>
                            <option value="Saudi Arabia" data-capital="Riyadh">Saudi Arabia</option>
                            <option value="Senegal" data-capital="Dakar">Senegal</option>
                            <option value="Serbia" data-capital="Belgrade">Serbia</option>
                            <option value="Seychelles" data-capital="Victoria">Seychelles</option>
                            <option value="Sierra Leone" data-capital="Freetown">Sierra Leone</option>
                            <option value="Singapore" data-capital="Singapore">Singapore</option>
                            <option value="Sint Maarten" data-capital="Philipsburg">Sint Maarten</option>
                            <option value="Slovakia" data-capital="Bratislava">Slovakia</option>
                            <option value="Slovenia" data-capital="Ljubljana">Slovenia</option>
                            <option value="Solomon Islands" data-capital="Honiara">Solomon Islands</option>
                            <option value="Somalia" data-capital="Mogadishu">Somalia</option>
                            <option value="South Africa" data-capital="Pretoria">South Africa</option>
                            <option value="South Georgia" data-capital="King Edward Point">South Georgia</option>
                            <option value="South Korea" data-capital="Seoul">South Korea</option>
                            <option value="South Sudan" data-capital="Juba">South Sudan</option>
                            <option value="Spain" data-capital="Madrid">Spain</option>
                            <option value="Sri Lanka" data-capital="Colombo">Sri Lanka</option>
                            <option value="Sudan" data-capital="Khartoum">Sudan</option>
                            <option value="Suriname" data-capital="Paramaribo">Suriname</option>
                            <option value="Svalbard and Jan Mayen" data-capital="Longyearbyen">Svalbard and Jan Mayen</option>
                            <option value="Swaziland" data-capital="Mbabane">Swaziland</option>
                            <option value="Sweden" data-capital="Stockholm">Sweden</option>
                            <option value="Switzerland" data-capital="Bern">Switzerland</option>
                            <option value="Syria" data-capital="Damascus">Syria</option>
                            <option value="Taiwan" data-capital="Taipei">Taiwan</option>
                            <option value="Tajikistan" data-capital="Dushanbe">Tajikistan</option>
                            <option value="Tanzania" data-capital="Dodoma">Tanzania</option>
                            <option value="Thailand" data-capital="Bangkok">Thailand</option>
                            <option value="Togo" data-capital="Lomé">Togo</option>
                            <option value="Tokelau" data-capital="Nukunonu">Tokelau</option>
                            <option value="Tonga" data-capital="Nuku'alofa">Tonga</option>
                            <option value="Trinidad and Tobago" data-capital="Port of Spain">Trinidad and Tobago</option>
                            <option value="Tunisia" data-capital="Tunis">Tunisia</option>
                            <option value="Turkey" data-capital="Ankara">Turkey</option>
                            <option value="Turkmenistan" data-capital="Ashgabat">Turkmenistan</option>
                            <option value="Tuvalu" data-capital="Funafuti">Tuvalu</option>
                            <option value="Uganda" data-capital="Kampala">Uganda</option>
                            <option value="Ukraine" data-capital="Kyiv">Ukraine</option>
                            <option value="United Arab Emirates" data-capital="Abu Dhabi">United Arab Emirates</option>
                            <option value="United Kingdom" data-capital="London">United Kingdom</option>
                            <option value="United States" data-capital="Washington, D.C.">United States</option>
                            <option value="Uruguay" data-capital="Montevideo">Uruguay</option>
                            <option value="Uzbekistan" data-capital="Tashkent">Uzbekistan</option>
                            <option value="Vanuatu" data-capital="Port Vila">Vanuatu</option>
                            <option value="Vatican City" data-capital="Vatican City">Vatican City</option>
                            <option value="Venezuela" data-capital="Caracas">Venezuela</option>
                            <option value="Vietnam" data-capital="Hanoi">Vietnam</option>
                            <option value="Wallis and Futuna" data-capital="Mata-Utu">Wallis and Futuna</option>
                            <option value="Western Sahara" data-capital="Laayoune">Western Sahara</option>
                            <option value="Yemen" data-capital="Sana'a">Yemen</option>
                            <option value="Zambia" data-capital="Lusaka">Zambia</option>
                            <option value="Zimbabwe" data-capital="Harare">Zimbabwe</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <input name="number" autocomplete="off" maxlength="10" required type="text" class="form-control" placeholder="Mobile Number" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>

                    <div class="input-group mb-3">
                        <input name="company" autocomplete="off" required type="text" class="form-control" placeholder="Company Name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <select name="role" required class="form-select" id="inputGroupSelect02">
                            <option selected>Choose...</option>
                            <option>IMPORT</option>
                            <option>EXPORT</option>
                            <option>BOTH</option>
                        </select>
                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                    </div>
                    <div class="input-group mb-3">
                        <textarea name="message" required class="form-control" placeholder="Your Message" aria-label="With textarea" id= "txt"></textarea>
                    </div>
                    <input type="hidden" name="recaptcha_response" id="footerRecaptchaResponse">
                    <!--<div class="g-recaptcha" data-sitekey="6LeMDa0pAAAAADpczSGmVwa78vlXEMlRW10UNaQa"></div>-->
                    <div class="col-md-12">
                        <!--<button class="btn btn-primary g-recaptcha" -->
                        <!--    data-sitekey="6LeMDa0pAAAAADpczSGmVwa78vlXEMlRW10UNaQa" -->
                        <!--    data-callback='onSubmit' -->
                        <!--    data-action='submit'-->
                        <!--    type="submit"-->
                        <!--    >
                        <!--    Submit-->
                        <!--</button>-->
                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                    </div>
                </form>
            </div>

            <div class="col-sm-6 col-xs-6 col-md-3 col-lg-3 col-xl-2 mx-auto mb-4 mobile-footer" style="margin-top: 2.5rem;text-align: start;">
                <h5 class="text-uppercase mb-4" style="margin-bottom: 2rem;font-weight: 500;">
                    Company
                </h5>
                <p>
                    <a href="/about-us" class="td-none text-uppercase text-hover">About Us</a>
                </p>
                <p>
                    <a href="/why-choose-us" class="td-none text-uppercase text-hover">WHY CHOOSE US?</a>
                </p>
                <p>
                    <a href="/products" class="td-none text-uppercase text-hover">PRODUCT & SERVICES</a>
                </p>
                <p>
                    <a href="/careers" class="td-none text-uppercase text-hover">CAREERS</a>
                </p>
                <p>
                    <a href="/partners" class="td-none text-uppercase text-hover">PARTNER</a>
                </p>
                <p>
                    <a href="/our-clients" class="td-none text-uppercase text-hover">CLIENTS</a>
                </p>
                <p>
                    <a href="/faqs" class="td-none text-uppercase text-hover">FAQS</a>
                </p>
                <p>
                    <a href="/contact-us" class="td-none text-uppercase text-hover">Contact us</a>
                </p>
            </div>

            <div class="col-sm-6 col-xs-6 col-md-3 col-lg-3 col-xl-2 mx-auto mb-4 mobile-footer" style="margin-top: 2.5rem;text-align: start;">
                <h5 class="text-uppercase mb-4" style="margin-bottom: 2rem;font-weight: 500;">
                    Our data
                </h5>
                <p>
                    <a href="/global-trade-data" class="td-none text-uppercase text-hover">Global Trade Data</a>
                </p>
                <p>
                    @if (!empty($continents))
                        @foreach ($continents  as $continent)

                            @if ($continent->continent == 'Africa')
                            @php
                                $suffix='trade-data'  
                            @endphp                        
                                <a href="{{ route('continent.tradeData', [strtolower($continent->continent)]) }}" class="td-none text-uppercase text-hover">
                                    {{ $continent->continent }} Trade Data
                                </a>
                            @endif
                        @endforeach  
                    @else
                        <a href="/africa-trade-data">Data Fetching error</a>
                    @endif 
                </p>
                <p>
                    @if (!empty($continents))
                        @foreach ($continents  as $continent)
                            @if ($continent->continent == 'Asia')                         
                                <a href="{{ route('continent.tradeData', [strtolower($continent->continent)]) }}" class="td-none text-uppercase text-hover">
                                    {{ $continent->continent }} Trade Data
                                </a>
                            @endif
                        @endforeach  
                    @else
                        <a href="/asia-trade-data">Data Fetching error</a>
                    @endif 
                </p>
                <p>
                    @if (!empty($continents))
                        @foreach ($continents  as $continent)
                            @if ($continent->continent == 'Europe')
                                <a href="{{ route('continent.tradeData', [strtolower($continent->continent)]) }}" class="td-none text-uppercase text-hover">
                                    Europe Trade Data
                                </a>
                            @endif
                        @endforeach  
                    @else
                        <a href="/europe-trade-data">Data Fetching error</a>
                    @endif 
                </p>
                <p>
                    @if (!empty($continents))
                        @foreach ($continents  as $continent)
                            @if ($continent->continent == 'North-America')
                            <a href="{{ route('continent.tradeData', [strtolower($continent->continent)]) }}" class="td-none text-uppercase text-hover">
                                north america trade data
                            </a>
                            @endif
                        @endforeach  
                    @else
                        <a href="/africa-trade-data">Data Fetching error</a>
                    @endif 
                   
                </p>
                <p>
                    @if (!empty($continents))
                        @foreach ($continents  as $continent)
                            @if ($continent->continent == 'Oceania')
                            <a href="{{ route('continent.tradeData', [strtolower($continent->continent)]) }}" class="td-none text-uppercase text-hover">
                                oceania trade data
                            </a>
                            @endif
                            
                        @endforeach  
                    @else
                        <a href="/africa-trade-data">Data Fetching error</a>
                    @endif 
                </p>
                <p>
                    @if (!empty($continents))
                        @foreach ($continents  as $continent)
                            @if ($continent->continent == 'South-America')
                            <a href="{{ route('continent.tradeData', [strtolower($continent->continent)]) }}" class="td-none text-uppercase text-hover">
                                south america trade data
                            </a>
                            @endif
                        @endforeach  
                    @else
                        <a href="/africa-trade-data">Data Fetching error</a>
                    @endif 
                </p>
                <p>
                    <a href="/search-live-data" class="td-none text-uppercase text-hover">Search Live Data</a>
                </p>
                <p>
                    <a href="/hs-code" class="td-none text-uppercase text-hover">HS CODE</a>
                </p>
            </div>

            <div class="col-sm-6 col-xs-12 col-md-3 col-lg-3 col-xl-2 mx-auto mb-4 mobile-footer" style="margin-top: 2.5rem;text-align: start;">
                <h5 class="text-uppercase mb-4" style="margin-bottom: 2rem;font-weight: 500;">Countries</h5>
                <p>
                    <a href="/turkey-import" class="td-none text-uppercase text-hover">Turkey Import data</a>
                </p>
                <p>
                    <a href="/turkey-export" class="td-none text-uppercase text-hover">Turkey Export data</a>
                </p>
                <p>
                    <a href="/philippines-import" class="td-none text-uppercase text-hover">Philippines Import data</a>
                </p>
                <p>
                    <a href="/philippines-export" class="td-none text-uppercase text-hover">Philippines Export data</a>
                </p>
                <p>
                    <a href="/vietnam-import" class="td-none text-uppercase text-hover">Vietnam import data</a>
                </p>
                <p>
                    <a href="/vietnam-export" class="td-none text-uppercase text-hover">Vietnam export data</a>
                </p>
                <p>
                    <a href="/us-import" class="td-none text-uppercase text-hover">USA import data</a>
                </p>
                <p>
                    <a href="/us-export" class="td-none text-uppercase text-hover">USA export data</a>
                </p>
                <p>
                    <a href="/russia-import" class="td-none text-uppercase text-hover">Russia import data</a>
                </p>
                <p>
                    <a href="/russia-export" class="td-none text-uppercase text-hover">Russia export data</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Alert For Link Detection -->
    <div id="snackbar">
        <svg class="bi flex-shrink-0 me-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512">
            <style>svg{fill:#842029}</style>
            <path d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480H40c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24V296c0 13.3 10.7 24 24 24s24-10.7 24-24V184c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/>
        </svg>
        <b>Link Detected!</b> Form cannot be submitted.
    </div>

    <!-- Social Media -->
    <div class="container">
        <div class="row flex">
            <div class="text-content text-center">
                <h5 style="font-weight: 500;text-align: center;">SOCIAL MEDIA</h5>
            </div>
            <div class="icon-container" style="text-align: center;">
                <a href="https://twitter.com/tradeimex" style="color: #55ACEE;" id="fp">
                    <i class="fa-brands fa-twitter fa-2xl"></i>
                </a>
                <a href="https://www.facebook.com/tradeimex" style="color: #3B5998;" id="fp">
                    <i  class="fa-brands fa-facebook fa-2xl"></i>
                </a>    
                <a href="https://www.linkedin.com/in/tradeimex-import-export-data-provider-8b3533172/" style="color: #0077B5;" id="fp">
                    <i  class="fa-brands fa-linkedin fa-2xl"></i>
                </a>
                <a href="https://www.youtube.com/@tradeimex" style="color: red;" id="fp">  
                    <i  class="fa-brands fa-youtube fa-2xl"></i>
                </a>
                <a href="https://www.instagram.com/tradeimexinfo?igshid=OGQ5ZDc2ODk2ZA==" style="color: #bc2a8d;" id="fp">  
                    <i  class="fa-brands fa-instagram fa-2xl"></i>
                </a>
                <a href="https://pin.it/63T7r73" style="color: red;" id="fp">  
                    <i  class="fa-brands fa-pinterest fa-2xl"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Copyright, Terms & Conditions -->
    <div class="container-fluid p-3">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xl-6 col-xs-12">
                <div style="text-align: center;padding: 20px 0px 0px 0px;">
                    <p style="font-size:14px;font-weight: 500;">
                        Please Read Our
                        <a class="text-hover" style="color: #0a58ca !important;" href="/terms-of-use">Terms of use</a>,
                        <a class="text-hover" style="color: #0a58ca !important;" href="/privacy-policy">Privacy Policy</a> &
                        <a class="text-hover" style="color: #0a58ca !important;" href="/disclaimer">Disclaimer</a>
                    </p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-xl-6 col-xs-12">
                <div style="text-align: center;padding: 20px 0px 0px 0px;">
                    <p style="font-size:14px;font-weight: 500;">
                        © 2018-2024 by TradeImeX® India. All Rights are Reserved.
                    </p>
                </div> 
            </div>
        </div>  
    </div>
</footer>