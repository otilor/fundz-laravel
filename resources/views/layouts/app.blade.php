<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fundz || Home</title>
    <meta name="description" content="Multipurpose HTML template.">
    <script src="{{asset('landing/HTWF/scripts/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('landing/HTWF/scripts/bootstrap/css/bootstrap.css')}}">
    <script src="{{asset('landing/HTWF/scripts/script.js')}}"></script>
    <link rel="stylesheet" href="{{asset('landing/HTWF/style.css')}}">
    <link rel="stylesheet" href="{{asset('landing/HTWF/css/content-box.css')}}">
    <link rel="stylesheet" href="{{asset('landing/HTWF/css/image-box.css')}}">
    <link rel="stylesheet" href="{{asset('landing/HTWF/css/animations.css')}}">
    <link rel="stylesheet" href="{{asset('landing/HTWF/css/components.css')}}">
    <link rel="stylesheet" href="{{asset('landing/HTWF/scripts/flexslider/flexslider.css')}}">
    <link rel="stylesheet" href="{{asset('landing/HTWF/scripts/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('landing/HTWF/scripts/php/contact-form.css')}}">
    <link rel="stylesheet" href="{{asset('landing/HTWF/scripts/jquery.fullPage.css')}}">
    <link rel="stylesheet" href="{{asset('landing/HTWF/scripts/social.stream.css')}}">
    <link rel="icon" href="http://templates.framework-y.com/signflow/images/favicon.png">
    <link rel="stylesheet" href="{{asset('landing/skin.css')}}">
</head>
<body>
<!-- <div id="preloader"></div> -->
    <header class="fixed-top scroll-change" data-menu-anima="fade-bottom">
        <div class="navbar navbar-default mega-menu-fullwidth navbar-fixed-top" role="navigation">
            <div class="navbar navbar-main">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="/">
                            <h3>$ Fundz</h3>
                        </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <div class="nav navbar-nav navbar-right">
                            <ul class="nav navbar-nav">
                                <li><a href="/">Home</a></li>
                                <li><a href="#contact">Contact Us</a></li>
                                <li><a href="#team">Team</a></li>
                                <li><a href="#service">Services</a></li>
                                <!-- Login and Dashbord link -->
                                @if (Auth::guest())
                                    <li><a href="{{ url('/login') }}">Login</a></li>
                                @else
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>
                                        <!-- dropdown item -->

                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{route('dashboard-overview-1')}}">Dashboard</a></li>
                                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                        </ul>
                                    </li>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="fullpage-main">
        @yield('content')
        <footer class="section footer-base fp-auto-height">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 footer-center text-left">
                            <!-- <img width="120" src="{{asset('landing/images/logo.png')}}" alt="" /> -->
                            <h3>$ Fundz</h3>
                        </div>
                        <div class="col-md-6 footer-left text-left">
                            <p>Anchor University Lagos</p>
                            <div class="tag-row">
                                <span><a href="mailto:support@fundz.com">support@fundz.com</a></span>
                                <span><a href="tel:+2348181801589"> +234 8181801589</a></span>
                                <span><a href="tel:+2348149792957">+234 8149792957</a></span>
                            </div>
                        </div>
                        <div class="col-md-3 footer-left text-right text-left-sm">
                            <div class="btn-group social-group btn-group-icons">
                                <a target="_blank" href="#" data-social="share-facebook">
                                    <i class="fa fa-facebook text-xs circle"></i>
                                </a>
                                <a target="_blank" href="#" data-social="share-twitter">
                                    <i class="fa fa-twitter text-xs circle"></i>
                                </a>
                                <a target="_blank" href="#" data-social="share-google">
                                    <i class="fa fa-google-plus text-xs circle"></i>
                                </a>
                                <a target="_blank" href="#" data-social="share-linkedin">
                                    <i class="fa fa-linkedin text-xs circle"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row copy-row">
                    <div class="col-md-12 copy-text">
                        © 2021💲Fundz💲 - Manage all your Fundz in one place.<span>Developed by <a href="http://github.com/humaneguy" target="_blank">Akinyosoye Gabriel</a> and <a href="http://github.com/timbaron" target="_blank">Akiode Timothy</a></span>
                    </div>
                </div>
            </div>
            <link rel="stylesheet" href="{{asset('landing/HTWF/scripts/font-awesome/css/font-awesome.css')}}">
            <script async src="{{asset('landing/HTWF/scripts/bootstrap/js/bootstrap.min.js')}}"></script>
            <script src="{{asset('landing/HTWF/scripts/imagesloaded.min.js')}}"></script>
            <script src="{{asset('landing/HTWF/scripts/parallax.min.js')}}"></script>
            <script src="{{asset('landing/HTWF/scripts/flexslider/jquery.flexslider-min.js')}}"></script>
            <script async src="{{asset('landing/HTWF/scripts/isotope.min.js')}}"></script>
            <script async src="{{asset('landing/HTWF/scripts/php/contact-form.js')}}"></script>
            <script async src="{{asset('landing/HTWF/scripts/jquery.progress-counter.js')}}"></script>
            <script async src="{{asset('landing/HTWF/scripts/jquery.tab-accordion.js')}}"></script>
            <script async src="{{asset('landing/HTWF/scripts/bootstrap/js/bootstrap.popover.min.js')}}"></script>
            <script async src="{{asset('landing/HTWF/scripts/jquery.magnific-popup.min.js')}}"></script>
            <script src="{{asset('landing/HTWF/scripts/jquery.fullPage.min.js')}}"></script>
            <script src="{{asset('landing/HTWF/scripts/social.stream.min.js')}}"></script>
            <script src="{{asset('landing/HTWF/scripts/google.maps.min.js')}}"></script>
            <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
        </footer>
    </div>

</body>
</html>