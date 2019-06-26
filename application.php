<?php 
	include 'core/core.inc.php';
	if (!isset($_SESSION['user_id'])) {
		// header("Location: login.php");
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
			<div class="col col-lg-3 side_nev">
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
				<form class="paper_form">
					<div class="form-row justify-content-between">
						<div class="form-group col-md-4">
							<label class="text-success">Application ID : ---</label>
						</div>
						<div class="form-group col-md-4">
							<label class="text-success">Draft ID : ---</label>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<label>Respected Sir,</label>
							<input type="text" class="form-control" id="name" value="" placeholder="Name of the person">
						</div>
					</div>
					<div class="form-row justify-content-between">
						<div class="form-group col-md-4">
							<label>Accounts Department</label>
						</div>
						<div class="form-group col-md-4">
							<label> Date: <?php echo date("d M Y", time()); ?></label>
						</div>
					</div>
					<div class="form-row justify-content-between">
						<div class="form-group col-md-4">
							<label for="startingDate">Starting Date</label>
							<input type="date" class="form-control" id="startingDate" value="" >
						</div>
						<div class="form-group col-md-4">
							<label for="endDate">End Date</label>
							<input type="date" class="form-control" value="" id="endDate">
						</div>
					</div>
					<div class="form-row justify-content-between">
						<div class="form-group col-md-4">
							<label for="vehicleType">Requesting Vehicle</label>
							<input type="text" class="form-control" value="" id="vehicleType" placeholder="Bus, Car, Bike">
						</div>
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Message</label>
						<textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="" id="defaultCheck1" checked>
						<label class="form-check-label" for="defaultCheck1">Receive Notification</label>
					</div>
					<br>
					<button type="button" class="btn btn-primary">Save to Draft</button>
					<button type="button" class="btn btn-primary">Apply</button>
				</form>
				<br><br>
			</div>
		</div>
	</div>

</body>
</html>