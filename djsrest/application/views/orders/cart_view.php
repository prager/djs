<div class="col-lg-9"><br>
	<div class="panel panel-default">
	  <!-- Default panel contents -->
	  <div class="panel-heading">Shopping Cart</div>
	  <div class="panel-body">
	    <a style="float:left;" class="btn btn-primary btn-sm" href="<?php echo site_url('orders/');?>" value="">Continue Shopping</a>		
		<a style="float:right;" class="btn btn-success btn-sm" href="#" value="">Check-out</a>		
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
		      </tr>
		   </thead>
		   <tbody>
		   <?php
		   		$i = 1;
				foreach ($cart as $item) {
				echo '<tr>';
				echo '<th scope="row">' . $i . '</th>';
				echo '<td>' . $item['name'] . '</td>';				
				echo '<td><span style="float:right;">' . money_format($item['price']) . '</span></td>';
				echo '<td><p>&nbsp; &nbsp; &nbsp; &nbsp;</p></td>';
				echo '<td><input type="number" name="qty" min="1" max="100" value="' . $item['qty'] . '"></td>';
				echo '<td><a style="width:50px;" ';
				echo 'href="#" class="btn btn-danger btn-sm glyphicon glyphicon-trash" value=""></a></td>';			
				echo '</tr>';
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
    		<table style="width:60%; margin:auto; border-style:none;">
    		<thead>
    			<tr></tr>
    			<tr></tr>
    		</thead>
	    		<tbody>
		    		<tr>
		    			<td style="width:50%; text-align:right;">Total number of items:</td>
		    			<td style="width:50%; text-align:right;"><?php echo $this->cart->total_items();?></td>
		    		</tr>
		    		<tr>
		    			<td style="width:50%; text-align:right;">Total:</td>
		    			<td style="width:50%; text-align:right;"><?php echo money_format($this->cart->total());?></td>
		    		</tr>
		    		<tr>
		    			<td style="width:50%; text-align:right;">Tax rate:</td>
		    			<td style="width:50%; text-align:right;">
						<?php 
						$rate = 7.5;
						echo $rate . '%';
						?>
						</td>
		    		</tr>
		    		<tr>
		    			<td style="width:50%; text-align:right;">Sales tax:</td>
		    			<td style="width:50%; text-align:right;">
						<?php 
						$tax = $this->cart->total() * $rate / 100;
						echo money_format($tax);
						?>
						</td>
		    		</tr> 
		    		<tr><td><hr></td><td><hr></td></tr>
		    		<tr>
		    			<td style="width:50%; text-align:right;"><strong>Amount due:</strong></td>
		    			<td style="width:50%; text-align:right;"><strong><u><?php echo money_format($tax + $this->cart->total());?></u></strong></td>
		    		</tr>   		
	    		</tbody>
    		</table>
		</div>
		<div class="panel-footer" style="height:50px;">
			<a style="float:left;" class="btn btn-primary btn-sm" href="<?php echo site_url('orders/');?>" value="">Continue Shopping</a>		
			<a style="float:right;" class="btn btn-success btn-sm" href="#" value="">Check-out</a>	
			<span style="float:right; padding-right:15px;"><a class="btn btn-danger btn-sm" href="#" value="">Start-over</a></span>	
		</div>
  	</div>
</div>