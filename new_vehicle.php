<?php 
	include 'core/core.inc.php';
	if (!isset($_SESSION['user_id'])) {
		header("Location: login.php");
	}
	$message = false;
	include 'core/user.db.php';

	if (isset($_POST['submit'])) {
		if (empty($_POST['veichle_type'])) {
			$message = 'Invalid vehicle type.';
		}elseif (empty($_POST['veichle_subtype'])) {
			$message = 'Invalid subtype.';
		}elseif (empty($_POST['veichle_driver'])) {
			$message = "No Driver assigned.";
		}elseif (empty($_POST['veichle_number'])) {
			$message = 'Vehicle number is empty.';
		}else{
			include_once 'core/vehicle.db.php';
			$a = new Vehicle($host, $db_name, $db_user, $db_pass);
			if(!$a->insert($_POST['veichle_type'], $_POST['veichle_subtype'], $_POST['veichle_driver'], $_POST['veichle_number'], $_POST['location'])){
				$message = "Vehicle already exist.";
			}
		}
	}
	$u = new User($host, $db_name, $db_user, $db_pass);
	$all_driver = $u->getDriver();
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta name="og:title" property="og:title" content="TATA Sponge Limited :: History"/>
	<?php
		include 'core/meta.php';
	?>
	<link rel="stylesheet" href="css/core.css">

</head>
<body>
	<?php
		require "core/top_nav.php";
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col col-lg-3 side_nav">
				<?php
					$active = "vehicle";
					require "core/side_nav.php";
				?>
			</div>
			<div class="col-md-9">


				<br><br>
				<form class="needs-validation" novalidate method="POST">
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="veichle_type">Vehicle Type</label>
							<select name="veichle_type" class="form-control" id="veichle_type" >
								<option></option>
								<option>Auto</option>
								<option>Bus</option>
								<option>Car</option>
								<option>Truck</option>
								<option>Carrier Truck</option>
								<option>Mini Carrier</option>
							</select>
						</div>
						<div class="form-group col-md-4">
							<label for="veichle_subtype">Sub type</label>
							<input type="text" name="veichle_subtype" class="form-control" id="veichle_subtype" value="" placeholder="TATA Sumo, Marcopolo etc">
						</div>
						<div class="form-group col-md-4">
							<label for="veichle_driver">Driver</label>
							<select name="veichle_driver" class="form-control" id="veichle_driver" >
								<?php foreach ($all_driver as $key => $value): ?>
									<option value="<?=$value['id'];?>"><?=$value['name'];?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="veichle_number">Vehicle Number</label>
							<input type="text" name="veichle_number" class="form-control" id="veichle_number" value="" placeholder="JH05ACXXXX">
						</div>
						<div class="form-group col-md-4">
							<label for="location">Current Location</label>
							<input type="text" name="location" class="form-control" id="location" value="" placeholder="Car Shade">
						</div>
					</div>

					<button type="reset" class="btn btn-danger">Reset</button>
					<button type="submit" name="submit" class="btn btn-primary">Save</button>
					<br><br>
				</form>

			</div>
		</div>
	</div>
</body>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/swal.js"></script>
<script type="text/javascript">
	<?php if ($message): ?>
		swal({dangerMode:true,title:"<?=$message;?>"});
	<?php endif ?>
</script>
</html>