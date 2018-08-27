<?php

global $wpdb;
/* Registration design view */
function sp_login_form(){ ?>
	<div class="login_info userlogbox loginbx">
    	<a href="#" class="close_btn"><i class="fa fa-close"></i></a>
    	<div class="inner">
        	<div class="title_info">
            	<h2>Login</h2>
                <span>or <a href="#">create an account</a></span>
            </div>
			<form name="login_form" id="login_form" method="post" >			
				<div class="form_info">
				<span class="login_message_reg"></span>
					<div class="form_block">
						<input type="text" class="field" placeholder="Username" name="username" id="loginusername" >
					</div>
					<div class="form_block">
						<input type="password" class="field field_2" name="password" id="loginpassword" placeholder="Password">
						<a href="#" class="forgot_link">forgot?</a>
					</div>
					<input class="login_btn" type="submit" name="submit" value="Login">
				</div>
			</form>
        </div>
    </div>
<?php
}

/* Add validation */
function sp_login_validation( $username, $password )  {
//	global $reg_errors;
	$reg_errors = new WP_Error;
	if ( empty( $username ) || empty( $password ) ) {
		$reg_errors->add('field', 'Required form field is missing');
	}

	if ( $reg_errors->get_error_messages() ) {
		$i=1;
		foreach ( $reg_errors->get_error_messages() as $error ) {
			echo "<span style='color:red;' >&nbsp;".$i.') ';
			echo $error . ',</span>';
			$i++;
		}
		exit;
	}
}

/*user login function */
add_action('wp_ajax_sp_login_fn' , 'sp_login_fn');
add_action('wp_ajax_nopriv_sp_login_fn' , 'sp_login_fn');
function sp_login_fn() {	
    if ( isset($_POST['username'] ) ) {
        sp_login_validation(
			$_POST['username'],
			$_POST['password']
        );
		$username = $_POST['username'];  
		$password = $_POST['password'];  
		$login_data['user_login'] = $username;  
		$login_data['user_password'] = $password;  
		
		$user_verify = wp_signon( $login_data, false );   
	}
	
	if ( is_wp_error($user_verify) )   
    {  
       echo "<span style='color:red;' >Invalid login details</span>";exit;
    } else {    
       echo "<script type='text/javascript'>window.location.href='". home_url() ."'</script>";  
       exit();  
    }  
}
?>