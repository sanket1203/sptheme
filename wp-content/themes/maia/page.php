<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Sptheme
 */

get_header();
$head_overlay      = get_post_meta(get_the_ID(),'header_overlaybool',true);
$head_banner_ID    = get_post_meta(get_the_ID(),'head_banner_image',true);
$head_image 	   = get_the_guid($head_banner_ID);
$pagename 		   = get_the_title(); 
if(!empty($head_banner_ID)){
?>
<div class="inner_banner" style="background:url('<?php echo $head_image;?>') no-repeat center center;background-size:cover;">
	<?php if($head_overlay){ ?>
		<div class="overlay_bg"></div>
	<?php }?>
	<div class="container">
    	<h1><?php the_title(); ?></h1>
    </div>
</div>
<?php } ?>

<div id="primary" <?php if($pagename !='Shop'){ ?> class="typography_info" <?php } ?> >
	<div class="container">	
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</div><!-- #container -->
</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
