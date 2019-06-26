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
					$active = "application";
					require "core/side_nav.php";
				?>
			</div>
			<div class="col-md-9">
				<br>
				<form>
					<center><h1 class="text-white bg-dark">Application</h1></center>
					<div>
						<span class="text-success">Application id:</span>
						<span class="text-success" style="float: right;padding-right:60px;">Draft id</span>
				</div>
				<br><div class="form-row">
						<div class="form-group col-md-4">
							<!-- <label for="name"></label> -->
							<input type="text" class="form-control" id="name" value="" placeholder="To">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<!-- <label for="dept"></label> -->
							<input type="text" class="form-control" id="dept" value="" placeholder="Department">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<!-- <label for="dept"></label> -->
							<input type="text" class="form-control" id="dept" value="" placeholder="Application Date">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<!-- <label for="dept"></label> -->
							<input type="text" class="form-control" id="dept" value="" placeholder="from">
						</div>
					</div>
						<div class="form-group">
						    <label for="exampleFormControlTextarea1">Message</label>
						    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
						  </div>
					     <center><button type="button" class="btn btn-primary">Submit</button></center> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>