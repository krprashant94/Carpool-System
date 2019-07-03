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
				</nav>
				<table class="table table-striped table-hover" id="list_table">
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
								<a href="read_only_view.php?view_id=<?=$value['draft_id'];?>"> <img src="images/view.png" title="View this application" width="20px"></a>
							</td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>


			</div>
		</div>
	</div>





<form>
	<div class="modal fade" id="fwdModel" tabindex="-1" role="dialog" aria-labelledby="fwdModelLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="fwdModelLabel">Forword this application</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label">Forword To</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputEmail3" name="fwd_name" placeholder="Forword to">
							<input type="hidden" name="forword_to" value="6">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputPassword3" class="col-sm-3 col-form-label">Message</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputPassword3" name="message" placeholder="Message">
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-success" onclick="send_form(this.form)">Send</button>
				</div>
			</div>
		</div>
	</div>
</form>



<form>
	<div class="modal fade" id="passModel" tabindex="-1" role="dialog" aria-labelledby="passModelLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="passModelLabel">Approve this application</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-5 col-form-label">Vichel Number</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="inputEmail3" name="vichel_no" placeholder="Forword to">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-success" onclick="pass_form(this.form)">Approve</button>
				</div>
			</div>
		</div>
	</div>
</form>







</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/swal.js"></script>
<script type="text/javascript" src="js/listoperation.js"></script>

<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
</html>