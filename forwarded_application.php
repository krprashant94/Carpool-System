<?php 
	include 'core/core.inc.php';
	if (!isset($_SESSION['user_id'])) {
		header("Location: login.php");
	}

	include 'core/application.db.php';
	$a = new Application($host, $db_name, $db_user, $db_pass);
	$draft_list = $a->application_joint_details_fwd($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Forworded</title>
	<meta name="og:title" property="og:title" content="TATA Sponge Limited :: Forworded"/>
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
		require "core/top_nav.php";
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col col-lg-3 side_nav">
				<?php
					$active = "forword";
					require "core/side_nav.php";
				?>
			</div>
			<div class="col-md-9">
				<nav class="navbar navbar-light bg-light">
					<a class="navbar-brand">Current Request List</a>
				</nav>
				<table class="table table-striped table-hover" id="list_table">
					<thead class="thead-dark">
						<tr>
							<th scope="col" style="width: 10%;">Draft ID</th>
							<th scope="col">setails</th>
							<th scope="col" style="width: 20%;">Operation</th>
						</tr>
					</thead>
					<tbody class="applicatio_list">
						<?php foreach ($draft_list as $key => $value): ?>
						<tr class="<?=$value['draft_id'];?>">
							<th scope="row"><?=$value['draft_id'];?></th>
							<td>
								<b><?=$value['f_name'];?> <?=$value['m_name'];?> <?=$value['surname'];?> (<i><?=$value['department'];?></b></i>) on <?=date('d-m-Y, h:i A', $value['application_date']);?><br>
								For <i><?=date('d-m-Y, h:i A', $value['start_date']);?> to <?=date('d-m-Y, h:i A', $value['ending_date']);?></i>
							</td>
							<td>
								<center>
									<img onclick="pass('<?=$value['draft_id'];?>', '<?=$value['start_date'];?>', '<?=$value['ending_date'];?>')" src="images/accept.png" title="Accept this application and issue a vehicle." width="20px"> | 
									<img onclick="forword('<?=$value['draft_id'];?>')" src="images/send.png" title="Forword to higher authority." width="20px"> | 
									<img onclick="reject('<?=$value['draft_id'];?>')" src="images/reject.png" title="Reject this application" width="20px"> | 
									<img onclick="view('<?=$value['draft_id'];?>')" src="images/view.png" title="View this application" width="20px">
								</center>
							</td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>

			</div>
		</div>
	</div>

<?php  include_once 'core/model_operation.inc.php'; ?>

</body>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/swal.js"></script>

<script type="text/javascript" src="js/listoperation.js"></script>

<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
		$('#list_table').DataTable();
	} );
</script>
</html>