<div style="background: #9B9B9B; padding: 10px;">
	<table>
		<tr>
			<td rowspan="2" style="text-align: bottom;">
				<img src="images/user.png" class="rounded" alt="Cinque Terre" width="64px">
			</td>
			<td style="padding: 10px;color: white;font-weight: bold;">
				Mr. Mukesh<br>
				Admin
			</td>
		</tr>
	</table>
</div>
<ul class="list-group">
	<a href="edit_profile.php"><li class="list-group-item <?php if($active == 'edit') echo "active_side_nav"; ?>">Edit Profile</li></a>
	<a href="application.php"><li class="list-group-item <?php if($active == 'application') echo "active_side_nav"; ?>">Application</li></a>
	<a href="request.php"><li class="list-group-item <?php if($active == 'current') echo "active_side_nav"; ?>">Request</li></a>
	<a href="forwordedd_application.php"><li class="list-group-item <?php if($active == 'forword') echo "active_side_nav"; ?>">Forwarded Application</li></a>
	<a href="Approved.php"><li class="list-group-item <?php if($active == 'approved') echo "active_side_nav"; ?>">Approved Application</li></a>
	<a href="draftlist.php"><li class="list-group-item <?php if($active == 'draft') echo "active_side_nav"; ?>">Draft</li></a>

	<a href="history.php"><li class="list-group-item <?php if($active == 'history') echo "active_side_nav"; ?>">History</li></a>
</ul>