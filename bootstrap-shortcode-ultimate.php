<?php 
/*
Plugin Name:  Bootstrap Shortcodes Ultimate
Plugin URI:   https://devshuvo.com
Author:       Akhtarujjaman Shuvo
Author URI:   https://www.facebook.com/akhterjshuvo
Version: 	  4.2.2
Description:  Simple Plugin for Enqueue Bootstrap 4 CSS, JS, and Some Helpful WordPress Shortcodes for visual usages.
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
*/

// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

define('BSTU_VERSION', '4.2.2');

/**
* Including Plugin file for security
* Include_once
* 
* @since 1.0.0
*/
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	
function btsu_scripts(){
	wp_register_style('bootstrap', plugin_dir_url(__FILE__).'assets/css/bootstrap.min.css', null, BSTU_VERSION);		
	wp_register_script('bootstrap', plugin_dir_url(__FILE__).'assets/js/bootstrap.min.js', array('jquery'), BSTU_VERSION);
	
	wp_enqueue_style('bootstrap');		
	wp_enqueue_script('bootstrap');
}
add_action('wp_enqueue_scripts','btsu_scripts');

	
// Shortcodes
include_once( dirname( __FILE__ ) . '/inc/shortcodes.php' );

/**
 * Remove extra paragraphs and line breaks
 */
add_filter('the_content','btsu_fix_shortcodes');
function btsu_fix_shortcodes($content){
	$array = array (
			'<p>[' => '[',
			']</p>' => ']',
			']<br />' => ']',
			']<br>' => ']'
	);
	$content = strtr($content, $array);
	return $content;
}