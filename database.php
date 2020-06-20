<?php
include 'config.php';

Class Database {
	
	protected $connection;
	
	function __construct() {
		try {
			$this->connection = new PDO("mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DB, MYSQL_USER, MYSQL_PASS);
			$this->connection->query("SET NAMES utf8");
			$this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			return true;
		} catch(PDOException $error) {
			return $error->getMessage();
		}
	}

	public function __call($method, $args) {
		switch ($method) {
			case "SELECT":
				$sql = "";
				foreach ($args[0] as $key => $value) {
					switch ($key) {
						case "select":
							$sql .= "SELECT ";
							$sql .= implode(", ", array_values($value));
							break;
						case "from":
							$sql .= " FROM ";
							$sql .= $value;
							break;
						case "where":
							$sql .= " WHERE ";
							foreach ($value as $key => $value) {
								$sql .= $key . " " . $value[0] . " :" . $key . " AND ";
							}
							$sql = rtrim($sql, " AND ");
							break;
						case "limit":
							$sql .= " LIMIT ";
							$sql .= $value;
							break;
					}
				}
				$sth = $this->connection->prepare($sql);
				foreach ($args[0]["where"] as $key => $value) {
					$sth->bindParam(":" . $key, $value[1]);
				}
				$sth->execute();
				return $sth->fetchAll();
				break;
			case "UPDATE":

$stmt = $pdo->prepare("UPDATE movies 
	SET 
	filmName = :filmName, 
	filmDescription = :filmDescription, 
	filmImage = :filmImage,  
	filmPrice = :filmPrice,  
	filmReview = :filmReview  
		WHERE 
		filmID = :filmID
");                                  
$stmt->bindParam(':filmName', $_POST['filmName'], PDO::PARAM_STR);       
$stmt->bindParam(':filmDescription', $_POST['$filmDescription'], PDO::PARAM_STR);    
$stmt->bindParam(':filmImage', $_POST['filmImage'], PDO::PARAM_STR); 
$stmt->bindParam(':filmPrice', $_POST['filmPrice'], PDO::PARAM_STR); 
$stmt->bindParam(':filmReview', $_POST['filmReview'], PDO::PARAM_STR);   
$stmt->bindParam(':filmID', $_POST['filmID'], PDO::PARAM_INT);   
$stmt->execute();

				break;
			case "INSERT":
				$sth = $this->connection->prepare("
					INSERT INTO " . $args[0] . "
						(" . implode(", ", array_keys($args[1])) . ")
							VALUES(" . ":" . implode(", :", array_keys($args[1])) . ")
				");
				foreach ($args[1] as $key => $value) {
					$sth->bindParam(':' . $key, $value);
				}
				$insert = $sth->execute();
				if ($insert) {
					return $this->connection->lastInsertId();
				}
				break;
			case "DELETE":
				$sth = $this->connection->prepare("DELETE FROM " . $args[0] . " 
					WHERE " . $args[1] . " in (" . str_repeat("?, ", count($args[2]) -1) . "?)
				");
				$delete = $sth->execute($args[2]);
				if ($delete) {
					return $delete;
				}
				break;
			default:
				return "error";
		}
	}

	function __destruct() {
		
		$this->connection = null;
	}
}

$db = new Database;