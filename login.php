<?php 
	include 'core/core.inc.php';
	if (isset($_SESSION['user_id'])) { header("Location: dashboard.php");	}

	$login_message = false;
	if (isset($_POST['user']) && isset($_POST['pass'])) {
		if (!empty($_POST['user']) && !empty($_POST['pass'])) {
			require 'core/user.db.php';
			$u = new User($host, $db_name, $db_user, $db_pass);

			$details1 = $u->fetch_by_two_id("mail_id", $_POST['user'], "password", sha1($_POST['pass']));
			$details2 = $u->fetch_by_two_id("phone", $_POST['user'], "password", sha1($_POST['pass']));

			if(count($details1) == 1){
				$_SESSION['user_id'] = $details1[0]['id'];
				$_SESSION['auth_level'] = $details1[0]['auth_level'];
				$_SESSION['name'] = $details1[0]['f_name'].' '.$details1[0]['m_name'].' '.$details1[0]['surname'];
				$_SESSION['department'] = $details1[0]['department'];
				header("Location: index.php");
			}else if(count($details2) == 1){
				$_SESSION['user_id'] = $details2[0]['id'];
				$_SESSION['auth_level'] = $details2[0]['auth_level'];
				$_SESSION['name'] = $details1[0]['f_name'].' '.$details1[0]['m_name'].' '.$details1[0]['surname'];
				$_SESSION['department'] = $details1[0]['department'];
				header("Location: index.php");
			}else{
				$login_message = "Invalid login information";
			}
		}else{
			$login_message = "Email or Phone number or password is empty ";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta name="og:title" property="og:title" content="TATA Sponge Limited :: Login"/>
	<?php
		include 'core/meta.php';
	?>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
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
								<div class="form-group"s>
									<label for="exampleInputEmail1">Email or Phone</label>
									<input type="text" name="user" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Password</label>
									<input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
									<!-- <small id="emailHelp" class="form-text text-muted">Don't share your password to anyone else</small> -->
								</div>
								<center><button type="submit" class="btn btn-primary">Login</button></center>
							</form>
							<br>
							<div class="foottext">
								<small><a href="register.php">Register</a> | <a href="forgot_pass.php">Forgot Password</a></small>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/swal.js"></script>
<script type="text/javascript">
	$('.loginform').hide();
	$('.loginform').fadeIn(1000);
	<?php
		if ($login_message) {
			echo 'swal({title:"'.$login_message.'",icon: "error"});';
		}
	?>
</script>
</html>