<!DOCTYPE html>
<html>
<head>
	<title>Car Pool Install</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" crossorigin="anonymous">

</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2">
				<div style="padding: 10px;">
					<center><img src="images/logo.png"></center>
				</div>
				<ul class="list-group">
					<li class="list-group-item list-group-item-warning emailpass">Email and Password</li>
					<li class="list-group-item list-group-item-success hostserver">Host</li>
					<li class="list-group-item list-group-item-success location">Location</li>
					<li class="list-group-item list-group-item-success dbname">Database Name</li>
					<li class="list-group-item list-group-item-danger dbuser">Username</li>
					<li class="list-group-item list-group-item-success dbpass">Password</li>
					<li class="list-group-item list-group-item-danger conn">Connection</li>
				</ul>
			</div>
			<div class="col-md-10" style="padding: 5%;">
				<form method="post">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="ipemail">Email</label>
							<input type="email" name="email" class="form-control" id="ipemail" placeholder="Email">
						</div>
						<div class="form-group col-md-6">
							<label for="ippassword">Password</label>
							<input type="password" name="password" class="form-control" id="ippassword" placeholder="Password" autocomplete="new-password">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="iphostname">Hostname</label>
							<input type="text" name="hostname" class="form-control" id="iphostname" value="localhost">
						</div>
						<div class="form-group col-md-6">
							<label for="ippath">Installation Path</label>
							<input type="text" name="path" class="form-control" id="ippath" value="/">
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="ipdatabasename">Database Name</label>
							<input type="text" name="database" class="form-control" id="ipdatabasename" value="carpool">
						</div>
						<div class="form-group col-md-4">
							<label for="ipdbuser">Database Usename</label>
							<input type="text" name="dbuser" class="form-control" id="ipdbuser" placeholder="Database Username">
							
						</div>
						<div class="form-group col-md-4">
							<label for="ipdbpass">Database Password</label>
							<input type="text" name="dbpass" class="form-control" id="ipdbpass" placeholder="Database Password">
						</div>
					</div>
					<div class="form-group">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="gridCheck">
							<label class="form-check-label" for="gridCheck">
								I am accepting term and conditon and 
								I am sure that, I am noted my username and password and giving correct database information.
							</label>
						</div>
					</div>
					<button type="button" class="btn btn-primary btn-warning" id="testconnection">Test Connection</button>
					<button type="button" class="btn btn-primary" id="install">Install</button>
				</form>
			</div>
		</div>
	</div>

</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/swal.js"></script>
<script type="text/javascript">
	var valid_email = false, valid_pass = false, valid_host = true, valid_location = true, valid_db_name = true,valid_username = false, valid_password = true, valid_conn = false;
	$("#ipemail").change(function(){
		console.log(this.value);
		var regexp = new RegExp(/^\w+([\.-]?\w+)+@\w+([\.:]?\w+)+(\.[a-zA-Z0-9]{2,3})+$/);
		if (regexp.test(this.value)) {
			$('.emailpass').addClass('list-group-item-info');
			$('.emailpass').removeClass('list-group-item-warning');
			valid_email = true;
		}else{
			$('.emailpass').removeClass('list-group-item-info');
			$('.emailpass').addClass('list-group-item-warning');
			valid_email = false;
		}
	});
	$("#ippassword").change(function(){
		console.log(this.value);
		var regexp = new RegExp("^[a-zA-Z0-9]{5,32}$");
		if (regexp.test(this.value)) {
			$('.emailpass').removeClass('list-group-item-warning');
			$('.emailpass').addClass('list-group-item-info');
			valid_pass = true;
		}else{
			$('.emailpass').removeClass('list-group-item-info');
			$('.emailpass').addClass('list-group-item-warning');
			valid_pass = false;
		}
	});
	$("#iphostname").change(function(){
		console.log(this.value);
		$.ajax({
			url: 'http://'+this.value,
			success: function(result){
				console.log(result);
				$('.hostserver').removeClass('list-group-item-danger');
				$('.hostserver').addClass('list-group-item-success');
				valid_host = true;
			},
			error: function(arg) {
				console.log("Error");
				$('.hostserver').removeClass('list-group-item-success');
				$('.hostserver').addClass('list-group-item-danger');
				valid_host = false;
			}
		});
	});
	$("#ippath").change(function(){
		console.log(this.value);
		var regexp = new RegExp("^[a-zA-Z0-9\/]*$");
		if (regexp.test(this.value)) {
			$('.location').removeClass('list-group-item-danger');
			$('.location').addClass('list-group-item-success');
			valid_location = true;
		}else{
			$('.location').removeClass('list-group-item-success');
			$('.location').addClass('list-group-item-danger');
			valid_location = false;
		}
	});

	$("#ipdatabasename").change(function(){
		console.log(this.value);
		var regexp = new RegExp("^[a-zA-Z0-9]*$");
		if (regexp.test(this.value)) {
			$('.dbname').removeClass('list-group-item-danger');
			$('.dbname').addClass('list-group-item-success');
			valid_db_name = true;
		}else{
			$('.dbname').removeClass('list-group-item-success');
			$('.dbname').addClass('list-group-item-danger');
			valid_db_name = false;
		}
	});
	
	$("#ipdbuser").change(function(){
		console.log(this.value);
		var regexp = new RegExp("^[a-zA-Z0-9]*$");
		if (regexp.test(this.value)) {
			$('.dbuser').removeClass('list-group-item-danger');
			$('.dbuser').addClass('list-group-item-success');
			valid_username = true;
		}else{
			$('.dbuser').removeClass('list-group-item-success');
			$('.dbuser').addClass('list-group-item-danger');
			valid_username = false;
		}
	});
	$("#ipdbpass").change(function(){
		console.log(this.value);
		var regexp = new RegExp("^[a-zA-Z0-9]*$");
		if (regexp.test(this.value)) {
			$('.dbpass').removeClass('list-group-item-danger');
			$('.dbpass').addClass('list-group-item-success');
			valid_password = true;
		}else{
			$('.dbpass').removeClass('list-group-item-success');
			$('.dbpass').addClass('list-group-item-danger');
			valid_password = false;
		}
	});

	$("#testconnection").click(function(){
		console.log(this.value);
		host = $("#iphostname").val();
		db = $("#ipdatabasename").val();
		user = $("#ipdbuser").val();
		pass = $("#ipdbpass").val();
		$.ajax({
			url: "ajax/test_connection.php?host=" + host + "&db=" + db + "&user=" + user + "&pass=" + pass,
			success: function(result){
				console.log(result);
				if(result == 'true'){
					$('.conn').removeClass('list-group-item-danger');
					$('.conn').addClass('list-group-item-success');
					valid_conn = true;
					valid_host = true;
					valid_password =true;
					valid_username =true;
				}else{
					$('.conn').removeClass('list-group-item-success');
					$('.conn').addClass('list-group-item-danger');
					valid_conn = false;
				}
			},
			error: function(arg) {
				console.log("Error");
				$('.conn').removeClass('list-group-item-success');
				$('.conn').addClass('list-group-item-danger');
				valid_conn = false;
			}
		});
	});
	
	$("#install").click(function (arg) {
		email = $("#ipemail").val();
		pass = $("#ippassword").val();
		host = $("#iphostname").val();
		path = $("#ippath").val();
		db = $("#ipdatabasename").val();
		user = $("#ipdbuser").val();
		db_pass = $("#ipdbpass").val();
		accept = $("#gridCheck").is(":checked");
		if(accept){
			message = false;
			if (!valid_email) {
				message = "Invalid email address. Try with a valid email address."; 
			}else if (!valid_pass) {
				message = "Your password is too weak. Try another password."
			}else if (!valid_host) {
				message = "Invalid host server name. Make sure you have access to host server."
			}else if (!valid_location) {
				message = "Invalid host server path"
			}else if (!valid_db_name) {
				message = "Database not exist or access forbidden"
			}else if (!valid_username) {
				message = "Invalid database username"
			}else if (!valid_password) {
				message = "Invalid database password or access forbidden"
			}else if(!valid_conn){
				message = "Database connection not tested please test your connection";
			}
			if (message) {
				swal({
					title: message,
					icon: "error",
				});
			}else{
				$.ajax({
					url: "ajax/install.php?email="+email+"&pass="+ pass +"&host="+ host +"&path="+ path +"&db="+ db +"&user="+ user +"&db_pass="+db_pass,
					success: function(result){
						if(result == 'true'){
							swal({
								title: "",
								icon: "success",
							});
						}else{
							swal({
								title: "One or more then one error occured",
								icon: "error",
							});
						}
					},
					error: function(arg) {
						swal({
							title: "Setup file corrupted",
							icon: "error",
						});

					}
				});

			}
		}else{
			swal({
				title: "Make sure to click the checkbox",
				icon: "error",
			});
		}
	});
</script>
</html>