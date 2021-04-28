<?php
require_once "require.php";

$id = $_GET['id'];

if(isset($_GET['error']) && $_GET['error'] === "0") {

    $del_post = new PostController();
    $del_post = $del_post->deletePost($_GET['id']);

    header("location: ./View/index.php?error=1");

} else {
    header("location: ./View/index.php?error=2");
}
