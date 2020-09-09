<?php
class functions extends database {
	protected $option;
	function __construct() {
		parent::__construct();
	}
	function root_directory($data = null) {
		return rtrim($_SERVER["SCRIPT_FILENAME"], "index.php") . $data;
	}
	function app_directory($data = null) {
		return $this->root_directory("app/" . $data);
	}
	function root_url($data = null) {
		return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === "on" ? "https" : "http") . "://" . $_SERVER["HTTP_HOST"] . rtrim($_SERVER["SCRIPT_NAME"], "index.php") . $data;
	}
	function app_url($data = null) {
		return $this->root_url("app/" . $data);
	}
	function header($data = null) {
		include $this->app_directory("common/header.php");
	}
	function footer($data = null) {
		include $this->app_directory("common/footer.php");
	}
}
