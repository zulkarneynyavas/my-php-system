<?php
class custom extends functions {
	function __construct() {
		parent::__construct();
		if (!isset($_SESSION)) {
			session_start();
		}
	}
	function print_json($array) {
        return "<pre>" . json_encode($array, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) . "</pre>";
	}
	function print_money($money) {
		//return number_format($money, 2, ",", ".") . " &#8378;";
		return number_format($money, 2, ",", ".");
	}
	function redirect($url, $time) {
		if (!preg_match("/^http.+/", $url)) {
			$url = $this->root_url($url);
		}
		return "<meta http-equiv=\"refresh\" content=\"" . $time . "; url=" . $url . "\">";
	}
	function is_login() {
		if (isset($_SESSION["session"]["login"])) {
			return true;
		}
	}
	function exit_if_not_login() {
		if (!$this->is_login()) {
			exit("Lütfen <a href=\"" . $this->root_url("login") . "\">giriş yap</a>");
		}
	}
	function logout() {
		session_unset();
		session_destroy();
		session_write_close();
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
	public function HelloWorld() {
		return "hello world " . $this->option->app;
	}
	public function Deneme() {
		return 0 + 1;
	}
}
