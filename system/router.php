<?php
include "functions.php";
Class Router extends Functions {
	protected $url;
	function Index() {
		$this->url = rtrim($_SERVER["SCRIPT_NAME"], "index.php");
		$this->url = str_replace($this->url, "/", $_SERVER["REQUEST_URI"]);
		$this->url = rtrim($this->url, "/");
		$this->url = explode("?", $this->url)[0];
		if (file_exists($this->DirApp($this->url . ".php"))) {
			include $this->DirApp($this->url . ".php");
		} else if (file_exists($this->DirApp($this->url . "index.php"))) {
			include $this->DirApp($this->url . "index.php");
		} else if (file_exists($this->DirApp($this->url . "/index.php"))) {
			include $this->DirApp($this->url . "/index.php");
		} else {
			include $this->DirApp("common/404.php");
		}
	}
}