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

$select = $db->SELECTALL("SELECT * FROM oc_product ORDER BY product_id DESC");

//print_r($select);

print '<pre>' . json_encode($select, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) . '</pre>';

//print json_encode($select, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);

?>
	</body>
</html>