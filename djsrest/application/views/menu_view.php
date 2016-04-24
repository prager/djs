<div class="col-lg-9">
	<h3>Menu</h3>
	<hr>
	<?php 
		foreach ($menu as $item) {
			echo '<div class="panel panel-default">';
			echo '<div class="panel-heading"><h4>' . $item['item_name'] . '</h4></div>';
			echo '<div class="panel-body">';
			echo '<div class="col-md-9 col-sm-9 col-xs-9">';
			echo '<p>' . $item['description'] . '</p>';
			echo '</div>';
			echo '<div class="col-md-3 col-sm-3 col-xs-3">$' . $item['price'] . '</div>';
			echo '</div>';
			echo '</div>';		
		}
	?>
	<table style="width:90%; ">
	<?php 
	/*foreach ($menu as $item) {
		echo "<tr>
				<td style=\"width:65%\"><h4>
				" . $item['item_name'] . "
				</h4><td>$" . $item['price'] . "
				</td>
			  </tr>
			  <tr>		
				<td>"  . $item['description'] . "</td>
				<td></td>
			  </tr>
			  <tr>
			 	<td>------------------------------------------</td><td>--------------</td>	
			  </tr>		";			  
	}*/
	?>
	</table>
</div>
