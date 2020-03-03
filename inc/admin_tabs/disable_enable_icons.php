<?php

//Sections
add_settings_section(SOCIAL_SHARK . "disable_enable_tab_fields", "Tick to Enable Icons", null, SOCIAL_SHARK . "disable_enable_sections");

//Fields

add_settings_field(SOCIAL_SHARK . "twitter_option", "Twitter", array( $this, SOCIAL_SHARK . 'disable_enable_twitter'), SOCIAL_SHARK . "disable_enable_sections", SOCIAL_SHARK . "disable_enable_tab_fields");
add_settings_field(SOCIAL_SHARK . "linkedin_option", "LinkedIn", array( $this, SOCIAL_SHARK . 'disable_enable_linkedin'), SOCIAL_SHARK ."disable_enable_sections", SOCIAL_SHARK . "disable_enable_tab_fields");
add_settings_field(SOCIAL_SHARK . "facebook_option", "Facebook", array( $this, SOCIAL_SHARK . 'disable_enable_facebook'), SOCIAL_SHARK ."disable_enable_sections", SOCIAL_SHARK . "disable_enable_tab_fields");
add_settings_field(SOCIAL_SHARK . "pinterest_option", "Pinterest", array( $this, SOCIAL_SHARK . 'disable_enable_pinterest'), SOCIAL_SHARK ."disable_enable_sections", SOCIAL_SHARK . "disable_enable_tab_fields");


//Register
register_setting(SOCIAL_SHARK . "disable_enable_tab_fields", SOCIAL_SHARK .	'twitter_option');
register_setting(SOCIAL_SHARK . "disable_enable_tab_fields", SOCIAL_SHARK .	'linkedin_option');
register_setting(SOCIAL_SHARK . "disable_enable_tab_fields", SOCIAL_SHARK .	'facebook_option');
register_setting(SOCIAL_SHARK . "disable_enable_tab_fields", SOCIAL_SHARK .	'pinterest_option');
