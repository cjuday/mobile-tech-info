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
   
        <div class="mainbar_news">
                <h2 class="title text-center">News</h2><!-- End .title-lg text-center -->
                <hr/>
                @if($count>0)
                @foreach($news as $new)
                    <div class="row">
                        <div class="col-6 col-lg-6 col-sm-4">
                        <a href="news_read?id={{$new->id}}">
                            <img src="storage/news/{{$new->preview_img}}">
                        </a>
                        </div>
                        <div class="col-6 col-lg-6 col-sm-4">
                        <a href="news_read?id={{$new->id}}">
                            <?php
                            $string = strip_tags($new->description);
if (strlen($string) > 500) {

    $stringCut = substr($string, 0, 500);
    $endPoint = strrpos($stringCut, ' ');
    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
    $string .= '...';
}
?>
                            <h5 style="font-weight:600">{{$new->title}}</h5>
                            <p class="newsbody">{{$string}}</p>
                            Posted On {{$new->post_date}}
                        </a>
                        </div>
                    </div>
                    <br/>
                @endforeach

                    <div class="float-right">{{$news->links()}}</div>

            @else
                <center><h1>No news posted yet!</h1></center>
            @endif
                </div><!-- End .container -->
            </div><!-- End .blog-posts -->
        </div>
            <br/><br/><br/>
</div>
<!--end new-->
@endsection