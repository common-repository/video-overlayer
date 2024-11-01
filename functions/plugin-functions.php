<?php
/**
 * General Plugin Functionality.
 *
 * @package Video Overlayer
 */

add_action( 'get_header', 'video_overlayer_enqueue_css' );
/**
 * Enqueue the Video Overlayer Plugin stylesheet.
 *
 * @since 1.0
 */
function video_overlayer_enqueue_css()
{
	wp_register_style( 'video_overlayer_styles', VIDOVER_URL . 'css/plugin.css' );
	wp_enqueue_style( 'video_overlayer_styles' );
}

add_action( 'wp_head', 'video_overlayer_enqueue_scripts' );
/**
 * Enqueue various bits of javascript.
 *
 * @since 1.0
 */
function video_overlayer_enqueue_scripts()
{
	$video_overlayer_functionality = video_overlayer_get_settings( 'functionality' );
	$video_overlayer_default_image = video_overlayer_get_settings( 'default_overlay_image' );

	if ( $video_overlayer_functionality == 'overlay' ) {
		if ( $video_overlayer_default_image != 'custom' ) {
			$video_overlayer_default_image_url = VIDOVER_URL . 'images/default_overlay_' . $video_overlayer_default_image . '.png';
		}
		else {
			$video_overlayer_default_image_url = video_overlayer_get_settings( 'default_overlay_image_custom_url' );
		}
	}
	else {
		$video_overlayer_default_image_url = VIDOVER_URL . 'images/trans_overlay_image.png';
	}
?>

<!-- Begin Video Overlayer JavaScript Vars -->
<script type="text/javascript">
var overlayerFunctionality = '<?php echo $video_overlayer_functionality; ?>';
var overlayerDefaultImage = '<?php echo $video_overlayer_default_image_url; ?>';
var overlayerImageTextClass = '<?php echo 'overlayer_image_text_' . $video_overlayer_default_image; ?>';
var videoOverlayerExclusions = <?php echo apply_filters( 'video_overlayer_exclusions', 0 ); ?>;
var supportedIframesArray = new Array(<?php echo video_overlayer_get_settings( 'supported_iframes' ); ?>);
</script>
<!-- End Video Overlayer JavaScript Vars -->

<?php

	wp_enqueue_script( 'video-overlayer-scripts', VIDOVER_URL . 'js/plugin.js', false, VIDOVER_VERSION, true );
}

//end lib/functions/plugin-functions.php