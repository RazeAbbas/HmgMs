<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>HMG By Salman | Home</title>
    <link rel="shortcut icon" href="{{asset('front-assets/img/hmg_favcion.png')}}" />
    <link rel="stylesheet" href="{{url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&amp;display=swap')}}">
    <link rel="stylesheet" href="{{asset('front-assets/css/plugins.css')}}" />
    <link rel="stylesheet" href="{{asset('front-assets/css/plugins/themify-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('front-assets/css/plugins/vegas.slider.min.css')}}" />
    <link rel="stylesheet" href="{{asset('front-assets/css/plugins/animate.min.css')}}" />
    <link rel="stylesheet" href="{{asset('front-assets/css/plugins/barber-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('front-assets/css/plugins/datepicker.css')}}" />
    <link rel="stylesheet" href="{{asset('front-assets/css/plugins/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{asset('front-assets/css/plugins/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('front-assets/css/plugins/owl.theme.default.min.css')}}" />
    <link rel="stylesheet" href="{{asset('front-assets/css/plugins/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('front-assets/css/style.css')}}" />
    <link href="{{url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css')}}" rel="stylesheet">
    
</head>
<body>
        <!-- Preloader -->
        <div class="preloader-bg"></div>
    <div id="preloader">
        <div id="preloader-status">
            <div class="preloader-position loader"> <span></span> </div>
        </div>
    </div>
    <!-- Progress scroll totop -->
    <div class="progress-wrap cursor-pointer">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Logo -->
            <div class="logo-wrapper">
                <a class="logo" href="{{url('/')}}"> <img src="{{asset('front-assets/img/Hmg.png')}}" class="logo-img" alt=""> </a>
                <!-- <a class="logo" href="index.html"> <h2>Perukar <span>Barber Shop</span></h2> </a> -->
            </div>
            <!-- Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"><i class="ti-menu"></i></span> </button>
            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#" data-scroll-nav="0">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-scroll-nav="1">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-scroll-nav="2">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-scroll-nav="3">Pricing</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-scroll-nav="4">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-scroll-nav="5">Team</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-scroll-nav="6">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-scroll-nav="7">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

@yield('content')

<div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-bottom-inner">
                        <p class="footer-bottom-copy-right">2023 © All rights reserved. Designed by <a href="{{url('https://github.com/razeabbas')}}" target="_blank">Raze Abbas  </a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- jQuery -->
<script src="{{asset('front-assets/js/jquery-3.6.3.min.js')}}"></script>
<script src="{{asset('front-assets/js/jquery-migrate-3.0.0.min.js')}}"></script>
<script src="{{asset('front-assets/js/modernizr-2.6.2.min.js')}}"></script>
<script src="{{asset('front-assets/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('front-assets/js/jquery.isotope.v3.0.2.js')}}"></script>
<script src="{{asset('front-assets/js/popper.min.js')}}"></script>
<script src="{{asset('front-assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front-assets/js/scrollIt.min.js')}}"></script>
<script src="{{asset('front-assets/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('front-assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('front-assets/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('front-assets/js/jquery.magnific-popup.js')}}"></script>
<script src="{{asset('front-assets/js/YouTubePopUp.js')}}"></script>
<script src="{{asset('front-assets/js/select2.js')}}"></script>
<script src="{{asset('front-assets/js/datepicker.js')}}"></script>
<script src="{{asset('front-assets/js/smooth-scroll.min.js')}}"></script>
<script src="{{asset('front-assets/js/custom.js')}}"></script>
</body>
</html>