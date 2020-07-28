<?php
include "functions.php";
Class Router extends Functions {
	protected $url;
	function Index() {
		$this->url = str_replace($_SERVER["HTTP_HOST"], "", DB_BASE);
		$this->url = str_replace($this->url, "/", $_SERVER["REQUEST_URI"]);
		$this->url = rtrim($this->url, "/");
		$this->url = explode("?", $this->url)[0];
		if (file_exists($this->Directory($this->url . ".php"))) {
			include $this->Directory($this->url . ".php");
		} else if (file_exists($this->Directory($this->url . "/index.php"))) {
			include $this->Directory($this->url . "/index.php");
		} else {
			include $this->Directory("common/404.php");
		}
	}
}