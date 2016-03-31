<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>Customer Management</h1>
	  <hr>	  
	</section>
	
	<!-- Main content -->
	<section class="content">
	<!-- Loading the css -->
	<?php 
	foreach($css_files as $file): ?>
		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>
	
	<!-- page content -->
	<div style="width:100%;">
	<?php echo $output; ?>
	</div>
				
	<!-- page content end -->
	  
	<!-- loading the javascripts -->
	<?php foreach($js_files as $file): ?>
		<script src="<?php echo $file; ?>"></script>
	<?php endforeach; ?>  
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->