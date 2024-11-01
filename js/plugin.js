jQuery(document).ready(function($) {

	if( videoOverlayerExclusions )
		exit;

	var imageCounter = 0;

	$('iframe').each(function() {
		var iFrame = $(this);
		var videoSrc = this.src;
		var supportedIframe = [];

		$.each(supportedIframesArray, function() {
			if( videoSrc.indexOf(this) != -1 )
				supportedIframe.push('1'[0]);
		});

		if( supportedIframe == '1' ) {
			imageCounter++;

			var videoWidth = iFrame.attr('width');
			var videoHeight = iFrame.attr('height');
			var imageOuterWrapId = 'video-overlayer-outer-wrap-id-'+imageCounter;
			var imageInnerWrapId = 'video-overlayer-inner-wrap-id-'+imageCounter;
			var imageClass = 'video-overlayer-image-id-'+imageCounter;

			if( overlayerFunctionality == 'overlay' ) {
				var overlayAspectRatio = videoWidth / videoHeight;
				var overlayerImageText = iFrame.attr('name');
				if( overlayerImageText ) {
					iFrame.replaceWith('<div id="'+imageOuterWrapId+'" class="video-overlayer-outer-wrap"><div id="'+imageInnerWrapId+'" class="video-overlayer-inner-wrap" style="cursor:pointer;"><img src="'+overlayerDefaultImage+'" class="video-overlayer-image '+imageClass+'" width="'+videoWidth+'" height="'+videoHeight+'"/><span style="width:'+videoWidth+'px;" class="video_overlayer_image_text '+overlayerImageTextClass+'"><span class="video_overlayer_image_text_inner">'+overlayerImageText+'</span></span></div></div>');
				} else {
					iFrame.replaceWith('<div id="'+imageOuterWrapId+'" class="video-overlayer-outer-wrap"><div id="'+imageInnerWrapId+'" class="video-overlayer-inner-wrap" style="cursor:pointer;"><img src="'+overlayerDefaultImage+'" class="video-overlayer-image '+imageClass+'" width="'+videoWidth+'" height="'+videoHeight+'"/></div></div>');
				}
			
				$('#'+imageInnerWrapId).click(function() {
					if( videoWidth > $(this).width() ) {
						var imageWidth = $(this).width();
						var imageHeight = imageWidth / overlayAspectRatio;
					} else {
						var imageWidth = videoWidth;
						var imageHeight = imageWidth / overlayAspectRatio;
					}
					$(this).replaceWith(iFrame.attr('width',imageWidth).attr('height',imageHeight).css('display','block'));
				});
			} else {
				var responsiveAspectRatio = videoHeight / videoWidth;
				iFrame.wrap('<div id="'+imageOuterWrapId+'" class="video-overlayer-outer-wrap"><div id="'+imageInnerWrapId+'" class="video-overlayer-inner-wrap" style="padding-top:'+responsiveAspectRatio * 100+'%;"></div></div>');
				iFrame.removeAttr('height').removeAttr('width');
			}
		}
	});

});