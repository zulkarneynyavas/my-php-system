<?php
include('database.php');

Class Functions extends Database {
	
	public function index() {
		$query = $this->connection->query("SELECT * 
            FROM oc_product
        ", PDO::FETCH_ASSOC);
	}
}

$Functions = new Functions;
?>