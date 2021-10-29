@extends('layouts.main')

@section('content')
<!--news-->
<div class="blog-posts" style="margin-top:10px;">
<div class="container">
<div class="wrapper">
<div class="sidebarx_new">
    <h4 align="center" style="background-color: #bbb;margin:0;padding-top:10px;padding-bottom:10px;color:white;">Mobile Brands</h4>
    <div class="sub styleb">
        <?php
        $brand = get_brands('1');
        $c = 1;
        ?>
        <div class="row">
        @foreach($brand as $brn)
        <?php $c++; ?>
        @if(($c%4)!=1)
        <div class="col-sm-3" style="border-right: 1px solid #cccccc; padding-right: 5px;">
        @else
         <div class="col-sm-3" style="padding-right: 5px;">
        @endif
             <a href="devices?id={{$brn->id}}" style="padding-right:10px;color:#575757;font-weight:500;">{{$brn->name}} </a>
        </div>
        @endforeach
        </div>
    </div>
    <p align="center" style="background-color: #bbb;margin:0;padding-top:10px;padding-bottom:10px;">
        <a href="brands?id=1" style="font-size: 16px;color:white;">All Brands</a>
        </p>
    <br/>
    
    <div class="sibebar_ads">
        <img src="{{asset('assets/main/images/banner.jpg')}}">
    </div>
    <br/>
    
    <h4 align="center" style="background-color: #bbb;margin:0;padding-top:10px;padding-bottom:10px;color:white;">New Videos</h4>
    <div class="sub"  style="padding-top:10px">
    <?php $g = latest_videos(); ?>
    @foreach($g as $gg)
        <iframe
    height="220px"
    width="300px"
    src="https://www.youtube.com/embed/{{$gg->video_id}}"
    title="YouTube video player" 
    frameborder="0" 
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
    allowfullscreen></iframe>
    <br/>
    @endforeach
    <p align="right">
        <a href="{{url('videos')}}" style="font-size: 16px;">More videos<i class="icon-arrow-right"></i></a>
        </p>
    </div>
    <br/>

<br/>
<div class="sibebar_ads">
        <img src="{{asset('assets/main/images/banner.jpg')}}">
    </div>
    <br/>
    
    <h4 align="center" style="background-color: #bbb;margin:0;padding-top:10px;padding-bottom:10px;color:white;">Latest Devices</h4>
    <div class="sub" style="padding-top:10px; background-color:white; border-bottom: 1px solid #cccccc;">
        <?php
        $brand = latest_device();
        ?>
        <div class="cat-blocks-container">
                    <div class="row">
                        @foreach($brand as $cat)
                        <div class="col-4">
                            <a href="{{url('products/'.$cat->slug.'')}}" class="cat-block">
                                <figure>
                                    <span>
                                        <img src="{{asset('storage/devices/'.$cat->img.'')}}" alt="Category image">
                                    </span>
                                </figure>

                                <h3 class="cat-block-title">{{$cat->name}}</h3><!-- End .cat-block-title -->
                            </a>
                        </div><!-- End .col-sm-4 col-lg-2 -->
                        @endforeach
                    </div><!-- End .row -->
                </div><!-- End .cat-blocks-container -->
    </div>
    <br/>
    
    <div class="sibebar_ads">
        <img src="{{asset('assets/main/images/banner.jpg')}}">
    </div>
    <br/>
</div>
   
        <div class="mainbar_new">
<?php
$dt = buy_data();
$dt2 = buy_count();
?>
                <h2 class="title text-center">Buy Now</h2><!-- End .title-lg text-center -->
                <hr/>
        @if($dt2>0)
          @foreach($dt as $d)  
                        <div class="row" align="left">
                            <div class="col-4">
                                <img src="{{asset('storage/devices/'.$d->img.'')}}">
                            </div>
                            <div class="col-8" align="left">
                            <h4 style="color:#d50000;"><a href="{{$d->shop_link}}" align="left">{{$d->title}}</a> <a class="buttonw" href="{{$d->spec_link}}">SPECS</a></h4>
                                <sp style="font-size: 15px;"><a style="color:black;" href="{{$d->shop_link}}">{{$d->des}}</a></sp>
                                <br/>
                                <div class="row">
                                    <div class="col-4">
                                        <b>{{$d->ram}}</b>
                                    </div>
                                    <div class="col-4">
                                        <img src="{{asset('storage/shops/'.$d->shop_img.'')}}" height="20px" width="110px">
                                    </div>
                                    <div class="col-4">
                                        <b style="color:#d50000">{{$d->price}}</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr style="
    height: 30px;
    background: url(https://fdn.gsmarena.com/vv/assets10/i/pattern-diag-dark-33.png);
    background-size: 6px;
    border: none;
    border-top: 1px solid var(--color-body-background,#efebe9);
    opacity: 0.4;
">
@endforeach
<div class="float-right">
{{$dt->links()}}
</div>
@else
    <center><h4>No buying option yet!</h4></center>
@endif

                </div><!-- End .container -->
            </div><!-- End .blog-posts -->
        </div>
</div>
<!--end new-->
@endsection