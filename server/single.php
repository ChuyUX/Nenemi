<?php get_header(); ?>

	<main>
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<div class="hero" style="background-image:url(<?php the_post_thumbnail_url('full');?>);">
			<div class="container-fluid">
				<div class="row justify-content-sm-center align-items-center text-center">
					<div class="col-sm-6">
						<?php
						$categories = get_the_category();
						?>
						<h1 class="text-white"><?php foreach((array) $categories as $cat){
							echo $cat->name . '</br>';
						}?></h1>
					</div>
				</div>
			</div>
		</div>

		<div class="container pt-5">
			<div class="row">
				<div class="col-md-8">
					<h2><?php the_title();?></h2>
					<hr>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="http://nenemi.com"><?php _e('Home', 'nenemi_single_page'); ?></a></li>
						    <li class="breadcrumb-item"><a href="http://nenemi.com/blog"><?php _e('Blog', 'nenemi_single_page'); ?></a></li>
						    <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
						</ol>
					</nav>
					<!-- Post Content -->
					<div class="single__content">
						<?php the_content();?>
					</div>
					<!-- Call to action -->
					<div class="text-center mt-5 mb-5">
						<a href="<?php echo the_field('button_link'); ?>" class="btn btn-lg btn-primary"><?php _e('Visit', 'nenemi_button_element'); ?> <?php echo the_field('button_text'); ?> <?php _e('in nenemi.com', 'nenemi_button_element'); ?></a>
					</div>
					<hr>
					<!-- Comments -->
					<div class="mb-5">
						<div id="disqus_thread"></div>
					</div>
				</div>
				<div class="col-md-4">
					<?php dynamic_sidebar('blog_widgets'); ?>
				</div>
			</div>
		</div>

	<?php endwhile; ?>

	<?php endif; ?>

	</main>

<?php get_footer(); ?>
