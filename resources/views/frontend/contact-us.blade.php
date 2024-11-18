<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="google-site-verification" content="kevV-HFG1JijHyuKnnkIeN6dY_Hb-ueXuqoUv-pPWUU" />
        <meta name="ahrefs-site-verification" content="167ef56daf7b5a6af88ecea027be9df8f7a528cfe6be55f3f794a32094b792f2">
        <meta name="keywords" content="Import Export Data, Export Import Data Provider, Business Intelligence Report, Import Export Trade Data, Best Market Research, Importers Exporters Data, Buyers List, List of Suppliers, Trade Data, Best Import Export Data" />
        <meta name="robots" content="index, follow" id="robots" />
        <meta name="description" content="TradeImeX is a leading Import Export Trade Data Provider. We Cover 70+ Countries Import Export Trade Data online. Discover the Growth Trend." />
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
        <title>Contact Us - TradeImeX</title>
        <link rel="icon" type="image/x-icon" href="public/frontend/image/img/Favicon Logo.png">
        <link rel="canonical" href="https://www.tradeimex.in/contact-us"/>
        @include('frontend.link')
    </head>
    <body>
       @include('frontend.header')

        <!-- Overview & contact form -->
        <div class="container-fluid padding-tb bg-bluish">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="contact-form" style="margin-bottom: 4rem;">
                            @if(session('success'))
                                <div class="alert alert-success"id="success-alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ url('/contact') }}" method="POST" onsubmit="return validateForm()" id="contactform" class="form-control"  style="border: 0px;">
                                @csrf
                                <input type="hidden" name="user_ip" value="{{ request()->ip() }}">
                                <div class="form-floating mb-3 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <input autocomplete="off" required type="text" class="form-control" name="name" id="floatingInput" placeholder="Name">
                                    <label for="floatingInput">Name</label>
                                </div>
                                <div class="form-floating mb-3 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <input autocomplete="off" required type="email" class="form-control" name="email" id="floatingInput" placeholder="Email">
                                    <label for="floatingInput">Email</label>
                                </div>
                                <label class="m-1">Select Region</label>
                                <div class="input-group mb-3">
                                    <select name="country_region" class="form-control" id="countries">
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
                                <div class="form-floating mb-3 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <input autocomplete="off" required maxlength="10" type="tel" class="form-control" name="number" id="floatingInput" placeholder="Mobile Number">
                                    <label for="floatingInput">Mobile Number</label>
                                </div>

                                <div class="form-floating mb-3 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <input autocomplete="off" required type="text" class="form-control" name="company" id="floatingInput" placeholder="Company Name">
                                    <label for="floatingInput">Company Name</label>
                                </div>
                                <div class="form-floating mb-3 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <select required class="form-select" name="role" id="floatingSelect" aria-label="Floating label select example">
                                        <option>IMPORT</option>
                                        <option>EXPORT</option>
                                        <option>BOTH</option>
                                    </select>
                                    <label for="floatingSelect">Choose...</label>
                                </div>
                             
                                <div class="form-floating mb-3 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <textarea required class="form-control" name="message" placeholder="Leave A Message To Us" id="txt" style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">Describe Your Requirement</label>
                                </div>
                                <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                                <div class="btn col-md-12">
                                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="text-content">
                            <h1>
                                Talk to an expert 
                            </h1>
                            <p>
                                We appreciate you visiting Tradeimex, contact us via <i class="fa-solid fa-at me-1"></i>mail: <a href="mailto:info@tradeimex.in" class="text-hover">info@tradeimex.in</a>, 
                                and make a 
                                <i class="fa-solid fa-phone me-1"></i> call : <a href="tel:+91-9319646667" class="text-hover">(+91-9319646667)</a> , <a href="tel:+91-7042034462" class="text-hover">(+91-7042034462)</a> | At TradeImeX, 
                                we think that providing our users with individualized support is important. Our staff of knowledgeable trade experts are available at all times to 
                                offer advice and assistance. If you would like more information about who we are or have any queries about anything on our services, don't hesitate to 
                                contact us via email, chatbot, or our helpline numbers. Our specialists will get back to you right away. We promise to address any inquiries you might 
                                have regarding our offers. We appreciate your support!
                            </p>
                            <!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">-->
                            <!--  Launch demo modal-->
                            <!--</button>-->
                        </div>
                        <div class="card-content" style="padding-top: 6%;">
                            <div class="head">
                                <h3>Our Expertise team can help you in:</h3>
                            </div>
                            <div class="card-content-list">
                                <li class="list text-white">Understanding International Trade Regulations with ease and command.</li>
                                <li class="list text-white">Providing helpful insights on Market Research and Analysis.</li>
                                <li class="list text-white">Finding Buyer/Supplier Sourcing and Verification for your business.</li>
                                <li class="list text-white">Customization of data package as per the client’s needs and requirements.</li>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Maps -->
        <div class="responsive-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d437.41469798752604!2d77.13661697124729!3d28.7100535255674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d071148ef8341%3A0xe55ab5577ff48f81!2sTradeImex%20-%20Import%20Export%20Data%20Provider%2C%20Data%20Analytic%20%26%20Shipment%20Services!5e0!3m2!1sen!2sin!4v1702627978347!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0"  loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen>
                
            </iframe>
        </div>

        <!-- Get In Touch -->
        <div class="container-fluid bg-bluish padding-tb">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                        <div class="text-content">
                            <h1>Reach out to us and get in touch!</h1>
                            <p>
                                Got a query, doubt, or Inquiry? We would adore hearing from you. Contacting TradeImeX is
                                easy! We&#39;ve multiple mediums available for you to reach out to us. Just select the option that
                                fits your convenience. Consider the following ways to communicate with us.
                            </p>
                        </div>
                    </div>
                    <div class="row col-sm-12 col-xs-12 col-md-12 col-lg-12" style="padding-top: 3%;">
                        <div class="col-sm-6 col-xs-6 col-md-6 col-lg-3" style="padding-bottom: 2%;">
                            <div class="core-content">
                                <div class="image" style="display: flex;">
                                <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 576 512" style="fill:#0b5ed7;">
                                    <path d="M408 120c0 54.6-73.1 151.9-105.2 192c-7.7 9.6-22 9.6-29.6 0C241.1 271.9 168 174.6 168 120C168 53.7 221.7 0 288 0s120 53.7 120 120zm8 80.4c3.5-6.9 6.7-13.8 9.6-20.6c.5-1.2 1-2.5 1.5-3.7l116-46.4C558.9 123.4 576 135 576 152V422.8c0 9.8-6 18.6-15.1 22.3L416 503V200.4zM137.6 138.3c2.4 14.1 7.2 28.3 12.8 41.5c2.9 6.8 6.1 13.7 9.6 20.6V451.8L32.9 502.7C17.1 509 0 497.4 0 480.4V209.6c0-9.8 6-18.6 15.1-22.3l122.6-49zM327.8 332c13.9-17.4 35.7-45.7 56.2-77V504.3L192 449.4V255c20.5 31.3 42.3 59.6 56.2 77c20.5 25.6 59.1 25.6 79.6 0zM288 152a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"/>
                                </svg>
                                </div>
                                <h2>Address:</h2>
                                <p class="fw-500" style="padding: 0px 0px 0px 0px;">
                                    372, 3rd floor, RU BLOCK, <br> Pitampura 110034, New Delhi
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-6 col-md-6 col-lg-3" style="padding-bottom: 2%;">
                            <div class="core-content">
                                <div class="image" style="display: flex;">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 384 512" style="fill:#0b5ed7;">
                                        <path d="M80 0C44.7 0 16 28.7 16 64V448c0 35.3 28.7 64 64 64H304c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H80zm80 432h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H160c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/>
                                    </svg>
                                </div>
                                <h2>Phone:</h2>
                                <p class="fw-600" style="padding: 0px 0px 0px 0px;">
                                    <a class="text-hover" href="tel:+91-9319646667">+91-9319646667</a><br>
                                    <a class="text-hover" href="tel:+91-7042034462">+91-7042034462</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-6 col-md-6 col-lg-3" style="padding-bottom: 2%;">
                            <div class="core-content">
                                <div class="image" style="display: flex;">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 512 512" style="fill:#0b5ed7;">
                                        <path d="M256 64C150 64 64 150 64 256s86 192 192 192c17.7 0 32 14.3 32 32s-14.3 32-32 32C114.6 512 0 397.4 0 256S114.6 0 256 0S512 114.6 512 256v32c0 53-43 96-96 96c-29.3 0-55.6-13.2-73.2-33.9C320 371.1 289.5 384 256 384c-70.7 0-128-57.3-128-128s57.3-128 128-128c27.9 0 53.7 8.9 74.7 24.1c5.7-5 13.1-8.1 21.3-8.1c17.7 0 32 14.3 32 32v80 32c0 17.7 14.3 32 32 32s32-14.3 32-32V256c0-106-86-192-192-192zm64 192a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z"/>
                                    </svg>
                                </div>
                                <h2>Email</h2>
                                <p class="fw-600" style="padding: 0px 0px 0px 0px;">
                                    <a class="text-hover" href="mailto:info@tradeimex.in">
                                        info@tradeimex.in 
                                    </a>
                                    <br>
                                    <a class="text-hover" href="mailto:sales@tradeimex.in">
                                        sales@tradeimex.in
                                    </a>
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-6 col-md-6 col-lg-3" style="padding-bottom: 2%;">
                            <div class="core-content">
                                <div class="image" style="display: flex;">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 448 512" style="fill:#0b5ed7;">
                                        <path d="M181.3 32.4c17.4 2.9 29.2 19.4 26.3 36.8L197.8 128h95.1l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3s29.2 19.4 26.3 36.8L357.8 128H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H347.1L325.8 320H384c17.7 0 32 14.3 32 32s-14.3 32-32 32H315.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8l9.8-58.7H155.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8L90.2 384H32c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l21.3-128H64c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3zM187.1 192L165.8 320h95.1l21.3-128H187.1z"/>
                                    </svg>
                                </div>
                                <h2>Social Icons</h2>
                                <div class="icon-container">
                                    <a href="https://twitter.com/tradeimex" style="color: #55ACEE;" id="fp" >
                                        <i  class="fab fa-2x fa-twitter"></i>
                                    </a>
                                    <a href="https://www.facebook.com/tradeimex" style="color: #3B5998;" id="fp">
                                        <i  class="fab fa-2x fa-facebook"></i>
                                    </a>    
                                    <a href="https://www.linkedin.com/company/tradeimex/?viewAsMember=true" style="color: #0077B5;" id="fp">
                                        <i  class="fab fa-2x fa-linkedin"></i>
                                    </a>
                                    <br>
                                    <a href="https://www.youtube.com/channel/UCTHU41uHt6xOub4XDy2Egxw" style="color: red;" id="fp">  
                                        <i  class="fab fa-2x fa-youtube"></i>
                                    </a>
                                    <a href="https://www.instagram.com/tradeimexinfo?igshid=OGQ5ZDc2ODk2ZA==" style="color: #bc2a8d;" id="fp">  
                                        <i  class="fab fa-2x fa-instagram"></i>
                                    </a>
                                    <a href="https://pin.it/63T7r73" style="color: red;" id="fp">  
                                        <i  class="fab fa-2x fa-pinterest"></i>
                                    </a>
                                </div>
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
    </body>
</html>