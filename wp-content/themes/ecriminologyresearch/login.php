<?php
    /*
    Template Name: Login
    */

    get_header();


?>

<section class="hero">
    <div class="hero-background">
        <div class="hero-title">
            <h1>Login</h1>
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
    <div class="form-login">
        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
            <div class="form-title">
                <h1>Login</h1>
                <p>Sign in.</p>
            </div>
            <div class="validation">
                <section class="error-list-server-side">

                <?php
                    if(isset($login_errors)) {
                        foreach($login_errors as $value) {
                            echo '<p>';
                            echo $value;
                            echo '</p>';
                        }
                    }
                ?>

                </section>
            </div>
            <div class="form-group">
                <input type="text" name="username" placeholder="username">
            </div>            
            <div class="form-group">
                <input type="password" name="password" placeholder="password">
            </div>            
            <div class="form-group">
                <div class="row terms">
                    <div class="col">
                        <input type="checkbox" name="remember" value="yes">
                    </div>
                    <div class="col">
                        <p>Remember me</p>
                    </div>
                </div>
            </div>            
            <div class="form-group">
                <input type="submit" name="login" value="login">
            </div>
        </form>
    </div>
</main>

<?php
    get_footer();
?>