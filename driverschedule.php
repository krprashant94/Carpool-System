<?php 
	include 'core/core.inc.php';
	if (!isset($_SESSION['user_id'])) {
		header("Location: login.php");
	}
	include 'core/application.db.php';
	$a = new Application($host, $db_name, $db_user, $db_pass);
	$shedule = $a->getDriverSchedule($_SESSION['user_id']);
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
					$active = "driverschedule";
					require "core/side_nav.php";
				?>
			</div>
			<div class="col-md-9">

				<nav class="navbar navbar-light bg-light">
					<a class="navbar-brand">Driver Schedule</a>
				</nav>
				<table class="table table-striped table-hover" id="list_table">
					<thead class="thead-dark">
						<tr>
							<th scope="col">Vehicle Number</th>
							<th scope="col">Vehicle Name</th>
							<th scope="col">Start Time</th>
							<th scope="col">End Time</th>
						</tr>
					</thead>
					<tbody  class="applicatio_list">
						<?php foreach ($shedule as $key => $value): ?>
						<tr>
							<th scope="row"><?=$value['no'];?></th>
							<td><?=$value['type'];?> (<?=$value['subtype'];?>)</td>
							<td><?=date('d-M-Y, H:i A', $value['start_date']);?></td>
							<td><?=date('d-M-Y, H:i A', $value['ending_date']);?></td>
						</tr>
						<?php endforeach ?>

					</tbody>
				</table>

			</div>
		</div>
	</div>

</body>
<?php include_once 'core/basic_java.inc.php'; ?>

<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>

<script type="text/javascript">
	$(document).ready( function () {
		$('#list_table').DataTable();
	} );
</script>
</html>
