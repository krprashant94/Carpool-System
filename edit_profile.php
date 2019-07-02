<?php 
	include 'core/core.inc.php';
	if (!isset($_SESSION['user_id'])) {
		header("Location: login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta name="og:title" property="og:title" content="TATA Sponge Limited :: Edit"/>
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
					$active = "edit";
					require "core/side_nav.php";
				?>
			</div>
			<div class="col-md-9">
				<br><br>
				<form class="needs-validation" novalidate>
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="f_name">First name</label>
							<input type="text" class="form-control" id="f_name" name="f_name" value="">
						</div>
						<div class="form-group col-md-4">
							<label for="m_name">Middle name</label>
							<input type="text" class="form-control" id="m_name" name="m_name" value="">
						</div>
						<div class="form-group col-md-4">
							<label for="surname">Surname</label>
							<input type="text" class="form-control" id="surname" name="surname" value="">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-5">
							<label for="emailid">Email</label>
							<input type="email" class="form-control" id="emailid" name="emailid" value=" " readonly>
						</div>
						<div class="form-group col-md-5">
							<label for="p_no">Phone Number</label>
							<input type="number" class="form-control" id="p_no" name="p_no" value="">
						</div>
						<div class="form-group col-md-2">
							<label for="inputState">Blood Group</label>
     						<select id="inputState" class="form-control">
        					<option selected>Choose...</option>
        					<option>O+</option>
        					<option>A+</option>
        					<option>B+</option>
        					<option>AB+</option>
        					<option>O-</option>
        					<option>A-</option>
        					<option>B-</option>
        					<option>AB-</option>
      						</select>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="old_password">Old Password</label>
							<input type="password" class="form-control" id="old_password" name="old_password" value="" autocomplete="new-password">
						</div>
						<div class="form-group col-md-4">
							<label for="new_password">New Password</label>
						<input type="password" class="form-control" onchange="validateNewPassword(this)" id="new_password" name="new_password" value=" ">
						</div>
						<div class="form-group col-md-4">
							<label for="confirm_password">Confirm Password</label>
							<input type="password" class="form-control" id="confirm_password" name="confirm_password"  value="">
						</div>
					</div>
					<div class="form-group">
						<label for="inputAddress">House No</label>
						<input type="text" class="form-control" onchange="validateHouseNo(this)" id="inputAddress" name="inputAddress" value=" ">
					</div>
					<div class="form-group">
                      <label for="inputAddress2">Line 1</label>
						<input type="text" class="form-control" onchange="validateLine1(this)" id="inputAddress2" name="inputAddress2" value=" ">
				</div>
					<div class="form-group">
						<label for="inputAddress3">Line 3</label>
						<input type="text" class="form-control" id="inputAddress3" name="line2" value="">
					</div>
					<div class="form-row">
						<div class="form-group col-md-3">
							<label for="inputCity">City</label>
							<input type="text" class="form-control" id="inputCity" name="inputCity" value="">
						</div>
						<div class="form-group col-md-4">
							<label for="inputState">State</label>
							<input type="text" class="form-control" id="inputState" name="inputState" value="">
						</div>
						<div class="form-group col-md-2">
							<label for="inputZip">Zip</label>
							<input type="text" class="form-control" id="inputZip" name="inputZip" value="">
						</div>
						<div class="form-group col-md-3">
							<label for="inputCountry">Country</label>
							<input type="text" class="form-control" id="inputCountry" name="inputCountry" value="">
						</div>
					</div>
					<div class="form-group">
						<label for="inputAddress2">Landmark</label>
						<input type="text" class="form-control" id="inputAddress2" name="inputAddress2" placeholder="" value="">
					</div>
					<div class="form-group">
						<label for="inputidentification">Identification Mark</label>
						<input type="text" class="form-control" id="Inputidentification" name="Inputidentification" placeholder="" value="">
					</div>
					<button type="submit" class="btn btn-danger">Discard</button>
					<button type="submit" class="btn btn-primary">Save</button>
					<br><br>
				</form>



















				
			</div>
		</div>
	</div>

</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/swal.js"></script>
<script type="text/javascript" src="js/edit.js"></script>
</html>