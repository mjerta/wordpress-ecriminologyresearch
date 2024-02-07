<?php
    get_header();
?>

<section class="hero">
    <div class="hero-background">
        <div class="hero-title">
            <?php the_title( '<h1>', '</h1>' ); ?>
        </div>       
        <div class="hero-image">
            <div class="hero-image-inside">

                <?php
                        if(is_page('cooky-policy') || is_page('terminos-condiciones') || is_page('privacy-policy')) {
                    ?>
                    
                        <div class="hero-image-inside-legal"></div>

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
<main class="main-other">
    <!-- <div class="main-background"></div> -->
    <div class="page">
        <div class="page-inside">
            <?php
                if(have_posts()) {
                    while(have_posts()) {
                        the_post();

                        the_content();
                    }
                }
            ?>
        </div>
    </div>
</main>

<?php
    get_footer();
?>