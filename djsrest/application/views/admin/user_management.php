<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title; ?></title>
    
    <!-- Bootstrap -->
    <link href="<?php echo base_url() ;?>/assets/css/bootstrap.min.css" rel="stylesheet">
    
    <!--  jQuery -->
	
	<!-- custom css -->
    <link href="<?php echo base_url() ;?>/assets/css/custom.css" type="text/css" rel="stylesheet">
  
    <!-- Include all compiled plugins (below), or include individual files as needed -->    
    <script src="<?php echo base_url() ;?>/assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url() ;?>/assets/js/custom.js"></script>
  
	<!-- javascript for carousel plugin -->
	<script src="<?php echo base_url() ;?>/assets/js/owl.carousel.min.js"></script>

    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<!-- Head -->

<header class="navbar navbar-bright navbar-fixed-top" role="banner">
	<div class="container-fluid">
		<div class="navbar-header">
		  <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <?php echo anchor(base_url(), 'DJs Bistro', 'class="navbar-brand"');?>
		</div>
		<nav class="collapse navbar-collapse" role="navigation">
			<ul class="nav navbar-nav navbar-right">
				<li>
			  		<a href="<?php echo base_url() ;?>index.php/login">Login <span class="glyphicon glyphicon-log-in"></span></a>
				</li>
			</ul>			
		</nav>
	</div>	
</header>

<div class="container-fluid">
	<div class="row">
		<!-- left side navigation bar -->
		<div class="col-md-2" id="leftCol">  
			<div class="navbar-header">
			  <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			</div> 
			<nav class="collapse navbar-collapse" role="navigation">           
			<ul class="nav nav-stacked" id="sidebar">
			  	<li>
				  <?php echo anchor('admin/user_management', 'User Management');?>
				</li>
				<li>
				  <?php echo anchor('admin/customer_management', 'Customers Management');?>
				</li>
				<li>
				  <?php echo anchor('admin/employee_management', 'Employee Management');?>
				</li>			
				<li>
				  <?php echo anchor('admin/reservation_management', 'Reservation Management');?>
				</li>
				<li>
				  <?php echo anchor('admin/credit_card_management', 'Credit Card Management');?>
				</li>
				<li>
				  <?php echo anchor('admin/user_group_management', 'User Group Management');?>
				</li>
				<li>
				  <?php echo anchor('admin/login_management', 'Login Management');?>
				</li>
			</ul>
			</nav>             
		</div>
		<!-- page content -->
		<!-- Loading the css -->
		<?php 
		foreach($css_files as $file): ?>
			<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
		<?php endforeach; ?>
		
		<!-- page content -->
		<div class="col-md-9">
			<div class="row">
				<div class="col-md-12">
					<h2>User Management</h2>
					<hr class="col-md-6">
				</div>		
			</div>
			<div class="row">
				<div class="col-md-12">
					<div>
						<?php echo $output; ?>
					</div><br>
				</div>		
			</div>
		</div>
		<!-- page content end -->
		  
		<!-- loading the javascripts -->
		<?php foreach($js_files as $file): ?>
			<script src="<?php echo $file; ?>"></script>
		<?php endforeach; ?>
		<!-- page content -->
	</div>
</div>
</body>
</html>
