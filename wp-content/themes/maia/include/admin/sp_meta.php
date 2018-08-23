<?php
/*
 * Custom metabox in page
 * @package Sptheme
 */
// CSS/Js within in Admin area
require( $sptheme_theme_path . '/include/admin/sp_meta_save.php'); //save meta

function admin_style() {
  wp_enqueue_style( 'sp_admin-styles', get_template_directory_uri().'/include/admin/css/admin_custom.css');
  wp_enqueue_script( 'sp_custom-script', get_template_directory_uri() . '/include/admin/js/admin_custom.js' );
}
add_action('admin_enqueue_scripts', 'admin_style');

/*Header Image metabox */
function sp_image_attachment_box($post) {	
	$head_banner_ID    = get_post_meta($post->ID,'head_banner_image',true);
	$head_overly       = get_post_meta($post->ID,'header_overlaybool',true);
	$head_image		   = '';
	if(!empty($head_banner_ID)){
		$head_image 	   = get_the_guid($head_banner_ID);
	}
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
					multiple: false
				});
				// When an image is selected, run a callback.
				file_frame.on( 'select', function() {
					// We set multiple to false so only get one image from the uploader
					attachment = file_frame.state().get('selection').first().toJSON();
					// Do something with attachment.id and/or attachment.url here
					$( '#image-preview' ).attr( 'src', attachment.url ).css( 'width', 'auto' );
					$( '#image_attachment_id' ).val( attachment.id );	
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
/*Metabox Header Define */
function sp_setup_meta_boxes() {
	
    add_meta_box('header_image_box', 'Header Image', 'sp_image_attachment_box', 'page', 'normal', 'high');	
	add_meta_box('contact_box', 'Contact Info', 'sp_contact_form_box', 'page', 'normal', 'high');
}
add_action('admin_init','sp_setup_meta_boxes');

/*Contact page box at admin area*/
function sp_contact_form_box($post){
	$template_name = basename(get_page_template());
	if($template_name == 'contact-template-one.php' || $template_name == 'contact-template-two.php'){
		?>
			<script> jQuery(document).ready(function() { $('#contact_box').show(); }); </script>
		<?php
	}
			
			$sp_contact_shortcode 	= htmlentities(get_post_meta($post->ID,'sp_contact_shortcode',true));
			$sp_contact_title 		= htmlentities(get_post_meta($post->ID,'sp_contact_title',true));
			$sp_contact_address 	= htmlentities(get_post_meta($post->ID,'sp_contact_address',true));
			$sp_contact_address_two = htmlentities(get_post_meta($post->ID,'sp_contact_address_two',true));
			$sp_contact_email 		= get_post_meta($post->ID,'sp_contact_email',true);
			$sp_contact_phone_one 	= get_post_meta($post->ID,'sp_contact_phone_one',true);
			$sp_contact_phone_two 	= get_post_meta($post->ID,'sp_contact_phone_two',true);
			
		?>
			<table class="form-table cmb_metabox">
				<tr>
					<td width="20%"><lable>Contact Form Shortcode</lable></td>
					<td width="60%"><input type="text" placeholder="Contact Form 7 Shortcode" name="sp_contact_shortcode" id="sp_contact_shortcode" value="<?php echo $sp_contact_shortcode; ?>" class="admin_input smallbox" /></td>
				</tr>
				<tr>
					<td width="20%"><lable>Address Title</lable></td>
					<td width="60%"><input type="text" placeholder="Get In Touch" name="sp_contact_title" id="sp_contact_title" value="<?php echo $sp_contact_title; ?>" class="admin_input smallbox" /></td>
				</tr>
				<tr>
					<td width="20%"><lable>Contact Address 1</lable></td>
					<td width="60%"><input type="text" placeholder="Address" name="sp_contact_address" id="sp_contact_address" value="<?php echo $sp_contact_address; ?>" class="admin_input largebox" /></td>
				</tr>
				<tr>
					<td width="20%"><lable>Contact Address 2</lable></td>
					<td width="60%"><input type="text" placeholder="Address" name="sp_contact_address_two" id="sp_contact_address_two" value="<?php echo $sp_contact_address_two; ?>" class="admin_input largebox" /></td>
				</tr>				
				<tr>
					<td width="20%"><lable>Email</lable></td>
					<td width="60%"><input type="email" placeholder="Email Address" name="sp_contact_email" id="sp_contact_email" value="<?php echo $sp_contact_email; ?>" class="admin_input smallbox"  /></td>
				</tr>
				<tr>
					<td width="20%"><lable>Phone No. 1</lable></td>
					<td width="60%"><input type="text" placeholder="Phone Number" name="sp_contact_phone_one" id="sp_contact_phone_one" value="<?php echo $sp_contact_phone_one; ?>" class="admin_input smallbox" /></td>
				</tr>
				<tr>
					<td width="20%"><lable>Phone No. 2</lable></td>
					<td width="60%"><input type="text" placeholder="Phone Number" name="sp_contact_phone_two" id="sp_contact_phone_two" value="<?php echo $sp_contact_phone_two; ?>" class="admin_input smallbox"  /></td>
				</tr>
		    </table>
<?php
	
}


?>