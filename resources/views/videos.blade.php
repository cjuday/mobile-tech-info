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
</div>
   
        <div class="mainbar_new">
                <h2 class="title text-center">Videos</h2><!-- End .title-lg text-center -->
                <hr/>
            @if($count>0)
                @foreach($news as $new)
                    <div class="video-responsive">
                    <iframe src="https://www.youtube.com/embed/{{$new->video_id}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <br/>
                @endforeach

                    <div class="float-right">{{$news->links()}}</div>

            @else
                <center><h1>No videos posted yet!</h1></center>
            @endif
                        
        <br/><br/>
    <center>
    <a href="{{$data[4]}}" target="_blank" class="btn btn-outline-darker btn-more"><i class="icon-youtube" style="color:red"></i><span style="color:#000;"> See More On Youtube</span></a>
    </center>
    <br/><br/>
                </div><!-- End .container -->
            </div><!-- End .blog-posts -->
        </div>
</div>
<!--end new-->
@endsection