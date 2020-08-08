<?php
Class Database {
	protected $connection;
	function __construct() {
		try {
			$this->connection = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
			$this->connection->query("SET NAMES utf8");
			$this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			return true;
		} catch(PDOException $error) {
			return $error->getMessage();
		}
	}
	function __call($method, $args) {
		$query = $this->connection->prepare($args[0]);
		foreach ($args[1] as $key => &$value) {
			$query->bindParam(":" . $key, $value);
		}
		$query->execute();
		switch ($method) {
			case "Select":
				return $query->fetch();
				break;
			case "SelectAll":
				return $query->fetchAll();
				break;
			case "Insert":
				return $this->connection->lastInsertId();
				break;
			default:
				return $query->rowCount();
		}
	}
	function __destruct() {
		$this->connection = null;
	}
}