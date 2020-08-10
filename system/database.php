<?php
Class database {
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
	function query($sql, $binds) {
		$query = $this->connection->prepare($sql);
		foreach ($binds as $key => &$value) {
			$query->bindParam(":" . $key, $value);
		}
		$query->execute();
		return $query;
	}
	function select($sql, $binds) {
		$query = $this->query($sql, $binds);
		return $query->fetch();
	}
	function select_all($sql, $binds) {
		$query = $this->query($sql, $binds);
		return $query->fetchAll();
	}
	function insert($sql, $binds) {
		$query = $this->query($sql, $binds);
		return $this->connection->lastInsertId();
	}
	function update($sql, $binds) {
		$query = $this->query($sql, $binds);
		return $query->rowCount();
	}
	function delete($sql, $binds) {
		$query = $this->query($sql, $binds);
		return $query->rowCount();
	}
	function __destruct() {
		$this->connection = null;
	}
}