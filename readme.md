root/
├── app/
|	├── assets/
|	|	├── css/
|	|	|	└── index.css
|	|	└── js/
|	|		└── index.js
|	├──	common/
|	|	├── 404.php
|	|	├── footer.php
|	|	└── header.php
|	└── index.php
└── system/
	├── config.php
	├── database.php
	├── function.php
	└── router.php

*********************

DB Using
---------

$query = $this->Insert("INSERT INTO oc_order_shipment 
	(order_id, date_added, shipping_courier_id, tracking_number) 
		VALUES 
			(:order_id, :date_added, :shipping_courier_id, :tracking_number)
", [
	"order_id" => 3,
	"date_added" => date("Y-m-d H-i-s"),
	"shipping_courier_id" => 666,
	"tracking_number" => 666
]);



$query = $this->Update("UPDATE oc_order_shipment
	SET tracking_number = :a
		WHERE order_id = :b
", [
	"a" => 333,
	"b" => 333
]);



$query = $this->Delete("DELETE FROM oc_order_shipment 
	WHERE order_id = :order_id AND tracking_number = :tracking_number
", [
	"order_id" => 3,
	"tracking_number" => 666
]);



$query = $this->Select("SELECT quantity
	FROM oc_product
		WHERE quantity = :a
", [
	"a" => 1000
]);



$query = $this->SelectAll("SELECT quantity
	FROM oc_product
		WHERE quantity = :a
", [
	"a" => 1000
]);