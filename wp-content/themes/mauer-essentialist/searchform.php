<?php
/*
* Search form template
*/
?>
<form role="search" method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
	<div>
		<p class="search-input-p"><input type="text" value="" name="s" id="s" placeholder="<?php echo esc_html_x('Type here', 'Search field placeholder', 'mauer-essentialist'); ?>" /></p>
		<p><input type="submit" id="searchsubmit" value="<?php echo esc_html_x('Search', 'Search button text', 'mauer-essentialist'); ?>" /></p>
	</div>
</form>