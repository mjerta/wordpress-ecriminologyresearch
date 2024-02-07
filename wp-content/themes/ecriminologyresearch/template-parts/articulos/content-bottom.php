<?php
    $count = count_cat_post('articulos');
    if ( $count >= 9 ) {
?>

    <div class="below-main-articles">
        <h1 class="header-below-main-articles">More Articles</h1>
        <div class="caret">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 109.898 59.899">
                <path id="Path_44" data-name="Path 44" d="M9066.665-3550l50,50,50-50" transform="translate(-9061.716 3554.949)" fill="none" stroke="#465a33" stroke-linecap="round" stroke-width="7"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 109.898 59.899">
                <path id="Path_44" data-name="Path 44" d="M9066.665-3550l50,50,50-50" transform="translate(-9061.716 3554.949)" fill="none" stroke="#465a33" stroke-linecap="round" stroke-width="7"/>
            </svg>
        </div>
        <div class="grid-tiles">
        <?php
        $args = array(
            'category_name'    => 'articulos',
            'posts_per_page'    => 7,
            'offset'            => 2
        );
        $iterator = 1;
        $queryContentTop = new WP_Query($args);
        if($queryContentTop->have_posts()) {
            while($queryContentTop->have_posts()){
                $queryContentTop->the_post();?>
                <div class= "tile-<?php echo $iterator++?>">
                    <a href="<?php the_permalink() ?>">
                        <div class="img-article" style="background: #5f4f4f; <?php if ( get_the_post_thumbnail() ) { ?>background: url(<?php the_post_thumbnail_url(); } ?>)">
                            <div class="img-article-top">
                                <?php trimmed_title('<h1>', '</h1>'); ?>
                                <p>
                                    <?php
                                        echo get_the_ID();
                                        excerpt(40);
                                    ?>
                                </p>
                            </div>
                            <div class="img-article-bottom">
                                <div class="line"></div>
                                    <p>
                                        <small>
                                        Author: <?php the_author() ?> - Date <?php the_time('d-m-Y'); ?>
                                        </small>
                                    </p>
                            </div>
                        </div>
                    </a>
                </div>

            <?php
            }
        }?>

        </div>
    </div>

<?php
    }
?>