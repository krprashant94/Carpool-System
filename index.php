<?php 
	include 'core/core.inc.php';
	print_r($_SESSION);
	if (isset($_SESSION['user_id'])) {
		if (!empty($_SESSION['user_id'])) {
			header("Location: dashboard.php");
		}else{
			header("Location: login.php");
		}
	}else{
		header("Location: login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta name="keyword" content="tata sponge, carpool, car, car application"/>
	<meta name="description" property="og:description" content="Book yor car instantly with TATA steel carpool network."/>
	<meta name="abstract" content="Car pool network of TATA sponge limited"/>
	<meta name="copyright"content="TATA Sponge Ltd.">
	<meta name="language" content="en">
	<meta name="robots" content="index, follow">

	<!-- <meta name="og:url" property="og:url" content="https://www.websitename.com"/> -->
	<meta name="og:title" property="og:title" content="TATA Sponge Limited"/>
	<meta property="og:site_name" content="Car pool network">

	<link rel="shortcut icon" href="favicon.ico" />

	<meta name="og:image" property="og:image" content="[poster-url]">
	<meta property="og:image:type" content="image/jpg">
	<meta property="og:image:width" content="128">
	<meta property="og:image:height" content="128">

</head>
<body>

</body>
</html>