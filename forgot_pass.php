<?php 
	include 'core/core.inc.php';

	if (isset($_POST['mail_id']) && isset($_POST['phone'])) {
		include_once 'core/user.db.php';
		$u = new User($host, $db_name, $db_user, $db_pass);
		$reset_pass = $u->random(6);

		$msg = "Your new password is : ".$reset_pass;
		$subject = "Reset Password :: TATA Sponge";

		if (!empty($_POST['mail_id'])) {

			$recovery_details = $u->fetch_by_id('mail_id', $_POST['mail_id'])[0];
			mail($_POST['mail_id'], $subject, $msg);
			$u->update('password', sha1($reset_pass), $recovery_details['id']);

	 		header("Location: index.php");

		}elseif (!empty($_POST['phone'])) {
			$recovery_details = $u->fetch_by_id('phone', $_POST['phone'])[0];
			mail($recovery_details['mail_id'], $subject, $msg);
			$u->update('password', sha1($reset_pass), $recovery_details['id']);

	 		header("Location: index.php");
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
	<meta name="og:title" property="og:title" content="TATA Sponge Limited :: Forgot Password"/>
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
									<label for="exampleInputemailid">Email-ID</label>
									<input type="email" name="mail_id" class="form-control" id="exampleInputEmailid" placeholder="example@domain.com">
								</div>
								<center><b>OR</b></center>
								<div class="form-group">
									<label for="exampleInputphone">Phone Number</label>
									<input type="number" name="phone" class="form-control" id="exampleInputphone" placeholder="1234567890">
								</div>
								<br/>
								<input type="submit" class="btn btn-primary" value="Reset">
								<br/><br/>
							</form>
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

$("#motimaa").click(function(){
	
});

</script>
</html>