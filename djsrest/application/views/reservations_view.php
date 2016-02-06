<!-- content of the body -->
			<div class="col-md-9" id="mainCol">
				<div class = "container">
<table class="table">
	<thead>
		<tr>
			<th><h3>Table Reservations</h3></th>
		</tr>
	</thead>
	<tbody>
		<tr><td><form class="form-horizontal" role="form">
	<div class="form-group">
	    <label class="control-label col-sm-2" for="FName">First Name:</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="FName" placeholder="Enter First Name">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="LName">Last Name:</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="LName" placeholder="Enter Last Name">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="email">Email Address:</label>
	    <div class="col-sm-10">
	      <input type="email" class="form-control" id="email" placeholder="Enter Email Address">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="PNumber">Phone Number:</label>
	    <div class="col-sm-10"> 
	      <input type="tel" class="form-control" id="PNumber" placeholder="Enter Phone Number">
	    </div>
	  </div>
	   <div class="form-group">
		     <label class="col-xs-3 control-label">Party Size</label>
		        <div class="col-xs-5 selectContainer">
		            <select class="form-control" name="size">
		                <option value="1">1</option>
		                <option value="2">2</option>
		                <option value="3">3</option>
		                <option value="4">4</option>
		                <option value="5">5</option>
		                <option value="6">6</option>
		                <option value="7">7</option>
		                <option value="8">8</option>
		                <option value="9">9</option>
		                <option value="10">10</option>
		                <option value="11">11</option>
		                <option value="12">12</option>
		                <option value="13">13</option>
		                <option value="14">14</option>
		                <option value="15">15</option>
		                <option value="16">16</option>
		                <option value="17">17</option>
		                <option value="18">18</option>
		                <option value="19">19</option>
		                <option value="20">20</option>
		            </select>
		        </div>
		    </div>
	  	</form></td>
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
</div>
				
			</div>
		</div>
	</div>
    <script src="<?php echo base_url() ;?>/assets/js/custom.js"></script>
	
	<!-- javascript for carousel plugin -->
	<script src="<?php echo base_url() ;?>/assets/js/owl.carousel.min.js"></script>

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