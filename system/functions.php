<?php
Class functions extends database {
	protected $option;
	protected $app;
	function __construct() {
		parent::__construct();
		$this->option = json_decode(file_get_contents($this->root_directory("options.json")));
		$this->app = "app";
	}
	function root_directory($data = null) {
		return rtrim($_SERVER["SCRIPT_FILENAME"], "index.php") . $data;
	}
	function app_directory($data = null) {
		return $this->root_directory($this->app . "/" . $data);
	}
	function root_url($data = null) {
		return $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["HTTP_HOST"] . rtrim($_SERVER["SCRIPT_NAME"], "index.php") . $data;
	}
	function app_url($data = null) {
		return $this->root_url($this->app . "/" . $data);
	}
	function header($data = null) {
		include $this->app_directory("common/header.php");
	}
	function footer($data = null) {
		include $this->app_directory("common/footer.php");
	}
	function print_json($data) {
        return "<pre>" . json_encode($data, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) . "</pre>";
	}
	function print_money($data) {
        return number_format($data, 2, ",", ".") . " &#8378;";
	}
	function redirect($url, $time) {
		return "<meta http-equiv=\"refresh\" content=\"" . $time . "; url=" . $this->root_url($url) . "\">";
	}
	function exit_if_not_login() {
		if (!$this->is_login()) {
			exit("Lütfen <a href=\"" . $this->root_url("login") . "\">giriş yap</a>");
		}
	}
	function is_login() {
		if (isset($_SESSION["session"]["login"])) {
			return true;
		}
	}
	function logout() {
		session_unset();
		session_destroy();
		session_write_close();
		return "Çıkış yapılıyor" . $this->redirect("", 1);
	}
	function random($length = 16) {
		$characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$charactersLength = strlen($characters);
		$randomString = "";
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
}
