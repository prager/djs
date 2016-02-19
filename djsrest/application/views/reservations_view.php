<div class="container">
			<div class="row">
			<!-- left side navigation bar -->
			<div class="col-md-3" id="leftCol">              
				<ul class="nav nav-stacked" id="sidebar">
				  <li><?php echo anchor('home', 'Home');?></li>
				  <li><?php echo anchor('reservations', 'Reservations');?></li>
				  <li><a href="#sec2">Menu</a></li>
				  <li><a href="#sec3">Contact Us</a></li>
				</ul>              
			</div>
			

<!-- content of the body -->
			<div class="col-md-9" id="mainCol">
				<br>
				<h2 id="sec0">Table Reservations</h2>
				<hr class="col-md-12">
				<form class="form-horizontal" role="form" id="tblRes" method="post" action="load_reservation">
				<?php //echo validation_errors(); ?>
	<div class="form-group">
	    <label class="control-label col-sm-2" for="fname" >First Name:</label>
	    <div class="col-sm-10">
	    <span style="color: red;"><?php echo form_error('fname'); ?></span>
	      <input type="text" class="form-control" id="FName" placeholder="Enter First Name" id="fname" name="fname">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="LName">Last Name:</label>
	    <div class="col-sm-10">
	    <span style="color: red;"><?php echo form_error('lname'); ?></span>
	      <input type="text" class="form-control" id="LName" placeholder="Enter Last Name" id="lname" name="lname">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="email">Email Address:</label>
	    <div class="col-sm-10">
	    <span style="color: red;"><?php echo form_error('email'); ?></span>
	      <input type="email" class="form-control" id="email" placeholder="Enter Email Address" id="email" name="email">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="PNumber">Phone Number:</label>
	    <div class="col-sm-10">
	    <span style="color: red;"><?php echo form_error('phnum'); ?></span> 
	      <input type="tel" class="form-control" id="PNumber" placeholder="Enter Phone Number" id="phnum" name="phnum">
	    </div>
	  </div>
	   <div class="form-group">
		     <label class="col-xs-3 control-label">Party Size</label>
		        <div class="col-xs-5 selectContainer">
		            <select class="form-control" name="party" id="party">
		                <?php 
		                for ($i=0; $i<20; $i++) {
		                	if($resdata['party'] == ($i + 1)) {
		                		if($i !=0 ) {
		                			echo "<option value=\"" . ($i) . "\"  	selected>" . ($i) . "</option>";
		                		}
		                		echo "<option value=\"" . ($i+1) . "\"  	selected>" . ($i+1) . "</option>";
		                	}
		                	else {
		                		echo "<option value=\"" . ($i) . ">" . ($i) . "</option>";
		                		echo "<option value=\"" . ($i+1) . ">" . ($i+1) . "</option>";
		                	}
		                }
		                ?>		                
		            </select>
		        </div>
		    </div>
		    <div class="form-group">
	    <label class="control-label col-sm-2" for="date">Enter Date:</label>
	    <div class="col-sm-10">
	    <span style="color: red;"><?php echo form_error('date'); ?></span> 
	      <input type="tel" class="form-control" id="date" name="date" placeholder="MM/DD/YYY">
	    </div>
	  </div>
	  <div class="form-group">
		     <label class="col-xs-3 control-label">Select Time</label>
		        <div class="col-xs-5 selectContainer">
		            <select class="form-control" id="time" name="time">
		            
		                <option value="1">11:00 AM</option>
		                <option value="2">11:15 AM</option>
		                <option value="3">11:30 AM</option>
		                <option value="4">11:45 AM</option>
		                <option value="5">12:00 PM</option>
		                <option value="6">12:15 PM</option>
		                <option value="7">12:30 PM</option>
		                <option value="8">12:45 PM</option>
		                <option value="9">1:00 PM</option>
		                <option value="10">1:15 PM</option>
		                <option value="11">1:30 PM</option>
		                <option value="12">1:45 PM</option>
		                <option value="13">2:00 PM</option>
		                <option value="14">2:15 PM</option>
		                <option value="15">2:30 PM</option>
		                <option value="16">2:45 PM</option>
		                <option value="17">3:00 PM</option>
		                <option value="18">3:15 PM</option>
		                <option value="19">3:30 PM</option>
		                <option value="20">3:45 PM</option>
		                <option value="21">4:00 PM</option>
		                <option value="22">4:15 PM</option>
		                <option value="23">4:30 PM</option>
		                <option value="24">4:45 PM</option>
		                <option value="25">5:00 PM</option>
		                <option value="26">5:15 PM</option>
		                <option value="27">5:30 PM</option>
		                <option value="28">5:45 PM</option>
		                <option value="29">6:00 PM</option>
		                <option value="30">6:15 PM</option>
		                <option value="31">6:30 PM</option>
		                <option value="32">6:45 PM</option>
		                <option value="33">7:00 PM</option>
		                <option value="34">7:15 PM</option>
		                <option value="35">7:30 PM</option>
		                <option value="36">7:45 PM</option>
		                <option value="37">8:00 PM</option>
		                <option value="38">8:15 PM</option>
		                <option value="39">8:30 PM</option>
		                <option value="40">8:45 PM</option>
		                <option value="41">9:00 PM</option>
		                
		            </select>
		        </div>
		    </div>
		</td></tr>
	  	<tr><td></td></tr>
	</tbody></div></table></div>
	
<div class="container">
	<div class="form-group"> 
	    	<div class="col-sm-10">
	    		<div class="text-center">
	      			<button type="submit" class=" btn-primary btn-lg">Submit</button>
	    		</div>
	    		<p></p>
	    	</div>
	  </div>
	  </form>
</div>
			</div>
		</div>
	</div>

    <script src="<?php echo base_url() ;?>/assets/js/custom.js"></script>
	
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
	
	