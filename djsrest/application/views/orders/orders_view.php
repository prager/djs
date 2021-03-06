<script src="http://listjs.com/no-cdn/list.js"></script>
<script src="http://listjs.com/no-cdn/list.pagination.js"></script>

<div class="col-md-9"><br>
	<h2>Take-out</h2>
	<hr>
	
	<?php $attributes = array('novalidate' => 'novalidate', 'name' => 'menu_form')?>
	
	<?php echo form_open('orders/insert_items', $attributes);?>
	<div id="food-menu" class="panel panel-default">
		<div class="panel-heading">Please select the food items you like</div>
		<div class="panel-body">
		<ul class="list" style="list-style: none; padding-left: 0px;">
			<?php foreach ($menu as $item) {?>
			<li>
			<div id="panel_<?php echo $item['menu_id'];?>" class="panel panel-default">
			   <div class="panel-heading">
			      <h4 style="padding-left: 15px;"><?php echo $item['item_name'];?><span style="float:right; padding-right: 15px;"><?php 
			      //echo $item['price'];
			      echo currency_format($item['price']);?>
			      </span></h4>
			   </div>
			   <div class="panel-body">
			   		<div class="col-md-9 col-sm-9 col-xs-6">
						<p><?php echo $item['description'];?></p>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-6">
						<input data-id="<?php echo $item['menu_id'];?>" class="form-control" style="display:none; 
						float:left; height:30px; width:60px;" id="qty_<?php echo $item['menu_id'];?>" 
						type="number" name="qty_<?php echo $item['menu_id'];?>" min="1" max="100" value="1" >
						<button
							type="button"
							id="add_btn_<?php echo $item['menu_id'];?>" 
							onclick="addItem(this.value)"
			            	style="float:right; width:45px;" 
			            	class="btn btn-primary btn-sm glyphicon glyphicon-shopping-cart"
			            	value="<?php echo $item['menu_id'];?>">
						</button>				
						<button
							type="button"
							id="remove_btn_<?php echo $item['menu_id'];?>" 
							onclick="removeItem(this.value)"
			            	style="display:none; float:right; width:45px;" 
			            	class="btn btn-danger btn-sm glyphicon glyphicon-trash"
			            	value="<?php echo $item['menu_id'];?>">
						</button>
					</div>
				</div>
			</div>
			</li>
			<?php }?>
		</ul>
		
		</div><!-- /panel-body -->
		<div class="panel-footer" style="height:50px;">
			<ul style="margin: auto;" class="pagination"></ul>
			<input type="hidden" name="cartInput" class="cart-data" value="" >
			<button style="float: right;" type="submit" onclick="getCart(); return validateForm();" 
			class="btn btn-primary btn-sm btn-success">Go to Cart</button>			
		</div>
	</div>
	<?php echo form_close();?>
	<?php 
	foreach ($this->cart->contents() as $item) {
		echo '<div style="display:none" class="addedItems" data-qty="' . $item['qty'] . '" data-id="' . $item['id'] . '"></div>';
	}
	?>	
</div>

<!-- script for shopping cart -->
<script>
var cart = new Array();

function addItem(itemId) {
	var addButton = "#add_btn_" + itemId;
	var removeButton = "#remove_btn_" + itemId;
	var qtyInput = "#qty_" + itemId;

	cart[itemId] = 1;
	$(qtyInput).val('1');
	$("#panel_" + itemId).removeClass('panel-default');
	$("#panel_" + itemId).addClass('panel-success');
	$("#panel_" + itemId).addClass('added');  
	$(addButton).fadeOut();
	$(addButton).css('display', 'none');

	$(removeButton).fadeIn();
	$(qtyInput).fadeIn();
}

function removeItem(itemId) {
	var addButton = "#add_btn_" + itemId;
	var removeButton = "#remove_btn_" + itemId;
	var qtyInput = "#qty_" + itemId;

	$("#panel_" + itemId).removeClass('panel-success');
	$("#panel_" + itemId).addClass('panel-default');
	$("#panel_" + itemId).removeClass('added');

	cart[itemId] = 0;
	$(qtyInput).val('0');
	
	$(qtyInput).fadeOut();
	$(removeButton).fadeOut();
	$(removeButton).css('display', 'none');

	$(addButton).fadeIn();
}

function getCart() {	
	var data = ""
	for (var itemId in cart) {
		data += itemId + " " + cart[itemId] + ","
	}
	$(".cart-data").attr("value", data);
	//alert("data: " + data);
}

$( "input[type='number']" ).change(function() {
	  var itemId = $(this).attr('data-id');
	  cart[itemId] = $(this).val();
});

$( ".addedItems" ).each(function() {
	var itemId = $(this).attr('data-id');
	var addButton = "#add_btn_" + itemId;
	var removeButton = "#remove_btn_" + itemId;
	var qtyInput = "#qty_" + itemId;
	var qty = $(this).attr('data-qty');

	$("#panel_" + itemId).removeClass('panel-default');
	$("#panel_" + itemId).addClass('panel-success'); 
	$("#panel_" + itemId).addClass('added'); 
	$(addButton).fadeOut();
	$(addButton).css('display', 'none');

	$(qtyInput).attr('value', qty);

	$(removeButton).fadeIn();
	$(qtyInput).fadeIn();
});

$.fn.exists = function () {
    return this.length !== 0;
}

function validateForm() {    
    if (!($(".added").exists())) {
        alert("Cart is empty!");
        return false;
    }
}

var monkeyList = new List('food-menu', {
	  page: 5,
	  plugins: [ ListPagination({}) ] 
});
</script>
