<?php
    get_header();
?>

<section class="hero">
    <div class="hero-background">           
        <div class="hero-title">
            <h1><?php single_cat_title(); ?></h1>
        </div>       
        <div class="hero-image">
            <div class="hero-image-inside">

                <?php
                    if(is_category('articulos')) {
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
    if(is_category('articulos')) {
?>

<main class="articulos-main">
    <div class="main-background"></div>

    <?php
        get_template_part('./template-parts/articulos/content', 'top');
        get_template_part('./template-parts/articulos/content', 'bottom');
    ?>

</main>

<?php
    }
    else {
?>

<main class="main-other">
    <!-- <div class="main-background"></div> -->
</main>

<?php
    }
?>

<?php
    get_footer();
?>