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

	<footer>
		<div class="footer_sec">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-sm-3 col-xs-12">
						<h3>Company</h3>
						<ul class="footer_link">
							<li><a href="#">About us</a></li>
							<li><a href="#">Team</a></li>							
							<li><a href="#">Blog</a></li>
						</ul>
					</div>
					<div class="col-lg-3 col-sm-3 col-xs-12">
						<h3>Contact</h3>
						<ul class="footer_link">
							<li><a href="#">Help & Support</a></li>
							<li><a href="#">Partner with us</a></li>
						</ul>
					</div>
					<div class="col-lg-3 col-sm-3 col-xs-12">
						<h3>Legal</h3>
						<ul class="footer_link">
							<li><a href="#">Terms & Conditions</a></li>
							<li><a href="#">Refund & Cancellation</a></li>
							<li><a href="#">Privacy Policy</a></li>
							<li><a href="#">Offer Terms</a></li>
						</ul>
					</div>
					<div class="col-lg-3 col-sm-3 col-xs-12">
						<div class="btn-block">
							<a href="#" class="download_link"><img src="<?php echo get_template_directory_uri(''); ?>/images/footer_image_1.jpg" alt=""></a>
							<a href="#" class="download_link"><img src="<?php echo get_template_directory_uri(''); ?>/images/footer_image_2.jpg" alt=""></a>
						</div>
					</div>
				</div>
				
				<!-- Copyright -->
				<div class="copyright">
					<div class="row">
						<div class="col-lg-6 col-sm-6 col-xs-6">
							<ul class="social_link">
								<li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							</ul>
						</div>
						<div class="col-lg-6 col-sm-6 col-xs-6">
							<p>© <?php echo date('Y')."&nbsp;"; echo bloginfo('name'); ?>, All Right Reserved.</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		</footer>
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
<script src="<?php echo get_template_directory_uri(''); ?>/js/jquery.min.js"></script>
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

});
</script>
</body>
</html>
