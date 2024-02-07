<?php
    /*
    Template Name: Register
    */

    get_header();

?>

<section class="hero">
    <div class="hero-background">
        <div class="hero-title">
            <h1>register</h1>
        </div>       
        <div class="hero-image">
            <div class="hero-image-inside">
                <div class="hero-image-inside-login"></div>
            </div>
        </div>
    </div>
    <div class="liberty">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/liberty-lady.svg" alt="liberty-lady">
    </div>
</section>

<main class="main-other">
    <!-- <div class="main-background"></div> -->
    <div class="form-register">
        <form id="register-form" novalidate autocomplete="off" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
            <div class="form-title">
                <h1>register</h1>
                <p>Create your account. Its free and only takes a minute.</p>
            </div>
            <div class="validation">
                <section class="error-list-client-side">
                    <p id="register_username_error"></p>
                    <p id="register_email_error"></p>
                    <p id="register_password_error"></p>
                    <p id="register_password_repeat_error"></p>
                    <p id="register_checkbox_error"></p>
                </section>
                <section class="error-list-server-side">
                
                <?php
                    if(isset($register_data)) {
                        if($register_errors) {
                            foreach($register_errors as $value) {
                                echo '<p>';
                                echo $value;
                                echo '</p>';
                            }
                        }
                        // echo var_dump($register_errors);
                    }
                ?>

                </section>         
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <input type="text" id="first_name" name="first-name" placeholder="first name">
                    </div>
                    <div class="col">
                        <input type="text" id="last_name" name="last-name" placeholder="last name">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="text" id="register_username" name="username" placeholder="username" required>
            </div>
            <div class="form-group">
                <input type="email" id="register_email" name="email" placeholder="email" required>
            </div>
            <div class="form-group">
                <input type="password" id="register_password" name="password" placeholder="password" minlength="6" required>
            </div>
            <div class="form-group">
                <input type="password" id="register_password_repeat" name="password-confirmation" placeholder="confirm password" required>
            </div>
            <div class="form-group">
                <div class="row terms">
                    <div class="col">
                        <input type="checkbox" id="register_checkbox" name="terms" value="Yes">
                    </div>
                    <div class="col">
                        <p>I accept the <a href="#">Terms and conditions</a> & <a href="#">Privacy Policy</a></p>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" id="register_submit" name="register" value="register now">
            </div>
        </form>
    </div>
</main>

<?php
    get_footer();
?>