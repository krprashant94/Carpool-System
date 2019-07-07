<?php
	if (!defined('__TATA_SPONGE__')) {
		include 'core.inc.php';
	}

	/**
	 * Application Class
	 */
	class Application
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
		public function insert($applicant, $receiver){
			try{
				$draft = (time()-1561567370).$this->random();
				$q = $this->conn->prepare("INSERT INTO application (draft_id, applicant, receiver, application_date) VALUES (?, ?, ?, ?);");
				$q->execute(array($draft, $applicant, $receiver, time()));
				// $q->execute(array($draft, $applicant, $receiver, date('d-m-Y h:i A', time())));
				if($q->rowCount() == 1){ return $draft; }
				return false;
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}
		public function delete($applicant){
			try{
				$q = $this->conn->prepare("DELETE FROM application WHERE application.draft_id = ?;");
				$q->execute(array($applicant));
				if($q->rowCount() != 0){ return true; }
				return false;
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}
		public function update($column, $new_val, $primery){
			try{
				$q = $this->conn->prepare("UPDATE application SET ".$column." = ? WHERE application.draft_id = ?;");
				$q->execute(array($new_val, $primery));
				if($q->rowCount() != 0){ return true; }
				return false;
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}

		function fetch_by_id($where, $id){
			$query="SELECT * FROM application WHERE (".$where."=?)";
			$result = $this->conn->prepare($query);
			$result->execute(array($id));
			$data=$result->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}

		function fetch_by_two_id($where1, $id1, $where2, $id2){
			$query="SELECT * FROM application WHERE (".$where1."=?) AND (".$where2."=?) ";  
			$result = $this->conn->prepare($query);
			$result->execute(array($id1, $id2));
			$data=$result->fetchAll(PDO::FETCH_ASSOC);
			return $data;
			
		}
		function application_joint_details($user, $applied='Y', $fwd=0){
			$query="SELECT user.f_name, user.m_name, user.surname, user.mail_id, user.phone, user.department, application.draft_id, application.message, application.pickup_location, application.application_date, application.start_date, application.ending_date, application.vehicle_req, application.vehicle_issue, application.notification, application.applied, application.issued_by, application.log FROM application LEFT JOIN user on user.id = application.applicant WHERE applied = ? AND application.receiver = ? AND application.forwarded = ? AND application.status NOT LIKE 'Approved%' AND application.status NOT LIKE 'Rejected%';";  
			$result = $this->conn->prepare($query);
			$result->execute(array($applied, $user, $fwd));
			$data=$result->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}
		function application_joint_details_fwd($user){
			$query="SELECT user.f_name, user.m_name, user.surname, user.mail_id, user.phone, user.department, application.draft_id, application.message, application.pickup_location, application.application_date, application.start_date, application.ending_date, application.vehicle_req, application.vehicle_issue, application.notification, application.applied, application.issued_by, application.log FROM application LEFT JOIN user on user.id = application.applicant WHERE applied = 'Y' AND application.forwarded = ? AND application.status NOT LIKE 'Approved%' AND application.status NOT LIKE 'Rejected%';";  
			$result = $this->conn->prepare($query);
			$result->execute(array($user));
			$data=$result->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}
		function applicant_joint_details($user, $applied='Y'){
			$query="SELECT user.f_name, user.m_name, user.surname, user.mail_id, user.phone, user.department, application.draft_id, application.message, application.pickup_location, application.application_date, application.start_date, application.ending_date, application.vehicle_req, application.vehicle_issue, application.notification, application.applied, application.issued_by, application.log, application.forwarded, application.status FROM application LEFT JOIN user on user.id = application.applicant WHERE applied = ? AND application.applicant = ?;";  
			$result = $this->conn->prepare($query);
			$result->execute(array($applied, $user));
			$data=$result->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}
	}

	// $a = new Application($host, $db_name, $db_user, $db_pass);
	// $a->insert("1", "3");
	// $a->delete('3');
	// $a->update("req_date", "3", "8");
