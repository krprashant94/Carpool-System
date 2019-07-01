<?php 
	include 'core/core.inc.php';
	if (isset($_POST['mail_id']) & isset($_POST['phone'])) {
		if (!empty($_POST['mail_id'])) {
			$msg = "First line of text\nSecond line of text";
			$msg = wordwrap($msg,70);
			mail("pamelabanerjee11@gmail.com","Reset Password :: TATA Sponge",$msg);
	 		header("Location: index.php");
		}elseif (!empty($_POST['phone'])) {
		 	include 'core/user.db.php';
			$u = new User($host, $db_name, $db_user, $db_pass);
			print_r($u->random());

			// $u->update("req_date", "3", "8");
			// print_r($u->fetch_by_two_id("mail_id", "c066d45b7bb9b6baf10d6627a", "password", "kr.prashant94@gmail.com"));
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
									<input type="email" name="mailid" class="form-control" id="exampleInputEmailid" placeholder="example@domain.com">
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