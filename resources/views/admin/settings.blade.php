@extends('layouts.admin')
@section('title','Profile Settings')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profile Settings</h1>
</div>
<form class="user" method="post" action="{{ route('admin.profile_update') }}">
@csrf
@if(Session::get('fail'))
<div class="alert alert-danger">
{{ Session::get('fail') }}
</div>
@elseif(Session::get('success'))
<div class="alert alert-success">
{{ Session::get('success') }}
</div>
@endif
<div class="row">
    <div class="col-lg-6">
        * <b>Full Name</b><br/>
        <input type="text" name="name" value="{{$data->name}}" class="form-control">
    </div>
    
    <div class="col-lg-6">
        * <b>Meta Title</b><br/>
        <input type="text" name="email" value="{{$data->email}}" class="form-control">
    </div>
</div>

<br/>

<div class="row">
    <div class="col-lg-6">
        * <b>Password</b><br/>
        <input type="password" name="pass" Placeholder="Unchanged" class="form-control">
    </div>
    
    <div class="col-lg-6">
        * <b>Confirm Password</b><br/>
        <input type="password" name="pass2" Placeholder="Unchanged" class="form-control">
    </div>
</div>

<br/>

<div class="row">
    <div class="col-lg-3">
    <button type="submit" class="btn btn-primary btn-user btn-block">Update</button>
    </div>
</div>
</form>
</div>
<br/>
@endsection