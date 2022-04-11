<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - @yield('subtitle')</title>
    <!-- favicon -->
    <link rel=icon href="{{ asset('themes/front/img/favicon.png' )}}" sizes="20x20" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('themes/front/css/vendor.css' )}}">
    <link rel="stylesheet" href="{{ asset('themes/front/css/magnific-popup.css' )}}">
    <link rel="stylesheet" href="{{ asset('themes/front/css/style.css' )}}">
    <link rel="stylesheet" href="{{ asset('themes/front/css/responsive.css' )}}">
</head>
<body>
    <!-- preloader area start -->
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>
    <!-- search popup area start -->
    <div class="search-popup" id="search-popup">
        <form action="" class="search-form">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search.....">
            </div>
            <button type="submit" class="submit-btn"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <!-- //. search Popup -->
    <div class="body-overlay" id="body-overlay"></div>
    <!-- adbar end-->
    <div class="adbar-area d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-md-4 align-self-center">
                    <div class="logo text-md-left text-center">
                        <a class="main-logo" href="{{url('/')}}"><img src="{{ asset('themes/front/img/log.png' )}}" alt="img"></a>
                    </div>
                </div>
                <div class="col-md-8 text-md-right text-center">
                    <a href="#" class="adbar-right">
                        <img src="{{ asset('themes/front/img/ad/1.png' )}}" alt="img">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- adbar end-->
    <!-- navbar start -->
    <div class="navbar-area navbar-area-3">
        <nav class="navbar navbar-expand-lg">
            <div class="container nav-container">
                <div class="responsive-mobile-menu">
                    <div class="logo d-lg-none d-block">
                        <a class="main-logo" href="{{url('/')}}"><img src="{{ asset('themes/front/img/mnlog.png' )}}" alt="img"></a>
                    </div>
                    <button class="menu toggle-btn d-block d-lg-none" data-target="#miralax_main_menu" 
                    aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-left"></span>
                        <span class="icon-right"></span>
                    </button>
                </div>
                <div class="nav-right-part nav-right-part-mobile">
                    <a class="search header-search" href="#"><i class="fa fa-search"></i></a>
                </div>
                <div class="collapse navbar-collapse" id="miralax_main_menu">
                    <ul class="navbar-nav menu-open">
                        <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a></li>
                        <li class="menu-item-has-children current-menu-item">
                            <a href="#">Category</a>
                            <ul class="sub-menu">
                            @foreach($categories as $item)
                            <li><a href="{{route('main.categorypost',$item->slug)}}">{{ $item->name }}</a></li>
                            @endforeach
                            </ul>
                        </li>
                        <li class="menu-item-has-children current-menu-item">
                            <a href="#">Pages</a>
                            <ul class="sub-menu">
                                @foreach($pages as $item)
                                <li><a href="{{ route('main.pages', $item->slug) }}">{{ $item->title }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="{{ route('main.category') }}">Category</a></li>
                    </ul>
                </div>
                
            </div>
        </nav>
    </div>
    <!-- navbar end -->
    
    <!-- blog-gallery area Start -->
     @yield('content')
    <!-- blog-gallery area End -->

    <!-- footer area start -->
    <footer class="footer-area">
        <div class="copyright-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-6 align-self-center">
                        <ul class="privacy-menu">
                            @foreach($pages as $item)
                            <li><a href="{{ route('main.pages', $item->slug) }}">{{ $item->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-xl-4 col-lg-6 text-lg-center align-self-center">
                        <p><span>Dalusy</span>. All right reserved</p>
                    </div>
                    <div class="col-xl-4 text-xl-right text-xl-center">
                        <ul class="social-area social-area-2">
                            <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->

    <!-- back to top area start -->
    <div class="back-to-top">
        <span class="back-top"><i class="fa fa-angle-double-up"></i></span>
    </div>
    <!-- back to top area end -->


    <!-- all plugins here -->
    <script src="{{ asset('themes/front/js/vendor.js' )}}"></script>
    <script src="{{ asset('themes/front/js/jquery.magnific-popup.min.js' )}}"></script>
    <!-- main js  -->
    <script src="{{ asset('themes/front/js/main.js' )}}"></script>
</body>
</html>