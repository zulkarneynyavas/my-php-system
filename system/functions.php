<?php
Class functions extends database {
	protected $option;
	function __construct() {
		parent::__construct();
		$this->option = json_decode(file_get_contents($this->root_directory("options.json")));
	}
	function root_directory($data = null) {
		return rtrim($_SERVER["SCRIPT_FILENAME"], "index.php") . $data;
	}
	function app_directory($data = null) {
		return $this->root_directory($this->option->app . "/" . $data);
	}
	function root_url($data = null) {
		return $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["HTTP_HOST"] . rtrim($_SERVER["SCRIPT_NAME"], "index.php") . $data;
	}
	function app_url($data = null) {
		return $this->root_url($this->option->app . "/" . $data);
	}
	function header($data = null) {
		if (file_exists($this->app_directory("common/header.php"))) {
			include $this->app_directory("common/header.php");
		}
	}
	function footer($data = null) {
		if (file_exists($this->app_directory("common/footer.php"))) {
			include $this->app_directory("common/footer.php");
		}
	}
}