<?php
require_once "require.php";

if(isset($_GET['error'], $_POST['new_category']) && $_GET['error'] === "0") {
    $new_category = strip_tags(trim($_POST['new_category']));

    $category = new CategoryController();
    $add_Category = $category->addCategory($new_category);

    header("location: ./View/add_page.php?error=1");

} else {
    header("location: ./View/add_page.php?error=2");
}
