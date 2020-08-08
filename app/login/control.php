<?php
$json = [];

if ($this->is_login()) {
	$json["error"]["warning"] = "Zaten giriş yaptınız";
}

if ($_POST["username"] == "") {
	$json["error"]["username"] = "Lütfen kullanıcı adı girin.";
}
if ($_POST["password"] == "") {
	$json["error"]["password"] = "Lütfen şifre girin.";
}

if (!isset($json["error"]["username"]) && !isset($json["error"]["password"])) {
	$oc_user = $this->select("SELECT username, password, salt
		FROM oc_user
			WHERE username = :a
				AND password = SHA1(CONCAT(salt, SHA1(CONCAT(salt, SHA1(:b)))))
	", [
		"a" => $_POST["username"],
		"b" => $_POST["password"]
	]);
	if (!$oc_user) {
		$json["error"]["warning"] = "Kullanıcı adı ya da şifre yanlış";
	}
}

if (!isset($json["error"])) {
	$_SESSION["session"]["login"] = true;
	if (isset($_POST["http_referer"])) {
		if ($_POST["http_referer"] == $this->root_url("logout")) {
			$json["success"] = "Yönlendiriliyorsunuz";
			$json["redirect"] = $this->root_url("login?login=true");
		} else {
			$json["success"] = "Yönlendiriliyorsunuz";
			$json["redirect"] = $_POST["http_referer"];
		}
	} else {
		$json["success"] = "Yönlendiriliyorsunuz";
		$json["redirect"] = $this->root_url("login?login=true");
	}
	$file = $this->app_directory("login/log.txt");
	$data = file_get_contents($file);
	$data .= $_SERVER['REMOTE_ADDR'] . "|" . $_SERVER['HTTP_USER_AGENT'] . "|" . date("Y-m-d H:i:s") . "*";
	file_put_contents($file, $data);
}
echo json_encode($json);
