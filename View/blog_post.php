<?php
    require_once "../require.php";

    include "../View/Elements/header.php";

    $post = new PostController();
    $elements = $post->getOnePost($_GET['id']);
    ?>

            <div class="one_blog_post">
                <div class="one_blog_image_tittle">
                    <div class="one_blog_image"><img src="<?php echo $elements->getImg(); ?>" /></div>
                    <div class="one_blog_post_info">
                        <div class="one_blog_post_date"><?php echo $elements->getDate(); ?> / in <?php echo $elements->getCategory(); ?></div>
                        <div class="one_blog_post_tittle"><h3><?php echo $elements->getTittle(); ?></h3></div>
                    </div>
                </div>
                <div>
                    <div class="one_blog_post_content"><?php echo $elements->getContent(); ?></div>
                    <div class="one_blog_post_button">
                        <form method="post" name="add_commentary">
                            <input type="text">
                            <button type="submit" class="send_commentary_button">Envoyer</button>
                        </form>
                    </div>
                </div>
                <?php
                    if (isset ($_SESSION['username'], $_SESSION['id'])){
                        echo "
                    <div class='commentary_div'>
                        <div class='commentary'>
                            <div>Username / <span>01.01.2021, 00:00</span></div>
                            <div class='commentary_content'>This is a message.</div>
                        </div>
                        <div class='commentary'>
                            <div>Username / <span>01.01.2021, 00:00</span></div>
                            <div class='commentary_content'>This is a message.</div>
                        </div>
                        <div class='commentary'>
                            <div>Username / <span>01.01.2021, 00:00</span></div>
                            <div class='commentary_content'>This is a message.</div>
                        </div>
                    </div>
                    ";
                    }
                ?>
            </div>



<?php

    include "../View/Elements/footer.php";