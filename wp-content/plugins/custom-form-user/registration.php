<?php
/* Registration design view */
function sp_registration_form(){ ?>
	<div class="form_info">
		<form name="register_form" id="register_form" method="post">
		<span class="message_reg"></span>
		<div class="form_block">
			 <input type="text" class="field" placeholder="Phone number" name="phone_number" id="phone_number" value="<?php ( isset( $_POST['phone_number']) ? $phone_number : null )?>" >
			</div>
			<div class="form_block">
				<input type="text" class="field" placeholder="Name" name="username" value="<?php ( isset( $_POST['username'] ) ? $username : null ) ?>" >
			</div>
			 
			<div class="form_block">
			<input type="password" class="field" placeholder="Password" name="password" value="<?php ( isset( $_POST['password'] ) ? $password : null ) ?>" >
			</div>
			 
			<div class="form_block">
			<input type="text" class="field" placeholder="Email" name="email" value="<?php ( isset( $_POST['email']) ? $email : null ) ?>" >
			</div>			 
			<input class="register_btn" type="submit" name="submit" value="CONTINUE">
		</form>
	</div>
<?php
}

/* Add validation */
function sp_registration_validation( $username, $password, $email, $phone_number )  {
	global $reg_errors;
	$reg_errors = new WP_Error;
	if ( empty( $username ) || empty( $password ) || empty( $email ) || empty( $phone_number ) ) {
		$reg_errors->add('field', 'Required form field is missing');
	}else if ( 4 > strlen( $username ) ) {
		$reg_errors->add( 'username_length', 'Username too short. At least 4 characters is required' );
	}
	
	else if ( username_exists( $username ) )
		$reg_errors->add('user_name', 'Sorry, that username already exists!');
	
	else if ( ! validate_username( $username ) ) {
		$reg_errors->add( 'username_invalid', 'Sorry, the username you entered is not valid' );
	}
	
	else if ( 4 > strlen( $password ) ) {
        $reg_errors->add( 'password', 'Password length must be greater than 4' );
    }
	
	else if ( !is_email( $email ) ) {
		$reg_errors->add( 'email_invalid', 'Email is not valid' );
	}
	
	else if ( email_exists( $email ) ) {
		$reg_errors->add( 'email', 'Email Already in use' );
	}

	if ( is_wp_error( $reg_errors ) ) {
		$i=1;
		foreach ( $reg_errors->get_error_messages() as $error ) {
			echo "<span style='color:red;' >&nbsp;".$i.') ';
			echo $error . ',</span>';
			$i++;
		}
	}
}

/*Insert User Process */
function sp_complete_registration() {
    global $reg_errors, $username, $password, $email, $phone_number;
    if ( 1 > count( $reg_errors->get_error_messages() ) ) {
        $userdata = array(
        'user_login'    =>   $username,
        'user_email'    =>   $email,
        'user_pass'     =>   $password,        
        'phone_number'   =>  $phone_number
        );
        $user = wp_insert_user( $userdata );
        echo '<span style="color:green;>"Registration complete</span>';   
    }
}



/*user registration all function call here */
add_action('wp_ajax_sp_registration_fn' , 'sp_registration_fn');
add_action('wp_ajax_nopriv_sp_registration_fn' , 'sp_registration_fn');
function sp_registration_fn() {	

    if ( isset($_POST['email'] ) ) {
        sp_registration_validation(
			$_POST['username'],
			$_POST['password'],
			$_POST['email'],
			$_POST['phone_number']
        );
		
         
        // sanitize user form input
        global $username, $password, $email, $website, $first_name, $last_name, $nickname, $bio;
        $username     =   sanitize_user( $_POST['username'] );
        $password     =   esc_attr( $_POST['password'] );
        $email        =   sanitize_email( $_POST['email'] );
        $phone_number =   sanitize_text_field( $_POST['phone_number'] );
        // call @function complete_registration to create the user
        // only when no WP_error is found
       // sp_complete_registration( $username, $password, $email,$phone_number);
    } 
}

?>