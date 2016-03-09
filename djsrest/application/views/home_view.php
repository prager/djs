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
				<p></p>				
				<p>DJ's Bistro is a very unique. As soon as you came in the door, you are in a different place, different country and even a different
				continent. Europe, to be precise. However, what country? That really doesn't matter. You like German food? We got it. Austrian? 
				Yes, sure. Maybe even Czech? Of course! BTW, did you know that Czech Republic is the home of Pilsner and Budweiser?
				No? Now you know. We serve the true original Pilsner too, that is the Pilsner Urquel on tap. And what about the food? 
				Just come in to find out! 				
				</p>				
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