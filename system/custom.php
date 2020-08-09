<?php
Class custom extends functions {
	function hello_world() {
		return "hello world " . $this->option->app;
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