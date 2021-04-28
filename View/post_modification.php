<?php
require_once "../require.php";

include "../View/Elements/header.php";

if ($_SESSION['role'] == 1 ){
    $post = new PostController();
    $elements = $post->getOnePost($_GET['id']);

?>

    <!-- Form for modif a new Post 'Article' -->
    <form method="post" name="modif_form" id="modif_form" class="addpage_article" action="../post_modification.php?error=0&id=<?=$_GET['id'];?>">
        <h2>Modifier: <?php echo $elements->getTittle(); ?> du <?php echo $elements->getDate(); ?> / in <?php echo $elements->getCategory(); ?></h2>
        <label class="addpage_form_info">
            Titre:
            <textarea name="tittle"><?php echo $elements->getTittle(); ?></textarea>
            Category:
            <select name="category">
                <?php
                $category = new CategoryController();
                $category = $category->getAllCategory();

                foreach ($category as $allCategory) {

                    if ($allCategory->getCategory() === "" . $elements->getCategory() . ""){
                        echo "<option value='".$allCategory->getId()."' selected>".$allCategory->getCategory()."</option>";
                    } else {
                        echo "<option value='".$allCategory->getId()."'>".$allCategory->getCategory()."</option>";
                    }
                }
                ?>
            </select>
            Resume:
            <textarea id="resume" name="resume"><?php echo $elements->getResume(); ?></textarea>
            Content:
            <textarea name="content" id="content"><?php echo $elements->getContent(); ?></textarea>
            Lien Image:
            <textarea name="img" id="image" maxlength="250"><?php echo $elements->getImg(); ?></textarea>
        </label>
        <button type="submit" class="read_more_button">Modifier</button>
    </form>

<?php
}
include "../View/Elements/footer.php";