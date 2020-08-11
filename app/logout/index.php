<?php
$data = (object) [
	"title" => "Giriş Yap"
];
$this->header($data);
?>
<?php
if ($this->is_login()) {
	echo $this->logout();
} else {
	echo "Önce giriş yapmalısın";
}
?>
<?php
$this->footer();
?>