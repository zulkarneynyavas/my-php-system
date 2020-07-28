app/
├── assets/
|	├── css/
|	|	└── style.css
|	└── img/
|		├── kartvizit.gif
|		└── logo.png
├──	common/
|	├── 404.php
|	├── footer.php
|	└── header.php
├──	info/
|	├── index.php
|	├── server.php
|	├── session.php
|	└── url.php
|	login/
|	├── index.php
|	└── control.php
|	logout/
|	└── index.php
└── index.php

*********************

DB Using
---------

$delete = $this->query("DELETE FROM oc_order_shipment 
    WHERE order_id = :order_id AND tracking_number = :tracking_number
", [
    ":order_id" => 3,
    ":tracking_number" => 666
]);
var_dump($delete);



$insert = $this->query("INSERT INTO oc_order_shipment 
    (order_id, date_added, shipping_courier_id, tracking_number) 
        VALUES 
            (:order_id, :date_added, :shipping_courier_id, :tracking_number)
", [
    ":order_id" => 3,
    ":date_added" => date("Y-m-d H-i-s"),
    ":shipping_courier_id" => 666,
    ":tracking_number" => 666
]);
var_dump($insert);



$update = $this->query("UPDATE oc_order_shipment
    SET tracking_number = :a
        WHERE order_id = :b
", [
    "a" => 333,
    "b" => 333
]);
var_dump($update);



$select = $this->query("SELECT quantity
    FROM oc_product
        WHERE quantity = :a
", [
    "a" => 1000
]);
var_dump($select);