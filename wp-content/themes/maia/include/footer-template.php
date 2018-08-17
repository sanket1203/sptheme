<?php
/*Footer customization
@package Sptheme */
function sp_footer_area(){
	$footer_copyright 	= get_theme_mod('footer_copyright','© '.date('Y').' SP-THEME, All Right Reserved.');
	$facebook_url		= get_theme_mod('fb_social_media','https://www.facebook.com');
	$twitter_url		= get_theme_mod('twitter_social_media','https://www.twitter.com');
	$instagram_url		= get_theme_mod('instagram_social_media','https://www.twitter.com');
	$linkedin_url		= get_theme_mod('linkedin_social_media','');
	$pinterest_url		= get_theme_mod('pinterest_social_media','');
	$googleplus_url		= get_theme_mod('googleplus_social_media','');
	
?>
<div class="footer_sec">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-sm-3 col-xs-12">
				<?php dynamic_sidebar( 'footer_widget_area_1' ); ?>
			</div>
			<div class="col-lg-3 col-sm-3 col-xs-12">
				<?php dynamic_sidebar( 'footer_widget_area_2' ); ?>
			</div>
			<div class="col-lg-3 col-sm-3 col-xs-12">
				<?php dynamic_sidebar( 'footer_widget_area_3' ); ?>
			</div>
			<div class="col-lg-3 col-sm-3 col-xs-12">
				<?php dynamic_sidebar( 'footer_widget_area_4' ); ?>
			</div>
		</div>
		
		<!-- Copyright -->
		<div class="copyright">
			<div class="row">
				<div class="col-lg-6 col-sm-6 col-xs-6">
					<ul class="social_link">
						<?php
						if(!empty($facebook_url)){ echo '<li><a href="'.$facebook_url.'" target="_blank"><i class="fa fa-facebook-f"></i></a></li>';}
						if(!empty($twitter_url)){ echo '<li><a href="'.$twitter_url.'" target="_blank"><i class="fa fa-twitter"></i></a></li>';}
						if(!empty($instagram_url)){ echo '<li><a href="'.$instagram_url.'" target="_blank"><i class="fa fa-instagram"></i></a></li>';}
						if(!empty($linkedin_url)){ echo '<li><a href="'.$linkedin_url.'" target="_blank"><i class="fa fa-linkedin"></i></a></li>';}
						if(!empty($pinterest_url)){ echo '<li><a href="'.$pinterest_url.'" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>';}
						if(!empty($googleplus_url)){ echo '<li><a href="'.$googleplus_url.'" target="_blank"><i class="fa fa-google-plus"></i></a></li>';}
						?>
					</ul>
				</div>
				<div class="col-lg-6 col-sm-6 col-xs-6">
					<p><?php echo $footer_copyright; ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
}
add_shortcode('footer_part', 'sp_footer_area');
?>