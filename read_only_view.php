<?php
	include_once 'core/core.inc.php';
	if (!isset($_SESSION['user_id'])) { header("Location: dashboard.php");	}

	include 'core/application.db.php';
	include 'core/user.db.php';

	$a = new Application($host, $db_name, $db_user, $db_pass);
	$u = new User($host, $db_name, $db_user, $db_pass);
	
	$application_details = $a->fetch_by_id('draft_id', $_GET['view_id'])[0];
	$applicant_name = $u->getName($application_details['applicant'])[0];
	$applicant_details = $u->fetch_by_id('id', $application_details['applicant']);

	print_r($application_details);
	print_r($applicant);
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Priview</title>
	<meta name="og:title" property="og:title" content="TATA Sponge Limited :: Dashboard"/>
	<?php
		include 'core/meta.php';
	?>
	<link rel="stylesheet" href="css/core.css">
	<style type="text/css">
		.box{
			padding: 10px;
		}
	</style>
</head>
<body>

	<div class="box">

		To,<br>
		[to_name]<br>
		[department]<br><br>
		
		[date]<br><br>
		<b><i>
			Subject :Requesting for a vichle from [date] to [date]<br>
			Pickup Location : [location]<br><br>
		</i></b>
		Sir,
		[msg]<br><br>

		<?=$applicant['name']?><br>
		<?=$applicant_details['department']?><br>
		<a href="tel:123">+91 <?=$applicant_details['phone']?></a><br>

		<br><br>

		<button type="button" class="btn btn-primary">Forward</button>
		<button type="button" class="btn btn-success">Accept</button>
		<button type="button" class="btn btn-danger">Reject</button>
	</div>
</body>
</html>
