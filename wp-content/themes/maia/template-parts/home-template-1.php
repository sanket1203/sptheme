<?php
/**
 * Template Name: Home 1
 * @package Sp_theme
 */
get_header();
?>
<!-- Service Sec -->
<div class="service_sec">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-4 col-sm-4 col-xs-12">
            	<div class="block">
                	<figure><img src="<?php echo get_template_directory_uri().'/images/service_icon_1.png'?>" alt=""></figure>
                    <h3>No Minimum Order</h3>
                    <p>Order in for yourself or for the group, with no restrictions on order value</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-xs-12">
            	<div class="block">
                	<figure><img src="<?php echo get_template_directory_uri().'/images/service_icon_2.png'?>" alt=""></figure>
                    <h3>Live Order Tracking</h3>
                    <p>Know where your order is at all times, from the restaurant to your doorstep</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-xs-12">
            	<div class="block">
                	<figure><img src="<?php echo get_template_directory_uri().'/images/service_icon_3.png'?>" alt=""></figure>
                    <h3>Lightning-Fast Delivery</h3>
                    <p>Experience Swiggy's superfast delivery for food delivered fresh & on time</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pocket_sec">
	<div class="container">
    	<div class="col-lg-6 col-sm-6 col-xs-12">
        	<div class="left">
                <h2>Restaurants in your pocket</h2>
                <p>Order from your favorite restaurants & track on the go, with the all-new Swiggy app.</p>
                <div class="btn-block">
                    <a href="#" class="btn_link"><img src="<?php echo get_template_directory_uri().'/images/pocket_image_1.jpg'; ?>" alt=""></a>
                    <a href="#" class="btn_link"><img src="<?php echo get_template_directory_uri().'/images/pocket_image_2.jpg'; ?>" alt=""></a>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-xs-12">
        	<figure><img src="<?php echo get_template_directory_uri().'/images/food_image.png'; ?>" alt=""></figure>
        </div>
    </div>
</div>

<div class="available_sec">
	<div class="container">
    	<ul>
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
<?php get_footer();?>