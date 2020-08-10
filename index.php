<?php
if (!isset($_SESSION)) {
	session_start();
}
include "system/config.php";
include "system/database.php";
include "system/functions.php";
include "app/custom.php";
include "system/router.php";
$router = new router();
$router->index();
