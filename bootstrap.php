<?php

session_start();

ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);


define("BASE_DIR", __DIR__ . "/");
// print_r(BASE_DIR);
define("URL_ROOT", "http://127.0.0.1:8080/loyalty_club/");

// define("BASE_DIR_ADMIN", __DIR__ . "/admin-panel" . "/");
// // print_r(BASE_DIR);
// define("URL_ROOT_ADMIN", "http://127.0.0.1:8080/loyalty_club/admin-panel/");

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/app/core/Database.php";
