<?php
	include_once 'core/core.inc.php';

	if (isset($_POST['draft_id'])) {

		if (isset($_POST['forword_to'])) {
		// $_POST['draft_id'] = 'OERG60476';
		// $_POST['forword_to'] = 2;
		// $_POST['forword_msg'] = 'pass';

			include_once 'core/application.db.php';
			include_once 'core/user.db.php';
			
			$a = new Application($host, $db_name, $db_user, $db_pass);
			$u = new User($host, $db_name, $db_user, $db_pass);

			$fwd_to = $_POST['forword_to'];
			$fwd_msg = $_POST['forword_msg'];

			$application_details = $a->fetch_by_id('draft_id', $_POST['draft_id'])[0];
			$fwd_details = $u->getName($fwd_to)[0];

			if ($application_details['forwarded'] != 0) {
				$cu_name = $u->getName($application_details['forwarded'])[0];
			}else{
				$cu_name = $u->getName($application_details['receiver'])[0];
			}

			$log =  $application_details['log'].'<br>'.$cu_name['name']." (".$cu_name['department'].") : Forwarded to ".$fwd_details['name']." with message - ".$fwd_msg;

			$a->update("forwarded", $fwd_to, $_POST['draft_id']);
			$a->update("log", $log, $_POST['draft_id']);
			$a->update("status", "Processing Under ".$fwd_details['name']."(".$fwd_details['department'].")", $_POST['draft_id']);
			echo "true";

		}elseif (isset($_POST['vichel_no'])) {
		// $_POST['draft_id'] = 'OERG60476';
		// $_POST['vichel_no'] = 'JH05AC1234';
			if (empty($_POST['vichel_no'])) {
				die("empty");
			}
			include_once 'core/application.db.php';
			include_once 'core/user.db.php';
			include_once 'core/vehicle.db.php';

			$a = new Application($host, $db_name, $db_user, $db_pass);
			$u = new User($host, $db_name, $db_user, $db_pass);
			$v = new Vehicle($host, $db_name, $db_user, $db_pass);

			$application_details = $a->fetch_by_id('draft_id', $_POST['draft_id'])[0];

			$name = $u->getName($_SESSION['user_id'])[0];
			$log =  $application_details['log'].'<br>'.$name['name']." (".$name['department'].") : Approved your request.";
			$a->update("status", "Approved by ".$name['name']." (".$name['department'].")", $_POST['draft_id']);
			$a->update("log", $log, $_POST['draft_id']);
			$a->update("issued_by", $_SESSION['user_id'], $_POST['draft_id']);
			$a->update("vehicle_issue", $_POST['vichel_no'], $_POST['draft_id']);
			$v->update("app_id", $_POST['draft_id'], $_POST['vichel_no']);
			$v->update("status", "Last issue to ".$name['name'], $_POST['vichel_no']);

			echo "true";

		}elseif (isset($_POST['reject_msg'])) {
		// $_POST['draft_id'] = 'OERG60476';
		// $_POST['reject_msg'] = 'JH05AC1234';

			include_once 'core/application.db.php';
			include_once 'core/user.db.php';

			$a = new Application($host, $db_name, $db_user, $db_pass);
			$u = new User($host, $db_name, $db_user, $db_pass);

			$application_details = $a->fetch_by_id('draft_id', $_POST['draft_id'])[0];

			$rejector = $u->getName($_SESSION['user_id'])[0];

			$log =  $application_details['log'].'<br>'.$rejector['name']." (".$rejector['department'].") : Rejected with message - ".$_POST['reject_msg'];

			$a->update("log", $log, $_POST['draft_id']);
			$a->update("status", "Rejected by ".$rejector['name']."(".$rejector['department'].")", $_POST['draft_id']);
			echo "true";
		}elseif (isset($_POST['delete'])) {
		// $_POST['draft_id'] = 'OERG60476';
		// $_POST['delete'] = '-';

			include_once 'core/application.db.php';
			$a = new Application($host, $db_name, $db_user, $db_pass);
			$a->delete($_POST['draft_id']);
			echo "true";
		}
	}