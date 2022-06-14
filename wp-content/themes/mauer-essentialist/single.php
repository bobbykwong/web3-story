<?php
/*
* Single post template
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

									<div class="entry-meta text-center add-padding-on-small-resolutions">
										<span class="entry-date"><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></span>
									</div>

									<h1 class="entry-title text-center add-padding-on-small-resolutions"><?php the_title(); ?></h1>

									<div class="entry-meta after-entry-title text-center add-padding-on-small-resolutions">
										<span class="entry-cats"><?php echo get_the_category_list( esc_html_x( ', ', 'blog entry categories separator', 'mauer-essentialist' ) ); ?></span>
									</div>

									<div class="add-padding-on-small-resolutions">
										<?php if ( class_exists( 'Jetpack' ) && in_array( 'sharedaddy', Jetpack::get_active_modules()) ) {$sharedaddy_active = true;} else {$sharedaddy_active = false;} ?>
										<?php if ( $sharedaddy_active ) { $class_to_add = " special";} else {$class_to_add = "";} ?>
										<div class="entry-content clearfix<?php echo esc_html($class_to_add); ?>">
											<?php the_content(); ?>
											<?php if ($sharedaddy_active || get_the_tags()): ?>
												<div class="entry-content-special-separator"></div>
											<?php endif ?>
										</div>

										<?php if (get_the_tags()): ?>
 											<div class="entry-tags">
												<p><i class="fa fa-tags"></i><?php the_tags(esc_html__('Tags', 'mauer-essentialist') . ':', ', '); ?></p>
											</div>
										<?php endif ?>

										<?php comments_template(); ?>

									</div>

								</div>
							</div>

						</div>


						<!-- related -->
						<?php if (function_exists('get_field')): ?>

							<?php
								if (get_field('show_related_posts')) {
									$related_posts = array();
									if (get_field('related_posts_mode') == 'auto') {$related_posts = mauer_essentialist_get_related_posts(get_the_ID(), "category", "post_tag", 3);}
									else {foreach (get_field('more_posts_repeater') as $k => $el) {$related_posts[] = $el['post'];}}
								}
							?>

							<?php if (get_field('show_related_posts') && !empty($related_posts)): ?>

								<div class="mauer-related-posts">

									<h4 class="h4-special more-posts-heading text-center"><?php if (mauer_essentialist_get_related_heading(get_the_ID())) {echo mauer_essentialist_get_related_heading(get_the_ID());} else {esc_html_e( 'Related posts', 'mauer-essentialist' );} ?>:</h4>

									<?php foreach ($related_posts as $ii => $related_post): ?>

										<?php
											global $post;
											$post = $related_post;
											setup_postdata( $post );
										?>

										<?php $current_post_index = $ii + 1; ?>
											<?php if ($current_post_index <= 3): ?>
												<?php if ( ($current_post_index % 3) == 1 ): ?><div class="row posts-row"><?php endif ?>

													<div class="col-xs-12 col-sm-4">
														<div <?php post_class('post-card small'); ?>>
															<a href="<?php the_permalink(); ?>" class="entry-thumb-link">
																<?php echo mauer_essentialist_post_thumbnail_in_grids('mauer_thumb_2'); ?>
																<div class="entry-thumb-overlay"></div>
															</a>
															<div class="entry-meta">
																<span class="entry-date"><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></span>
																<span class="entry-cats"><?php echo get_the_category_list( esc_html_x( ', ', 'blog entry categories separator', 'mauer-essentialist' ) ); ?></span>
															</div>
															<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
															<div class="entry-excerpt">
																<?php if (strpos($related_post->post_content, '<!--more-->')) {the_content();} else {the_excerpt();}?>
															</div>
														</div><!-- /.post-card -->
													</div>

												<?php if ( ($current_post_index % 3) == 0 ): ?></div><!-- /.posts-row --><?php endif ?>
											<?php endif ?>

										<?php wp_reset_postdata(); ?>
									<?php endforeach ?>

								</div>

							<?php endif ?>

						<?php endif ?>
						<!-- related end -->


					</div>
				</div>



			<?php endwhile; ?>

		<?php else: ?>
			<div class="row">
				<div class="col-xs-12">
					<p class="text-center"><?php esc_html_e('Sorry, no posts matched your criteria', 'mauer-essentialist'); ?></p>
				</div>
			</div>
		<?php endif; ?>

	</div><!-- /.container -->
</div><!-- /.section-main-content -->

<?php get_footer();?>