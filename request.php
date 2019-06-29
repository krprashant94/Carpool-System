<?php 
	include 'core/core.inc.php';
	if (!isset($_SESSION['user_id'])) {
		header("Location: login.php");
	}
	include 'core/application.db.php';
	$a = new Application($host, $db_name, $db_user, $db_pass);
	$recived_application = $a->applicatioin_joint_details($_SESSION['user_id']);
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
<!-- 
	<link rel="stylesheet" type="text/css" href="css/datatables.js">
	<link rel="stylesheet" type="text/css" href="css/datatables.min.js">
	<link rel="stylesheet" type="text/css" href="css/datatables.css">
	<link rel="stylesheet" type="text/css" href="css/datatables.min.css"> -->
	<style type="text/css">
		.applicatio_list img{
			cursor: pointer;
		}
	</style>
</head>
<body>
	<?php
		require "core/top_nav.php";
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col col-lg-3 side_nav">
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
							<th scope="col" style="width: 10%;">Draft no</th>
							<th scope="col">Details</th>
							<th scope="col" style="width: 20%;">Operation</th>
						</tr>
					</thead>
					<tbody class="applicatio_list">
						<?php foreach ($recived_application as $key => $value): ?>
						<tr class="<?=$value['draft_id'];?>">
							<th scope="row"><?=$value['draft_id'];?></th>
							<td>
								<b><?=$value['f_name'];?> <?=$value['m_name'];?> <?=$value['surname'];?> (<i><?=$value['department'];?></b></i>) on 20-june-2019<br>
								<?php if ($value['start_date'] == $value['ending_date']): ?>
									Need <?=$value['vehicle_req'];?> on <?=$value['start_date'];?> <i>for one time</i>
								<?php else: ?>
									Need <?=$value['vehicle_req'];?> for <i><?=$value['start_date'];?> to <?=$value['ending_date'];?></i>
								<?php endif ?>
							</td>
							<td>
								<img onclick="pass('<?=$value['draft_id'];?>')" src="images/accept.png" title="Accept this application and issue a vehicle." width="20px"> | 
								<img onclick="forword('<?=$value['draft_id'];?>')" src="images/send.png" title="Forword to higher authority." width="20px"> | 
								<img onclick="reject('<?=$value['draft_id'];?>')" src="images/reject.png" title="Reject this application" width="20px"> | 
								<img onclick="view('<?=$value['draft_id'];?>')" src="images/view.png" title="View this application" width="20px">
							</td>
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
<script type="text/javascript">
	function reject(e) {
		console.log(e);
		$('.'+e).hide();
	}
	function forword(e) {
		console.log(e);
		$('.'+e).hide();
	}
	function pass(e) {
		console.log(e);
		$('.'+e).hide();
	}
	function view(e) {
		console.log(e);
		$('.'+e).hide();
	}
</script>
</html>