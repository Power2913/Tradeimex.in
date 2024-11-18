<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="google-site-verification" content="kevV-HFG1JijHyuKnnkIeN6dY_Hb-ueXuqoUv-pPWUU" />
        <meta name="ahrefs-site-verification" content="167ef56daf7b5a6af88ecea027be9df8f7a528cfe6be55f3f794a32094b792f2">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
        <title>
            Thank You!!
        </title>
        <link rel="icon" type="image/x-icon" href="public/frontend/image/img/Favicon Logo.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        @include('frontend.link')
        <style>
            .thank-you-section {
                display: flex;
                justify-content: center;
                align-items: center;
                height: auto;             
                background: rgb(0,80,110);
                background: linear-gradient(90deg, rgba(0,80,110,1) 12%, rgba(0,80,110,1) 56%, rgba(0,126,137,1) 90%);
            }
            .thank-you-container {
                text-align: center;
                padding: 50px;
                border-radius: 10px;
                /* box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); */
            }
            .thank-you-heading {
                font-size: 38px;
                color: #fff;
            }
            .thankyou-img {
                display: flex;
                justify-content: center;
            } 
            .thankyou-img img {
                width: 40%;
                padding: 22px;
            }
        </style>
    </head>
    <body>
        @include('frontend.header')
        
        <section class="thank-you-section">
            <div class="thank-you-container">
                <div class="thankyou-img">
                    <img src="public/frontend/image/img/mail.png">
                </div>
                <h1 class="thank-you-heading">
                    Thank you for Reaching Out <br>
                    We Will Get Back To You Soon!!
                </h1>
            </div>
        </section>

        <!-- Blog Cards -->
        <div class="container-fluid bg-bluish">
            <!--<div class="container pdt-2 bg-bluish">-->
            <!--    <div class="row">-->
            <!--        <div class="text-content text-center">-->
            <!--            <h2>Get More Insights From Our Blogs</h2>-->
            <!--        </div>-->
            <!--        <div class="col-lg-4 col-md-6 col-sm-12">-->
            <!--            <div class="blog_card">-->
            <!--                <div class="blog_card_image">-->
            <!--                    <img src="/public/frontend/image/img/blog_1.jpg" alt="">-->
            <!--                </div>-->
            <!--                <div class="blog_card_content">-->
            <!--                    <h3>-->
            <!--                        India’s Ambitious Interim-->
            <!--                        Union Budget 2024-25-->
            <!--                    </h3>-->
            <!--                    <p>-->
            <!--                        Discover everything you need to know about the highly anticipated Interim Union -->
            <!--                        Budget 2024-25 presented by Finance Minister Nirma...-->
            <!--                    </p>-->
            <!--                    <a class="text-hover" href="https://tradeimex.in/blogs/us-mexico-trade-relations">-->
            <!--                        <h6>Read More</h6>-->
            <!--                    </a>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--        <div class="col-lg-4 col-md-6 col-sm-12">-->
            <!--            <div class="blog_card">-->
            <!--                <div class="blog_card_image">-->
            <!--                    <img src="/public/frontend/image/img/blog_2.jpg" alt="">-->
            <!--                </div>-->
            <!--                <div class="blog_card_content">-->
            <!--                    <h3>Corn exports and imports in 2023</h3>-->
            <!--                    <p>-->
            <!--                        The total amount of corn produced globally in 2023 was 1.17 billion metric tons -->
            <!--                        with the USA leading the corn exports, while China...-->
            <!--                    </p>-->
            <!--                    <a class="text-hover" href="https://tradeimex.in/blogs/medical-equipment-export">-->
            <!--                        <h6>Read More</h6>-->
            <!--                    </a>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--        <div class="col-lg-4 col-md-6 col-sm-12">-->
            <!--            <div class="blog_card">-->
            <!--                <div class="blog_card_image">-->
            <!--                    <img src="/public/frontend/image/img/blog_3.jpg" alt="">-->
            <!--                </div>-->
            <!--                <div class="blog_card_content">-->
            <!--                    <h3>-->
            <!--                        Rice Import-Export Trade Statistics of 2023-->
            <!--                    </h3>-->
            <!--                    <p>-->
            <!--                        Discover the latest trends and projections for Rice trade statistics -->
            <!--                        in 2023. get the global trade data statistics of rice, Acqui...-->
            <!--                    </p>-->
            <!--                    <a class="text-hover" href="https://tradeimex.in/blogs/top-electronic-exports-of-the-philippines">-->
            <!--                        <h6>Read More</h6>-->
            <!--                    </a>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--         <div class="col-lg-4 col-md-6 col-sm-12">-->
            <!--            <div class="blog_card">-->
            <!--                <div class="blog_card_image">-->
            <!--                    <img src="/public/frontend/image/img/blog_1.jpg" alt="">-->
            <!--                </div>-->
            <!--                <div class="blog_card_content">-->
            <!--                    <h3>-->
            <!--                        India’s Ambitious Interim-->
            <!--                        Union Budget 2024-25-->
            <!--                    </h3>-->
            <!--                    <p>-->
            <!--                        Discover everything you need to know about the highly anticipated Interim Union -->
            <!--                        Budget 2024-25 presented by Finance Minister Nirma...-->
            <!--                    </p>-->
            <!--                    <a class="text-hover" href="https://tradeimex.in/blogs/us-mexico-trade-relations">-->
            <!--                        <h6>Read More</h6>-->
            <!--                    </a>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div> -->
            <!--    </div>-->
            <!--</div>-->
        </div>

        <!-- Clients Tab -->
        <div class="container-fluid pdt-2 pdb-5 bg-bluish">
            <div class="container">
                <div class="text-content text-center">
                    <h2>Our Happy Customers</h2>
                </div>
                <div class="row">
                    <div class="client-mb col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="client-img zoom">
                            <img src="public/frontend/image/client_transparent/Aditya_Birla.png" width="60%">
                        </div>
                    </div>
                    <div class="client-mb col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="client-img zoom">
                            <img src="public/frontend/image/client_transparent/BASF.png" width="60%">
                        </div>
                    </div>
                    <div class="client-mb col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="client-img zoom">
                            <img src="public/frontend/image/client_transparent/Counterpoint.png" width="60%">
                        </div>
                    </div>
                    <div class="client-mb col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="client-img zoom">
                            <img src="public/frontend/image/client_transparent/Deloitte.png" width="60%">
                        </div>
                    </div>
                    <div class="client-mb col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="client-img zoom">
                            <img src="public/frontend/image/client_transparent/DHL.png" width="60%">
                        </div>
                    </div>
                    <div class="client-mb col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="client-img zoom">
                            <img src="public/frontend/image/client_transparent/Dow.png" width="60%">
                        </div>
                    </div>
                    <div class="client-mb col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="client-img zoom">
                            <img src="public/frontend/image/client_transparent/Exxon_Mobil.png" width="60%">
                        </div>
                    </div>
                    <div class="client-mb col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="client-img zoom">
                            <img src="public/frontend/image/client_transparent/EY.png" width="60%">
                        </div>
                    </div>

                    <!-- Second row -->
                    <div class="client-mb col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="client-img zoom">
                            <img src="public/frontend/image/client_transparent/Realme.png" width="60%">
                        </div>
                    </div>
                    <div class="client-mb col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="client-img zoom">
                            <img src="public/frontend/image/client_transparent/Nikon.png" width="60%">
                        </div>
                    </div>
                    <div class="client-mb col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="client-img zoom">
                            <img src="public/frontend/image/client_transparent/Samsung.png" width="60%">
                        </div>
                    </div>
                    <div class="client-mb col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="client-img zoom">
                            <img src="public/frontend/image/client_transparent/LG.png" width="60%">
                        </div>
                    </div>
                    <div class="client-mb col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="client-img zoom">
                            <img src="public/frontend/image/client_transparent/Hyundai.png" width="60%">
                        </div>
                    </div>
                    <div class="client-mb col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="client-img zoom">
                            <img src="public/frontend/image/client_transparent/Mahindra.png" width="60%">
                        </div>
                    </div>
                    <div class="client-mb col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="client-img zoom">
                            <img src="public/frontend/image/client_transparent/Tata.png" width="60%">
                        </div>
                    </div>
                    <div class="client-mb col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="client-img zoom">
                            <img src="public/frontend/image/client_transparent/TVS.png" width="60%">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('frontend.footer')
        @include('frontend.script')
    </body>
</html>