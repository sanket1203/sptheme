$(document).ready(function(){
	//user registration 
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
	
	// login validation & login
	$('#login_form').submit(function(e) {
		e.preventDefault();
		$.ajax({
			url : ajax_url,			 
			type : 'post',
			data : 
			$('#login_form').serialize() + '&action=sp_login_fn',
			success : function( response ) {
				$('.login_message_reg').html(response);
			}, error: function (errorThrown) {
            }
		});
	});
});