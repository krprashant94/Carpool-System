<?php 
	include 'core/core.inc.php';
	if (isset($_SESSION['user_id'])) { header("Location: dashboard.php");  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta name="keyword" content="tata sponge, carpool, car, car application"/>
	<meta name="description" property="og:description" content="Book yor car instantly with TATA steel carpool network."/>
	<meta name="abstract" content="Car pool network of TATA sponge limited"/>
	<meta name="copyright"content="TATA Sponge Ltd.">
	<meta name="language" content="en">
	<meta name="robots" content="index, follow">

	<!-- <meta name="og:url" property="og:url" content="https://www.websitename.com"/> -->
	<meta name="og:title" property="og:title" content="TATA Sponge Limited :: Register"/>
	<meta property="og:site_name" content="Car pool network">

	<link rel="shortcut icon" href="favicon.ico" />

	<meta name="og:image" property="og:image" content="[poster-url]">
	<meta property="og:image:type" content="image/jpg">
	<meta property="og:image:width" content="128">
	<meta property="og:image:height" content="128">

	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" crossorigin="anonymous">
    <style type="text/css">
		.loginform{
			margin: 10%;
		}
		@media (min-width: 768px) { 
			.loginform{
				margin-top: 100px;
			}
		}
	</style>
</head>
<body style="background-image: linear-gradient(-45deg, #6078EA, #17EAD9);">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col col-lg-4">
				<div class="loginform">
					<div style="background: #B4FFC0; box-shadow: 0px 0 10px 0px #007bff;">
						<div style="background: #11FFB6; text-align: center;vertical-align: middle; min-height: 150px;">
							<br/>
							<br/>
							<img src="images/tata_composit_logo.png" width="70%">
							<br/>
							<br/>
							<br/>
						</div>
						<div style="padding: 20px;">
							<form>
								<div class="form-group"s>
									<label for="uname">Name</label>
									<input type="text" class="form-control" id="exampleInputName" placeholder="Enter Name">
								</div>
                     			<div class="form-group"s>
									<label for="exampleInputEmail1">Email address</label>
									<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
								</div>
								<div class="form-group">
									<label for="exampleInputNPassword">New Password</label>
									<input type="password" class="form-control" id="exampleInputNPassword1" placeholder="New Password">
									<!-- <small id="emailHelp" class="form-text text-muted">Don't share your password to anyone else</small> -->
								</div>
								<div class="form-group"s>
									<label for="exampleInputPassword">Confirm Password</label>
									<input type="password" class="form-control" id="exampleInputCPassword"placeholder="Confirm Password">
								</div>
								<div class="form-group"s>
									<label for="exampleInputAddress">Address</label>
									<input type="text" class="form-control" id="exampleInputAddress" placeholder="Enter address">
								</div>
								<div class="form-group"s>
									<label for="exampleInputPinCode">PinCode</label>
									<input type="number" class="form-control" id="exampleInputPinCode" placeholder="Enter PinCode">
								</div>
								<div class="form-group"s>
									<label for="state">State</label>
									<input type="text" class="form-control" id="exampleInputState" placeholder="Enter State">
								</div>
								<div class="form-group"s>
									<label for="country">Country</label>
									<input type="text" class="form-control" id="exampleInputCountry" placeholder="Enter Country">
								</div>
								<div class="form-group"s>
									<label for="bgroup">Blood Group</label>
									<input type="text" class="form-control" id="exampleInputBloodGroup" placeholder="Enter Blood Group">
								</div>
								
								<div style="float: right;">
									<button type="submit" class="btn btn-primary">Register</button>
								</div>
								<small><a href="">Login</a></small>
							</form>
							<br>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>