<?php
/*
   Plugin Name: Social Shark
   Plugin URI: https://wildshark.co.uk
   Version: 1.0
   Author: WildShark
   Description: A super lightweight social media plugin built for ease of use and speed.
   Text Domain: Social Shark
   License: GPLv3
*/


include_once 'inc/social_shark_class.php';
include_once 'inc/admin_class.php';
include_once 'inc/shortcodes/shortcodes.php';
include_once 'scripts.php';

define('SOCIAL_SHARK' , 'social_shark_');

add_shortcode( 'social_shark', 'social_shark_shortcode' );


$social_shark_class = new social_shark_socialShark();
$social_shark_admin = new social_shark_admin();
	
if ($social_shark_class->options_array['add_to_posts'] == "on") {
		add_filter('the_content', array( $social_shark_class, SOCIAL_SHARK . 'add_to_posts_filter'), 20);
}

if ($social_shark_class->options_array['add_to_pages'] == "on") {
		add_filter('the_content', array( $social_shark_class, SOCIAL_SHARK . 'add_to_pages_filter'), 20);
}


if ($social_shark_class->options_array['enable_sidebar'] == "on") {
	
	if ((wp_is_mobile()) && ($social_shark_class->disable_floating_mobile == "on")) {

		remove_action( 'wp_footer', array( $social_shark_class, SOCIAL_SHARK . 'add_sidebar'), 20);
	} else {
		add_action( 'wp_footer', array( $social_shark_class, SOCIAL_SHARK . 'add_sidebar'), 20);
	}	
}

function social_shark_uninstall() {
	
	$social_shark_class = new social_shark_socialShark();
	
	foreach($social_shark_class->options_array as $key => $options) {
		delete_option(SOCIAL_SHARK . $key);
		delete_site_option(SOCIAL_SHARK . $key);
	}

}

register_uninstall_hook(__FILE__, SOCIAL_SHARK . 'uninstall');



