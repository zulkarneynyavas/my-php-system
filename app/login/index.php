<?php
$data = (object) [
	"title" => "Giriş Yap"
];
$this->Header($data);
?>
<?php
if (!$this->IsLogin()) {
?>
<form onsubmit="return Send(this)" method="post" action="<?php echo $this->UriRoot("login/control") ?>">
	<h1>Giriş yap</h1>
	<input type="text" name="username" id="username" placeholder="*******">
	<input type="password" name="password" id="password" placeholder="*******">
	<button>Gönder</button>
	<ul><li>?</li></ul>
</form>
<?php
} else {
	echo "Zaten giriş yaptınız";
}
?>
<?php
$this->Footer();
?>