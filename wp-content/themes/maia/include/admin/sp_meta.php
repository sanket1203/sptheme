<?php
/*
 * Custom metabox in page
 * @package Sptheme * 
 */

/* Header Image metabox */
function sp_image_attachment_box($post) {
	
	$head_banner_ID    = get_post_meta($post->ID,'head_banner_image',true);
	$head_overly       = get_post_meta($post->ID,'header_overlaybool',true);
	$head_image		   = '';
	if(!empty($head_banner_ID)){
		$head_image 	   = get_the_guid($head_banner_ID);
	}
    	
	//wp_enqueue_media();

	?>
		<table class="form-table cmb_metabox">
			<tr>
				<td width="20%"><lable>Header Image Overlay</lable></td>
				<td><input type="checkbox" name="header_overlaybool" id="header_overlaybool" value="yes" <?php if(!empty($head_overly)){ echo 'checked'; } ?> /></td>
			</tr>
		</table>
		<div class='image-preview-wrapper'>
			<img id='image-preview' src='<?php echo $head_image; ?>' height='200'>
		</div>
		<input id="upload_image_button" type="button" class="button" value="<?php _e( 'Upload image' ); ?>" />
		<input type='hidden' name='image_attachment_id' id='image_attachment_id' value='<?php echo $head_banner_ID; ?>'>
		
			
	<?php
	
	$my_saved_attachment_post_id = get_option( 'media_selector_attachment_id', 0 );
	?><script type='text/javascript'>
		jQuery( document ).ready( function( $ ) {
			var file_frame;
			var wp_media_post_id = wp.media.model.settings.post.id; // Store the old id
			var set_to_post_id = <?php echo $post->ID; ?>; // Set this
			jQuery('#upload_image_button').on('click', function( event ){
				event.preventDefault();
				// If the media frame already exists, reopen it.
				if ( file_frame ) {
					// Set the post ID to what we want
					file_frame.uploader.uploader.param( 'post_id', set_to_post_id );
					// Open frame
					file_frame.open();
					return;
				} else {
					// Set the wp.media post id so the uploader grabs the ID we want when initialised
					wp.media.model.settings.post.id = set_to_post_id;
				}
				// Create the media frame.
				file_frame = wp.media.frames.file_frame = wp.media({
					title: 'Select a image to upload',
					button: {
						text: 'Use this image',
					},
					multiple: false	// Set to true to allow multiple files to be selected
				});
				// When an image is selected, run a callback.
				file_frame.on( 'select', function() {
					// We set multiple to false so only get one image from the uploader
					attachment = file_frame.state().get('selection').first().toJSON();
					// Do something with attachment.id and/or attachment.url here
					$( '#image-preview' ).attr( 'src', attachment.url ).css( 'width', 'auto' );
					$( '#image_attachment_id' ).val( attachment.id );
					// Restore the main post ID
					wp.media.model.settings.post.id = wp_media_post_id;
				});
					// Finally, open the modal
					file_frame.open();
			});
			jQuery( 'a.add_media' ).on( 'click', function() {
				wp.media.model.settings.post.id = wp_media_post_id;
			});
		});
	</script><?php

}
/*Metabox Define */
function sp_setup_meta_boxes() {
    add_meta_box('header_image_box', 'Header Image', 'sp_image_attachment_box', 'page', 'normal', 'high');
}
add_action('admin_init','sp_setup_meta_boxes');

/* Save custom metabox value */
function sp_custom_update_meta($post_id){
	$postname = get_post_type();
	if($postname == 'page'){
		if(isset($_POST["image_attachment_id"]))
		{
			$image_attachment_id = $_POST["image_attachment_id"];
			update_post_meta($post_id, "head_banner_image", $image_attachment_id);
		}
		if(isset($_POST["header_overlaybool"]))
		{
			$header_overlaybool  = $_POST["header_overlaybool"];
			update_post_meta($post_id, "header_overlaybool", $header_overlaybool);
		}else{
			update_post_meta($post_id, "header_overlaybool", '');
		}
	}
}
add_action('save_post','sp_custom_update_meta',1,2);

//
?>