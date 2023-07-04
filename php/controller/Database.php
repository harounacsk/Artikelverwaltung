<?php

class Database
{

	#private $server = "127.0.0.1";
	private $server = "localhost";
	private $user = "root";
	private $pass = "";
	private $database = "azm_test";

	protected $connexion;

	public function __construct()
	{

		$this->connexion = new mysqli($this->server, $this->user, $this->pass, $this->database);
		if ($this->connexion->connect_error) {
			die("Die Verbindung wurde nicht hergestellt");
		}
		if (!$this->connexion->set_charset("utf8")) {
			echo htmlentities("Fehler beim laden von UTF8" . $this->connexion->error);
		}
	}


	/**
	 * getPriceformat formatiert eine  float (float wird mit komma angezeigt)
	 */
	public static function getPriceformat(float $price)
	{
		return number_format($price, 2, ",", " ") . " €";
	}

	public function delete(string $table,$columnName,$id){
		if(!empty($this->getDataById($table,$columnName,$id))){
			$sql="DELETE FROM $table  WHERE $columnName=? ";
			$stmt = $this->connexion->prepare($sql);
			$stmt->bind_param("i",$id);            
			return $stmt->execute();
		}
		return false;
	}

	public function select(string $table){
		$sql="SELECT * FROM $table";
		$stmt = $this->connexion->prepare($sql);
		$stmt->execute();
		$result= $stmt->get_result();
		return $result->fetch_all(MYSQLI_ASSOC);
	}

	private function getDataById(string $table,$columnName, int $id){
		$sql="SELECT * FROM $table WHERE $columnName=?";
		$stmt = $this->connexion->prepare($sql);
		$stmt->bind_param("i",$id);            
		$stmt->execute();
		$result= $stmt->get_result();
		return $result->fetch_assoc();
	}

	public function dbClose()
	{
		$this->connexion->close();
	}


	public function getDbError(){
		return $this->connexion->errno;
	}
}
