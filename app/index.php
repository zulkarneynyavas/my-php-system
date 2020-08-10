<?php
$data = (object) [
	"title" => "Züber"
];
$this->header($data);
?>
<?php
//echo $this->print_json(["hello world"]);
echo $this->print_json($this->oc_order());
?>
<?php
$this->footer();
?>