<?php
/**
 * Build and hook in the Video Overlayer admin menu.
 *
 * @package Video Overlayer
 */

add_action( 'admin_menu', 'video_overlayer_build_admin_menu' );
/**
 * Build the Video Overlayer admin menu.
 *
 * @since 1.0
 */
function video_overlayer_build_admin_menu()
{
	$_video_overlayer_settings = add_options_page( 'Video Overlayer Settings', 'Video Overlayer', 'manage_options', 'video_overlayer_settings', 'video_overlayer_settings' );
	
	add_action( 'admin_print_styles-' . $_video_overlayer_settings, 'video_overlayer_admin_styles' );
}

add_action( 'admin_init', 'video_overlayer_admin_init' );
/**
 * Register styles and scripts for the Video Overlayer admin menu.
 *
 * @since 1.0
 */
function video_overlayer_admin_init()
{
	wp_register_style( 'video_overlayer_admin_styles', VIDOVER_URL . 'css/plugin-admin.css' );
	
	wp_register_script( 'video_overlayer_admin', VIDOVER_URL . 'js/plugin-admin.js' );
}

/**
 * Enqueue styles and scripts for the Video Overlayer admin menu.
 *
 * @since 1.0
 */
function video_overlayer_admin_styles()
{
	wp_enqueue_style( 'video_overlayer_admin_styles' );
	
	wp_enqueue_script( 'video_overlayer_admin' );
}

/**
 * Create an array of Plugin Settings default values.
 *
 * @since 1.0
 */
function video_overlayer_settings_defaults() {
	$defaults = array(
		'functionality'	=> 'overlay',
		'default_overlay_image'	=> 'light_gray',
		'default_overlay_image_custom_url'	=> '',
		'supported_iframes'	=> "'youtube','youtu.be','vimeo','viddler','screenr'"
	);
	
	return apply_filters( 'video_overlayer_settings_defaults', $defaults );
}

//end lib/admin/plugin-admin.php