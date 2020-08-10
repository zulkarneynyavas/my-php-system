<?php
$data = (object) [
	"title" => "Züber"
];
$this->header($data);
?>
<?php
echo $this->print_json(["hello world"]);
?>
<?php
$this->footer();
?>