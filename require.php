<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT'];

$rootHtml = "/" . basename($_SERVER['DOCUMENT_ROOT']);
$rootHtml = str_replace("//", "/", $rootHtml);

require_once $root . "/Classes/DB.php";
require_once $root . "/Controller/UserController.php";
require_once $root . "/Controller/PostController.php";
require_once $root . "/Controller/CategoryController.php";
require_once $root . "/Entity/User.php";
require_once $root . "/Entity/Post.php";
require_once $root . "/Entity/Category.php";




