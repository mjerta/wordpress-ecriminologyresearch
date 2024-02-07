<section class="download">
    <h1>Read more</h1>



    <?php 
        if (!is_user_logged_in() ) {
    ?>

        <p>To be able to see the full article you must be logged in.</p>
        <div class="btn">
            <a href="<?php echo get_permalink() ?>/login">login</a>
        </div>

    <?php
        }
        else {
    ?>

        <p>Click here to downdload the article.</p>
        <?php
            $file = get_field('attachment');
            if( $file ) {

                $url_exploded = explode(content_url(), $file);
                $string = "../../..";
                $data = $string . $url_exploded[1];
        ?>

            <form action="<?php echo get_template_directory_uri(); ?>/inc/download.php" method="POST">
                <input type="hidden" name="data" value="<?php encrypt_data($data) ?>">
                <input type="submit" name="download" value="download">
            </form>

        <?php
            }
        }
    ?>

</section>