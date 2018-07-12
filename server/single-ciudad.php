<?php get_header(); ?>
	
<main>
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
		<div class="hero mb-5" style="background-image:url(<?php the_post_thumbnail_url('full'); ?>);">
			<div class="container">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6 align-self-center text-center">
						<h1 class="text-white"><?php echo mb_strtoupper(get_the_title()); ?></h1>
						<div class="dropdown">
							<button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?php _e('Filter by Activity', 'nenemi_ciudad_page'); ?>
							</button>
							<div class="dropdown-menu" id="city-sections-dropdown">
								<a class="dropdown-item" href="#" name="hotels" ><?php _e('Hotels', 'nenemi_ciudad_page'); ?></a>
								<a class="dropdown-item" href="#" name="restaurants" ><?php _e('Restaurants', 'nenemi_ciudad_page'); ?></a>
								<a class="dropdown-item" href="#" name="stores" ><?php _e('Stores', 'nenemi_ciudad_page'); ?></a>
								<a class="dropdown-item" href="#" name="tours" ><?php _e('Tours and Workshops', 'nenemi_ciudad_page'); ?></a>
								<a class="dropdown-item" href="#" name="attractions" ><?php _e('Tourist Attractions', 'nenemi_ciudad_page'); ?></a>
								<a class="dropdown-item" href="#" name="transport" ><?php _e('Transport', 'nenemi_ciudad_page'); ?></a>
							</div>
						</div>
					</div>
					<?php
					// WEATHER API
					    $BASE_URL = "http://query.yahooapis.com/v1/public/yql";
					    $yql_query = 'select item.condition from weather.forecast where woeid in (select woeid from geo.places(1) where text="' . get_the_title() . ', mx") and u="c"';
					    $yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json";

					    // Make call with cURL
					    $session = curl_init($yql_query_url);
					    curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
					    $json = curl_exec($session);

					    // Convert JSON to PHP object
					    $weather_obj =  json_decode($json);
					    $condition = $weather_obj->query->results->channel->item->condition;

					    
					?>
					<div class="col-sm-3 align-self-end text-right">
						<p class="text-white font-weight-bold"><?php _e('Today', 'nenemi_ciudad_page'); ?>, <?php  echo date("F d"); ?> <i class="wi wi-yahoo-<?php echo $condition->code; ?>"></i> <?php echo $condition->temp; ?>°C</p>
					</div>
				</div>
			</div>
		</div>

		<!-- BEGIN: Hoteles -->
		<?php
		$args = array(
			'post_type'		=>	array('product'),
			'product_cat'	=>	'hoteles',
			'meta_key'		=>	'city',
			'meta_value'	=>	get_the_ID(),
			'posts_per_page' => -1
		);

		$query = new WP_Query($args);

		if($query->have_posts()) :
			$num_cards = 1; ?>
			<div class=" pb-3" id="hotels-section">
				<div class="container">
					<h2 class="mb-4"><?php _e('Discover the best hotels in', 'nenemi_ciudad_page'); ?> <?php the_title(); ?></h2>
						<div class="card-deck">
							<?php
							 while($query->have_posts()) : $query->the_post();
								if($num_cards % 4 == 0) : ?>
									</div>
									<div class="card-deck">
								<?php 
								endif;
								get_template_part('product_card');
								$num_cards++;
							endwhile; ?>						
						</div>			
				</div>
			</div>
		<?php endif; 
		wp_reset_query(); ?>
		<!-- END: Hoteles -->

		<!-- BEGIN: Restaurants -->
		<?php
		$args = array(
			'post_type'		=>	array('product'),
			'product_cat'	=>	'restaurantes',
			'meta_key'		=>	'city',
			'meta_value'	=>	get_the_ID(),
			'posts_per_page' => -1
		);

		$query = new WP_Query($args);

		if($query->have_posts()) : ?>
			<div class="pb-3" style="overflow:hidden;" id="restaurants-section">
				<div class="container">
					<h2 class="mb-4"><?php _e('Enjoy all the restaurants', 'nenemi_ciudad_page'); ?></h2>
				</div>
				<div class="posts-carousel posts-carousel--centered js-centeritem">
					<?php while($query->have_posts()) : 
						$query->the_post();
						get_template_part('product_carousel_card');
					endwhile; ?> 
				</div>
			</div>
		<?php endif;
		wp_reset_query(); ?>
		<!-- END: Restaurants -->

		<!-- BEGIN: Tiendas -->
		<?php
		$args = array(
			'post_type'		=>	array('product'),
			'product_cat'	=>	'tiendas',
			'meta_key'		=>	'city',
			'meta_value'	=>	get_the_ID(),
			'posts_per_page' => -1
		);

		$query = new WP_Query($args);

		if($query->have_posts()) : ?>
			<div class="pb-3" style="overflow:hidden;" id="stores-section">
				<div class="container">
					<h2 class="mb-4"><?php _e('Recomended stores by Nenemi', 'nenemi_ciudad_page'); ?></h2>
				</div>
				<div class="posts-carousel posts-carousel--centered js-centeritem">
					<?php while($query->have_posts()) : 
						$query->the_post();
						get_template_part('product_carousel_card');
					endwhile; ?> 
				</div>
			</div>
		<?php endif;
		wp_reset_query(); ?>		
		<!-- END: Tiendas -->

		<!-- BEGIN: Tours y talleres -->
		<?php
		$args = array(
			'post_type'		=>	array('product'),
			'product_cat'	=>	'tours-talleres',
			'meta_key'		=>	'city',
			'meta_value'	=>	get_the_ID(),
			'posts_per_page' => -1
		);

		$query = new WP_Query($args);

		if($query->have_posts()) : ?>
			<div class="bg-cover pt-5 pb-5 mb-5"  id="tours-section" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/stage-1280x861-1.jpg);">
				<div class="container">
					<h2 class="text-white mb-3"><?php _e('Tours and workshops for you', 'nenemi_ciudad_page'); ?></h2>
					<?php while($query->have_posts()) : 
						$query->the_post();
						get_template_part('product_list_card');
					endwhile; ?>
				</div>
			</div>
		<?php endif;
		wp_reset_query(); ?>
		<!-- END: Tours y Talleres -->

		<!-- BEGIN: Atracciones turtísticas -->
		<?php
		$args = array(
			'post_type'		=>	array('product'),
			'product_cat'	=>	'atracciones-turisticas',
			'meta_key'		=>	'city',
			'meta_value'	=>	get_the_ID(),
			'posts_per_page' => -1
		);

		$query = new WP_Query($args);

		if($query->have_posts()) : ?>
			<div class="container pb-5"  id="attractions-section">
				<h2 class="mb-4"><?php _e('More things to do', 'nenemi_ciudad_page'); ?></h2>
				<div class="simple-carousel js-simple-carousel">
					<?php while($query->have_posts()) : $query->the_post(); ?>
						<div class="simple-carousel__item">
							<?php get_template_part('product_card'); ?>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		<?php endif; 
		wp_reset_query(); ?>
		<!-- END: Atracciones turísticas -->

		<!-- BEGIN: Transporte -->
		<?php
		$args = array(
			'post_type'		=>	array('product'),
			'product_cat'	=>	'transporte',
			'meta_key'		=>	'city',
			'meta_value'	=>	get_the_ID(),
			'posts_per_page' => -1
		);

		$query = new WP_Query($args);

		if($query->have_posts()) : ?>
		<div class="container pb-5"  id="transport-section">
			<h2 class="mb-4"><?php _e('Get around easily', 'nenemi_ciudad_page'); ?></h2>
			<div class="simple-carousel js-simple-carousel">
				<?php while($query->have_posts()) : $query->the_post(); ?>
					<div class="simple-carousel__item">
						<?php get_template_part('product_card'); ?>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
		<?php endif; 
		wp_reset_query(); ?>
		<!-- END: Transporte -->

	<?php 
	endwhile;
	endif; ?>
</main>

<?php get_footer(); ?>