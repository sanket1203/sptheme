<?php
/* @package Sptheme
 *
 *
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
		
		// Contact meta save
		if(isset($_POST["sp_contact_shortcode"]))
		{
			$sp_contact_shortcode  = $_POST["sp_contact_shortcode"];
			update_post_meta($post_id, "sp_contact_shortcode", $sp_contact_shortcode);
		}else{
			update_post_meta($post_id, "sp_contact_shortcode", '');
		}
		
		if(isset($_POST["sp_contact_title"]))
		{
			$sp_contact_title  = $_POST["sp_contact_title"];
			update_post_meta($post_id, "sp_contact_title", $sp_contact_title);
		}else{
			update_post_meta($post_id, "sp_contact_title", '');
		}
		
		if(isset($_POST["sp_contact_address"]))
		{
			$sp_contact_address  = $_POST["sp_contact_address"];
			update_post_meta($post_id, "sp_contact_address", $sp_contact_address);
		}else{
			update_post_meta($post_id, "sp_contact_address", '');
		}
		
		if(isset($_POST["sp_contact_address_two"]))
		{
			$sp_contact_address_two  = $_POST["sp_contact_address_two"];
			update_post_meta($post_id, "sp_contact_address_two", $sp_contact_address_two);
		}else{
			update_post_meta($post_id, "sp_contact_address_two", '');
		}		
		
		if(isset($_POST["sp_contact_email"]))
		{
			$sp_contact_email  = $_POST["sp_contact_email"];
			update_post_meta($post_id, "sp_contact_email", $sp_contact_email);
		}else{
			update_post_meta($post_id, "sp_contact_email", '');
		}
		
		if(isset($_POST["sp_contact_phone_one"]))
		{
			$sp_contact_phone_one  = $_POST["sp_contact_phone_one"];
			update_post_meta($post_id, "sp_contact_phone_one", $sp_contact_phone_one);
		}else{
			update_post_meta($post_id, "sp_contact_phone_one", '');
		}
		
		if(isset($_POST["sp_contact_phone_two"]))
		{
			$sp_contact_phone_two  = $_POST["sp_contact_phone_two"];
			update_post_meta($post_id, "sp_contact_phone_two", $sp_contact_phone_two);
		}else{
			update_post_meta($post_id, "sp_contact_phone_two", '');
		}
		
		
		
	}
}
add_action('save_post','sp_custom_update_meta',1,2);

?>