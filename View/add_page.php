<?php
require_once "../require.php";

include "../View/Elements/header.php";

if ($_SESSION['role'] == 1) {

    if (isset($_GET['error'])) {
        if ($_GET['error'] === '1') {
            echo "<div id='error_problem' class='green'>Catégorie ajouter!</div>";
        } else if ($_GET['error'] === '2') {
            echo '<div id="error_problem" class="red">Un problème est survenu!</div>';
        } else if ($_GET['error'] === '3') {
            echo '<div id="error_problem" class="green">Article publier!</div>';
        }
    }

?>
    <!-- Form for add a new category -->
    <form method="post" name="category_form" id="article_form" class="addpage_article" action="../new_category.php?error=0">
        <h2>Nouvelle catégorie:</h2>
        <label class="addpage_form_info">
            Category:
            <input type="text" name="new_category">
        </label>
        <button type="submit" class="read_more_button">Ajouter</button>
    </form>

    <!-- Form for add a new Post 'Article' -->
    <form method="post" name="article_form" id="article_form" class="addpage_article" action="../new_article.php?error=0">
        <h2>Nouvel article:</h2>
        <label class="addpage_form_info">
            Titre:
            <input type="text" name="tittle">
            Category:
            <select name="category">
                <?php
                    $category = new CategoryController();
                    $category = $category->getAllCategory();

                    foreach ($category as $allCategory) {
                        echo "<option value='".$allCategory->getId()."'>".$allCategory->getCategory()."</option>";
                    }
                ?>
            </select>
            Resume:
            <textarea id="resume" name="resume"></textarea>
            Content:
            <textarea name="content" id="content"></textarea>
            Lien Image:
            <input name="img" id="image" maxlength="250">
        </label>
        <button type="submit" class="read_more_button">Publier</button>
    </form>

<?php
} else {
    header("location:index.php");
}

include "../View/Elements/footer.php";