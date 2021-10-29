@extends('layouts.main')

@section('content')
<?php
$lower = $_GET['lower'];
$upper = $_GET['upper'];
$gg = ranges_show($lower, $upper);
$ggs = ranges_count($lower, $upper);
?>
<div class="container">
    <div class="text-center"><h3>Devices within {{$lower}} - {{$upper}}</h3></div>
</div>
<div class="cat-blocks-container" id="new-arrival"  style="background-color: #eee;">
    @if($ggs>0)
    <div class="tab-pane">
    <div class="row">
    @foreach($gg as $x)
    <div class="col-6 col-sm-4 col-lg-3 nomr">
                            <div class="product product-2">
                            <a href="{{url('products/'.$x->slug.'')}}" class="cat-block nohover" style="margin-top:1rem; margin-bottom:0.8rem;">
                                <figure>
                                        <img src="{{asset('storage/devices/'.$x->img.'')}}" alt="Category image" id="gg">
                                </figure>

                                <h3 class="cat-block-title" style="color:red;">{{$x->name}}</h3><h6 style="padding-top:10px; font-size:12px;">{{get_frp_by_id($x->id)}}</h6><!-- End .cat-block-title -->
                            </a>
                            </div>
                        </div><!-- End .col-sm-4 col-lg-2 -->
                        
    @endforeach
    </div>
    </div>
    <div class="float-right">
        {{$gg->links()}}
    </div>
@else
    <center><h3>No Devices found for this budget.</h3></center>
@endif
</div>
@endsection