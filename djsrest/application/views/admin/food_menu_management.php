<!-- Loading the css -->
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>

<!-- page content -->

	<div class=""row">
		<div class="col-md-12">
			<h2>Food Menu Management</h2>
			<hr class="col-md-6">
		</div>		
	</div>
	<div class=""row">
		<div class="col-md-12">
			<div>
				<?php echo $output; ?>
			</div><br>
		</div>		
	</div>

<!-- page content end -->
  
<!-- loading the javascripts -->
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>