<?php
/**
 * Builds the Plugin Settings admin page.
 *
 * @package Video Overlayer
 */
 
/**
 * Build the Video Overlayer Plugin Settings admin page.
 *
 * @since 1.0
 */
function video_overlayer_settings() { ?>
	<div class="wrap">
		<div id="icon-options-general" class="icon32"><br /></div>
		<h2><?php _e( 'Video Overlayer', 'vidover' ); ?></h2>

		<?php
		if ( ! empty( $_POST ) && check_admin_referer( 'video_overlayer_nonce' ) ) {
			$update = $_POST['video_overlayer'];
			update_option( 'video_overlayer_settings', $update );
			video_overlayer_get_settings( null, $args = array( 'cached' => false, 'array' => false ) ); 
			?>
			<div id="setting-error-settings_updated" class="updated settings-error"> 
				<p>
					<strong><?php _e( 'Settings saved.', 'vidover' ); ?></strong>
				</p>
			</div>
			<?php
		} ?>

		<p>
			<?php _e( 'The', 'vidover' ); ?> <a href="#"><?php _e( 'Video Overlayer', 'vidover' ); ?></a> <?php _e( 'Plugin replaces your embeded iFrame videos with an image which, when clicked, is replaced by the video with the dimensions of this video being the same as the image in the clicked state. In other words, whatever the image size was when it was clicked, this is the new size of the video. This is a great way to make your embeded videos branded, cleaner, faster loading and responsive (ie. Mobile Friendly).', 'vidover' ); ?>
		</p>
		
		<form method="post">
		
			<table class="form-table">

				<tr>
					<td>
						<input id="video_overlayer_functionality_overlay" name="video_overlayer[functionality]" class="radio video_overlayer_functionality_class" type="radio" value="overlay" <?php if ( video_overlayer_get_settings( 'functionality' ) == 'overlay' ) echo 'checked="checked" '; ?> />
						<label for="video_overlayer_functionality_overlay"> <?php _e( 'Overlay my embeded iFrame videos with images (benefits = responsive, cleaner looking, faster page loads).', 'vidover' ); ?></label>
						<br />
						<input id="video_overlayer_functionality_responsive" name="video_overlayer[functionality]" class="radio video_overlayer_functionality_class" type="radio" value="responsive" <?php if ( video_overlayer_get_settings( 'functionality' ) == 'responsive' ) echo 'checked="checked" '; ?> />
						<label for="video_overlayer_functionality_responsive"> <?php _e( 'Just make my embeded iFrame videos responsive.', 'vidover' ); ?></label>
					</td>
				</tr>
				<tr id="video_overlayer_functionality_overlay_wrap" style="display:none;">
					<td>
						<?php _e( 'Default Overlay Image', 'vidover' ); ?>
						<select id="default_overlay_image" name="video_overlayer[default_overlay_image]" size="1" style="width:100px;">
							<option value="light_gray"<?php if ( video_overlayer_get_settings( 'default_overlay_image' ) == 'light_gray' ) echo ' selected="selected"'; ?>><?php _e( 'Light Gray', 'vidover' ); ?></option>
							<option value="dark_gray"<?php if ( video_overlayer_get_settings( 'default_overlay_image' ) == 'dark_gray' ) echo ' selected="selected"'; ?>><?php _e( 'Dark Gray', 'vidover' ); ?></option>
							<option value="white"<?php if ( video_overlayer_get_settings( 'default_overlay_image' ) == 'white' ) echo ' selected="selected"'; ?>><?php _e( 'White', 'vidover' ); ?></option>
							<option value="black"<?php if ( video_overlayer_get_settings( 'default_overlay_image' ) == 'black' ) echo ' selected="selected"'; ?>><?php _e( 'Black', 'vidover' ); ?></option>
							<option value="custom"<?php if ( video_overlayer_get_settings( 'default_overlay_image' ) == 'custom' ) echo ' selected="selected"'; ?>><?php _e( 'Custom', 'vidover' ); ?></option>
						</select>
					</td>
				</tr>
				<tr id="default_overlay_image_custom_url_wrap" style="display:none;">
					<td>
						<?php _e( 'Custom Default Image Overlay URL:', 'vidover' ); ?>  <input type="text" id="default_overlay_image_custom_url" name="video_overlayer[default_overlay_image_custom_url]" value="<?php echo video_overlayer_get_settings( 'default_overlay_image_custom_url' ) ?>" style="width:70%;" />
					</td>
				</tr>
				<tr>
					<td>
						<?php _e( 'Video Overlayer Supported iFrame Video Embeds:', 'vidover' ); ?><br />
						<input type="text" id="supported_iframes" name="video_overlayer[supported_iframes]" value="<?php echo video_overlayer_get_settings( 'supported_iframes' ) ?>" style="width:90%;" />
						<p style="max-width:88%; background:#F6F6F6; border:1px solid #E8E8E8; margin-bottom:0; padding:10px;"><?php _e( 'Adding more supported iFrame Video Embeds is easy. Just look at the src="" attribute of your non-supported iFrame embed code and locate the main part of that URL (ie. YouTube iFrame Video Embed src="http://www.youtube.com/embed/..." attributes have the word "youtube" in them so that\'s what is used to include it in the supported list above). Once you\'ve determined the correct text to add just be sure to wrap it in single quotes and comma separate it from the others making sure to leave off the last (trailing) comma. Just use the above list as a reference and you should be fine.', 'vidover' ); ?></p>
					</td>
				</tr>

			</table>

			<?php wp_nonce_field( 'video_overlayer_nonce' ); ?>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</p>

		</form>
	</div>
<?php }

//end lib/admin/plugin-admin-page.php