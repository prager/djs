<div id="cart_view" style="display: none;" class="col-md-9"><br>
	<h2>Review Order</h2>
	<hr>
		<div class="panel panel-default">
	  <!-- Default panel contents -->
	  <div class="panel-heading">Please review your items before checkout</div>
	  <div class="panel-body">
	    <a style="float:left;" class="btn btn-primary btn-sm" href="<?php echo site_url('orders/');?>" value="">Back</a>		
		<a style="float:right;" class="btn btn-success btn-sm" href="<?php echo site_url('orders/load_checkout')?>" value="">Check-out</a>		
	  </div>
	
	  <!-- Table -->
		<table class="table">
		   <thead>
		      <tr>
		         <th></th>
		         <th>Food Item</th>		         
		         <th style="text-align:right;">Unit Price</th>
		         <th></th>
		         <th>Quantity</th>
		         <th></th>
		         <th></th>
		      </tr>
		   </thead>
		   <tbody>
		   <?php
		   		$i = 1;
				foreach ($cart as $item) {
					echo '<tr>';
					echo '<th scope="row">' . $i . '</th>';
					echo '<td>' . $item['name'] . '</td>';	
					//echo '<td><span style="float:right;">' . $item['price'] . '</span></td>';
					echo '<td><span style="float:right;">' . currency_format($item['price']) . '</span></td>';
					echo '<td><p>&nbsp; &nbsp; &nbsp; &nbsp;</p></td>';
					echo form_open('orders/update_item/');
					echo '<td><input id="input_' . $item['id'] . '" type="number" name="qty" min="1" max="100" value="' . $item['qty'] . '"></td>';
					echo '<td>';
					echo '<button type=submit name="row_id"
						class="btn btn-primary btn-sm "
						value="' . $item['rowid'] . '"> Update</button>';
					echo '</td>';
					echo form_close();
					echo '<td>';
					echo form_open('orders/remove_item');
					echo '<button type=submit style="width:50px;" name="row_id"
						class="btn btn-danger btn-sm glyphicon glyphicon-trash"
						value="' . $item['rowid'] . '"></button>';
					echo form_close();
					echo '</td>';
					$i++;
				}
			?>		      
		   </tbody>
		</table>		
	</div>
	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading">Order Summary</div>
		<div class="panel-body">
    		<table class="table-responsive" style="width:60%; margin:auto; border-style:none;".>
    		<thead>
    			<tr></tr>
    			<tr></tr>
    		</thead>
	    		<tbody>
		    		<tr>
		    			<td style="width:50%; text-align:right;">Total items:</td>
		    			<td style="width:50%; text-align:right;"><?php echo $this->cart->total_items();?></td>
		    		</tr>
		    		<tr>
		    			<td style="width:50%; text-align:right;">Total:</td>
		    			<td style="width:50%; text-align:right;"><?php echo currency_format($this->cart->total());?></td>
		    		</tr>
		    		<!--  <tr>
		    			<td style="width:50%; text-align:right;">Tax rate:</td>
		    			<td style="width:50%; text-align:right;">
						<?php 
						$rate = 7.5;
						//echo $rate . '%';
						?>
						</td>
		    		</tr>
		    		<tr>
		    			<td style="width:50%; text-align:right;">Sales tax:</td>
		    			<td style="width:50%; text-align:right;">
						<?php 
						$tax = $this->cart->total() * $rate / 100;
						//echo $tax;
						//echo money_format($tax);
						?>
						</td>-->
		    		</tr> 
		    		<tr><td><hr></td><td><hr></td></tr>
		    		<tr>
		    			<td style="width:50%; text-align:right;"><strong>Amount due:</strong></td>
		    			<td style="width:50%; text-align:right;"><strong><u><?php 
		    			//echo currency_format($tax + $this->cart->total());
		    			echo currency_format($this->cart->total());
		    			?></u></strong></td>
		    		</tr>   		
	    		</tbody>
    		</table>
		</div>
		<div class="panel-footer" style="height:50px;">
			<a style="float:left;" class="btn btn-primary btn-sm" href="<?php echo site_url('orders/');?>" value="">Back</a>		
			<a style="float:right;" class="btn btn-success btn-sm" href="<?php echo site_url('orders/load_checkout')?>" value="">Check-out</a>	
			<span style="float:right; padding-right:15px;"><a class="btn btn-danger btn-sm" href="<?php echo site_url('orders/destroy_cart');?>" value="">Start-over</a></span>	
		</div>
  	</div>
</div>

<script>
$(document).ready(function(){
	$("#cart_view").fadeIn(900);    
});
</script>
