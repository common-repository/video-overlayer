<?php
/**
 * Handels both the activation and update functionality.
 *
 * @package Video Overlayer
 */

add_action( 'admin_init', 'video_overlayer_update' );
/**
 * Perform Video Overlayer updates based on current version number.
 *
 * @since 1.0
 */
function video_overlayer_update()
{
	// Don't do anything if we're on the latest version.
	if( version_compare( get_option( 'video_overlayer_version_number' ), VIDOVER_VERSION, '>=' ) )
		return;

	// Update to Video Overlayer 1.0.1
	/*
	if( version_compare( get_option( 'video_overlayer_version_number' ), '1.0.1', '<' ) )
	{		
		$video_overlayer_settings = get_option( 'video_overlayer_settings' );
		$new_cobalt_settings = array(
			'filler_option_one' => '',
			'filler_option_two' => ''
		);
		$video_overlayer_settings = wp_parse_args( $new_cobalt_settings, $video_overlayer_settings );
		update_option( 'video_overlayer_settings', $video_overlayer_settings );
		
		update_option( 'video_overlayer_version_number', '1.0.1' );
	}
	*/
	
	// Finish the update sequence.
	video_overlayer_activate();
}

/**
 * Perform Video Overlayer Plugin activation actions.
 *
 * @since 1.0
 */
function video_overlayer_activate()
{
	if( !get_option( 'video_overlayer_version_number' ) )
	{
		update_option( 'video_overlayer_version_number', '1.0' );
	}
	
	if( !get_option( 'video_overlayer_settings' ) )
	{
		update_option( 'video_overlayer_settings', video_overlayer_settings_defaults() );
	}
}

//end lib/functions/plugin-activate.php