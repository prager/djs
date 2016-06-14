<!-- Validation scripts -->
<script src="<?php echo base_url() ;?>/assets/js/form_validation/additional-methods.js"></script>
<script src="<?php echo base_url() ;?>/assets/js/form_validation/jquery.validate.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
 

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
				<label for="cus_name">Name</label> <span style="color: red;"><?php echo form_error('customer_name'); ?></span>
				<input type="text" value="<?php echo set_value('customer_name'); ?>"
					class="form-control input_long bg-danger" id="cus_name" name="customer_name"
					placeholder="Name">
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
					<input type="hidden" id="now_radio" name="payment_method" > </input>
				</span>
			</div>
		</div>
		<div class="panel-footer" style="height: 50px;">
			<a 
				style="float: left;" 
				class="btn btn-primary btn-sm"
				href="<?php echo site_url('orders/load_cart');?>">
				Back to cart
			</a> 
			<button 
				type="submit"
				style="float: right; width:85px;" 
				class="btn btn-success btn-sm"
				id='pickup_submit' 
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
					href="<?php echo site_url('orders/destroy_cart');?>" 
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
				<label for="address">Billing Address</label> <span
					style="color: red;"><?php echo form_error('address'); ?></span> 
				<input
					type="text" value="<?php echo set_value('address'); ?>"
					class="form-control input_long" id="address" name="address"
					placeholder="Address">
			</div>
			<div class="form-group">
				<label for="apt_num">Apt #</label> <span
					style="color: red;"><?php echo form_error('apt_num'); ?></span> 
				<input
					type="text" value="<?php echo set_value('apt_num'); ?>"
					class="form-control input_long" id="apt_num" name="apt_num"
					placeholder="Apt #">
			</div>
			<div class="form-group">
				  		<label for="state_dropdown">State</label>
					  	<?php echo states_dropdown('state_dropdown', set_value('state')); ?>
				    </div>
			<div class="form-group">
				<label for="zip">Zip</label> <span
					style="color: red;"><?php echo form_error('zip'); ?></span> 
				<input
					type="text" value="<?php echo set_value('zip'); ?>"
					class="form-control input_long" id="zip" name="zip"
					placeholder="Zip code">
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
				<label for="expDate">Expire Date</label> <span style="color: red;"><?php echo form_error('expDate'); ?></span>
				<span style="color: red;"><?php echo form_error('expDate'); ?></span> 
          		<input style="width: 125px;" type="tel" class="form-control" id="expDate" name="expDate" placeholder="MM/DD/YYY" value="<?php echo form_error('expDate'); ?>">
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
				class="btn btn-primary btn-sm">Back
			</a> 
			<button
				style="float: right;" 
				type="submit" 
				class="btn btn-success btn-sm"
				name="method" 
				value="cc_payment">Place your order				
			</button> 
			<span style="float: right; padding-right: 15px;">
				<a
					class="btn btn-danger btn-sm"
					href="<?php echo site_url('orders/destroy_cart');?>">Start-over
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

   $('#pickup_next').click(function() {
        if ($('#checkout_form').valid()) {
        	$("#pickup_info").hide();
        	$("#billing_info").fadeIn();
        }
    });    
});

$('#now_radio').click(function() {	
	$("#pickup_submit").hide();
	$("#pickup_next").fadeIn();
});

$('#pickup_radio').click(function() {
	$("#pickup_next").hide();
	$("#pickup_submit").fadeIn();
});

var date_input=$('input[name="expDate"]'); //our date input has the name "date"
var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
var options={
	format: 'mm/dd/yyyy',
    container: container,
    todayHighlight: true,
    autoclose: true,
};
date_input.datepicker(options); //initiali110/26/2015 8:20:59 PM ze plugin
</script>
