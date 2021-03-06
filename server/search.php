<?php get_header(); ?>

	<main>
		<!-- BEGIN: Filters -->
		<div class="container-bar">
			<div class="container pt-4 pb-4">
				<div class="filter">
					<a href="#" class="btn btn-outline-primary filter__link">Destination</a>
					<div class="filter__modal">
						<form action="">
							<div class="form-group form-check">
						    <input type="checkbox" class="form-check-input" id="destiny_1">
						    <label class="form-check-label" for="destiny_1">Cancún</label>
						  </div>
							<div class="form-group form-check">
						    <input type="checkbox" class="form-check-input" id="destiny_2">
						    <label class="form-check-label" for="destiny_2">Playa del Carmen</label>
						  </div>
							<div class="form-group form-check">
						    <input type="checkbox" class="form-check-input" id="destiny_3">
						    <label class="form-check-label" for="destiny_3">Ciudad de México</label>
						  </div>
							<div class="form-group form-check">
						    <input type="checkbox" class="form-check-input" id="destiny_4">
						    <label class="form-check-label" for="destiny_4">Monterrey</label>
						  </div>
							<div class="form-group form-check">
						    <input type="checkbox" class="form-check-input" id="destiny_5">
						    <label class="form-check-label" for="destiny_5">Puebla</label>
						  </div>
							<div class="row">
								<div class="col"><a class="btn btn-link btn-link--off filter__modal-close">Cancel</a></div>
								<div class="col text-right"><button type="submit" class="btn btn-link">Apply</button></div>
							</div>
						</form>
					</div>
				</div>
				<div class="filter">
					<a href="#" class="btn btn-outline-primary filter__link">Category</a>
				</div>
				<div class="filter">
					<a href="#" class="btn btn-outline-primary filter__link">Price</a>
				</div>
				<div class="filter">
					<a href="#" class="btn btn-outline-primary filter__link">Availability</a>
				</div>
				<div class="filter">
					<a href="#" class="btn btn-outline-primary filter__link">Sort by</a>
				</div>
			</div>
		</div>
		<!-- END: Filters -->
		<!-- BEGIN: Results List -->
		<div class="results-list">
			<div class="container pt-5">
				<h2 class="mb-3"><?php echo sprintf( __( 'No experiences found', 'html5blank' ), $wp_query->found_posts ); ?></h2>
				<div class="card-deck">
					<?php wc_get_template_part('content', 'product'); ?>
					<?php get_template_part('pagination'); ?>
				</div>										
			</div>
		</div>
		<!-- END: Results List -->
	</main>

<?php get_footer(); ?>
