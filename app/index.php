<?php
$data = (object) [
	"title" => "Züber"
];
$this->header($data);
?>
hello world
<?php
$this->footer();
$query = $this->select("SELECT * FROM oc_order",[]);
var_dump($query);
?>
