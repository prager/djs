<div class="col-md-9"><br>
	<h2>Profile</h2>
	<hr>
	<?php echo form_open('user/update_login_info')?>
	<div class="panel panel-default" style="margin-bottom: 0px;">
		<div class="panel-heading">Login Information</div>
		<div class="panel-body">
			
			<div class="form-group">
				<label for="username">Username</label>
				<span style="color: red;"><?php echo form_error('username'); ?></span>
		    	<input type="text" value="<?php echo $this->input->post("username") != null ? set_value('username') : $user["username"]?>" class="form-control input_long" id="username" name="username" placeholder="Username">
		  	</div>
		  	<div class="form-group">
				<label for="password">Password</label>
				<span style="color: red;"><?php echo form_error('password'); ?></span>
		    	<input type="password" value="<?php echo set_value('password');?>" class="form-control input_long" id="password" name="password" placeholder="Password">
		  	</div>
		  	<div class="form-group">
				<label for="passwordConf">Confirm Password</label>
				<span style="color: red;"><?php echo form_error('passwordConf'); ?></span>
		    	<input type="password" value="<?php echo set_value('passwordConf');?>" class="form-control input_long" id="passwordConf" name="passwordConf" placeholder="Confirm password">
		  	</div>
		</div>	
		<div class="panel-footer" style="height:50px;">
			<a style="float:left;" href="<?php echo site_url('user/load_profile');?>" class="btn btn-primary btn-sm" type="button" value="">Back</a>
			<button style="float:right;" class="btn btn-primary btn-sm" type="submit" value="">Save</button>
	  	</div>
	</div><br>
	<?php echo form_close();?>
</div>