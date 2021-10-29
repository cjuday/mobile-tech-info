@extends('layouts.main')

@section('content')
<!--devices-->
<?php
$data = get_devices($_GET['id']);
$cat_name = get_brand_name($_GET['id']);
$count = count($data);
?>
<div class="container">
    <div class="p-2">
        <h2 class="title text-center mb-4">{{$cat_name}} Devices</h2><!-- End .title text-center -->
    </div>
</div>
@if($count>0)
    <div class="cat-blocks-container" id="new-arrival"  style="background-color: #eee;">
        <div class="tab-pane fade show active" role="tabpanel">
        <div class="row">
        @foreach($data as $details)
            <div class="col-6 col-sm-4 col-lg-3 nomr">
                <div class="product product-2">
                    <a href="products/{{$details->slug}}" class="cat-block nohover" style="margin-top:1rem; margin-bottom:0.8rem;">
                        <figure>
                            <span>
                                <img src="{{asset('storage/devices/'.$details->img.'')}}" alt="Category image">
                            </span>
                        </figure>

                        <h3 class="cat-block-title" style="color:red;">{{$details->name}}</h3><h6 style="padding-top:10px; font-size:12px;">{{get_frp_by_id($details->id)}}</h6><!-- End .cat-block-title -->
                    </a>
                </div>
            </div><!-- End .col-sm-4 col-lg-2 -->
        @endforeach
        </div><!-- End .row -->
    </div>
    </div><!-- End .cat-blocks-container -->
@else
    <div align="center"><h2>No Devices For This Brand Added Yet.</h2></div>
    <br/><br/><br/>
@endif
</div><!-- End .container -->
<!--end devices-->
@endsection