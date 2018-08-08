$(document).ready(function(){
	$('#register_form').submit(function(e) {
		e.preventDefault();
		$.ajax({
			url : ajax_url,			 
			type : 'post',
			data : 
			$('#register_form').serialize() + '&action=sp_registration_fn',
			success : function( response ) {
				$('.message_reg').html(response);
			}, error: function (errorThrown) {
            }
		});
	});
});