<?php
/**
 * The header for our theme
 * @package Sptheme
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
	<?php $footer_link_color = get_theme_mod('googleplus_social_media','#fff'); ?>
	<style>
		.footer_sec a{color:<?php echo $footer_link_color;?>;}
	</style>
	
	
	
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
		<!-- header area -->
		<?php echo do_shortcode('[header_part]'); ?>		
	</header><!-- #masthead -->

<div id="content" class="site-content">
