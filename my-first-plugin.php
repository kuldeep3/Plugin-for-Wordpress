<?php
/**
 * @package MyfirstPlugin
 * Plugin Name: My First Plugin
 * Plugin URI: http://www.kilobytetech.com/plugin
 * Description: The very first plugin that I have ever created.
 * Version: 1.0
 * Author: Kuldeep Upreti
 * Author URI: http://www.kilobytetech.com
 * License: GPLv2
 * Text Domain: my-first-plugin
 */

 // if ( ! defined( 'ABSPATH') ) {
 // die;
 // }
 //  // if ( ! function_exists('add_action')) {
 // 	echo 'Hey, you can\t access this file, you silly human!';
 // 	exit;
 // }
 
 defined('ABSPATH') or die('Hey, you can\t access this file, you silly human!' );
 

class KuldeepPlugin
{
	function __construct(){
		add_action('init', array($this, 'custom_post_type') );
	}
	function activate() {
		$this->custom_post_type();
		flush_rewrite_rules();

	}
	function deactivate() {
	flush_rewrite_rules();	
	}
	function uninstall() {
		
	}

	function custom_post_type() {
		register_post_type( 'book', ['public' => true, 'label' =>'Books']);
	}
}
 
if (class_exists('KuldeepPlugin')) { 
	$kuldeepPlugin = new KuldeepPlugin();
} 

// activation
register_activation_hook( __FILE__, array( $kuldeepPlugin, 'activate'));

// deactivation
register_deactivation_hook( __FILE__, array( $kuldeepPlugin, 'deactivate'));

// uninstall