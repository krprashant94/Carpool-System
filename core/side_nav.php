<div class="side_nav_top">
	<table>
		<tr>
			<td rowspan="2" style="text-align: bottom;">
				<img src="images/user.png" class="rounded" alt="Cinque Terre" width="64px">
			</td>
			<td style="padding: 10px;color: white;font-weight: bold;">
				<?php echo $_SESSION['name']; ?><br>
				<?php echo $_SESSION['department']; ?>
			</td>
		</tr>
	</table>
</div>
<ul class="list-group">
	<a href="edit_profile.php"><li class="list-group-item list_itm <?php if($active == 'edit') echo "active_side_nav"; ?>">Edit Profile</li></a>
	<a href="application.php"><li class="list-group-item list_itm <?php if($active == 'application') echo "active_side_nav"; ?>">Application</li></a>
	<?php if ($_SESSION['auth_level'] > 0): ?>
		<a href="request.php"><li class="list-group-item list_itm <?php if($active == 'current') echo "active_side_nav"; ?>">Request</li></a>
	<?php endif ?>
	<?php if ($_SESSION['auth_level'] > 1): ?>
		<a href="forwarded_application.php"><li class="list-group-item list_itm <?php if($active == 'forword') echo "active_side_nav"; ?>">Forwarded Application</li></a>
		<a href="vehiclelist.php"><li class="list-group-item list_itm <?php if($active == 'vehiclelist') echo "active_side_nav"; ?>">Vehicle List</li></a>
	<?php endif ?>
	<?php if ($_SESSION['auth_level'] > 2): ?>
		<a href="new_vehicle.php"><li class="list-group-item list_itm <?php if($active == 'vehicle') echo "active_side_nav"; ?>">New Vehicle</li></a>
		<a href="userlist.php"><li class="list-group-item list_itm <?php if($active == 'userlist') echo "active_side_nav"; ?>">Employee</li></a>
	<?php endif ?>
	<a href="draftlist.php"><li class="list-group-item list_itm <?php if($active == 'draft') echo "active_side_nav"; ?>">Draft</li></a>
	<a href="history.php"><li class="list-group-item list_itm <?php if($active == 'history') echo "active_side_nav"; ?>">History</li></a>
</ul>