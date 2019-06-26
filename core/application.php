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
				$draft = $this->random().(time()-1561404886);
				$q = $this->conn->prepare("INSERT INTO applicatioin (draft_id, applicant, receiver) VALUES (?, ?, ?);");
				$q->execute(array($draft, $applicant, $receiver));
				if($q->rowCount() == 1){ return true; }
				return false;
			}catch(PDOEcecption $e){
				echo "Error";
			}
		}
		public function delete($applicant){
			try{
				$q = $this->conn->prepare("DELETE FROM applicatioin WHERE applicatioin.id = ?;");
				$q->execute(array($applicant));
				if($q->rowCount() != 0){ return true; }
				return false;
			}catch(PDOEcecption $e){
				echo "Error";
			}
		}
		public function update($column, $new_val, $primery){
			try{
				$q = $this->conn->prepare("UPDATE applicatioin SET ".$column." = ? WHERE applicatioin.id = ?;");
				$q->execute(array($new_val, $primery));
				if($q->rowCount() != 0){ return true; }
				return false;
			}catch(PDOEcecption $e){
				echo "Error";
			}
		}
	}

	$a = new Application($host, $db_name, $db_user, $db_pass);
	$a->insert("1", "3");
	$a->delete('3');
	$a->update("req_date", "3", "8");
