<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sptheme
 */

?>

	</div><!-- #content -->

	<footer><?php echo do_shortcode('[footer_part]'); ?></footer>
 </div>	
</div><!-- #page -->
</div> <!-- hidden mobile -->
<div class="hidden-lg hidden-md hidden-sm">

<!-- Mobile Sec -->
<div class="mobile_sec">
	<div class="container">
    	<div class="inner">
            <div class="mobile_slider">
                <div id="owl-demo" class="owl-carousel">
                    <div class="item">
                        <figure><img src="<?php echo get_template_directory_uri(''); ?>/images/mobile_slider_image_1.jpg" alt=""></figure>
                    </div>
                    <div class="item">
                        <figure><img src="<?php echo get_template_directory_uri(''); ?>/images/mobile_slider_image_2.jpg" alt=""></figure>
                    </div>
                    <div class="item">
                        <figure><img src="<?php echo get_template_directory_uri(''); ?>/images/mobile_slider_image_3.jpg" alt=""></figure>
                    </div>
                </div>
            </div>
            <div class="mobile_detail">
                <h2>With a wide collection of cuisines</h2>
                <p>Ready to see top restarurants to order?</p>
                <a href="#" class="setup_link">Setup Your Location</a>
                <p>have an account? <a href="#" class="userurl" id="login2">Login</a></p>
            </div>
        </div>
    </div>
</div>

</div>

<script src="<?php echo get_template_directory_uri(''); ?>/js/bootstrap.min.js"></script>  
<?php wp_footer(); ?>
<script src="<?php echo get_template_directory_uri(''); ?>/js/owl.carousel.js"></script>  
<script>
  $(document).ready(function () {
	var owl = $('.owl-carousel');
      owl.owlCarousel({
        margin:0,
        loop: true,
		dots:true,
		nav:false,
		items:5,
        responsive: {
          0: { items: 1 },
          480: { items: 1 },
		  767: { items: 1 },
		  992: { items: 1 },
          1000: { items:1, }
        }
      })
	  
	  

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
	
	
	 var trigger = $('.hamburger'),
		  overlay = $('.overlay'),
		 isClosed = false;

		trigger.click(function () {
		  hamburger_cross();      
		});

		function hamburger_cross() {

		  if (isClosed == true) {          
			overlay.hide();
			trigger.removeClass('is-open');
			trigger.addClass('is-closed');
			isClosed = false;
		  } else {   
			overlay.show();
			trigger.removeClass('is-closed');
			trigger.addClass('is-open');
			isClosed = true;
		  }
	  }
	  
	  $('[data-toggle="offcanvas"]').click(function () {
			$('#wrapper').toggleClass('toggled');
	  });

});
</script>
</body>
</html>
