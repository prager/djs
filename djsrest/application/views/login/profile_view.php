<div class="col-md-9"><br>
	<h2>Profile</h2>
	<hr>
	<div class="panel panel-default" style="margin-bottom: 0px;">
		<div class="panel-heading">Contact Information</div>
		<div class="panel-body">
			<div class="form-group">
		    	<label for="fname" class="col-md-2 col-sm-2 col-xs-4 control-label">First Name</label>
		    	<div id="fname" class="col-lg-10 col-md-10 col-sm-10 col-xs-8">
		      		<p  style="padding:0px;" class="form-control-static"><?php echo $user['first_name'];?></p>
		    	</div>
		  	</div>
		  	<div class="form-group">
		    	<label for="lname" class="col-md-2 col-sm-2 col-xs-4 control-label">Last Name</label>
		    	<div id="lname" class="col-lg-10 col-md-10 col-sm-10 col-xs-8">
		      		<p  style="padding:0px;" class="form-control-static"><?php echo $user['last_name'];?></p>
		    	</div>
		  	</div>
		  	<div class="form-group">
		    	<label for="address" class="col-md-2 col-sm-2 col-xs-4 control-label">Address</label>
		    	<div id="address" class="col-lg-10 col-md-10 col-sm-10 col-xs-8">
		      		<p  style="padding:0px;" class="form-control-static"><?php echo $user['address'];?></p>
		    	</div>
		  	</div>
  			<div class="form-group">
		    	<label for="apt_num" class="col-md-2 col-sm-2 col-xs-4 control-label">Apt#</label>
		    	<div id="apt_num" class="col-lg-10 col-md-10 col-sm-10 col-xs-8">
		      		<p  style="padding:0px;" class="form-control-static"><?php echo !empty($user['apt_num']) ? $user['apt_num'] : 'N/A';?></p>
		    	</div>
		  	</div>
		  	<div class="form-group">
		    	<label for="state" class="col-md-2 col-sm-2 col-xs-4 control-label">State</label>
		    	<div id="State" class="col-lg-10 col-md-10 col-sm-10 col-xs-8">
		      		<p  style="padding:0px;" class="form-control-static"><?php echo $user['state'];?></p>
		    	</div>
		  	</div>
		  	<div class="form-group">
		    	<label for="zip" class="col-md-2 col-sm-2 col-xs-4 control-label">Zip Code</label>
		    	<div id="zip" class="col-lg-10 col-md-10 col-sm-10 col-xs-8">
		      		<p  style="padding:0px;" class="form-control-static"><?php echo $user['zip'];?></p>
		    	</div>
		  	</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">Login Information</div>
		<div class="panel-body">
			<div class="form-group">
		    	<label for="username" class="col-md-2 col-sm-2 col-xs-4 control-label">Username</label>
		    	<div id="username" class="col-lg-10 col-md-10 col-sm-10 col-xs-8">
		      		<p  style="padding:0px;" class="form-control-static"><?php echo $this->session->userdata('username');?></p>
		    	</div>
		  	</div>
		  	<div class="form-group">
		    	<label for="email" class="col-md-2 col-sm-2 col-xs-4 control-label">Email</label>
		    	<div id="email" class="col-lg-10 col-md-10 col-sm-10 col-xs-8">
		      		<p  style="padding:0px;" class="form-control-static"><?php echo $user['email'];?></p>
		    	</div>
		  	</div>
		  	<div class="form-group">
		    	<label for="role" class="col-md-2 col-sm-2 col-xs-4 control-label">Role</label>
		    	<div id="role" class="col-lg-10 col-md-10 col-sm-10 col-xs-8">
		      		<p  style="padding:0px;" class="form-control-static"><?php echo $user['user_type_string'];?></p>
		    	</div>
		  	</div>		  	
		</div>
		<div class="panel-footer" style="height:50px;">
	  		<a style="float:right;" class="btn btn-primary btn-sm" href="<?php echo site_url('orders/');?>" value="">Edit Profile</a>
	  	</div>
	</div><br>
</div>