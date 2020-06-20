<?php
include 'database.php';
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<?php
/*
$delete = $db->DELETE(
	'oc_product', 
	'product_id', 
	[
		207,
		205
	]
);

print_r($delete);

///////////////////////////

$insert = $db->INSERT('oc_product', [
	'model'	=> 'fooüğşi',
	'sku'	=> 'bar'
]);

print_r($insert);

///////////////////////////



///////////////////////////

$update = $db->UPDATE(
	'oc_product', 
	[
		'model'	=> 'x',
		'sku'	=> 'zxce',
		'upc'	=> '65165'
	],
	'product_id',
	262
);

print_r($update);

*/

$select = $db->SELECT([
	"select" => [
		"model",
		"quantity",
		"image"
	],
	"from" => "oc_product",
	"where" => [
		"stock_status_id" => [
			"<",
			6
		],
		"quantity" => [
			"=",
			1000
		]
	],
	"limit" => 2
]);

/*
json_encode({
	"select": [
		"model",
		"quantity",
		"image"
	],
	"from": "oc_product",
	"where": {
		"stock_status_id": [
			"<",
			6
		],
		"quantity": [
			"=",
			1000
		]
	}
})
*/

//$select = $db->SELECTALL("SELECT model, quantity, image FROM oc_product WHERE stock_status_id < :stock_status_id AND quantity = :quantity", 6, 1000);

print "<pre>" . json_encode($select, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) . "</pre>";

?>
	</body>
</html>