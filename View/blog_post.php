<?php
    require_once "../require.php";

    include "../View/Elements/header.php";

    if (isset($_SESSION['role'])){
        if ($_SESSION['role'] == 1 ){
            echo "<button class='option_button read_more_button orange' onclick='document.location.href=". '"post_modification.php?id=' . $_GET['id'] . '"' ."'>Modifier</button>";
            echo "<button class='option_button read_more_button red' onclick='document.location.href=". '"../post_delete.php?error=0&id=' . $_GET['id'] . '"' ."'>Supprimer <i class='fas fa-times'></i></button>";

            if (isset($_GET['error'])) {
                if ($_GET['error'] === '1') {
                    echo "<div id='error_problem' class='green'>Article modifier!</div>";
                } else if ($_GET['error'] === '2') {
                    echo '<div id="error_problem" class="red">Un problème est survenu!</div>';
                } else if ($_GET['error'] === '3') {
                    echo '<div id="error_problem" class="green">Commentaire envoyer!</div>';
                }else if ($_GET['error'] === '4') {
                    echo '<div id="error_problem" class="green">Commentaire supprimer!</div>';
                }
            }
        }
    }


    $post = new PostController();
    $elements = $post->getOnePost($_GET['id']);
    ?>

            <div class="one_blog_post">
                <div class="one_blog_image_tittle">
                    <div class="one_blog_image"><img alt="Image indisponible" src="<?php echo $elements->getImg(); ?>" /></div>
                    <div class="one_blog_post_info">
                        <div class="one_blog_post_date"><?php echo $elements->getDate(); ?> / in <?php echo $elements->getCategory(); ?></div>
                        <div class="one_blog_post_tittle"><h3><?php echo $elements->getTittle(); ?></h3></div>
                    </div>
                </div>
                <div>
                    <div class="one_blog_post_content"><?php echo $elements->getContent(); ?></div>
                    <div class='one_blog_post_button'>
                <?php
                    if (isset ($_SESSION['username'], $_SESSION['id'])){
                ?>
                        <form method='post' name='add_commentary' action="../new_commentary.php?error=0&id=<?php echo $_GET['id'] ?>">
                            <input type='text' name="commentary">
                            <button type='submit' class='send_commentary_button'>Envoyer</button>
                        </form>
                <?php
                    }
                ?>
                    </div>
                </div>
                <div class='commentary_div'>
                    <?php
                        $all_message = new MessageController();
                        $all_message = $all_message->getAllMessage($_GET['id']);
                        $all_message = array_reverse($all_message);

                        foreach ($all_message as $message) {
                            $user = new UserController();
                            $user = $user->searchUser($message->getUser()); ?>
                                <div class='commentary_div'>
                                    <?php
                                    if ($_SESSION['role'] == 1 ){
                                        echo "<button class='option_button read_more_button red' onclick='document.location.href=".
                                            '"../commentary_delete.php?error=0&id=' . $_GET['id'] . '&idcomment='. $message->getId() .'"' .
                                            "'>Supprimer <i class='fas fa-times'></i></button>";
                                    }
                                    ?>
                                    <div> <?=$user->getUsername()?></div>
                                    <div class='commentary_content'><?=$message->getContent()?></div>
                                </div>
                    <?php
                        }
                    ?>
                </div>
            </div>



<?php

    include "../View/Elements/footer.php";