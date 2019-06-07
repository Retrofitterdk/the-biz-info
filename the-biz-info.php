<?php
/*
* Plugin Name: The Biz Info
* Description: Add fields for adding business information in the customizer
* Author: Steffen Bang Nielsen
* Author URI: http://retrofitter.dk
* Text Domain: the-biz-info
* Version: 0.2

*/
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
* Load plugin textdomain.
*
* @since 1.0.0
*/
add_action( 'plugins_loaded', 'the_biz_info_load_textdomain' );
function the_biz_info_load_textdomain() {
	load_plugin_textdomain( 'the-biz-info', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

// load includes
require_once plugin_dir_path( __FILE__ ) . 'inc/display_biz_info.php';

// load admin
require_once plugin_dir_path( __FILE__ ) . 'admin/customizer.php';