<?php
/*
 * The Footer
 */
?>

<div id="footer" class="section-footer">
	<div class="footer-wrapper">

		<?php if (function_exists('get_field') && get_field('show_instagram_feed', 'option')): ?>
		<!-- Instagram feed start -->
		<div class="container">
			<div class="row">
				<div class="col-xs-12 text-center">
					<h4 class="h4-special instagram-feed-heading"><?php echo esc_html__('Follow on Instagram:', 'mauer-essentialist') ?></h4>
				</div>
			</div>
		</div>
		<div id="mauer-instafeed" class="text-center" data-error-intro="<?php echo esc_attr(esc_html__('An error occured while getting Instagram images. Please double-check your settings. Original error text: ', 'mauer-essentialist')); ?>"></div>
		<!-- Instagram feed end -->
		<?php endif ?>

		<div class="footer-pane">

			<?php get_template_part('bottomwidgetarea'); ?>

			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<?php
							$class_to_add = "";
							if (is_active_sidebar('widgetized-area-l') || is_active_sidebar('widgetized-area-c') || is_active_sidebar('widgetized-area-r')) {$class_to_add = " copyright-bordered";}
							if (!is_active_sidebar('widgetized-area-l') && !is_active_sidebar('widgetized-area-c') && !is_active_sidebar('widgetized-area-r') && (function_exists('get_field') && get_field('show_instagram_feed', 'option')) ) {$class_to_add .= " copyright-spacy";}
						?>
						<div class="copyright text-center<?php echo esc_html($class_to_add); ?>"><?php echo wp_kses_post(mauer_essentialist_copyright_text()); ?></div>
					</div>
				</div>
			</div>

		</div>

	</div>
</div>

<div class="search-popup">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
	<a href="#" class="mauer-close search-popup-closer"></a>
</div>

<?php wp_footer(); ?>

</body>
</html>