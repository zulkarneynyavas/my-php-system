<?php
Class custom extends functions {
	function __construct() {
		parent::__construct();
		if (!isset($_SESSION)) {
			session_start();
		}
	}
	function print_json($array) {
		return "<pre>" . json_encode($array, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) . "</pre>";
	}
	function oc_order() {
		return $this->select("select * from oc_order",[]);
	}
}