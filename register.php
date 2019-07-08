<?php 
	include 'core/core.inc.php';
	if (isset($_SESSION['user_id'])) { header("Location: dashboard.php");  }

	require 'core/user.db.php';
	$u = new User($host, $db_name, $db_user, $db_pass);
	$reg_message = false;
	$department_list = $u->getDepartments();
	if (isset($_POST['register'])) {
		if(empty($_POST['name'])){
			$reg_message = "Your name is empty";
		}elseif (empty($_POST['email'])) {
			$reg_message = "Email ID is empty";
		}elseif (empty($_POST['phone'])) {
			$reg_message = "Phone number is empty";
		}elseif ($_POST['department'] == "Choose...") {
			$reg_message = "Department is empty is empty";
		}elseif (empty($_POST['new_password'])) {
			$reg_message = "Password is empty";
		}elseif (empty($_POST['confirm_password'])) {
			$reg_message = "Confirmation Password is empty";
		}elseif ($_POST['confirm_password'] != $_POST['new_password']) {
			$reg_message = "Password and confirmation Password not same";
		}elseif (empty($_POST['city'])) {
			$reg_message = "Residental city or village is empty";
		}elseif (empty($_POST['pin_code'])) {
			$reg_message = "Your area pin code is empty";
		}elseif ($_POST['blood_group'] == "Choose...") {
			$reg_message = "Blood Group is not valid";
		}else{
			$u->insert($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['department'], $_POST['new_password'], $_POST['city'], $_POST['pin_code'], $_POST['blood_group']);
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta name="og:title" property="og:title" content="TATA Sponge Limited :: Register"/>
	<?php
		include 'core/meta.php';
	?>
	<link rel="stylesheet" href="css/login.css">
</head>
<body style="height: auto;">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col col-lg-4">
				<div class="loginform">
					<div class="innerbox">
						<div class="toplogo">
							<br/>
							<br/>
							<img src="images/tata_composit_logo.png" width="70%">
							<br/>
							<br/>
							<br/>
						</div>
						<div class="formbox">
							<form method="POST">
								<div class="form-group">
									<label for="uname">Name</label>
									<input type="text" class="form-control" name="name" <?php if (!empty($_POST['name'])) {echo 'value="'.$_POST['name'].'"';} ?> id="exampleInputName" placeholder="Enter Name">
								</div>
                     			<div class="form-group">
									<label for="exampleInputEmail1">Email address</label>
									<input type="email" class="form-control" name="email" <?php if (!empty($_POST['email'])) {echo 'value="'.$_POST['email'].'"';} ?> id="exampleInputEmail1" placeholder="Email ID">
								</div>
                     			<div class="form-group">
									<label for="exampleInputEmail1">Phone Number</label>
									<input type="number" class="form-control" name="phone" <?php if (!empty($_POST['phone'])) {echo 'value="'.$_POST['phone'].'"';} ?> id="exampleInputEmail1" placeholder="Phone Number">
								</div>
								<div class="form-group">
									<label for="bgroup">Department</label>
		      						<select class="form-control" id="inputDepartment" name="department">
										<?php foreach ($department_list as $key => $value): ?>
											<option><?=$value['name'];?></option>
										<?php endforeach ?>
									</select>
								</div>
								<div class="form-group">
									<label for="exampleInputNPassword">Password</label>
									<input type="password" class="form-control" name="new_password" <?php if (!empty($_POST['new_password'])) {echo 'value="'.$_POST['new_password'].'"';} ?> id="exampleInputNPassword1" placeholder="Password">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword">Confirm Password</label>
									<input type="password" class="form-control" name="confirm_password" id="exampleInputCPassword" placeholder="Confirm Password">
								</div>
								<div class="form-group">
									<label for="exampleInputAddress">City</label>
									<input type="text" class="form-control" name="city" <?php if (!empty($_POST['city'])) {echo 'value="'.$_POST['city'].'"';} ?> id="exampleInputAddress" placeholder="Address">
								</div>
								<div class="form-group">
									<label for="exampleInputPinCode">Pin Code</label>
									<input type="number" class="form-control" name="pin_code" <?php if (!empty($_POST['pin_code'])) {echo 'value="'.$_POST['pin_code'].'"';} ?> id="exampleInputPinCode" placeholder="Pin Code">
								</div>
								<div class="form-group">
									<label for="bgroup">Blood Group</label>
		     						<select id="inputState" class="form-control" name="blood_group">
		     							<?php
		     								if (!empty($_POST['blood_group'])) {echo '<option selected>'.$_POST['blood_group'].'</option>';}
		     								else{echo "<option selected>Choose...</option>";}
		     							?>
			        					<option>O+</option>
			        					<option>A+</option>
			        					<option>A-</option>
			        					<option>B+</option>
			        					<option>B-</option>
			        					<option>AB+</option>
			        					<option>AB-</option>
			        					<option>O-</option>
		      						</select>
								</div>
								
								<a href="login.php" class="btn btn-link">Login</a>
								<div style="float: right;">
									<button type="submit" class="btn btn-primary" name="register">Register</button>
								</div>
							</form>
							<br>
						</div>
					</div>
				</div>s
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/swal.js"></script>
<script type="text/javascript">
	$('.loginform').animate({opacity:0},0);
	$('.loginform').animate({opacity:1},1000);
	<?php
		if ($reg_message) {
			echo 'swal({title:"'.$reg_message.'",icon: "error"});';
		}
	?>
</script>
</html>
