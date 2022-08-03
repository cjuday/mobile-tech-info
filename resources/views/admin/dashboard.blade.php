@extends('layouts.admin')
@section('title','Dashboard')
@section('content')
<!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<br/>
<h3>Site Statistics</h3>
<br/>
<div class="row">
<div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Website Visits</div>
                            <?php $tpv=0; ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            @foreach($data[8] as $dt)
                            <?php $tpv += $dt['pageViews']; ?>
                            @endforeach
                            {{$tpv}}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Number of Pages</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{$data[9]}}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Mobile Device Visiots</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{number_format($data[10],2)}}%
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-mobile fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Desktop Device Visitors</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{number_format($data[11],2)}}%
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br/>
<h3>Users Statstics</h3>
<br/>
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Visitors Today</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            @foreach($data[0] as $dt)
                            {{$dt['visitors']}}
                            @endforeach
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Users This Week</div>
                            <?php $tots = 0; ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            @foreach($data[1] as $dt)
                            <?php $tots += $dt['visitors']; ?>
                            @endforeach
                            {{$tots}}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Users This Month</div>
                            <?php $tots = 0; ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            @foreach($data[2] as $dt)
                            <?php $tots += $dt['visitors']; ?>
                            @endforeach
                            {{$tots}}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Users This Year</div>
                            <?php $tots = 0; ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            @foreach($data[3] as $dt)
                            <?php $tots += $dt['visitors']; ?>
                            @endforeach
                            {{$tots}}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br/>
<h3>Sessions</h3>
<br/>
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Sessions Today</div>
                            <?php $dtx = 0; ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            @foreach($data[4] as $dt)
                            <?php $dtx += $dt['sessions']; ?>
                            @endforeach
                            {{$dtx}}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Sessions Last Week</div>
                            <?php $dtx = 0; ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            @foreach($data[5] as $dt)
                            <?php $dtx += $dt['sessions']; ?>
                            @endforeach
                            {{$dtx}}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Sessions Last Month</div>
                            <?php $dtx = 0; ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            @foreach($data[6] as $dt)
                            <?php $dtx += $dt['sessions']; ?>
                            @endforeach
                            {{$dtx}}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Sessions Last Year</div>
                            <?php $dtx = 0; ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            @foreach($data[7] as $dt)
                            <?php $dtx += $dt['sessions']; ?>
                            @endforeach
                            {{$dtx}}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<!-- /.container-fluid -->
@endsection