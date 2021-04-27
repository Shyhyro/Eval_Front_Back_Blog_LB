<?php
    require_once "../require.php";

    include "../View/Elements/header.php";
?>

            <div class="one_blog_post">
                <div class="one_blog_image_tittle">
                    <div class="one_blog_image"><img src="https://loremflickr.com/1080/1080/nature" /></div>
                    <div class="one_blog_post_info">
                        <div class="one_blog_post_date">01.01.2021 / in ..</div>
                        <div class="one_blog_post_tittle"><h3>TITRE</h3></div>
                    </div>
                </div>
                <div>
                    <div class="one_blog_post_content">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi autem dolorum magnam tenetur.
                        Ab consectetur, consequatur debitis dolorum eos facere hic in molestiae quasi recusandae repellendus, rerum unde ut.
                    </div>
                    <div class="one_blog_post_button">
                        <form method="post" name="add_commentary">
                            <input type="text">
                            <button type="submit" class="send_commentary_button">Envoyer</button>
                        </form>
                    </div>
                </div>
                <div class="commentary_div">
                    <div class="commentary">
                        <div>Username / <span>01.01.2021, 00:00</span></div>
                        <div class="commentary_content">This is a message.</div>
                    </div>
                    <div class="commentary">
                        <div>Username / <span>01.01.2021, 00:00</span></div>
                        <div class="commentary_content">This is a message.</div>
                    </div>
                    <div class="commentary">
                        <div>Username / <span>01.01.2021, 00:00</span></div>
                        <div class="commentary_content">This is a message.</div>
                    </div>
                </div>
            </div>



<?php
    include "../View/Elements/footer.php";