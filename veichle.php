<?php 
	include 'core/core.inc.php';
	if (!isset($_SESSION['user_id'])) {
		header("Location: login.php");
	}
	include 'core/application.db.php';
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
					$active = "veichle";
					require "core/side_nav.php";
				?>
				</div>
			<div class="col-md-9">
				<center>
					<h1>Vehicle Registration</h1>
				</center>
				<br/>
				<form class="paper_form" method="POST">
					<div class="form-row justify-content-between">
						<div class="form-group col-md-6">
							<label for="V_no">Vehicle Number</label>
							<input type="Number" name="V_no" class="form-control" id="V_no" value="" placeholder=" ">
						</div>
						<div class="form-group col-md-6">
							<label for="V_Type">Vehicle Type</label>
							<input type="text" name="V_Type" class="form-control" id="V_Type" value="" placeholder=" ">
						</div>
						<div class="form-group col-md-6">
							<label for="V_ST">Vehicle SubType</label>
							<input type="text" name="V_no" class="form-control" id="V_ST" value="" placeholder=" ">
						</div>
						<div class="form-group col-md-6">
							<label for="A_id">Application ID</label>
							<input type="text" name="A_id" class="form-control" id="A_id" value="" placeholder=" ">
						</div>
						<div>
						 <button type="reset" class="btn btn-danger">Reset</button>
					<button type="submit" class="btn btn-primary">Save</button>
					<br><br>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>