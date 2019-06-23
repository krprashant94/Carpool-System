<?php
	try {
		$db_host = $_GET['host'];
		$db_user = $_GET['user'];
		$db_pass = $_GET['pass'];
		$db = $_GET['db'];
		$conn = new PDO('mysql:host='.$db_host.';dbname='.$db.'',$db_user,$db_pass);
		unset($conn);
		echo "true";
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
?>