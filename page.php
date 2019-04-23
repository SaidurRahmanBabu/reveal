<?php get_header(); ?>
	<main>
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="page-content">

						<?php
							if(have_posts()):
								while(have_posts()) : the_post();
						?>
							<?php
								if(current_theme_supports('custom-thumbnails')){
									the_post_thumbnail('full');
								}
							?>
							<h2><?php the_title(); ?></h2>
							<?php the_content(); ?>


						<?php endwhile; ?>
					<?php endif; ?>

					</div>
				</div>
			</div>
		</div>
	</main>

<?php get_footer(); ?>