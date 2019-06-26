<?php 
	include 'core/core.inc.php';
	print_r($_SESSION);
	if (isset($_SESSION['user_id'])) {
		if (!empty($_SESSION['user_id'])) {
			header("Location: dashboard.php");
		}else{
			header("Location: login.php");
		}
	}else{
		header("Location: login.php");
	}
?>