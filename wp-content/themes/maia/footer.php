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
<script src="<?php echo get_template_directory_uri(''); ?>/js/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(''); ?>/js/bootstrap.min.js"></script>  
<?php wp_footer(); ?>

</body>
</html>
