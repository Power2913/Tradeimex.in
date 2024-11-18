<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="index, follow" id="robots" />
    <meta name="description"
        content="Search live global import export shipment data and trade activities of 100+ countries by HS code, product description, and port name with simple searches in one click of customs data, statistical data, and B/L data reports." />
    <title>Search Live Global Import Export & Trade Shipment Data of 100+ Countries</title>
     <link rel="icon" type="image/x-icon" href="{{asset('public/frontend/image/img/Favicon Logo.png')}}">
    @include('frontend.link')
</head>
<body>
    @include('frontend.header')

    <section class="container-fluid padding-tb bg-green">
        <div class="text-content text-center">
            <h1 class="fs-2 mb-3">
                Search Live Global Import Export & Trade Shipment Data of 100+ Countries
            </h1>
            <p class="fs-6 text-center">
                Search live global import export shipment data and trade activities of 100+ countries by HS code, product description, and port
                name with simple searches in one click of customs data, statistical data, and B/L data reports.
            </p>
        </div>
        @if(session('error'))
            <div class="container d-flex justify-content-center">
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            </div>
        @endif
         <div id="hs_code_error" class="container justify-content-center" style="color: red; display: none;">
             HS Code must be at least 2 digits
        </div>
        <div class="container">
            <form method="GET" action="{{ route('product.list') }}" enctype="multipart/form-data" id="searchForm">
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
                            <span>Select Country</span>
                        </div>
                        <input type="hidden" name="country" id="selected-country" value="">
                    </div>

                    <div class="searchbox col-sm-2 col-md-2 col-lg-2">
                        <select class="form-control" name="role" style="border: 0px transparent !important;">
                            <option class="form-control" value="import">Import</option>
                            <option class="form-control" value="export">Export</option>
                        </select>
                    </div>

                    <div class="searchbox col-sm-3 col-md-3 col-lg-3">
                        <input type="text" placeholder="Description" class="form-control" name="description" id="description">
                    </div>

                    <div class="searchbox col-sm-2 col-md-2 col-lg-2">
                        <input type="text" placeholder="HS Code" class="form-control" name="hs_code" id="hs_code">
                    </div>
                    <div class="searchbox col-sm-3 col-md-3 col-lg-3">
                        <button type="submit" class="ybtn ybtn-header-color" style="width: 100%;text-align: center;padding: 18px 0px 18px 0px;">
                            Search
                        </button>
                    </div>
                </div>

                <input type="hidden" name="section_type" id="section_type" value="">
            </form>

            <!-- Mega Menu -->
            <div class="mega-menu p-4" id="mega-menu">
                <div class="row">
                    <div class="col-md-12">
                            <div class="tab">
                                <button class="tablinks active-1" onmouseover="openCity(event, 'custom')">Custom Data</button>
                                <button class="tablinks" onmouseover="openCity(event, 'bl')">B/L Data</button>
                                <button class="tablinks" onmouseover="openCity(event, 'stat')">Statistics Data</button>
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
                                            <a class="text-hove`r custom">
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

                            <div id="stat" class="tabcontent">
                                <div>
                                    <div class="text-content">
                                        <h2 class="text-center text-white fs-5 fw-normal">North - America</h2>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 col-md-3 col-lg-2 Flag" onclick="selectCountry('Austria', 'public/frontend/image/flags/austria_rectangular_icon_with_shadow_64.png', 'stat-data')">
                                            <img src="frontend/image/flags/austria_rectangular_icon_with_shadow_64.png">
                                            <br>
                                            <a class="text-hover stat">
                                                <h4>Austria</h4>
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


    @include('frontend.footer')
    @include('frontend.script')
</body>
</html>
