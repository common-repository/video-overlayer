<?php 
/*
Plugin Name:  Video Overlayer
Plugin URI:   http://catalysttheme.com/plugins/video-overlayer/
Description:  Video Overlayer is a Plugin that overlays your embeded iFrame videos with an image. Make your embeded videos responsive, branded, cleaner, faster loading, etc.. with this Plugin.
Version:      1.0
Author:       Eric Hamm
Author URI:   http://catalysttheme.com
License:      GPL2
*/

/**
 * @package Video Overlayer
 */
 
/**
 * Define stuff.
 */
if ( ! defined('VIDOVER_URL') )
	define( 'VIDOVER_URL', plugin_dir_url( __FILE__ ) );
if ( ! defined('VIDOVER_PATH') )
	define( 'VIDOVER_PATH', plugin_dir_path( __FILE__ ) );
if ( ! defined('VIDOVER_BASENAME') )
	define( 'VIDOVER_BASENAME', plugin_basename( __FILE__ ) );

define( 'VIDOVER_FILE', __FILE__ );
define( 'VIDOVER_VERSION', '1.0' );

/**
 * Localization.
 */
load_plugin_textdomain( 'vidover', false, VIDOVER_PATH . '/languages/' );

/**
 * Require files.
 */
require_once( VIDOVER_PATH . '/functions/plugin-get-options.php' );
require_once( VIDOVER_PATH . '/functions/plugin-functions.php' );

/**
 * Create globals and Require files only needed for admin.
 */
if ( is_admin() )
{
	require_once( VIDOVER_PATH . '/functions/plugin-admin.php' );
	require_once( VIDOVER_PATH . '/functions/plugin-admin-page.php' );
	require_once( VIDOVER_PATH . '/functions/plugin-activate.php' );
}

/**
 * Run if the Video Overlayer Plugin was just activated.
 */
if ( is_admin() ) {
	register_activation_hook( __FILE__, 'cobalt_plugin_activate' );
}