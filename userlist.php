<?php 
	include 'core/core.inc.php';
	if (!isset($_SESSION['user_id'])) {
		header("Location: login.php");
	}
	include 'core/application.db.php';
	$a = new Application($host, $db_name, $db_user, $db_pass);
	$draft_list = $a->applicant_joint_details($_SESSION['user_id']);
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
					$active = "history";
					require "core/side_nav.php";
				?>
			</div>
			<div class="col-md-9">

				<nav class="navbar navbar-light bg-light">
					<a class="navbar-brand">History</a>
				</nav>
				<table class="table table-striped table-hover" id="list_table">
					<thead class="thead-dark">
						<tr>
							<th scope="col">Employee</th>
							<th scope="col">Contact</th>
							<th scope="col">Image</th>
							<th scope="col">Operation</th>
						</tr>
					</thead>
					<tbody  class="applicatio_list">
						<tr>
							<td>Name <small>mailid@gmail.com</small></td>
							<td>Phone</td>
							<td><img src="images/user.png" width="32px"></td>
							<td><button class="btn btn-link" onclick="showPromote(10)">Promote</button></td>
						</tr>

					</tbody>
				</table>

			</div>
		</div>
	</div>





	<form>
		<div class="modal fade" id="promoteModel" tabindex="-1" role="dialog" aria-labelledby="promoteModelLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="promoteModelLabel">Approve this application</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">

						<div class="form-group row">
							<label for="post" class="col-sm-5 col-form-label">Designation</label>
							<div class="col-sm-7">
								<select name="vichel_no" class="form-control vichelList" id="post">
									<option value="1"></option>
									<option value="2"></option>
									<option value="3"></option>
									<option value="4"></option>
								</select>
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

<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>

<script type="text/javascript">
	$(document).ready( function () {
		$('#list_table').DataTable();
	} );
	function showPromote(user_id) {
		console.log(user_id);
		$("#promoteModel").modal('show');
	}
</script>
</html>
