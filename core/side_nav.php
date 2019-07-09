<?php
	$profile_pic_file = "images/userdata/user_".$_SESSION['user_id']."_64.jpg";
	if (!file_exists($profile_pic_file)) {
		$profile_pic_file = "images/user.png";
	}
?>

<div class="side_nav_top">
	<table>
		<tr>
			<td rowspan="2" style="text-align: bottom; cursor: pointer;"  data-toggle="tooltip" title="Change Profile Picture" onclick="$('#imageUploadModel').modal('show')">
				<img src="<?=$profile_pic_file;?>" class="rounded" alt="Upload" width="64px">
			</td>
			<td style="padding: 10px;color: white;font-weight: bold;">
				<?php echo $_SESSION['name']; ?><br>
				<?php echo $_SESSION['department']; ?>
			</td>
		</tr>
	</table>
</div>


<form method="POST" action="image_upload.php" enctype="multipart/form-data">
	<div class="modal fade" id="imageUploadModel" tabindex="-1" role="dialog" aria-labelledby="imageUploadModelLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="imageUploadModelLabel">Image Upload</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

						<div class="form-group">
							<label for="exampleFormControlFile1">Upload an Image (jpg, png only less then 512kb)</label>
							<input type="file"  name="image" class="form-control-file" id="exampleFormControlFile1">
						</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-success" name="submit" value="Upload">
				</div>
			</div>
		</div>
	</div>
</form>




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
	<?php endif ?>
	<?php if ($_SESSION['auth_level'] > 1): ?>
		<a href="userlist.php"><li class="list-group-item list_itm <?php if($active == 'userlist') echo "active_side_nav"; ?>">Employee</li></a>
	<?php endif ?>
	<a href="draftlist.php"><li class="list-group-item list_itm <?php if($active == 'draft') echo "active_side_nav"; ?>">Draft</li></a>
	<a href="history.php"><li class="list-group-item list_itm <?php if($active == 'history') echo "active_side_nav"; ?>">History</li></a>
</ul>
