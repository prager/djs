<header class="navbar navbar-bright navbar-fixed-top" role="banner">
		<div class="container">
		<div class="navbar-header">
		  <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a href="/" class="navbar-brand">DJ's Bistro</a>
		</div>
		<nav class="collapse navbar-collapse" role="navigation">
		  <ul class="nav navbar-nav">
			<li>
			  <?php echo anchor('home', 'Home');?>
			</li>
			<li>
			  <?php echo anchor('reservations', 'Reservations');?>
			</li>
			<li>
			  <a href="#">Menu</a>
			</li>
			<li>
			  <a href="#">Contact Us</a>
			</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li>
			  		<a href="<?php echo base_url() ;?>index.php/login">Login <span class="glyphicon glyphicon-log-in"></span></a>
				</li>
		  	</ul>

		</nav>
	  </div>
	</header>

<div id="masthead">  
	  <div class="container">
		<div class="row">
			<div class="col-md-7">
				<img id="brand" class="img-responsive" src="<?php echo base_url() ;?>/assets/img/Brand.png" alt="Logo">
			</div>
		</div> 
	  </div><!-- /cont -->
	</div>

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