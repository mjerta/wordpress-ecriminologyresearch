<?php
    get_header();
?>

<section class="hero">
    <div class="hero-background">
        <div class="hero-title">
            <h1>404</h1>
        </div>       
        <div class="hero-image">
            <div class="hero-image-inside">
                <div class="hero-image-inside-other"></div>
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
            <h1>404 - this page does not exist</h1>
            <p>The page you were looking for does not exist.</p>
            <p>Click here to see all available links on this website:</p>
            
            <?php

                wp_list_pages(array(
                    'title_li'      =>  'Paginas',
                    'sort_column'   =>  'menu_order'
                ));
                wp_list_categories(array(
                    'title_li'      =>  'Categoría',
                    'exclude'       =>  '1'
                ));
            ?>

        </div>
    </div>
</main>

<?php
    get_footer();
?>