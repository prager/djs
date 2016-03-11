<div class="col-lg-9">
	<h1>Place Your Order</h1>
	<hr>
	<?php 
		foreach ($menu as $item) {
			$url = site_url('orders/insert_item/'. $item['MENU_ID']);
			
			echo '<div class="panel panel-default">';
			echo '<div class="panel-heading"><h4 style="padding-left: 15px;">' . $item['ITEM_NAME'] . '';
			echo '<span style="float:right; padding-right: 15px;">$' . $item['PRICE'] . '</span>';
			echo '</h4></div>';
			echo '<div class="panel-body">';
			echo '<div class="col-md-9 col-sm-9 col-xs-9">';
			echo '<p>' . $item['DESCRIPTION'] . '</p>';
			echo '</div>';
			echo '<div class="col-md-3 col-sm-3 col-xs-3">';
			echo '<a name="item_id" style="float:right; width:50px;" ';
			echo 'href="' . $url . '" class="btn btn-primary btn-sm glyphicon glyphicon-shopping-cart" value=' . $item['MENU_ID'] . '></a>';			
			echo '</div>';			
			echo '</div>';
			echo '</div>';		
		}
	?>
</div>