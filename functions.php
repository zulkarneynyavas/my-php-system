<?php
include('db.php');

Class Functions extends Database {
	
	public function index() {
		$query = $this->connection->query("SELECT * 
            FROM oc_product
        ", PDO::FETCH_ASSOC);
		if ( $query->rowCount() ) {
            $products = array();
			foreach( $query as $row ) {
				$products[] = $row['product_id'];
            }
            return print_r($products);
		}
	}
}

$Functions = new Functions;
?>