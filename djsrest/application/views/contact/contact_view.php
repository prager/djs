<div class="col-lg-9">
	<h2>Contact us</h2>
	<hr>
	<p>
		Thank you for visiting the DJ's Bistro website. We value your comments and suggestions. 
		The information you provide will only be used to help us serve you better and will 
		not be sold or shared for any other purpose
	</p> 
	<?php echo form_open('contact/message_validation'); ?>
	  <div class="form-group">
	    <label for="name">Name</label><span style="color: red;"><?php echo form_error('name'); ?></span>
	    <input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name'); ?>" placeholder="Name">
	  </div>
	  <div class="form-group">
	    <label for="email">Email</label><span style="color: red;"><?php echo form_error('email'); ?></span>
	    <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="Email">
	  </div>
	  <div class="form-group">
	    <label for="message">Feedback</label><span style="color: red;"><?php echo form_error('message'); ?></span>
	    <textarea id="message" class="form-control" name="message" rows="4"><?php echo set_value('message'); ?></textarea>
	  </div>  
	  <button type="submit" class="btn btn-default">Submit</button>
	<?php echo form_close(); ?><br>
</div>