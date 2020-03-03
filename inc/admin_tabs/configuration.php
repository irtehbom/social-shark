<?php

//Sections
add_settings_section(SOCIAL_SHARK . "configuration_tab_fields", "Configuration", null, SOCIAL_SHARK . "configuration_sections");

//Fields


add_settings_field(SOCIAL_SHARK . "add_to_pages", "Include on Pages", array( $this, SOCIAL_SHARK . 'attach_to_pages_configuration'), SOCIAL_SHARK . "configuration_sections", SOCIAL_SHARK ."configuration_tab_fields");
add_settings_field(SOCIAL_SHARK . "add_to_posts", "Include on Posts", array( $this, SOCIAL_SHARK . 'attach_to_posts_configuration'), SOCIAL_SHARK . "configuration_sections", SOCIAL_SHARK . "configuration_tab_fields");
add_settings_field(SOCIAL_SHARK . "output_position", "Output Position", array( $this, SOCIAL_SHARK . 'output_position_configuration'), SOCIAL_SHARK . "configuration_sections", SOCIAL_SHARK . "configuration_tab_fields");
add_settings_field(SOCIAL_SHARK . "horizontal_position", "Horizontal Position", array( $this, SOCIAL_SHARK . 'horizontal_position_configuration'), SOCIAL_SHARK . "configuration_sections", SOCIAL_SHARK . "configuration_tab_fields");
add_settings_field(SOCIAL_SHARK . "enable_sidebar", "Enable Floating Sidebar", array( $this, SOCIAL_SHARK . 'enable_sidebar_configuration'), SOCIAL_SHARK . "configuration_sections", SOCIAL_SHARK . "configuration_tab_fields");
add_settings_field(SOCIAL_SHARK . "disable_floating_mobile", "Disable Floating Sidebar on Mobile", array( $this, SOCIAL_SHARK . 'disable_floating_mobile_configuration'), SOCIAL_SHARK . "configuration_sections", SOCIAL_SHARK . "configuration_tab_fields");


//Register

register_setting(SOCIAL_SHARK . "configuration_tab_fields", SOCIAL_SHARK . 'add_to_pages');
register_setting(SOCIAL_SHARK . "configuration_tab_fields", SOCIAL_SHARK . 'add_to_posts');
register_setting(SOCIAL_SHARK . "configuration_tab_fields", SOCIAL_SHARK . 'output_position');
register_setting(SOCIAL_SHARK . "configuration_tab_fields", SOCIAL_SHARK . 'horizontal_position');
register_setting(SOCIAL_SHARK . "configuration_tab_fields", SOCIAL_SHARK . 'enable_sidebar');
register_setting(SOCIAL_SHARK . "configuration_tab_fields", SOCIAL_SHARK . 'disable_floating_mobile');