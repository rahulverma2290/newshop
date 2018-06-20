<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<!--css-->
<link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
<link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/font-awesome.css" rel="stylesheet">
<!--css-->
<?php wp_head(); ?>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Cagliostro' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!--search jQuery-->
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/main.js"></script>
<!--search jQuery-->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/responsiveslides.min.js"></script>
 <script>
    jQuery(function () {
      jQuery("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
 </script>
 <!--mycart-->
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/bootstrap-3.1.1.min.js"></script>
 <!-- cart -->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/simpleCart.min.js"></script>
<!-- cart -->
  <!--start-rate-->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jstarbox.js"></script>
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
		<script type="text/javascript">
			jQuery(function() {
			jQuery('.starbox').each(function() {
				var starbox = jQuery(this);
					starbox.starbox({
					average: starbox.attr('data-start-value'),
					changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
					ghosting: starbox.hasClass('ghosting'),
					autoUpdateAverage: starbox.hasClass('autoupdate'),
					buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
					stars: starbox.attr('data-star-count') || 5
					}).bind('starbox-value-changed', function(event, value) {
					if(starbox.hasClass('random')) {
					var val = Math.random();
					starbox.next().text(' '+val);
					return val;
					} 
				})
			});
		});
		</script>
<!--//End-rate-->
</head>

<body <?php body_class(); ?>>
<?php /* 
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyseventeen' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<?php get_template_part( 'template-parts/header/header', 'image' ); ?>

		<?php if ( has_nav_menu( 'top' ) ) : ?>
			<div class="navigation-top">
				<div class="wrap">
					<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
				</div><!-- .wrap -->
			</div><!-- .navigation-top -->
		<?php endif; ?>

	</header><!-- #masthead -->

	<?php

	/*
	 * If a regular post or page, and not the front page, show the featured image.
	 * Using get_queried_object_id() here since the $post global may not be set before a call to the_post().
	 
	if ( ( is_single() || ( is_page() && ! twentyseventeen_is_frontpage() ) ) && has_post_thumbnail( get_queried_object_id() ) ) :
		echo '<div class="single-featured-image-header">';
		echo get_the_post_thumbnail( get_queried_object_id(), 'twentyseventeen-featured-image' );
		echo '</div><!-- .single-featured-image-header -->';
	endif;
	?>

	<div class="site-content-contain">
		<div id="content" class="site-content">
*/ ?>

<body>
	<!--header-->
		<div class="header">
			<div class="header-top">
				<div class="container">
					 <div class="top-left">
						<a href="#"> Help  <i class="glyphicon glyphicon-phone" aria-hidden="true"></i> +0123-456-789</a>
					</div>
					<div class="top-right">
					<ul>
						<li><a href="checkout.html">Checkout</a></li>
						<li><a href="login.html">Login</a></li>
						<li><a href="registered.html"> Create Account </a></li>
					</ul>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="heder-bottom">
				<div class="container">
					<div class="logo-nav">
						<div class="logo-nav-left">
							<h1><a href="<?php the_permalink(); ?>"><?php the_custom_logo(); ?></a></h1>
						</div>
						<div class="logo-nav-left1">
							<nav class="navbar navbar-default">
								<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header nav_2">
									<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div> 
								<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">

									<?php if ( has_nav_menu( 'top' ) ) : ?>
										<div class="navigation-top">
											<div class="wrap">
												<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
											</div><!-- .wrap -->
										</div><!-- .navigation-top -->
									<?php endif; ?>
									
									<!--<ul class="nav navbar-nav">
										<li class="active"><a href="index.html" class="act">Home</a></li>	
										<!-- Mega Menu
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">Women<b class="caret"></b></a>
											<ul class="dropdown-menu multi-column columns-3">
												<div class="row">
													<div class="col-sm-3  multi-gd-img">
														<ul class="multi-column-dropdown">
															<h6>Submenu1</h6>
															<li><a href="products.html">Clothing</a></li>
															<li><a href="products.html">Wallets</a></li>
															<li><a href="products.html">Shoes</a></li>
															<li><a href="products.html">Watches</a></li>
															<li><a href="products.html"> Underwear </a></li>
															<li><a href="products.html">Accessories</a></li>
														</ul>
													</div>
													<div class="col-sm-3  multi-gd-img">
														<ul class="multi-column-dropdown">
															<h6>Submenu2</h6>
															<li><a href="products.html">Sunglasses</a></li>
															<li><a href="products.html">Wallets,Bags</a></li>
															<li><a href="products.html">Footwear</a></li>
															<li><a href="products.html">Watches</a></li>
															<li><a href="products.html">Accessories</a></li>
															<li><a href="products.html">Jewellery</a></li>
														</ul>
													</div>
													<div class="col-sm-3  multi-gd-img">
															<a href="products.html"><img src="images/woo.jpg" alt=" "/></a>
													</div> 
													<div class="col-sm-3  multi-gd-img">
															<a href="products.html"><img src="images/woo1.jpg" alt=" "/></a>
													</div>
													<div class="clearfix"></div>
												</div>
											</ul>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">Men <b class="caret"></b></a>
											<ul class="dropdown-menu multi-column columns-3">
												<div class="row">
													<div class="col-sm-3  multi-gd-img">
														<ul class="multi-column-dropdown">
															<h6>Submenu1</h6>
															<li><a href="products.html">Clothing</a></li>
															<li><a href="products.html">Wallets</a></li>
															<li><a href="products.html">Shoes</a></li>
															<li><a href="products.html">Watches</a></li>
															<li><a href="products.html"> Underwear </a></li>
															<li><a href="products.html">Accessories</a></li>
														</ul>
													</div>
													<div class="col-sm-3  multi-gd-img">
														<ul class="multi-column-dropdown">
															<h6>Submenu2</h6>
															<li><a href="products.html">Sunglasses</a></li>
															<li><a href="products.html">Wallets,Bags</a></li>
															<li><a href="products.html">Footwear</a></li>
															<li><a href="products.html">Watches</a></li>
															<li><a href="products.html">Accessories</a></li>
															<li><a href="products.html">Jewellery</a></li>
														</ul>
													</div>
													<div class="col-sm-3  multi-gd-img">
															<a href="products1.html"><img src="images/woo3.jpg" alt=" "/></a>
													</div> 
													<div class="col-sm-3  multi-gd-img">
															<a href="products1.html"><img src="images/woo4.jpg" alt=" "/></a>
													</div>
													<div class="clearfix"></div>
												</div>
											</ul>
										</li>
										<li><a href="codes.html">Short Codes</a></li>
										<li><a href="mail.html">Mail Us</a></li>
									</ul>-->
								</div>
							</nav>
						</div>
						<div class="logo-nav-right">
							<ul class="cd-header-buttons">
								<li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
							</ul> <!-- cd-header-buttons -->
							<div id="cd-search" class="cd-search">
								<form action="#" method="post">
									<input name="Search" type="search" placeholder="Search...">
								</form>
							</div>	
						</div>
						<div class="header-right2">
							<div class="cart box_1">
								<a href="checkout.html">
									<h3> <div class="total">
										<span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)</div>
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bag.png" alt="" />
									</h3>
								</a>
								<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
								<div class="clearfix"> </div>
							</div>	
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>
		<!--header-->