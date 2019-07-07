<?php
	require_once "../core/vehicle.db.php";
	$v = new Vehicle($host, $db_name, $db_user, $db_pass);
	$vehicle = $v->getAvailable($_GET['start'], $_GET['end']);
	print_r(json_encode($vehicle));
?>