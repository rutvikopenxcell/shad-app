<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>shad app</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Raleway:400,700&display=swap" rel="stylesheet">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen"> -->

    <style>

    </style>
</head>

<body>
    <!--header section start -->
    <div class="header_section">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="logo"><a href="/"><img src="images/logo.png"></a></div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>

                        <!-- @if (request()->is('home')) -->
                        <li class="nav-item">
                            <a class="nav-link" href="about">About</a>
                        </li>
                        <!-- @endif -->

                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="login">Login</a>
                        </li>
                        @endguest

                        <li class="nav-item">
                            <a class="nav-link" href="contact">Contact Us</a>
                        </li>

                        @auth

                        <li class="nav-item">
                            <a class="nav-link" href="profile">Profile</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        @endauth
                    </ul>
                </div>
            </nav>
        </div>
        <!--banner section start -->
        <!--banner section end -->
    </div>

    @yield('content')

    <!-- footer section start -->
    <div class="footer_section">
        <div class="container">
            <div class="social_icon">
                <a class="padding_10" href="#"><img src="images/fb-icon.png"></a>
                <a class="padding_10" href="#"><img src="images/twitter-icon.png"></a>
                <a class="padding_10" href="#"><img src="images/linkedin-icon.png"></a>
                <a class="padding_10" href="#"><img src="images/youtub-icon.png"></a>
            </div>
            <div class="location_main">
                <div class="location_text"><img src="images/map-icon.png"><span class="padding10"><a href="#">Gb road 123 london Uk </a></span></div>
                <div class="location_text center"><img src="images/call-icon.png"><span class="padding10"><a href="#">Call : (+01) 123456789012</a></span></div>
                <div class="location_text right"><img src="images/mail-icon.png"><span class="padding10"><a href="#">demo@gmail.com</a></span></div>
            </div>
            <div class="Enter_mail_main">
                <input type="text" class="Enter_text" placeholder="Enter Your Name" name="Enter Your Name">
                <div class="subscribe_bt"><a href="#">Subscribe</a></div>
            </div>
        </div>
    </div>
    <!-- footer section end -->
    <!-- copyright section start -->
    <div class="copyright_section">
        <div class="container">
            <p class="copyright_text">Copyright 2020 All Rights Reserved.<a href="https://html.design"> Free html Templates</a></p>
        </div>
    </div>
    <!-- copyright section end -->
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/plugin.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- javascript -->
    <script src="js/owl.carousel.js"></script>
    <!-- <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script> -->
</body>

</html>