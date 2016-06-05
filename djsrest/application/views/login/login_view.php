<!-- content of the body -->
<div class="col-md-9" id="mainCol"><br>
<!---------------------------------Form------------------------------>
<d iv class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a id="login_tab" role="button" data-toggle="collapse" data-parent="#accordion" href="#login_form_tab" aria-expanded="true" aria-controls="login_form_tab">
          Login
        </a>
      </h4>
    </div>
    <div id="login_form_tab" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">      
	      <?php echo form_open('login/login_validation'); ?>
	      		<div class="row">
					<!-- left side of the registration form -->
					<div id="login_form" class="col-lg-12">
						<div class="form-group">
							<label for=user">Username</label>
							<span style="color: red;"><?php echo form_error('user'); ?></span>
					    	<input type="text" value="<?php echo set_value('user'); ?>" class="form-control input_long" id="user" name="user" placeholder="Username">
					  	</div>
						<div class="form-group">
					    	<label for="pass">Password</label>
					    	<span style="color: red;"><?php echo form_error('pass'); ?></span>
					    	<input type="password" value="<?php echo set_value('pass'); ?>" class="form-control input_long" id="pass" name="pass" placeholder="Password">
					  	</div>
					</div>
					<!-- right side ends -->					
				</div>
				<div class="form-group">
					<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
					<label for="remember"> Remember Me</label>
				</div>	
			  	<button type="submit" class="btn btn-primary btn-sm" >Login</button>		  	
			<?php echo form_close(); ?>     
      </div>
    </div>
  </div>
  
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a id="registration_tab" role="button" data-toggle="collapse" data-parent="#accordion" 
        href="#registration_form_tab" aria-expanded="false" aria-controls="registration_form_tab">
          Create Account
        </a>
      </h4>
    </div>
    <!-- End Login form -->
    
    <!-- Registration form -->
    <div id="registration_form_tab" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body" >
		<?php echo form_open('login/registration_validation'); ?>
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
				    	<label for="street">Street</label>
				    	<span style="color: red;"><?php echo form_error('street'); ?></span>
				    	<input type="text" value="<?php echo set_value('street'); ?>" class="form-control input_long" id="street" name="street" placeholder="Street Address">
				  	</div>
				  	<div class="form-group">
				    	<label for="city">City</label>
				    	<span style="color: red;"><?php echo form_error('city'); ?></span>
				    	<input type="text" value="<?php echo set_value('city'); ?>" class="form-control input_medium" id="city" name="city" placeholder="City">
				  	</div>
				  	<div class="form-group">
				  		<label for="state_dropdown">State</label>
					  	<?php echo states_dropdown('state_dropdown', set_value('state')); ?>
				    </div>
				  	<div class="form-group">
				    	<label for="zip">Zip</label>
				    	<span style="color: red;"><?php echo form_error('zip'); ?></span>
				    	<input type="text" value="<?php echo set_value('zip'); ?>" class="form-control input_short" id="zip" name="zip" placeholder="zip">
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
				    	<input type="email" value="<?php echo set_value('email'); ?>" class="form-control input_long" id="email" name="email" placeholder="Email">
				  	</div>
				  	<div class="form-group">
				    	<label for="emailConf">Re-enter Email</label>
				    	<span style="color: red;"><?php echo form_error('emailConf'); ?></span>
				    	<input type="email" value="<?php echo set_value('emailConf'); ?>" class="form-control input_long" id="emailConf" name="emailConf" placeholder="Re-enter Email">
				  	</div>
				  	<div class="form-group">
				    	<label for="exampleInputPassword1">Password</label>
				    	<span style="color: red;"><?php echo form_error('password'); ?></span>
				    	<input type="password" value="<?php echo set_value('password'); ?>" class="form-control input_long" id="exampleInputPassword1" name="password" placeholder="Password">
				  	</div>
				  	<div class="form-group">
				    	<label for="passwordConf">Re-enter Password</label>
				    	<span style="color: red;"><?php echo form_error('passwordConf'); ?></span>
				    	<input type="password" value="<?php echo set_value('passwordConf'); ?>" class="form-control input_long" id="passwordConf" name="passwordConf" placeholder="Re-enter Password">
				  	</div>
				</div>
				<!-- right side ends -->
				
			</div>	
		  	<button type="submit" class="btn btn-primary btn-sm">Sign up</button>		  	
		<?php echo form_close(); ?>     
      </div>
    </div>
  </div>  
</div>
<!----------------------------------form----------------------------->	
</div>
<script>
$(document).ready(function(){
	if ( "<?php echo $collapsed_form?>" == "registration_form_tab")
	{
		$("#registration_form_tab").addClass('in');
		$("#login_form_tab").removeClass('in');
	}
	else if ( "<?php echo $collapsed_form?>" == "login_form_tab")
	{
		$("#registration_form_tab").removeClass('in');
		$("#login_form_tab").addClass('in');
	}        
});
</script>
