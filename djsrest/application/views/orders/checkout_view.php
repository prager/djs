<div id="page-container" class="col-md-9">
	<br>
	<?php echo form_open('orders/payment_validation')?>
	<div id="pickup_info" style="display: none;"
		class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading">Pick-up Information</div>
		<div class="panel-body">
			<div class="form-group">
				<label for="firstName">Name</label> <span style="color: red;"><?php echo form_error('firstName'); ?></span>
				<input type="text" value="<?php echo set_value('firstName'); ?>"
					class="form-control input_long" id="firstName" name="firstName"
					placeholder="First Name">
			</div>
			<div class="form-group">
				<label for="phone">Phone</label> <span style="color: red;"><?php echo form_error('phone'); ?></span>
				<input type="text" value="<?php echo set_value('phone'); ?>"
					class="form-control input_long" id="phone" name="phone"
					placeholder="phone">
			</div>
			<div class="form-group">
				<label for="email">Email</label> <span style="color: red;"><?php echo form_error('email'); ?></span>
				<input type="email" value="<?php echo set_value('email'); ?>"
					class="form-control input_long" id="email" name="email"
					placeholder="Email">
			</div>
			<div class="form-group">
				<label for="payment_method">Method of payment</label>
				<span id="payment_method" class="form-control" style="height: 60px;">
					<input type="radio" id="pickup_radio" name="payment_method" checked="checked"> Pay at pickup</input><br>
					<input type="radio" id="now_radio" name="payment_method"> Pay now</input>
				</span>
			</div>
		</div>
		<div class="panel-footer" style="height: 50px;">
			<a 
				style="float: left;" 
				class="btn btn-primary btn-sm"
				href="<?php echo site_url('orders/load_cart');?>" 
				value="">Back to cart
			</a> 
			<a 
				style="float: right; width:85px;" 
				class="btn btn-success btn-sm"
				id='place_order' 
				href="#" 
				value="">Place Order
			</a>
			<a 
				style="float: right; width:85px; display:none;" 
				class="btn btn-primary btn-sm"
				id='pickup_next' 
				href="#" 
				value="">Next
			</a> 
			<span style="float: right; padding-right: 15px;">
				<a
					class="btn btn-danger btn-sm"
					href="<?php echo site_url('orders/distroy_cart');?>" 
					value="">Start-over
				</a>
			</span>
		</div>
	</div>
	<div id="billing_info" style="display: none;"
		class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading">Billing Information</div>
		<div class="panel-body">
			<div class="form-group">
				<label for="firstName">First Name</label> <span style="color: red;"><?php echo form_error('firstName'); ?></span>
				<input type="text" value="<?php echo set_value('firstName'); ?>"
					class="form-control input_long" id="firstName" name="firstName"
					placeholder="First Name">
			</div>
			<div class="form-group">
				<label for="lastName">Last Name</label> <span style="color: red;"><?php echo form_error('lastName'); ?></span>
				<input type="text" value="<?php echo set_value('lastName'); ?>"
					class="form-control input_long" id="lastName" name="lastName"
					placeholder="Last Name">
			</div>
			<div class="form-group">
				<label for="address">Billing Address</label> <span
					style="color: red;"><?php echo form_error('address'); ?></span> <input
					type="text" value="<?php echo set_value('address'); ?>"
					class="form-control input_long" id="address" name="address"
					placeholder="address">
			</div>
			<div class="form-group">
				<label for="cardType">Card Type</label> <span style="color: red;"><?php echo form_error('cardType'); ?></span>
				<select style="width: 150px;" class="form-control">
					<option value="visa">Visa</option>
					<option value="master">Master</option>
					<option value="american express">American Experss</option>
					<option value="discover">Discover</option>
				</select>
			</div>
			<div class="form-group">
				<label for="cardNum">Card Number</label> <span style="color: red;"><?php echo form_error('cardNum'); ?></span>
				<input type="text" value="<?php echo set_value('cardNum'); ?>"
					class="form-control input_long" id="cardNum" name="cardNum"
					placeholder="Card Number">
			</div>
			<div class="form-group">
				<label for="secCode">Security Code</label> <span style="color: red;"><?php echo form_error('secCode'); ?></span>
				<input type="text" value="<?php echo set_value('secCode'); ?>"
					class="form-control input_long" id="secCode" name="secCode"
					placeholder="Security Code">
			</div>
			<div class="form-group">
				<label for="billEmail">Email</label> <span style="color: red;"><?php echo form_error('billEmail'); ?></span>
				<input type="email" value="<?php echo set_value('billEmail'); ?>"
					class="form-control input_long" id="billEmail" name="billEmail"
					placeholder="Email">
			</div>
		</div>
		<div class="panel-footer" style="height: 50px;">
			<a style="float: left;" id="back-pickup"
				class="btn btn-primary btn-sm" href="#" value="">Back</a> <a
				style="float: right;" type="submit" class="btn btn-success btn-sm"
				href="#" value="">Place your order</a> <span
				style="float: right; padding-right: 15px;"><a
				class="btn btn-danger btn-sm"
				href="<?php echo site_url('orders/distroy_cart');?>" value="">Start-over</a></span>
		</div>
	</div>
	<?php echo form_close()?>
</div>

<script>
$(document).ready(function(){
	$("#pickup_info").fadeIn(900);
    $("#pickup_next").click(function(){
    	$("#pickup_info").hide();
    	$("#billing_info").fadeIn();
    });
    $("#back-pickup").click(function(){
    	$("#billing_info").hide();
    	$("#pickup_info").fadeIn();
    });

    
});

$('#now_radio').click(function() {	
	$("#place_order").hide();
	$("#pickup_next").fadeIn();
});

$('#pickup_radio').click(function() {
	$("#pickup_next").hide();
	$("#place_order").fadeIn();
});
</script>
