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

	<meta name="og:title" property="og:title" content="TATA Sponge Limited :: Request"/>
	<?php
		include 'core/meta.php';
	?>
	<link rel="stylesheet" href="css/core.css">


	<link rel="stylesheet" type="text/css" href="css/datatables.js">
	<link rel="stylesheet" type="text/css" href="css/datatables.min.js">
	<link rel="stylesheet" type="text/css" href="css/datatables.css">
	<link rel="stylesheet" type="text/css" href="css/datatables.min.css">
</head>
<body>
	<?php
		require "core/top_nav.php";
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col col-lg-3 side_nev">
				<?php
					$active = "current";
					require "core/side_nav.php";
				?>
			</div>
			<div class="col-md-9">
				


<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand">Current Request List</a>
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>
				<table class="table table-striped table-hover">
					<thead class="thead-dark">
						<tr>
							<th scope="col" style="width: 10%;">Serial no</th>
							<th scope="col">Description</th>
							<th scope="col" style="width: 20%;">Operation</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">1</th>
							<td>
								<b>Mukesh Kumar</b> <b>(<i>Accounts</i>)</b> on 20-june-2019<br>

								Application for honda city - <i>25-June-2019 to 26-June-2019</i>
							</td>
							<td><img src="images/accept.png" width="24px"> | <img src="images/reject.png" width="24px"> |  <img src="images/p.png" width="24px"> | <img src="images/notify.png" width="24px"></td>
						</tr>
						<tr>
							<th scope="row">2</th>
							<td><b>Raj Kumar</b> <b>(<i>Sales</i>)</b> on 20-june-2019<br>

								Application for honda city - <i>25-June-2019 to 26-June-2019</i></td>
							<td><img src="images/accept.png" width="24px"> | <img src="images/reject.png" width="24px"> |  <img src="images/p.png" width="24px"> | <img src="images/notify.png" width="24px"></td>
						</tr>
						<tr>
							<th scope="row">3</th>
							<td><b>Prashant Kumar</b> <b>(<i>Information Technology</i>)</b> on 20-june-2019<br>

								Application for honda city - <i>25-June-2019 to 26-June-2019</i></td>
							<td><img src="images/accept.png" width="24px"> | <img src="images/reject.png" width="24px"> |  <img src="images/p.png" width="24px"> | <img src="images/notify.png" width="24px"></td>

						</tr>
					</tbody>
				</table>








			</div>
		</div>
	</div>

</body>
</html>