<?php
$data = (object) [
	"title" => "Giriş Yap"
];
$this->header($data);
?>
<?php
if (!$this->is_login()) {
?>
<form class="h-frm" onsubmit="return Send(this)" method="post" action="<?php echo $this->root_url("login/control") ?>">
	<div class="h-inp-con">
		<h1 class="h-hea">GİRİŞ FORMU</h1>
	</div>
	<div class="h-inp-con">
		<input class="h-inp" 
			type="text" 
			name="username" 
			id="username" 
			placeholder="*******">
	</div>
	<div class="h-inp-con">
		<input class="h-inp" 
			type="password" 
			name="password" 
			id="password" 
			placeholder="*******">
	</div>
	<div class="h-inp-con">
		<button class="h-btn">Gönder</button>
	</div>
	<div class="h-inp-con">
		<input type="hidden" name="warning">
	</div>
</form>
<?php
} else {
	echo "Zaten giriş yaptınız";
}
?>
<?php
$this->footer();
?>