<?php
$data = (object) [
	"title" => "Çıkış Yap"
];
$this->header($data);
?>
<?php
if ($this->is_login()) {
	$this->logout();
	echo "Çıkış yapılıyor";
	echo $this->redirect("", 1);
} else {
	echo "Zaten çıkış yaptın";
}
?>
<?php
$this->footer();
?>