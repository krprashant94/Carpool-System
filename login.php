<?php 
	include 'core/core.inc.php';
	if (isset($_SESSION['user_id'])) { header("Location: dashboard.php");	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta name="keyword" content="tata sponge, carpool, car, car application"/>
	<meta name="description" property="og:description" content="Book yor car instantly with TATA steel carpool network."/>
	<meta name="abstract" content="Car pool network of TATA sponge limited"/>
	<meta name="copyright"content="TATA Sponge Ltd.">
	<meta name="language" content="en">
	<meta name="robots" content="index, follow">

	<meta name="og:url" property="og:url" content="<?php echo $_SERVER['HTTP_HOST']; ?>"/>
	<meta name="og:title" property="og:title" content="TATA Sponge Limited :: Login"/>
	<meta property="og:site_name" content="Car pool network">

	<link rel="shortcut icon" href="favicon.ico" />

	<meta name="og:image" property="og:image" content="[poster-url]">
	<meta property="og:image:type" content="image/jpg">
	<meta property="og:image:width" content="128">
	<meta property="og:image:height" content="128">

	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col col-lg-4">
				<div class="loginform">
					<div class="innerbox">
						<div class="toplogo">
							<br/>
							<br/>
							<img src="images/tata_composit_logo.png" width="70%">
							<br/>
							<br/>
							<br/>
						</div>
						<div class="formbox">
							<form method="POST">
								<div class="form-group"s>
									<label for="exampleInputEmail1">Email address</label>
									<input type="email" name="user" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Password</label>
									<input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
									<!-- <small id="emailHelp" class="form-text text-muted">Don't share your password to anyone else</small> -->
								</div>
								<center><button type="submit" class="btn btn-primary">Login</button></center>
							</form>
							<br>
							<div class="foottext">
								<small><a href="">Register</a> | <a href="">Forgot Password</a></small>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>





















<!-- 
	<div class="container">
		<div class="container" >
		<div class="row">
			<div class="col-1">
				
			</div>
			<div class="col-2">
			<form>
	<div class="form-group">
		<label for="exampleInputEmail1">Phone/Email address</label>
		<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
		<small id="emailHelp" class="form-text text-muted"></small>
	</div>
	<div class="form-group">
		<label for="exampleInputPassword1">Password</label>
		<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
	</
	</div>
</form>
		<center> <button type="button" class="btn btn-primary center">Login</button><center>
		<bottom-left><button type="button" class="btn btn-primary center">Register</button><bottom-left>
			<a class="btn btn-link" href="#" role="button">Forgot Password?</a>
</form>
			</div>
			<div class="col-3">
				

			</div>
		</div>
	</div> -->
</body>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</html>