<?php 
	include 'core/core.inc.php';
	if (!isset($_SESSION['user_id'])) {
		header("Location: login.php");
	}
	include 'core/user.db.php';
	$u = new User($host, $db_name, $db_user, $db_pass);
	$user_list = $u->fetch_by_id('department', $_SESSION['department']);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta name="og:title" property="og:title" content="TATA Sponge Limited :: User list"/>
	<?php
		include 'core/meta.php';
	?>
	<link rel="stylesheet" href="css/core.css">
	<style type="text/css">
		#list_table td{
			vertical-align: middle;
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
					$active = "userlist";
					require "core/side_nav.php";
				?>
			</div>
			<div class="col-md-9">

				<nav class="navbar navbar-light bg-light">
					<a class="navbar-brand">Employee</a>
				</nav>
				<table class="table table-striped table-hover" id="list_table">
					<thead class="thead-dark">
						<tr>
							<th scope="col">Employee</th>
							<th scope="col">Contact</th>
							<th scope="col">Image</th>
							<?php if ($_SESSION['auth_level'] > 3): ?>
								<th scope="col">Operation</th>
							<?php endif ?>
						</tr>
					</thead>
					<tbody  class="applicatio_list">
						<?php foreach ($user_list as $key => $value): ?>
							<?php if ($value['id'] != $_SESSION['user_id'] && $value['auth_level'] < $_SESSION['auth_level']): ?>								
								<tr>
									<?php
										$user_profile_pic = "images/userdata/user_".$value['id']."_32.jpg";
										if (!file_exists($user_profile_pic)) {
											$user_profile_pic =  "images/user.png";
										}
									?>
									<td><?=$value['f_name'];?> <?=$value['m_name'];?> <?=$value['surname'];?> <small style="color: #5abdff;"><a href="mailto:<?=$value['mail_id'];?>"><?=$value['mail_id'];?></a></small></td>
									<td><a href="tel:<?=$value['phone'];?>"><?=$value['phone'];?></a></td>
									<td><img src="<?=$user_profile_pic;?>" width="32px"></td>
									<?php if ($_SESSION['auth_level'] > 3): ?>
										<td><button class="btn btn-link" onclick="showPromote(<?=$value['id'];?>)">Promote</button></td>
									<?php endif ?>
								</tr>
							<?php endif ?>
						<?php endforeach ?>

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
						<h5 class="modal-title" id="promoteModelLabel">Authentication Promotion</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">

						<div class="form-group row">
							<label for="post" class="col-sm-5 col-form-label">Designation</label>
							<div class="col-sm-7">
								<select name="post" class="form-control vichelList" id="post">
									<option value="1">Leval 1 : Department Head</option>
									<option value="2">Leval 2 : Department Head</option>
									<option value="3">Leval 3 : Department Head</option>
									<option value="4">Leval 4 : Plant Head</option>
									<option value="5">Leval 5 : System Admin</option>
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-success" onclick="promote(this.form)">Approve</button>
					</div>
				</div>
			</div>
		</div>
	</form>









</body>
<?php include_once 'core/basic_java.inc.php'; ?>

<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>

<script type="text/javascript">
	var active_user = null;
	$(document).ready( function () {
		$('#list_table').DataTable();
	} );
	function showPromote(user_id) {
		console.log(user_id);
		$("#promoteModel").modal('show');
		active_user = user_id;
	}
	function promote(e) {
		console.log("User ID : " + active_user + " , Promotion :" + e.post.value);


		$.ajax({
				type: "POST",
				url: 'operation.php',
				data: 'user_id='+active_user+"&auth_level="+e.post.value,
				dataType: 'HTML',
				success: function (res) {
					console.log(res);
					if (res == 'true') {

						active_user = null;
						$("#promoteModel").modal('hide');
					}
					else{
						swal({
							dangerMode: true,
							text:"Unable to promote user. Make sure for the folowing \n 1. You are promoting your junior\n 2. Not promoting to your position\n3. Not promoting yourself",
							icon: "error"
						});
					}
				},
				error: function (e, xhr, state) {
					console.log('Error [core/userlist.php] : ',e);
					swal({
						dangerMode: true,
						title:"Internal server error",
						text:"With status "+state+"\nView console log for more details, if you are a webmaster." ,
						icon: "error"
					});
				}
			});



	}
</script>
</html>
