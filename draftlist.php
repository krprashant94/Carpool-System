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
					<tbody>





						<?php foreach ($draft_list as $key => $value): ?>
						<tr class="<?=$value['draft_id'];?>">
							<th scope="row"><?=$value['draft_id'];?></th>
							<td>
								You applied for <i><?php if($value['vehicle_req']) echo $value['vehicle_req']; else echo "vehicle";?></i><br>
								<?php if ($value['start_date'] == $value['ending_date']): ?>
									On <?=$value['start_date'];?> <i>for one time</i>
								<?php else: ?>
									For <i><?=$value['start_date'];?> to <?=$value['ending_date'];?></i>
								<?php endif ?>
							</td>
							<td>
								<a href="application.php?draft_id=<?=$value['draft_id'];?>"><img onclick="edit('<?=$value['draft_id'];?>')" src="images/edit.png" title="Edit" width="20px"></a> | 
								<img onclick="delete_application('<?=$value['draft_id'];?>')" src="images/delete.png" title="Delete this draft" width="20px">
							</td>
						</tr>
						<?php endforeach ?>



					</tbody>
				</table>




			</div>
		</div>
	</div>

</body>
</html>
