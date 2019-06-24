<?php
	try{
		$fp = fopen('../setup/config.php', 'w');
		$write = '<?php
		$email = "'.$_GET['email'].'";
		$pass = "'.$_GET['pass'].'";
		$host = "'.$_GET['host'].'";
		$path = "'.$_GET['path'].'";
		$db = "'.$_GET['db'].'";
		$user = "'.$_GET['user'].'";
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
		$q = $conn->prepare('SET time_zone = "+00:00";');
		$q->execute();
		$q = $conn->prepare("CREATE TABLE applicatioin ( id varchar(20) NOT NULL, draft_id varchar(20) NOT NULL, applicant int(11) NOT NULL, receiver int(11) NOT NULL, message text NOT NULL, application_date varchar(10) NOT NULL, department varchar(50) NOT NULL, req_date varchar(10) NOT NULL, ending_date varchar(10) NOT NULL, vehicle_req varchar(50) NOT NULL, vechile_issue varchar(20) NOT NULL, notification varchar(1) NOT NULL, issued_by varchar(20) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
		$q->execute();
		$q = $conn->prepare("CREATE TABLE user ( id int(11) NOT NULL, password varchar(64) NOT NULL, image text NOT NULL, f_name varchar(20) NOT NULL, m_name varchar(20) NOT NULL, surname varchar(20) NOT NULL, dob varchar(10) NOT NULL, house_no varchar(10) NOT NULL, address_l1 varchar(20) NOT NULL, address_l2 varchar(20) NOT NULL, landmark varchar(50) NOT NULL, pincode int(6) NOT NULL, country varchar(20) NOT NULL, mail_id varchar(25) NOT NULL, phone int(10) NOT NULL, blood_group varchar(2) NOT NULL, identification text NOT NULL, department varchar(50) NOT NULL, auth_level int(11) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
		$q->execute();
		$q = $conn->prepare("CREATE TABLE vechile ( v_no varchar(20) NOT NULL, v_type varchar(20) NOT NULL, subtype varchar(20) NOT NULL, status varchar(10) NOT NULL, location varchar(30) NOT NULL, app_id varchar(20) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
		$q->execute();
		$q = $conn->prepare("ALTER TABLE applicatioin ADD PRIMARY KEY (id), ADD UNIQUE KEY draft_id (draft_id);");
		$q->execute();
		$q = $conn->prepare("ALTER TABLE user ADD PRIMARY KEY (id), ADD UNIQUE KEY mail_id (mail_id);");
		$q->execute();
		$q = $conn->prepare("ALTER TABLE vechile ADD PRIMARY KEY (v_no);");
		$q->execute();
		$q = $conn->prepare("ALTER TABLE user MODIFY id int(11) NOT NULL AUTO_INCREMENT;");
		$q->execute();
		$q = $conn->prepare("INSERT INTO user (id, password, image, f_name, m_name, surname, dob, house_no, address_l1, address_l2, landmark, pincode, country, mail_id, phone, blood_group, identification, department, auth_level) VALUES (NULL, ?, '', '', '', '', '', '', '', '', '', '', '', ?, '', '', '', '', 5);");
		$q->execute(array($_GET['email'], sha1($_GET['email'])));
		unset($conn);
		echo "true";
	}catch(Execption $e){
		echo "false";
	}
?>