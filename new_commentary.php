<?php
require_once "require.php";

$id = $_GET['id'];
$user = $_SESSION['id'];

if(isset($_GET['error'], $_POST['commentary']) && $_GET['error'] === "0") {
    $message = addslashes(strip_tags(trim($_POST['commentary'])));

    $new_message = new MessageController();
    $new_message = $new_message->addMessage($user, $message ,$id);

    header("location: ./View/blog_post.php?error=1&id=$id");

} else {
    header("location: ./View/blog_post.php?error=2&id=$id");
}
