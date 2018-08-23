<?php
/**
 * Template Name: Contact Page one
 * @package Sp_theme
 */
get_header();
$head_overlay      = get_post_meta(get_the_ID(),'header_overlaybool',true);
$head_banner_ID    = get_post_meta(get_the_ID(),'head_banner_image',true);
$head_image 	   = get_the_guid($head_banner_ID);
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


<div id="primary" class="typography_info contactpage">
	<div class="container">	
		<div class="row">
		<?php
			while ( have_posts() ) :
			
				$sp_contact_shortcode 	= get_post_meta($post->ID,'sp_contact_shortcode',true);
				$sp_contact_title 		= htmlentities(get_post_meta($post->ID,'sp_contact_title',true));
				$sp_contact_address 	= get_post_meta($post->ID,'sp_contact_address',true);
				$sp_contact_address_two = get_post_meta($post->ID,'sp_contact_address_two',true);
				$sp_contact_email 		= get_post_meta($post->ID,'sp_contact_email',true);
				$sp_contact_phone_one 	= get_post_meta($post->ID,'sp_contact_phone_one',true);
				$sp_contact_phone_two 	= get_post_meta($post->ID,'sp_contact_phone_two',true);
			
				the_post();

				the_content();
				?>
				<div class="col-md-8">
					<?php echo do_shortcode($sp_contact_shortcode); ?>
				</div>
				
				<div class="col-md-4 text-left">
					<?php if(!empty($sp_contact_title)){ ?><h2><strong><?php echo $sp_contact_title;?></strong></h2><?php } ?>
					<br/>					
					<?php if(!empty($sp_contact_address)){ ?>
						<h5>Address Info</h5>
						<p><i class="fa fa-map-marker"></i> <?php echo $sp_contact_address; ?></p>
					<?php } ?>
					<?php if(!empty($sp_contact_address_two)){ ?>
						<hr/>
						<p><i class="fa fa-map-marker"></i> <?php echo $sp_contact_address_two; ?></p>
					<?php } ?>	
					<hr/>
					<?php if(!empty($sp_contact_email)){ ?>						
						<p><i class="fa fa-envelope"></i> <?php echo $sp_contact_email; ?></p>
					<?php } ?>	
					
					<?php if(!empty($sp_contact_phone_one)){ ?>						
						<p><i class="fa fa-mobile-phone"></i> <?php echo $sp_contact_phone_one; ?></p>
					<?php } ?>
					
					<?php if(!empty($sp_contact_phone_two)){ ?>						
						<p><i class="fa fa-mobile-phone"></i> <?php echo $sp_contact_phone_two; ?></p>
					<?php } ?>
					
				</div>
				
			

			<?php endwhile; // End of the loop.
		?>
		</div>
	</div>
	
</div>
<section>
			  <div class="container-fluid">
				<div class="row">
				  <div class="gmaps-holder-2">
					<div class="col-md-12 nopadding"> <br/>
					  <div id="map_extended_full" class="map">
						<p>This will be replaced with the Google Map.</p>
					  </div>
					</div>
				  </div>
				  <!--end item--> 
				  
				</div>
			  </div>
			</section>	

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="<?php echo Template_path; ?>/js/jquery.gmap.min.js"></script> 
<script>
jQuery(document).ready(function() {	 
		
   	// Detect user location
	if(navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position)
		{
			$('#map_controls').gMap('addMarker', {
				latitude: position.coords.latitude,
				longitude: position.coords.longitude,
				content: 'You are here!',
				icon: {
					image: "<?php echo Template_path; ?>/images/gmap_pin.png", 
					iconsize: [26, 46],
					iconanchor: [12, 46]
				},
				popup: true
			});
			$('#map_controls').gMap('centerAt', {
				latitude: position.coords.latitude,
				longitude: position.coords.longitude,
				zoom: 8
			});
		}, function()
		{
			//console.log('Couldn\'t find you :(');
		});
	}
	
	
	
	
	
	
	$("#map_extended_full").gMap({
		controls: false,
		scrollwheel: true,
		maptype: 'TERRAIN',
		markers:[
			{
				address: "<?php echo str_replace(array('<br/>', '&', '"'), '+', $sp_contact_address); ?>",
				html: "Address One",
				popup: true
			},			
		],
		
		zoom: 10
	});
	
	});	
</script>
<?php get_footer();?>