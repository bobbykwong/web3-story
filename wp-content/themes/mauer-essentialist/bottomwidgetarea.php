<?php
/*
 * Widgetized area template
 */
?>

<?php if (is_active_sidebar('widgetized-area-l') || is_active_sidebar('widgetized-area-c') || is_active_sidebar('widgetized-area-r')): ?>

	<div id="bottom-widgets">
		<div class="container">
			<div class="row">

				<div class="col-xs-12 col-sm-4 widgetized-area-column">
					<?php if (is_active_sidebar('widgetized-area-l')): ?>
						<div class="widgetized-area">
							<?php if (function_exists('dynamic_sidebar')) {dynamic_sidebar('widgetized-area-l');}?>
						</div>
					<?php endif ?>
				</div>

				<div class="col-xs-12 col-sm-4 widgetized-area-column">
					<?php if (is_active_sidebar('widgetized-area-c')): ?>
						<div class="widgetized-area">
							<?php if (function_exists('dynamic_sidebar')) {dynamic_sidebar('widgetized-area-c');}?>
						</div>
					<?php endif ?>
				</div>

				<div class="col-xs-12 col-sm-4 widgetized-area-column">
					<?php if (is_active_sidebar('widgetized-area-r')): ?>
						<div class="widgetized-area">
							<?php if (function_exists('dynamic_sidebar')) {dynamic_sidebar('widgetized-area-r');}?>
						</div>
					<?php endif ?>
				</div>

			</div>
		</div>
	</div>

<?php endif; ?>