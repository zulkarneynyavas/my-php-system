<?php
$data = (object) [
	"title" => "Giriş Yap"
];
$this->header($data);
?>
<?php
if (!$this->is_login()) {
?>
<form onsubmit="return Send(this)" method="post" action="<?php echo $this->root_url("login/control") ?>">
	<div><h1>Giriş yap</h1></div>
	<div><input type="text" name="username" id="username" placeholder="*******"></div>
	<div><input type="password" name="password" id="password" placeholder="*******"></div>
	<div><button>Gönder</button></div>
	<div><input type="hidden" name="warning"></div>
</form>
<?php
} else {
	echo "Zaten giriş yaptınız";
}
?>
<?php
$this->footer();
?>