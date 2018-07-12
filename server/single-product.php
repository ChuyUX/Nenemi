<?php get_header();?>

<main>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<div class="hero" style="background-image:url(<?php the_post_thumbnail_url('full');?>);">
		<div class="container-fluid">
			<div class="row align-items-end hero__actions">
				<div class="col">
					<a href="../img/dummy/gallery-1200x800-1.jpg" class="btn btn-sm btn-sm-icon btn-light js-gallery-item">
						<svg class="icon">
							<use xlink:href="../img/symbol-defs.svg#icon-picture"></use>
						</svg>
						<span class="d-none d-sm-inline-block">View Photos</span>
					</a>
					<a href="https://www.youtube.com/watch?v=xg0N6hc_CxA" class="btn btn-sm btn-sm-icon btn-light js-popup-youtube">
						<svg class="icon">
							<use xlink:href="../img/symbol-defs.svg#icon-play-rounded"></use>
						</svg>
						<span class="d-none d-sm-inline-block">Watch Video</span>
					</a>
				</div>
				<div class="col text-right">
					<div class="dropdown d-inline-block">
						<a href="#" class="btn btn-sm btn-sm-icon btn-light" data-toggle="dropdown">
							<svg class="icon">
								<use xlink:href="../img/symbol-defs.svg#icon-share"></use>
							</svg>
							<span class="d-none d-sm-inline-block">Share</span>
						</a>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a href="#" class="dropdown-item" data-sharer="facebook" data-url="https://ellisonleao.github.io/sharer.js/">Facebook</a>
							<a href="#" class="dropdown-item" data-sharer="twitter" data-title="Checkout Sharer.js!" data-url="https://ellisonleao.github.io/sharer.js/">Twitter</a>
						</div>
					</div>
					<a href="#" class="btn btn-sm btn-sm-icon btn-light bg-white">
						<svg class="icon">
							<use xlink:href="../img/symbol-defs.svg#icon-love"></use>
						</svg>
						<span class="d-none d-sm-inline-block">Add to favorites</span>
					</a>
				</div>
			</div>
		</div>
		<div style="display:none;">
			<a href="../img/dummy/gallery-1200x800-2.jpg" class="js-gallery-item"></a>
		</div>
	</div>
	<div class="bg-white pt-5 pb-5 border-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<h2>Adrenalina Xcaret</h2>
					<div class="d-block d-sm-none">
						<div class="row">
							<div class="col-5">
								<h4 class="mb-0">$187 USD</h4>
							</div>
							<div class="col-5">
								<p class="list-price mb-0">$205 USD</p>
							</div>
						</div>
						<div class="list-item__meta mb-3">
							<div class="list-item__meta-item">
								<svg class="rating rating--active list-item__meta-icon icon">
									<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
								</svg>
								<svg class="rating rating--active list-item__meta-icon icon">
									<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
								</svg>
								<svg class="rating rating--active list-item__meta-icon icon">
									<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
								</svg>
								<svg class="rating rating--active list-item__meta-icon icon">
									<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
								</svg>
								<svg class="rating list-item__meta-icon icon">
									<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
								</svg>
							</div>
							|
							<div class="list-item__meta-item">265 booked</div>
						</div>
						<hr>
						<div class="row">
							<div class="col">
								<ul class="font-weight-bold mb-0">
									<li>Available now</li>
									<li>Instant confirmation</li>
								</ul>
							</div>
							<div class="col">
								<div class="font-weight-bold text-center">
									<a href="#">
										Get free credits 
										<svg class="icon small">
											<use xlink:href="../img/symbol-defs.svg#icon-arrow-right"></use>
										</svg>
									</a>
								</div>
							</div>
						</div>
						<hr>
					</div>
					<div class="font-weight-bold mb-1">
						<p>Live a complete experience where you can enjoy Xcaret’s beautiful landscapes, swimming in underground rivers, and delighting with a buffet meal during your visit. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</div>
					<div class="row mt-4">
						<div class="col-md-4">
							<div class="p-icon__item">
								<svg class="icon p-icon__icon">
									<use xlink:href="../img/symbol-defs.svg#icon-cancelation"></use>
								</svg>
								No cancelation
							</div>
						</div>
						<div class="col-md-4">
							<div class="p-icon__item">
								<svg class="icon p-icon__icon">
									<use xlink:href="../img/symbol-defs.svg#icon-voucher"></use>
								</svg>
								Show mobile or printed voucher
							</div>
						</div>
						<div class="col-md-4">
							<div class="p-icon__item">
								<svg class="icon p-icon__icon">
									<use xlink:href="../img/symbol-defs.svg#icon-language"></use>
								</svg>
								English / Chinese / Korean
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="p-icon__item">
								<svg class="icon p-icon__icon">
									<use xlink:href="../img/symbol-defs.svg#icon-traveler"></use>
								</svg>
								Minimum 1 Travelers To Book
							</div>
						</div>
						<div class="col-md-4">
							<div class="p-icon__item">
								<svg class="icon p-icon__icon">
									<use xlink:href="../img/symbol-defs.svg#icon-guide"></use>
								</svg>
								Meet Up With Guide
							</div>
						</div>
					</div>
					<hr class="mb-5">
					<div class="row">
						<div class="col-md-8">
							<h3 class="mb-3">Package options</h3>
						</div>
						<div class="col-md-4 text-right">
							<button class="btn btn-primary btn-sm mb-3 btn-block" data-toggle="datepicker">
								<svg class="icon">
									<use xlink:href="../img/symbol-defs.svg#icon-calendar"></use>
								</svg>
								Check availability
							</button>
						</div>
					</div>
					<div class="panel mb-3">
						<div class="panel__header">
							<div class="panel__header-col">
								<h5 class="mb-0">Paraxute</h5>
								<a href="#p1_details" data-toggle="collapse">
									View package details 
									<svg class="icon small">
										<use xlink:href="../img/symbol-defs.svg#icon-arrow-down"></use>
									</svg>
								</a>
							</div>
							<div class="panel__header-col">
								<div class="text-right">
									<h5 class="mb-0">$120 USD</h5>
									<p class="list-price mb-0">$205 USD</p>
								</div>
								<div class="ml-3">
									<a href="#p1_book" class="btn btn-sm btn-outline-primary" data-toggle="collapse">SELECT</a>
								</div>
							</div>
						</div>
						<div class="panel__content">
							<div id="p1_details" class="collapse pt-2">
								<p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, at excepturi, dolores reprehenderit doloremque aspernatur. Distinctio, veniam, fugiat. Voluptatem odit nulla optio cupiditate veniam asperiores harum voluptatibus consequatur neque, error.</p>
							</div>
							<div id="p1_book" class="collapse pt-2">
								<div class="row">
									<div class="col-sm-7">
										<div class="form-group">
											<label for="date">Select date</label>
											<div class="input-group">
												<input type="text" class="form-control" name="date" id="date" data-toggle="datepicker">
												<div class="input-group-append">
													<span class="input-group-text" id="inputGroupPrepend">
														<svg class="icon">
															<use xlink:href="../img/symbol-defs.svg#icon-calendar"></use>
														</svg>
													</span>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label for="quantity">Package Quantity</label>
											<div class="input-group">
												<input type="number" class="form-control" name="quantity" id="quantity" min="0">
												<div class="input-group-append">
													<span class="input-group-text" id="inputGroupPrepend">
														<svg class="icon">
															<use xlink:href="../img/symbol-defs.svg#icon-traveler"></use>
														</svg>
													</span>
												</div>
											</div>
										</div>
										<h6>Inclusive Of:</h6>
										<ul>
											<li>Admission to the chocolate "touch" zone with opportunities to hold real chocolate art objects</li>
											<li>Educational video lesson on chocolate</li>
											<li>Swiss chocolate tasting and sampling</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel mb-3">
						<div class="panel__header">
							<div class="panel__header-col">
								<h5 class="mb-0">Paraxute</h5>
								<a href="#p1_details" data-toggle="collapse">
									View package details 
									<svg class="icon small">
										<use xlink:href="../img/symbol-defs.svg#icon-arrow-down"></use>
									</svg>
								</a>
							</div>
							<div class="panel__header-col">
								<div class="text-right">
									<h5 class="mb-0">$120 USD</h5>
									<p class="list-price mb-0">$205 USD</p>
								</div>
								<div class="ml-3">
									<a href="#p1_book" class="btn btn-sm btn-outline-primary" data-toggle="collapse">SELECT</a>
								</div>
							</div>
						</div>
						<div class="panel__content">
							<div id="p1_details" class="collapse pt-2">
								<p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, at excepturi, dolores reprehenderit doloremque aspernatur. Distinctio, veniam, fugiat. Voluptatem odit nulla optio cupiditate veniam asperiores harum voluptatibus consequatur neque, error.</p>
							</div>
							<div id="p1_book" class="collapse pt-2">
								<div class="row">
									<div class="col-sm-7">
										<div class="form-group">
											<label for="date">Select date</label>
											<div class="input-group">
												<input type="text" class="form-control" name="date" id="date" data-toggle="datepicker">
												<div class="input-group-append">
													<span class="input-group-text" id="inputGroupPrepend">
														<svg class="icon">
															<use xlink:href="../img/symbol-defs.svg#icon-calendar"></use>
														</svg>
													</span>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label for="quantity">Package Quantity</label>
											<div class="input-group">
												<input type="number" class="form-control" name="quantity" id="quantity" min="0">
												<div class="input-group-append">
													<span class="input-group-text" id="inputGroupPrepend">
														<svg class="icon">
															<use xlink:href="../img/symbol-defs.svg#icon-traveler"></use>
														</svg>
													</span>
												</div>
											</div>
										</div>
										<h6>Inclusive Of:</h6>
										<ul>
											<li>Admission to the chocolate "touch" zone with opportunities to hold real chocolate art objects</li>
											<li>Educational video lesson on chocolate</li>
											<li>Swiss chocolate tasting and sampling</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel mb-3">
						<div class="panel__header">
							<div class="panel__header-col">
								<h5 class="mb-0">Paraxute</h5>
								<a href="#p1_details" data-toggle="collapse">
									View package details 
									<svg class="icon small">
										<use xlink:href="../img/symbol-defs.svg#icon-arrow-down"></use>
									</svg>
								</a>
							</div>
							<div class="panel__header-col">
								<div class="text-right">
									<h5 class="mb-0">$120 USD</h5>
									<p class="list-price mb-0">$205 USD</p>
								</div>
								<div class="ml-3">
									<a href="#p1_book" class="btn btn-sm btn-outline-primary" data-toggle="collapse">SELECT</a>
								</div>
							</div>
						</div>
						<div class="panel__content">
							<div id="p1_details" class="collapse pt-2">
								<p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, at excepturi, dolores reprehenderit doloremque aspernatur. Distinctio, veniam, fugiat. Voluptatem odit nulla optio cupiditate veniam asperiores harum voluptatibus consequatur neque, error.</p>
							</div>
							<div id="p1_book" class="collapse pt-2">
								<div class="row">
									<div class="col-sm-7">
										<div class="form-group">
											<label for="date">Select date</label>
											<div class="input-group">
												<input type="text" class="form-control" name="date" id="date" data-toggle="datepicker">
												<div class="input-group-append">
													<span class="input-group-text" id="inputGroupPrepend">
														<svg class="icon">
															<use xlink:href="../img/symbol-defs.svg#icon-calendar"></use>
														</svg>
													</span>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label for="quantity">Package Quantity</label>
											<div class="input-group">
												<input type="number" class="form-control" name="quantity" id="quantity" min="0">
												<div class="input-group-append">
													<span class="input-group-text" id="inputGroupPrepend">
														<svg class="icon">
															<use xlink:href="../img/symbol-defs.svg#icon-traveler"></use>
														</svg>
													</span>
												</div>
											</div>
										</div>
										<h6>Inclusive Of:</h6>
										<ul>
											<li>Admission to the chocolate "touch" zone with opportunities to hold real chocolate art objects</li>
											<li>Educational video lesson on chocolate</li>
											<li>Swiss chocolate tasting and sampling</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<hr class="mt-5 mb-5">
					<h3 class="mb-3">About credits</h3>
					<div class="font-weight-bold">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
						<ul>
							<li>Lorem ipsum dolor sit amet</li>
							<li>Consectetur adipiscing elit</li>
							<li>Sed do eiusmod tempor</li>
						</ul>
					</div>
					<hr class="mt-5 mb-5">
					<h3 class="mb-3">Activitie policy</h3>
					<div class="font-weight-bold">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
						<ul>
							<li>Lorem ipsum dolor sit amet</li>
							<li>Consectetur adipiscing elit</li>
							<li>Sed do eiusmod tempor</li>
						</ul>
					</div>
					<a href="#">
						Read more about activitie policy 
						<svg class="icon small">
							<use xlink:href="../img/symbol-defs.svg#icon-arrow-right"></use>
						</svg>
					</a>
					<hr class="mt-5 mb-5">
					<h3 class="mb-3">Cancelation policy</h3>
					<div class="font-weight-bold">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
						<ul>
							<li>Lorem ipsum dolor sit amet</li>
							<li>Consectetur adipiscing elit</li>
							<li>Sed do eiusmod tempor</li>
						</ul>
					</div>
					<a href="#">
						Read more about cancelation policy 
						<svg class="icon small">
							<use xlink:href="../img/symbol-defs.svg#icon-arrow-right"></use>
						</svg>
					</a>
					<hr class="mt-5 mb-5">
					<h3 class="mb-3">Location map</h3>
					<div class="embed-responsive embed-responsive-4by3">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3735.1749119724436!2d-87.12188668526859!3d20.580913386242695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f4e446dadd87053%3A0x8042e81e921809a5!2sXcaret!5e0!3m2!1ses!2smx!4v1527802827288" width="600" height="450" frameborder="0" style="border:0" allowfullscreen class="embed-responsive-item"></iframe>
					</div>
				</div>
				<div class="col-md-4">
					<div class="fixed-nav d-block d-sm-none">
						<a href="#" class="btn btn-secondary btn-block mb-0">BOOK NOW</a>
					</div>
					<div class="sticky-scroll-box d-none d-sm-block">
						<div class="panel mb-3">
							<div class="panel__header">
								<div class="panel__header-item">
									<h4 class="mb-0">$187 USD</h4>
								</div>
								<div class="panel__header-item">
									<p class="list-price mb-0">$205 USD</p>
								</div>
							</div>
							<hr>
							<div class="list-item__meta mb-3">
								<div class="list-item__meta-item">
									<svg class="rating rating--active list-item__meta-icon icon">
										<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
									</svg>
									<svg class="rating rating--active list-item__meta-icon icon">
										<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
									</svg>
									<svg class="rating rating--active list-item__meta-icon icon">
										<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
									</svg>
									<svg class="rating rating--active list-item__meta-icon icon">
										<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
									</svg>
									<svg class="rating list-item__meta-icon icon">
										<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
									</svg>
								</div>
								|
								<div class="list-item__meta-item">265 booked</div>
							</div>
							<hr>
							<a href="#" class="btn btn-secondary btn-block mb-3">BOOK NOW</a>
							<ul class="font-weight-bold">
								<li>Available now</li>
								<li>Instant confirmation</li>
							</ul>
							<hr>
							<div class="font-weight-bold text-center">
								<a href="#">
									Get free credits 
									<svg class="icon small">
										<use xlink:href="../img/symbol-defs.svg#icon-arrow-right"></use>
									</svg>
								</a>
							</div>
						</div>
						<div class="panel">
							<div class="review border-bottom-0 pb-0 mb-0">
								<div class="review__header mb-0">
									<img src="../img/dummy/review-avatar-108x108.jpg" class="review__thumbnail" alt="Dae-Jung Kong">
									<div class="review__meta">
										<h6 class="mb-0">Dae-Jung Kong</h6>
										<p class="mb-0 small">21 March, 2018</p>
										<div class="list-item__meta-item pl-0">
											<svg class="rating rating--active list-item__meta-icon icon">
												<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
											</svg>
											<svg class="rating rating--active list-item__meta-icon icon">
												<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
											</svg>
											<svg class="rating rating--active list-item__meta-icon icon">
												<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
											</svg>
											<svg class="rating rating--active list-item__meta-icon icon">
												<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
											</svg>
											<svg class="rating list-item__meta-icon icon">
												<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
											</svg>
										</div>
									</div>
								</div>
								<div class="review__content">
									<p class="mb-0 small">Adrenalina, super nice ride, i realy enjoyed. I was scary but was fun and the 2 pilots make it fun and nice. They make jokes and you can relax. I love it.</p>
								</div>
							</div>
							<hr>
							<div class="font-weight-bold text-center">
								<a href="#reviews" class="scroll-to">
									View More Reviews 
									<svg class="icon small">
										<use xlink:href="../img/symbol-defs.svg#icon-arrow-down"></use>
									</svg>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="reviews" class="pt-5 pb-5 border-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<h3 class="mb-3">Reviews (142)</h3>
					<div class="review">
						<div class="review__header">
							<img src="../img/dummy/review-avatar-108x108.jpg" class="review__thumbnail" alt="Dae-Jung Kong">
							<div class="review__meta">
								<h5 class="mb-0">Dae-Jung Kong</h5>
								<p class="mb-0 d-inline-block">21 March, 2018</p>
								<div class="list-item__meta-item">
									<svg class="rating rating--active list-item__meta-icon icon">
										<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
									</svg>
									<svg class="rating rating--active list-item__meta-icon icon">
										<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
									</svg>
									<svg class="rating rating--active list-item__meta-icon icon">
										<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
									</svg>
									<svg class="rating rating--active list-item__meta-icon icon">
										<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
									</svg>
									<svg class="rating list-item__meta-icon icon">
										<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
									</svg>
								</div>
							</div>
						</div>
						<div class="review__content">
							<p>Adrenalina, super nice ride, i realy enjoyed. I was scary but was fun and the 2 pilots make it fun and nice. They make jokes and you can relax. I love it.</p>
						</div>
					</div>
					<div class="review">
						<div class="review__header">
							<img src="../img/dummy/review-avatar-108x108.jpg" class="review__thumbnail" alt="Dae-Jung Kong">
							<div class="review__meta">
								<h5 class="mb-0">Dae-Jung Kong</h5>
								<p class="mb-0 d-inline-block">21 March, 2018</p>
								<div class="list-item__meta-item">
									<svg class="rating rating--active list-item__meta-icon icon">
										<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
									</svg>
									<svg class="rating rating--active list-item__meta-icon icon">
										<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
									</svg>
									<svg class="rating rating--active list-item__meta-icon icon">
										<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
									</svg>
									<svg class="rating rating--active list-item__meta-icon icon">
										<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
									</svg>
									<svg class="rating list-item__meta-icon icon">
										<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
									</svg>
								</div>
							</div>
						</div>
						<div class="review__content">
							<p>Adrenalina, super nice ride, i realy enjoyed. I was scary but was fun and the 2 pilots make it fun and nice. They make jokes and you can relax. I love it.</p>
						</div>
					</div>
					<div class="review">
						<div class="review__header">
							<img src="../img/dummy/review-avatar-108x108.jpg" class="review__thumbnail" alt="Dae-Jung Kong">
							<div class="review__meta">
								<h5 class="mb-0">Dae-Jung Kong</h5>
								<p class="mb-0 d-inline-block">21 March, 2018</p>
								<div class="list-item__meta-item">
									<svg class="rating rating--active list-item__meta-icon icon">
										<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
									</svg>
									<svg class="rating rating--active list-item__meta-icon icon">
										<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
									</svg>
									<svg class="rating rating--active list-item__meta-icon icon">
										<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
									</svg>
									<svg class="rating rating--active list-item__meta-icon icon">
										<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
									</svg>
									<svg class="rating list-item__meta-icon icon">
										<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
									</svg>
								</div>
							</div>
						</div>
						<div class="review__content">
							<p>Adrenalina, super nice ride, i realy enjoyed. I was scary but was fun and the 2 pilots make it fun and nice. They make jokes and you can relax. I love it.</p>
						</div>
					</div>
					<div class="review">
						<div class="review__header">
							<img src="../img/dummy/review-avatar-108x108.jpg" class="review__thumbnail" alt="Dae-Jung Kong">
							<div class="review__meta">
								<h5 class="mb-0">Dae-Jung Kong</h5>
								<p class="mb-0 d-inline-block">21 March, 2018</p>
								<div class="list-item__meta-item">
									<svg class="rating rating--active list-item__meta-icon icon">
										<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
									</svg>
									<svg class="rating rating--active list-item__meta-icon icon">
										<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
									</svg>
									<svg class="rating rating--active list-item__meta-icon icon">
										<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
									</svg>
									<svg class="rating rating--active list-item__meta-icon icon">
										<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
									</svg>
									<svg class="rating list-item__meta-icon icon">
										<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
									</svg>
								</div>
							</div>
						</div>
						<div class="review__content">
							<p>Adrenalina, super nice ride, i realy enjoyed. I was scary but was fun and the 2 pilots make it fun and nice. They make jokes and you can relax. I love it.</p>
						</div>
					</div>
					<div class="review">
						<div class="review__header">
							<img src="../img/dummy/review-avatar-108x108.jpg" class="review__thumbnail" alt="Dae-Jung Kong">
							<div class="review__meta">
								<h5 class="mb-0">Dae-Jung Kong</h5>
								<p class="mb-0 d-inline-block">21 March, 2018</p>
								<div class="list-item__meta-item">
									<svg class="rating rating--active list-item__meta-icon icon">
										<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
									</svg>
									<svg class="rating rating--active list-item__meta-icon icon">
										<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
									</svg>
									<svg class="rating rating--active list-item__meta-icon icon">
										<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
									</svg>
									<svg class="rating rating--active list-item__meta-icon icon">
										<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
									</svg>
									<svg class="rating list-item__meta-icon icon">
										<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
									</svg>
								</div>
							</div>
						</div>
						<div class="review__content">
							<p>Adrenalina, super nice ride, i realy enjoyed. I was scary but was fun and the 2 pilots make it fun and nice. They make jokes and you can relax. I love it.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="bg-white pt-5 pb-5 border-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<h3 class="mb-3">FAQ's</h3>
					<div id="accordion" class="accordion">
						<div class="card">
							<div class="card-header">
								<button class="accordion__btn accordion__btn--small" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
								<span class="accordion__btn-text">Which is the admission price to Xcaret? </span>
								</button>
							</div>
							<div id="collapse1" class="collapse show" data-parent="#accordion">
								<div class="card-body">
									<p>Xcaret Basic admission is $ 99.99 USD and Xcaret Plus admission ticket is $ 129.99 USD. But buying online with seven days in advance through any of the official sites of www.nenemi.com, you get a 10% discount from regular price. When making your purchase with 21 or more days in advance, you get a 15% discount.</p>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<button class="accordion__btn accordion__btn--small" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
								<span class="accordion__btn-text">Do you have lockers?  </span>
								</button>
							</div>
							<div id="collapse2" class="collapse" data-parent="#accordion">
								<div class="card-body">
									<p>Xcaret Basic admission is $ 99.99 USD and Xcaret Plus admission ticket is $ 129.99 USD. But buying online with seven days in advance through any of the official sites of www.nenemi.com, you get a 10% discount from regular price. When making your purchase with 21 or more days in advance, you get a 15% discount.</p>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<button class="accordion__btn accordion__btn--small" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
								<span class="accordion__btn-text">What clothes and footwear is recommended?  </span>
								</button>
							</div>
							<div id="collapse3" class="collapse" data-parent="#accordion">
								<div class="card-body">
									<p>Xcaret Basic admission is $ 99.99 USD and Xcaret Plus admission ticket is $ 129.99 USD. But buying online with seven days in advance through any of the official sites of <a href="#">www.nenemi.com</a>, you get a 10% discount from regular price. When making your purchase with 21 or more days in advance, you get a 15% discount.</p>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<button class="accordion__btn accordion__btn--small" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
								<span class="accordion__btn-text">Can a person in a wheelchair enter to the Park? </span>
								</button>
							</div>
							<div id="collapse4" class="collapse" data-parent="#accordion">
								<div class="card-body">
									<p>Xcaret Basic admission is $ 99.99 USD and Xcaret Plus admission ticket is $ 129.99 USD. But buying online with seven days in advance through any of the official sites of <a href="#">www.nenemi.com</a>, you get a 10% discount from regular price. When making your purchase with 21 or more days in advance, you get a 15% discount.</p>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<button class="accordion__btn accordion__btn--small" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
								<span class="accordion__btn-text">I went to the Park and I could not buy my photos, how can I get them? </span>
								</button>
							</div>
							<div id="collapse5" class="collapse" data-parent="#accordion">
								<div class="card-body">
									<p>Xcaret Basic admission is $ 99.99 USD and Xcaret Plus admission ticket is $ 129.99 USD. But buying online with seven days in advance through any of the official sites of <a href="#">www.nenemi.com</a>, you get a 10% discount from regular price. When making your purchase with 21 or more days in advance, you get a 15% discount.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- BEGIN: Related Posts -->
	<div class="container pt-5 pb-3">
		<h3 class="mb-3">Check these out similar listings too!</h3>
		<div class="card-deck">
			<div class="card">
				<div class="list-item__thumbnail-wrapper">
					<a href="#" class="list-item__thumbnail">
						<img src="../img/dummy/thumbnail-300x169-1@2x.jpg" class="img-fluid" alt="">
						<span class="list-item__cat">Playa del Carmen</span>
						<svg class="list-item__cat-icon icon">
							<use xlink:href="../img/symbol-defs.svg#icon-play-rounded"></use>
						</svg>
					</a>
					<div class="list-item__actions">
						<a href="#" class="list-item__actions-item">
							<svg class="list-item__actions-icon icon">
								<use xlink:href="../img/symbol-defs.svg#icon-share"></use>
							</svg>
						</a>
						<a href="#" class="list-item__actions-item">
							<svg class="list-item__actions-icon icon">
								<use xlink:href="../img/symbol-defs.svg#icon-love"></use>
							</svg>
						</a>
					</div>
				</div>
				<div class="card-body">
					<h5 class="card-title">Adrenalina Xcaret</h5>
					<div class="list-item__meta mb-4">
						<div class="list-item__meta-item">
							<svg class="rating rating--active list-item__meta-icon icon">
								<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
							</svg>
							<svg class="rating rating--active list-item__meta-icon icon">
								<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
							</svg>
							<svg class="rating rating--active list-item__meta-icon icon">
								<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
							</svg>
							<svg class="rating rating--active list-item__meta-icon icon">
								<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
							</svg>
							<svg class="rating list-item__meta-icon icon">
								<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
							</svg>
						</div>
						|
						<div class="list-item__meta-item">265 booked</div>
					</div>
				</div>
				<div class="card-footer">
					<div class="row">
						<div class="col-sm">
							<h4 class="mb-1">$187 USD</h4>
						</div>
						<div class="col-sm text-right">
							<p class="list-price mb-0">$205 USD</p>
						</div>
					</div>
					<div class="row align-items-end">
						<div class="col-sm"><a href="#" class="btn btn-secondary">BOOK NOW</a></div>
						<div class="col-sm text-right">
							<p class="mb-0 small">Available now</p>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="list-item__thumbnail-wrapper">
					<a href="#" class="list-item__thumbnail">
						<img src="../img/dummy/thumbnail-300x169-2@2x.jpg" class="img-fluid" alt="">
						<span class="list-item__cat">Mexico City</span>
						<svg class="list-item__cat-icon icon">
							<use xlink:href="../img/symbol-defs.svg#icon-play-rounded"></use>
						</svg>
					</a>
					<div class="list-item__actions">
						<a href="#" class="list-item__actions-item">
							<svg class="list-item__actions-icon icon">
								<use xlink:href="../img/symbol-defs.svg#icon-share"></use>
							</svg>
						</a>
						<a href="#" class="list-item__actions-item">
							<svg class="list-item__actions-icon icon">
								<use xlink:href="../img/symbol-defs.svg#icon-love"></use>
							</svg>
						</a>
					</div>
				</div>
				<div class="card-body">
					<h5 class="card-title">Historical centre tour of Mexico City</h5>
					<div class="list-item__meta mb-4">
						<div class="list-item__meta-item">
							<svg class="rating rating--active list-item__meta-icon icon">
								<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
							</svg>
							<svg class="rating rating--active list-item__meta-icon icon">
								<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
							</svg>
							<svg class="rating rating--active list-item__meta-icon icon">
								<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
							</svg>
							<svg class="rating rating--active list-item__meta-icon icon">
								<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
							</svg>
							<svg class="rating list-item__meta-icon icon">
								<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
							</svg>
						</div>
						|
						<div class="list-item__meta-item">265 booked</div>
					</div>
				</div>
				<div class="card-footer">
					<div class="row">
						<div class="col-sm">
							<h4 class="mb-1">$187 USD</h4>
						</div>
						<div class="col-sm text-right">
							<p class="list-price mb-0">$205 USD</p>
						</div>
					</div>
					<div class="row align-items-end">
						<div class="col-sm"><a href="#" class="btn btn-secondary">BOOK NOW</a></div>
						<div class="col-sm text-right">
							<p class="mb-0 small">Available now</p>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="list-item__thumbnail-wrapper">
					<a href="#" class="list-item__thumbnail">
						<img src="../img/dummy/thumbnail-300x169-3@2x.jpg" class="img-fluid" alt="">
						<span class="list-item__cat">Los Cabos</span>
						<svg class="list-item__cat-icon icon">
							<use xlink:href="../img/symbol-defs.svg#icon-play-rounded"></use>
						</svg>
					</a>
					<div class="list-item__actions">
						<a href="#" class="list-item__actions-item">
							<svg class="list-item__actions-icon icon">
								<use xlink:href="../img/symbol-defs.svg#icon-share"></use>
							</svg>
						</a>
						<a href="#" class="list-item__actions-item">
							<svg class="list-item__actions-icon icon">
								<use xlink:href="../img/symbol-defs.svg#icon-love"></use>
							</svg>
						</a>
					</div>
				</div>
				<div class="card-body">
					<h5 class="card-title">Los Cabos Whale Watching Cruise Including Breakfast</h5>
					<div class="list-item__meta mb-4">
						<div class="list-item__meta-item">
							<svg class="rating rating--active list-item__meta-icon icon">
								<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
							</svg>
							<svg class="rating rating--active list-item__meta-icon icon">
								<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
							</svg>
							<svg class="rating rating--active list-item__meta-icon icon">
								<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
							</svg>
							<svg class="rating rating--active list-item__meta-icon icon">
								<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
							</svg>
							<svg class="rating list-item__meta-icon icon">
								<use xlink:href="../img/symbol-defs.svg#icon-star"></use>
							</svg>
						</div>
						|
						<div class="list-item__meta-item">265 booked</div>
					</div>
				</div>
				<div class="card-footer">
					<div class="row">
						<div class="col-sm">
							<h4 class="mb-1">$187 USD</h4>
						</div>
						<div class="col-sm text-right">
							<p class="list-price mb-0">$205 USD</p>
						</div>
					</div>
					<div class="row align-items-end">
						<div class="col-sm"><a href="#" class="btn btn-secondary">BOOK NOW</a></div>
						<div class="col-sm text-right">
							<p class="mb-0 small">Available now</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END: Related Posts -->

	<?php 
	endwhile;
	endif; ?>
</main>


<?php get_footer(); ?> 