<?php
session_start();
require_once 'config.php';

$page = $_GET['page'] ?? 'cimlap';

include 'templates/fej.tpl.php';

$path = "templates/{$page}.tpl.php";

if (file_exists($path)) {
    include $path;
} else {
    include "templates/404.tpl.php";
}

include 'templates/lab.tpl.php';