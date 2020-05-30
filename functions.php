<?php
include('database.php');

Class Functions extends Database {
	public function index($query) {
		return $this->connection->query($query, PDO::FETCH_ASSOC);
	}
}

$Functions = new Functions;
?>