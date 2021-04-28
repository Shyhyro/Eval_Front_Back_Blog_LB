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
                        echo "
                        <form method='post' name='add_commentary'>
                            <input type='text'>
                            <button type='submit' class='send_commentary_button'>Envoyer</button>
                        </form>
                    ";
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
                            $user = $user->searchUser($message->getUser());
                            echo "<div class='commentary_div'>
                                    <div>" . $user->getUsername() . "</div>
                                    <div class='commentary_content'>". $message->getContent() ."</div>
                                </div>";
                        }
                    ?>
                </div>
            </div>



<?php

    include "../View/Elements/footer.php";