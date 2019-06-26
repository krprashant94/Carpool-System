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
	<meta name="keyword" content="tata sponge, carpool, car, car application"/>
	<meta name="description" property="og:description" content="Book yor car instantly with TATA steel carpool network."/>
	<meta name="abstract" content="Car pool network of TATA sponge limited"/>
	<meta name="copyright"content="TATA Sponge Ltd.">
	<meta name="language" content="en">
	<meta name="robots" content="index, follow">

	<meta name="og:url" property="og:url" content="<?php echo $_SERVER['HTTP_HOST']; ?>"/>
	<meta name="og:title" property="og:title" content="TATA Sponge Limited :: Dashboard"/>
	<meta property="og:site_name" content="Car pool network">

	<link rel="shortcut icon" href="favicon.ico" />

	<meta name="og:image" property="og:image" content="[poster-url]">
	<meta property="og:image:type" content="image/jpg">
	<meta property="og:image:width" content="128">
	<meta property="og:image:height" content="128">

	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" crossorigin="anonymous">
	<link rel="stylesheet" href="css/core.css">
	<link rel="stylesheet" href="css/---.css">

</head>
<body>
	<?php
		require "core/top_nav.php";
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col col-lg-3 side_nev">
				<?php
					$active = "edit";
					require "core/side_nav.php";
				?>
			</div>
			<div class="col-md-9">
				<br><br><br><br>
				<form>
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="f_name">First name</label>
							<input type="email" class="form-control" id="f_name" value="">
						</div>
						<div class="form-group col-md-4">
							<label for="m_name">Middle name</label>
							<input type="text" class="form-control" id="m_name" value="">
						</div>
						<div class="form-group col-md-4">
							<label for="surname">Surname</label>
							<input type="text" class="form-control" id="surname" value="">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-5">
							<label for="f_name">Email</label>
							<input type="email" class="form-control" id="f_name" value="" readonly>
						</div>
						<div class="form-group col-md-5">
							<label for="m_name">Phone Number</label>
							<input type="text" class="form-control" id="m_name" value="">
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
							<input type="password" class="form-control" id="old_password" value="" autocomplete="new-password">
						</div>
						<div class="form-group col-md-4">
							<label for="new_password">New Password</label>
							<input type="password" class="form-control" id="new_password" value="">
						</div>
						<div class="form-group col-md-4">
							<label for="confirm_password">Confirm Password</label>
							<input type="password" class="form-control" id="confirm_password" value="">
						</div>
					</div>

					<div class="form-group">
						<label for="inputAddress">House No</label>
						<input type="text" class="form-control" id="inputAddress" value=" ">
					</div>
					<div class="form-group">
						<label for="inputAddress">Line 1</label>
						<input type="text" class="form-control" id="inputAddress" value="">
					</div>
					<div class="form-group">
						<label for="inputAddress">Line 2</label>
						<input type="text" class="form-control" id="inputAddress" value="">
					</div>
					<div class="form-row">
						<div class="form-group col-md-3">
							<label for="inputCity">City</label>
							<input type="text" class="form-control" id="inputCity" value="">
						</div>
						<div class="form-group col-md-4">
							<label for="inputCity">State</label>
							<input type="text" class="form-control" id="inputCity" value="">
						</div>
						<div class="form-group col-md-2">
							<label for="inputZip">Zip</label>
							<input type="text" class="form-control" id="inputZip" value="">
						</div>
						<div class="form-group col-md-3">
							<label for="inputCity">Country</label>
							<input type="text" class="form-control" id="inputCity" value="">
						</div>
					</div>
					<div class="form-group">
						<label for="inputAddress2">Landmark</label>
						<input type="text" class="form-control" id="inputAddress2" placeholder="" value="">
					</div>
					<div class="form-group">
						<label for="inputAddress2">Identification Mark</label>
						<input type="text" class="form-control" id="inputAddress2" placeholder="" value="">
					</div>
					<button type="submit" class="btn btn-danger">Discard</button>
					<button type="submit" class="btn btn-primary">Save</button>
					<br><br>
				</form>



















				
			</div>
		</div>
	</div>

</body>
</html>