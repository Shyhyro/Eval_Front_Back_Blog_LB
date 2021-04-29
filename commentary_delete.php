<?php
require_once "require.php";

$id = $_GET['id'];

if(isset($_GET['error'], $_GET['idcomment']) && $_GET['error'] === "0") {

    $del_commentary = new MessageController();
    $del_commentary = $del_commentary->deleteMessage($_GET['idcomment']);

    header("location: ./View/blog_post.php?error=4&id=$id");

} else {
    header("location: ./View/blog_post.php?error=2&id=$id");
}
