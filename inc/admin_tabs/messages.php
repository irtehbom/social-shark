<?php

//Sections
add_settings_section(SOCIAL_SHARK . "messages_tab_fields", "Messages", null, SOCIAL_SHARK . "message_sections");

//Fields
add_settings_field(SOCIAL_SHARK . "twitter_message", "Twitter Message", array( $this, SOCIAL_SHARK . 'twitter_message_field_display'), SOCIAL_SHARK . "message_sections", SOCIAL_SHARK . "messages_tab_fields");
add_settings_field(SOCIAL_SHARK . "pinterest_message", "Pinterest Message", array( $this, SOCIAL_SHARK . 'pinterest_message_field_display'), SOCIAL_SHARK . "message_sections", SOCIAL_SHARK . "messages_tab_fields");

//Register
register_setting(SOCIAL_SHARK . "messages_tab_fields", SOCIAL_SHARK . 'twitter_message');
register_setting(SOCIAL_SHARK . "messages_tab_fields", SOCIAL_SHARK . 'pinterest_message');