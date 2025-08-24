<?php
global $themeshortcode;
$themeshortcode = array (
	'divider','box','latestworks', 'pricingbox'
);
/**
Create Our Initialization Function
*/


// here sample

function tcustom_addbuttons() {
global $themeshortcode;
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
		return;

	if ( get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "add_tcustom_tinymce_plugin");
		add_filter('mce_buttons_3', 'register_tcustom_button');
	}
}

function register_tcustom_button($buttons) {
global $themeshortcode, $post;		
       array_push($buttons,implode(',',$themeshortcode));  
       return $buttons;  
} 

function add_tcustom_tinymce_plugin($plugin_array) {
	global $themeshortcode;
	foreach ($themeshortcode as $plugin) {
		if($plugin != '|') {
			$plugin_array[$plugin] = plugin_dir_url( __FILE__ ) .'shortcodes/tinymce-button/' . $plugin . '.js';
		}
	}
	return $plugin_array;	
}
// init process for button control
add_action('init', 'tcustom_addbuttons');
?>