<?php
$data = (object) [
	"title" => "Hello World"
];
$this->header($data);
?>
<?php
echo $this->hello_world();
?>
<?php
$this->footer();
?>