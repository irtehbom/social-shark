<?php

function social_shark_load_scripts() {
	
	wp_register_script('social_shark_functions', plugin_dir_url( __FILE__ ) . 'js/social_shark_functions.js', true);
	wp_enqueue_script('social_shark_functions');
	wp_enqueue_style( 'social_shark_styles', plugin_dir_url( __FILE__ ) . 'css/social_shark.css' );
}


function social_shark_admin_styles() {
	
	wp_enqueue_style( 'social_shark_styles', plugin_dir_url( __FILE__ ) . 'css/social_shark.css' );
}


add_action( 'admin_enqueue_scripts', 'social_shark_admin_styles' );

add_action( 'wp_enqueue_scripts', 'social_shark_load_scripts' );  