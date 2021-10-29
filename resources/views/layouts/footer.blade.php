<footer class="footer footer-2">
        	<div class="footer-middle" style="background-color:#000;">
	            <div class="container">
	            	<div class="row">
	            		<div class="col">
	            			<div class="widget widget-about" align="center">
	            				<a href="{{url('home')}}"><img src="{{asset('assets/main/images/logo.png')}}" alt="Footer Logo" width="160" height="120"></a>
	            				<a href="{{url('news')}}" class="invis" style="color:white; font-size: 14px;">News</a> 
								<sp class="invis">|</sp> <a href="{{url('videos')}}" class="invis" style="color:white; font-size: 14px;">Videos</a>
								<sp class="invis">|</sp> <a href="{{url('buy')}}" class="invis" style="color:white; font-size: 14px;">Buy Now</a>
								<sp class="invis">|</sp> <a href="{{url('contact')}}" style="color:white; font-size: 14px;">Contact Us</a>
								| <a href="{{url('policy')}}" style="color:white; font-size: 14px;">Privacy Policy</a>
								| <a href="{{url('tos')}}" style="color:white; font-size: 14px;">Terms of Usage</a>
	            			</div><!-- End .widget about-widget -->
	            		</div><!-- End .col-sm-12 col-lg-3 -->
	            	</div><!-- End .row -->
	            </div><!-- End .container -->
	        </div><!-- End .footer-middle -->

	        <div class="footer-bottom"  style="background-color:#000; color:#fff;">
	        	<div class="container">
	        		<p class="footer-copyright" style="color:#fff;">Copyright © 2021 {{$data[0]}}. All Rights Reserved.</p><!-- End .footer-copyright -->

	        		<div class="social-icons social-icons-color">
	        			<span class="social-label">Social Media</span>
    					<a href="{{$data[5]}}" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
    					<a href="{{$data[7]}}" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
    					<a href="{{$data[6]}}" class="social-icon social-instagram" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
    					<a href="{{$data[4]}}" class="social-icon social-youtube" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
    				</div><!-- End .soial-icons -->
	        	</div><!-- End .container -->
	        </div><!-- End .footer-bottom -->
        </footer><!-- End .footer -->