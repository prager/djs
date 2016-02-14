<!--Registration form begins here -->
<div class="col-md-9" id="mainCol">
	<br>
	<h2 id="sec0">Registration</h2>
	<hr class="col-md-12" style="margin-top:0px;">
	<?php echo form_open('registration/registration_validation'); ?>
		<div class="row">
			<!-- left side of the registration form -->
			<div id="reg_form_left" class="col-lg-6 col-md-6">
			<h4>Personal Info</h4>
				<div class="form-group">
					<label for="firstName">First Name</label>
					<span style="color: red;"><?php echo form_error('firstName'); ?></span>
			    	<input type="text" value="<?php echo set_value('firstName'); ?>" class="form-control input_long" id="firstName" name="firstName" placeholder="First Name">
			  	</div>
			  	<div class="form-group">
					<label for="lastName">Last Name</label>
					<span style="color: red;"><?php echo form_error('lastName'); ?></span>
			    	<input type="text" value="<?php echo set_value('lastName'); ?>" class="form-control input_long" id="lastName" name="lastName" placeholder="Last Name">
			  	</div>
			  	<div class="form-group">
			    	<label for="address1">Address Line 1</label>
			    	<span style="color: red;"><?php echo form_error('address1'); ?></span>
			    	<input type="text" value="<?php echo set_value('address1'); ?>" class="form-control input_long" id="address1" name="address1" placeholder="Address Line 1">
			  	</div>
			  	<div class="form-group">
			    	<label for="address2">Address Line 2</label>
			    	<input type="text" value="<?php echo set_value('address2'); ?>" class="form-control input_long" id="address2" name="address2" placeholder="Address Line 2">
			  	</div>
			  	<div class="form-group">
			    	<label for="city">City</label>
			    	<span style="color: red;"><?php echo form_error('city'); ?></span>
			    	<input type="text" value="<?php echo set_value('city'); ?>" class="form-control input_medium" id="city" name="city" placeholder="City">
			  	</div>
			  	<div class="form-group">
				  	<?php states_dropdown('state', set_value('state')); ?>
			    </div>
			  	<div class="form-group">
			    	<label for="zip">Zip</label>
			    	<span style="color: red;"><?php echo form_error('zip'); ?></span>
			    	<input type="text" value="" class="form-control input_short" id="zip" name="zip" placeholder="zip">
			  	</div>
			</div>
			<!-- left side ends -->

			<!-- right side of the registration form -->
			<div id="reg_form_right" class="col-lg-6 col-md-6">
				<h4>Login Info</h4>
				<div class="form-group">
					<label for="username">Username</label>
					<span style="color: red;"><?php echo form_error('username'); ?></span>
			    	<input type="text" value="<?php echo set_value('username'); ?>" class="form-control input_long" id="username" name="username" placeholder="Username">
			  	</div>
				<div class="form-group">
			    	<label for="email">Email</label>
			    	<span style="color: red;"><?php echo form_error('email'); ?></span>
			    	<input type="email" value="" class="form-control input_long" id="email" name="email" placeholder="Email">
			  	</div>
			  	<div class="form-group">
			    	<label for="emailConf">Re-enter Email</label>
			    	<span style="color: red;"><?php echo form_error('emailConf'); ?></span>
			    	<input type="email" value="" class="form-control input_long" id="emailConf" name="emailConf" placeholder="Re-enter Email">
			  	</div>
			  	<div class="form-group">
			    	<label for="exampleInputPassword1">Password</label>
			    	<span style="color: red;"><?php echo form_error('password'); ?></span>
			    	<input type="password" value="" class="form-control input_long" id="exampleInputPassword1" name="password" placeholder="Password">
			  	</div>
			  	<div class="form-group">
			    	<label for="passwordConf">Re-enter Password</label>
			    	<span style="color: red;"><?php echo form_error('passwordConf'); ?></span>
			    	<input type="password" value="" class="form-control input_long" id="passwordConf" name="passwordConf" placeholder="Re-enter Password">
			  	</div>
			</div>
			<!-- right side ends -->
			
		</div>	
	  	<button type="submit" class="btn btn-default">Sign up</button>	  	
	<?php echo form_close(); ?><br>
</div>
<!--Registration form ends here-->