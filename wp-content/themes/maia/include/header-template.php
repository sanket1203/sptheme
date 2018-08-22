<?php
/*Header customization
@package Sptheme */
function sp_header_area(){
	 $home_heading 		= get_theme_mod('top_heading_home');
     $home_text_sub 	= get_theme_mod('top_heading_home_sub');
	 $search_setting 	= get_theme_mod('bool_search_setting');
	 $home_background   = get_theme_mod('home_background');
	 $header_bg_color	= get_theme_mod('header_background_color', '#312720' );
	 if(!empty($home_background)){
		 $home_background = 'url('.$home_background.');no-repeat center center;';
	 }else{
		 $home_background = $header_bg_color;
	 }
?>

<div class="top_part" style="background:<?php echo $home_background;?> ">
	<div class="container">
		<div class="nav_sec">
			<?php if ( !is_user_logged_in() ) { ?>
			<ul class="right_links">
				<li><a href="javascript:void(0);" class="userurl" id="login" title="Login">Login</a></li>
				<li><a href="javascript:void(0);" class="userurl" id="signup" title="Sign Up">Sign Up</a></li>
			</ul>
			<?php } ?>
			<div class="logo"><a href="<?php echo home_url(); ?>" title="<?php echo bloginfo('name'); ?>" ><img src="<?php echo get_theme_mod( 'logo', get_template_directory_uri() . '/inc/images/default-logo.png' ) ?>" alt="<?php echo bloginfo('name'); ?>"></a></div>
		</div>
		
		<!-- Location Block -->
		<div class="location_block">
			<?php
					
			if(!empty($home_heading)){?><h2> <?php echo $home_heading; ?></h2><?php } ?>
			<?php if(!empty($home_text_sub)){?><p><?php echo $home_text_sub; ?></p><?php } ?>
			
			
			<?php
			/*  Search Info*/
			if($search_setting === 'on_search'){ echo do_shortcode('[search_view_enable]'); } ?>
			
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
<?php
}
add_shortcode('header_part', 'sp_header_area');
?>