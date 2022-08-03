@extends('layouts.admin')
@section('title','General Settings')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">General Settings</h1>
</div>
<form class="user" method="post" action="{{ route('admin.general_update') }}">
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
        * <b>Website Title</b><br/>
        <input type="text" name="title" value="{{$data[0]}}" class="form-control">
    </div>
    
    <div class="col-lg-6">
        * <b>Meta Title</b><br/>
        <input type="text" name="metatitle" value="{{$data[1]}}" class="form-control">
    </div>
</div>

<br/>

<div class="row">
    <div class="col-lg-6">
        * <b>Meta Description</b><br/>
        <input type="text" name="metades" value="{{$data[2]}}" class="form-control">
    </div>
    
    <div class="col-lg-6">
        * <b>Meta Keywords</b><br/>
        <input type="text" name="metakey" value="{{$data[3]}}" class="form-control">
    </div>
</div>

<br/>

<div class="row">
    <div class="col-lg-6">
        * <b>Youtube Channel Link</b><br/>
        <input type="text" name="youtube" value="{{$data[4]}}" class="form-control">
    </div>

    <div class="col-lg-6">
        * <b>Facebook Page Link</b><br/>
        <input type="text" name="facebook" value="{{$data[5]}}" class="form-control">
    </div>
</div>

<br/>

<div class="row">
    <div class="col-lg-6">
        * <b>Instragram Profile Link</b><br/>
        <input type="text" name="instagram" value="{{$data[6]}}" class="form-control">
    </div>

    <div class="col-lg-6">
        * <b>Twitter Profile Link</b><br/>
        <input type="text" name="twitter" value="{{$data[7]}}" class="form-control">
    </div>
</div>

<br/>

<div class="row">
    <div class="col-lg-6">
        * <b>Phone Number</b><br/>
        <input type="text" name="phone" value="{{$data[8]}}" class="form-control">
    </div>

    <div class="col-lg-6">
        * <b>Email</b><br/>
        <input type="text" name="email" value="{{$data[9]}}" class="form-control">
    </div>
</div>

<br/>

<div class="row">
    * <b>Contact Page</b><br/>
    <textarea name="contact" class="form-control" rows="15">{{$data[10]}}</textarea>
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