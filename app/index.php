<?php
$data = (object) [
	"title" => $this->option->brand
];
$this->header($data);


echo $this->HelloWorld();


$this->footer();
?>
