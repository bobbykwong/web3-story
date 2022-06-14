<?php
/*
* The template for displaying Blog Posts index page
*/
get_header(); ?>

<div class="section-main-content">
	<div class="container">

		<?php if (is_search()): ?>
			<h1 class="archive-title"><?php echo esc_html_x('Search results for: ', 'Search results page heading', 'mauer-essentialist'); echo the_search_query(); ?></h1>
		<?php endif ?>
		<?php if (is_archive()): ?>
			<h1 class="archive-title"><?php single_cat_title(); single_month_title(' ');?></h1>
		<?php endif ?>

		<?php get_template_part("content", mauer_essentialist_get_layout_setting("layout_style")); ?>

	</div><!-- /.container -->
</div><!-- /.section-main-content -->

<?php get_footer();?>