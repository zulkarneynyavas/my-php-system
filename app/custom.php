<?php
Class custom extends functions {
	function print_json($array) {
		return "<pre>" . json_encode($array, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) . "</pre>";
	}
}