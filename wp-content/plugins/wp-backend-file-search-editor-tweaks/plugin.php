<?php
/**
 * Plugin Name: WP Backend File Search & Editor Tweaks Lite
 * Plugin URI: https://www.wpBackendFileSearch.com
 * Description: Search backend files faster & easier! You can also tweak the theme & plugin file editor with custom colors, line numbering & wrapped text! Pro version adds multiple file search - so you don't have to open each PHP, JS & CSS file individually to find the code you're looking for.
 * Version: 1.1.3
 * Author: laymanlab
 * Author URI: http://www.LaymanLab.com
 * Requires at least: 4.0
 * Tested up to: 4.5.3
 *
 * Text Domain: wp-backend-search
 */

// Exit if accessed directly
if ( ! defined('ABSPATH')) exit;

/**
 * Plugin activation
 *
 * @since 1.0.0
 */
function wp_backend_search_lite_activate() {
	do_action('wp_backend_search_lite_activate');

	// Plugin collision prevention
	if ($plugins = get_option('active_plugins', array())) {
		foreach ($plugins as $plugin_key => $plugin) {
			if ($plugin == 'wp-backend-search/plugin.php') {
				deactivate_plugins($plugin);
				break;
			}
		}
	}

	update_option('wp_backend_search_lite_show_activation_tip', true);
}
register_activation_hook(__FILE__, 'wp_backend_search_lite_activate');

/**
 * Plugin deactivation
 *
 * @since 1.0.0
 */
function wp_backend_search_lite_deactivate() {
	do_action('wp_backend_search_lite_deactivate');
}
register_deactivation_hook(__FILE__, 'wp_backend_search_lite_deactivate');

/**
 * Show activation tip
 *
 * @since 1.0.0
 */
function wp_backend_search_lite_show_activation_tip() {
	$show = get_option('wp_backend_search_lite_show_activation_tip', false); 

	if ($show != true) return; ?>

	<div id="wpbs-notice" class="notice updated is-dismissible">
		<p>
			<strong>WP Backend File Search & Editor Tweaks Lite</strong> activated. 
			<?php printf(
				"Go to %s or %s to see it in action!",
				sprintf('<a href="%s">%s</a>', admin_url('theme-editor.php'), __('Theme Editor', 'wp-backend-search')),
				sprintf('<a href="%s">%s</a>', admin_url('plugin-editor.php'), __('Plugin Editor', 'wp-backend-search'))
			); ?>
		</p>

		<p>
			<?php printf(
				'<a href="%s">%s</a> Use coupon code NEW40.',
				'//www.wpbackendfilesearch.com/pro',
				'New users save 40% off PRO version.'
			); ?>
		</p>
	</div>

	<?php
}
add_action('admin_notices', 'wp_backend_search_lite_show_activation_tip');
	
	/**
	 * AJAX - Dismiss notice
	 *
	 * @since 1.0.9
	 */
	function wp_backend_search_lite_dismiss_notice() {
		update_option('wp_backend_search_lite_show_activation_tip', false);
		exit();
	}
	add_action('wp_ajax_wp_backend_search_lite_dismiss_notice', 'wp_backend_search_lite_dismiss_notice');

	/**
	 * Enqueue admin inline scripts
	 *
	 * @since 1.0.9
	 */
	function wp_backend_search_lite_enqueue_admin_inline_scripts() { ?>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(document).on('click', '#wpbs-notice .notice-dismiss', function() {
					$.ajax({
						url: ajaxurl,
						method: 'post',
						data: {
							action: 'wp_backend_search_lite_dismiss_notice',
						},
						success: function(response) {}
					});
				});
			});
		</script>
		<?php
	}
	add_action('admin_footer', 'wp_backend_search_lite_enqueue_admin_inline_scripts');


/**
 * Plugin initialization
 *
 * @since 1.0.0
 */
function wp_backend_search_lite_init() {

	if (function_exists('wp_backend_search_init')) {
		return;
	}

	define('WP_BACKEND_SEARCH_DIR_PATH', trailingslashit(plugin_dir_path(__FILE__)));
	define('WP_BACKEND_SEARCH_DIR_URL', trailingslashit(plugin_dir_url(__FILE__)));

	define('WP_BACKEND_SEARCH_VERSION', '1.1.3');

	require_once(WP_BACKEND_SEARCH_DIR_PATH . 'includes/functions.php');
	require_once(WP_BACKEND_SEARCH_DIR_PATH . 'includes/buffer.php');

	if (is_admin()) {
		require_once(WP_BACKEND_SEARCH_DIR_PATH . 'includes/admin/admin.php');
		require_once(WP_BACKEND_SEARCH_DIR_PATH . 'includes/admin/admin-search.php');
	}
}
add_action('plugins_loaded', 'wp_backend_search_lite_init');