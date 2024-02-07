<?php
    get_header();
?>

<section class="hero">
    <div class="hero-background">
        <div class="hero-title">
            <h1>Articulos</h1>
        </div>       
        <div class="hero-image">
            <div class="hero-image-inside">
                
                <?php
                    if(has_category('articulos')) {
                ?>
                
                    <div class="hero-image-inside-articulos"></div>

                <?php
                    }
                    else {
                ?>

                    <div class="hero-image-inside-other"></div>

                <?php
                    }
                ?>

            </div>
        </div>
    </div>
    <div class="liberty">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/liberty-lady.svg" alt="liberty-lady">
    </div>
</section>

<?php
    if(has_category('articulos')) {
?>

    <main class="articulo-main">

<?php
    }
    else {
?>

    <main class="main-other">

<?php
    }
?>
    <!-- <div class="main-background"></div> -->
    <?php
        if(have_posts()) {
            while(have_posts()) {
                the_post();
    ?>
                <div class="page">
                    <div class="page-inside">

                        <?php
                            if(has_category('articulos')) {
                                get_template_part('./template-parts/articulo/content', 'article');
                                get_template_part('./template-parts/articulo/content', 'download');
                            }
                        ?>

                    </div>
                </div>

    <?php
                if(has_category('articulos')) {
                    get_template_part('./template-parts/articulo/content', 'sidebar');
                }
            }
        }
    ?>

</main>

<?php
    get_footer();
?>