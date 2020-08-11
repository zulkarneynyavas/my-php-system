<?php
Class router extends custom {
	protected $url;
	function Index() {
		$this->url = rtrim($_SERVER["SCRIPT_NAME"], "index.php");
		$this->url = str_replace($this->url, "/", $_SERVER["REQUEST_URI"]);
		$this->url = rtrim($this->url, "/");
		$this->url = explode("?", $this->url)[0];
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
