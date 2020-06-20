<?php
include 'database.php';
Class Functions extends Database {
	public function index() {
		$index = $this->SELECTALL("SELECT * FROM oc_product");
		print '<pre>' . json_encode($index, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) . '</pre>';
	}
}
$Functions = new Functions;
print $Functions->index();
?>