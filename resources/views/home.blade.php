@extends('layouts.main')

@section('content')

<!--category-->
<div class="container">
                <div class="row p-2">
                        <div class="mr-auto">
                        <h2 class="title text-left mb-4">Categories</h2><!-- End .title text-center -->
                        </div>
                        <div class="ml-auto">
                        <a href="categories" style="font-size:16px;"><span style="color:red;">See All</span><i class="icon-long-arrow-right" style="color:red;"></i></a>
                        </div>
                </div>
                <div class="cat-blocks-container">
                    <div class="row">
                        @foreach($cats2 as $cat2)
                        <div class="col-6 col-sm-4 col-lg-2">
                            <a href="brands?id={{$cat2->id}}" class="cat-block">
                                <figure>
                                    <span>
                                        <img src="{{ asset('storage/cats/'.$cat2->img_src.'') }}" alt="Category image">
                                    </span>
                                </figure>

                                <h3 class="cat-block-title">{{$cat2->name}}</h3><!-- End .cat-block-title -->
                            </a>
                        </div><!-- End .col-sm-4 col-lg-2 -->
                        @endforeach
                  </div><!-- End .row -->
                </div><!-- End .cat-blocks-container -->
            </div><!-- End .container -->
<!--end category-->
<hr/>
<div class="container" align="center">
<h2 class="title text-center">Smartphone Budget</h2>
</div>
<?php
$num = count($ranges);
?>
<div style="border-bottom: 1px solid #eee;" align="center">
@foreach($ranges as $rng)
    <a href="ranges?lower={{$rng->lower}}&upper={{$rng->upper}}">{{$rng->value}}</a>
    @if($rng->upper!="")
    |
    @endif
@endforeach
</div>
<br/>
<!--New Arrivals-->
            <div class="container">
                <div class="heading heading-flex mb-3">
                    <div class="heading-left">
                        <h2 class="title"">New Arrivals In Bangladesh</h2><!-- End .title -->
                    </div><!-- End .heading-left -->

                   <div class="heading-right">
                        <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist" id="newArrival">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#allarr">All</a>
                            </li>
                            @foreach($arrival as $arr)
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#{{$arr->name}}" role="tab">{{$arr->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                   </div><!-- End .heading-right -->
                </div><!-- End .heading -->
            </div>
                <div class="cat-blocks-container" id="new-arrival"  style="background-color: #eee;">
                <div class="tab-content">
                
                    <div class="tab-pane fade show active" id="allarr" role="tabpanel">
                    <?php $x = new_arrival_by_catid_all(); ?>
                    <div class="row">
                        @foreach($x as $cat)
                            <div class="col-6 col-sm-4 col-lg-3 nomr">
                            <div class="product product-2">
                            <a href="{{url('products/'.$cat->slug.'')}}" class="cat-block nohover" style="margin-top:1rem; margin-bottom:0.8rem;">
                                <figure>
                                    <img src="{{asset('storage/devices/'.$cat->img.'')}}" alt="{{$cat->img}}">
                                </figure>

                                <h3 class="cat-block-title" style="color:red;">{{$cat->name}}</h3><h6 style="padding-top:10px; font-size:12px;">{{get_frp_by_id($cat->id)}}</h6><!-- End .cat-block-title -->
                            </a>
                            </div>
                        </div><!-- End .col-sm-4 col-lg-2 -->
                        @endforeach
                    </div>
                    </div>
                    
                    @foreach($arrival as $arr_data)
                    <div class="tab-pane fade" id="{{$arr_data->name}}" role="tabpanel">
                    <?php $x = new_arrival_by_catid($arr_data->id); ?>
                    <div class="row">
                        @foreach($x as $cat)
                            <div class="col-6 col-sm-4 col-lg-3 nomr">
                            <div class="product product-2">
                            <a href="{{url('products/'.$cat->slug.'')}}" class="cat-block nohover" style="margin-top:1rem; margin-bottom:0.8rem;">
                                <figure>
                                    <span>
                                        <img src="{{asset('storage/devices/'.$cat->img.'')}}" alt="{{$cat->img}}">
                                    </span>
                                </figure>

                                <h3 class="cat-block-title" style="color:red;">{{$cat->name}}</h3><h6 style="padding-top:10px; font-size:12px;">{{get_frp_by_id($cat->id)}}</h6><!-- End .cat-block-title -->
                            </a>
                            </div>
                        </div><!-- End .col-sm-4 col-lg-2 -->
                        @endforeach
                    </div>
                    </div>
                    @endforeach

                </div>
                </div>
            </div><!-- End .container -->
<!--end New Arrivals-->
<br/>
<!--Upcoming-->
            <div class="container">
                <div class="heading heading-flex mb-3">
                    <div class="heading-left">
                        <h2 class="title">Upcoming In Bangladesh</h2><!-- End .title -->
                    </div><!-- End .heading-left -->

                   <div class="heading-right">
                        <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#allarr1">All</a>
                            </li>
                            @foreach($upcoming as $arr2)
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#{{$arr2->name}}x" role="tab">{{$arr2->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                   </div><!-- End .heading-right -->
                </div><!-- End .heading -->
                </div>
                <div class="cat-blocks-container" id="new-arrival"  style="background-color: #eee;">
                <div class="tab-content">
                
                <div class="tab-pane fade show active" id="allarr1" role="tabpanel">
                    <?php $x = new_upcoming_by_catid_all(); ?>
                    <div class="row">
                        @foreach($x as $cat)
                            <div class="col-6 col-sm-4 col-lg-3 nomr">
                            <div class="product product-2">
                            <a href="{{url('products/'.$cat->slug.'')}}" class="cat-block nohover" style="margin-top:1rem; margin-bottom:0.8rem;">
                                <figure>
                                    <img src="{{asset('storage/devices/'.$cat->img.'')}}" alt="{{$cat->img}}">
                                </figure>

                                <h3 class="cat-block-title" style="color:red;">{{$cat->name}}</h3><h6 style="padding-top:10px; font-size:12px;">{{get_frp_by_id($cat->id)}}</h6><!-- End .cat-block-title -->
                            </a>
                            </div>
                        </div><!-- End .col-sm-4 col-lg-2 -->
                        @endforeach
                    </div>
                    </div>

                    @foreach($arrival as $arr_data)
                    <div class="tab-pane fade" id="{{$arr_data->name}}x" role="tabpanel">
                    <?php $x = new_upcoming_by_catid($arr_data->id); ?>
                    <div class="row">
                        @foreach($x as $cat)
                            <div class="col-6 col-sm-4 col-lg-3 nomr">
                            <div class="product product-2">
                            <a href="{{url('products/'.$cat->slug.'')}}" class="cat-block nohover" style="margin-top:1rem; margin-bottom:0.8rem;">
                                <figure>
                                    <span>
                                        <img src="{{asset('storage/devices/'.$cat->img.'')}}" alt="{{$cat->img}}">
                                    </span>
                                </figure>

                                <h3 class="cat-block-title" style="color:red;">{{$cat->name}}</h3><h6 style="padding-top:10px; font-size:12px;">{{get_frp_by_id($cat->id)}}</h6><!-- End .cat-block-title -->
                            </a>
                            </div>
                        </div><!-- End .col-sm-4 col-lg-2 -->
                        @endforeach
                    </div>
                    </div>
                    @endforeach

                </div>
                </div>
            </div><!-- End .container -->
<!--end Upcoming-->


            <div class="blog-posts" style="margin-top:10px;">
                <div class="container">
                    <h2 class="title text-center">Latest News</h2><!-- End .title-lg text-center -->
                    
                    @if($news_count>0)
                    @foreach($news as $new)
                    <a href="news_read?id={{$new->id}}">
                            <?php
                            $string = strip_tags($new->description);
if (strlen($string) > 500) {

    $stringCut = substr($string, 0, 700);
    $endPoint = strrpos($stringCut, ' ');
    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
    $string .= '...';
}
?>
                    <div class="row">
                        <div class="col-6 col-lg-4 col-sm-4">
                        <a href="news_read?id={{$new->id}}">
                            <img src="storage/news/{{$new->preview_img}}" class="newsimg">
                        </a>
                        </div>
                        <div class="col-6 col-lg-8 col-sm-4">
                        <a href="news_read?id={{$new->id}}">
                            <h5 style="font-weight:600">{{$new->title}}</h5>
                            <p class="newsbody">{{$string}}</p>
                            Posted On {{$new->post_date}}
                        </a>
                        </div>
                    </div>
                    <br/>
                @endforeach
                    @else
                        <center>No news posted yet!</center>
                    @endif
                    <div class="more-container text-center mt-2">
                        <a href="news" class="btn btn-outline-darker btn-more"><span>View more news</span><i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .more-container -->
                </div><!-- End .container -->
            </div><!-- End .blog-posts -->
@endsection