<?php
	if (!defined('__TATA_SPONGE__')) {
		include 'core.inc.php';
	}

	/**
	 * Vehicle Class
	 */
	class Vehicle
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
		public function insert(...){
			try{
				$draft = $this->random().(time()-1561404886);
				$q = $this->conn->prepare("INSERT INTO vehicle (no, type, subtype, status, location, app_id) VALUES (?, ?, ?, ?, ?, ?);");
				$q->execute(array(...));
				if($q->rowCount() == 1){ return true; }
				return false;
			}catch(PDOException $e){
				echo "Error";
			}
		}
		public function delete($num){
			try{
				$q = $this->conn->prepare("DELETE FROM vehicle WHERE vehicle.id = ?;");
				$q->execute(array($num));
				if($q->rowCount() != 0){ return true; }
				return false;
			}catch(PDOException $e){
				echo "Error";
			}
		}
		public function update($column, $new_val, $primery){
			try{
				$q = $this->conn->prepare("UPDATE vehicle SET ".$column." = ? WHERE vehicle.id = ?;");
				$q->execute(array($new_val, $primery));
				if($q->rowCount() != 0){ return true; }
				return false;
			}catch(PDOException $e){
				echo "Error";
			}
		}

		function fetch_by_id($where, $id){
			$query="SELECT * FROM vehicle WHERE (".$where."=?)";
			$result = $this->conn->prepare($query);
			$result->execute(array($id));
			$data=$result->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}

		function fetch_by_two_id($where1, $id1, $where2, $id2){
			$query="SELECT * FROM vehicle WHERE (".$where1."=?) AND (".$where2."=?) ";  
			$result = $this->conn->prepare($query);
			$result->execute(array($id1, $id2));
			$data=$result->fetchAll(PDO::FETCH_ASSOC);
			return $data;
			
		}
	}

	// $a = new Vehicle($host, $db_name, $db_user, $db_pass);
	// $a->insert("1", "3");
	// $a->delete('3');
	// $a->update("req_date", "3", "8");
