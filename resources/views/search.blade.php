@extends('layouts.main')

@section('content')
<div class="container">
    <div class="text-center"><h3>Search result for {{$_GET['q']}}</h3></div>
</div>
    <?php $xxx = get_search($_GET['q']); 
    $xx = get_search_count($_GET['q']);?>
    <div class="cat-blocks-container" id="new-arrival"  style="background-color: #eee;">
    @if($xx>0)
    <div class="tab-pane">
    <div class="row">
    @foreach($xxx as $x)
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
        {{$xxx->links()}}
    </div>
    @else
        <center><h2>Nothing Found!!</h2></center>
    @endif
</div>
@endsection