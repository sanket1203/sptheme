<?php
/**
 * The header for our theme
 * @package Maia
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	
	<link rel="stylesheet" src="<?php echo get_template_directory_uri().'/css/bootstrap.css' ?>"  type='text/css' media='all' />	
	<link rel="stylesheet" src="<?php echo get_template_directory_uri().'/css/bootstrap.min.css' ?>"  type='text/css' media='all' />	
	<link rel="stylesheet" href='<?php echo get_template_directory_uri().'/css/custom.css' ?>' type='text/css' media='all' />
	<link rel="stylesheet" href='<?php echo get_template_directory_uri().'/css/responsive.css' ?>' type='text/css' media='all' />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri().'/css/font-awesome.css' ?>" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri().'/css/owl.carousel.css'?>" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Register Info -->
<div class="register_info">
	<div class="login_info userlogbox loginbx">
    	<a href="#" class="close_btn"><i class="fa fa-close"></i></a>
    	<div class="inner">
        	<figure><img src="images/login_image.png" alt=""></figure>
        	<div class="title_info">
            	<h2>Login</h2>
                <span>or <a href="#">create an account</a></span>
            </div>
            <div class="form_info">
            	<div class="form_block">
            		<input type="text" class="field" placeholder="Phone number">
                </div>
                <div class="form_block">
                	<input type="password" class="field field_2" placeholder="Password">
                    <a href="#" class="forgot_link">forgot?</a>
                </div>
                <button class="login_btn">Login</button>
            </div>
        </div>
    </div>
    
    <div class="login_info userlogbox signup_info registerbx">
    	<a href="#" class="close_btn2"><i class="fa fa-close"></i></a>
    	<div class="inner">
        	<!--<figure><img src="images/login_image.png" alt=""></figure>-->
        	<div class="title_info">
            	<h2>Sign up</h2>
                <span>or <a href="#">login to your account</a></span>
            </div>
			<?php echo do_shortcode('[user_register]'); ?>
			
        </div>
    </div>
</div>
<div class="hidden-xs">
<div id="wrapper" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'maia' ); ?></a>

	<header>
		<div class="top_part">
    	<div class="container">
            <!-- Nav Sec -->
            <div class="nav_sec">
                <ul class="right_links">
                    <li><a href="#" class="userurl" id="login">Login</a></li>
                    <li><a href="#" class="userurl" id="signup">Sign up</a></li>
                </ul>
                
                <!-- Logo -->
                <div class="logo"><a href="#"><img src="<?php echo get_theme_mod( 'logo', get_template_directory_uri() . '/inc/images/default-logo.png' ) ?>" alt=""></a></div>
            </div>
            
            <!-- Location Block -->
            <div class="location_block">
                <h2>Late night at office?</h2>
                <p>Order food from favourite restaurants near you.</p>
                
                <!-- Search Info -->
                <div class="search_info">
                	<div class="inner">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search for...">
                          <span class="input-group-btn">
                            <button class="btn btn-default location_btn" type="button"><i class="fa fa-location-arrow"></i> Locate Me</button>
                          </span>
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button">FIND FOOD</button>
                          </span>
                        </div>
                    </div>
                </div>
                
                <!-- city Name -->
                <ul class="city_name">
                    <li><a href="#">Ahmedabad</a></li>
                    <li><a href="#">Bangalore</a></li>
                    <li><a href="#">Delhi</a></li>
                    <li><a href="#">Kolkata</a></li>
                    <li><a href="#">Noida</a></li>
                    <li><a href="#">Pune</a></li>
                    <li><a href="#">Surat</a></li>
                </ul>
            </div>
        </div>
    </div>
		
	</header><!-- #masthead -->
<script>
jQuery(document).ready(function(){
	$('.userurl').click(function(){
		$('.register_info').css('display','block');
		var userurl = $(this).attr('id');
		if(userurl == 'login' || userurl == 'login2'){
			$('.loginbx').animate({left: '400px'});
			$('.userlogbox').css('display','block');		
			$('.registerbx').css('display','none');
		}
		login2
		if(userurl == 'signup'){
			$('.registerbx').animate({right: '400px'})
			$('.userlogbox').css('display','block');
			$('.loginbx').css('display','none');
		}
	});
	$('.close_btn').click(function(){
		$('.loginbx').animate({left: '-400px'});
		$('.register_info').fadeOut();
		$('.loginbx').removeAttr( 'style' );
		$('.registerbx').removeAttr( 'style' );
	});
	$('.close_btn2').click(function(){
		$('.registerbx').animate({right: '-400px'});
		$('.register_info').fadeOut();
		$('.loginbx').removeAttr( 'style' );
		$('.registerbx').removeAttr( 'style' );
	});
});
</script>	
	
	<div id="content" class="site-content">
