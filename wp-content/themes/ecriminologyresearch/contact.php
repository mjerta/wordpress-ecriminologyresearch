<?php
    /*
    Template Name: Contact
    */

    get_header();

?>

<section class="hero">
    <div class="hero-background">
        <div class="hero-title">
            <?php the_title( '<h1>', '</h1>' ); ?>
        </div>       
        <div class="hero-image">
            <div class="hero-image-inside">
                <div class="hero-image-inside-contact"></div>
            </div>
        </div>
    </div>
    <div class="liberty">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/liberty-lady.svg" alt="liberty-lady">
    </div>
</section>
<main class="main-other">
    <!-- <div class="main-background"></div> -->
    <div class="form-contact">
        <form id="contact-form" novalidate autocomplete="off" action="<?php the_permalink() ?>" method="POST">
            <div class="form-title">
                <h1>Bienvenido a nuestra página de contacto</h1>
                <p>Si tienes alguna pregunta o sugerencia, por favor hazno saber tu inquietud a traves de este formulario.</p>
            </div>
            <div class="validation">
                <section class="error-list-client-side">
                    <p id="contact_name_error"></p>
                    <p id="contact_email_error"></p>
                    <p id="contact_message_error"></p>
                </section>
                <section class="error-list-server-side">
                
                    <?php
                        if(isset($contact_data)) {
                            if(!$contact_errors && $contact_send) {
                                echo '<p>';
                                echo 'Thankyou '. $contact_data['contact-name'];
                                echo '</p>';
                                echo '<p>';
                                echo 'Your email has been send!';
                                echo '</p>';
                            }
                            else {
                                foreach($contact_errors as $value) {
                                    echo '<p>';
                                    echo $value;
                                    echo '</p>';
                                }
                            }
                        }
                    ?>

                </section>

            </div>
            <div class="form-group">
                <input type="text" id="contact_name" name="contact-name" placeholder="Nombre" maxlength="35" required>
            </div>
            <div class="form-group">
                <input type="email" id="contact_email" name="contact-email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <textarea 
                    name="contact-message"
                    id="contact_message"
                    rows="10" 
                    placeholder="Tu comentario - must be at least 50 characters and nog longer then 350 characters" 
                    autocapitalize="sentences" 
                    minlength="50" 
                    maxlength="350" 
                    required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" id="contact_submit" name="contact-submit" value="Enviar">
            </div>
        </form>
    </div>
</main>



<?php
    get_footer();
?>