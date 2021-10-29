@extends('layouts.main')

@section('content')
<div class="container" align="center">
    <div class="p-2">
        <h2 class="title text-center">Contact Us</h2><!-- End .title text-center -->
    </div>
    
    <div class="row">
                		<div class="col-lg-6 mb-2 mb-lg-0">
                			<div class="row">
                				<div class="col-sm-7">
                					<div class="contact-info">
<div class="text-justify">
{!! $data[10] !!}
</div>                						
<br/>
                			<h2 class="title mb-1">Contact Information</h2><!-- End .title mb-2 -->
                						<ul class="contact-list">
                						    <li>
                								<a href="tel:{{$data[8]}}"><i class="icon-phone" style="color:red;"></i> Phone: {{$data[8]}}</a>
                								
                							</li>
                							<li>
                								<a href="mailto:{{$data[9]}}"><i class="icon-envelope" style="color:red;"></i> Email: {{$data[9]}}</a>
                								
                							</li>
                							<li>
                							<a href="{{$data[4]}}" target="_blank"><i class="icon-youtube"></i> Youtube</a>
	                						</li>
                							<li>
                								<a href="{{$data[5]}}" target="_blank"><i class="icon-facebook" style="color:blue;"></i> Facebook</a>
                							</li>
                							<li>
                								<a href="{{$data[6]}}" target="_blank"><i class="icon-instagram" style="color:pink;"></i> Instagram</a>
                								
                							</li>
                						</ul><!-- End .contact-list -->
                					</div><!-- End .contact-info -->
                				</div><!-- End .col-sm-7 -->
                			</div><!-- End .row -->
                		</div><!-- End .col-lg-6 -->
                		<div class="col-lg-6">
                			<h2 class="title mb-1">Got Any Questions?</h2><!-- End .title mb-2 -->

                			<form action="{{route('mailsend')}}" method="post" class="contact-form mb-3">
                			    @csrf
              @if(Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            <br/><br/>
              @endif
             
                				<div class="row">
                					<div class="col-sm-6">
                                        <label for="cname" class="sr-only">Name</label>
                						<input type="text" class="form-control" name="name" placeholder="Name *" required>
                					</div><!-- End .col-sm-6 -->

                					<div class="col-sm-6">
                                        <label for="cemail" class="sr-only">Email</label>
                						<input type="email" class="form-control" name="email" placeholder="Email *" required>
                					</div><!-- End .col-sm-6 -->
                				</div><!-- End .row -->

                				<div class="row">
                					<div class="col-sm-6">
                                        <label for="cphone" class="sr-only">Phone</label>
                						<input type="tel" class="form-control" name="phone" placeholder="Phone">
                					</div><!-- End .col-sm-6 -->

                					<div class="col-sm-6">
                                        <label for="csubject" class="sr-only">Subject</label>
                						<input type="text" class="form-control" name="subject" placeholder="Subject">
                					</div><!-- End .col-sm-6 -->
                				</div><!-- End .row -->

                                <label for="cmessage" class="sr-only">Message</label>
                				<textarea class="form-control" cols="30" rows="4" name="msg" required placeholder="Message *"></textarea>

                				<button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                					<span>SUBMIT</span>
            						<i class="icon-long-arrow-right"></i>
                				</button>
                			</form><!-- End .contact-form -->
                		</div><!-- End .col-lg-6 -->
                	</div><!-- End .row -->

</div>
@endsection