jQuery(document).ready(function() {
	$('#contact_box').hide();
    jQuery('#page_template').on('change', function(){		
        if ($(this).val()== 'template-parts/contact-template-one.php' || $(this).val()== 'template-parts/contact-template-two.php' ) {
			jQuery('#contact_box').show();
        }else{
			jQuery('#contact_box').hide();
		}
     });                 
}); 