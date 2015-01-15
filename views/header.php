<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Treinamento</title>

	<link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css">
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/sunny/jquery-ui.css" type="text/css" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo URL; ?>public/js/custom.js"></script>

	<?php
	if(isset($this->js)) {
		foreach($this->js as $js) {
			echo '<script type="text/javascript" src="'.URL.'views'.$js.'"></script>';
		}
	}
	?>

</head>

<body>

<?php \Libs\Session::init(); ?>

<header>
	<?php if(\Libs\Session::get('loggedIn') == false): ?>
		<a href="<?php echo URL; ?>index">Index</a>
		<a href="<?php echo URL; ?>help">Help</a>
	<?php endif; ?>
	<?php if(\Libs\Session::get('loggedIn') == true): ?>
		<a href="<?php echo URL; ?>dashboard">Dashboard</a>	
		<a href="<?php echo URL; ?>note">Notes</a>	
		<a href="<?php echo URL; ?>image">Image</a>	
		<?php if(\Libs\Session::get('role') == 'owner'): ?>
			<a href="<?php echo URL; ?>user">Users</a>	
		<?php endif; ?>
		<a href="<?php echo URL; ?>dashboard/logout">Logout</a>	
	<?php else: ?>
		<a href="<?php echo URL; ?>login">Login</a>
	<?php endif; ?>
</header>

<div id="content">