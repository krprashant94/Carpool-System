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
		public function insert($type, $subtype, $driver, $number, $location){
			try{
				$number = strtoupper($number);
				$subtype = strtolower($subtype);
				$q = $this->conn->prepare("INSERT INTO vehicle (no, type, subtype, location, driver) VALUES (?, ?, ?, ?, ?);");
				$q->execute(array($number, $type, $subtype, $location, $driver));
				if($q->rowCount() == 1){ return true; }
				return false;
			}catch(PDOException $e){
				if ($e->getCode() == '42S02') {
					die('<br><br><br>Installation required !!! <br><b>Open <a href="./install.php">install.php</a></b>'); 
				}
				return false;
			}
		}
		public function delete($num){
			try{
				$q = $this->conn->prepare("DELETE FROM vehicle WHERE vehicle.no = ?;");
				$q->execute(array($num));
				if($q->rowCount() != 0){ return true; }
				return false;
			}catch(PDOException $e){
				if ($e->getCode() == '42S02') {
					die('<br><br><br>Installation required !!! <br><b>Open <a href="./install.php">install.php</a></b>'); 
				}
				return false;
			}
		}
		public function update($column, $new_val, $primery){
			try{
				$q = $this->conn->prepare("UPDATE vehicle SET ".$column." = ? WHERE vehicle.no = ?;");
				$q->execute(array($new_val, $primery));
				if($q->rowCount() != 0){ return true; }
				return false;
			}catch(PDOException $e){
				if ($e->getCode() == '42S02') {
					die('<br><br><br>Installation required !!! <br><b>Open <a href="./install.php">install.php</a></b>'); 
				}
				return false;
			}
		}
		public function getAvailable($start_timestamp, $end_timestamp){
			try{
				$q = "SELECT COUNT(DISTINCT(no)) FROM application LEFT JOIN vehicle on application.vehicle_issue = vehicle.no WHERE ((start_date BETWEEN ? AND ?) OR (ending_date BETWEEN ? AND ?)) AND application.vehicle_issue != '';";
				$query = $this->conn->prepare($q);
				$query->execute(array($start_timestamp, $end_timestamp, $start_timestamp, $end_timestamp));
				if ($query->fetchColumn() == 0) {
					$q = "SELECT no, type, subtype FROM vehicle";
					$query = $this->conn->prepare($q);
					$query->execute();
				}else{
					$q = "SELECT no, type, subtype FROM vehicle WHERE vehicle.no NOT IN (SELECT DISTINCT(no) FROM application LEFT JOIN vehicle on application.vehicle_issue = vehicle.no WHERE ((start_date BETWEEN ? AND ?) OR (ending_date BETWEEN ? AND ?)) AND application.vehicle_issue != '')";
					$query = $this->conn->prepare($q);
					$query->execute(array($start_timestamp, $end_timestamp, $start_timestamp, $end_timestamp));
				}

				$data=$query->fetchAll(PDO::FETCH_ASSOC);
				return $data;
			}catch(PDOException $e){
				if ($e->getCode() == '42S02') {
					die('<br><br><br>Installation required !!! <br><b>Open <a href="./install.php">install.php</a></b>'); 
				}
				die();
			}
		}
		function fetch_by_id($where, $id){
			try{
				$query="SELECT * FROM vehicle WHERE ".$where."=?";
				$result = $this->conn->prepare($query);
				$result->execute(array($id));
				$data=$result->fetchAll(PDO::FETCH_ASSOC);
				return $data;
			}catch(PDOException $e){
				if ($e->getCode() == '42S02') {
					die('<br><br><br>Installation required !!! <br><b>Open <a href="./install.php">install.php</a></b>'); 
				}
				die();
			}
		}

		function fetch_by_two_id($where1, $id1, $where2, $id2){
			try{
				$query="SELECT * FROM vehicle WHERE (".$where1."=?) AND (".$where2."=?) ";  
				$result = $this->conn->prepare($query);
				$result->execute(array($id1, $id2));
				$data=$result->fetchAll(PDO::FETCH_ASSOC);
				return $data;
			}catch(PDOException $e){
				if ($e->getCode() == '42S02') {
					die('<br><br><br>Installation required !!! <br><b>Open <a href="./install.php">install.php</a></b>'); 
				}
				die();
			}
		}
	}

	// $a = new Vehicle($host, $db_name, $db_user, $db_pass);
	// $a->insert("1", "3");
	// $a->delete('3');
	// $a->update("req_date", "3", "8");
