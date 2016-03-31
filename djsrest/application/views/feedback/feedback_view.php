<div class="col-md-9">
	<h2>Contact us</h2>
	<hr>
	<?php echo form_open('feedback/feedback_validation'); ?> 
	<div id="food-menu" class="panel panel-default">
		<div class="panel-heading">Feedback</div>
		<div class="panel-body">
			<p>
				Thank you for visiting the DJ's Bistro website. We value your comments and suggestions. 
				The information you provide will only be used to help us serve you better and will 
				not be sold or shared for any other purpose
			</p>
			<hr>			
			<div class="form-group">
			    <label for="name">Name</label><span style="color: red;"><?php echo form_error('name'); ?></span>
			    <input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name'); ?>" placeholder="Name">
  			</div>
  			<div class="form-group">
			    <label for="email">Email</label><span style="color: red;"><?php echo form_error('email'); ?></span>
			    <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="Email">
  			</div>
  			<div class="form-group">
			    <label for="feedback">Feedback</label><span style="color: red;"><?php echo form_error('feedback'); ?></span>
			    <textarea id="feedback" class="form-control" name="feedback" rows="4"><?php echo set_value('feedback'); ?></textarea>
  			</div>  
		</div>
		<div class="panel-footer" style="height:50px;">
			<button type="submit" class="btn btn-primary btn-sm">Submit</button>	
		</div>
	</div><br>
	<?php echo form_close(); ?>
</div>