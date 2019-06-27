<?php
	if (!defined('__TATA_SPONGE__')) {
		include 'core.inc.php';
	}

	/**
	 * User Class
	 */
	class User
	{
		private $conn;
		function __construct($db_host, $db, $db_user, $db_pass){
			$this->conn = new PDO('mysql:host='.$db_host.';dbname='.$db.'',$db_user,$db_pass);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		function __distruct()
		{
			unset($this->conn);
		}
		private function random($length = 4)
		{
			$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
			$password = substr( str_shuffle( $chars ), 0, $length );
			return $password;
		}
		public function insert($name, $email, $phone, $department, $new_password, $city, $pin_code, $blood_group, $auth=0){
			try{
				$new_password = sha1($new_password);
				$name = explode(' ', $name);
				$f_name = $name[0];
				$m_name = "";
				$surname = "";
				if (isset($name[1])) { $m_name = $name[1]; }
				if (isset($name[2])) { $surname = $name[2]; }

				$q = $this->conn->prepare("INSERT INTO user (password, f_name, m_name, surname, pincode, mail_id, phone, blood_group, department, auth_level) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
				$q->execute(array($new_password, $f_name, $m_name, $surname, $pin_code, $email, $phone, $blood_group, $department, $auth));
				if($q->rowCount() == 1){ return true; }
				return false;
			}catch(PDOException $e){
				echo "Error";
			}
		}
		public function delete($user_id){
			try{
				$q = $this->conn->prepare("DELETE FROM user WHERE user.id = ?;");
				$q->execute(array($user_id));
				if($q->rowCount() != 0){ return true; }
				return false;
			}catch(PDOException $e){
				echo "Error";
			}
		}
		public function update($column, $new_val, $primery){
			try{
				$q = $this->conn->prepare("UPDATE user SET ".$column." = ? WHERE user.id = ?;");
				$q->execute(array($new_val, $primery));
				if($q->rowCount() != 0){ return true; }
				return false;
			}catch(PDOException $e){
				echo "Error";
			}
		}

		function fetch_by_id($where, $id){
			$query="SELECT * FROM user WHERE (".$where."=?)";
			$result = $this->conn->prepare($query);
			$result->execute(array($id));
			$data=$result->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}

		function fetch_by_two_id($where1, $id1, $where2, $id2){
			$query="SELECT * FROM user WHERE (".$where1."=?) AND (".$where2."=?) ";  
			$result = $this->conn->prepare($query);
			$result->execute(array($id1, $id2));
			$data=$result->fetchAll(PDO::FETCH_ASSOC);
			return $data;
			
		}
	}

	// $u = new User($host, $db_name, $db_user, $db_pass);
	// $u->insert("1", "3");
	// $u->delete('3');
	// $u->update("req_date", "3", "8");
	// print_r($u->fetch_by_two_id("mail_id", "c066d45b7bb9b6baf10d6627a", "password", "kr.prashant94@gmail.com"));