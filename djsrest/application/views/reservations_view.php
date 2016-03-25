<div class="col-md-9" >
	<h2>Table Reservations</h2>
	<hr>
	<div class="panel panel-default">
	<div class="panel-heading">Please fill out the following information</div>
	<div class="panel-body">
	<?php echo form_open('load_reservation');?>
		<?php //echo validation_errors(); ?>
      	<div class="form-group">
	        <label for="fname" >First Name:</label>
	        <span style="color: red;"><?php echo form_error('fname'); ?></span>
	        <input type="text" class="form-control" id="FName" placeholder="Enter First Name" id="fname" name="fname" value="<?php echo $fname; ?>">
        </div>
      	<div class="form-group">
        	<label for="LName">Last Name:</label>
        	<span style="color: red;"><?php echo form_error('lname'); ?></span>
          	<input type="text" class="form-control" id="LName" placeholder="Enter Last Name" id="lname" name="lname" value="<?php echo $lname; ?>">
       	</div>
      	<div class="form-group">
        	<label for="email">Email Address:</label>
        	<span style="color: red;"><?php echo form_error('email'); ?></span>
          	<input type="email" class="form-control" id="email" placeholder="Enter Email Address" id="email" name="email" value="<?php echo $email; ?>"> 
       	</div>
      	<div class="form-group">
        	<label for="phone">Phone Number:</label>
        	<span style="color: red;"><?php echo form_error('phone'); ?></span>
          	<input type="text" class="form-control" id="phone" placeholder="Enter Phone Number" name="phone" value="<?php echo $phone; ?>">
        </div>
        <div class="form-group">
        	<label class="control-label" for="date">Enter Date:</label>
        	<span style="color: red;"><?php echo form_error('date'); ?></span> 
          	<input style="width: 150px;" type="tel" class="form-control" id="date" name="date" placeholder="MM/DD/YYY" value="<?php echo $date; ?>">
      	</div>
      	<div class="form-group">
			<label class="control-label" for="time_dropdown">Select Time</label>
			<?php echo times_dropdown('time_dropdown', set_value('time')); ?>
  		</div>
       	<div class="form-group">
       		<label for="party_dropdown">Party Size</label>
            <?php echo party_dropdown('party_dropdown', set_value('party')); ?>            
       	</div> 
	</div>
	<div class="panel-footer" style="height:50px;">
		<button style="margin:auto;" type="submit" class="btn btn-primary btn-sm">Submit</button>
	</div>
	<?php echo form_close();?>
	</div>
</div>

<script src="<?php echo base_url() ;?>/assets/js/custom.js"></script>
    
<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    
<!-- calling the date picker -->
<script>
	var date_input=$('input[name="date"]'); //our date input has the name "date"
	var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
	var options={
		format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
	};
	date_input.datepicker(options); //initiali110/26/2015 8:20:59 PM ze plugin
</script>