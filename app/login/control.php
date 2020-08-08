<?php
$json = [];
if ($_POST["username"] == "" || $_POST["password"] == "") {
	$json["error"][] = "Boşluk bıraktınız";
}
$oc_user = $this->Select("SELECT username, password, salt
	FROM oc_user
		WHERE username = :a
			AND password = SHA1(CONCAT(salt, SHA1(CONCAT(salt, SHA1(:b)))))
", [
	"a" => $_POST["username"],
	"b" => $_POST["password"]
]);
if (!$oc_user) {
	$json["error"][] = "Kullanıcı adı ya da şifre yanlış";
}
if ($this->IsLogin()) {
	$json["error"][] = "Zaten giriş yaptınız";
}
if (!isset($json["error"])) {
	$_SESSION["session"]["login"] = true;
	if (isset($_POST["http_referer"])) {
		if ($_POST["http_referer"] == $this->UriRoot("logout")) {
			$json["success"][] = "Yönlendiriliyorsunuz";
			$json["redirect"] = "index";
		} else {
			$json["success"][] = "Yönlendiriliyorsunuz";
			$json["redirect"] = $_POST["http_referer"];
		}
	} else {
		$json["success"][] = "Yönlendiriliyorsunuz";
		$json["redirect"] = "index";
	}
	$file = $this->DirApp("login/log.txt");
	$data = file_get_contents($file);
	$data .= $_SERVER['REMOTE_ADDR'] . "|" . $_SERVER['HTTP_USER_AGENT'] . "|" . date("Y-m-d H:i:s") . "*";
	file_put_contents($file, $data);
}
echo json_encode($json);