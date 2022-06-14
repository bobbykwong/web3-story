<?php
/*
 * 'Big latest' card template
 */
?>
<!-- big latest -->
<div class="row">
	<div class="col-xs-12">
		<div <?php post_class('post-card big'); ?>>
			<a href="<?php the_permalink(); ?>" class="entry-thumb-link">
				<div class="entry-thumb-wrapper">
					<?php the_post_thumbnail('mauer_cover_thumb'); ?>
					<div class="entry-thumb-overlay"></div>
				</div>
			</a>
			<div class="row">

				<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3 text-center">
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
</div>