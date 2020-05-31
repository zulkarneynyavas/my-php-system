<?php
include('database.php');
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

$insert = $db->INSERT(
	'oc_product', 
	[
		'model'	=> 'fooüğşi',
		'sku'	=> 'bar'
	]
);

print_r($insert);
*/
///////////////////////////

$update = $db->UPDATE(
	'oc_product', 
	[
		'model'	=> 'qwex',
		'sku'	=> 'zxcxcvüğşül'
	],
	[

		214
	],
	'product_id'
);

print_r($update);

///////////////////////////

$select = $db->SELECTALL("SELECT * FROM oc_product ORDER BY product_id DESC");

print '<pre>' . json_encode($select, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) . '</pre>';

?>
	</body>
</html>