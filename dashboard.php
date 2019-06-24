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
	<style type="text/css">
		.list-group-item{
			background-color: #AFAFAF;
			border:0px;
			cursor: pointer;
			/*font-weight: bold;*/
			color: white;
		}
		.list-group-item:hover{
			background-color: #5ABDFF;
		}
		.poolcard{
			box-shadow: 0 0 10px 0 #5ABDFF;
		}
		@media (max-width: 992px) { 
			.poolcard{
				margin: 20px;
			}
		}
	</style>
</head>
<body>

<nav class="navbar navbar-dark bg-info" style="background-image: linear-gradient(-45deg, #6078EA, #17EAD9);">
 	<a class="navbar-brand" href="#">TATA Sponge</a>
	<button class="btn btn-primary my-2 my-sm-0" type="submit">Logout</button>
</nav>


<div class="container-fluid">
	<div class="row">
		<div class="col col-lg-3" style="background: #AFAFAF; min-height: 91.5vh; padding: 0px;">
			<div style="background: #9B9B9B; padding: 10px;">
				<table>
					<tr>
						<td rowspan="2" style="text-align: bottom;">
							<img src="images/user.png" class="rounded" alt="Cinque Terre" width="64px">
						</td>
						<td style="padding: 10px;color: white;font-weight: bold;">
							Prashant Kumar Prasad<br>
							Admin
						</td>
					</tr>
				</table>
			</div>
			<ul class="list-group">
				<li class="list-group-item">Item One</li>
				<li class="list-group-item">Item One</li>
				<li class="list-group-item">Item One</li>
				<li class="list-group-item">Item One</li>
				<li class="list-group-item">Item One</li>
			</ul>
		</div>
		<div class="col-md-9">
			<br><br><br><br>
			<div class="row justify-content-center">
				<div class="col-lg-3">
					<div class="card poolcard">
						<img class="card-img-top" src="..." alt="Card image cap">
						<div class="card-body">
							<center><h5 class="card-title">50 car pools</h5></center>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="card poolcard">
						<img class="card-img-top" src="..." alt="Card image cap">
						<div class="card-body">
							<center><h5 class="card-title">5000 Km </h5></center>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="card poolcard">
						<img class="card-img-top" src="..." alt="Card image cap">
						<div class="card-body">
							<center><h5 class="card-title">5 location</h5></center>
						</div>
					</div>
				</div>
			</div>
			<br><br>
			<div>
				<center><iframe src="calender/index.php" style="border: 0px; height: 270px;"></iframe></center>
			</div>
		</div>
	</div>
</div>







</body>
</html>