<?php
    $count = count_cat_post('articulos');
    if ( $count >= 9 ) {
        $args = array(
            'category_name'    => 'articulos',
            'posts_per_page'    => 2,
            'offset'            => 0
        );
    }
    else {
        $args = array(
            'category_name'    => 'articulos',
            'offset'            => 0
        );
    }

    $queryContentTop = new WP_Query($args);
    if($queryContentTop->have_posts()) {
        while($queryContentTop->have_posts()){
            $queryContentTop->the_post();
        ?>

            <article>
                <blockquote>
                
                    <?php
                        trimmed_title('<h1>', '</h1>'); 
                        excerpt(40);
                    ?>

                </blockquote>
                <a href="<?php the_permalink() ?>">
                    <div class="img-article" style="background: #5f4f4f; <?php if ( get_the_post_thumbnail() ) { ?>background: url(<?php the_post_thumbnail_url(); } ?>)">
                        <div class="img-overlay"></div>
                        <div class="img-article-top">
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
            </article>

        <?php
        }
    }
?>