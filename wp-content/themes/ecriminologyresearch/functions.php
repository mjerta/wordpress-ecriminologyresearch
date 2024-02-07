<?php
/*
    ====================================================
    Main Setup
    ====================================================
*/

if ( ! function_exists( 'myfirsttheme_setup' ) ) :
function myfirsttheme_setup() {
 
    load_theme_textdomain( 'myfirsttheme', get_template_directory() . '/languages' );

    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'post-thumbnails' );

    add_theme_support( 'title-tag' );

    add_theme_support( 'custom-logo' );

    add_theme_support( 'post-formats', array ( 'aside', 'link', 'image' , 'gallery', 'quote', 'image', 'video' ) );

    add_theme_support( 'html5' , array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

    register_nav_menus( array(
        'header'    => __('Header'),
    ) );

 
}
endif; 
add_action( 'after_setup_theme', 'myfirsttheme_setup' );

/*
    ====================================================
    Image sizes
    ====================================================
*/
function add_image_sizes() {

}
add_action('after_setup_theme', 'add_image_sizes');

/*
    ====================================================
    Custom log in
    ====================================================
*/
function add_extra_nav_items( $items, $args ) {
    if ($args->theme_location == 'header') {
       if (is_user_logged_in()) {

            $items .= '<li class="sub menu-item">';
            $items .= '<ul>';
            $items .= '<li class="line menu-item">';
            $items .= '<div class="line-inside menu-item"></div>';
            $items .= '</li>';
            $items .= '<li class="link menu-item"><a href="'. wp_logout_url(home_url()) .'">'. __("Log Out") .'</a></li>';
            $items .= '</ul>';
            $items .= '</li>';

       } else {
            $items .= '<li class="sub menu-item">';
            $items .= '<ul>';
            $items .= '<li class="link menu-item"><a href="'. get_permalink() .'/login">'. __("Log In") .'</a></li>';
            $items .= '<li class="line menu-item">';
            $items .= '<div class="line-inside menu-item"></div>';
            $items .= '</li>';
            $items .= '<li class="link menu-item"><a href="'. get_permalink() .'/register">'. __("Register") .'</a></li>';
            $items .= '</ul>';
            $items .= '</li>';
       }
    }
    return $items;
}
add_filter( 'wp_nav_menu_items', 'add_extra_nav_items', 10, 2 );

function remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}
add_action('after_setup_theme', 'remove_admin_bar');

function custom_login() {

    global $login_errors;
    $login_errors = array();

    if(isset($_POST['login'])) {

        $remember = false;

        if($_POST['remember'] === 'yes') {
            $remember = true;
        }

        $login_data = array(
            'user_login'    =>  sanitize_user($_POST['username']),
            'user_password' =>  $_POST['password'],
            'remember'      =>  $remember
        );

        $user_verify = wp_signon($login_data, false);

        if(is_wp_error($user_verify)) {
            array_push($login_errors, "Datos incorrectos");
        }
        else {
            header('Location: '. home_url());
            exit();
        }
    
    }
}
add_action('after_setup_theme', 'custom_login');

function custom_register() {

    global $register_data;
    global $register_errors;
    $register_errors = array();

    if(isset($_POST['register'])) {
        $register_data = array(
            'user_login'    =>  sanitize_user($_POST['username']),
            'user_pass'     =>  $_POST['password'],
            'user_email'    =>  $_POST['email'],
            'first_name'    =>  $_POST['first-name'],
            'last_name'     =>  $_POST['last-name'],
            'role'          =>  'subscriber'
        );


        if(empty($register_data['user_login'])) {
            $register_errors['username'] = "Por favor entre un nombre de usuario";
        }

        elseif(username_exists($register_data['user_login'])) {
            $register_errors['username'] = "El Nombre de usuario ya existe,  por favor trate con otro";
        }

        if(!is_email($register_data['user_email'])) {
            $register_errors['email'] = "Por favor ingrese un email válido";
        }
        elseif(email_exists($register_data['user_email'])) {
            $register_errors['email'] = "Esta dirección de email ya está en uso";
        }

        if(preg_match("/.{6,}/", $register_data['user_pass']) === 0) {
            $register_errors['password'] = "La contraseña debe tener al menos 6 caracteres";
        }

        if(strcmp($register_data['user_pass'], $_POST['password-confirmation']) !== 0) {
            $register_errors['password-confirmation'] = "Las contraseñas no coinciden";
        }

        if($_POST['terms'] != "Yes") {
            $register_errors['terms'] = "Debe aceptar los términos y condiciones";
        }


        if(!$register_errors) {

            $user_id = wp_insert_user($register_data);

            if(!is_wp_error($user_id)) {

                $login_data = array(
                    'user_login'    =>  $register_data['user_login'],
                    'user_password' =>  $register_data['user_pass'],
                    'remember'      =>  false
                );
                $user_verify = wp_signon($login_data, false);

                if($user_verify) {
                    header('Location: '. home_url());
                    exit();
                }
            }
            else {
                array_push($register_errors, $user_id->get_error_message());
            }

        }
    }

}
add_action('after_setup_theme', 'custom_register');

/*
    ====================================================
    Custom contact
    ====================================================
    */
    
function custom_contact() {
    global $contact_data;
    global $contact_errors;
    $contact_errors = array();
    global $contact_send;



    if(isset($_POST['contact-name'])) {


        $contact_data = array(
            'mail-to'           =>  'info@ecriminologyresearch.com',
            // 'mail-to'           =>  get_option('admin_email'),
            'subject'           =>  'contact-form',
            'contact-name'      =>  trim($_POST['contact-name']),
            'contact-email'     =>  trim($_POST['contact-email']),
            'contact-message'   =>  trim($_POST['contact-message'])
        );


        //validation
        if($contact_data['contact-name'] === '') {
            $contact_errors['contact-name'] = 'No has ingresado ningún nombre';
        }

        if($contact_data['contact-email'] === '') {
            
            $contact_errors['contact-email'] = 'No has ingresado ninguna dirección de email';
        }

        else if
        (
            !preg_match('/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i',
            $contact_data['contact-email']))
        {
            $contact_errors['contact-email'] = 'Esta dirección de email no es correcta';
        }

        if($contact_data['contact-message'] === '') {
            $contact_errors['contact-message'] = 'No has ingresado ningún mensaje';
        }

        else if (strlen($contact_data['contact-message']) < 50) {
            $contact_errors['contact-message'] = 'Tu mensaje es muy corto';
        }

        else if (strlen($contact_data['contact-message']) > 350) {
            $contact_errors['contact-message'] = 'Tu mensaje es muy largo';
        }

        if(!$contact_errors) {
            //prearing the data into a header var for being used in the wp mail function
            $headers = 'From: '.$contact_data['contact-name'].' <'.$contact_data['contact-email'].'>';

            $mail_result =  wp_mail(
                $contact_data['mail-to'],
                $contact_data['subject'],
                $contact_data['contact-message'],
                $headers
            );
            if($mail_result) {
                $contact_send = true;
            }
            else {
                array_push($contact_errors, "Las funciones del correo no están funcionando muy bien.");
                array_push($contact_errors, var_dump($contact_send));
            }
        }
    }
}
add_action('after_setup_theme', 'custom_contact');

function custom_contact_set_content_type(){
    return "text/html";
}
add_filter( 'wp_mail_content_type','custom_contact_set_content_type' );




// function action_wp_mail_failed($wp_error)
// {
//     return error_log(print_r($wp_error, true));
// }

// add the action
add_action('wp_mail_failed', 'action_wp_mail_failed', 10, 1);

/*
    ====================================================
    Enqueue Styles And Scripts
    ====================================================
*/

function add_theme_style() {
    wp_enqueue_style('style', get_template_directory_uri(). '/assets/css/main.css', false, 1.1, 'all');
    
}
add_action('wp_enqueue_scripts', 'add_theme_style');

function add_theme_scripts() {
    wp_enqueue_script('navigation', get_template_directory_uri(). '/assets/js/nav.js', false, 1.1, true);
    wp_enqueue_script('mailchimp', get_template_directory_uri(). '/assets/js/popup-mailchimp.js', false, 1.1, true);
    wp_enqueue_script('form-validation', get_template_directory_uri(). '/assets/js/form-validation.js', false, 1.1, true);
}
add_action('wp_enqueue_scripts', 'add_theme_scripts');


/*
    ====================================================
    Extra filter and functions
    ====================================================
*/


// limit the amount of words in the excerpt
function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
      array_pop($excerpt);
      $excerpt = implode(" ",$excerpt).'...';
    } else {
      $excerpt = implode(" ",$excerpt);
    }	
    $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
    echo $excerpt;
}

// adds an extra line of text too the excerpt
function excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'excerpt_more' );


// limit the ammout of characters in the title and add ... if its long
function trimmed_title($before = '', $after = '') {

    $max_length =10;
    $title = get_the_title();

    if (strlen($title) > $max_length) {
        $title = substr($title, 0, $max_length) . '...';
    }
   
    $title = $before . $title . $after;
    echo $title;
}

// counts all post inside the category
function count_cat_post($category) {
    if(is_string($category)) {
        $catID = get_cat_ID($category);
    }
    elseif(is_numeric($category)) {
        $catID = $category;
    } 
    else {
        return 0;
    }
    $cat = get_category($catID);
    return $cat->count;
}

// this is could include in an plugin - this show id number of posts inside list
function revealid_add_id_column( $columns ) {
   $columns['revealid_id'] = 'ID';
   return $columns;
}
add_filter( 'manage_posts_columns', 'revealid_add_id_column', 5 );


function revealid_id_column_content( $column, $id ) {
  if( 'revealid_id' == $column ) {
    echo $id;
  }
}
add_action( 'manage_posts_custom_column', 'revealid_id_column_content', 5, 2 );

//encryption and decryption functions

function encrypt_data($data) {
    $encrypted = base64_encode($data);

    echo $encrypted;
}

function decrypt_data($data) {
    $decrypted = base64_decode($data);

    return $decrypted;
}

