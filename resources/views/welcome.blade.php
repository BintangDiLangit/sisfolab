<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title id="newTitle">Laboratory Information Systems | UIN Malang</title>
    <link rel="shortcut icon" href="{{ asset('../../landingPage/image/logo.png') }}" type="image/x-icon">
    <!-- Bootstrap , fonts & icons  -->
    <link rel="stylesheet" href="{{ asset('../../landingPage/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('../../landingPage/fonts/icon-font/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('../../landingPage/fonts/typography-font/typo.css') }}">
    <link rel="stylesheet" href="{{ asset('../../landingPage/fonts/fontawesome-5/css/all.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gothic+A1:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Plugin'stylesheets  -->
    <link rel="stylesheet" href="{{ asset('../../landingPage/plugins/aos/aos.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../landingPage/plugins/fancybox/jquery.fancybox.min.css') }}">
    <!-- Vendor stylesheets  -->
    <link rel="stylesheet" href="{{ asset('../../landingPage/css/main.css') }}">
    <!-- Custom stylesheet -->
    <style>
        #map {
            height: 100%;
            width: 100%;
        }

    </style>
</head>

<body data-theme-mode-panel-active data-theme="light" style="font-family: 'Mazzard H';">
    <div class="site-wrapper overflow-hidden position-relative">
        <!--Site Header Area -->
        <header
            class="site-header site-header--menu-center dark-mode-texts landing-17-menu  site-header--absolute site-header--sticky">
            <div class="container">
                <nav class="navbar site-navbar">
                    <!-- Brand Logo-->
                    <div class="brand-logo">
                        <a href="https://uin-malang.ac.id/">
                            <!-- light version logo (logo must be black)-->
                            <img src="{{ asset('../../landingPage/image/logo/logo-black.png') }}" alt=""
                                class="light-version-logo">
                            <!-- Dark version logo (logo must be White)-->
                            <img src="{{ asset('../../landingPage/image/logo/logo-black.png') }}" alt=""
                                class="dark-version-logo">
                        </a>
                    </div>
                    <div class="menu-block-wrapper">
                        <div class="menu-overlay"></div>
                        <nav class="menu-block" id="append-menu-header">
                            <div class="mobile-menu-head">
                                <div class="go-back">
                                    <i class="fa fa-angle-left"></i>
                                </div>
                                <div class="current-menu-title"></div>
                                <div class="mobile-menu-close">&times;</div>
                            </div>
                            <ul class="site-menu-main">
                                <li class="nav-item nav-item-has-children">
                                    <a href="#" class="nav-link-item drop-trigger">Build <i
                                            class="fas fa-angle-down"></i>
                                    </a>
                                    <ul class="sub-menu" id="submenu-9">
                                        <li class="sub-menu--item">
                                            <a href="#content1">Build by</a>
                                        </li>
                                        <li class="sub-menu--item">
                                            <a href="#content2">SiLab</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#aboutweb" class="nav-link-item">About Web</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#videoYt" class="nav-link-item">Video</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#presensi" class="nav-link-item">Attendance</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#contact" class="nav-link-item">Contact Us</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-btns  header-btn-l-17 ms-auto d-none d-xs-inline-flex align-items-center">
                        <a class="start-trail-btn btn focus-reset" href="{{ route('login') }}">
                            Sign in
                        </a>
                    </div>
                    <!-- mobile menu trigger -->
                    <div class="mobile-menu-trigger">
                        <span></span>
                    </div>
                    <!--/.Mobile Menu Hamburger Ends-->
                </nav>
            </div>
        </header>
        <!-- navbar- -->
        <!-- Hero Area -->
        <div class="hero-area-l-17 position-relative">
            <div class="container">
                <div class="row position-relative justify-content-center">
                    <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-11 order-lg-1 order-1" data-aos="fade-right"
                        data-aos-duration="800" data-aos-once="true">
                        <div class="content text-center">
                            {{-- <h1>Informatics Laboratory Information System</h1> --}}
                            <h1>Nursing Faculty Laboratory Information System</h1>
                            <p>State Islamic University Maulana Malik Ibrahim</p>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-9 order-lg-1 order-0">
                        <div class="hero-area-image">
                            <img src="{{ asset('../../landingPage/image/l8/kedokteran.jpg') }}" alt="" class="w-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Feature Area -->
        <div class="feature-area-l-17 position-relative" id="aboutweb">
            <div class="container">
                <div class="row feature-area-l-17-items justify-content-center text-center">
                    <div class="col-lg-4 col-md-6 col-sm-9">
                        <div class="single-features single-border position-relative">
                            <div class="circle-dot-1">
                                <i class="fas fa-circle"></i>
                            </div>
                            <h4>Loan</h4>
                            <p>Provide borrowing of tools and materials for laboratory needs.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-9">
                        <div class="single-features single-border position-relative">
                            <div class="circle-dot-2">
                                <i class="fas fa-circle"></i>
                            </div>
                            <h4>
                                Practical Attendance</h4>
                            <p>Presence to practice while there are lectures in the lab.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-9">
                        <div class="single-features">
                            <div class="circle-dot-3">
                                <i class="fas fa-circle"></i>
                            </div>
                            <h4>Visitor Attendance</h4>
                            <p>Presence for visitors visiting the lab.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Content Area 1-->
        <div class="content-area-l-17-1" id="content1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-10 col-lg-12">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-6 col-md-8" data-aos="fade-right" data-aos-duration="800"
                                data-aos-once="true">
                                <div class="content-img position-relative">
                                    <div class="image-1">
                                        <img src="{{ asset('../../landingPage/image/l8/content-image-1.png') }}"
                                            alt="">
                                    </div>
                                    <div class="image-2">
                                        <img src="{{ asset('../../landingPage/image/l8/content-image-2.png') }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="offset-xxl-1 col-xxl-5 col-xl-6 col-lg-6 col-md-8" data-aos="fade-left"
                                data-aos-duration="800" data-aos-once="true">
                                <div class="content section-heading-11">
                                    <h2>Built by BintangDiLangit Foundation</h2>
                                    <p>I am a college student . I've been interested in IT since MTs, my passion in IT
                                        can support me to be more active in learning about new sciences. My expertise is
                                        in programming, especially on the Web Dev | Focus on Back-End road to Full Stack
                                        Web Dev</p>
                                    <a href="https://www.linkedin.com/in/bintangmfhd/" target="_blank"
                                        class="btn focus-reset">Find
                                        Me</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Content Area 2-->
        <div class="content-area-l-17-2" id="content2">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-10 col-lg-12">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-xxl-5 col-xl-6 col-lg-6 col-md-8 order-lg-1 order-1" data-aos="fade-left"
                                data-aos-duration="800" data-aos-once="true">
                                <div class="content section-heading-11">
                                    <h2> The nursing laboratory information system.</h2>
                                    <p>A system that creates an efficient communication forum in the business field. An
                                        internet-based information system is an information system that makes maximum
                                        use of the usefulness of computers and computer networks.</p>
                                    <a href="https://bintanghuda.wordpress.com" target="_blank"
                                        class="btn focus-reset">Visit My
                                        Journey</a>
                                </div>
                            </div>
                            <div class="offset-xxl-1 col-xxl-6 col-xl-6 col-lg-6 col-md-8 order-lg-1 order-0"
                                data-aos="fade-right" data-aos-duration="800" data-aos-once="true">
                                <div class="content-img position-relative">
                                    <div class="image-1">
                                        <img src="image/l8/content-image-3.png" alt="">
                                    </div>
                                    <div class="image-2">
                                        <img src="image/l8/content-image-4.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Video Area-->
        <div class="video-area-l-17" id="videoYt">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-7 col-xl-8 col-lg-9 col-md-12">
                        <div class="video-content text-center">
                            <a data-fancybox="" href="https://www.youtube.com/watch?v=cr46EMMivd8"><i
                                    class="fas fa-play font-size-7"></i></a>
                            <h2>We help you to be successful</h2>
                            <p>Create custom landing pages with
                                Shade or back-end web that convert more visitors than any website. With lots of unique
                                blocks, you can
                                easily build a page without coding, because we'll do it.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Presensi --}}
        <div class="pricing-area-l-17 position-relative overflow-hidden" id="presensi">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8 text-center" data-aos="fade-down" data-aos-duration="800"
                        data-aos-once="true">
                        <div class="content section-heading-11">
                            <h2>Choose the Attendance</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" data-pricing-dynamic data-value-active="monthly">
                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8">
                        <div class="single-price popular-pricing popular-pricing-3 position-relative" data-aos="fade-up"
                            data-aos-duration="800" data-aos-once="true">
                            <div class="main-price">
                                <div class="price d-flex position-relative">
                                    <h3 class="d-inline-block dynamic-value">Presensi untuk <span>Pengunjung</span></h3>
                                </div>
                            </div>
                            <p>Laboratorium Keperawatan</p>
                            <div class="price-btn">
                                <a class="btn" href="{{ route('visitor.create') }}">Go!</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8">
                        <div class="single-price popular-pricing popular-pricing-3 position-relative" data-aos="fade-up"
                            data-aos-duration="800" data-aos-once="true">
                            <div class="main-price">
                                <div class="price d-flex position-relative">
                                    <h3 class="d-inline-block dynamic-value">Presensi untuk <span>Praktikum</span>
                                    </h3>
                                </div>
                            </div>
                            <p>Laboratorium Keperawatan</p>
                            <div class="price-btn">
                                <a class="btn" href="{{ route('practice.create') }}">Go!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Brand Area-->
        <div class="brand-area-l-17">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-9 col-lg-11 col-md-12">
                        <div class="content text-center">
                            <p>We are proud to have some big brands as our customer</p>
                        </div>
                        <div
                            class="brand-area-l-17-items d-flex justify-content-center justify-content-xl-between align-items-center flex-wrap ">
                            <div class="single-brand " data-aos="fade-right" data-aos-duration="500"
                                data-aos-once="true">
                                <img src="{{ asset('../../landingPage/image/l8/gojek-seeklogo.com.svg') }}" alt="">
                            </div>
                            <div class="single-brand " data-aos="fade-right" data-aos-duration="700"
                                data-aos-once="true">
                                <img src="{{ asset('../../landingPage/image/l8/brand-logo-4.svg') }}" alt="">
                            </div>
                            <div class="single-brand " data-aos="fade-right" data-aos-duration="900"
                                data-aos-once="true">
                                <img src="{{ asset('../../landingPage/image/l8/ml.png') }}" width="150px" alt="">
                            </div>
                            <div class="single-brand " data-aos="fade-right" data-aos-duration="1000"
                                data-aos-once="true">
                                <img src="{{ asset('../../landingPage/image/l8/tokopedialogo.png') }}" width="150px"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Testimonial Area-->
        {{-- <div class="testimonial-area-l-17">
            <div class="container">
                <div class="row justify-content-center no-gutters border-collapse-1">
                    <div class="col-lg-4 col-md-6 col-sm-9 p-0">
                        <div class="testimonial-card border h-100">
                            <img src="{{ asset('../../landingPage/image/l8/quote.png') }}" alt="">
                            <p>
                                “You made it so simple. My new site is so much faster and
                                easier to work with than my old site. I just choose the page, make the change and click
                                save. ”
                            </p>
                            <div class="d-flex align-items-center">
                                <div class="customer-img mr-4">
                                    <img src="{{ asset('../../landingPage/image/l8/client-img-1.png') }}" alt="">
                                </div>
                                <div class="user-identity">
                                    <h5>Sallie Lawson</h5>
                                    <span>Founder of Crips</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-9 p-0">
                        <div class="testimonial-card border h-100">
                            <img src="{{ asset('../../landingPage/image/l8/quote.png') }}" alt="" class="mb-12">
                            <p>
                                “Simply the best. Better than all the rest. I’d recommend this product to beginners and
                                advanced users.”
                            </p>
                            <div class="d-flex align-items-center">
                                <div class="customer-img">
                                    <img src="{{ asset('../../landingPage/image/l8/client-img-2.png') }}" alt="">
                                </div>
                                <div class="user-identity">
                                    <h5>Sallie Lawson</h5>
                                    <span>Founder of Crips</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-9 p-0">
                        <div class="testimonial-card border h-100">
                            <img src="{{ asset('../../landingPage/image/l8/quote.png') }}" alt="" class="mb-12">
                            <p>
                                “This is a top quality product. No need to think twice before purchasing, you simply
                                could not go wrong”
                            </p>
                            <div class="d-flex align-items-center">
                                <div class="customer-img mr-4">
                                    <img src="{{ asset('../../landingPage/image/l8/client-img-3.png') }}" alt="">
                                </div>
                                <div class="user-identity">
                                    <h5>Sallie Lawson</h5>
                                    <span>Founder of Crips</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!--CTA Area-->
        {{-- <div class="cta-area-l-17">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div
                            class="d-md-flex justify-content-between text-align-lg-start text-center align-items-center">
                            <h2>Manage your team in one place</h2>
                            <a href="#" class="btn">Start free 14 days trial</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!--Footer Area-->
        <footer class="footer-area-l-17 position-relative" id="contact">
            <div class="footer-shape">
                <img src="image/l8/footer-shape.svg" alt="">
            </div>
            <div class="container pt-lg-23 pt-15 pb-12">
                <div class="row footer-area-l-17-items justify-content-between" data-aos="fade-left"
                    data-aos-duration="800" data-aos-once="true">
                    <div class="col-md-6">
                        <div class="footer-widget widget2">
                            <p class="widget-title">Contact Us</p>
                            <ul class="widget-links pl-0 list-unstyled ">
                                <li><a href="##">Address : Jl. Gajayana No.50, Dinoyo, Kec. Lowokwaru, Kota Malang, Jawa
                                        Timur
                                        65144</a></li>
                                <li><a href="##">Telp. : +62-341 551-354</a></li>
                                <li><a href="##">Email : info@uin-malang.ac.id</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-widget widget2" id="map">

                        </div>
                    </div>
                </div>
            </div>
            <!-- footer-bottom start -->
            <div class="copyright-area-l-17 text-center text-md-start">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-4">
                            <div class="copyright">
                                <p> &copy; bintangdilangit 2021 All right reserved. </p>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <div class="footer-menu">
                                <ul class="list-unstyled d-flex flex-wrap justify-content-center">
                                    <li><a href="##">Privacy Policy</a></li>
                                    <li> <a href="##">Terms & Conditions</a> </li>
                                    <li><a href="##"> Site map</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-2">
                            <div class="social-icons text-md-end">
                                <ul class="pl-0 list-unstyled">
                                    <li class="d-inline-block"><a href="https://id-id.facebook.com/infoUINmaliki"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                    <li class="d-inline-block"><a href="https://twitter.com/uinmlg?lang=id"><i
                                                class="fab fa-twitter"></i></a></li>
                                    <li class="d-inline-block"><a
                                            href="https://www.linkedin.com/company/uin-maulana-malik-ibrahim-malang/mycompany/"><i
                                                class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- Vendor Scripts -->
    <script src="{{ asset('../../landingPage/js/vendor.min.js') }}"></script>
    <!-- Plugin's Scripts -->
    <script src="{{ asset('../../landingPage/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('../../landingPage/plugins/aos/aos.min.js') }}"></script>
    <script src="{{ asset('../../landingPage/plugins/menu/menu.js') }}"></script>
    <!-- Activation Script -->
    <script src="{{ asset('../../landingPage/js/custom.js') }}"></script>

    <script src="{{ asset('../../landingPage/js/title-scroll.js') }}" data-start="3000" data-speed="200"></script>
    <script>
        function initMap() {
            var location = {
                lat: -7.949160160749255,
                lng: 112.6079569616877
            };
            var map = new google.maps.Map(document.getElementById("map"), {
                zoom: 4,
                center: location
            });
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
        }

    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCaSFOefBNW4vqebK6sTkRDW8OHARtaR04&callback=initMap">
    </script>

</body>

</html>
