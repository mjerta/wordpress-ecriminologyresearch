<?php
    /*
    Template Name: Cursos
    */

    get_header();

?>


<section class="hero">
    <div class="hero-background">
        <div class="hero-title">
        </div>       
        <div class="hero-image">
            <div class="hero-image-inside">
                <div class="hero-image-inside-cursos"></div>
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
            <div class="list-course">
                <ol>
                    <li>Especialidades
                        <ul>
                            <li>Análisis de fraude y lavado de activos</li>
                            <li>Ciencias de la seguridad humana</li>
                            <li>Ciberseguridad</li>
                            <li>Derechos Humanos</li>
                            <li>Psicología criminal</li>
                            <li>Prevención social en conducta criminal</li>
                        </ul>
                    </li>
                    <li>Maestrías
                        <ul>
                            <li>Máster en Biología Criminal</li>
                            <li>Máster en Criminología aplicada a la ciberseguridad</li>
                            <li>Máster en Criminología aplicada a la seguridad publica</li>
                            <li>Máster en Criminología y Derechos humanos</li>
                            <li>Máster en Criminología aplicada a las neurociencias</li>
                            <li>Máster en política Criminal</li>
                            <li>Máster en Victimología</li>
                            <li>Máster en Prevención a la Violencia de Genero e Intrafamiliar</li>
                            <li>Máster en Criminología psicológica</li>
                            <li>Máster en Tratamiento Penitenciario y reinserción social</li>
                            <li>Máster en Criminología Sociológica</li>
                        </ul>
                    </li>
                </ol>

            </div>
        </div>
    </div>
</main>


<?php

    get_footer();

?>