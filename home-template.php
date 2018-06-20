<?php
/* Template Name: Home Page */
get_header();
?>

<!--banner-->
		<div class="banner-w3">
			<div class="demo-1">            
				<div id="example1" class="core-slider core-slider__carousel example_1">
					<div class="core-slider_viewport">
						<div class="core-slider_list">
							<div class="core-slider_item">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/b1.jpg" class="img-responsive" alt="">
							</div>
							 <div class="core-slider_item">
								 <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/b2.jpg" class="img-responsive" alt="">
							 </div>
							<div class="core-slider_item">
								  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/b3.jpg" class="img-responsive" alt="">
							</div>
							<div class="core-slider_item">
								  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/b4.jpg" class="img-responsive" alt="">
							</div>
						 </div>
					</div>
					<div class="core-slider_nav">
						<div class="core-slider_arrow core-slider_arrow__right"></div>
						<div class="core-slider_arrow core-slider_arrow__left"></div>
					</div>
					<div class="core-slider_control-nav"></div>
				</div>
			</div>
				<link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/coreSlider.css" rel="stylesheet" type="text/css">
				<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/coreSlider.js"></script>
				<script>
					jQuery('#example1').coreSlider({
					  pauseOnHover: false,
					  interval: 3000,
					  controlNavEnabled: true
					});
				</script>

		</div>	
<!--banner-->
			<!--content-->
		<div class="content">
			<!--banner-bottom-->
				<div class="ban-bottom-w3l">
					<div class="container">
								<?php
									  $taxonomy     = 'product_cat';
									  $orderby      = 'name';  
									  $show_count   = 0;      // 1 for yes, 0 for no
									  $pad_counts   = 0;      // 1 for yes, 0 for no
									  $hierarchical = 1;      // 1 for yes, 0 for no  
									  $title        = '';  
									  $empty        = 0;

									  $args = array(
											 'taxonomy'     => $taxonomy,
											 'orderby'      => $orderby,
											 'show_count'   => $show_count,
											 'pad_counts'   => $pad_counts,
											 'hierarchical' => $hierarchical,
											 'title_li'     => $title,
											 'hide_empty'   => $empty
									  );
									 $all_categories = get_categories( $args );
									 foreach ($all_categories as $cat) {
										if($cat->category_parent == 0) {
											$category_id = $cat->term_id;       
											//echo '<br /><a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>';

											$args2 = array(
													'taxonomy'     => $taxonomy,
													'child_of'     => 0,
													'parent'       => $category_id,
													'orderby'      => $orderby,
													'show_count'   => $show_count,
													'pad_counts'   => $pad_counts,
													'hierarchical' => $hierarchical,
													'title_li'     => $title,
													'hide_empty'   => $empty
											);
											$sub_cats = get_categories( $args2 );
											if($sub_cats) {
												foreach($sub_cats as $sub_category) {
													$cat_thumb_id = get_woocommerce_term_meta( $sub_category->term_id, 'thumbnail_id', true );
													$shop_catalog_img = wp_get_attachment_image_src( $cat_thumb_id, 'shop_catalog' );
													//echo '<pre>'; print_r($shop_catalog_img);
													//echo '<br /><a href="'. get_term_link($sub_category->slug, 'product_cat') .'">'. $sub_category->name .'</a>';	
								?>
						<div class="col-md-6 ban-bottom">
							<div class="ban-top">
								<img src="<?php echo $shop_catalog_img[0]; ?>" class="img-responsive" alt="<?php echo $sub_category->name; ?>"/>
								<div class="ban-text">
									<a href="<?php echo get_term_link($sub_category->slug, 'product_cat'); ?>"><h4><?php echo $sub_category->name; ?></h4></a>
								</div>
								<div class="ban-text2 hvr-sweep-to-top">
									<h4>50% <span>Off/-</span></h4>
								</div>
							</div>
						</div>
					<?php	
						}
					   }
					  }
					}
						?>
						<!--<div class="col-md-6 ban-bottom3">
							<div class="ban-top">
								<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/p2.jpg" class="img-responsive" alt=""/>
								<div class="ban-text1">
									<h4>Women's Clothing</h4>
								</div>
							</div>
							<div class="ban-img">
								<div class=" ban-bottom1">
									<div class="ban-top">
										<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/p3.jpg" class="img-responsive" alt=""/>
										<div class="ban-text1">
											<h4>T - Shirt</h4>
										</div>
									</div>
								</div>
								<div class="ban-bottom2">
									<div class="ban-top">
										<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/p4.jpg" class="img-responsive" alt=""/>
										<div class="ban-text1">
											<h4>Hand Bag</h4>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>-->
						<div class="clearfix"></div>
					</div>
				</div>
			<!--banner-bottom-->
			<!--new-arrivals-->
				<div class="new-arrivals-w3agile">
					<div class="container">
						<h2 class="tittle">New Arrivals</h2>
						<div class="arrivals-grids">
						
						<?php
							$args = array(
							'post_type' => 'product',
							//'stock' => 1,
							'posts_per_page' => 4,
							'orderby' =>'date',
							'order' => 'DESC' );
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
						
							<div class="col-md-3 arrival-grid simpleCart_shelfItem">
								<div class="grid-arr">
									<div  class="grid-arrival">
										<figure>		
											<a id="id-<?php the_id(); ?>" class="new-gri" data-toggle="modal" data-target="#myModal1" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
												<div class="grid-img">
													<!--<img  src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/p6.jpg" class="img-responsive" alt="">-->
													<?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="My Image Placeholder" class="img-responsive" width="65px" height="115px" />'; ?>
												</div>
												<div class="grid-img">
													<?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="My Image Placeholder" class="img-responsive" width="65px" height="115px" />'; ?>
												</div>			
											</a>		
										</figure>	
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
									<div class="ribben1">
										<p>SALE</p>
									</div>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<div class="women">
										<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
										<span class="size">XL / XXL / S </span>
										<?php $product = new WC_Product(); //echo '<pre>';print_r($product); ?>
										<p ><del><?php echo $product->regular_price[3]; ?></del><em class="item_price"><?php echo $product->sale_price[4]; ?></em></p>
										<?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>
										<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
									</div>
								</div>
							</div>
							<?php endwhile; wp_reset_query(); ?>
							<!--<div class="col-md-3 arrival-grid simpleCart_shelfItem">
								<div class="grid-arr">
									<div  class="grid-arrival">
										<figure>		
											<a href="#" class="new-gri" data-toggle="modal" data-target="#myModal2">
												<div class="grid-img">
													<img  src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/p7.jpg" class="img-responsive" alt="">
												</div>
												<div class="grid-img">
													<img  src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/p8.jpg" class="img-responsive"  alt="">
												</div>			
											</a>		
										</figure>	
									</div>
									<div class="ribben2">
										<p>OUT OF STOCK</p>
									</div>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<div class="women">
										<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
										<span class="size">XL / XXL / S </span>
										<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
										<a href="#" data-text="Add To Cart" class=" my-cart-b item_add">Add To Cart</a>
									</div>
								</div>
							</div>
							<div class="col-md-3 arrival-grid simpleCart_shelfItem">
								<div class="grid-arr">
									<div  class="grid-arrival">
										<figure>		
											<a href="#" class="new-gri" data-toggle="modal" data-target="#myModal3">
												<div class="grid-img">
													<img  src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/p10.jpg" class="img-responsive" alt="">
												</div>
												<div class="grid-img">
													<img  src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/p9.jpg" class="img-responsive"  alt="">
												</div>			
											</a>		
										</figure>	
									</div>
									<div class="ribben1">
										<p>SALE</p>
									</div>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<div class="women">
										<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
										<span class="size">XL / XXL / S </span>
										<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
										<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
									</div>
								</div>
							</div>
							<div class="col-md-3 arrival-grid simpleCart_shelfItem">
								<div class="grid-arr">
									<div  class="grid-arrival">
										<figure>		
											<a href="#" class="new-gri" data-toggle="modal" data-target="#myModal4">
												<div class="grid-img">
													<img  src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/p11.jpg" class="img-responsive" alt="">
												</div>
												<div class="grid-img">
													<img  src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/p12.jpg" class="img-responsive"  alt="">
												</div>			
											</a>		
										</figure>	
									</div>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<div class="women">
										<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
										<span class="size">XL / XXL / S </span>
										<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
										<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
									</div>
								</div>
							</div>-->
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			<!--new-arrivals-->
				<!--accessories-->
			<div class="accessories-w3l">
				<div class="container">
					<h3 class="tittle">20% Discount on</h3>
					<span>TRENDING DESIGNS</span>
					<div class="button">
						<a href="#" class="button1"> Shop Now</a>
						<a href="#" class="button1"> Quick View</a>
					</div>
				</div>
			</div>
			<!--accessories-->
			<!--Products-->
				<div class="product-agile">
					<div class="container">
						<h3 class="tittle1"> Featured Products</h3>
						<div class="slider">
							<div class="callbacks_container">
								<ul class="rslides" id="slider">
									<li>	 
										<div class="caption">
											<div class="col-md-3 cap-left simpleCart_shelfItem">
												<div class="grid-arr">
													<div  class="grid-arrival">
														<figure>		
															<a href="single.html">
																<div class="grid-img">
																	<img  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/p14.jpg" class="img-responsive" alt="">
																</div>
																<div class="grid-img">
																	<img  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/p13.jpg" class="img-responsive"  alt="">
																</div>			
															</a>		
														</figure>	
													</div>
													<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>
													<div class="women">
														<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
														<span class="size">XL / XXL / S </span>
														<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
														<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
													</div>
												</div>
											</div>
											<div class="col-md-3 cap-left simpleCart_shelfItem">
												<div class="grid-arr">
													<div  class="grid-arrival">
														<figure>		
															<a href="single.html">
																<div class="grid-img">
																	<img  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/p15.jpg" class="img-responsive" alt="">
																</div>
																<div class="grid-img">
																	<img  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/p16.jpg" class="img-responsive"  alt="">
																</div>			
															</a>		
														</figure>	
													</div>
													<div class="ribben">
														<p>NEW</p>
													</div>
													<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>
													<div class="women">
														<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
														<span class="size">XL / XXL / S </span>
														<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
														<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
													</div>
												</div>
											</div>
											<div class="col-md-3 cap-left simpleCart_shelfItem">
												<div class="grid-arr">
													<div  class="grid-arrival">
														<figure>		
															<a href="single.html">
																<div class="grid-img">
																	<img  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/p18.jpg" class="img-responsive" alt="">
																</div>
																<div class="grid-img">
																	<img  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/p17.jpg" class="img-responsive"  alt="">
																</div>			
															</a>		
														</figure>	
													</div>
													<div class="ribben1">
														<p>SALE</p>
													</div>
													<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>
													<div class="women">
														<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
														<span class="size">XL / XXL / S </span>
														<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
														<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
													</div>
												</div>
											</div>
											<div class="col-md-3 cap-left simpleCart_shelfItem">
												<div class="grid-arr">
													<div  class="grid-arrival">
														<figure>		
															<a href="single.html">
																<div class="grid-img">
																	<img  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/p20.jpg" class="img-responsive" alt="">
																</div>
																<div class="grid-img">
																	<img  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/p19.jpg" class="img-responsive"  alt="">
																</div>			
															</a>		
														</figure>	
													</div>
													<div class="ribben">
														<p>-20%</p>
													</div>
													<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>
													<div class="women">
														<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
														<span class="size">XL / XXL / S </span>
														<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
														<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
													</div>
												</div>
											</div>
											<div class="clearfix"></div>
										</div>
									</li>
									<li>	 
										<div class="caption">
											<div class="col-md-3 cap-left simpleCart_shelfItem">
												<div class="grid-arr">
													<div  class="grid-arrival">
														<figure>		
															<a href="single.html">
																<div class="grid-img">
																	<img  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/p21.jpg" class="img-responsive" alt="">
																</div>
																<div class="grid-img">
																	<img  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/p22.jpg" class="img-responsive"  alt="">
																</div>			
															</a>		
														</figure>	
													</div>
													<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>
													<div class="women">
														<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
														<span class="size">XL / XXL / S </span>
														<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
														<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
													</div>
												</div>
											</div>
											<div class="col-md-3 cap-left simpleCart_shelfItem">
												<div class="grid-arr">
													<div  class="grid-arrival">
														<figure>		
															<a href="single.html">
																<div class="grid-img">
																	<img  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/p24.jpg" class="img-responsive" alt="">
																</div>
																<div class="grid-img">
																	<img  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/p23.jpg" class="img-responsive"  alt="">
																</div>			
															</a>		
														</figure>	
													</div>
													<div class="ribben">
														<p>NEW</p>
													</div>
													<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>
													<div class="women">
														<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
														<span class="size">XL / XXL / S </span>
														<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
														<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
													</div>
												</div>
											</div>
											<div class="col-md-3 cap-left simpleCart_shelfItem">
												<div class="grid-arr">
													<div  class="grid-arrival">
														<figure>		
															<a href="single.html">
																<div class="grid-img">
																	<img  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/p26.jpg" class="img-responsive" alt="">
																</div>
																<div class="grid-img">
																	<img  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/p25.jpg" class="img-responsive"  alt="">
																</div>			
															</a>		
														</figure>	
													</div>
													<div class="ribben">
														<p>-75%</p>
													</div>
													<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>
													<div class="women">
														<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
														<span class="size">XL / XXL / S </span>
														<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
														<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
													</div>
												</div>
											</div>
											<div class="col-md-3 cap-left simpleCart_shelfItem">
												<div class="grid-arr">
													<div  class="grid-arrival">
														<figure>		
															<a href="single.html">
																<div class="grid-img">
																	<img  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/p10.jpg" class="img-responsive" alt="">
																</div>
																<div class="grid-img">
																	<img  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/p9.jpg" class="img-responsive"  alt="">
																</div>			
															</a>		
														</figure>	
													</div>
													<div class="ribben">
														<p>NEW</p>
													</div>
													<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>
													<div class="women">
														<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
														<span class="size">XL / XXL / S </span>
														<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
														<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
													</div>
												</div>
											</div>
											<div class="clearfix"></div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			<!--Products-->
			<div class="latest-w3">
				<div class="container">
					<h3 class="tittle1">Latest Fashion Trends</h3>
					<div class="latest-grids">
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/l1.jpg" class="img-responsive"  alt="">
								<div class="latest-text">
									<h4>Men</h4>
								</div>
								<div class="latest-text2 hvr-sweep-to-top">
									<h4>-50%</h4>
								</div>
							</div>
						</div>
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/l2.jpg" class="img-responsive"  alt="">
								<div class="latest-text">
									<h4>Shoes</h4>
								</div>
								<div class="latest-text2 hvr-sweep-to-top">
									<h4>-20%</h4>
								</div>
							</div>
						</div>
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/l3.jpg" class="img-responsive"  alt="">
								<div class="latest-text">
									<h4>Women</h4>
								</div>
								<div class="latest-text2 hvr-sweep-to-top">
									<h4>-50%</h4>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="latest-grids">
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/l4.jpg" class="img-responsive"  alt="">
								<div class="latest-text">
									<h4>Watch</h4>
								</div>
								<div class="latest-text2 hvr-sweep-to-top">
									<h4>-45%</h4>
								</div>
							</div>
						</div>
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/l5.jpg" class="img-responsive"  alt="">
								<div class="latest-text">
									<h4>Bag</h4>
								</div>
								<div class="latest-text2 hvr-sweep-to-top">
									<h4>-10%</h4>
								</div>
							</div>
						</div>
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/l6.jpg" class="img-responsive"  alt="">
								<div class="latest-text">
									<h4>Cameras</h4>
								</div>
								<div class="latest-text2 hvr-sweep-to-top">
									<h4>-30%</h4>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
				<div class="new-arrivals-w3agile">
					<div class="container">
						<h3 class="tittle1">Best Sellers</h3>
						<div class="arrivals-grids">
							<div class="col-md-3 arrival-grid simpleCart_shelfItem">
								<div class="grid-arr">
									<div  class="grid-arrival">
										<figure>		
											<a href="single.html">
												<div class="grid-img">
													<img  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/p28.jpg" class="img-responsive" alt="">
												</div>
												<div class="grid-img">
													<img  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/p27.jpg" class="img-responsive"  alt="">
												</div>			
											</a>		
										</figure>	
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
									<div class="ribben1">
										<p>SALE</p>
									</div>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<div class="women">
										<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
										<span class="size">XL / XXL / S </span>
										<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
										<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
									</div>
								</div>
							</div>
							<div class="col-md-3 arrival-grid simpleCart_shelfItem">
								<div class="grid-arr">
									<div  class="grid-arrival">
										<figure>		
											<a href="single.html">
												<div class="grid-img">
													<img  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/p30.jpg" class="img-responsive" alt="">
												</div>
												<div class="grid-img">
													<img  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/p29.jpg" class="img-responsive"  alt="">
												</div>			
											</a>		
										</figure>	
									</div>
									<div class="ribben2">
										<p>OUT OF STOCK</p>
									</div>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<div class="women">
										<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
										<span class="size">XL / XXL / S </span>
										<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
										<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
									</div>
								</div>
							</div>
							<div class="col-md-3 arrival-grid simpleCart_shelfItem">
								<div class="grid-arr">
									<div  class="grid-arrival">
										<figure>		
											<a href="single.html">
												<div class="grid-img">
													<img  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/s2.jpg" class="img-responsive" alt="">
												</div>
												<div class="grid-img">
													<img  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/s1.jpg" class="img-responsive"  alt="">
												</div>			
											</a>		
										</figure>	
									</div>
									<div class="ribben1">
										<p>SALE</p>
									</div>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<div class="women">
										<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
										<span class="size">XL / XXL / S </span>
										<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
										<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
									</div>
								</div>
							</div>
							<div class="col-md-3 arrival-grid simpleCart_shelfItem">
								<div class="grid-arr">
									<div  class="grid-arrival">
										<figure>		
											<a href="single.html">
												<div class="grid-img">
													<img  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/s4.jpg" class="img-responsive" alt="">
												</div>
												<div class="grid-img">
													<img  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/s3.jpg" class="img-responsive"  alt="">
												</div>			
											</a>		
										</figure>	
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<div class="women">
										<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
										<span class="size">XL / XXL / S </span>
										<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
										<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			<!--new-arrivals-->
		</div>
		<!--content-->

<?php
get_footer();
?>