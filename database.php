<?php
Class Database {
	
	protected $connection;
	
	function __construct() {
		$dbhost = [
			'dbhost' => '127.0.0.1',
			'dbuser' => 'root',
			'dbpass' => '',
			'dbname' => 'opencart'
		];
		try {
			$this->connection = new PDO('mysql:host=' . $dbhost['dbhost'] . ';dbname=' . $dbhost['dbname'], $dbhost['dbuser'], $dbhost['dbpass']);
			$this->connection->query("SET NAMES utf8");
			$this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			return true;
		} catch(PDOException $error) {
			return $error->getMessage();
		}
	}

	public function __call($method, $args) {

		switch ($method) {
			case 'SELECT':
				$sth = $this->connection->prepare($args[0]);
				$sth->execute();
				return $sth->fetch(PDO::FETCH_OBJ);
				break;
			case 'SELECTALL':
				$sth = $this->connection->prepare($args[0]);
				$sth->execute();
				return $sth->fetchAll();
				break;
			case 'UPDATE':
				$sth = $this->connection->prepare($args[0]);
				$update = $sth->execute($args[1]);
				if ($update) {
					return $update;
				}
				break;
			case 'INSERT':
				$sth = $this->connection->prepare("INSERT INTO " . $args[0] . "(" . implode(',', array_keys($args[1])) . ") 
					VALUES(" . substr(str_repeat('?,', count(array_keys($args[1]))), 0, -1) . ")
				");
				$insert = $sth->execute(array_values($args[1]));
				if ($insert) {
					return $this->connection->lastInsertId();
				}
				break;
			case 'DELETE':
				echo "i eşittir 2";
				break;
			default:
				echo "i ne 0, ne 1 ne de 2'ye eşittir";
		}
	}

	function __destruct() {
		
		$this->connection = null;
	}
}

$db = new Database;
?>