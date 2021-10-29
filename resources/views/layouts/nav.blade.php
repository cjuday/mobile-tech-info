<header class="header header-2 header-intro-clearance" style="background-color:#000;">
            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars header-white"></i>
                        </button>
                        
                        <a href="{{url('home')}}" class="logo">
                            <img src="{{asset('assets/main/images/logo.png')}}" alt="Logo" id="logo">
                        </a>
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <div class="header-search header-search-extended header-search-visible header-search-no-radius d-none d-lg-block">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form action="{{url('search')}}" method="get">
                                <div class="header-search-wrapper search-wrapper-wide">
                                    <label for="q" class="sr-only">Search</label>
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Search..." required>
                                    <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                    </div>

                    <div class="header-right">
                        <div class="wishlist">
                            <a href="{{$data[4]}}" target="_blank" title="Youtube">
                                <div class="icon">
                                <i class="icon-youtube" style="color:red"></i></i>
                                </div>
                                <p class="header-white">Youtube</p>
                            </a>
                        </div><!-- End .compare-dropdown -->

                        <div class="wishlist">
                            <a href="{{$data[5]}}" target="_blank" title="Facebook">
                                <div class="icon">
                                    <i class="icon-facebook" style="color:#3b5998"></i>
                                </div>
                                <p class="header-white">Facebook</p>
                            </a>
                        </div><!-- End .compare-dropdown -->

                        <div class="account">
                            <a href="{{$data[6]}}" target="_blank" title="Instagram">
                                <div class="icon">
                                    <i class="icon-instagram" style="color:#faacf3"></i>
                                </div>
                                <p class="header-white">Instagram</p>
                            </a>
                        </div>

                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->

            <div class="header-bottom sticky-header" style="background-color:#000; color: #fff;">
                <div class="container">
                    <div class="header-left" style="color:#fff;">
                        <div class="dropdown category-dropdown">
                            <a href="#" class="dropdown-toggle" style="color:#fff" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Browse Categories">
                                Browse Categories
                            </a>

                            <div class="dropdown-menu">
                                <nav class="side-nav">
                                    <ul class="menu-vertical sf-arrows">
                                        @foreach($cats as $cat)
                                        <li><a href="{{url('brands?id='.$cat->id.'')}}">{{$cat->name}}</a></li>
                                        @endforeach
                                    </ul><!-- End .menu-vertical -->
                                </nav><!-- End .side-nav -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .category-dropdown -->
                    </div>

                    <div class="header-center">
                        <nav class="main-nav">
                            <ul class="menu">
                                <li class=" active">
                                    <a href="{{url('home')}}"  class="header-white" style="margin-left: 25px; margin-right: 15px;">Home</a>
                                </li>
                                
                                <li>
                                    <a href="{{url('news')}}" class="header-white" style="margin-left: 15px; margin-right: 15px;">News</a>
                                </li>
                                
                                <li>
                                    <a href="{{url('categories')}}" class="header-white" style="margin-left: 15px; margin-right: 15px;">Categories</a>
                                </li>
                              
                                <li>
                                    <a href="{{url('videos')}}" class="header-white" style="margin-left: 15px; margin-right: 15px;">Videos</a>
                                </li>
                               
                                <li>
                                    <a href="{{url('contact')}}" class="header-white" style="margin-left: 15px; margin-right:15px;">Contact</a>
                                </li>
                                
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-center -->

                    <div class="header-right">
                    <a href="{{url('buy')}}" class="btn btn-outline-darker btn-more"><i class="icon-shopping-cart" style="color:#fff;"></i> <span style="color:#fff;">Buy Now</span></a>
                    </div>
                </div><!-- End .container -->
            </div><!-- End .header-bottom -->
        </header><!-- End .header -->

        