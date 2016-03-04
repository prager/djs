<div class="col-lg-9">
	<h1>Menu</h1>
	<hr>
	<?php 
		foreach ($menu as $item) {
			echo '<div class="panel panel-default">';
			echo '<div class="panel-heading"><h4>' . $item['ITEM_NAME'] . '</h4></div>';
			echo '<div class="panel-body">';
			echo '<div class="col-md-9 col-sm-9 col-xs93">';
			echo '<p>' . $item['DESCRIPTION'] . '</p>';
			echo '</div>';
			echo '<div class="col-md-3 col-sm-3 col-xs-3">$' . $item['PRICE'] . '</div>';
			echo '</div>';
			echo '</div>';		
		}
	?>
</div>
