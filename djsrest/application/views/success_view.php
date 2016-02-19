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
				<h2 id="sec0">Success!</h2>
				<hr class="col-md-12">
				
				<!-- carousel starts here -->
				
				<p></p>				
				<?php echo $message; ?>			
				<p>&nbsp;</p>
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