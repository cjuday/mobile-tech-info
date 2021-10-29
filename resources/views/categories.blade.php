@extends('layouts.main')

@section('content')

<!--category-->
<div class="container">
                <div class="p-2">
                    <h2 class="title text-center mb-4">Categories</h2><!-- End .title text-center -->
                </div>
                <div class="cat-blocks-container">
                    <div class="row">
                        @foreach($cats as $cat)
                        <div class="col-6 col-sm-4 col-lg-2">
                            <a href="brands?id={{$cat->id}}" class="cat-block">
                                <figure>
                                    <span>
                                        <img src="{{ asset('storage/cats/'.$cat->img_src.'') }}" alt="Category image">
                                    </span>
                                </figure>

                                <h3 class="cat-block-title">{{$cat->name}}</h3><!-- End .cat-block-title -->
                            </a>
                        </div><!-- End .col-sm-4 col-lg-2 -->
                        @endforeach
                    </div><!-- End .row -->
                </div><!-- End .cat-blocks-container -->
            </div><!-- End .container -->
<!--end category-->
@endsection