<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @include('layouts.partials.assets')
    @livewireStyles
</head>

<body data-spy="scroll" data-target=".side_menu" data-offset="90">




<!-- Preloader -->
    @include('layouts.partials.loader')
<!-- Preloader End -->

<!--Header Start-->
    @include('layouts.partials.navigation')
<!--Header End-->

<!--Banner Start-->
<section class="page-title cursor-light">
    <div class="bg-overlay bg-black opacity-5"></div>
    <div class="container">
        <h2 class="hide-cursor">STANDALONE</h2>
        <ul class="page-breadcrumb link">
            <!-- <li><a href="../index-barber.html"><span class="icon fas fa-home"></span>Home</a></li> -->
            <li>StandAlone</li>
        </ul>
    </div>
</section>
<!--Banner End-->

<!--main page content-->
    <main id="app">
        @yield('content')
    </main>
        <div class="container">
            <div class="row no-gutters">
                <div class="col-12">
                    <!-- START HEADING SECTION -->
                    <div class="standalone-detail">
                        <div class="row no-gutters">
                            <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2  text-center wow slideInUp" data-wow-duration="2s">
                                <p class="sub-heading text-center">Most flexible one page</p>
                                <h1 class="heading">SECTION TITLE</h1>
                                <p class="para_text m-auto">Curabitur mollis bibendum luctus. Duis suscipit vitae dui sed suscipit. Vestibulum auctor nunc vitae diam eleifend, in maximus metus sollicitudin. Quisque vitae sodales lectus. Nam porttitor justo sed mi finibus, vel tristique risus faucibus.</p>
                            </div>
                        </div>
                    </div>
                    <!--content-->
                    <div class="standalone-area">
                        <div class="row standalone-row align-items-center no-gutters">
                            <div class="col-lg-6">
                                <div class="blog-image wow hover-effect fadeInLeft">
                                    <img src="{{ asset('img/stand1.jpg') }}" alt="image">
                                </div>
                            </div>
                            <div class="col-lg-6 stand-img-des">
                                <div class="d-inline-block">
                                    <p class="sub-heading text-center">Most flexible one page</p>
                                    <h2 class="gradient-text1">STANDALONE HEADING</h2>
                                    <p class="para_text">Curabitur mollis bibendum luctus. Duis suscipit vitae dui sed suscipit. Vestibulum auctor nunc vitae diam eleifend, in maximus metus sollicitudin. </p>
                                </div>
                            </div>
                        </div>

                        <!--content-->
                        <div class="row standalone-row align-items-center no-gutters">
                            <div class="col-lg-6 order-lg-2">
                                <div class="blog-image wow hover-effect fadeInRight">
                                    <img src="{{ asset('img/stand2.jpg') }}" alt="image">
                                </div>
                            </div>
                            <div class="col-lg-6 stand-img-des">
                                <div class="d-inline-block">
                                    <p class="sub-heading text-center">Most flexible one page</p>
                                    <h2 class="gradient-text1">STANDALONE HEADING</h2>
                                    <p class="para_text">Curabitur mollis bibendum luctus. Duis suscipit vitae dui sed suscipit. Vestibulum auctor nunc vitae diam eleifend, in maximus metus sollicitudin. </p>
                                </div>
                            </div>
                        </div>

                        <!--content-->
                        <div class="row standalone-row align-items-center no-gutters">
                            <div class="col-lg-6">
                                <div class="blog-image wow hover-effect fadeInLeft">
                                    <img src="{{ asset('img/stand3.jpg') }}" alt="image">
                                </div>
                            </div>
                            <div class="col-lg-6 stand-img-des">
                                <div class="d-inline-block">
                                    <p class="sub-heading text-center">Most flexible one page</p>
                                    <h2 class="gradient-text1">STANDALONE HEADING</h2>
                                    <p class="para_text">Curabitur mollis bibendum luctus. Duis suscipit vitae dui sed suscipit. Vestibulum auctor nunc vitae diam eleifend, in maximus metus sollicitudin. </p>
                                </div>
                            </div>
                        </div>
                        <!--content-->
                    </div>
                    <!-- END HEADING SECTION -->
                </div>
            </div>
        </div>
<!--main page content end-->

<!--Footer Start-->
    @include('layouts.partials.footer')
<!--Footer End-->

<!--Scroll Top Start-->
<span class="scroll-top-arrow"><i class="fas fa-angle-up"></i></span>
<!--Scroll Top End-->
 @livewireScripts
</body>
</html>
