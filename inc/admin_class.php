<?php



class social_shark_admin {
	
public $socialShark;
	
	function __construct()
	{
			add_action('admin_menu', array($this, SOCIAL_SHARK . 'addAdminMenuItem'));
			add_action('admin_init', array($this, SOCIAL_SHARK . 'adminPageSettings'));
			$this->socialShark = new social_shark_socialShark();
	}
	
	
	public function social_shark_addAdminMenuItem() {

		try {
			
		add_menu_page(
			'Social Shark Settings',
			'Social Shark',
			'manage_options',
			'social_shark', 
			array( $this, SOCIAL_SHARK . 'adminPage'),
			'',
			null
		);
					
					
		} catch ( Exception $e ) {
			echo '(addAdminMenuItem) Menu Error: - ' . $e->getMessage ();
		}
	}
	
	public function social_shark_adminPage() {
		

		$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'configuration';

		
		try {
			
		?>
			<div class="wrap">
			<h1>Social Shark Settings</h1>
			
			<div class="wildshark_branding"><img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/logo.png">
			<div class="wildshark_branding_text"> For any bugs or feedback please email <a href="mailto:feedback@wildshark.co.uk">feedback@wildshark.co.uk</a></div>
			<div class="wildshark_branding_text" style="margin-top:15px">Visit our website <a href="https://wildshark.co.uk">https://wildshark.co.uk</a></div>
			<div class="wildshark_branding_text" style="margin-top:15px">Identify errors and improve usability of your website with the <b><span style="color:green">FREE</span> WildShark SEO Spider</b> <a href="https://wildshark.co.uk/spider-tool/">HERE</a></div>
			
			
			</div>
			
			<pre style="background:white; padding:10px; float:left; width:100%" >Shortcode to use: [social_shark]</pre>
			
		<h2 class="nav-tab-wrapper" style="clear:both">
			<a href="?page=social_shark&tab=configuration" class="nav-tab <?php echo $active_tab == 'configuration' ? 'nav-tab-active' : ''; ?>">Configuration</a>
			<a href="?page=social_shark&tab=social_messages" class="nav-tab <?php echo $active_tab == 'social_messages' ? 'nav-tab-active' : ''; ?>">Social Messages</a>
			<a href="?page=social_shark&tab=enable" class="nav-tab <?php echo $active_tab == 'enable' ? 'nav-tab-active' : ''; ?>">Enable / Disable Icons</a>
			<a href="?page=social_shark&tab=styling" class="nav-tab <?php echo $active_tab == 'styling' ? 'nav-tab-active' : ''; ?>">Styling</a>
		</h2>
			
			<form method="post" action="options.php">
				<?php
		
				switch ($active_tab) {
					case 'configuration':
						settings_fields(SOCIAL_SHARK . "configuration_tab_fields");
						do_settings_sections(SOCIAL_SHARK ."configuration_sections");      
						break;
					case 'social_messages':
						settings_fields(SOCIAL_SHARK ."messages_tab_fields");
						do_settings_sections(SOCIAL_SHARK ."message_sections");      
						break;
					case 'enable':
						settings_fields(SOCIAL_SHARK ."disable_enable_tab_fields");
						do_settings_sections(SOCIAL_SHARK ."disable_enable_sections");      
						break;
					case 'styling':
						settings_fields(SOCIAL_SHARK ."styles_tab_fields");
						do_settings_sections(SOCIAL_SHARK . "styles_sections");      
						break;
					
				} 
				
				submit_button(); 
				
				?>          
			</form>
			</div>

		<?php	
					
		} catch ( Exception $e ) {
			echo '(adminPage) Admin Page Error: - ' . $e->getMessage ();
		}
	}
	
	public function social_shark_adminPageSettings() {
		
		try {
			
			include_once 'admin_tabs/configuration.php';
			include_once 'admin_tabs/messages.php';
			include_once 'admin_tabs/disable_enable_icons.php';
			include_once 'admin_tabs/output_style.php';

			
		} catch ( Exception $e ) {
			echo '(social_shark_adminPageSettings) Admin Page Settings Error: - ' . $e->getMessage ();
		}
	}

	
	//Configuration functions
	
	
	public function social_shark_attach_to_pages_configuration() {
		
		
		
		$options = $this->socialShark->options_array['add_to_pages'];
		
		if($options == "on") { 
			$checked = ' checked="checked" ';
		} else {
			$checked = '';
		}
		echo "<input ".$checked." id='add_to_posts' name='" . SOCIAL_SHARK . "add_to_pages' type='checkbox' />";
		
	}
	
	public function social_shark_attach_to_posts_configuration() {
		

		$options = $this->socialShark->options_array['add_to_posts'];
		
		if($options == "on") { 
			$checked = ' checked="checked" ';
		} else {
			$checked = '';
		}
		
		echo "<input ".$checked." id='add_to_posts' name='" . SOCIAL_SHARK . "add_to_posts' type='checkbox' />";
		
	}
	
	public function social_shark_output_position_configuration() {
		

		$options = $this->socialShark->options_array['output_position'];
		
		$items = array("Disabled", "Top", "Bottom", "Both");
		echo "<select id='output_position_select' name='" . SOCIAL_SHARK . "output_position'>";
		foreach($items as $item) {
			$selected = ($options==$item) ? 'selected="selected"' : '';
			echo "<option value='$item' $selected>$item</option>";
		}
		echo "</select>";
		
	}
	
	public function social_shark_horizontal_position_configuration() {
		
		$options = $this->socialShark->options_array['horizontal_position'];
		
		$items = array("Left", "Center", "Right");
		echo "<select id='output_position_select' name='" . SOCIAL_SHARK . "horizontal_position'>";
		foreach($items as $item) {
			$selected = ($options==$item) ? 'selected="selected"' : '';
			echo "<option value='$item' $selected>$item</option>";
		}
		echo "</select>";
		
	}
	
	public function social_shark_enable_sidebar_configuration() {
		
		$options = $this->socialShark->options_array['enable_sidebar'];
		
		if($options == "on") { 
			$checked = ' checked="checked" ';
		} else {
			$checked = '';
		}
		
		echo "<input ".$checked." id='enable_sidebar' name='" . SOCIAL_SHARK . "enable_sidebar' type='checkbox' />";
		
	}
	
	public function social_shark_disable_floating_mobile_configuration() {
		
		$options = $this->socialShark->options_array['disable_floating_mobile'];
		
		if($options == "on") { 
			$checked = ' checked="checked" ';
		} else {
			$checked = '';
		}
		
		echo "<input ".$checked." id='disable_floating_mobile' name='" . SOCIAL_SHARK . "disable_floating_mobile' type='checkbox' />";
		
	}
	
	//Message functions
	
	public function social_shark_twitter_message_field_display()
	{
		echo "<input type='input' name='" . SOCIAL_SHARK . "twitter_message' class='regular_text'value='" . $this->socialShark->options_array['twitter_message'] . "'/>";
	}
	
	public function social_shark_pinterest_message_field_display()
	{
		echo "<input type='input' name='" . SOCIAL_SHARK . "pinterest_message' class='regular_text'value='" . $this->socialShark->options_array['pinterest_message'] . "'/>";
	}
	
	//Enable or disable 
	
	public function social_shark_disable_enable_twitter() {
		
		$options = $this->socialShark->options_array['twitter_option'];
		
		if($options == "on") { 
			$checked = ' checked="checked" ';
		} else {
			$checked = '';
		}
		
		echo "<input ".$checked." id='twitter_option' name='" . SOCIAL_SHARK . "twitter_option' type='checkbox' />";
		
	}
	
	public function social_shark_disable_enable_linkedin() {
		
		$options = $this->socialShark->options_array['linkedin_option'];
		
		if($options == "on") { 
			$checked = ' checked="checked" ';
		} else {
			$checked = '';
		}
		
		echo "<input ".$checked." id='linkedin_option' name='" . SOCIAL_SHARK . "linkedin_option' type='checkbox' />";
		
	}
	
	public function social_shark_disable_enable_facebook() {
		
		$options = $this->socialShark->options_array['facebook_option'];
		
		if($options == "on") { 
			$checked = ' checked="checked" ';
		} else {
			$checked = '';
		}
		
		echo "<input ".$checked." id='facebook_option' name='" . SOCIAL_SHARK . "facebook_option' type='checkbox' />";
		
	}
	
	public function social_shark_disable_enable_pinterest() {
		
		$options = $this->socialShark->options_array['pinterest_option'];
		
		if($options == "on") { 
			$checked = ' checked="checked" ';
		} else {
			$checked = '';
		}
		
		echo "<input ".$checked." id='pinterest_option' name='" . SOCIAL_SHARK . "pinterest_option' type='checkbox' />";
		
	}
	
	//Styling functions
	
	public function social_shark_icon_size_field_display()
	{

			echo "<input type='input' name='" . SOCIAL_SHARK . "icon_size' class='regular_text'value='" . $this->socialShark->options_array['icon_size'] . "' placeholder='30px'/>";

	}
	/*
	public function padding_field_display()
	{
		?>
			<input type="input" name="padding" class="regular_text"value="<?php echo get_option('padding'); ?>" placeholder="10px - Make sure to include PX at the end of the number" /> 
		<?php
	}
	*/
	
}

?>