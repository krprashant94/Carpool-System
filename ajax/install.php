<?php
	try{
		$fp = fopen('../core/config.php', 'w');
		$write = '<?php
		$email = "'.$_GET['email'].'";
		$user_pass = "'.$_GET['pass'].'";
		$host = "'.$_GET['host'].'";
		$path = "'.$_GET['path'].'";
		$db_name = "'.$_GET['db'].'";
		$db_user = "'.$_GET['user'].'";
		$db_pass = "'.$_GET['db_pass'].'";
?>';
		fwrite($fp, $write);
		fclose($fp);

		$db_host = $_GET['host'];
		$db_user = $_GET['user'];
		$db_pass = $_GET['db_pass'];
		$db = $_GET['db'];
		$conn = new PDO('mysql:host='.$db_host.';dbname='.$db.'',$db_user,$db_pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


		$q = $conn->prepare('SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";');
		$q->execute();
		$q = $conn->prepare('SET time_zone = "+05:30";');
		$q->execute();

		$q = $conn->prepare("CREATE TABLE application ( draft_id varchar(20) NOT NULL, applicant bigint(20) NOT NULL, receiver bigint(20) NOT NULL, message text NOT NULL, pickup_location varchar(100) NOT NULL, application_date varchar(20) NOT NULL, department varchar(50) NOT NULL, start_date bigint(20) NOT NULL, ending_date bigint(20) NOT NULL, vehicle_req varchar(50) NOT NULL, vehicle_issue varchar(20) NOT NULL, notification varchar(1) NOT NULL, applied varchar(1) NOT NULL DEFAULT 'N', status varchar(200) NOT NULL DEFAULT 'Applied', forwarded bigint(20) NOT NULL, issued_by varchar(20) NOT NULL, log text NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;");
		$q->execute();
		$q = $conn->prepare("CREATE TABLE department (name varchar(50) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
		$q->execute();
		$q = $conn->prepare("CREATE TABLE user ( id bigint(20) NOT NULL, password varchar(64) NOT NULL, image text NOT NULL, f_name varchar(20) NOT NULL, m_name varchar(20) NOT NULL, surname varchar(20) NOT NULL, dob varchar(10) NOT NULL, dl_no varchar(20) NOT NULL, house_no varchar(10) NOT NULL, address_l1 varchar(20) NOT NULL, address_l2 varchar(20) NOT NULL, landmark varchar(50) NOT NULL, pincode int(6) NOT NULL, city varchar(20) NOT NULL, state varchar(20) NOT NULL, country varchar(20) NOT NULL, mail_id varchar(50) NOT NULL, phone int(12) NOT NULL, blood_group varchar(3) NOT NULL, identification text NOT NULL, department varchar(50) NOT NULL, auth_level int(11) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
		$q->execute();
		$q = $conn->prepare("CREATE TABLE vehicle ( no varchar(20) NOT NULL, type varchar(20) NOT NULL, subtype varchar(20) NOT NULL, status varchar(50) NOT NULL, location varchar(30) NOT NULL, app_id varchar(30) NOT NULL, driver bigint(20) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;");
		$q->execute();

		$q = $conn->prepare("ALTER TABLE application ADD PRIMARY KEY (draft_id);");
		$q->execute();
		$q = $conn->prepare("ALTER TABLE department ADD PRIMARY KEY (name);");
		$q->execute();
		$q = $conn->prepare("ALTER TABLE user ADD PRIMARY KEY (id), ADD UNIQUE KEY mail_id (mail_id), ADD UNIQUE KEY phone (phone);");
		$q->execute();
		$q = $conn->prepare("ALTER TABLE vehicle ADD PRIMARY KEY (no);");
		$q->execute();
		$q = $conn->prepare("ALTER TABLE user MODIFY id bigint(20) NOT NULL AUTO_INCREMENT;");
		$q->execute();

		$q = $conn->prepare("INSERT INTO `department` (`name`) VALUES (' Human Resources'), ('Administration'), ('Finnance'), ('Information Technology'), ('Logistics'), ('Marketing'), ('Production'), ('Purchasing'), ('Quality'), ('Research and Development'), ('Sales'), ('Security'), ('Transport');");
		$q->execute();
		$q = $conn->prepare("INSERT INTO user (password, mail_id, auth_level) VALUES (?, ?, 5);");
		$q->execute(array(sha1($_GET['pass']), $_GET['email']));
		unset($conn);
		echo "true";
	}catch(Execption $e){
		echo "false";
	}
?>