<?php
/**
 * @package Sptheme
 * Version 1.0
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
	<script src="<?php echo get_template_directory_uri(''); ?>/js/jquery.min.js"></script>
	<script>var ajax_url= '<?php echo admin_url('admin-ajax.php'); ?>';</script>
	<?php
		$footer_font_color = get_theme_mod('footer_font_color','#fff');	
		$footer_heading_color = get_theme_mod('footer_heading_color','#fff');
		$footer_link_color 	  = get_theme_mod('footer_link_color','#fff');
	?>
	<style>
		.footer_sec p{color:<?php echo $footer_font_color;?>;}
		.footer_sec a{color:<?php echo $footer_link_color;?>;}
		.footer_sec h6{color:<?php echo $footer_heading_color;?>;}
	</style>
</head>

<body <?php body_class(); ?>>

<?php if ( !is_user_logged_in() ) { ?>
<div class="register_info">
			<?php echo do_shortcode('[user_login]'); ?>
			<?php echo do_shortcode('[user_register]'); ?>      
</div>
<?php } ?>
<div id="wrapper" class="site">
<div class="overlay"></div>

<!-- Sidebar -->
<nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
    <ul class="nav sidebar-nav">
	<?php
                            global $post;

                            if ($post) {
                                /* Get an array of Ancestors and Parents if they exist */
                                $parents = get_post_ancestors($post->ID);
                                /* Get the top Level page->ID count base 1, array base 0 so -1 */
                                $id = ($parents) ? $parents[count($parents) - 1] : $post->ID;
                                /* Get the parent and set the $class with the page slug (post_name) */
                                $parent = get_page($id);
                                // echo $parent->ID; 
                                $active_beer = '';
                            }

                            $header_menu_arr = array();          // Get the navigation menu
                            $header_menu = wp_get_nav_menu_items('Header Menu');
                            foreach ($header_menu as $hk => $hd) {
                                if ($hd->menu_item_parent == 0) {
                                    $header_menu_arr[$hd->menu_item_parent][] = $hd;
                                } else {
                                    $header_menu_arr[$hd->menu_item_parent][$hk][] = $hd;
                                }
                            }

                            if (!empty($header_menu_arr[0])) {
								
                                foreach ($header_menu_arr[0] as $h) {
									
                                    if ((get_permalink() == $h->url || $id == $h->post_parent || $parent->ID == $h->object_id ) && !is_404()) 
                                        {
                                            $active = "class='active'";
                                        } else {
                                            $active = "";
										}
										
								
                                    if (!array_key_exists($h->ID, $header_menu_arr)) {
                                        echo '<li><a href="' . $h->url . '"  ' . $active . '  title ="' . $h->title . '"  >' . $h->title . '</a></li>' . PHP_EOL;
                                    } else {
                                        echo '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" ' . $active . ' title="' . $h->title . '" href="' . $h->url . '"  >' . $h->title . '<span class="caret"></span></a>' . PHP_EOL;
                                        if (array_key_exists($h->ID, $header_menu_arr)) {
                                            echo '<ul class=" dropdown-menu '.$cls.'" role="menu">' . PHP_EOL;
                                            $ia = 0;
                                            foreach ($header_menu_arr[$h->ID] as $h2) {
                                                if (get_permalink() == $h2[0]->url) {
                                                    $class = "class='active'";
                                                } else {
                                                    $class = "";
                                                }
                                                $ia++;
                                                echo '<li><a ' . $class . ' title="' . $h2[0]->title . '" href="' . $h2[0]->url . '" >' . $h2[0]->title . '</a></li>' . PHP_EOL;
                                            }
                                            echo "</ul>" . PHP_EOL . "</li>" . PHP_EOL;
                                        }
                                    }
                                }
                            }
                            ?>
        
    </ul>
</nav>

<?php if(is_front_page()){ ?>
<!-- Menu Icon -->
<button type="button" class="hamburger is-closed" data-toggle="offcanvas">
    <span class="hamb-top"></span>
    <span class="hamb-middle"></span>
    <span class="hamb-bottom"></span>
</button>
<?php } ?>
<div id="page-content-wrapper">
<div class="hidden-xs">
<header>
		<!-- header area -->
		<?php if(is_front_page()){ echo do_shortcode('[header_part]'); }else{ ?>
		<div class="main_navigation">
			<div class="container">
				<nav class="navbar navbar-default">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" aria-controls="navbar"> 
							<span class="sr-only">Toggle navigation</span> 
							<span class="icon-bar top-bar"></span> 
							<span class="icon-bar middle-bar"></span> 
							<span class="icon-bar bottom-bar"></span> 
						</button>
						<a class="navbar-brand" href="<?php echo home_url(); ?>"><img height="80" width="90" src="<?php echo get_theme_mod( 'logo_other_page', get_template_directory_uri() . '/images/default-logo-black.png' ) ?>" alt="<?php echo bloginfo('name'); ?>"></a>
					</div>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
						<?php
						    global $post;

                            if ($post) {
                                $parents = get_post_ancestors($post->ID);
                                $id = ($parents) ? $parents[count($parents) - 1] : $post->ID;
                                $parent = get_page($id);
                                $active_beer = '';
                            }
                            $header_menu_arr = array();          // Get the navigation menu
                            $header_menu = wp_get_nav_menu_items('Header Menu');
                            foreach ($header_menu as $hk => $hd) {
                                if ($hd->menu_item_parent == 0) {
                                    $header_menu_arr[$hd->menu_item_parent][] = $hd;
                                } else {
                                    $header_menu_arr[$hd->menu_item_parent][$hk][] = $hd;
                                }
                            }

                            if (!empty($header_menu_arr[0])) {
								
                                foreach ($header_menu_arr[0] as $h) {									
                                    if ((get_permalink() == $h->url || $id == $h->post_parent || $parent->ID == $h->object_id ) && !is_404()) 
                                        {
                                            $active = "class='active'";
                                        } else {
                                            $active = "";
										}
										
                                    if (!array_key_exists($h->ID, $header_menu_arr)) {
                                        echo '<li><a href="' . $h->url . '"  ' . $active . '  title ="' . $h->title . '"  >' . $h->title . '</a></li>' . PHP_EOL;
                                    } else {
                                        echo '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" ' . $active . ' title="' . $h->title . '" href="' . $h->url . '"  >' . $h->title . '</a>' . PHP_EOL;
                                        if (array_key_exists($h->ID, $header_menu_arr)) {
                                            echo '<ul class=" dropdown-menu '.$cls.'" role="menu">' . PHP_EOL;
                                            $ia = 0;
                                            foreach ($header_menu_arr[$h->ID] as $h2) {
                                                if (get_permalink() == $h2[0]->url) {
                                                    $class = "class='active'";
                                                } else {
                                                    $class = "";
                                                }
                                                $ia++;
                                                echo '<li><a ' . $class . ' title="' . $h2[0]->title . '" href="' . $h2[0]->url . '" >' . $h2[0]->title . '</a></li>' . PHP_EOL;
                                            }
                                            echo "</ul>" . PHP_EOL . "</li>" . PHP_EOL;
                                        }
                                    }
                                }
                            }
						?>
							
						</ul>
					</div>
				</nav>
			</div>
		</div>	
		<?php } ?>
	</header><!-- #masthead -->

<div id="content" class="site-content">
