<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

 get_header();

?>
	<main>

	<?php 
	$args = array(
		'post_type'		=>	array('ciudad'),
  		'suppress_filters' => false
	);
	$ciudades = new WP_Query( $args );
	$args = array(
	     'taxonomy'     => 'product_cat',
	     'hide_empty'   => 0,
  		 'suppress_filters' => false
	);
	$all_categories = get_categories( $args ); 
	?>

	<?php if ( have_posts() ): ?>
		<div class="container-bar">
			<div class="container pt-4 pb-4">
				<div class="filter">
					<a href="#" class="btn btn-outline-primary filter__link">Destination</a>
					<div class="filter__modal">
						<form method="get">
							<?php if($ciudades->have_posts()) : while($ciudades->have_posts()) : $ciudades->the_post(); ?>
								<div class="form-group form-check">
							    	<input type="checkbox" name="city" class="form-check-input" value="<?php the_ID(); ?>" id="<?php the_ID(); ?>">
							    	<label class="form-check-label" for="<?php the_ID(); ?>"><?php the_title(); ?></label>
							  	</div>
							<?php 
								endwhile;
								endif; 
							?>
							<div class="row">
								<div class="col"><a class="btn btn-link btn-link--off filter__modal-close">Cancel</a></div>
								<div class="col text-right"><button type="submit" class="btn btn-link">Apply</button></div>
							</div>
						</form>
					</div>
				</div>				
				<div class="filter">
					<a href="#" class="btn btn-outline-primary filter__link">Category</a>
					<div class="filter__modal">
						<form method="get">
							<?php foreach($all_categories as $cat): ?>
								<div class="form-group form-check">
							    	<input type="checkbox" name="producto_cat" class="form-check-input" value="<?php echo $cat->term_id ?>" id="<?php echo $cat->term_id ?>">
							    	<label class="form-check-label" for="<?php echo $cat->term_id ?>"><?php echo $cat->name ?></label>
							  	</div>
							<?php 
								endforeach;
							?>
							<div class="row">
								<div class="col"><a class="btn btn-link btn-link--off filter__modal-close">Cancel</a></div>
								<div class="col text-right"><button type="submit" class="btn btn-link">Apply</button></div>
							</div>
						</form>
					</div>
				</div>
				<div class="filter">
					<a href="#" class="btn btn-outline-primary filter__link">Price</a>
				</div>
				<div class="filter">
					<a href="#" class="btn btn-outline-primary filter__link">Availability</a>
				</div>		
				<?php do_action( 'woocommerce_before_shop_loop' ); ?>
			</div>
		</div>
		<div class="results-list">
						<?php 
						woocommerce_product_loop_start();

						if ( wc_get_loop_prop( 'total' ) ) {
							$i=0;
							while ( have_posts() ) {
								if ($i%3==0) {
									echo '</div><div class="card-deck">';
								}
								the_post();
								$i++;
								/**
								 * Hook: woocommerce_shop_loop.
								 *
								 * @hooked WC_Structured_Data::generate_product_data() - 10
								 */
								do_action( 'woocommerce_shop_loop' );

								wc_get_template_part( 'content', 'product' );
							}
						}

						woocommerce_product_loop_end();

						/**
						 * Hook: woocommerce_after_shop_loop.
						 *
						 * @hooked woocommerce_pagination - 10
						 */
						do_action( 'woocommerce_after_shop_loop' );
					else:
						/**
						 * Hook: woocommerce_no_products_found.
						 *
						 * @hooked wc_no_products_found - 10
						 */
						do_action( 'woocommerce_no_products_found' );
					endif; ?>
		</div>

	</main>

<?php 

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

get_footer();