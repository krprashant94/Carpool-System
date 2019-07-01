</<?php
include 'core/core.inc.php';
	if (isset($_SESSION['user_id'])) { header("Location: dashboard.php");	}

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
	<style type="text/css">
		.paper_form input{
			/*border: 0px;*/
		}
		.paper_form label{
			padding: 0 0 0 15px;
		}
	</style>
</head>



	<body>

<?php
		require "history.php";
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-9">
				<center>
					<h1>Application</h1>
				</center>
				<br/>
				<form class="paper_form" method="POST">
        <div class="formbox">
							<form method="POST">
								<div class="form-group"s>
									<h4>To,</h4>
									 ["text"]
								</div>
								<div class="form-group"s>
									<h4>Department</h4>
									 ["text"]
								</div>
								<div class="form-group"s>
									<h4>Date</h4>
									 ["text"]
								</div>
								<div class="form-group"s>
									<h4>Subject</h4>
									 ["Requesting for a vichle from(date)to(date)"]
								</div>
								<div class="form-group"s>
									<h4>Pickup location</h4>
									 ["Requesting for a vichle from(date)to(date)"]
								</div>
								<div class="form-group"s>
									<h4>Message</h4>
									 [" "]
  <br><br>
  <label>
    <button type="button" class="btn btn-outline-success">Accept</button>
  </label>
  <label>
  	<button type="button" class="btn btn-outline-danger">Reject</button>
  </label>
  <label class="btn btn-secondary">
    <button type="button" class="btn btn-outline-primary">Forwarded</button>
  </label>
</div>
	</form>
	</body>
	</head>
	</html>