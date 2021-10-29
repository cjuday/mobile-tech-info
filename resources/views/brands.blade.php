@extends('layouts.main')

@section('content')
<!--brands-->
<?php
$data = get_brands($_GET['id']);
$cat_name = get_category($_GET['id']);
$count = count($data);
?>
<div class="container">
    <div class="p-2">
        <h2 class="title text-center mb-4">{{$cat_name}} Brands</h2><!-- End .title text-center -->
    </div>
@if($count>0)
    <div class="cat-blocks-container">
        <div class="row">
        @foreach($data as $details)
            <div class="col-6 col-sm-4 col-lg-2">
                <a href="devices?id={{$details->id}}" class="cat-block">
                    <figure>
                        <span>
                            <img src="{{ asset('storage/brands/'.$details->img.'') }}" alt="Category image">
                        </span>
                    </figure>

                    <h3 class="cat-block-title">{{$details->name}}</h3><!-- End .cat-block-title -->
                </a>
            </div><!-- End .col-sm-4 col-lg-2 -->
        @endforeach
        </div><!-- End .row -->
    </div><!-- End .cat-blocks-container -->
@else
    <div align="center"><h2>No Brands For This Category Added Yet.</h2></div>
    <br/><br/><br/>
@endif
</div><!-- End .container -->
<!--end brands-->
@endsection