<?php get_header();?>

<main>
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<!-- START: Hero Section -->
	<div class="hero" style="background-image:url(<?php the_post_thumbnail_url('full');?>);">
		<div class="container-fluid">
			<div class="row align-items-end hero__actions">
				<div class="col">
					<?php

					$galleryImages = get_field('gallery');

					?>
					<a href="<?php echo $galleryImages[0]['url'];?>" class="btn btn-sm btn-sm-icon btn-light js-gallery-item">
<<<<<<< HEAD
						<svg class="icon">
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-picture"></use>
=======
						<svg class="icon">
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-picture"></use>
						</svg>
						<span class="d-none d-sm-inline-block">View Photos</span>
					</a>
					<a href="<?php the_field('video');?>" class="btn btn-sm btn-sm-icon btn-light js-popup-youtube">
						<svg class="icon">
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-play-rounded"></use>
>>>>>>> 23ba5bba5aedfe2019502c2ccc89575c9bb37389
						</svg>
						<span class="d-none d-sm-inline-block"><?php _e('View Photos', 'nenemi_button_element'); ?></span>
					</a>
					<?php if(get_field('video')) : ?>
						<a href="<?php the_field('video');?>" class="btn btn-sm btn-sm-icon btn-light js-popup-youtube">
							<svg class="icon">
								<use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-play-rounded"></use>
							</svg>
							<span class="d-none d-sm-inline-block"><?php _e('Watch Video', 'nenemi_button_element'); ?></span>
						</a>
					<?php endif; ?>
				</div>
				<div class="col text-right">
					<div class="dropdown d-inline-block">
						<a href="#" class="btn btn-sm btn-sm-icon btn-light" data-toggle="dropdown">
							<svg class="icon">
								<use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-share"></use>
							</svg>
							<span class="d-none d-sm-inline-block"><?php _e('Share', 'nenemi_button_element'); ?></span>
						</a>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a href="#" class="dropdown-item" data-sharer="facebook" data-url="<?php the_permalink(); ?>">Facebook</a>
							<a href="#" class="dropdown-item" data-sharer="twitter" data-title="Checkout <?php the_title(); ?>!" data-url="<?php the_permalink(); ?>">Twitter</a>
						</div>
					</div>
					<!--<a href="#" class="btn btn-sm btn-sm-icon btn-light bg-white">
						<svg class="icon">
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-love"></use>
						</svg>
						<span class="d-none d-sm-inline-block"><?php _e('Add to favorites', 'nenemi_button_element'); ?></span>
					</a> -->
				</div>
			</div>
		</div>
		<div style="display:none;">
			<?php for($i=1; $i<count($galleryImages); $i++) : ?>
				<a href="<?php echo $galleryImages[$i]['url'];?>" class="js-gallery-item"></a>
			<?php endfor; ?>
		</div>
	</div>
	<!-- END: Hero Section -->

	<?php 
	$variations = $product->get_available_variations(); 

	//Find variation with lower price
	$lowest_price = 999999;
	foreach ($variations as $variation) {
		if($variation[display_price] < $lowest_price){
			$lowest_price = $variation[display_price];
			$lowest_regular_price = $variation[display_regular_price];
		}
	}
	?>

	<div class="bg-white pt-5 pb-5 border-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<h2><?php  the_title(); ?></h2>

					<!-- START: Mobile View -->
					<div class="d-block d-sm-none">
						<div class="row">
							<div class="col-5">
								<h4 class="mb-0  product_price"><?php wc_currency_display_text($lowest_price); ?></h4>
							</div>
							<div class="col-5">
								<p class="list-price mb-0 product_regular_price"><?php wc_currency_display_text($lowest_regular_price); ?></p>
							</div>
						</div>
						<div class="list-item__meta mb-3">
							<div class="list-item__meta-item">
								<?php wc_rating_star_markup(get_the_ID()); ?>
							</div>
							|
<<<<<<< HEAD
							<div class="list-item__meta-item"><?php echo get_post_meta( get_the_ID(), 'total_sales', true );?> <?php _e('booked', 'nenemi_button_element'); ?></div>
=======
							<div class="list-item__meta-item"><?php echo get_post_meta( get_the_ID(), 'total_sales', true );?> booked</div>
>>>>>>> 23ba5bba5aedfe2019502c2ccc89575c9bb37389
						</div>
						<hr>
						<div class="row">
							<div class="col">
								<ul class="font-weight-bold mb-0">
									<?php if(is_between_dates(get_field('schedule_start'), get_field('schedule_end'))) : ?>
<<<<<<< HEAD
										<li><?php _e('Available now', 'nenemi_button_element'); ?></li>
									<?php endif; ?>
									<?php if(get_field('instant_confirmation')) : ?>
										<li><?php _e('Instant confirmation', 'nenemi_button_element'); ?></li>
=======
										<li>Available now</li>
									<?php endif; ?>
									<?php if(get_field('instant_confirmation')) : ?>
										<li>Instant confirmation</li>
>>>>>>> 23ba5bba5aedfe2019502c2ccc89575c9bb37389
									<?php endif; ?>
								</ul>
							</div>
							<div class="col">
								<div class="font-weight-bold text-center">
									<a href="#">
										<?php _e('Get free credits', 'nenemi_button_element'); ?> 
										<svg class="icon small">
											<use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-arrow-right"></use>
										</svg>
									</a>
								</div>
							</div>
						</div>
						<hr>
					</div>
					<!-- END: Mobile View -->

					<div class="font-weight-bold mb-4">
						<?php the_content(); ?>
					</div>

					<!-- START: Features -->
<<<<<<< HEAD
					<?php
					if(get_field('features')) : 
						$features_chunks = array_chunk(get_field('features'), 3, true);

						if($features_chunks) : foreach ($features_chunks as $features) :
						?>
							<div class="row">
								<?php foreach($features as $feature) : ?>
									<div class="col-md-4">
										<div class="p-icon__item">
											<svg class="icon p-icon__icon">
												<use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-<?php echo $feature['value']?>"></use>
											</svg><?php echo $feature['label']?>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						<?php 
						endforeach;
						endif; 
=======
					<?php 
					$features_chunks = array_chunk(get_field('features'), 3, true);

					if($features_chunks) : foreach ($features_chunks as $features) :
					?>
						<div class="row">
							<?php foreach($features as $feature) : ?>
								<div class="col-md-4">
									<div class="p-icon__item">
										<svg class="icon p-icon__icon">
											<use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-<?php echo $feature['value']?>"></use>
										</svg><?php echo $feature['label']?>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					<?php 
					endforeach;
>>>>>>> 23ba5bba5aedfe2019502c2ccc89575c9bb37389
					endif; ?>
					<!-- END: Features -->
					
					<!-- START: Package Options Section -->	
					<hr class="mb-5">
					<div class="row">
						<div class="col-md-8">
							<h3 class="mb-3"><?php _e('Package options', 'nenemi_product_page'); ?></h3>
						</div>
						<div class="col-md-4 text-right">
							<!--
							<button class="btn btn-primary btn-sm mb-3 btn-block" data-toggle="datepicker">
								<svg class="icon">
									<use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-calendar"></use>
								</svg>
								Check availability
							</button>
							-->
						</div>
					</div>
					<div class="pckg-wrappper">
					<?php
					$panel_num = 1; 
					foreach ($variations as $key => $variation) :
					?>
						<div class="panel mb-3">
							<div class="panel__header">
								<div class="panel__header-col">
									<h5 class="mb-0"><?php echo $variation[attributes][attribute_paquetes]; ?></h5>
									<a href="#p<?php echo $panel_num?>_details" data-toggle="collapse" class="js-view-pckg">
<<<<<<< HEAD
										<?php _e('View package details', 'nenemi_product_page'); ?> 
=======
										View package details 
>>>>>>> 23ba5bba5aedfe2019502c2ccc89575c9bb37389
										<svg class="icon small">
											<use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-arrow-down"></use>
										</svg>
									</a>
								</div>
								<div class="panel__header-col">
									<div class="text-right">
										<h5 class="mb-0 package_price"><?php wc_currency_display_text($variation[display_price]); ?></h5>
										<p class="list-price mb-0 package_regular_price"><?php wc_currency_display_text($variation[display_regular_price]); ?></p>
									</div>
									<div class="ml-3">
<<<<<<< HEAD
										<a href="#" class="btn btn-sm btn-outline-primary js-select-pckg" data-variant-id="<?php echo $variation[variation_id]; ?>"><?php _e('SELECT', 'nenemi_button_element'); ?></a>
=======
										<a href="#" class="btn btn-sm btn-outline-primary js-select-pckg" >SELECT</a>
>>>>>>> 23ba5bba5aedfe2019502c2ccc89575c9bb37389
									</div>
								</div>
							</div>
							<div class="panel__content">
								<div id="p<?php echo $panel_num?>_details" class="collapse pt-2">
									<p class="mb-0"><?php echo $variation[variation_description]; ?></p>
								</div>
								<div class="panel__content-select pt-2">
									<div class="row">
										<div class="col-sm-7">
											<div class="form-group">
<<<<<<< HEAD
												<label for="date"><?php _e('Select date', 'nenemi_product_page'); ?></label>
												<div class="input-group">
													<input type="text" class="form-control" name="pckg-date" id="pckg-date" data-toggle="datepicker_package">
=======
												<label for="date">Select date</label>
												<div class="input-group">
													<input type="text" class="form-control" name="date" id="date" data-toggle="datepicker_package">
>>>>>>> 23ba5bba5aedfe2019502c2ccc89575c9bb37389
													<div class="input-group-append">
														<span class="input-group-text" id="inputGroupPrepend">
															<svg class="icon">
																<use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-calendar"></use>
															</svg>
														</span>
													</div>
												</div>
											</div>
											<div class="form-group">
<<<<<<< HEAD
												<label for="quantity"><?php _e('Package Quantity', 'nenemi_product_page'); ?></label>
												<div class="input-group">
													<input type="number" class="form-control" name="pckg-quantity" id="pckg-quantity" min="1" value="1">
=======
												<label for="quantity">Package Quantity</label>
												<div class="input-group">
													<input type="number" class="form-control" name="quantity" id="quantity" min="0">
>>>>>>> 23ba5bba5aedfe2019502c2ccc89575c9bb37389
													<div class="input-group-append">
														<span class="input-group-text" id="inputGroupPrepend">
															<svg class="icon">
																<use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-traveler"></use>
															</svg>
														</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php 
					$panel_num++;
					endforeach; ?>
					</div>
					<!-- END: Package Options Section -->

					<!-- START: About Information -->
					<hr class="mt-5 mb-5">
					<h3 class="mb-3"><?php _e('About credits', 'nenemi_product_page'); ?></h3>
					<div class="font-weight-bold">
						<?php the_field('about');?>
					</div>
					<hr class="mt-5 mb-5">
<<<<<<< HEAD
					<h3 class="mb-3"><?php _e('Activity policy', 'nenemi_product_page'); ?></h3>
=======
					<h3 class="mb-3">Activity policy</h3>
>>>>>>> 23ba5bba5aedfe2019502c2ccc89575c9bb37389
					<div class="font-weight-bold">
						<?php the_field('policy');?>
					</div>
					<hr class="mt-5 mb-5">
					<h3 class="mb-3"><?php _e('Cancelation policy', 'nenemi_product_page'); ?></h3>
					<div class="font-weight-bold">
						<?php the_field('cancel_policy');?>
					</div>
					<hr class="mt-5 mb-5">
					<h3 class="mb-3"><?php _e('Location map', 'nenemi_product_page'); ?></h3>
					<div class="embed-responsive embed-responsive-4by3">
						<?php the_field('location'); ?>
					</div>
					<!-- END: About Information -->

				</div>

				<div class="col-md-4">
<<<<<<< HEAD
					<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" >
						<div class="fixed-nav d-block d-sm-none">
							<button type="submit" class="btn btn-secondary btn-block mb-0 btn-booknow"><?php _e('BOOK NOW', 'nenemi_button_element'); ?></button>
						</div>

						<!-- START: Side Bar -->
						<div class="sticky-scroll-box d-none d-sm-block">
							<div class="panel mb-3">
								<div class="panel__header">
									<div class="panel__header-item">
										<h4 class="mb-0 product_price"><?php wc_currency_display_text($lowest_price); ?></h4>
									</div>
									<div class="panel__header-item">
										<p class="list-price mb-0  product_regular_price"><?php wc_currency_display_text($lowest_regular_price); ?></p>
									</div>
								</div>
								<hr>
								<div class="list-item__meta mb-3">
									<div class="list-item__meta-item">
										<div class="yotpo bottomLine" style="margin-bottom: 0" data-product-id="<?php echo get_the_ID(); ?>"></div>
									</div>
									|
									<div class="list-item__meta-item"><?php echo get_post_meta( get_the_ID(), 'total_sales', true );?> <?php _e('booked', 'nenemi_button_element'); ?></div>
								</div>
								<hr>
								<button type="submit" class="btn btn-secondary btn-block mb-3 btn-booknow"><?php _e('BOOK NOW', 'nenemi_button_element'); ?></button>
								<ul class="font-weight-bold">
									<?php if(is_between_dates(get_field('schedule_start'), get_field('schedule_end'))) : ?>
										<li><?php _e('Available now', 'nenemi_button_element'); ?></li>
									<?php endif; ?>
									<?php if(get_field('instant_confirmation')) : ?>
											<li><?php _e('Instant confirmation', 'nenemi_button_element'); ?></li>
									<?php endif; ?>
								</ul>
								<hr>
								<div class="font-weight-bold text-center">
									<a href="#">
										<?php _e('Get free credits', 'nenemi_button_element'); ?> 
										<svg class="icon small">
											<use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-arrow-right"></use>
										</svg>
									</a>
								</div>
							</div>
							<div class="panel" id="first-review-panel">
								<div class="review border-bottom-0 pb-0 mb-0">
									<div class="yotpo">
										<div class="yotpo-review" id="featured-review">
											<div class="yotpo-header"></div>
											<div class="yotpo-main"></div>
										</div>
=======
					<div class="fixed-nav d-block d-sm-none">
						<a href="#" class="btn btn-secondary btn-block mb-0">BOOK NOW</a>
					</div>

					<!-- START: Side Bar -->
					<div class="sticky-scroll-box d-none d-sm-block">
						<div class="panel mb-3">
							<div class="panel__header">
								<div class="panel__header-item">
									<h4 class="mb-0 product_price"><?php wc_currency_display_text($lowest_price); ?></h4>
								</div>
								<div class="panel__header-item">
									<p class="list-price mb-0  product_regular_price"><?php wc_currency_display_text($lowest_regular_price); ?></p>
								</div>
							</div>
							<hr>
							<div class="list-item__meta mb-3">
								<div class="list-item__meta-item">
									<div class="yotpo bottomLine" style="margin-bottom: 0" data-product-id="<?php echo get_the_ID(); ?>"></div>
								</div>
								|
								<div class="list-item__meta-item"><?php echo get_post_meta( get_the_ID(), 'total_sales', true );?> booked</div>
							</div>
							<hr>
							<a href="#" class="btn btn-secondary btn-block mb-3">BOOK NOW</a>
							<ul class="font-weight-bold">
								<?php if(is_between_dates(get_field('schedule_start'), get_field('schedule_end'))) : ?>
									<li>Available now</li>
								<?php endif; ?>
								<?php if(get_field('instant_confirmation')) : ?>
										<li>Instant confirmation</li>
								<?php endif; ?>
							</ul>
							<hr>
							<div class="font-weight-bold text-center">
								<a href="#">
									Get free credits 
									<svg class="icon small">
										<use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-arrow-right"></use>
									</svg>
								</a>
							</div>
						</div>
						<div class="panel">
							<div class="review border-bottom-0 pb-0 mb-0">
								<div class="review__header mb-0">
									<img src="<?php echo get_template_directory_uri();?>/img/dummy/review-avatar-108x108.jpg" class="review__thumbnail" alt="Dae-Jung Kong">
									<div class="review__meta">
										<h6 class="mb-0"> </h6>
										<p class="mb-0 small"></p>
										<div class="list-item__meta-item pl-0"></div>
>>>>>>> 23ba5bba5aedfe2019502c2ccc89575c9bb37389
									</div>
								</div>
								<hr>
								<div class="font-weight-bold text-center">
									<a href="#reviews" class="scroll-to">
										<?php _e('View More Reviews', 'nenemi_product_page'); ?> 
										<svg class="icon small">
											<use xlink:href="<?php echo get_template_directory_uri();?>/img/symbol-defs.svg#icon-arrow-down"></use>
										</svg>
									</a>
								</div>
							</div>
<<<<<<< HEAD
						</div>
						<!-- END: Side Bar -->

						<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
						<input type="hidden" id="product_id" name="product_id" value="<?php echo get_the_ID(); ?>">
						<input type="hidden" id="variation_id" name="variation_id" value="<?php echo $variations[0][variation_id]; ?>">
						<input type="hidden" id="quantity" name="quantity" value="1">
						<input type="hidden" id="date" name="date" >
					</form>
=======
							<hr>
							<div class="font-weight-bold text-center">
								<a href="#reviews" class="scroll-to">
									View More Reviews 
									<svg class="icon small">
										<use xlink:href="<?php echo get_template_directory_uri();?>/img/symbol-defs.svg#icon-arrow-down"></use>
									</svg>
								</a>
							</div>
						</div>
					</div>
					<!-- END: Side Bar -->

>>>>>>> 23ba5bba5aedfe2019502c2ccc89575c9bb37389
				</div>
			</div>
		</div>
	</div>

	<!-- BEGIN: Reviews -->
	<div id="reviews" class="pt-5 pb-5 border-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
<<<<<<< HEAD
					<h3 class="mb-3"><?php _e('Reviews', 'nenemi_product_page'); ?></h3>
=======
					<h3 class="mb-3">Reviews</h3>
>>>>>>> 23ba5bba5aedfe2019502c2ccc89575c9bb37389
					<?php wc_yotpo_show_widget(); ?>
				</div>
			</div>
		</div>
	</div>
	<!-- END: Reviews -->
	
	<!-- BEGIN: FAQs -->
	<div class="bg-white pt-5 pb-5 border-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<h3 class="mb-3"><?php _e("FAQ's", 'nenemi_product_page'); ?></h3>
					<div id="accordion" class="accordion">
						<?php 
						if(have_rows('faqs')) :
							$colCounter = 1; 
							while(have_rows('faqs')) : the_row(); ?>

								<div class="card">
									<div class="card-header">
										<button class="accordion__btn accordion__btn--small" data-toggle="collapse" data-target="#collapse<?php echo $colCounter;?>" aria-expanded="<?php echo ($colCounter == 1 ? 'true' : 'false');?>" aria-controls="collapse<?php echo $colCounter;?>">
										<span class="accordion__btn-text"><?php the_sub_field('question');?></span>
										</button>
									</div>
									<div id="collapse<?php echo $colCounter;?>" class="collapse <?php echo ($colCounter == 1 ? 'show' : '');?>" data-parent="#accordion">
										<div class="card-body">
											<p><?php the_sub_field('answer');?></p>
										</div>
									</div>
								</div>

								<?php 
								$colCounter++;
							endwhile;
						endif;?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END: FAQs --> 

	

	<!-- BEGIN: Related Posts -->
	<div class="container pt-5 pb-3">
<<<<<<< HEAD
		<h3 class="mb-3"><?php _e('Check these out similar listings too!', 'nenemi_product_page'); ?></h3>
		<?php 
		$related_products = wc_get_related_products(get_the_ID(), 3);

		$args = array(
			'post_type'	=>	array('product'),
			'post__in'	=>	$related_products
		);

		$query = new WP_Query($args);

		if($query->have_posts()) : ?>
			<div class="card-deck">
				<?php while($query->have_posts()) : $query->the_post();
					get_template_part('product_card');
				endwhile; ?>
			</div>
		<?php else : ?>
			<h4 class="mb-3"><?php _e("What a an unique experience! We didn't find any related activities.", 'nenemi_product_page'); ?></h4>
		<?php
		endif;
		wp_reset_query();
		?>
=======
		<h3 class="mb-3">Check these out similar listings too!</h3>
		<div class="card-deck">
			<?php 
			$related_products = wc_get_related_products(get_the_ID(), 3);

			$args = array(
				'post_type'	=>	array('product'),
				'post__in'	=>	$related_products
			);

			$query = new WP_Query($args);

			if($query->have_posts()) : while($query->have_posts()) : $query->the_post();
				get_template_part('product_card');
			endwhile;
			endif;
			wp_reset_query();
			?>
		</div>
>>>>>>> 23ba5bba5aedfe2019502c2ccc89575c9bb37389
	</div>
	<!-- END: Related Posts -->

	<input type="hidden" id="startD" name="startD" value="<?php the_field('schedule_start'); ?>">
	<input type="hidden" id="endD" name="endD" value="<?php the_field('schedule_end'); ?>">

	<?php 
	endwhile;
	endif; ?>


</main>


<?php get_footer(); ?> 