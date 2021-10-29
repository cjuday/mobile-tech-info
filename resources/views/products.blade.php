@extends('layouts.main')
<?php 
$page_top = page_top_info($id);
$page_top_det = page_top_details($id);
?> 
@section('title', ''.$page_top->name.' Full Specifications')
@section('meta_title',$page_top->metatitle)
@section('meta_description',$page_top->metades)
@section('meta_keywords',$page_top->metakey)

@section('content')
<div class="container">
<div class="wrapper">
<div class="sidebarx">
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
             <a href="{{url('devices?id='.$brn->id.'')}}" style="padding-right:10px;color:#575757;font-weight:500;">{{$brn->name}} </a>
        </div>
        @endforeach
        </div>
    </div>
    <p align="center" style="background-color: #bbb;margin:0;padding-top:10px;padding-bottom:10px;">
        <a href="{{url('brands?id=1')}}" style="font-size: 16px;color:white;">All Brands</a>
        </p>
    <br/>
    
    <h4 align="center" style="background-color: #bbb;margin:0;padding-top:10px;padding-bottom:10px;color:white;">Latest News</h4>
    <div class="sub" style="padding-top:10px">
            <?php $x = latest_news(); ?>
                @foreach($x as $xx)
                    <div class="row">
                        <div class="col-6">
                            <img src="{{asset('storage/news/'.$xx->preview_img.'')}}">
                        </div>
                        <div class="col-6">
                        <a href="{{url('news_read?id='.$xx->id.'')}}">
                            <h6>{{$xx->title}}</h6>
                        </a>
                            {{$xx->post_date}}
                        </div>
                    </div>
                    <br/>
                @endforeach
                    <p align="right">
        <a href="{{url('news')}}" style="font-size: 16px;">More News<i class="icon-arrow-right"></i></a>
        </p>
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
    
    <h4 align="center" style="background-color: #bbb;margin:0;padding-top:10px;padding-bottom:10px;color:white;">Related Devices</h4>
    <div class="sub"  style="padding-top:10px; background-color:white; border-bottom: 1px solid #cccccc;">
        <?php
        $brand = related_device($id);
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
                    <p align="right">
        <a href="{{url('devices?id='.$page_top->brand_id.'')}}" style="font-size: 16px;">More Related Devices<i class="icon-arrow-right"></i></a>
        </p>
    </div>
    <br/>

</div>
<div class="mainbar">
<div class="headerc">

            <b style="color:black;"></b>{{$page_top->name}}</b>
       </div>
    <div class="dev_img" style="border-left: 1px solid #eee; padding-left: 10px;">
      <img src="{{asset('storage/devices/'.$page_top->img.'')}}">
    </div>
    
    <div class="header-body">
        <p class="spec-header" style="border-bottom:1px solid #eee; padding-bottom:10px;">
        <b>Price in Bangladesh</b>
        </p>
        <div class="row">
            <div class="col-md-6 col-xs-12 nopadleft">
<b>{{$page_top_det->status}}</b><br/>
@if(!is_nullx($page_top_det->prc1))
<?php $mod = explode("-",$page_top_det->prc1);?>
{{$mod[0]}} - <b>{{$mod[1]}}</b><br/>
@endif

@if(!is_nullx($page_top_det->prc2))
<?php $mod = explode("-",$page_top_det->prc2);?>
{{$mod[0]}} - <b>{{$mod[1]}}</b><br/>
@endif

@if(!is_nullx($page_top_det->status2))
<b>{{$page_top_det->status2}}</b><br/>
@endif

@if(!is_nullx($page_top_det->prc3))
<?php $mod = explode("-",$page_top_det->prc3);?>
{{$mod[0]}} - <b>{{$mod[1]}}</b><br/>
@endif

@if(!is_nullx($page_top_det->prc4))
<?php $mod = explode("-",$page_top_det->prc4);?>
{{$mod[0]}} - <b>{{$mod[1]}}</b><br/>
@endif
            </div>
                <div class="col-md-3 col-xs-12 hide-proddet" style=" border-left: 1px solid white;">
                @if(!is_nullx($page_top_det->disp_size) || !is_nullx($page_top_det->disp_res))
                   <img src="{{asset('assets/main/images/icon/touch.png')}}" style="padding-bottom:8px; padding-top:6px;">
                   @if(!is_nullx($page_top_det->disp_size))
                   <b style="font-size: 18px;">{{$page_top_det->disp_size}}</b>
                   @endif

                   @if(!is_nullx($page_top_det->disp_res))
                   <h6 style="font-size: 13px;">{{$page_top_det->disp_res}}</h6>
                   @endif
                @endif
                </div>

                <div class="col-md-3 col-xs-12 hide-proddet" style=" border-left: 1px solid white;">
                @if(!is_nullx($page_top_det->cam_size) || !is_nullx($page_top_det->cam_res))
                   <img src="{{asset('assets/main/images/icon/camera.png')}}" style="padding-bottom:8px; padding-top:6px;">
                   @if(!is_nullx($page_top_det->cam_size))
                   <b style="font-size: 18px;">{{$page_top_det->cam_size}}</b>
                   @endif

                   @if(!is_nullx($page_top_det->cam_res))
                   <h6 style="font-size: 13px;">{{$page_top_det->cam_res}}</h6>
                   @endif
                @endif
                </div>
        </div>
        <br/>
            <div class="row">
                <div class="col-md-3 col-xs-12">
                    
                </div>
                <div class="col-md-3 col-xs-12">
                    
                </div>

                <div class="col-md-3 col-xs-12 hide-proddet"  style=" border-left: 1px solid white;">
                @if(!is_nullx($page_top_det->ram_size) || !is_nullx($page_top_det->ram_type))
                   <img src="{{asset('assets/main/images/icon/ram.png')}}" style="padding-bottom:8px; padding-top:6px;">
                   @if(!is_nullx($page_top_det->ram_size))
                   <b style="font-size: 18px;">{{$page_top_det->ram_size}}</b>
                   @endif

                   @if(!is_nullx($page_top_det->ram_type))
                   <h6 style="font-size: 13px;">{{$page_top_det->ram_type}}</h6>
                   @endif
                @endif
                </div>
                <div class="col-md-3 col-xs-12 hide-proddet"  style=" border-left: 1px solid white;">
                @if(!is_nullx($page_top_det->bat_size) || !is_nullx($page_top_det->bat_type))
                   <img src="{{asset('assets/main/images/icon/battery.png')}}" style="padding-bottom:8px; padding-top:6px;">
                   @if(!is_nullx($page_top_det->bat_size))
                   <b style="font-size: 18px;">{{$page_top_det->bat_size}}</b>
                   @endif

                   @if(!is_nullx($page_top_det->bat_type))
                   <h6 style="font-size: 13px;">{{$page_top_det->bat_type}}</h6>
                   @endif
                @endif
                </div>
            </div>
    </div>
    
    <div class="bgwht"></div>
    <div class="bgwht"></div>
    <div class="bgwht"></div>
    <div class="bgwht"></div>
    <div class="prod-bot" align="center">
        <div class="row">
            <div class="col-6 show-proddet">
                @if(!is_nullx($page_top_det->disp_size) || !is_nullx($page_top_det->disp_res))
                   <img src="{{asset('assets/main/images/icon/touch.png')}}" style="padding-bottom:8px; padding-top:6px;">
                   @if(!is_nullx($page_top_det->disp_size))
                   <b style="font-size: 18px;">{{$page_top_det->disp_size}}</b>
                   @endif

                   @if(!is_nullx($page_top_det->disp_res))
                   <h6 style="font-size: 13px;">{{$page_top_det->disp_res}}</h6>
                   @endif
                @endif           
            </div>
            
            <div class="col-6 show-proddet">
                @if(!is_nullx($page_top_det->cam_size) || !is_nullx($page_top_det->cam_res))
                   <img src="{{asset('assets/main/images/icon/camera.png')}}" style="padding-bottom:8px; padding-top:6px;">
                   @if(!is_nullx($page_top_det->cam_size))
                   <b style="font-size: 18px;">{{$page_top_det->cam_size}}</b>
                   @endif

                   @if(!is_nullx($page_top_det->cam_res))
                   <h6 style="font-size: 13px;">{{$page_top_det->cam_res}}</h6>
                   @endif
                @endif             
            </div>
        </div>
        
        <div class="row">
            <div class="col-6 show-proddet">
                @if(!is_nullx($page_top_det->ram_size) || !is_nullx($page_top_det->ram_type))
                   <img src="{{asset('assets/main/images/icon/ram.png')}}" style="padding-bottom:8px; padding-top:6px;">
                   @if(!is_nullx($page_top_det->ram_size))
                   <b style="font-size: 18px;">{{$page_top_det->ram_size}}</b>
                   @endif

                   @if(!is_nullx($page_top_det->ram_type))
                   <h6 style="font-size: 13px;">{{$page_top_det->ram_type}}</h6>
                   @endif
                @endif          
            </div>
            
            <div class="col-6 show-proddet">
                @if(!is_nullx($page_top_det->bat_size) || !is_nullx($page_top_det->bat_type))
                   <img src="{{asset('assets/main/images/icon/battery.png')}}" style="padding-bottom:8px; padding-top:6px;">
                   @if(!is_nullx($page_top_det->bat_size))
                   <b style="font-size: 18px;">{{$page_top_det->bat_size}}</b>
                   @endif

                   @if(!is_nullx($page_top_det->bat_type))
                   <h6 style="font-size: 13px;">{{$page_top_det->bat_type}}</h6>
                   @endif
                @endif           
            </div>
        </div>
    </div>
    <br/>
    <?php
    $lccount = launch_count($id);
    $lc = launch_det($id);
    ?>
    <div class="table-responsive">
        <table class="table" style="background-color:#fafafa; width:100%">
        @if($lccount>0)
        <?php $lcc = 0; ?>
            <th style="font-size: 18px; color: #d50000;">Launch</th>
            @if(!is_nullx($lc->announced))
                <?php $lcc++; ?>
            <tr>
                @if($lccount == $lcc)
                <td id="end-td"><b>Announced</b></td>
                <td id="end-td">{{$lc->announced}}</td>
                @else
                <td><b>Announced</b></td>
                <td>{{$lc->announced}}</td>
                @endif
            </tr>
            @endif
            @if(!is_nullx($lc->status))
                <?php $lcc++; ?>
            <tr>
                @if($lccount == $lcc)
                <td id="end-td"><b>Status</b></td>
                <td id="end-td">{{$lc->status}}</td>
                @else
                <td><b>Status</b></td>
                <td>{{$lc->status}}</td>
                @endif
            </tr>
            @endif
        @endif

        <?php
        $bcount = body_count($id);
        $bd = body_det($id);
        ?>

        @if($bcount>0)
        <?php $bcc=0; ?>
        <th style="font-size: 18px; color: #d50000;">Body</th>
        @if(!is_nullx($bd->dimension))
            <?php $bcc++; ?>
            <tr>
                @if($bcount==$bcc)
                <td id="end-td"><b>Dimension</b></td>
                <td id="end-td">{{$bd->dimension}}</td>
                @else
                <td><b>Dimension</b></td>
                <td>{{$bd->dimension}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($bd->weight))
            <?php $bcc++; ?>
            <tr>
                @if($bcount==$bcc)
                <td id="end-td"><b>Weight</b></td>
                <td id="end-td">{{$bd->weight}}</td>
                @else
                <td><b>Weight</b></td>
                <td>{{$bd->weight}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($bd->build))
            <?php $bcc++; ?>
            <tr>
                @if($bcount==$bcc)
                <td id="end-td"><b>Build</b></td>
                <td id="end-td">{{$bd->build}}</td>
                @else
                <td><b>Build</b></td>
                <td>{{$bd->build}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($bd->sim))
            <?php $bcc++; ?>
            <tr>
                @if($bcount==$bcc)
                <td id="end-td"><b>Sim</b></td>
                <td id="end-td">{{$bd->sim}}</td>
                @else
                <td><b>Sim</b></td>
                <td>{{$bd->sim}}</td>
                @endif
            </tr>
        @endif
        @if(!is_nullx($bd->sim2))
            <?php $bcc++; ?>
            <tr>
                @if($bcount==$bcc)
                <td id="end-td"></td>
                <td id="end-td">{{$bd->sim2}}</td>
                @else
                <td></td>
                <td>{{$bd->sim2}}</td>
                @endif
            </tr>
        @endif
        @if(!is_nullx($bd->sim3))
            <?php $bcc++; ?>
            <tr>
                @if($bcount==$bcc)
                <td id="end-td"></td>
                <td id="end-td">{{$bd->sim3}}</td>
                @else
                <td></td>
                <td>{{$bd->sim3}}</td>
                @endif
            </tr>
        @endif
        @endif

        <?php
        $dcount = display_count($id);
        $ds = display_det($id);
        ?>

        @if($dcount>0)
        <?php $dcc=0; ?>
        <th style="font-size: 18px; color: #d50000;">Display</th>
        @if(!is_nullx($ds->type))
            <?php $dcc++; ?>
            <tr>
                @if($dcount==$dcc)
                <td id="end-td"><b>Type</b></td>
                <td id="end-td">{{$ds->type}}</td>
                @else
                <td><b>Type</b></td>
                <td>{{$ds->type}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($ds->size))
            <?php $dcc++; ?>
            <tr>
                @if($dcount==$dcc)
                <td id="end-td"><b>Size</b></td>
                <td id="end-td">{{$ds->size}}</td>
                @else
                <td><b>Size</b></td>
                <td>{{$ds->size}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($ds->resolution))
            <?php $dcc++; ?>
            <tr>
                @if($dcount==$dcc)
                <td id="end-td"><b>Resolution</b></td>
                <td id="end-td">{{$ds->resolution}}</td>
                @else
                <td><b>Resolution</b></td>
                <td>{{$ds->resolution}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($ds->prot1))
            <?php $dcc++; ?>
            <tr>
                @if($dcount==$dcc)
                <td id="end-td"><b>Protection</b></td>
                <td id="end-td">{{$ds->prot1}}</td>
                @else
                <td><b>Protection</b></td>
                <td>{{$ds->prot1}}</td>
                @endif
            </tr>
        @endif
        
        @if(!is_nullx($ds->prot2))
            <?php $dcc++; ?>
            <tr>
                @if($dcount==$dcc)
                <td id="end-td"><b></b></td>
                <td id="end-td">{{$ds->prot2}}</td>
                @else
                <td><b></b></td>
                <td>{{$ds->prot2}}</td>
                @endif
            </tr>
        @endif
        @endif

        <?php
        $pcount = platform_count($id);
        $pt = platform_det($id);
        ?>
        @if($pcount>0)
        <?php $pcc=0; ?>
        <th style="font-size: 18px; color: #d50000;">Platform</th>
        @if(!is_nullx($pt->os))
            <?php $pcc++; ?>
            <tr>
                @if($pcount==$pcc)
                <td id="end-td"><b>OS</b></td>
                <td id="end-td">{{$pt->os}}</td>
                @else
                <td><b>OS</b></td>
                <td>{{$pt->os}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($pt->chipset))
            <?php $pcc++; ?>
            <tr>
                @if($pcount==$pcc)
                <td id="end-td"><b>Chipset</b></td>
                <td id="end-td">{{$pt->chipset}}</td>
                @else
                <td><b>Chipset</b></td>
                <td>{{$pt->chipset}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($pt->chip2))
            <?php $pcc++; ?>
            <tr>
                @if($pcount==$pcc)
                <td id="end-td"></td>
                <td id="end-td">{{$pt->chip2}}</td>
                @else
                <td></td>
                <td>{{$pt->chip2}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($pt->cpu))
            <?php $pcc++; ?>
            <tr>
                @if($pcount==$pcc)
                <td id="end-td"><b>CPU</b></td>
                <td id="end-td">{{$pt->cpu}}</td>
                @else
                <td><b>CPU</b></td>
                <td>{{$pt->cpu}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($pt->cpu2))
            <?php $pcc++; ?>
            <tr>
                @if($pcount==$pcc)
                <td id="end-td"></td>
                <td id="end-td">{{$pt->cpu2}}</td>
                @else
                <td></td>
                <td>{{$pt->cpu2}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($pt->gpu))
            <?php $pcc++; ?>
            <tr>
                @if($pcount==$pcc)
                <td id="end-td"><b>GPU</b></td>
                <td id="end-td">{{$pt->gpu}}</td>
                @else
                <td><b>GPU</b></td>
                <td>{{$pt->gpu}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($pt->gpu2))
            <?php $pcc++; ?>
            <tr>
                @if($pcount==$pcc)
                <td id="end-td"></td>
                <td id="end-td">{{$pt->gpu2}}</td>
                @else
                <td></td>
                <td>{{$pt->gpu2}}</td>
                @endif
            </tr>
        @endif
        @endif

        <?php
        $mcount = memory_count($id);
        $mt = memory_det($id);
        ?>
        @if($mcount>0)
        <?php $mcc=0; ?>
        <th style="font-size: 18px; color: #d50000;">Memory</th>
        @if(!is_nullx($mt->card_slot))
            <?php $mcc++; ?>
            <tr>
                @if($mcount==$mcc)
                <td id="end-td"><b>Card Slot</b></td>
                <td id="end-td">{{$mt->card_slot}}</td>
                @else
                <td><b>Card Slot</b></td>
                <td>{{$mt->card_slot}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($mt->internal1))
            <?php $mcc++; ?>
            <tr>
                @if($mcount==$mcc)
                <td id="end-td"><b>Internal</b></td>
                <td id="end-td">{{$mt->internal1}}</td>
                @else
                <td><b>Internal</b></td>
                <td>{{$mt->internal1}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($mt->internal2))
            <?php $mcc++; ?>
            <tr>
                @if($mcount==$mcc)
                <td id="end-td"></td>
                <td id="end-td">{{$mt->internal2}}</td>
                @else
                <td></td>
                <td>{{$mt->internal2}}</td>
                @endif
            </tr>
        @endif
        @endif

        <?php
        $ccount = camera_count($id);
        $ct = camera_det($id);
        ?>
        @if($ccount>0)
        <?php $ccc=0; ?>
        <th style="font-size: 18px; color: #d50000;">Main Camera</th>
        @if(!is_nullx($ct->cam1))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>{{$ct->cam_num}}</b></td>
                <td id="end-td">{{$ct->cam1}}</td>
                @else
                <td><b>{{$ct->cam_num}}</b></td>
                <td>{{$ct->cam1}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($ct->cam2))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"></td>
                <td id="end-td">{{$ct->cam2}}</td>
                @else
                <td></td>
                <td>{{$ct->cam2}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($ct->cam3))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"></td>
                <td id="end-td">{{$ct->cam3}}</td>
                @else
                <td></td>
                <td>{{$ct->cam3}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($ct->cam4))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"></td>
                <td id="end-td">{{$ct->cam4}}</td>
                @else
                <td></td>
                <td>{{$ct->cam4}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($ct->cam5))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"></td>
                <td id="end-td">{{$ct->cam5}}</td>
                @else
                <td></td>
                <td>{{$ct->cam5}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($ct->cam6))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"></td>
                <td id="end-td">{{$ct->cam6}}</td>
                @else
                <td></td>
                <td>{{$ct->cam6}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($ct->features))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>Features</b></td>
                <td id="end-td">{{$ct->features}}</td>
                @else
                <td><b>Features</b></td>
                <td>{{$ct->features}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($ct->video))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>Video</b></td>
                <td id="end-td">{{$ct->video}}</td>
                @else
                <td><b>Video</b></td>
                <td>{{$ct->video}}</td>
                @endif
            </tr>
        @endif
        @endif

        <?php
        $ccount = selfcamera_count($id);
        $ct = selfcamera_det($id);
        ?>
        @if($ccount>0)
        <?php $ccc=0; ?>
        <th style="font-size: 18px; color: #d50000;">Selfie Camera</th>
        @if(!is_nullx($ct->cam1))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>{{$ct->cam_num}}</b></td>
                <td id="end-td">{{$ct->cam1}}</td>
                @else
                <td><b>{{$ct->cam_num}}</b></td>
                <td>{{$ct->cam1}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($ct->cam2))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"></td>
                <td id="end-td">{{$ct->cam2}}</td>
                @else
                <td></td>
                <td>{{$ct->cam2}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($ct->cam3))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"></td>
                <td id="end-td">{{$ct->cam3}}</td>
                @else
                <td></td>
                <td>{{$ct->cam3}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($ct->cam4))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"></td>
                <td id="end-td">{{$ct->cam4}}</td>
                @else
                <td></td>
                <td>{{$ct->cam4}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($ct->cam5))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"></td>
                <td id="end-td">{{$ct->cam5}}</td>
                @else
                <td></td>
                <td>{{$ct->cam5}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($ct->cam6))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"></td>
                <td id="end-td">{{$ct->cam6}}</td>
                @else
                <td></td>
                <td>{{$ct->cam6}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($ct->features))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>Features</b></td>
                <td id="end-td">{{$ct->features}}</td>
                @else
                <td><b>Features</b></td>
                <td>{{$ct->features}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($ct->video))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>Video</b></td>
                <td id="end-td">{{$ct->video}}</td>
                @else
                <td><b>Video</b></td>
                <td>{{$ct->video}}</td>
                @endif
            </tr>
        @endif
        @endif

        <?php
        $ccount = keyboard_count($id);
        $ct = keyboard_det($id);
        ?>
        @if($ccount>0)
        <?php $ccc=0; ?>
        <th style="font-size: 18px; color: #d50000;">Keyboard</th>
        @if(!is_nullx($ct->det1))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>Details</b></td>
                <td id="end-td">{{$ct->det1}}</td>
                @else
                <td><b>Details</b></td>
                <td>{{$ct->det1}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($ct->det1))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"></td>
                <td id="end-td">{{$ct->det2}}</td>
                @else
                <td></td>
                <td>{{$ct->det2}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($ct->det3))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"></td>
                <td id="end-td">{{$ct->det3}}</td>
                @else
                <td></td>
                <td>{{$ct->det3}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($ct->det4))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"></td>
                <td id="end-td">{{$ct->det4}}</td>
                @else
                <td></td>
                <td>{{$ct->det4}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($ct->det5))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"></td>
                <td id="end-td">{{$ct->det5}}</td>
                @else
                <td></td>
                <td>{{$ct->det5}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($ct->det6))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"></td>
                <td id="end-td">{{$ct->det6}}</td>
                @else
                <td></td>
                <td>{{$ct->det6}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($ct->det7))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"></td>
                <td id="end-td">{{$ct->det7}}</td>
                @else
                <td></td>
                <td>{{$ct->det7}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($ct->det8))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"></td>
                <td id="end-td">{{$ct->det8}}</td>
                @else
                <td></td>
                <td>{{$ct->det8}}</td>
                @endif
            </tr>
        @endif
        @endif

        <?php
        $ccount = keycaps_count($id);
        $ct = keycaps_det($id);
        ?>
        @if($ccount>0)
        <?php $ccc=0; ?>
        <th style="font-size: 18px; color: #d50000;">Keycaps</th>
        @if(!is_nullx($ct->types))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>Types</b></td>
                <td id="end-td">{{$ct->types}}</td>
                @else
                <td><b>Types</b></td>
                <td>{{$ct->types}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($ct->size))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>Size</b></td>
                <td id="end-td">{{$ct->size}}</td>
                @else
                <td><b>Size</b></td>
                <td>{{$ct->size}}</td>
                @endif
            </tr>
        @endif
        @endif

        <?php
        $ccount = keyswitch_count($id);
        $ct = keyswitch_det($id);
        ?>
        @if($ccount>0)
        <?php $ccc=0; ?>
        <th style="font-size: 18px; color: #d50000;">Keyswitch</th>
        @if(!is_nullx($ct->types))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>Types</b></td>
                <td id="end-td">{{$ct->types}}</td>
                @else
                <td><b>Types</b></td>
                <td>{{$ct->types}}</td>
                @endif
            </tr>
        @endif

        @if(!is_nullx($ct->size))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>Size</b></td>
                <td id="end-td">{{$ct->size}}</td>
                @else
                <td><b>Size</b></td>
                <td>{{$ct->size}}</td>
                @endif
            </tr>
        @endif
        @endif

        <?php
        $ccount = generalp_count($id);
        $ct = generalp_det($id);
        ?>
        @if($ccount>0)
        <?php $ccc=0; ?>
        <th style="font-size: 18px; color: #d50000;">General</th>
        @if(!is_nullx($ct->type))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>Type</b></td>
                <td id="end-td">{{$ct->type}}</td>
                @else
                <td><b>Type</b></td>
                <td>{{$ct->type}}</td>
                @endif
            </tr>
        @endif
        @if(!is_nullx($ct->unit))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>Unit</b></td>
                <td id="end-td">{{$ct->unit}}</td>
                @else
                <td><b>Unit</b></td>
                <td>{{$ct->unit}}</td>
                @endif
            </tr>
        @endif
        @if(!is_nullx($ct->magnet))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>Magnet</b></td>
                <td id="end-td">{{$ct->magnet}}</td>
                @else
                <td><b>Magnet</b></td>
                <td>{{$ct->magnet}}</td>
                @endif
            </tr>
        @endif
        @if(!is_nullx($ct->diaphragm))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>Diaphragm</b></td>
                <td id="end-td">{{$ct->diaphragm}}</td>
                @else
                <td><b>Diaphragm</b></td>
                <td>{{$ct->diaphragm}}</td>
                @endif
            </tr>
        @endif
        @if(!is_nullx($ct->fr))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>FR</b></td>
                <td id="end-td">{{$ct->fr}}</td>
                @else
                <td><b>FR</b></td>
                <td>{{$ct->fr}}</td>
                @endif
            </tr>
        @endif
        @if(!is_nullx($ct->fra))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>FR (Active Operation)</b></td>
                <td id="end-td">{{$ct->fra}}</td>
                @else
                <td><b>FR (Active Operation)</b></td>
                <td>{{$ct->fra}}</td>
                @endif
            </tr>
        @endif
        @if(!is_nullx($ct->frb))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>FR (BLUETOOTH)</b></td>
                <td id="end-td">{{$ct->frb}}</td>
                @else
                <td><b>FR (BLUETOOTH)</b></td>
                <td>{{$ct->frb}}</td>
                @endif
            </tr>
        @endif
        @if(!is_nullx($ct->sense))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>Sensitivites</b></td>
                <td id="end-td">{{$ct->sense}}</td>
                @else
                <td><b>Sensitivites</b></td>
                <td>{{$ct->sense}}</td>
                @endif
            </tr>
        @endif
        @if(!is_nullx($ct->cord))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>Cord Type</b></td>
                <td id="end-td">{{$ct->cord}}</td>
                @else
                <td><b>Cord Type</b></td>
                <td>{{$ct->cord}}</td>
                @endif
            </tr>
        @endif
        @if(!is_nullx($ct->length))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>Cord Length</b></td>
                <td id="end-td">{{$ct->length}}</td>
                @else
                <td><b>Cord Length</b></td>
                <td>{{$ct->length}}</td>
                @endif
            </tr>
        @endif
        @if(!is_nullx($ct->plug))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>Plug</b></td>
                <td id="end-td">{{$ct->plug}}</td>
                @else
                <td><b>Plug</b></td>
                <td>{{$ct->plug}}</td>
                @endif
            </tr>
        @endif
        @if(!is_nullx($ct->style))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>Wearing Style</b></td>
                <td id="end-td">{{$ct->style}}</td>
                @else
                <td><b>Wearing Style</b></td>
                <td>{{$ct->style}}</td>
                @endif
            </tr>
        @endif
        @if(!is_nullx($ct->nfc))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>NFC</b></td>
                <td id="end-td">{{$ct->nfc}}</td>
                @else
                <td><b>NFC</b></td>
                <td>{{$ct->nfc}}</td>
                @endif
            </tr>
        @endif
        @if(!is_nullx($ct->dsee))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>DSEE Extreme</b></td>
                <td id="end-td">{{$ct->dsee}}</td>
                @else
                <td><b>DSEE Extreme</b></td>
                <td>{{$ct->dsee}}</td>
                @endif
            </tr>
        @endif
        @if(!is_nullx($ct->passive))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>Passive Operation</b></td>
                <td id="end-td">{{$ct->passive}}</td>
                @else
                <td><b>Type</b></td>
                <td>{{$ct->passive}}</td>
                @endif
            </tr>
        @endif
        @endif
        
        <?php
        $ccount = battery_count($id);
        $ct = battery_det($id);
        ?>
        @if($ccount>0)
        <?php $ccc=0; ?>
        <th style="font-size: 18px; color: #d50000;">Battery</th>
        @if(!is_nullx($ct->type))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>Type</b></td>
                <td id="end-td">{{$ct->type}}</td>
                @else
                <td><b>Type</b></td>
                <td>{{$ct->type}}</td>
                @endif
            </tr>
        @endif
        @if(!is_nullx($ct->charging))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>Charging</b></td>
                <td id="end-td">{{$ct->charging}}</td>
                @else
                <td><b>Charging</b></td>
                <td>{{$ct->charging}}</td>
                @endif
            </tr>
        @endif
        @if(!is_nullx($ct->charging2))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"></td>
                <td id="end-td">{{$ct->charging2}}</td>
                @else
                <td></td>
                <td>{{$ct->charging2}}</td>
                @endif
            </tr>
        @endif
        @if(!is_nullx($ct->charging3))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"></td>
                <td id="end-td">{{$ct->charging3}}</td>
                @else
                <td></td>
                <td>{{$ct->charging3}}</td>
                @endif
            </tr>
        @endif
        @if(!is_nullx($ct->cont))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>Continuos Music</b></td>
                <td id="end-td">{{$ct->cont}}</td>
                @else
                <td><b>Continuos Music</b></td>
                <td>{{$ct->cont}}</td>
                @endif
            </tr>
        @endif
        @if(!is_nullx($ct->wait))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>Waiting Time</b></td>
                <td id="end-td">{{$ct->wait}}</td>
                @else
                <td><b>Waiting Time</b></td>
                <td>{{$ct->wait}}</td>
                @endif
            </tr>
        @endif
        @endif

        <?php
        $ccount = bluetooth_count($id);
        $ct = bluetooth_det($id);
        ?>
        @if($ccount>0)
        <?php $ccc=0; ?>
        <th style="font-size: 18px; color: #d50000;">Bluetooth</th>
        @if(!is_nullx($ct->version))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>Version</b></td>
                <td id="end-td">{{$ct->version}}</td>
                @else
                <td><b>Version</b></td>
                <td>{{$ct->version}}</td>
                @endif
            </tr>
        @endif
        @if(!is_nullx($ct->erange))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>Effective Range</b></td>
                <td id="end-td">{{$ct->erange}}</td>
                @else
                <td><b>Effective Range</b></td>
                <td>{{$ct->erange}}</td>
                @endif
            </tr>
        @endif
        @if(!is_nullx($ct->frange))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>Frequency Range</b></td>
                <td id="end-td">{{$ct->frange}}</td>
                @else
                <td><b>Frequency Range</b></td>
                <td>{{$ct->frange}}</td>
                @endif
            </tr>
        @endif
        @if(!is_nullx($ct->profile))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>Profile</b></td>
                <td id="end-td">{{$ct->profile}}</td>
                @else
                <td><b>Profile</b></td>
                <td>{{$ct->profile}}</td>
                @endif
            </tr>
        @endif
        @if(!is_nullx($ct->formats))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>Audio Formats</b></td>
                <td id="end-td">{{$ct->formats}}</td>
                @else
                <td><b>Audio Formats</b></td>
                <td>{{$ct->formats}}</td>
                @endif
            </tr>
        @endif
        @if(!is_nullx($ct->prot))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>Content Protection</b></td>
                <td id="end-td">{{$ct->prot}}</td>
                @else
                <td><b>Content Protection</b></td>
                <td>{{$ct->prot}}</td>
                @endif
            </tr>
        @endif
        @endif

        <?php
        $ccount = anc_count($id);
        $ct = anc_det($id);
        ?>
        @if($ccount>0)
        <?php $ccc=0; ?>
        <th style="font-size: 18px; color: #d50000;">ANC</th>
        @if(!is_nullx($ct->switch))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>On/Off Switch</b></td>
                <td id="end-td">{{$ct->switch}}</td>
                @else
                <td><b>On/Off Switch</b></td>
                <td>{{$ct->switch}}</td>
                @endif
            </tr>
        @endif
        @if(!is_nullx($ct->ncopt))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>NC Optimizer</b></td>
                <td id="end-td">{{$ct->ncopt}}</td>
                @else
                <td><b>NC Optimizer</b></td>
                <td>{{$ct->ncopt}}</td>
                @endif
            </tr>
        @endif
        @if(!is_nullx($ct->atm))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>Atmospheric</b></td>
                <td id="end-td">{{$ct->atm}}</td>
                @else
                <td><b>Atmospheric</b></td>
                <td>{{$ct->atm}}</td>
                @endif
            </tr>
        @endif
        @if(!is_nullx($ct->ambs))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>Ambient Sound</b></td>
                <td id="end-td">{{$ct->ambs}}</td>
                @else
                <td><b>Ambient Sound</b></td>
                <td>{{$ct->ambs}}</td>
                @endif
            </tr>
        @endif
        @if(!is_nullx($ct->qatt))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>Quick Attention</b></td>
                <td id="end-td">{{$ct->qatt}}</td>
                @else
                <td><b>Quick Attention</b></td>
                <td>{{$ct->qatt}}</td>
                @endif
            </tr>
        @endif
        @endif

        <?php
        $ccount = control_count($id);
        $ct = control_det($id);
        ?>
        @if($ccount>0)
        <?php $ccc=0; ?>
        <th style="font-size: 18px; color: #d50000;">Control</th>
        @if(!is_nullx($ct->control))
            <?php $ccc++; ?>
            <tr>
                @if($ccount==$ccc)
                <td id="end-td"><b>Volume Control</b></td>
                <td id="end-td">{{$ct->control}}</td>
                @else
                <td><b>Volume Control</b></td>
                <td>{{$ct->control}}</td>
                @endif
            </tr>
        @endif
        @endif

<?php
$ccount = trans_count($id);
$ct = trans_det($id);
?>
@if($ccount>0)
<?php $ccc=0; ?>
<th style="font-size: 18px; color: #d50000;">Transmitters</th>
@if(!is_nullx($ct->input))
    <?php $ccc++; ?>
    <tr>
        @if($ccount==$ccc)
        <td id="end-td"><b>Input(s)</b></td>
        <td id="end-td">{{$ct->input}}</td>
        @else
        <td><b>Input(s)</b></td>
        <td>{{$ct->input}}</td>
        @endif
    </tr>
@endif
@endif

<?php
$ccount = sound_count($id);
$ct = sound_det($id);
?>
@if($ccount>0)
<?php $ccc=0; ?>
<th style="font-size: 18px; color: #d50000;">Sound</th>
@if(!is_nullx($ct->loudspeakers))
    <?php $ccc++; ?>
    <tr>
        @if($ccount==$ccc)
        <td id="end-td"><b>Loudspeakers</b></td>
        <td id="end-td">{{$ct->loudspeakers}}</td>
        @else
        <td><b>Loudspeakers</b></td>
        <td>{{$ct->loudspeakers}}</td>
        @endif
    </tr>
@endif
@if(!is_nullx($ct->jack))
    <?php $ccc++; ?>
    <tr>
        @if($ccount==$ccc)
        <td id="end-td"><b>3.5mm Jack</b></td>
        <td id="end-td">{{$ct->jack}}</td>
        @else
        <td><b>3.5mm Jack</b></td>
        <td>{{$ct->jack}}</td>
        @endif
    </tr>
@endif
@if(!is_nullx($ct->jack2))
    <?php $ccc++; ?>
    <tr>
        @if($ccount==$ccc)
        <td id="end-td"></td>
        <td id="end-td">{{$ct->jack2}}</td>
        @else
        <td></td>
        <td>{{$ct->jack2}}</td>
        @endif
    </tr>
@endif
@if(!is_nullx($ct->jack3))
    <?php $ccc++; ?>
    <tr>
        @if($ccount==$ccc)
        <td id="end-td"></td>
        <td id="end-td">{{$ct->jack3}}</td>
        @else
        <td></td>
        <td>{{$ct->jack3}}</td>
        @endif
    </tr>
@endif
@endif

<?php
$ccount = comms_count($id);
$ct = comms_det($id);
?>
@if($ccount>0)
<?php $ccc=0; ?>
<th style="font-size: 18px; color: #d50000;">Comms</th>
@if(!is_nullx($ct->wlan))
    <?php $ccc++; ?>
    <tr>
        @if($ccount==$ccc)
        <td id="end-td"><b>WLAN</b></td>
        <td id="end-td">{{$ct->wlan}}</td>
        @else
        <td><b>WLAN</b></td>
        <td>{{$ct->wlan}}</td>
        @endif
    </tr>
@endif
@if(!is_nullx($ct->bluetooth))
    <?php $ccc++; ?>
    <tr>
        @if($ccount==$ccc)
        <td id="end-td"><b>Bluetooth</b></td>
        <td id="end-td">{{$ct->bluetooth}}</td>
        @else
        <td><b>Bluetooth</b></td>
        <td>{{$ct->bluetooth}}</td>
        @endif
    </tr>
@endif
@if(!is_nullx($ct->gps))
    <?php $ccc++; ?>
    <tr>
        @if($ccount==$ccc)
        <td id="end-td"><b>GPS</b></td>
        <td id="end-td">{{$ct->gps}}</td>
        @else
        <td><b>GPS</b></td>
        <td>{{$ct->gps}}</td>
        @endif
    </tr>
@endif
@if(!is_nullx($ct->nfc))
    <?php $ccc++; ?>
    <tr>
        @if($ccount==$ccc)
        <td id="end-td"><b>NFC</b></td>
        <td id="end-td">{{$ct->nfc}}</td>
        @else
        <td><b>NFC</b></td>
        <td>{{$ct->nfc}}</td>
        @endif
    </tr>
@endif
@if(!is_nullx($ct->radio))
    <?php $ccc++; ?>
    <tr>
        @if($ccount==$ccc)
        <td id="end-td"><b>Radio</b></td>
        <td id="end-td">{{$ct->radio}}</td>
        @else
        <td><b>Radio</b></td>
        <td>{{$ct->radio}}</td>
        @endif
    </tr>
@endif
@if(!is_nullx($ct->usb))
    <?php $ccc++; ?>
    <tr>
        @if($ccount==$ccc)
        <td id="end-td"><b>USB</b></td>
        <td id="end-td">{{$ct->usb}}</td>
        @else
        <td><b>USB</b></td>
        <td>{{$ct->usb}}</td>
        @endif
    </tr>
@endif
@endif

<?php
$ccount = feat_count($id);
$ct = feat_det($id);
?>
@if($ccount>0)
<?php $ccc=0; ?>
<th style="font-size: 18px; color: #d50000;">Features</th>
@if(!is_nullx($ct->sensors))
    <?php $ccc++; ?>
    <tr>
        @if($ccount==$ccc)
        <td id="end-td"><b>Sensors</b></td>
        <td id="end-td">{{$ct->sensors}}</td>
        @else
        <td><b>Sensors</b></td>
        <td>{{$ct->sensors}}</td>
        @endif
    </tr>
@endif
@if(!is_nullx($ct->sen2))
    <?php $ccc++; ?>
    <tr>
        @if($ccount==$ccc)
        <td id="end-td"></td>
        <td id="end-td">{{$ct->sen2}}</td>
        @else
        <td></td>
        <td>{{$ct->sen2}}</td>
        @endif
    </tr>
@endif
@if(!is_nullx($ct->sen3))
    <?php $ccc++; ?>
    <tr>
        @if($ccount==$ccc)
        <td id="end-td"></td>
        <td id="end-td">{{$ct->sen3}}</td>
        @else
        <td></td>
        <td>{{$ct->sen3}}</td>
        @endif
    </tr>
@endif
@if(!is_nullx($ct->sen4))
    <?php $ccc++; ?>
    <tr>
        @if($ccount==$ccc)
        <td id="end-td"></td>
        <td id="end-td">{{$ct->sen4}}</td>
        @else
        <td></td>
        <td>{{$ct->sen4}}</td>
        @endif
    </tr>
@endif
@if(!is_nullx($ct->sen5))
    <?php $ccc++; ?>
    <tr>
        @if($ccount==$ccc)
        <td id="end-td"></td>
        <td id="end-td">{{$ct->sen5}}</td>
        @else
        <td></td>
        <td>{{$ct->sen5}}</td>
        @endif
    </tr>
@endif
@endif
<?php
$ccount = misc_count($id);
$ct = misc_det($id);
?>
@if($ccount>0)
<?php $ccc=0; ?>
<th style="font-size: 18px; color: #d50000;">MISC</th>
@if(!is_nullx($ct->color))
    <?php $ccc++; ?>
    <tr>
        @if($ccount==$ccc)
        <td id="end-td"><b>Colors</b></td>
        <td id="end-td">{{$ct->color}}</td>
        @else
        <td><b>Colors</b></td>
        <td>{{$ct->color}}</td>
        @endif
    </tr>
@endif
@if(!is_nullx($ct->models))
    <?php $ccc++; ?>
    <tr>
        @if($ccount==$ccc)
        <td id="end-td"><b>Models</b></td>
        <td id="end-td">{{$ct->models}}</td>
        @else
        <td><b>Models</b></td>
        <td>{{$ct->models}}</td>
        @endif
    </tr>
@endif
@endif
<?php
$ccount = net_count($id);
$ct = net_det($id);
?>
@if($ccount>0)
<?php $ccc=0; ?>
<th style="font-size: 18px; color: #d50000;">Network</th>
@if(!is_nullx($ct->technology))
    <?php $ccc++; ?>
    <tr>
        @if($ccount==$ccc)
        <td id="end-td"><b>Technology</b></td>
        <td id="end-td">{{$ct->technology}}</td>
        @else
        <td><b>Technology</b></td>
        <td>{{$ct->technology}}</td>
        @endif
    </tr>
@endif
@if(!is_nullx($ct->{'2g'}))
    <?php $ccc++; $dt = $ct->{'2g'}; ?>
    <tr>
        @if($ccount==$ccc)
        <td id="end-td"><b>2G</b></td>
        <td id="end-td">{{$dt}}</td>
        @else
        <td><b>2G</b></td>
        <td>{{$dt}}</td>
        @endif
    </tr>
@endif
@if(!is_nullx($ct->{'3g'}))
    <?php $ccc++; $dt = $ct->{'3g'}; ?>
    <tr>
        @if($ccount==$ccc)
        <td id="end-td"><b>3G</b></td>
        <td id="end-td">{{$dt}}</td>
        @else
        <td><b>3G</b></td>
        <td>{{$dt}}</td>
        @endif
    </tr>
@endif
@if(!is_nullx($ct->{'4g'}))
    <?php $ccc++; $dt = $ct->{'4g'}; ?>
    <tr>
        @if($ccount==$ccc)
        <td id="end-td"><b>4G</b></td>
        <td id="end-td">{{$dt}}</td>
        @else
        <td><b>4G</b></td>
        <td>{{$dt}}</td>
        @endif
    </tr>
@endif
@if(!is_nullx($ct->{'5g'}))
    <?php $ccc++; $dt = $ct->{'5g'}; ?>
    <tr>
        @if($ccount==$ccc)
        <td id="end-td"><b>5G</b></td>
        <td id="end-td">{{$dt}}</td>
        @else
        <td><b>5G</b></td>
        <td>{{$dt}}</td>
        @endif
    </tr>
@endif
@if(!is_nullx($ct->speed))
    <?php $ccc++; $dt = $ct->speed; ?>
    <tr>
        @if($ccount==$ccc)
        <td id="end-td"><b>Speed</b></td>
        <td id="end-td">{{$dt}}</td>
        @else
        <td><b>Speed</b></td>
        <td>{{$dt}}</td>
        @endif
    </tr>
@endif
@endif

<?php
$ccount = tst_count($id);
$ct = tst_det($id);
?>
@if($ccount>0)
<?php $ccc=0; ?>
<th style="font-size: 18px; color: #d50000;">Tests</th>
@if(!is_nullx($ct->perf1))
    <?php $ccc++; ?>
    <tr>
        @if($ccount==$ccc)
        <td id="end-td"><b>Performance</b></td>
        <td id="end-td">{{$ct->perf1}}</td>
        @else
        <td><b>Performance</b></td>
        <td>{{$ct->perf1}}</td>
        @endif
    </tr>
@endif
@if(!is_nullx($ct->perf2))
    <?php $ccc++; ?>
    <tr>
        @if($ccount==$ccc)
        <td id="end-td"></td>
        <td id="end-td">{{$ct->perf2}}</td>
        @else
        <td></td>
        <td>{{$ct->perf2}}</td>
        @endif
    </tr>
@endif
@if(!is_nullx($ct->perf3))
    <?php $ccc++; ?>
    <tr>
        @if($ccount==$ccc)
        <td id="end-td"></td>
        <td id="end-td">{{$ct->perf3}}</td>
        @else
        <td></td>
        <td>{{$ct->perf3}}</td>
        @endif
    </tr>
@endif
@if(!is_nullx($ct->perf4))
    <?php $ccc++; ?>
    <tr>
        @if($ccount==$ccc)
        <td id="end-td"></td>
        <td id="end-td">{{$ct->perf4}}</td>
        @else
        <td></td>
        <td>{{$ct->perf4}}</td>
        @endif
    </tr>
@endif
@if(!is_nullx($ct->perf5))
    <?php $ccc++; ?>
    <tr>
        @if($ccount==$ccc)
        <td id="end-td"></td>
        <td id="end-td">{{$ct->perf5}}</td>
        @else
        <td></td>
        <td>{{$ct->perf5}}</td>
        @endif
    </tr>
@endif
@if(!is_nullx($ct->display))
    <?php $ccc++; ?>
    <tr>
        @if($ccount==$ccc)
        <td id="end-td"><b>Display</b></td>
        <td id="end-td">{{$ct->display}}</td>
        @else
        <td><b>Display</b></td>
        <td>{{$ct->display}}</td>
        @endif
    </tr>
@endif
@if(!is_nullx($ct->cam))
    <?php $ccc++; ?>
    <tr>
        @if($ccount==$ccc)
        <td id="end-td"><b>Camera</b></td>
        <td id="end-td">{{$ct->cam}}</td>
        @else
        <td><b>Camera</b></td>
        <td>{{$ct->cam}}</td>
        @endif
    </tr>
@endif
@if(!is_nullx($ct->loud))
    <?php $ccc++; ?>
    <tr>
        @if($ccount==$ccc)
        <td id="end-td"><b>Loudspeakers</b></td>
        <td id="end-td">{{$ct->loud}}</td>
        @else
        <td><b>Loudspeakers</b></td>
        <td>{{$ct->loud}}</td>
        @endif
    </tr>
@endif
@if(!is_nullx($ct->batlife))
    <?php $ccc++; ?>
    <tr>
        @if($ccount==$ccc)
        <td id="end-td"><b>Battery Life</b></td>
        <td id="end-td">{{$ct->batlife}}</td>
        @else
        <td><b>Battery Life</b></td>
        <td>{{$ct->batlife}}</td>
        @endif
    </tr>
@endif
@endif

        </table>
    </div>
    <p align="center"><b>Disclaimer</b>: We can not guarantee that the information on this page is 100% correct. <a href="{{url('disclaimer')}}" style="color:red"><u>Read More</u></a></p>
   <div class="prod-bot2"></div>
   <br/>
   <?php
   $scount = shop_count($id);
   $sdata = shop_det($id);
   ?>

@if($scount>0)
   <b style="font-size:22px;" class="product-content"><a href="{{url('buy')}}">Buy Now</a></b><br/>
   <table class="table" style="background-color:#fafafa;">
   @if(!is_nullx($sdata->var1))
       <tr>
           @if(!is_nullx($sdata->shop11_prc))
           <td>{{$sdata->var1}}</td>
           <td><a href="{{$sdata->shop11_lnk}}"><b style="color:red;">{{$sdata->shop11_prc}}</b> <img src="{{asset('storage/shops/'.$sdata->shop11_img.'')}}" height="20px" width="110px"> </a></td>
           @endif

           @if(!is_nullx($sdata->shop22_prc))
           <td><a href="{{$sdata->shop12_lnk}}"><b style="color:red;">{{$sdata->shop12_prc}}</b> <img src="{{asset('storage/shops/'.$sdata->shop12_img.'')}}" height="20px" width="110px"> </a></td>
           @endif
       </tr>
    @endif

    @if(!is_nullx($sdata->var2))
        <tr>
           @if(!is_nullx($sdata->shop21_prc))
           <td>{{$sdata->var2}}</td>
           <td><a href="{{$sdata->shop21_lnk}}"><b style="color:red;">{{$sdata->shop21_prc}}</b> <img src="{{asset('storage/shops/'.$sdata->shop21_img.'')}}" height="20px" width="110px"> </a></td>
           @endif

           @if(!is_nullx($sdata->shop22_prc))
           <td><a href="{{$sdata->shop22_lnk}}"><b style="color:red;">{{$sdata->shop22_prc}}</b> <img src="{{asset('storage/shops/'.$sdata->shop22_img.'')}}" height="20px" width="110px"> </a></td>
           @endif
        </tr>
    @endif

    @if(!is_nullx($sdata->var3))
        <tr>
           @if(!is_nullx($sdata->shop31_prc))
           <td>{{$sdata->var3}}</td>
           <td><a href="{{$sdata->shop31_lnk}}"><b style="color:red;">{{$sdata->shop31_prc}}</b> <img src="{{asset('storage/shops/'.$sdata->shop31_img.'')}}" height="20px" width="110px"> </a></td>
           @endif

           @if(!is_nullx($sdata->shop32_prc))
           <td><a href="{{$sdata->shop32_lnk}}"><b style="color:red;">{{$sdata->shop32_prc}}</b> <img src="{{asset('storage/shops/'.$sdata->shop32_img.'')}}" height="20px" width="110px"> </a></td>
           @endif
        </tr>
    @endif
   
    @if(!is_nullx($sdata->var4))
        <tr>
           @if(!is_nullx($sdata->shop41_prc))
           <td>{{$sdata->var4}}</td>
           <td><a href="{{$sdata->shop41_lnk}}"><b style="color:red;">{{$sdata->shop41_prc}}</b> <img src="{{asset('storage/shops/'.$sdata->shop41_img.'')}}" height="20px" width="110px"> </a></td>
           @endif

           @if(!is_nullx($sdata->shop32_prc))
           <td><a href="{{$sdata->shop42_lnk}}"><b style="color:red;">{{$sdata->shop42_prc}}</b> <img src="{{asset('storage/shops/'.$sdata->shop42_img.'')}}" height="20px" width="110px"> </a></td>
           @endif
        </tr>
    @endif
   </table>
@endif
            <br/>
            <b style="font-size:22px;" class="product-content">Similarly Priced Devices</b><br/>
    <?php
        $brand = get_similar($id);
        ?>
        <div class="cat-blocks-container">
                    <div class="row">
                        @foreach($brand as $cat)
                        <div class="col-3">
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
                
                <br/>
                
            <?php 
            $vdata = video_data($id);
            ?>

@if(!is_nullx($vdata->video_id))
<div class="video-responsive">
    <iframe
    src="https://www.youtube.com/embed/{{$vdata->video_id}}"
    title="YouTube video player" 
    frameborder="0" 
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
    allowfullscreen></iframe>
</div>
@endif
   
</div>
</div>
</div>
@endsection