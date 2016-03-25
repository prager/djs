<div class="col-md-9"><br>
	<h2>Profile</h2>
	<hr>
	<?php echo form_open('user/update_contact_info')?>
	<div class="panel panel-default" style="margin-bottom: 0px;">
		<div class="panel-heading">Contact Information</div>
		<div class="panel-body">
			<div class="form-group">
				<label for="firstName">First Name</label>
				<span style="color: red;"><?php echo form_error('firstName'); ?></span>
		    	<input type="text" value="<?php echo $this->input->post("firstName") != null ? set_value('firstName') : $user["first_name"]?>" class="form-control input_long" id="firstName" name="firstName" placeholder="First Name">
		  	</div>
		  	<div class="form-group">
				<label for="lastName">Last Name</label>
				<span style="color: red;"><?php echo form_error('lastName'); ?></span>
		    	<input type="text" value="<?php echo $this->input->post("lastName") != null ? set_value('lastName') : $user["last_name"]?>" class="form-control input_long" id="lastName" name="lastName" placeholder="Last Name">
		  	</div>
		  	<div class="form-group">
				<label for="address">Address</label>
				<span style="color: red;"><?php echo form_error('address'); ?></span>
		    	<input type="text" value="<?php echo $this->input->post("address") != null ? set_value('address') : $user["address"]?>" class="form-control input_long" id="address" name="address" placeholder="Address">
		  	</div>
  			<div class="form-group">
				<label for="aptNum">Apt#</label>
				<span style="color: red;"><?php echo form_error('aptNum'); ?></span>
		    	<input type="text" value="<?php echo $this->input->post("apt_num") != null ? set_value('apt_num') : $user["apt_num"]?>" class="form-control input_long" id="apt_num" name="apt_num" placeholder="">
		  	</div>
		  	<div class="form-group">
		  		<label for="state_dropdown">State</label>
		  		<?php echo states_dropdown('state_dropdown', $this->input->post("state") != null ? set_value('state') : $user["state"]); ?>
		    </div>
		  	<div class="form-group">
				<label for="zip">Zip</label>
				<span style="color: red;"><?php echo form_error('zip'); ?></span>
		    	<input type="text" value="<?php echo $this->input->post("zip") != null ? set_value('zip') : $user["zip"]?>" class="form-control input_long" id="zip" name="zip" placeholder="Zip">
		  	</div>
		  	<div class="form-group">
				<label for="email">Email</label>
				<span style="color: red;"><?php echo form_error('email'); ?></span>
		    	<input type="text" value="<?php echo $this->input->post("email") != null ? set_value('email') : $user["email"]?>" class="form-control input_long" id="email" name="email" placeholder="Email">
		  	</div>
		</div>	
		<div class="panel-footer" style="height:50px;">
			<button style="float:right;" class="btn btn-primary btn-sm" type="submit" value="">Save</button>
	  	</div>
	</div><br>
	<?php echo form_close();?>
</div>