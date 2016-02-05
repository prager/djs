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
                                <img class="img-responsive" src="/assets/img/outside.jpg" alt="">
                            </div>
						</div>
						<div class="item darkCyan" style="width: 400px height: 300px">
							<div>
                                <img class="img-responsive" src="/assets/img/barslide.jpg" alt="">
                            </div>
						</div>
						<div class="item darkCyan" style="width: 400px height: 300px">
							<div>
                                <img class="img-responsive" src="/assets/img/dinnerslide.jpg" alt="">
                            </div>
						</div>
						<div class="item darkCyan" style="width: 400px height: 300px">
							<div>
                                <img class="img-responsive" src="/assets/img/food1.jpg" alt="">
                            </div>
						</div>
						<div class="item darkCyan" style="width: 400px height: 300px">
							<div>
                                <img class="img-responsive" src="/assets/img/food2.jpg" alt="">
                            </div>
						</div>
						<div class="item darkCyan" style="width: 400px height: 300px">
							<div>
                                <img class="img-responsive" src="/assets/img/food3.jpg" alt="">
                            </div>
						</div>
					</div>
				</div>

				<h2 id="sec1">Content</h2>
				<p>Rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
					architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam
					voluptatem quia voluptas sit aspernatur aut odit aut.</p>
				<div class="row">
					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3>Hello.</h3>
							</div>
							<div class="panel-body">Lorem ipsum dolor sit amet, consectetur
								adipiscing elit. Duis pharetra varius quam sit amet vulputate.
								Quisque mauris augue, molestie tincidunt condimentum vitae, gravida
								a libero. Aenean sit amet felis dolor, in sagittis nisi. Sed ac
								orci quis tortor imperdiet venenatis. Duis elementum auctor
								accumsan. Aliquam in felis sit amet augue.</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3>Hello.</h3>
							</div>
							<div class="panel-body">Lorem ipsum dolor sit amet, consectetur
								adipiscing elit. Duis pharetra varius quam sit amet vulputate.
								Quisque mauris augue, molestie tincidunt condimentum vitae, gravida
								a libero. Aenean sit amet felis dolor, in sagittis nisi. Sed ac
								orci quis tortor imperdiet venenatis. Duis elementum auctor
								accumsan. Aliquam in felis sit amet augue.</div>
						</div>
					</div>
				</div>

				<hr>
				
				<h2 id="sec4">Reservations</h2>
				Sed ut perspiciatis unde omnis iste natus error sit voluptatem
				accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae
				ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
				explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut
				odit aut fugit, sed quia cor magni dolores eos qui ratione voluptatem
				sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor
				sit amet, consectetur, adipisci velit, sed quia non numquam eius modi
				tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
				Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis
				suscipit laboriosam, nisi ut
				<hr>

				<h2 id="sec2">Menu</h2>
				<p>Rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
					architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam
					voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
					cor magni dolores eos qui ratione voluptatem sequi nesciunt. Neque
					porro quisquam est, qui dolorem ipsum quia dolor sit amet,
					consectetur, adipisci velit, sed quia non numquam eius modi tempora
					incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut
					enim ad minima veniam, quis nostrum exercitationem ullam corporis
					suscipit laboriosam, nisi ut!</p>
				<div class="row">
					<div class="col-md-4">
						<img src="//placehold.it/300x300" class="img-responsive">
					</div>
					<div class="col-md-4">
						<img src="//placehold.it/300x300" class="img-responsive">
					</div>
					<div class="col-md-4">
						<img src="//placehold.it/300x300" class="img-responsive">
					</div>
				</div>

				<hr>

				<h2 id="sec3">Contact Us</h2>
				Images are responsive sed @mdo but sum are more fun peratis unde omnis
				iste natus error sit voluptatem accusantium doloremque laudantium,
				totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
				architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam
				voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
				cor magni dolores eos qui ratione voluptatem sequi nesciunt. Neque
				porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
				adipisci velit, sed quia non numquam eius modi tempora incidunt ut
				labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima
				veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam,
				nisi ut
				<hr>
				
			</div>
		</div>
	</div>
    <script src="/assets/js/custom.js"></script>
	
	<!-- javascript for carousel plugin -->
	<script src="/assets/js/owl.carousel.min.js"></script>

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