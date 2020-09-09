<?php
include "config.php";
include "system/database.php";
include "system/functions.php";
include "app/custom.php";
include "system/router.php";
$router = new router();
$router->index();
