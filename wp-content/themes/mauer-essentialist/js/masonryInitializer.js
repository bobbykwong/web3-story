(function ($) {

	"use strict";

	$(document).ready(function() {
		// init Masonry
		var $grid = $('.msnry-grid').masonry({
		  itemSelector: '.msnry-grid-item',
		  columnWidth: '.msnry-grid-sizer',
		  percentPosition: true
		});
		// layout Masonry after each image loads
		$grid.imagesLoaded().progress( function() {
		  $grid.masonry('layout');
		});
	});

})(jQuery);
