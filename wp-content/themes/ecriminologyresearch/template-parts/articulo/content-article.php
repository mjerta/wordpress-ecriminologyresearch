<div class="article-top">

    <?php
        the_title('<h1>', '</h1>')
    ?>

    <div class="line"></div>
    <small>
        Author: <span> <?php the_author() ?> </span> - Date <?php the_time('d-m-Y'); ?>
    </small>
    <div class="article-top-image" style="background: #5f4f4f; <?php if ( get_the_post_thumbnail() ) { ?>background: url(<?php the_post_thumbnail_url(); } ?>)"></div>
</div>

<div class="article-content">

    <?php
        echo get_the_content();
    ?>
    <section>

        <?php
        $post_tags = get_the_tags();
        $count_tags = count($post_tags);
        $last_tag = $post_tags[array_key_last($post_tags)];
        // echo var_dump($post_tags);
        if ($post_tags) {
            echo '<strong>Palabras claves: </strong>';
            echo '<p>';
            if($count_tags == 1) {
                echo $post_tags[0]->name;
            }
            else {
                foreach($post_tags as $tag) {
                    if($tag != $last_tag) {
                        echo $tag->name . ', '; 
                    }
                    else {
                        echo $tag->name;
                    }
                }
            }
            echo '</p>';
        }
        ?>

    </section>
</div>