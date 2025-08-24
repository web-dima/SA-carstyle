<?php
/**
 * This file loads the CSS and JS necessary for your shortcodes display
 * @package iWebtheme Moderna Shortcodes Plugin
 * @since 1.0.2
 * @author iWebStudio : http://iweb-studio.com
 * @License: GNU General Public License version 2.0
 * @License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */
if( !function_exists ('iwebtheme_moderna_shortcodes_scripts') ) :
	function iwebtheme_moderna_shortcodes_scripts() {
	
		wp_enqueue_style('ui', plugin_dir_url( __FILE__ ) . 'css/jquery-ui-1.10.4.custom.min.css', 'ui');
		wp_enqueue_style('admin', plugin_dir_url( __FILE__ ) . 'css/admin.css', 'admin');

		wp_enqueue_script('admin', plugin_dir_url( __FILE__ ) . 'js/admin.js', 'admin');
		wp_enqueue_script('json2', plugin_dir_url( __FILE__ ) . 'js/json2.js', 'json2');
		wp_enqueue_script('ibutton', plugin_dir_url( __FILE__ ) . 'js/jquery.ibutton.min.js', 'ibutton');
		wp_enqueue_script('thickbox');
		wp_enqueue_script('wpdialogs');
	}
	add_action('admin_enqueue_scripts', 'iwebtheme_moderna_shortcodes_scripts');
endif;