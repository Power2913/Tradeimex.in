    <script src="https://www.google.com/recaptcha/api.js"></script>

    <script>
        grecaptcha.ready(() => {
            grecaptcha.execute('6LeMDa0pAAAAADpczSGmVwa78vlXEMlRW10UNaQa', { action: 'modal' }).then(token => {
                document.querySelector('#HeaderRecaptchaResponse').value = token;
                console.log(document.querySelectorAll("#HeaderRecaptchaResponse").value);
            });
        });
    </script>

    <script>
        grecaptcha.ready(() => {
            grecaptcha.execute('6LeMDa0pAAAAADpczSGmVwa78vlXEMlRW10UNaQa', { action: 'contact' }).then(token => {
                document.querySelector('#recaptchaResponse').value = token;
                console.log(document.querySelectorAll("#recaptchaResponse").value);
            });
        });
    </script>

    <script>
        grecaptcha.ready(() => {
            grecaptcha.execute('6LeMDa0pAAAAADpczSGmVwa78vlXEMlRW10UNaQa', { action: 'contact' }).then(token => {
                document.querySelector('#footerRecaptchaResponse').value = token;
                console.log(document.querySelectorAll("#footerRecaptchaResponse").value);
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//code.tidio.co/sdzqyzkqyjktbhjlcr0v8xbgipvxwtc9.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js" crossorigin="anonymous"></script>

    <!--tree view in filter-->
    <script>
        function toggleNested(id, element) {
            var nestedList = document.getElementById(id);

            // Toggle display of the nested ul
            if (nestedList.style.display === 'none' || nestedList.style.display === '') {
                nestedList.style.display = 'block';
            } else {
                nestedList.style.display = 'none';
            }

            // Handle the icon toggling between plus and minus
            var plusIcon = element.querySelector('.fa-square-plus');
            var minusIcon = element.querySelector('.fa-square-minus');

            if (nestedList.style.display === 'block') {
                plusIcon.style.display = 'none';
                minusIcon.style.display = 'inline'; // Show minus icon when expanded
            } else {
                plusIcon.style.display = 'inline'; // Show plus icon when collapsed
                minusIcon.style.display = 'none';
            }
        }
    </script>

    {{-- select countries list --}}
    <script>
        function format(item, state) {
        if (!item.id) {
            return item.text;
        }
        var countryUrl = "https://hatscripts.github.io/circle-flags/flags/";
        var stateUrl = "https://oxguy3.github.io/flags/svg/us/";
        var url = state ? stateUrl : countryUrl;
        var img = $("", {
            class: "img-flag",
            width: 26,
            src: url + item.element.value.toLowerCase() + ".svg"
        });
        var span = $("<span>", {
            text: " " + item.text
        });
        span.prepend(img);
        return span;
        }

        $(document).ready(function() {
            $("#countries").select2({
                templateResult: function(item) {
                    return format(item, false);
                }
            });
            $("#us-states").select2({
                templateResult: function(item) {
                    return format(item, true);
                }
            });
        });
    </script>


    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NBN2JCV" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!--modal form script-->
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
        // Check if the modal has already been shown (for the 45-second timer)
        if (!localStorage.getItem('modalShown')) {
            // Automatically show the modal after 45 seconds
            setTimeout(() => {
                var myModal = new bootstrap.Modal(document.getElementById('exampleModal-1'));
                myModal.show();
                localStorage.setItem('modalShown', 'true'); // Mark that the modal has been shown
            }, 45000); // 45000 milliseconds = 45 seconds
        }

        // Apply event listener to all "Importer Name" links using IDs that start with "importer-name-link"
        const importerLinks = document.querySelectorAll('[id^="importer-name-link"]'); // Select all IDs starting with "importer-name-link"
        importerLinks.forEach(link => {
            link.addEventListener('click', function (event) {
                event.preventDefault(); // Prevent the default link behavior
                var myModal = new bootstrap.Modal(document.getElementById('exampleModal-1'));
                myModal.show();
            });
        });

        // Function to handle form submission
        window.handleFormSubmit = function () { // Ensure this is globally accessible
            var myModal = bootstrap.Modal.getInstance(document.getElementById('exampleModal-1'));
            myModal.hide();
            return true; // Proceed with form submission
        };

        // Function to hide the modal (e.g., when clicking the close button)
        window.myStopFunction = function () { // Ensure this is globally accessible
            var myModal = bootstrap.Modal.getInstance(document.getElementById('exampleModal-1'));
            myModal.hide();
        };

        // Optional: Event listener for form submission (if needed)
        document.getElementById('yourFormId').addEventListener('submit', function (event) {
            handleFormSubmit(); // Call the form submit handler
        });

        // Optional: Close modal on 'close' button click if there's a specific close button
        document.getElementById('yourCloseButtonId').addEventListener('click', function (event) {
            myStopFunction(); // Call the close handler
        });
    });

    // Reapply event listeners when pagination changes (if applicable)
    document.addEventListener('ajax:complete', function() {
        const importerLinks = document.querySelectorAll('[id^="importer-name-link"]'); // Select all IDs starting with "importer-name-link"
        importerLinks.forEach(link => {
            link.addEventListener('click', function (event) {
                event.preventDefault();
                var myModal = new bootstrap.Modal(document.getElementById('exampleModal-1'));
                myModal.show();
            });
        });
    });

    </script>


    <!--old script of form load after 45 second-->
    <!--<script>-->
    <!--    document.addEventListener('DOMContentLoaded', (event) => {-->
    <!--        if (!localStorage.getItem('modalShown')) {-->
    <!--            setTimeout(() => {-->
    <!--                var myModal = new bootstrap.Modal(document.getElementById('exampleModal-1'));-->
    <!--                myModal.show();-->
    <!--                localStorage.setItem('modalShown', 'true');-->
    <!--            }, 45000); // 45000 milliseconds = 45 seconds-->
    <!--        }-->
    <!--    });-->

    <!--    function handleFormSubmit() {-->
    <!--        var myModal = bootstrap.Modal.getInstance(document.getElementById('exampleModal-1'));-->
    <!--        myModal.hide();-->
    <!--        return true; // Continue with the form submission-->
    <!--    }-->

    <!--    function myStopFunction() {-->
    <!--        var myModal = bootstrap.Modal.getInstance(document.getElementById('exampleModal-1'));-->
    <!--        myModal.hide();-->
    <!--    }-->
    <!--</script>-->

    <!--{{-- Link validation script --}}-->
    <script>
        // Function to validate the form
        function validateForm() {
            // Get the value of the message field
            var message = document.getElementById('txt').value;

            // Regular expression to match URLs
            var urlRegex = /(https?:\/\/[^\s]+)/g;

            // Check if the message contains a URL
            if (urlRegex.test(message)) {
                // Alert the user and prevent form submission
                alert('Please do not include URLs in the message.');
                return false;
            }

            // If the message does not contain a URL, allow form submission
            return true;
        }

        function validateForm() {
            // Get the value of the message field
            var message = document.getElementById('txt').value;

            // Regular expression to match URLs
            var urlRegex = /(https?:\/\/[^\s]+)/g;

            // Check if the message contains a URL
            if (urlRegex.test(message)) {
                // Alert the user and prevent form submission
                alert('Please do not include URLs in the message.');
                return false;
            }

            // If the message does not contain a URL, allow form submission
            return true;
        }

        // Function to validate Contact form
        function validatecontactForm() {
            //  console.log('Entered in function:');
            // Get the value of the message field
            var message = document.getElementsByName("message")[0].value;
            var nameInput = document.getElementsByName('name')[0].value;
            var companyInput = document.getElementsByName('company')[0].value;
            var numberInput = document.getElementsByName('number')[0].value;

            console.log('message',message);

            // Regular expression to match URLs
            var urlRegex = /(https?:\/\/[^\s]+)/g;
             // Regular expression to check for links


            // Check if the message contains a URL
            if (urlRegex.test(message)|| urlRegex.test(nameInput) || urlRegex.test(companyInput) || urlRegex.test(numberInput)) {
                // Alert the user and prevent form submission
                alert('Please do not include URLs in Form.');
                return false;
            }

            // If the message does not contain a URL, allow form submission
            return true;
        }
    </script>


    <script>
       function refreshCaptcha() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/refresh_captcha');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var responseData = JSON.parse(xhr.responseText);
                    var captchaImg = document.getElementById('captchaImg');
                    if (captchaImg) {
                        captchaImg.src = responseData.captcha;
                    } else {
                        console.error('CAPTCHA image element not found');
                    }
                } else {
                    console.error('Request failed with status:', xhr.status);
                }
            };
            xhr.onerror = function() {
                console.error('Request failed');
            };
            xhr.send();
        }
    </script>
    <!-- Fontawesome Icon JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/fontawesome.min.js" integrity="sha512-64O4TSvYybbO2u06YzKDmZfLj/Tcr9+oorWhxzE3yDnmBRf7wvDgQweCzUf5pm2xYTgHMMyk5tW8kWU92JENng==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <script src="public/frontend/js/main.js"></script>

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "TradeImeX info solution Pvt Ltd",

                    "url": "https://www.tradeimex.in/",
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "9319646667",
                "contactType": "customer service",
                "areaServed": "IN",
                "availableLanguage": "en"
            },
            "sameAs": [
                "https://www.facebook.com/tradeimex/",
                "https://twitter.com/TradeImeX/",
                "https://www.youtube.com/channel/UCTHU41uHt6xOub4XDy2Egxw",
                "https://www.linkedin.com/company/tradeimex/",
                "https://in.pinterest.com/tradeimex/",
                "https://www.tradeimex.in/"
            ]
        }
    </script>
    <script>
        {
            "@context": "https://schema.org/",
            "@type": "WebSite",
            "name": "Tradeimex",
            "url": "https://www.tradeimex.in/",
            "potentialAction": {
                "@type": "SearchAction",
            "target": "https://www.tradeimex.in/{search_term_string}https://www.tradeimex.in/",
                "query-input": "required name=search_term_string"
            }
        }
    </script>
    <script>
        {
            "@context": "https://schema.org",
            "@type": "LocalBusiness",
            "name": "TradeImex - Import Export Data Provider, Data Analytic & Shipment Services",
            "image": "https://www.tradeimex.in/",
            "@id": "",
            "url": "https://www.tradeimex.in/",
            "telephone": "9319646667",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "372, 3rd Floor, 110034, Block RU, Pitam Pura, New Delhi, Delhi 110034",
                "addressLocality": "New Delhi",
                "postalCode": "110034",
                "addressCountry": "IN"
            },
            "openingHoursSpecification": {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": [
                "Monday",
                "Tuesday",
                "Wednesday",
                "Thursday",
                "Friday"
                ],
                "opens": "10:00",
                "closes": "18:30"
            }
        }
    </script>
    <script>
        function validateHsCode() {
            const hsCode = document.getElementById("hs_code").value;
            if (hsCode.length < 2) {
                alert("HS Code must be at least 2 digits.");
                return false; // Prevent form submission
            }
            return true; // Allow form submission
        }
    </script>

