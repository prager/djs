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
          <input type="text" class="form-control" id="FName" placeholder="Enter First Name" id="fname" name="fname" value="<?php echo $fname; ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="LName">Last Name:</label>
        <div class="col-sm-10">
        <span style="color: red;"><?php echo form_error('lname'); ?></span>
          <input type="text" class="form-control" id="LName" placeholder="Enter Last Name" id="lname" name="lname" value="<?php echo $lname; ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Email Address:</label>
        <div class="col-sm-10">
        <span style="color: red;"><?php echo form_error('email'); ?></span>
          <input type="email" class="form-control" id="email" placeholder="Enter Email Address" id="email" name="email" value="<?php echo $email; ?>"> 
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="phone">Phone Number:</label>
        <div class="col-sm-10">
        <span style="color: red;"><?php echo form_error('phone'); ?></span>
          <input type="text" class="form-control" id="phone" placeholder="Enter Phone Number" name="phone" value="<?php echo $phone; ?>">
        </div>
      </div>
       <div class="form-group">
             <label class="col-xs-3 control-label">Party Size</label>
                <div class="col-xs-5 selectContainer">
                    <!-- <select class="form-control" name="party" id="party">
                        <?php 
                        /*for ($i=0; $i<20; $i++) {
                            if($resdata['party'] == ($i + 1)) {
                                if($i !=0 ) {
                                    echo "<option value=\"" . ($i) . "\"     selected>" . ($i) . "</option>";
                                }
                                echo "<option value=\"" . ($i+1) . "\"   selected>" . ($i+1) . "</option>";
                            }
                            else {
                                echo "<option value=\"" . ($i) . ">" . ($i) . "</option>";
                                echo "<option value=\"" . ($i+1) . ">" . ($i+1) . "</option>";
                            }
                        }
                        */?>                       
                    </select> -->
                    <?php echo party_dropdown('party_dropdown', set_value('party')); ?>
                </div>
            </div>
            <div class="form-group">
        <label class="control-label col-sm-2" for="date">Enter Date:</label>
        <div class="col-sm-10">
        <span style="color: red;"><?php echo form_error('date'); ?></span> 
          <input type="tel" class="form-control" id="date" name="date" placeholder="MM/DD/YYY" value="<?php echo $date; ?>">
        </div>
      </div>
      <div class="form-group">
		<label class="col-xs-3 control-label" for="time_dropdown">Select Time</label>
			<div class="col-xs-5 selectContainer">
				<?php echo times_dropdown('time_dropdown', set_value('time')); ?>
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