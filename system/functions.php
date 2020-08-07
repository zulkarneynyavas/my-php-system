<?php
include "database.php";
Class Functions extends Database {
	protected $option;
	function __construct() {
		parent::__construct();
		$this->option = json_decode(file_get_contents($this->DirRoot("options.json")));
	}
	function DirRoot($data = null) {
		return rtrim($_SERVER["SCRIPT_FILENAME"], "index.php") . $data;
	}
	function DirApp($data = null) {
		return $this->DirRoot("app/" . $data);
	}
	function UrlRoot($data = null) {
		return $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["HTTP_HOST"] . rtrim($_SERVER["SCRIPT_NAME"], "index.php") . $data;
	}
	function UrlApp($data = null) {
		return $this->UrlRoot("app/" . $data);
	}
	function Header($data = null) {
		include $this->DirApp("common/header.php");
	}
	function Footer($data = null) {
		include $this->DirApp("common/footer.php");
	}
	function PrintJson($data) {
        return "<pre>" . json_encode($data, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) . "</pre>";
	}
	function PrintMoney($data) {
        return number_format($data, 2, ",", ".") . " &#8378;";
	}
	function Redirect($url, $time) {
		if (!preg_match("/^http.+/", $url)) {
			$url = $this->UrlRoot($url);
		}
		return "<meta http-equiv=\"refresh\" content=\"" . $time . "; url=" . $url . "\">";
	}
	function ExitIfNotLogin() {
		if (!$this->IsLogin()) {
			exit("Lütfen <a href=\"" . $this->UrlRoot("login") . "\">giriş yap</a>");
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