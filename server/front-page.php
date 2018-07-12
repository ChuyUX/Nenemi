<?php get_header(); ?>

	<main role="main">
		<!-- BEGIN: Main Stage -->
		<div class="main-stage" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/dummy/banner-1280x720-1.jpg);">
			<div class="container">
				<div class="row align-items-center">
					<div class="col"></div>
			    <div class="col-md-9 text-center">
			      <h1 class="main-stage__title"><?php _e('DISCOVER AMAZING EXPERIENCES', 'nenemi_front-page_page'); ?></h1>
				  <?php get_search_form(); ?>
			    </div>
			    <div class="col"></div>
				</div>
				<div class="main-stage__nav">
					<?php _e('See more', 'nenemi_button_element');?><br>
					<a href="#" class="main-stage__nav-item">
						<svg class="main-stage__nav-icon icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-arrow-down-rounded"></use></svg>
					</a>
				</div>
			</div>
		</div>
		<!-- END: Main Stage -->
		<!-- BEGIN: Top Destinations -->
		<div class="pt-5 pb-5">
			<div class="container">
				<h2 class="mb-4"><?php _e('Top destinations', 'nenemi_front-page_page'); ?></h2>
				<div class="posts-carousel js-destinations">
					<?php
					$args = array(
						'post_type'		=>	array('ciudad'),
						'posts_per_page' => -1
					);

					$query = new WP_Query($args);

					if($query->have_posts()) : while($query->have_posts()) : $query->the_post();
					?>
						<div class="posts-carousel__slide">
							<div class="posts-carousel__item">
								<a href="<?php the_permalink(); ?>">
								<?php 
								$attr = array(
								    'class' => "img-fluid",
								    'alt'   => get_the_title()
								);
								the_post_thumbnail('home-thumbnail',$attr); ?>
									<div class="posts-carousel__item-content">
										<h6 class="text-white mb-0"><?php the_title(); ?></h6>
									</div>
								</a>
							</div>
						</div>
					<?php endwhile;
					endif; ?>
				</div>
				<!--
				<div class="text-center">
					<a href="#" class="btn btn-primary"><?php _e('SEE ALL DESTINATIONS', 'nenemi_button_element'); ?></a>
				</div>
				-->
			</div>
		</div>
		<!-- END: Top Destinations -->
		<!-- BEGIN: Popular Activities -->
		<div class="bg-cover pt-5 pb-5" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/stage-1280x861-1.jpg);">
			<div class="container">
				<h2 class="text-white mb-3"><?php _e('Popular Activities', 'nenemi_front-page_page'); ?></h2>
				<h4 class="text-white mb-3">We have no popular activities for the moment.</h4>
				<!--
				<div class="list-item">
					<div class="list-item__thumbnail-wrapper">
						<a href="#" class="list-item__thumbnail">
							<img src="<?php echo get_template_directory_uri(); ?>/img/dummy/thumbnail-300x169-1@2x.jpg" class="img-fluid" alt="">
							<span class="list-item__cat">Playa del Carmen</span>
							<svg class="list-item__cat-icon icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-play-rounded"></use></svg>
						</a>
						<div class="list-item__actions">
							<a href="#" class="list-item__actions-item">
								<svg class="list-item__actions-icon icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-share"></use></svg>
							</a>
							<a href="#" class="list-item__actions-item">
								<svg class="list-item__actions-icon icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-love"></use></svg>
							</a>
						</div>
					</div>
					<div class="list-item__content">
						<h4 class="text-white">Adrenalina Xcaret</h4>
						<p class="text-white">Live a complete experience where you can enjoy Xcaret’s beautiful landscapes, swimming in underground rivers, and delighting with a buffet meal during your visit.</p>
						<div class="list-item__meta text-white">
							<div class="list-item__meta-item">
								<svg class="rating rating--active list-item__meta-icon icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-star"></use></svg>
								<svg class="rating rating--active list-item__meta-icon icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-star"></use></svg>
								<svg class="rating rating--active list-item__meta-icon icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-star"></use></svg>
								<svg class="rating rating--active list-item__meta-icon icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-star"></use></svg>
								<svg class="rating list-item__meta-icon icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-star"></use></svg>
							</div>
							|
							<div class="list-item__meta-item">
								<svg class="list-item__meta-icon icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-message"></use></svg>
								142 reviews
							</div>
							|
							<div class="list-item__meta-item">265 booked</div>
						</div>
					</div>
					<div class="list-item__submit">
						<h3 class="text-white mb-2">$209 USD</h3>
						<a href="#" class="btn btn-secondary">BOOK NOW</a>
					</div>
				</div>
				<div class="list-item">
					<div class="list-item__thumbnail-wrapper">
						<a href="#" class="list-item__thumbnail">
							<img src="<?php echo get_template_directory_uri(); ?>/img/dummy/thumbnail-300x169-2@2x.jpg" class="img-fluid" alt="">
							<span class="list-item__cat">Mexico City</span>
							<svg class="list-item__cat-icon icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-play-rounded"></use></svg>
						</a>
						<div class="list-item__actions">
							<a href="#" class="list-item__actions-item">
								<svg class="list-item__actions-icon icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-share"></use></svg>
							</a>
							<a href="#" class="list-item__actions-item">
								<svg class="list-item__actions-icon icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-love"></use></svg>
							</a>
						</div>
					</div>
					<div class="list-item__content">
						<h4 class="text-white">Historical centre tour of Mexico City</h4>
						<p class="text-white">Come and dig deep into the origins of Mexico City. On our Historical Center Tour we will go through the almost one thousand years of Mexico City’s history in a fun and entertaining way.</p>
						<div class="list-item__meta text-white">
							<div class="list-item__meta-item">
								<svg class="rating rating--active list-item__meta-icon icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-star"></use></svg>
								<svg class="rating rating--active list-item__meta-icon icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-star"></use></svg>
								<svg class="rating rating--active list-item__meta-icon icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-star"></use></svg>
								<svg class="rating rating--active list-item__meta-icon icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-star"></use></svg>
								<svg class="rating list-item__meta-icon icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-star"></use></svg>
							</div>
							|
							<div class="list-item__meta-item">
								<svg class="list-item__meta-icon icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-message"></use></svg>
								142 reviews
							</div>
							|
							<div class="list-item__meta-item">265 booked</div>
						</div>
					</div>
					<div class="list-item__submit">
						<h3 class="text-white mb-2">$209 USD</h3>
						<a href="#" class="btn btn-secondary">BOOK NOW</a>
					</div>
				</div>
				<div class="list-item">
					<div class="list-item__thumbnail-wrapper">
						<a href="#" class="list-item__thumbnail">
							<img src="<?php echo get_template_directory_uri(); ?>/img/dummy/thumbnail-300x169-3@2x.jpg" class="img-fluid" alt="">
							<span class="list-item__cat">Los Cabos</span>
							<svg class="list-item__cat-icon icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-play-rounded"></use></svg>
						</a>
						<div class="list-item__actions">
							<a href="#" class="list-item__actions-item">
								<svg class="list-item__actions-icon icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-share"></use></svg>
							</a>
							<a href="#" class="list-item__actions-item">
								<svg class="list-item__actions-icon icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-love"></use></svg>
							</a>
						</div>
					</div>
					<div class="list-item__content">
						<h4 class="text-white">Los Cabos Whale Watching Cruise Including Breakfast</h4>
						<p class="text-white">Spot gray whales and other marine life on this 2-hour whale watching cruise from Cabo San Lucas. Sail past the dramatic El Arco rock formation and a colony of sea lions.</p>
						<div class="list-item__meta text-white">
							<div class="list-item__meta-item">
								<svg class="rating rating--active list-item__meta-icon icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-star"></use></svg>
								<svg class="rating rating--active list-item__meta-icon icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-star"></use></svg>
								<svg class="rating rating--active list-item__meta-icon icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-star"></use></svg>
								<svg class="rating rating--active list-item__meta-icon icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-star"></use></svg>
								<svg class="rating list-item__meta-icon icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-star"></use></svg>
							</div>
							|
							<div class="list-item__meta-item">
								<svg class="list-item__meta-icon icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-message"></use></svg>
								142 reviews
							</div>
							|
							<div class="list-item__meta-item">265 booked</div>
						</div>
					</div>
					<div class="list-item__submit">
						<h3 class="text-white mb-2">$209 USD</h3>
						<a href="#" class="btn btn-secondary">BOOK NOW</a>
					</div>
				</div>
				<div class="text-center pt-2">
					<a href="#" class="btn btn-primary">SEE ALL ACTIVITIES</a>
				</div>
				-->
			</div>
		</div>
		<!-- END: Popular Activities -->
		<!-- BEGIN: Recomended Activities -->
		<div class="pt-5 pb-5" style="overflow:hidden;">
			<div class="container">
				<h2><?php _e('Recommended Activities', 'nenemi_front-page_page'); ?></h2>
			</div>
			<div class="posts-carousel posts-carousel--centered js-centeritem">
				<div class="posts-carousel__slide">
					<div class="posts-carousel__item">
						<img src="<?php echo get_template_directory_uri(); ?>/img/dummy/thumbnail-920x518-1@2x.jpg" class="img-fluid" alt="Cancún">
						<div class="posts-carousel__item-cta">
							<h4 class="text-white mb-0">Live a complete experience where you can enjoy Xcaret’s beautiful landscapes</h4>
						</div>
						<div class="posts-carousel__item-submit">
							<h3 class="text-white mb-2">$209 USD</h3>
							<a href="#" class="btn btn-secondary">BOOK NOW</a>
						</div>
						<div class="posts-carousel__item-content">
							<h5 class="text-white mb-0">Cancún</h5>
							<p class="posts-carousel__item-text">265 booked</p>
							<div class="posts-carousel__item-actions">
								<div class="mb-2">
									<svg class="rating rating--active list-item__meta-icon icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-star"></use></svg>
									<svg class="rating rating--active list-item__meta-icon icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-star"></use></svg>
									<svg class="rating rating--active list-item__meta-icon icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-star"></use></svg>
									<svg class="rating rating--active list-item__meta-icon icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-star"></use></svg>
								</div>
								<div class="">
									<a href="#" class="posts-carousel__social">
										<svg class="posts-carousel__social-icon icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-share"></use></svg>
									</a>
									<a href="#" class="posts-carousel__social">
										<svg class="posts-carousel__social-icon icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-love"></use></svg>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="posts-carousel__slide">
					<div class="posts-carousel__item">
						<img src="<?php echo get_template_directory_uri(); ?>/img/dummy/thumbnail-920x518-1@2x.jpg" class="img-fluid" alt="Cancún">
						<div class="posts-carousel__item-content">
							<h5 class="text-white">Puerto Vallarta</h5>
						</div>
					</div>
				</div>
				<div class="posts-carousel__slide">
					<div class="posts-carousel__item">
						<img src="<?php echo get_template_directory_uri(); ?>/img/dummy/thumbnail-920x518-1@2x.jpg" class="img-fluid" alt="Cancún">
						<div class="posts-carousel__item-content">
							<h5 class="text-white">Mexico City</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END: Recomended Activities -->
		<!-- BEGIN: Blog -->
		<div class="blog-bg pt-5 pb-5" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/stage-1563x1900-1.jpg);">
			<div class="container">
				<hr class="mb-4">
				<h2><?php _e('Discover', 'nenemi_front-page_page'); ?></h2>
				<?php 
				$args = array(
					'posts_per_page' => 6,
				);

				$the_query = new WP_Query($args);

				$blog_posts_counter = 1;

				if ($the_query->have_posts()) : ?>
					<div class="row">
						<?php while($the_query->have_posts()) : 
							$the_query->the_post();

							if($blog_posts_counter == 1) : ?>
						
								<div class="col-md-6">
									<a href="<?php the_permalink(); ?>" class="grid-item" style="background-image:url(<?php the_post_thumbnail_url(); ?>);">
										<div class="grid-item__content">
											<h4 class="text-white mb-0"><?php the_title(); ?></h4>
											<div class="grid-item__meta">By: <?php the_author_nickname(); ?> | <?php the_date(); ?></div>
											<p class="grid-item__text"><?php echo get_the_excerpt(); ?></p>
										</div>
									</a>
								</div>

							<?php elseif($blog_posts_counter == 2 || $blog_posts_counter == 3) : ?>

								<div class="col-sm-6 col-md-3">
									<a href="<?php the_permalink(); ?>" class="grid-item" style="background-image:url(<?php the_post_thumbnail_url(); ?>);">
										<div class="grid-item__content">
											<h4 class="text-white mb-0"><?php the_title(); ?></h4>
											<div class="grid-item__meta">By: <?php the_author_nickname(); ?> | <?php the_date(); ?></div>
										</div>
									</a>
								</div>

								<?php if($blog_posts_counter == 3) : ?>
									</div>
									<div class="row">
										<div class="col-md">
								<?php endif; ?>

							<?php elseif($blog_posts_counter == 4 || $blog_posts_counter == 5) : ?>
					
								<a href="<?php the_permalink(); ?>" class="grid-item grid-item--half" style="background-image:url(<?php the_post_thumbnail_url(); ?>);">
									<div class="grid-item__content">
										<h4 class="text-white mb-0"><?php the_title(); ?></h4>
											<div class="grid-item__meta">By: <?php the_author_nickname(); ?> | <?php the_date(); ?></div>
									</div>
								</a>

							<?php elseif($blog_posts_counter == 6) : ?>

								</div>
								<div class="col-md">
									<a href="<?php the_permalink(); ?>" class="grid-item" style="background-image:url(<?php the_post_thumbnail_url(); ?>);">
										<div class="grid-item__content">
											<h4 class="text-white mb-0"><?php the_title(); ?></h4>
											<div class="grid-item__meta">By: <?php the_author_nickname(); ?> | <?php the_date(); ?></div>
											<p class="grid-item__text"><?php echo get_the_excerpt(); ?></p>
										</div>
									</a>
								</div>

							<?php endif; 

							$blog_posts_counter++; ?>

						<?php endwhile; ?>
					</div>
				<?php endif; ?>
				<div class="text-center pt-2">
					<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="btn btn-primary"><?php _e('DISCOVER MORE', 'nenemi_button_element'); ?></a>
				</div>
			</div>
		</div>
		<!-- END: Blog -->
	</main>

<?php get_footer(); ?>
