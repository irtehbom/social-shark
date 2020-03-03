<?php

//Sections
add_settings_section(SOCIAL_SHARK . "styles_tab_fields", "Font Size", null, SOCIAL_SHARK . "styles_sections");

//Fields
add_settings_field(SOCIAL_SHARK . "icon_size", "Icon Size", array( $this, SOCIAL_SHARK . 'icon_size_field_display'), SOCIAL_SHARK . "styles_sections", SOCIAL_SHARK . "styles_tab_fields");
//add_settings_field("padding", "Padding", array( $this, 'padding_field_display'), "social_shark_styles_sections", "social_shark_styles_tab_fields");

//Register
register_setting(SOCIAL_SHARK . "styles_tab_fields", SOCIAL_SHARK . 'icon_size');
//register_setting("social_shark_styles_tab_fields", 'padding');