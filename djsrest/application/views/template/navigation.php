<header class="navbar navbar-bright navbar-fixed-top" role="banner">
	<div class="container">
		<div class="navbar-header">
		  <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <?php echo anchor(base_url(), 'DJs Bistro', 'class="navbar-brand"');?>
		  <!-- <a href="/" class="navbar-brand">DJ's Bistro</a> -->
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
			  <?php echo anchor('menu', 'Menu');?>
			</li>
			<li>
			  <?php echo anchor('orders', 'Take-out');?>
			</li>
			<li>
			  <?php echo anchor('feedback', 'Contact us');?>
			</li>
			</ul>
			<ul id="login_dropdown" class="nav navbar-nav navbar-right">       
				
				<?php if ($this->Login_model->is_logged_in()) { ?>	
							
				<li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		          <?php echo ucwords($this->session->userdata('full_name'));?><span class="caret"></span></a>
		          <ul class="dropdown-menu">
		          	<li><a href="<?php echo site_url('login/load_profile');?>">Profile</a></li>
		          	<li role="separator" class="divider"></li>
		          	<?php if($this->session->userdata('user_type') == 1) {?>
		            <li><?php echo anchor('admin', 'Site Management'); ?></li>
		            <?php } else {?>
		            <li><a href="#">Manage Orders</a></li>
		            <li><a href="#">Manage Reservations</a></li>
		            <?php }?>
		            <li><a href="#">Manage Account</a></li>		            
		            <li role="separator" class="divider"></li>
		            <li><a href="<?php echo site_url('login/logout/');?>">Logout <span class="glyphicon glyphicon-log-out"></span></a></li>
		          </ul>
		        </li>
				
				
				<?php } else { ?>	
					<li><a href="<?php echo site_url('login'); ?>">Login <span class="glyphicon glyphicon-log-in"></span></a></li>
				<?php }	?>				
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