<?php
if (!isset($_SESSION)) {
	session_start();
}
include "system/router.php";
$router = new Router();
$router->Index();