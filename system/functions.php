<?php
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
	function UriRoot($data = null) {
		return $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["HTTP_HOST"] . rtrim($_SERVER["SCRIPT_NAME"], "index.php") . $data;
	}
	function UriApp($data = null) {
		return $this->UriRoot("app/" . $data);
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
		return "<meta http-equiv=\"refresh\" content=\"" . $time . "; url=" . $this->UriRoot($url) . "\">";
	}
	function ExitIfNotLogin() {
		if (!$this->IsLogin()) {
			exit("Lütfen <a href=\"" . $this->UriRoot("login") . "\">giriş yap</a>");
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
		return $this->Redirect("", 2);
	}
}
