<?php
include_once plugin_dir_path(__FILE__) . 'admin_class.php';

class social_shark_socialShark {

    public $options_array = array();

    function __construct() {
		
		
        $this->options_array['twitter_message'] = get_option(SOCIAL_SHARK . 'twitter_message');	
        $this->options_array['pinterest_message'] = get_option(SOCIAL_SHARK . 'pinterest_message');
        $this->options_array['add_to_posts'] = get_option(SOCIAL_SHARK . 'add_to_posts');
        $this->options_array['add_to_pages'] = get_option(SOCIAL_SHARK . 'add_to_pages');
        $this->options_array['enable_sidebar'] = get_option(SOCIAL_SHARK .'enable_sidebar');
        $this->options_array['disable_floating_mobile'] = get_option(SOCIAL_SHARK .'disable_floating_mobile');
        $this->options_array['icon_size'] = get_option(SOCIAL_SHARK . 'icon_size');
		$this->options_array['facebook_option'] = get_option(SOCIAL_SHARK . 'facebook_option');
        $this->options_array['twitter_option'] = get_option(SOCIAL_SHARK .'twitter_option');
        $this->options_array['pinterest_option'] = get_option(SOCIAL_SHARK .'pinterest_option');
        $this->options_array['linkedin_option'] = get_option(SOCIAL_SHARK . 'linkedin_option');
		$this->options_array['output_position'] = get_option(SOCIAL_SHARK . 'output_position');
		$this->options_array['horizontal_position'] = get_option(SOCIAL_SHARK . 'horizontal_position');
				
		
	
        if (!isset($this->options_array['icon_size'])) {
            $this->options_array['icon_size'] = '30px';
        }
    }
	

    public function social_shark_has_shortcode($shortcode = NULL) {

        $post_to_check = get_post(get_the_ID());
        $found = false;
        $shortcode = 'social_shark';

        if (!$shortcode) {
            return $found;
        }

        if (stripos($post_to_check->post_content, $shortcode) !== FALSE) {
            $found = TRUE;
        }

        return $found;
    }

    public function social_shark_output_social_icons($option) {
		

        $page_url = get_permalink();
        $facebook_url = "http://www.facebook.com/sharer/sharer.php?u=" . $page_url;
        $pinterest_url = "http://pinterest.com/pin/create/button/?url=" . $page_url . "&description=" . $this->options_array['pinterest_message'];
        $linkedin_url = "https://www.linkedin.com/cws/share?url=" . $page_url;
        $twitter_url = "https://twitter.com/intent/tweet?text=" . $this->options_array['twitter_message'] . ' ' . $page_url;
		
        ?>


        <div class="font-style-control">
			
            <table align="<?php if($option == 'page_posts') echo $this->options_array['horizontal_position']; ?>">
                <tbody style="border:none">
			
				<?php if ($this->options_array['facebook_option'] == "on") { ?>
                <td>
				
                    <a rel="nofollow" onclick="openPopUP('<?php echo $facebook_url; ?>');" ><i style="font-size:<?php echo $this->options_array['icon_size']; ?>" class="fa fa-facebook"></i></a>
                </td>
				<?php } ?>
				<?php if ($this->options_array['pinterest_option'] == "on") { ?>
                <td>
                    <a onclick="openPopUP('<?php echo $pinterest_url; ?>');" rel="nofollow" target="_blank"><i style="font-size:<?php echo $this->options_array['icon_size']; ?>" class="fa fa-pinterest"></i></a>
                </td>
				<?php } ?>
				<?php if($this->options_array['linkedin_option'] == "on") { ?>
                <td>
                    <a onclick="openPopUP('<?php echo $linkedin_url; ?>');" rel="nofollow" target="_blank"><i style="font-size:<?php echo $this->options_array['icon_size']; ?>" class="fa fa-linkedin"></i></a>
                </td>
				<?php } ?>
				<?php if($this->options_array['twitter_option'] == "on") { ?>
                <td>
                    <a onclick="openPopUP('<?php echo $twitter_url; ?>');" rel="nofollow" target="_blank"><i style="font-size:<?php echo $this->options_array['icon_size']; ?>" class="fa fa-twitter"></i></a>
                </td>
				<?php } ?>
            </table>
        </div>

        <?php
    }

    public function social_shark_add_to_posts_filter($content) {
		
		

        if (!$this->social_shark_has_shortcode('social-shark')) {

            if ((is_single()) && (!is_front_page())) {

                switch ($this->options_array['output_position']) {
                    case 'Bottom':
                        return $content . $this->social_shark_add_page_post_icons();
                        break;
                    case 'Top':
                        return $this->social_shark_add_page_post_icons() . $content;
                        break;
                    case 'Both':
                        return $this->social_shark_add_page_post_icons() . $content . $this->social_shark_add_page_post_icons();
                        break;
                }
            }
        }
        return $content;
    }

    public function social_shark_add_to_pages_filter($content) {
		
		

        if (!$this->social_shark_has_shortcode('social-shark')) {
            if ((is_page()) && (!is_front_page())) {
                switch ($this->options_array['output_position']) {
                    case 'Bottom':
                        return $content . $this->social_shark_add_page_post_icons();
                        break;
                    case 'Top':
                        return $this->social_shark_add_page_post_icons() . $content;
                        break;
                    case 'Both':
                        return $this->social_shark_add_page_post_icons() . $content . $this->social_shark_add_page_post_icons();
                        break;
                }
            }
        }
        return $content;
    }

    public function social_shark_add_sidebar() {

        echo '<div id="floating-sidebar">';
		
        echo $this->social_shark_output_social_icons($option = 'sidebar');
        echo '</div>';
    }

    public function social_shark_add_page_post_icons() {

        ob_start();

        echo '<div id="page_post_icons">';
        echo $this->social_shark_output_social_icons($option = 'page_posts');
        echo '</div>';

        return ob_get_clean();
    }
	
}
?>