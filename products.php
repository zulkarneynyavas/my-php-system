<?php
include('database.php');

Class Products extends Database {

	public function GetAllProducts() {

		//$sth = $this->connection->prepare("SELECT * FROM oc_product");
		//$sth->execute();
		//$result = $sth->fetchAll();
		//print_r($result);

		$GetAllProducts = $this->SELECTALL("SELECT * FROM oc_product");

		print '<pre>' . json_encode($GetAllProducts, JSON_PRETTY_PRINT) . '</pre>';

		//foreach ($GetAllProducts as $key => $value) {
			//print '<pre>' . json_encode($value, JSON_PRETTY_PRINT) . '</pre>';	
		//}




		//$GetOne = $this->SELECT("SELECT * FROM oc_product");

		//print '<pre>' . json_encode($GetOne->model, JSON_PRETTY_PRINT) . '</pre>';

	}
}

$Products = new Products;
?>