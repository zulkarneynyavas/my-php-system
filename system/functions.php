<?php
include "database.php";
Class Functions extends Database {
	protected $option;
	function __construct() {
		parent::__construct();
		$this->option = json_decode(file_get_contents("options.json"));
	}
	function Directory($directory = null) {
		return rtrim($_SERVER["SCRIPT_FILENAME"], "index.php") . "app/" . $directory;
	}
	function Header($data = null) {
		include $this->Directory("common/header.php");
	}
	function Footer($data = null) {
		include $this->Directory("common/footer.php");
	}
	function Link($url = null) {
		return DB_HTTP . DB_BASE . $url;
	}
	function File($url = null) {
		return DB_HTTP . DB_BASE . "app/" . $url;
	}
	function PrintJson($array) {
        return "<pre>" . json_encode($array, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) . "</pre>";
	}
	function PrintMoney($money) {
        return number_format($money, 2, ",", ".") . " &#8378;";
	}
	function Redirect($url, $time) {
		if (!preg_match("/^http.+/", $url)) {
			$url = $this->Link($url);
		}
		return "<meta http-equiv=\"refresh\" content=\"" . $time . "; url=" . $url . "\">";
	}
	function ExitIfNotLogin() {
		if (!$this->IsLogin()) {
			exit("Lütfen <a href=\"" . $this->Link("login") . "\">giriş yap</a>");
		}
	}
	function IsLogin() {
		if (isset($_SESSION["session"]["login"])) {
			return true;
		}
	}
	function Logout() {
		session_unset();
		session_destroy();
		session_write_close();
	}
	function Random($length = 16) {
		$characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$charactersLength = strlen($characters);
		$randomString = "";
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
}