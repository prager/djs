<div id="page-container" class="col-md-9"><br>
	<?php echo form_open('orders/payment_validation')?>
	<div id="pickup_info"class="panel panel-default">	
		<!-- Default panel contents -->
		<div class="panel-heading">Pick-up Information</div>		
		<div class="panel-body">
		    <div class="form-group">
				<label for="firstName">Name</label>
				<span style="color: red;"><?php echo form_error('firstName'); ?></span>
		    	<input type="text" value="<?php echo set_value('firstName'); ?>" class="form-control input_long" id="firstName" name="firstName" placeholder="First Name">
		  	</div>
		  	<div class="form-group">
				<label for="phone">Phone</label>
				<span style="color: red;"><?php echo form_error('phone'); ?></span>
		    	<input type="text" value="<?php echo set_value('phone'); ?>" class="form-control input_long" id="phone" name="phone" placeholder="phone">
		  	</div>	
		  	<div class="form-group">
		    	<label for="email">Email</label>
		    	<span style="color: red;"><?php echo form_error('email'); ?></span>
		    	<input type="email" value="<?php echo set_value('email'); ?>" class="form-control input_long" id="email" name="email" placeholder="Email">
		  	</div>	
		</div>
			<div class="panel-footer" style="height:50px;">
			<a style="float:left;" class="btn btn-primary btn-sm" href="<?php echo site_url('orders/load_cart');?>" value="">Back to cart</a>		
			<a style="float:right;" class="btn btn-success btn-sm" id='pickup' href="#" value="">Next</a>	
			<span style="float:right; padding-right:15px;"><a class="btn btn-danger btn-sm" href="<?php echo site_url('orders/distroy_cart');?>" value="">Start-over</a></span>	
		</div>				
	</div>
	<div id="billing_info" style="display:none;" class="panel panel-default">	
		<!-- Default panel contents -->
		<div class="panel-heading">Billing Information</div>		
		<div class="panel-body">
		    
		</div>
			<div class="panel-footer" style="height:50px;">
			<a style="float:left;" id="back-pickup" class="btn btn-primary btn-sm" href="#" value="">Back to cart</a>		
			<a style="float:right;" type="submit" class="btn btn-success btn-sm" href="#" value="">Next</a>	
			<span style="float:right; padding-right:15px;"><a class="btn btn-danger btn-sm" href="<?php echo site_url('orders/distroy_cart');?>" value="">Start-over</a></span>	
		</div>				
	</div>
	<?php echo form_close()?>
</div>

<script>
$(document).ready(function(){
	$("#billing_info").hide();
    $("#pickup").click(function(){
    	$("#pickup_info").hide();
    	$("#billing_info").fadeIn();
    });
    $("#back-pickup").click(function(){
    	$("#billing_info").hide();
    	$("#pickup_info").fadeIn();
    });

    
});
</script>
