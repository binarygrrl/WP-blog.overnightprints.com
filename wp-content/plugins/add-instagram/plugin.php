<?php
/**
Plugin Name: Instagram Feed Add
Plugin URI: http://web-settler.com/wordpress-social-feed/
Description: Adds a responsive Instagram feed.
Author: umarbajwa
Author URI: http://web-settler.com/wordpress-social-feed/
Version: 1.2
Version: GPl v2 or later
**/
if ( ! defined( 'ABSPATH' ) ) exit;

require plugin_dir_path( __FILE__ ) . 'config.php';

require plugin_dir_path( __FILE__ ) . 'core_functions.php';

add_option( 'smuzsf_plugin_version', SMUZSF_PLUGIN_VERSION );

define( 'SMUZSF_PRO_VERSION_ENABLED', false );

load_smuzsf();