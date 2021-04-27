<?php
    require_once "../require.php";

    include "../View/Elements/header.php";

    if (isset($_GET['post'])) {
        if ($_GET['post'] === 'off') {
            echo "<div id='error_problem' class='red'>Vous êtes maintenant Hors ligne!</div>";
        } else if ($_GET['post'] === 'on') {
            echo "<div id='error_problem' class='green'>Vous êtes maintenant en ligne!</div>";
        }
    }

    $posts = new PostController();
    $posts = $posts->getPost();

    foreach ($posts as $post) {
        echo "
            <div class='blog_post'>" .
                "<div class='blog_image'><img alt='image' src='https://loremflickr.com/1080/1080/nature'/></div>".
                "<div class='blog_post_info'>".
                    "<div class='blog_post_date'>". $post->getDate() . "/ in " . $post->getCategory() ."</div>".
                    "<div class='blog_post_tittle'><h3>". $post->getTittle() ."</h3></div>".
                    "<div class='blog_post_little_content'>". $post->getResume() ."</div>".
                    "<div class='blog_post_button'>".
                        "<button class='read_more_button' onclick='document.location.href=". '"blog_post_php?id=' . $post->getId() . '"' ."'>Voir article</button>".
                    "</div>".
                "</div>".
            "</div>";
    }
?>

<?php
    include "../View/Elements/footer.php";