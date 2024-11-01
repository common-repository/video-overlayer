jQuery(document).ready(function($) {

	$('.video_overlayer_functionality_class').change(function() {
		if( $('.video_overlayer_functionality_class:checked').val() == 'responsive' ) {
			$('#video_overlayer_functionality_overlay_wrap').animate({"height": "hide"}, { duration: 0 });
			if( $('#default_overlay_image').val() == 'custom' ) {
				$('#default_overlay_image_custom_url_wrap').animate({"height": "hide"}, { duration: 0 });
			}
		} else {
			$('#video_overlayer_functionality_overlay_wrap').animate({"height": "show"}, { duration: 0 });
			if( $('#default_overlay_image').val() == 'custom' ) {
				$('#default_overlay_image_custom_url_wrap').animate({"height": "show"}, { duration: 0 });
			}
		}
	});
	
	$('.video_overlayer_functionality_class').change();

	$('#default_overlay_image').change(function() {
		$('.video_overlayer_functionality_class').change();

		if( $('#default_overlay_image').val() == 'custom' && $('.video_overlayer_functionality_class:checked').val() == 'overlay' ) {
			$('#default_overlay_image_custom_url_wrap').animate({"height": "show"}, { duration: 0 });
		} else {
			$('#default_overlay_image_custom_url_wrap').animate({"height": "hide"}, { duration: 0 });
		}
	});
	
	$('#default_overlay_image').change();
	
});