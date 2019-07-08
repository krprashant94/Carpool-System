<?php 
	include 'core/core.inc.php';
	if (!isset($_SESSION['user_id'])) {
		header("Location: login.php");
	}

	include_once 'core/user.db.php';
	$u = new User($host, $db_name, $db_user, $db_pass);
	$user_details = $u->fetch_by_id('id', $_SESSION['user_id'])[0];
	$department_list = $u->getDepartments();

	$message = false;
	$sucess = false;

	if (isset($_POST['submit'])) {
		if($user_details['f_name'] != $_POST['f_name']){
			$u->update('f_name', $_POST['f_name'], $_SESSION['user_id']);
			$_SESSION['name'] = $_POST['f_name'].' '.$_POST['m_name'].' '.$_POST['surname'];
		}
		if($user_details['m_name'] != $_POST['m_name']){
			$u->update('m_name', $_POST['m_name'], $_SESSION['user_id']);
			$_SESSION['name'] = $_POST['f_name'].' '.$_POST['m_name'].' '.$_POST['surname'];
		}
		if($user_details['surname'] != $_POST['surname']){
			$u->update('surname', $_POST['surname'], $_SESSION['user_id']);
			$_SESSION['name'] = $_POST['f_name'].' '.$_POST['m_name'].' '.$_POST['surname'];
		}
		if($user_details['phone'] != $_POST['phone']){ $u->update('phone', $_POST['phone'], $_SESSION['user_id']); }
		if($user_details['blood_group'] != $_POST['blood_group']){ $u->update('blood_group', $_POST['blood_group'], $_SESSION['user_id']); }
		if($user_details['house_no'] != $_POST['house_no']){ $u->update('house_no', $_POST['house_no'], $_SESSION['user_id']); }
		if($user_details['address_l1'] != $_POST['address_l1']){ $u->update('address_l1', $_POST['address_l1'], $_SESSION['user_id']); }
		if($user_details['address_l2'] != $_POST['address_l2']){ $u->update('address_l2', $_POST['address_l2'], $_SESSION['user_id']); }
		if($user_details['city'] != $_POST['city']){ $u->update('city', $_POST['city'], $_SESSION['user_id']); }
		if($user_details['state'] != $_POST['state']){ $u->update('state', $_POST['state'], $_SESSION['user_id']); }
		if($user_details['pincode'] != $_POST['pincode']){ $u->update('pincode', $_POST['pincode'], $_SESSION['user_id']); }
		if($user_details['country'] != $_POST['country']){ $u->update('country', $_POST['country'], $_SESSION['user_id']); }
		if($user_details['landmark'] != $_POST['landmark']){ $u->update('landmark', $_POST['landmark'], $_SESSION['user_id']); }
		if($user_details['dl_no'] != $_POST['dl_no']){ $u->update('dl_no', $_POST['dl_no'], $_SESSION['user_id']); }
		if($user_details['department'] != $_POST['department']){
			$u->update('department', $_POST['department'], $_SESSION['user_id']);
			$_SESSION['department'] = $_POST['department'];
		}
		if($user_details['identification'] != $_POST['identification']){ $u->update('identification', $_POST['identification'], $_SESSION['user_id']); }

		if (sha1($_POST['pass_old_xjlok']) == $user_details['password']) {
			if (strlen($_POST['new_password']) > 5 ) {
				if ($_POST['new_password'] == $_POST['confirm_password']) {
					$u->update('password', sha1($_POST['confirm_password']), $_SESSION['user_id']);
					$sucess = "Password changed";
				}else{
					$message = "Password and Confirm password is not same";
				}
			}else{
				$message = "Too short password";
			}
		}

		$user_details = $u->fetch_by_id('id', $_SESSION['user_id'])[0];
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta name="og:title" property="og:title" content="TATA Sponge Limited :: Edit"/>
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
					$active = "edit";
					require "core/side_nav.php";
				?>
			</div>
			<div class="col-md-9">
				<br><br>
				<form class="needs-validation" novalidate method="POST">
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="f_name">First name</label>
							<input type="text" class="form-control" id="f_name" name="f_name" value="<?=$user_details['f_name'];?>">
						</div>
						<div class="form-group col-md-4">
							<label for="m_name">Middle name</label>
							<input type="text" class="form-control" id="m_name" name="m_name" value="<?=$user_details['m_name'];?>">
						</div>
						<div class="form-group col-md-4">
							<label for="surname">Surname</label>
							<input type="text" class="form-control" id="surname" name="surname" value="<?=$user_details['surname'];?>">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-5">
							<label for="mail_id">Email</label>
							<input type="email" class="form-control" id="mail_id" name="mail_id" value="<?=$user_details['mail_id'];?>" readonly>
						</div>
						<div class="form-group col-md-5">
							<label for="phone">Phone Number</label>
							<input type="number" class="form-control" id="phone" name="phone" value="<?=$user_details['phone'];?>">
						</div>
						<div class="form-group col-md-2">
							<label for="inputState">Blood Group</label>
	 						<select id="inputState" class="form-control" name="blood_group">
	 						<?php if (!empty($user_details['blood_group'])): ?>
	 							<option><?=$user_details['blood_group'];?></option>
	 						<?php else: ?>
								<option selected>Choose...</option>
	 						<?php endif ?>
								<option>A+</option>
								<option>A-</option>
								<option>B+</option>
								<option>B-</option>
								<option>AB+</option>
								<option>AB-</option>
								<option>O+</option>
								<option>O-</option>
	  						</select>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="pass_old_xjlok">Old Password</label>
							<input type="password" class="form-control" id="pass_old_xjlok" name="pass_old_xjlok" autocomplete="new-password">
						</div>
						<div class="form-group col-md-4">
							<label for="new_password">New Password</label>
						<input type="password" class="form-control" id="new_password" name="new_password" autocomplete="new-password">
						</div>
						<div class="form-group col-md-4">
							<label for="confirm_password">Confirm Password</label>
							<input type="password" class="form-control" id="confirm_password" name="confirm_password" autocomplete="new-password">
						</div>
					</div>
					<div class="form-group">
						<label for="inputAddress">House No</label>
						<input type="text" class="form-control" id="inputAddress" name="house_no" value="<?=$user_details['house_no'];?>">
					</div>
					<div class="form-group">
					  <label for="inputAddress2">Line 1</label>
						<input type="text" class="form-control" id="inputAddress2" name="address_l1" value="<?=$user_details['address_l1'];?>">
				</div>
					<div class="form-group">
						<label for="inputAddress3">Line 2</label>
						<input type="text" class="form-control" id="inputAddress3" name="address_l2" value="<?=$user_details['address_l2'];?>">
					</div>
					<div class="form-row">
						<div class="form-group col-md-3">
							<label for="inputCity">City</label>
							<input type="text" class="form-control" id="inputCity" name="city" value="<?=$user_details['city'];?>">
						</div>
						<div class="form-group col-md-4">
							<label for="inputState">State</label>
							<input type="text" class="form-control" id="inputState" name="state" value="<?=$user_details['state'];?>">
						</div>
						<div class="form-group col-md-2">
							<label for="inputZip">Zip</label>
							<input type="text" class="form-control" id="inputZip" name="pincode" value="<?=$user_details['pincode'];?>">
						</div>
						<div class="form-group col-md-3">
							<label for="inputCountry">Country</label>
							<input type="text" class="form-control" id="inputCountry" name="country" value="<?=$user_details['country'];?>">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputAddress2">House Landmark</label>
							<input type="text" class="form-control" id="inputAddress2" name="landmark" value="<?=$user_details['landmark'];?>">
						</div>
						<div class="form-group col-md-6">
							<label for="dl_number">Driving License Number</label>
							<input type="text" class="form-control" id="dl_number" name="dl_no" value="<?=$user_details['dl_no'];?>">
						</div>

					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputidentification">Identification Mark</label>
							<input type="text" class="form-control" id="inputidentification" name="identification" value="<?=$user_details['identification'];?>">
						</div>
						<div class="form-group col-md-6">
							<label for="inputDepartment">Department</label>
							<select class="form-control" id="inputDepartment" name="department">
								<?php foreach ($department_list as $key => $value): ?>
									<option <?php if($user_details['department'] == $value['name']) echo "selected" ?>><?=$value['name'];?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<button type="submit" name="submit" class="btn btn-primary">Save</button>
					<br><br>
				</form>

			</div>
		</div>
	</div>

</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/swal.js"></script>
<script type="text/javascript" src="js/edit.js"></script>

<script type="text/javascript">
	<?php if ($message): ?>
		swal({
			dangerMode: true,
			title: "Error...",
			text: "<?=$message;?>"
		});
	<?php endif ?>
	<?php if ($sucess): ?>
		swal({
			title: "Success...",
			text: "<?=$sucess;?>"
		});
	<?php endif ?>
</script>
</html>