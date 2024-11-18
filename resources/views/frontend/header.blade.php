<div id="header-holder" class="inner-header">
    <div class="bg-animation"></div>
    <nav class="navbar navbar-expand-lg bg-bluish">
        <div class="container bg-bluish">
            <a class="logo-holder" href="/">
                <!--<div class="logo" style=" border-radius: 10%;"></div>-->
                <img src="{{ url('public/frontend/image/img/logo.png') }}" class="logo"/>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02" style="padding-left: 2%;">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-center text-black fw-500" aria-current="page" href="/">
                            Home
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-center text-black fw-500" href="/about-us" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            About Us
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="/about-us">
                                    <i class="fa-solid fa-circle-info fa-lg"></i> &nbsp; About Us
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/why-choose-us">
                                    <i class="fa-solid fa-lightbulb fa-lg"></i> &nbsp; Why Choose Us
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/find-buyer-supplier">
                                    <i class="fa-brands fa-searchengin fa-lg"></i> &nbsp; How To Find Buyer/Supplier
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/careers">
                                    <i class="fa-solid fa-graduation-cap fa-lg"></i> &nbsp; Careers
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/our-clients">
                                    <i class="fa-solid fa-users-rays fa-lg"></i>&nbsp; Clients
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/partners">
                                    <i class="fa-solid fa-handshake-angle fa-lg"></i> &nbsp; Partners
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/faqs">
                                    <i class="fa-solid fa-circle-question fa-lg"></i>&nbsp; FAQs
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-center text-black fw-500" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Products
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="/search-live-data">
                                    <i class="fa-brands fa-searchengin fa-lg"></i> &nbsp;Search Live Data
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/products">
                                    <i class="fa-solid fa-bars fa-lg"></i> &nbsp;Our Products
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/customs-data">
                                    <i class="fa-solid fa-file-pen fa-lg"></i> &nbsp;Customs Data
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/statistical-data">
                                    <i class="fa-solid fa-magnifying-glass-chart fa-lg"></i> &nbsp;Statistical Data
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/bl-data">
                                    <i class="fa-solid fa-chart-simple fa-lg"></i> &nbsp;B/L Report
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/analytical-custom-report">
                                    <i class="fa-solid fa-square-poll-horizontal fa-lg"></i> &nbsp;Customised Analytical Report
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-center text-black fw-500" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Country Covered
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="/global-trade-data">
                                    <i class="fa-solid fa-globe fa-lg"></i> &nbsp;Globe Trade Data
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/asia-trade-data">
                                    <i class="fa-solid fa-earth-asia fa-lg"></i> &nbsp; Asia Trade Data
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/africa-trade-data">
                                    <i class="fa-solid fa-earth-africa fa-lg"></i> &nbsp;Africa Trade Data
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/europe-trade-data">
                                    <i class="fa-solid fa-earth-europe fa-lg"></i> &nbsp;Europe Trade Data
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/north-america-trade-data">
                                    <i class="fa-solid fa-earth-americas fa-lg"></i> &nbsp;North America Trade Data
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/south-america-trade-data">
                                    <i class="fa-solid fa-earth-americas fa-lg"></i> &nbsp;South America Trade Data
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/oceania-trade-data">
                                    <i class="fa-solid fa-earth-oceania fa-lg"></i>&nbsp;Oceania Trade Data
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center text-black fw-500" href="/search-live-data">
                            <i class="me-1 fa-solid fa-magnifying-glass"></i>
                           Search Live Data
                        </a>
                    </li>
                </ul>
                <div class="breadcrumb-mobile" style="justify-content: center;">
                    <button class="btn btn-outline text-black fw-500" type="button">
                        <a class="text-hover" href="/contact-us" style="color: #0a58ca !important;">Contact Us</a>
                    </button>
                    <a href="/blogs" style="color: #fff !important;display:flex;justify-content: center;">
                        <button class="btn btn-primary" type="button">
                            Blog
                        </button>
                     </a>
                </div>
            </div>
        </div>
    </nav>
</div>


<!-- Modal Form -->
<div class="modal fade" id="exampleModal-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="mt-3">
                    <h2 class="h1 mb-1 modal-title fs-5" id="exampleModalLabel">
                        <b>Get a free sample of import export data now</b>
                    </h2>
                    <p class="text-muted">
                        Access the import-export data for your desired country and products.
                    </p>
                </div>
                <div class="close-button" data-bs-dismiss="modal" aria-label="Close" onclick="myStopFunction()">
                    <i class="fa-solid fa-xmark fa-xl"></i>
                    <!--{{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}-->
                </div>
            </div>
            <div class="modal-body">
                <form action="{{ route('insight.send') }}" method="POST" onsubmit="return handleFormSubmit()" id="modal-form" class="form-control" style="border: 0px;">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-floating mb-3 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <input autocomplete="off" required type="text" class="form-control" name="name" id="floatingInput" placeholder="Name">
                                <label for="floatingInput">Name</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-floating mb-3 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <input autocomplete="off" required type="email" class="form-control" name="email" id="floatingEmail" placeholder="Email">
                                <label for "floatingEmail">Email</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group mb-3">
                            <select name="country_region" required class="form-select" id="inputGroupSelect02">
                                <option value="" Selected>Select Country Region</option>
                                <option value="United States">United States</option>
                                <option value="Canada">Canada</option>
                                <option value="Afghanistan">Afghanistan</option>
                                <option value="Åland Islands">Åland Islands</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Anguilla">Anguilla</option>
                                <option value="Antarctica">Antarctica</option>
                                <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Aruba">Aruba</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Azerbaijan">Azerbaijan</option>
                                <option value="Bahamas">Bahamas</option>
                                <option value="Bahrain">Bahrain</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Barbados">Barbados</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Belize">Belize</option>
                                <option value="Benin">Benin</option>
                                <option value="Bermuda">Bermuda</option>
                                <option value="Bhutan">Bhutan</option>
                                <option value="Bolivia">Bolivia</option>
                                <option value="Bosnia-Herzegovina">Bosnia-Herzegovina</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Bouvet Island">Bouvet Island</option>
                                <option value="Brazil">Brazil</option>
                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                <option value="British Virgin Islands">British Virgin Islands</option>
                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Burkina Faso">Burkina Faso</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Cambodia">Cambodia</option>
                                <option value="Cameroon">Cameroon</option>
                                <option value="Cape Verde">Cape Verde</option>
                                <option value="Cayman Islands">Cayman Islands</option>
                                <option value="Central African Republic">Central African Republic</option>
                                <option value="Chad">Chad</option>
                                <option value="Channel Islands">Channel Islands</option>
                                <option value="Chile">Chile</option>
                                <option value="China">China</option>
                                <option value="Christmas Island">Christmas Island</option>
                                <option value="Cocos Islands">Cocos Islands</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Comoros">Comoros</option>
                                <option value="Congo">Congo</option>
                                <option value="Cook Islands">Cook Islands</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Curaçao">Curaçao</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Dominica">Dominica</option>
                                <option value="Dominican Republic">Dominican Republic</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="Egypt">Egypt</option>
                                <option value="El Salvador">El Salvador</option>
                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                <option value="Eritrea">Eritrea</option>
                                <option value="Estonia">Estonia</option>
                                <option value="Ethiopia">Ethiopia</option>
                                <option value="Falkland Islands">Falkland Islands</option>
                                <option value="Faroe Islands">Faroe Islands</option>
                                <option value="Fiji">Fiji</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="French Guiana">French Guiana</option>
                                <option value="French Polynesia">French Polynesia</option>
                                <option value="French Southern Territories">French Southern Territories</option>
                                <option value="Gabon">Gabon</option>
                                <option value="Gambia">Gambia</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Germany">Germany</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Gibraltar">Gibraltar</option>
                                <option value="Greece">Greece</option>
                                <option value="Greenland">Greenland</option>
                                <option value="Grenada">Grenada</option>
                                <option value="Guadeloupe">Guadeloupe</option>
                                <option value="Guam">Guam</option>
                                <option value="Guatemala">Guatemala</option>
                                <option value="Guernsey">Guernsey</option>
                                <option value="Guinea">Guinea</option>
                                <option value="Guinea-Bissau">Guinea-Bissau</option>
                                <option value="Guyana">Guyana</option>
                                <option value="Haiti">Haiti</option>
                                <option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
                                <option value="Honduras">Honduras</option>
                                <option value="Hong Kong">Hong Kong</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Iceland">Iceland</option>
                                <option value="India">India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Iran">Iran</option>
                                <option value="Iraq">Iraq</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Isle of Man">Isle of Man</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Ivory Coast">Ivory Coast</option>
                                <option value="Jamaica">Jamaica</option>
                                <option value="Japan">Japan</option>
                                <option value="Jersey">Jersey</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Kazakhstan">Kazakhstan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Kiribati">Kiribati</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Laos">Laos</option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Libya">Libya</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Macau">Macau</option>
                                <option value="Macedonia">Macedonia</option>
                                <option value="Madagascar">Madagascar</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Maldives">Maldives</option>
                                <option value="Mali">Mali</option>
                                <option value="Malta">Malta</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Martinique">Martinique</option>
                                <option value="Mauritania">Mauritania</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Mayotte">Mayotte</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                <option value="Moldova">Moldova</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Mongolia">Mongolia</option>
                                <option value="Montenegro">Montenegro</option>
                                <option value="Montserrat">Montserrat</option>
                                <option value="Morocco">Morocco</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Myanmar">Myanmar</option>
                                <option value="Namibia">Namibia</option>
                                <option value="Nauru">Nauru</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                <option value="Netherlands">Netherlands</option>
                                <option value="New Caledonia">New Caledonia</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Nicaragua">Nicaragua</option>
                                <option value="Niger">Niger</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Niue">Niue</option>
                                <option value="Norfolk Island">Norfolk Island</option>
                                <option value="North Korea">North Korea</option>
                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                <option value="Norway">Norway</option>
                                <option value="Oman">Oman</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Palau">Palau</option>
                                <option value="Palestinian Authority">Palestinian Authority</option>
                                <option value="Panama">Panama</option>
                                <option value="Papua New Guinea">Papua New Guinea</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Peru">Peru</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Pitcairn">Pitcairn</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Puerto Rico">Puerto Rico</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Republic of the Congo">Republic of the Congo</option>
                                <option value="Reunion">Reunion</option>
                                <option value="Romania">Romania</option>
                                <option value="Russia">Russia</option>
                                <option value="Rwanda">Rwanda</option>
                                <option value="Saint Barthélemy">Saint Barthélemy</option>
                                <option value="Saint Helena">Saint Helena</option>
                                <option value="Saint Kitts &amp; Nevis">Saint Kitts &amp; Nevis</option>
                                <option value="Saint Lucia">Saint Lucia</option>
                                <option value="Saint Martin">Saint Martin</option>
                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                <option value="Saint Vincent &amp; Grenadines">Saint Vincent &amp; Grenadines</option>
                                <option value="Samoa">Samoa</option>
                                <option value="San Marino">San Marino</option>
                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Senegal">Senegal</option>
                                <option value="Serbia">Serbia</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="Sierra Leone">Sierra Leone</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Solomon Islands">Solomon Islands</option>
                                <option value="Somalia">Somalia</option>
                                <option value="South Africa">South Africa</option>
                                <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
                                <option value="South Korea">South Korea</option>
                                <option value="Spain">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="Sudan">Sudan</option>
                                <option value="Suriname">Suriname</option>
                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                <option value="Swaziland">Swaziland</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Syria">Syria</option>
                                <option value="Taiwan">Taiwan</option>
                                <option value="Tajikistan">Tajikistan</option>
                                <option value="Tanzania">Tanzania</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Timor-Leste">Timor-Leste</option>
                                <option value="Togo">Togo</option>
                                <option value="Tonga">Tonga</option>
                                <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                                <option value="Tunisia">Tunisia</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Turkmenistan">Turkmenistan</option>
                                <option value="Turks &amp; Caicos Islands">Turks &amp; Caicos Islands</option>
                                <option value="Tuvalu">Tuvalu</option>
                                <option value="Uganda">Uganda</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                <option value="Uruguay">Uruguay</option>
                                <option value="Uzbekistan">Uzbekistan</option>
                                <option value="Vanuatu">Vanuatu</option>
                                <option value="Vatican City">Vatican City</option>
                                <option value="Venezuela">Venezuela</option>
                                <option value="Vietnam">Vietnam</option>
                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                <option value="Western Sahara">Western Sahara</option>
                                <option value="Yemen">Yemen</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <input autocomplete="off" required maxlength="10" type="tel" class="form-control" name="number" id="floatingMobile" placeholder="Mobile Number">
                                <label for="floatingMobile">Mobile Number</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <input autocomplete="off" required type="text" class="form-control" name="company" id="floatingCompany" placeholder="Company Name">
                                <label for="floatingCompany">Company Name</label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="form-floating mb-3 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <select required class="form-select" name="role" id="floatingSelect" aria-label="Floating label select example">
                                <option>IMPORT</option>
                                <option>EXPORT</option>
                                <option>BOTH</option>
                            </select>
                            <label for="floatingSelect">Choose...</label>
                        </div>
                    </div>  
                    <div>
                        <div class="form-floating mb-3 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <textarea required class="form-control" name="message" placeholder="Leave A Message To Us" id="txt" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Message</label>
                        </div>
                    </div>
                    <input type="hidden" name="recaptcha_response" id="HeaderRecaptchaResponse">
                    <div class="btn col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

