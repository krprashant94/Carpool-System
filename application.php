<?php 
	include 'core/core.inc.php';
	if (!isset($_SESSION['user_id'])) { header("Location: login.php");}
	
	$save_message = false;
	$apply_message = false;

	if (isset($_POST['draft'])) {
		print_r($_POST);
		if ($_POST['applied'] == 'N') {
			require_once "core/application.db.php";
			$a = new Application($host, $db_name, $db_user, $db_pass);
			$draft_id = 0;
			if (!isset($_GET['draft_id'])) {
				$draft_id = $a->insert($_SESSION['user_id'], $_POST['to']);
				$rdr = true;
			}else{
				$draft_id = $_GET['draft_id'];
			}

			$a->update("receiver", $_POST['sending_to'], $draft_id);
			$a->update("message", $_POST['message'], $draft_id);
			$a->update("department", $_POST['department'], $draft_id);
			$a->update("start_date", $_POST['start_date'], $draft_id);
			if (isset($_POST['onetime'])) {
				$a->update("ending_date", $_POST['start_date'], $draft_id);
			}else{
				$a->update("ending_date", $_POST['end_date'], $draft_id);
			}
			
			$a->update("vehicle_req", $_POST['request'], $draft_id);

			$save_message = "Successfuly saved in draft";
			$notify = 'N';
			if (isset($_POST['notify'])) { $notify = 'Y'; }
			$a->update("notification", $notify, $draft_id);

			if (isset($rdr)) {
				header("Location: ?draft_id=".$draft_id);
			}
		}else{
			$apply_message = "Already applied. You can't edit once your application is submitted";
		}
	}
	if (isset($_GET['draft_id'])) {
		require_once "core/application.db.php";
		$a = new Application($host, $db_name, $db_user, $db_pass);
		$draft_details = $a->fetch_by_id('draft_id', $_GET['draft_id'])[0];
	}
	if (isset($_POST['apply'])) {
		if (empty($draft_details['receiver'])) {
			$apply_message = "Not a valid receiver";
		}elseif (empty($draft_details['message'])) {
			$apply_message = "You did not written about your need";
		}elseif (empty($draft_details['department'])) {
			$apply_message = "No any department associted with application receiver";
		}elseif (empty($draft_details['start_date'])) {
			$apply_message = "When you need vehicle";
		}elseif (empty($draft_details['vehicle_req'])) {
			$apply_message = "Which kind of vehicle you need?";
		}else{
			require_once "core/application.db.php";
			$a = new Application($host, $db_name, $db_user, $db_pass);
			$a->update("applied", 'Y', $_GET['draft_id']);
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta name="og:title" property="og:title" content="TATA Sponge Limited :: Dashboard"/>
	<?php
		include 'core/meta.php';
	?>
	<link rel="stylesheet" href="css/core.css">
	<style type="text/css">
		.paper_form input{
			border: 0px;
		}
		.paper_form label{
			padding: 0 0 0 15px;
		}
	</style>
</head>
<body>
	<?php
		require "core/top_nav.php";
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col col-lg-3 side_nav">
				<?php
					$active = "application";
					require "core/side_nav.php";
				?>
			</div>
			<div class="col-md-9">
				<center>
					<h1>Application for vehicle</h1>
				</center>
				<br/>
				<form class="paper_form" method="POST">
					<input type="hidden" name="sending_to" id="sending_to_id" value="1">
					<input type="hidden" name="department" id="department" value="1">
					<input type="hidden" name="applied" value="<?php if(isset($_GET['draft_id'])){echo $draft_details['applied'];}else{ echo "N";} ?>">

					<div class="form-row">
						<div class="form-group col-md-4">
							<label class="text-success"><b>Application ID : <?php if (isset($_GET['draft_id'])) { echo $_GET['draft_id'];} ?></b></label>
						</div>
					</div>
					<div class="form-row justify-content-between">
						<div class="form-group col-md-4">
							<label for="sendingTo">Respected Sir,</label>
							<input type="text" name="to" class="form-control" id="sendingTo" value="" placeholder="Name of the person">
						</div>
						<div class="form-group col-md-4">
							<label> Date: <?php echo date("d M Y", time()); ?></label>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-8" id="helper">
						</div>
					</div>
					<div class="form-row justify-content-between">
						<div class="form-group col-md-3">
							<label for="startingDate">Starting Date</label>
							<input type="date" name="start_date" class="form-control" id="startingDate" value="<?php if(isset($draft_details['start_date'])){ echo $draft_details['start_date'];} ?>" >
						</div>

						<div class="custom-control custom-checkbox mr-md-3">
							<input type="checkbox" class="custom-control-input" name="onetime" id="customControlAutosizing" <?php if (isset($_GET['draft_id'])) {
									if ($draft_details['start_date'] == $draft_details['ending_date']) {
										echo "checked";
									}
							}else{echo "checked";} ?>>
							<label class="custom-control-label" for="customControlAutosizing">One time request</label>
						</div>

						<div class="form-group col-md-3">
							<label for="endDate">End Date</label>
							<input type="date" name="end_date" class="form-control" value="<?php if(isset($draft_details['ending_date'])){ if($draft_details['start_date'] != $draft_details['ending_date']) echo $draft_details['ending_date'];} ?>" id="endDate">
						</div>
					</div>
					<div class="form-row justify-content-between">
						<div class="form-group col-md-4">
							<label for="vehicleType">Requesting Vehicle</label>
							<input type="text" name="request" class="form-control" value="<?php if(isset($_GET['draft_id'])){ echo $draft_details['vehicle_req'];} ?>" id="vehicleType" placeholder="Bus, Car, Bike">
						</div>
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Describe your requirement</label>
						<textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="5"><?php if (isset($_GET['draft_id'])) {
							echo $draft_details['message'];
						} ?></textarea>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="notify" id="defaultCheck1" <?php if (isset($_GET['draft_id'])) {
							if ($draft_details['notification'] == 'Y') {
								echo "checked";
							}
						}else echo "checked"; ?>>
						<label class="form-check-label" for="defaultCheck1">Receive Notification</label>
					</div>
					<br>
					<button type="submit" name="draft" class="btn btn-primary">Save to Draft</button> &nbsp;&nbsp;&nbsp;
					
					<?php if (isset($_GET['draft_id'])) {
						echo '<button type="submit" name="apply" class="btn btn-primary">Apply</button>';
					} ?>
				</form>
				<br><br>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/swal.js"></script>
<script type="text/javascript">
	<?php
		if ($save_message) {
			echo 'swal({title:"'.$save_message.'",icon: "success"});';
		}
		if ($apply_message) {
			echo 'swal({title:"'.$apply_message.'",icon: "error"});';
		}
	?>

	function set_application_reciver(id, depart, name) {
		$('#helper').html("");
		$('#sending_to_id').val(id);
		$('#department').val(depart);
		$('#sendingTo').val(name);
	}
	$("#sendingTo").keyup(function (e) {
		$.ajax({
			url: "ajax/get_suggestion.php?q="+this.value,
			dataType: 'JSON',
			success: function(result){
				console.log(result);
				$('#helper').html("");
				for (var i = result.length - 1; i >= 0; i--) {
					console.log(result[i]);
					$('#helper').append('<label style="border: 1px dotted black; width: 100%; cursor: pointer;" onclick="set_application_reciver(\''+result[i]['id']+'\', \''+result[i]['department']+'\',\''+result[i]['f_name']+' '+result[i]['m_name']+' '+result[i]['surname']+'\' )">'+result[i]['f_name']+' '+result[i]['m_name']+' '+result[i]['surname']+' ('+result[i]['department']+')</label>');
				}
			},
		});
	});
</script>
</html>