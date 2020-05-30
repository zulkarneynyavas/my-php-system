<?php
include('functions.php');
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
<?php
$variable = $Functions->index("SELECT * FROM oc_product");
foreach ($variable as $key => $value) {
    echo $value['product_id'] . '<br>';
}
?>
    </body>
</html>