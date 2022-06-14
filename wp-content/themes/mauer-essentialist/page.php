<?php
/*
* Page template
*/
get_header(); ?>

<div class="section-main-content">
	<div class="container">

		<?php if ( have_posts() ) : ?>
			<?php global $wp_query; ?>

			<?php  while ( have_posts() ) : the_post(); ?>

				<div class="row">
					<div class="col-xs-12 alignwide-width-reference">
						<div <?php post_class('entry-full'); ?>>

							<?php if (has_post_thumbnail()): ?>
								<div class="entry-thumb">
									<?php the_post_thumbnail('mauer_cover_thumb'); ?>
								</div>
							<?php endif; ?>


							<div class="row">
								<div class="col-md-8 col-md-offset-2 standard-width-reference">
									<h1 class="entry-title text-center"><?php the_title(); ?></h1>

									<div class="add-padding-on-small-resolutions">
										<?php if ( class_exists( 'Jetpack' ) && in_array( 'sharedaddy', Jetpack::get_active_modules()) ) { $class_to_add = " special";} else {$class_to_add = "";} ?>
										<div class="entry-content clearfix<?php echo esc_html($class_to_add); ?>">
											<?php the_content(); ?>
										</div>
									</div>

									<?php comments_template(); ?>

								</div>
							</div>

						</div>

					</div>
				</div>

			<?php endwhile; ?>

		<?php else: ?>
			<div class="row">
				<div class="col-xs-12">
					<p class="text-center" ><?php esc_html_e('Sorry, no posts matched your criteria', 'mauer-essentialist'); ?></p>
				</div>
			</div>
		<?php endif; ?>

	</div><!-- /.container -->
</div><!-- /.section-main-content -->

<?php get_footer();?>