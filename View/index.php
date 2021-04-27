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

?>
    <link rel="stylesheet" href="../View/Styles/all_blog_post.css">

            <div class="blog_post">
                <div class="blog_image"><img src="https://loremflickr.com/1080/1080/nature" /></div>
                <div class="blog_post_info">
                    <div class="blog_post_date">01.01.2021 / in ..</div>
                    <div class="blog_post_tittle"><h3>TITRE</h3></div>
                    <div class="blog_post_little_content">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi autem dolorum magnam tenetur.
                        Ab consectetur, consequatur debitis dolorum eos facere hic in molestiae quasi recusandae repellendus, rerum unde ut.
                    </div>
                    <div class="blog_post_button">
                        <button class="read_more_button" onclick="document.location.href='blog_post.php'">Voir article</button>
                    </div>
                </div>
            </div>

<?php
    include "../View/Elements/footer.php";