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
	<h1>Giriş yap</h1>
	<div class="input-container">
		<div class="input-inner">
			<label for="username">Kullanıcı adı</label>
			<input type="text" name="username" id="username" placeholder="*******">
		</div>
	</div>
	<div class="input-container">
		<div class="input-inner">
			<label for="password">Şifre</label>
			<input type="password" name="password" id="password" placeholder="*******">
		</div>
	</div>
	<?php
if (isset($_SERVER["HTTP_REFERER"])) {
?>
	<input type="hidden" name="http_referer" value="<?php echo $_SERVER["HTTP_REFERER"] ?>">
<?php
}
?>
	<div class="button-container">
		<div class="button-inner">
			<button>Gönder</button>
		</div>
	</div>
	<ul id="json-response"></ul>
</form>
<?php
} else {
	echo "Zaten giriş yaptınız";
}
?>
<?php
$this->footer();
?>