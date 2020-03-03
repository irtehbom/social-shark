<?php
function social_shark_shortcode( $atts ) {

	
	$socialSharkClass = new social_shark_socialShark();
	echo $socialSharkClass->social_shark_add_page_post_icons();
}