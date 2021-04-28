<?php
    require_once "require.php";

    if(isset($_GET['error'], $_POST['tittle'], $_POST['category'], $_POST['resume'], $_POST['content'], $_POST['img']) && $_GET['error'] === "0") {
        $tittle = addslashes(strip_tags(trim($_POST['tittle'])));
        $category = strip_tags(trim($_POST['category']));
        $resume = addslashes(strip_tags(trim($_POST['resume'])));
        $content = addslashes(strip_tags(trim($_POST['content'])));
        $img = strip_tags(trim($_POST['img']));

        $add_post = new PostController();
        $add_post = $add_post->addPost($tittle, $category, $resume, $content, $img);

        header("location: ./View/add_page.php?error=1");

    } else {
        header("location: ./View/add_page.php?error=2");
    }
