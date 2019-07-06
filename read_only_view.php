<?php
	include_once 'core/core.inc.php';
	if (!isset($_SESSION['user_id'])) { header("Location: dashboard.php");	}

	include 'core/application.db.php';
	include 'core/user.db.php';

	$a = new Application($host, $db_name, $db_user, $db_pass);
	$u = new User($host, $db_name, $db_user, $db_pass);
	
	$application_details = $a->fetch_by_id('draft_id', $_GET['view_id'])[0];
	$applicant_name = $u->getName($application_details['applicant'])[0];
	$applicant_details = $u->fetch_by_id('id', $application_details['applicant'])[0];

	if ($application_details['forwarded'] != 0) {
		$reciver = $application_details['forwarded'];
	}else{
		$reciver = $application_details['receiver'];
	}

	$reciver_name = $u->getName($reciver)[0];
	$reciver_details = $u->fetch_by_id('id', $reciver)[0];
 ?>

<div class="box">

	To,<br>
	<?=$reciver_name['name']?><br>
	<?=$reciver_name['department']?><br><br>
	
	Date : <?=date('d-m-Y, h:i A', $application_details['application_date']);?><br><br>
	<b><i>
		Subject :Requesting for a vichle from <?=date('d-m-Y h:i A', $application_details['start_date']);?> to <?=date('d-m-Y h:i A', $application_details['ending_date']);?><br>
		Pickup Location : <?=$application_details['pickup_location']?><br><br>
	</i></b>
	Sir,<br>
	<?=$application_details['message']?><br><br>

	<?=$applicant_name['name']?><br>
	<?=$applicant_details['department']?><br>
	<a href="tel:<?=$applicant_details['phone']?>">+91 <?=$applicant_details['phone']?></a><br>
	<a href="mailto:<?=$applicant_details['mail_id']?>"><?=$applicant_details['mail_id']?></a><br>

	<br>
	<code class="col-12" readonly><?=$application_details['log']?></code>
</div>
