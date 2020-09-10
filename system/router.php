<?php
class router extends custom {
	protected $url;
	protected $callback;
	function index() {
		$this->url = rtrim($_SERVER["SCRIPT_NAME"], "index.php");
		$this->url = str_replace($this->url, "/", $_SERVER["REQUEST_URI"]);
		$this->url = rtrim($this->url, "/");
		$this->url = explode("?", $this->url)[0];
		$this->callback = explode("/", $this->url);
		//var_dump($this->callback);
		$this->callback = array_pop($this->callback);
		if (preg_match("/.html$/", $this->callback)) {
			$this->url = rtrim($this->url, $this->callback);
			$this->url = rtrim($this->url, "/");
			$this->callback = rtrim($this->callback, ".html");
		} else {
			$this->callback = false;
		}
		$this->url = ltrim($this->url, "/");
		var_dump($this->url);
		var_dump($this->callback);
		if (file_exists($this->app_directory($this->url . ".php"))) {
			include $this->app_directory($this->url . ".php");
		} else if (file_exists($this->app_directory($this->url . "index.php"))) {
			include $this->app_directory($this->url . "index.php");
		} else if (file_exists($this->app_directory($this->url . "/index.php"))) {
			include $this->app_directory($this->url . "/index.php");
		} else {
			include $this->app_directory("common/404.php");
		}
	}
}
