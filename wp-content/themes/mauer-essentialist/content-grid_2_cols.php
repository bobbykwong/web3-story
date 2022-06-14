<?php
/*
 * Posts list
 */
?>

<div class="posts-list-layout-grid_2_cols">

	<?php if ( have_posts() ) : ?>
		<?php global $wp_query; ?>
		<?php  while ( have_posts() ) : the_post(); ?>

			<?php $current_post_index = $wp_query->current_post + 1; ?>

			<?php if (mauer_essentialist_get_layout_setting('big_latest') && $current_post_index==1 && get_query_var('paged')==0 && is_home()): ?>
				<?php get_template_part('content', 'big_latest'); ?>
				<?php continue ?>
			<?php endif ?>

			<?php
				if (mauer_essentialist_get_layout_setting("big_latest") && get_query_var('paged')==0 && is_home()) {
					$row_start_threshold = 0;
					$row_end_threshold = 1;
				} else {
					$row_start_threshold = 1;
					$row_end_threshold = 0;
				}
			?>

			<?php if ( ($current_post_index % 2) == $row_start_threshold): ?><div class="row posts-row"><?php endif ?>

				<div class="col-xs-12 col-sm-6">
					<div <?php post_class('post-card medium'); ?>>
						<a href="<?php the_permalink(); ?>" class="entry-thumb-link">
							<?php echo mauer_essentialist_post_thumbnail_in_grids('mauer_thumb_1'); ?>
							<div class="entry-thumb-overlay"></div>
						</a>
						<div class="entry-meta">
							<span class="entry-date"><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a><?php if (is_sticky()): ?> &mdash; <?php endif ?></span>
							<?php if (is_sticky()): ?><span class="entry-sticky"><i class="fa fa-sticky-note-o"></i>&nbsp;&nbsp;<?php esc_html_e('Sticky', 'mauer-essentialist') ?></span><?php endif ?>
							<?php if (has_category()): ?><span class="entry-cats"><?php echo get_the_category_list( esc_html_x( ', ', 'blog entry categories separator', 'mauer-essentialist' ) ); ?></span><?php endif ?>
						</div>
						<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="entry-excerpt clearfix">
							<?php if (is_search() || (function_exists('get_field') && ( get_field('automatic_excerpts', 'option')==1 || get_field('automatic_excerpts', 'option')===NULL )) && !strpos($post->post_content, '<!--more-->')) {the_excerpt();} else {the_content();} ?>
						</div>
					</div><!-- /.post-card -->
				</div>

			<?php if ( ($current_post_index % 2) == $row_end_threshold || $current_post_index == $wp_query->post_count ): ?></div><!-- /.posts-row --><?php endif ?>

		<?php endwhile; ?>

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