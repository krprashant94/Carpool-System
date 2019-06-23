<?php
	print_r($_GET);
	try{
		$fp = fopen('../setup/config.php', 'w');
		$write = '<?php
		$email = "'.$_GET['email'].'";
		$pass = "'.$_GET['pass'].'";
		$host = "'.$_GET['host'].'";
		$path = "'.$_GET['path'].'";
		$db = "'.$_GET['db'].'";
		$user = "'.$_GET['user'].'";
		$db_pass = "'.$_GET['db_pass'].'";
?>';
		fwrite($fp, $write);
		fclose($fp);
	}catch(Execption $e){

	}
?>

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
