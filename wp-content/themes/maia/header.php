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
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="wrapper" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'maia' ); ?></a>

	<header>
		<div class="top_part">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
						<!-- Nav Sec -->
						<div class="nav_sec">
							<ul class="right_links">
								<li><a href="#">Login</a></li>
								<li><a href="#">Sign up</a></li>
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
					<div class="col-lg-6 col-sm-12 col-md-6 col-xs-12"></div>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
	
	<div class="register-side-box">
		<div class="login-box">
			<h2>Login</h2>
			<p><a href="javascript:void(0)" class="">create an account</a></p>
			<form id="login-form" name="login-form" method="post">
				<input type="text" value="" placeholder="Email">
				<input type="text" value="" placeholder="Password">
				<input type="button" value="Login"/>
			</form>
		</div>
		<div class="register-box">
			<h2>Sign up</h2>
			<p><a href="javascript:void(0)" class="">login to your account</a></p>
			<form id="login-form" name="login-form" method="post">
				<input type="text" value="" name="username" placeholder="Name">
				<input type="text" value="" name="email" placeholder="Email">
				<input type="text" value="" name="phone_number" placeholder="Phone Number">
				<input type="password" value="" name="password" placeholder="Password">
				<input type="button" value="Sign up"/>
			</form>
		</div>
	</div>
	<div id="content" class="site-content">
