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
	<script>var ajax_url= '<?php echo admin_url('admin-ajax.php'); ?>';</script>
	
	
</head>

<body <?php body_class(); ?>>

<?php if ( !is_user_logged_in() ) { ?>
<div class="register_info">
			<?php echo do_shortcode('[user_login]'); ?>
			<?php echo do_shortcode('[user_register]'); ?>      
</div>
<?php } ?>
<div class="hidden-xs">
<div id="wrapper" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'maia' ); ?></a>

	<header>
		<div class="top_part">
    	<div class="container">
            <!-- Nav Sec -->
            <div class="nav_sec">
				<?php if ( !is_user_logged_in() ) { ?>
                <ul class="right_links">
                    <li><a href="javascript:void(0);" class="userurl" id="login" title="Login">Login</a></li>
                    <li><a href="javascript:void(0);" class="userurl" id="signup" title="SIgn Up">Sign Up</a></li>
                </ul>
				<?php } ?>
                <div class="logo"><a href="<?php echo home_url(); ?>" title="<?php echo bloginfo('name'); ?>" ><img src="<?php echo get_theme_mod( 'logo', get_template_directory_uri() . '/inc/images/default-logo.png' ) ?>" alt=""></a></div>
            </div>
            
            <!-- Location Block -->
            <div class="location_block">
                <?php $home_heading = get_theme_mod('top_heading_home');
					  $home_text_sub = get_theme_mod('top_heading_home_sub');
					  $search_setting = get_theme_mod('bool_search_setting');
					  	
				if(!empty($home_heading)){?><h2> <?php echo $home_heading; ?></h2><?php } ?>
                <?php if(!empty($home_text_sub)){?><p><?php echo $home_text_sub; ?></p><?php } ?>
                
                <!-- Search Info -->
                <?php if($search_setting === 'on_search'){ echo do_shortcode('[search_view_enable]'); } ?>
                
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

</script>	
	
	<div id="content" class="site-content">
