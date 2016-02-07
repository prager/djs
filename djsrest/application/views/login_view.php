<!-- content of the body -->
			<div class="col-md-9" id="mainCol">
				<div class = "container">
<table class="table">
	<thead>
		<tr>
			<th><h3>Login:</h3></th>
		</tr>
	</thead>
	<tbody>
		<tr><td>
<form class="form-horizontal" role="form" id="tblRes" method="post" action="load_login">
	<div class="form-group">
	    <label class="control-label col-sm-2" for="fname" >Username:</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="FName" placeholder="Enter Your Username" id="uname" name="uname">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="LName">Password:</label>
	    <div class="col-sm-10">
	      <input type="password" class="form-control" id="LName" placeholder="Password" id="pass" name="pass">
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
	
	<!-- javascript for carousel plugin -->
	<script src="<?php echo base_url() ;?>/assets/js/owl.carousel.min.js"></script>
	
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
	<!-- calling the carousel plugin -->
	<script>	
	$(document).ready(function($) {
      $("#slideshow").owlCarousel({
		autoPlay: 3000, //Set AutoPlay to 3 seconds
 
		items : 4,
		itemsDesktop : [1199,3],
		itemsDesktopSmall : [979,3]
	  });
    });
	</script>