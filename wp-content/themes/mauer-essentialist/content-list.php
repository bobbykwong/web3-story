<?php
/*
 * Posts list
 */
?>

<div class="posts-list-layout-list">

	<?php if ( have_posts() ) : ?>
		<?php global $wp_query; ?>

		<div class="row">
		<?php  while ( have_posts() ) : the_post(); ?>

			<div class="col-xs-12">
				<div <?php post_class('post-card big'); ?>>
					<a href="<?php the_permalink(); ?>" class="entry-thumb-link">
						<div class="entry-thumb-wrapper">
							<?php the_post_thumbnail('mauer_cover_thumb'); ?>
							<div class="entry-thumb-overlay"></div>
						</div>
					</a>
					<div class="row">

						<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 text-center">
							<div class="entry-meta">
								<span class="entry-date"><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a><?php if (is_sticky()): ?> &mdash; <?php endif ?></span>
								<?php if (is_sticky()): ?><span class="entry-sticky"><i class="fa fa-sticky-note-o"></i>&nbsp;&nbsp;<?php esc_html_e('Sticky', 'mauer-essentialist') ?></span><?php endif ?>
								<?php if (has_category()): ?><span class="entry-cats"><?php echo get_the_category_list( esc_html_x( ', ', 'blog entry categories separator', 'mauer-essentialist' ) ); ?></span><?php endif ?>
							</div>
							<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<div class="entry-excerpt clearfix">
								<?php if (is_search() || (function_exists('get_field') && ( get_field('automatic_excerpts', 'option')==1 || get_field('automatic_excerpts', 'option')===NULL )) && !strpos($post->post_content, '<!--more-->')) {the_excerpt();} else {the_content();} ?>
							</div>
						</div>

					</div>
				</div><!-- /.post-card -->
			</div>

		<?php endwhile; ?>
		</div> <!-- .row -->

		<div class="clearfix"></div>

		<?php $prev_link = get_previous_posts_link(); $next_link = get_next_posts_link(); ?>
		<?php if ($prev_link || $next_link): // checking if pagination exists ?>
			<div class="mauer-pagination">

				<?php if (($prev_link && !$next_link) || ($next_link && !$prev_link)): ?>
					<div class="row">
						<div class="col-sm-4 col-sm-offset-4">
							<?php if ($prev_link): ?><div class="nav-previous"><?php previous_posts_link(esc_html(mauer_essentialist_get_prev_posts_link_text())); ?></div><?php endif ?>
							<?php if ($next_link): ?><div class="nav-next"><?php next_posts_link(esc_html(mauer_essentialist_get_next_posts_link_text())); ?></div><?php endif ?>
						</div>
					</div>
				<?php endif ?>

				<?php if ($prev_link && $next_link): ?>
					<div class="row both-navs-present">
						<div class="col-xs-6 col-sm-3 col-sm-offset-3"><div class="nav-previous"><?php previous_posts_link(esc_html(mauer_essentialist_get_prev_posts_link_text())); ?></div></div>
						<div class="col-xs-6 col-sm-3"><div class="nav-next"><?php next_posts_link(esc_html(mauer_essentialist_get_next_posts_link_text())); ?></div></div>
					</div>
				<?php endif ?>

				<div class="clearfix"></div>
			</div>
		<?php endif ?>

	<?php else: ?>
		<div class="row">
			<div class="col-xs-12">
				<div class="no-posts-message-wrapper">
					<p class="text-center"><?php esc_html_e('Sorry, no posts matched your criteria', 'mauer-essentialist'); ?></p>
				</div>
			</div>
		</div>
	<?php endif; ?>

</div>