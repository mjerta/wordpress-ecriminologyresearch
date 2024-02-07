<?php

add_action( "admin_enqueue_scripts", "wpcmp_enqueue_scripts" );

function wpcmp_enqueue_scripts(){
	
	wp_enqueue_style ( "wpcmp_style_css", 	  WPCMP_PLUGIN_URL . "/assets/css/style.css", false );
	
	wp_enqueue_style ( "wpcmp_bootstrap_css", WPCMP_PLUGIN_URL . "/assets/css/bootstrap.css", false );
	
	wp_enqueue_style ( "wpcmpselect2_css",    WPCMP_PLUGIN_URL . "assets/css/select2.min.css", true );
	
	wp_enqueue_script( "wpcmpselect2_js", 	  WPCMP_PLUGIN_URL . "assets/js/select2.min.js", true );
	
	wp_enqueue_script( "wpcmp_popper_js",     WPCMP_PLUGIN_URL . "/assets/js/popper.min.js", true );
	
	wp_enqueue_script( "wpcmp_bootstrap_js",  WPCMP_PLUGIN_URL . "/assets/js/bootstrap.min.js", array('jquery','wpcmp_popper_js'), true );
	
	wp_enqueue_script( "wpcmp_linedtextarea", WPCMP_PLUGIN_URL . "/assets/js/linedtextarea.js", array('jquery'), true );
	
	wp_enqueue_script( "wpcmp_script", 		  WPCMP_PLUGIN_URL . "/assets/js/script.js", array('jquery'), true );
}

?>