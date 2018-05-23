<?php 
if (have_posts()): while (have_posts()) : the_post();
 ?>

	<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class('card'); ?> >
			<div class="list-item__thumbnail-wrapper">
				<a href="#" class="list-item__thumbnail">
					<img src="<?php the_post_thumbnail_url(); ?>" class="img-fluid" alt="<?php the_title(); ?>">
					<span class="list-item__cat">Playa del Carmen</span>
					<svg class="list-item__cat-icon icon"><use xlink:href="<?php echo  get_template_directory_uri() ?>/img/symbol-defs.svg#icon-play-rounded"></use></svg>
				</a>
				<div class="list-item__actions">
					<a href="#" class="list-item__actions-item">
						<svg class="list-item__actions-icon icon"><use xlink:href="<?php echo  get_template_directory_uri() ?>/img/symbol-defs.svg#icon-share"></use></svg>
					</a>
					<a href="#" class="list-item__actions-item">
						<svg class="list-item__actions-icon icon"><use xlink:href="<?php echo  get_template_directory_uri() ?>/img/symbol-defs.svg#icon-love"></use></svg>
					</a>
				</div>
			</div>
			<div class="card-body">
				<h5 class="card-title"><?php the_title(); ?></h5>
				<div class="list-item__meta mb-4">
					<div class="list-item__meta-item">
						<svg class="rating rating--active list-item__meta-icon icon"><use xlink:href="<?php echo  get_template_directory_uri() ?>/img/symbol-defs.svg#icon-star"></use></svg>
						<svg class="rating rating--active list-item__meta-icon icon"><use xlink:href="<?php echo  get_template_directory_uri() ?>/img/symbol-defs.svg#icon-star"></use></svg>
						<svg class="rating rating--active list-item__meta-icon icon"><use xlink:href="<?php echo  get_template_directory_uri() ?>/img/symbol-defs.svg#icon-star"></use></svg>
						<svg class="rating rating--active list-item__meta-icon icon"><use xlink:href="<?php echo  get_template_directory_uri() ?>/img/symbol-defs.svg#icon-star"></use></svg>
						<svg class="rating list-item__meta-icon icon"><use xlink:href="<?php echo  get_template_directory_uri() ?>/img/symbol-defs.svg#icon-star"></use></svg>
					</div>
					|
					<div class="list-item__meta-item">265 booked</div>
				</div>
			</div>
			<div class="card-footer">
				<div class="row">
					<div class="col-sm"><h4 class="mb-1">$187 USD</h4></div>
					<div class="col-sm text-right"><p class="list-price mb-0">$205 USD</p></div>
				</div>
				<div class="row align-items-end">
					<div class="col-sm"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">BOOK NOW</a></div>
					<div class="col-sm text-right"><p class="mb-0 small">Available now</p></div>
				</div>
			</div>
		</div>
	<?php endif; ?>

<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
