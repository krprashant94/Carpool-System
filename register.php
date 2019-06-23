<?php 
	include 'core/core.inc.php';
	print_r($_SESSION);
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
	<link rel="stylesheet" type="text/css" href="css/register.css">

</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col">
				


				</div>
			<div class="col">
				<form action="action_page.php">
					  <div class="imgcontainer">
    <img src="images\tata.jpg" width="192px" alt="tata" class="tata">
  </div>

  <div class="container">
  	<label for="uname"><b>Name</b></label>
    <input type="text" placeholder=" " name="Name" required>

 
    <label for="phn"><b>Phone</b></label>
    <input type="text" placeholder=" " name="Phone" required>


    <label for="mail"><b>Emailid</b></label>
    <input type="text" placeholder=" " name="mailid" required>

    <label for="npsw"><b>New Password</b></label>
    <input type="text" placeholder=" " name="npsw" required>

    <label for="cpsw"><b>Confirm Password</b></label>
    <input type="text" placeholder=" " name="cpsw" required>


    <label for="adrs"><b>Address</b></label>
    <input type="text" placeholder=" " name="adrs" required>


    <label for="pin"><b>Pincode</b></label>
    <input type="text" placeholder=" " name="pin" required>


    <label for="state"><b>State</b></label>
    <input type="text" placeholder=" " name="state" required>


    <label for="cntry"><b>Country</b></label>
    <input type="text" placeholder=" " name="cntry" required>


    <label for="bg"><b>Blood Group</b></label>
    <input type="text" placeholder=" " name="bg" required>
     </div>

    <div class="container" style="background-color:#B4FFC0">
    <span class="psw"><a href="#">login</a></span>
       

  <div class="container" style="background-color:#B4FFC0">
    <button type="button" class="registerbtn">Register</button>

    
  </div>
</form>







					</div>
			<div class="col">
				

			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src=""bootstrap/js/bootstrap.min.js""></script>
</html>
