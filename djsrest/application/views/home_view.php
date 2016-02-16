<div class="container">
			<div class="row">
			<!-- left side navigation bar -->
			<div class="col-md-3" id="leftCol">              
				<ul class="nav nav-stacked" id="sidebar">
				  <li><?php echo anchor('home', 'Home');?></li>
				  <li><?php echo anchor('reservations', 'Reservations');?></li>
				  <li><a href="#sec2">Menu</a></li>
				  <li><a href="#sec3">Contact Us</a></li>
				</ul>              
			</div>

<!-- content of the body -->
			<div class="col-md-9" id="mainCol">
				<br>
				<h2 id="sec0">Welcome to DJ's Bistro</h2>
				<hr class="col-md-12">
				
				<!-- carousel starts here -->
				<div class="span12">
					<div id="slideshow" class="owl-carousel">
						<div class="item darkCyan" style="width: 400px height: 300px;">
							<div>
                                <img class="img-responsive" src="<?php echo base_url() ;?>/assets/img/outside.jpg" alt="">
                            </div>
						</div>
						<div class="item darkCyan" style="width: 400px height: 300px">
							<div>
                                <img class="img-responsive" src="<?php echo base_url() ;?>/assets/img/barslide.jpg" alt="">
                            </div>
						</div>
						<div class="item darkCyan" style="width: 400px height: 300px">
							<div>
                                <img class="img-responsive" src="<?php echo base_url() ;?>/assets/img/dinnerslide.jpg" alt="">
                            </div>
						</div>
						<div class="item darkCyan" style="width: 400px height: 300px">
							<div>
                                <img class="img-responsive" src="<?php echo base_url() ;?>/assets/img/food1.jpg" alt="">
                            </div>
						</div>
						<div class="item darkCyan" style="width: 400px height: 300px">
							<div>
                                <img class="img-responsive" src="<?php echo base_url() ;?>/assets/img/food2.jpg" alt="">
                            </div>
						</div>
						<div class="item darkCyan" style="width: 400px height: 300px">
							<div>
                                <img class="img-responsive" src="<?php echo base_url() ;?>/assets/img/food3.jpg" alt="">
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    <script src="<?php echo base_url() ;?>/assets/js/custom.js"></script>
	
	<!-- javascript for carousel plugin -->
	<script src="<?php echo base_url() ;?>/assets/js/owl.carousel.min.js"></script>

	<!-- calling the carousel plugin -->
	<script>	
	$(document).ready(function($) {
      $("#slideshow").owlCarousel({
		autoPlay: 3000, //Set AutoPlay to 3 seconds
 
		items : 4,
		itemsDesktop : [1199,3],
		itemsDesktopSmall : [979,3]
	  });
    });
	</script>