<?php 
	include 'core/core.inc.php';
	if (!isset($_SESSION['user_id'])) {
		header("Location: login.php");
	}
	include 'core/application.db.php';
	$a = new Application($host, $db_name, $db_user, $db_pass);
	$draft_list = $a->applicant_joint_details($_SESSION['user_id'], 'N');
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
	<style type="text/css">
		#list_table img{
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
					$active = "draft";
					require "core/side_nav.php";
				?>
			</div>
			<div class="col-md-9">
				<nav class="navbar navbar-light bg-light">
					<a class="navbar-brand">Draft List</a>
				</nav>
				<table class="table table-striped table-hover" id="list_table">
					<thead class="thead-dark">
						<tr>
							<th scope="col">Draft no</th>
							<th scope="col">Details</th>
							<th scope="col">Operation</th>
						</tr>
					</thead>
					<tbody>

						<?php foreach ($draft_list as $key => $value): ?>
						<tr class="<?=$value['draft_id'];?>">
							<th scope="row"><?=$value['draft_id'];?></th>
							<td>
								You applied for <i><?php if($value['vehicle_req']) echo $value['vehicle_req']; else echo "vehicle";?></i> <small><?=date('d-m-Y, h:i A', $value['application_date']);?></small><br>
								For <i><?=date('d-m-Y, h:i A', $value['start_date']);?> to <?=date('d-m-Y, h:i A', $value['ending_date']);?></i>
							</td>
							<td>
								<center>
									<a href="application.php?draft_id=<?=$value['draft_id'];?>"><img onclick="edit('<?=$value['draft_id'];?>')" src="images/edit.png" title="Edit" width="20px"></a> | 
									<img onclick="delete_application('<?=$value['draft_id'];?>')" src="images/delete.png" title="Delete this draft" width="20px">
								</center>
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


<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<script type="text/javascript" src="js/listoperation.js"></script>


<script type="text/javascript">
	$(document).ready( function () {
		$('#list_table').DataTable();
	} );
</script>
</html>
