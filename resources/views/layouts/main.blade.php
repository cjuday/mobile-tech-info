<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-206706351-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-206706351-2');
</script>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4205945312398756"
     crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @hasSection('title')
    <title>@yield('title')</title>
    @else
    <title>{{$data[0]}}</title>
    @endif

    @hasSection('meta_title')
    <meta name="title" content="@yield('meta_title')">
    @else
    <meta name="title" content="{{$data[1]}}">
    @endif

    @hasSection('meta_description')
    <meta name="description" content="@yield('meta_description')">
    @else
    <meta name="description" content="{{$data[2]}}">
    @endif

    
    @hasSection('meta_keywords')
    <meta name="keywords" content="@yield('meta_keywords')">
    @else
    <meta name="keywords" content="{{$data[3]}}">
    @endif

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('assets/main/images/icons/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('assets/main/images/icons/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('assets/main/images/icons/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/main/images/icons/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('assets/main/images/icons/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('assets/main/images/icons/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('assets/main/images/icons/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('assets/main/images/icons/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/main/images/icons/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('assets/main/images/icons/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/main/images/icons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/main/images/icons/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/main/images/icons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('assets/main/images/icons/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{asset('assets/main/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css')}}">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('assets/main/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/main/css/plugins/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/main/css/plugins/magnific-popup/magnific-popup.css')}}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('assets/main/css/style.css?version=11111111')}}">
    <link rel="stylesheet" href="{{asset('assets/main/css/custom_style.css?version=q211')}}">
    <link rel="stylesheet" href="{{asset('assets/main/css/skins/skin-demo-2.css?version=1')}}">
    <link rel="stylesheet" href="{{asset('assets/main/css/demos/demo-2.css')}}">
</head>

<body>
        @include('layouts.nav')

            @yield('content')

        @include('layouts.footer')

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container mobile-menu-dark" style="background:#000;">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>
            
            <form action="{{url('search')}}" method="get" class="mobile-search">
                <label for="mobile-search" class="sr-only">Search</label>
                <input type="search" class="form-control" name="q" id="q" placeholder="Search..." required>
                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
            </form>

            <ul class="nav nav-pills-mobile nav-border-anim" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="mobile-menu-link" data-toggle="tab" href="#mobile-menu-tab" role="tab" aria-controls="mobile-menu-tab" aria-selected="true">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="mobile-cats-link" data-toggle="tab" href="#mobile-cats-tab" role="tab" aria-controls="mobile-cats-tab" aria-selected="false">Categories</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="mobile-menu-tab" role="tabpanel" aria-labelledby="mobile-menu-link">
                    <nav class="mobile-nav">
                        <ul class="mobile-menu">
                                <li class=" active">
                                    <a href="{{url('home')}}"  class="header-white" style="margin-left: 20px; margin-right: 20px;">Home</a>
                                </li>
                                <li>
                                    <a href="{{url('news')}}" class="header-white" style="margin-left: 20px; margin-right: 20px;">News</a>
                                </li>
                                <li>
                                    <a href="{{url('videos')}}" class="header-white" style="margin-left: 20px; margin-right: 20px;">Videos</a>
                                </li>
                                <li>
                                    <a href="{{url('contact')}}" class="header-white" style="margin-left: 20px;">Contact</a>
                                </li>
                                <li>
                                    <a href="{{url('buy')}}" class="header-white" style="margin-left: 20px;">Buy Now</a>
                                </li>
                        </ul>
                    </nav><!-- End .mobile-nav -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane fade" id="mobile-cats-tab" role="tabpanel" aria-labelledby="mobile-cats-link">
                    <nav class="mobile-cats-nav">
                        <ul class="mobile-cats-menu">
                            @foreach($cats as $cat)
                                <li><a href="{{url('brands?id='.$cat->id.'')}}">{{$cat->name}}</a></li>
                            @endforeach
                        </ul><!-- End .mobile-cats-menu -->
                    </nav><!-- End .mobile-cats-nav -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->

            <div class="social-icons">
                <a href="{{$data[5]}}" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                <a href="{{$data[7]}}" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                <a href="{{$data[6]}}" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                <a href="{{$data[4]}}" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->


    <!-- Plugins JS File -->
    <script src="{{asset('assets/main/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/main/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/main/js/jquery.hoverIntent.min.js')}}"></script>
    <script src="{{asset('assets/main/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('assets/main/js/superfish.min.js')}}"></script>
    <script src="{{asset('assets/main/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/main/js/jquery.plugin.min.js')}}"></script>
    <script src="{{asset('assets/main/js/jquery.magnific-popup.min.js')}}"></script>
    <!-- Main JS File -->
    <script src="{{asset('assets/main/js/main.js')}}"></script>
    <script src="{{asset('assets/main/js/demos/demo-2.js')}}"></script>
    <script type="text/javascript">
         $('#newArrival a').click(function(e) {
    $($('#newArrivala').parent()).addClass("active").not(this.parentNode).removeClass("active");   
    e.preventDefault();
 });
 
 $('#upComing a').click(function(e) {
    $($('#upComing a').parent()).addClass("active").not(this.parentNode).removeClass("active");   
    e.preventDefault();
 });
    </script>
</body>
</html>