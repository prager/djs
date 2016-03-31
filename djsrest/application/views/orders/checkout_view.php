<script src="<?php echo base_url() ;?>/assets/js/form_validation/additional-methods.js"></script>
<script src="<?php echo base_url() ;?>/assets/js/form_validation/jquery.validate.js"></script>

<div id="page-container" class="col-md-9"><br>
	<h2>Checkout</h2>
	<hr>
	<?php $attributes = array('id' => 'checkout_form')?>
	<?php echo form_open('orders/process_order', $attributes)?>
	<div id="pickup_info" style="display: none;"
		class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading">Pick-up Information</div>
		<div class="panel-body">
			<div class="form-group">
				<label for="firstName">Name</label> <span style="color: red;"><?php echo form_error('firstName'); ?></span>
				<input type="text" value="<?php echo set_value('firstName'); ?>"
					class="form-control input_long bg-danger" id="firstName" name="firstName"
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
			<button 
				type="submit"
				style="float: right; width:85px;" 
				class="btn btn-success btn-sm"
				id='place_order' 
				name="method" 
				value="pickup">Place Order
			</button>
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
				<label for="bill_firstName">First Name</label> <span style="color: red;"><?php echo form_error('bill_firstName'); ?></span>
				<input type="text" value="<?php echo set_value('bill_firstName'); ?>"
					class="form-control input_long" id="bill_firstName" name="bill_firstName"
					placeholder="First Name">
			</div>
			<div class="form-group">
				<label for="bill_lastName">Last Name</label> <span style="color: red;"><?php echo form_error('bill_lastName'); ?></span>
				<input type="text" value="<?php echo set_value('bill_lastName'); ?>"
					class="form-control input_long" id="bill_lastName" name="bill_lastName"
					placeholder="Last Name">
			</div>
			<div class="form-group">
				<label for="bill_address">Billing Address</label> <span
					style="color: red;"><?php echo form_error('bill_address'); ?></span> 
				<input
					type="text" value="<?php echo set_value('bill_address'); ?>"
					class="form-control input_long" id="bill_address" name="bill_address"
					placeholder="address">
			</div>
			<div class="form-group">
				<label for="cardType">Card Type</label> <span style="color: red;"><?php echo form_error('cardType'); ?></span>
				<select id="cardType" name="cardType" style="width: 150px;" class="form-control">
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
				<label for="bill_email">Email</label> <span style="color: red;"><?php echo form_error('bill_email'); ?></span>
				<input type="email" value="<?php echo set_value('bill_email'); ?>"
					class="form-control input_long" id="bill_email" name="bill_email"
					placeholder="Email">
			</div>
		</div>
		<div class="panel-footer" style="height: 50px;">
			<a 
				style="float: left;" id="back-pickup"
				class="btn btn-primary btn-sm" 
				href="#" value="">Back
			</a> 
			<button
				style="float: right;" 
				type="submit" 
				class="btn btn-success btn-sm"
				name="method" 
				value="pickup">Place your order				
			</button> 
			<span style="float: right; padding-right: 15px;">
				<a
					class="btn btn-danger btn-sm"
					type="submit"
					name="method"
					href="<?php echo site_url('orders/distroy_cart');?>" 
					value="cc_payment">Start-over
				</a>
			</span>
		</div>
	</div>
	<?php echo form_close()?>
</div>

<script>
$(document).ready(function(){
	$("#pickup_info").fadeIn(900);
    
    $("#back-pickup").click(function(){
    	$("#billing_info").hide();
    	$("#pickup_info").fadeIn();
    });
    $('#checkout_form').validate({ // initialize the plugin
        rules: {
            firstName: {
                required: true
            },
            phone: {
                required: true,
                digits:true
            },
            email: {
                required: true,
                email:true
            }
        }
    });

    $('#place_order').click(function() {
        if ($('#checkout_form').valid()) {
            alert('form is valid - not submitted');
        }
    });
    $('#pickup_next').click(function() {
        if ($('#checkout_form').valid()) {
        	$("#pickup_info").hide();
        	$("#billing_info").fadeIn();
        }
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
