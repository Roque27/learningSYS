<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>[Nombre instituto]</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Description" lang="en" content="ADD SITE DESCRIPTION">
<meta name="author" content="ADD AUTHOR INFORMATION">
<meta name="robots" content="index, follow">

<!-- icons -->
<link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">
<link rel="shortcut icon" href="favicon.ico">

<!-- Override CSS file - add your own CSS rules -->
<link rel="stylesheet" href="<?php echo base_url();?>public/assets/css/styles.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/libs/font-awesome-4.4.0/css/font-awesome.min.css">

<!-- Bootstrap core CSS -->
<link href="<?php echo base_url();?>assets/dist/bootstrap.css" rel="stylesheet">


<?php if (isset($css_files)): ?>
   <?php foreach ( $css_files as $file ) :?>
	
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	
	<?php endforeach; ?>
<?php endif; ?>

<script src="<?php echo base_url();?>public/js/vendor/jquery-1.9.0.min.js"></script>	
<script src="<?php echo base_url();?>public/js/jquery.cookie.js"></script>
<script src="<?php echo base_url();?>public/js/main.js"></script>
<script src="<?php echo base_url();?>assets/dist/bootstrap.min.js"></script>


<?php if (isset($js_files)): ?>
<?php foreach($js_files as $file): ?>
	
		<script src="<?php echo $file; ?>"></script>
	
	<?php endforeach; ?>
<?php endif; ?>



			
</head>