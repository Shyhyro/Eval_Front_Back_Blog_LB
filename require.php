<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT'];

$rootHtml = "/" . basename($_SERVER['DOCUMENT_ROOT']);
$rootHtml = str_replace("//", "/", $rootHtml);

require_once $root . "/Classes/DB.php";
require_once $root . "/Controller/UserController.php";
require_once $root . "/Entity/User.php";




