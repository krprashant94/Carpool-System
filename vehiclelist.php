<?php 
	include 'core/core.inc.php';
	if (!isset($_SESSION['user_id'])) {
		header("Location: login.php");
	}
	include 'core/vehicle.db.php';
	$v = new Vehicle($host, $db_name, $db_user, $db_pass);
	if (isset($_GET['del'])) {
		$v->delete($_GET['del']);
		header("Location: vehiclelist.php");
	}
	$vehiclelist = $v->fetch_by_id(1, 1);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta name="og:title" property="og:title" content="TATA Sponge Limited :: History"/>
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
					$active = "vehiclelist";
					require "core/side_nav.php";
				?>
			</div>
			<div class="col-md-9">
				<nav class="navbar navbar-light bg-light">
					<a class="navbar-brand">Vehicle List</a>
				</nav>
				<table class="table table-striped table-hover" id="list_table">
					<thead class="thead-dark">
						<tr>
							<th scope="col">Number</th>
							<th scope="col">Type</th>
							<th scope="col">Last Issue</th>
							<th scope="col">Location</th>
							<th scope="col">Operation</th>
						</tr>
						<tbody>
							<?php foreach ($vehiclelist as $key => $value): ?>
								<tr>
									<th scope="row"><?=$value['no'];?></th>
									<td><?=$value['type'];?> (<?=$value['subtype'];?>)</td>
									<td><?=$value['status'];?></td>
									<td><?=$value['location'];?></td>
									<td><a href="vehiclelist.php?del=<?=$value['no'];?>">Delete</a></td>
								</tr>
							<?php endforeach ?>
						</tbody>
				</table>

			</div>
		</div>
	</div>

</body>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/swal.js"></script>


<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>

<script type="text/javascript">
	$(document).ready( function () {
		$('#list_table').DataTable();
	} );
</script>
</html>
