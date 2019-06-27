<?php
	include '../core/core.inc.php';
	include '../core/user.db.php';

	$u = new User($host, $db_name, $db_user, $db_pass);
	echo json_encode($u->search_by_name($_GET['q']));