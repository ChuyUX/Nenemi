<?php
/**
 * Displayed when no products are found matching the current query
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/no-products-found.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

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
						<form method="get" >
						  	<input type="hidden" name="s" value="<?php echo($_GET['s']);?>">
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
	<?php endif; ?>
	<p class="woocommerce-info"><?php _e( 'No products were found matching your selection.', 'woocommerce' ); ?></p>
</main>
