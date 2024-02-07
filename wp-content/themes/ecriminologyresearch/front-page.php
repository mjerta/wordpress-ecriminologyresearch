<?php
    get_header();
?>

<section class="hero">
    <div class="hero-background">
    </div>
    <div class="hero-text">
        <div class="hero-text-inside">
            <p>
                Espacio dedicado a difundir las investigaciones más relevantes en el área criminológica.<br>
                Compartir conocimiento, hacer colaboraciones con investigaciones en curso, capacitarse sobre
                temas de interés y estrechar lazos con diversos profesionales de esta área del saber.
            </p>
        </div>
    </div>
    <div class="hero-image-home">
        <div class="hero-image-home-inside"></div>
    </div>
</section>
<main class="home-main">
    <!-- <div class="main-background"></div> -->
    <h1 class="offering-before">Próximamente actividades formativas</h1>
    <div class="offering">
        <div class="offering-list">
            <h1>Próximamente actividades formativas</h1>
            <div class="offering-list-inside">

                <div class="offering-list-inside-top">
                    <h2>¿Que ofrecemos?</h2>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/offering-img.png" alt="people">
                </div>
                
                <ul>
                    <li>Investigaciones sociales generales y especializadas</li>
                    <li>Investigación criminológica</li>
                    <li>Formacion Superior Universitaria</li>
                    <li>Análisis de comportamiento y conductual</li>
                </ul>
            </div>
        </div>
        <div class="offering-form">
            <div class="offering-form-inside">
                <h2>¿Quieres ser notificado?</h2>

                <?php
                    if( function_exists( 'mc4wp_show_form' ) ) {
                        mc4wp_show_form();
                    }
                ?>
            </div>
            
        </div>
    </div>
</main>

<?php
    get_footer();
?>