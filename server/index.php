<?php get_header(); ?>

		<main>
			<div class="featured-posts">
				<?php 
				$args = array(
					'posts_per_page' => 10,
					'meta_key' => 'featured',
					'meta_value' => true
				);

				$the_query = new WP_Query($args);

				if ($the_query->have_posts()) : while($the_query->have_posts()) : $the_query->the_post(); ?>
				<div class="featured-posts__item">
					<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title();?>" class="img-fluid">
					<div class="featured-posts__item-content">
						<h4 class="mb-0"><a href="<?php echo get_permalink(); ?>"><?php the_title();?></a></h4>
						<div class="featured-posts__item-excerpt">
							<p class="mb-0"><?php the_excerpt(); ?></p>
							<a href="<?php echo get_permalink(); ?>">
								<b>
									Ver más 
									<svg class="icon small">
										<use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-arrow-right"></use>
									</svg>
								</b>
							</a>
						</div>
					</div>
				</div>
				<?php endwhile; 
				endif; ?>
			</div>
			<div class="container pt-5">
				<div class="row">
					<div class="col-md-8">
						<h2>
							<small class="font-weight-normal font-family-base">CHECK OUT OUR</small><br>
							LATEST ARTICLES
						</h2>
						<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
							<article class="post">
								<a href="<?php echo get_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid mb-2"></a>
								<h3 class="post__title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
								<small class="post__date"><?php the_time('j F, Y');?></small>
								<p><?php the_excerpt();?></p>
								<hr>
							</article>
						<?php
						endwhile;
						endif; ?>
						
						<div class="mb-5">
							<?php 
							$anchors = html5wp_pagination(); 

							echo '<nav><ul class="pagination">';

					        foreach ((array) $anchors as $link){
					            echo '<li class="page-item page-link">' . $link . '</li>';
					        }

					        echo '</ul></nav>';
        					?>
						</div>
					</div>

					<div class="col-md-4">
						<?php dynamic_sidebar('blog_widgets'); ?>
					</div>

				</div>
			</div>
		</main>


<?php get_footer(); ?>