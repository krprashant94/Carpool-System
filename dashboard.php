<?php 
	include 'core/core.inc.php';
	if (!isset($_SESSION['user_id'])) { header("Location: login.php"); }
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
	<link rel="stylesheet" href="css/dashboard.css">

</head>
<body>
	<?php
		require "core/top_nav.php";
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col col-lg-3 side_nev">
				<?php
					$active = "none";
					require "core/side_nav.php";
				?>
			</div>
			<div class="col-md-9">
				<br><br><br><br>
				<div class="row justify-content-center">
					<div class="col-lg-3">
						<div class="card poolcard">
							<img class="card-img-top" src="images/car.png" alt="Card image cap">
							<div class="card-body">
								<center><h5 class="card-title">50 car pools</h5></center>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card poolcard">
							<img class="card-img-top" src="images/distance.png" alt="Card image cap">
							<div class="card-body">
								<center><h5 class="card-title">5000 Km </h5></center>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card poolcard">
							<img class="card-img-top" src="images/pin.png" alt="Card image cap">
							<div class="card-body">
								<center><h5 class="card-title">5 location</h5></center>
							</div>
						</div>
					</div>
				</div>
				<br><br>
				<div>
					<center><?php include "calender.php" ?></center>
				</div>
			</div>
		</div>
	</div>

</body>
</html>