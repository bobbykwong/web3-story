(function ($) {

"use strict";


function adjustStickyFooter() {
	var footerHeight = $('.footer-wrapper').outerHeight();
	$('body').css('margin-bottom', footerHeight + 'px');
	$('#footer').css('height', footerHeight + 'px');
}


function adjustHtmlMinHeight() {
	if($('body').hasClass('admin-bar')) {
		$('html').css('min-height', $(window).height() - $('#wpadminbar').height() + 'px');
	}
}

function adjustAdminBarPositioning() {
	if ($(window).width() <= 600) {
		$('#wpadminbar').css('position','fixed');
	}
}

function searchPopupController() {
	$(".search-popup-opener").click(function(e){
		e.preventDefault();
		$(".search-popup").addClass('shown');
		$('.section-menu-stripe, .section-logo-area, .section-main-content, .section-footer').addClass('mauer-blur-filter');
		setTimeout(function(){
			$(".search-popup #s").focus();
		}, 200); // needs to be greater than the animation duration
	});

	$(".search-popup-closer").click(function(e){
		e.preventDefault();
		$(".search-popup").removeClass('shown');
		$('.section-menu-stripe, .section-logo-area, .section-main-content, .section-footer').removeClass('mauer-blur-filter');
	});

	$(document).keydown(function(e) {
		if (e.keyCode == 27) {
			$(".search-popup").removeClass('shown');
			$('.section-menu-stripe, .section-logo-area, .section-main-content, .section-footer').removeClass('mauer-blur-filter');
		}
	});
}


function adjustSearchPopupOffset() {
	if($('body').hasClass('admin-bar')) {
		$('.search-popup').css('top', $('#wpadminbar').height() + 'px');
	}
}


function commentFormHighlightNextBorder() {

	$('.comment-respond p.comment-form-author input')
		.mouseenter(function() {
			var urlInput = $(this).closest('p.comment-form-author').next('p.comment-form-email').find('input');
			if (!urlInput.hasClass('mouse-in-the-preceding-input')) {urlInput.addClass(('mouse-in-the-preceding-input'));}
		})
		.mouseleave(function() {
			var urlInput = $(this).closest('p.comment-form-author').next('p.comment-form-email').find('input');
			if (urlInput.hasClass('mouse-in-the-preceding-input')) {urlInput.removeClass(('mouse-in-the-preceding-input'));}
		})
		.focus(function() {
			var urlInput = $(this).closest('p.comment-form-author').next('p.comment-form-email').find('input');
			if (!urlInput.hasClass('focus-on-the-preceding-input')) {urlInput.addClass(('focus-on-the-preceding-input'));}
		})
		.focusout(function() {
			var urlInput = $(this).closest('p.comment-form-author').next('p.comment-form-email').find('input');
			if (urlInput.hasClass('focus-on-the-preceding-input')) {urlInput.removeClass(('focus-on-the-preceding-input'));}
		});

	$('.comment-respond p.comment-form-email input')
		.mouseenter(function() {
			var urlInput = $(this).closest('p.comment-form-email').next('p.comment-form-url').find('input');
			if (!urlInput.hasClass('mouse-in-the-preceding-input')) {urlInput.addClass(('mouse-in-the-preceding-input'));}
		})
		.mouseleave(function() {
			var urlInput = $(this).closest('p.comment-form-email').next('p.comment-form-url').find('input');
			if (urlInput.hasClass('mouse-in-the-preceding-input')) {urlInput.removeClass(('mouse-in-the-preceding-input'));}
		})
		.focus(function() {
			var urlInput = $(this).closest('p.comment-form-email').next('p.comment-form-url').find('input');
			if (!urlInput.hasClass('focus-on-the-preceding-input')) {urlInput.addClass(('focus-on-the-preceding-input'));}
		})
		.focusout(function() {
			var urlInput = $(this).closest('p.comment-form-email').next('p.comment-form-url').find('input');
			if (urlInput.hasClass('focus-on-the-preceding-input')) {urlInput.removeClass(('focus-on-the-preceding-input'));}
		});

}


function mauerInstafeed() {
	if ($('#mauer-instafeed-settings').length) {
		var nuOfPics = 12; // use an even number
		var breakpoint = 991;

		var relativeWidth = (100 / nuOfPics) * 1;

		var token  = $('#mauer-instafeed-settings #accessToken').text();

		var feed = new Instafeed({
			get: 'user',
			userId: token.substr(0, token.indexOf('.')),
			accessToken: token,
			resolution: 'low_resolution',
			limit: nuOfPics,
			target: 'mauer-instafeed',
			template: '<a href="{{link}}" target="_blank" class="mauer-instafeed-thumb-link" style="width:' + relativeWidth + '%;"><div class="mauer-instafeed-thumb-container" style="background-image: url(\'{{image}}\'); background-size: cover; background-position: center;"></div><div class="instafeed-thumb-overlay"></div></a>',
			error: function(error) {
				var errorIntro = $($('#mauer-instafeed')).data('errorIntro');
				$('#mauer-instafeed').append(errorIntro + '"' + error + '"');
			},
			after: function() {
				$('#mauer-instafeed').append($('<div class="clearfix"></div>'));
				if ($(window).width() <= breakpoint) {$('#mauer-instafeed a').css('width',relativeWidth*2+'%');} // initial check
				$(window).resize(function(){
					if ($(window).width() <= breakpoint) {$('#mauer-instafeed a').css('width',relativeWidth*2+'%');}
					else {$('#mauer-instafeed a').css('width',relativeWidth+'%');}
				});
			},
		});
		feed.run();
	}
}


function adjustEmbeddediFrameDimensions() {
	// preserve aspect ratio of all iframes that have width and height attributes set.
	$("iframe").each(function(i){
		if ( $.isNumeric($(this).attr("width")) && $.isNumeric($(this).attr("height")) ) {
			var aspectRatio = $(this).attr("width") / $(this).attr("height");
			$(this).height( $(this).width() / aspectRatio );
		}
	});
}


function adjustWidths() {
	if ($('.alignwide-width-reference').length) {
		$('.entry-full .alignwide').each(function(){
			var targetElement = $(this);
			var sideMargin = ($('.standard-width-reference').width() - $('.alignwide-width-reference').width()) / 2;
			targetElement.css('margin-left', sideMargin + 'px').css('margin-right', sideMargin + 'px');

		});
	}
}


// Inspired by Justin Hileman's snippet, http://justinhileman.info/article/a-jquery-widont-snippet/
function noOrphans() {
	var run = function(selector) {
		$(selector).each(function() {
			$(this).html($(this).html().replace(/\s([^\s<]{0,10})\s*$/,'<span class="hide-below-500"> </span><span class="show-above-500">&nbsp;</span>$1'));
		});
	}
	// running these separately as intersecting selectors like 'h1, h1 a' would not work on a single run.
	run('h1:not(.text-logo), h2, h3, h4, h5, h6');
	run('.entry-title a');
	run('.entry-excerpt p');
}


function propagatePswpShareClick() {
	$('body').on('click', '.pswp__share-tooltip>a>i.fa', function(){
		$(this).closest('a').click();
	});
}




$(document).ready(function() {
	adjustHtmlMinHeight();
	adjustSearchPopupOffset();
	searchPopupController();
	mauerInstafeed();
	adjustStickyFooter();
	commentFormHighlightNextBorder();
	adjustAdminBarPositioning();
	adjustWidths();
	noOrphans();
	propagatePswpShareClick();
});


var lastRecordedWidth = $(window).width();

$(window).resize(function(){
	if ($(window).width()!=lastRecordedWidth) {
		adjustWidths();
		lastRecordedWidth = $(window).width();
	}
	adjustHtmlMinHeight();
	adjustEmbeddediFrameDimensions();
	setTimeout(adjustStickyFooter, 100);
	adjustSearchPopupOffset();
	adjustAdminBarPositioning();
});

$(window).load(function(){
	autosize($('textarea'));
	adjustEmbeddediFrameDimensions();
	$(".mauer-preloader").addClass("mauer-preloader-hidden");
});


})(jQuery);
