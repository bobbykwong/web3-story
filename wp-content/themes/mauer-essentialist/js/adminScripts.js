(function ($) {

"use strict";

function excerptCharacterCount() {

	$('.editor-post-excerpt').each(function(){
		if (!$(this).find('.mauer-essentialist-excerpt-chars-count').length) {
			$("<div class='mauer-essentialist-excerpt-chars-count'><i></i> " + mauerEssentialistAdminScriptsTranslationObject.message1 + "</div>").insertAfter($(this).find('.components-textarea-control__input'));
		}
		var charCount = $(this).find('.components-textarea-control__input').text().length;
		$(this).find('.mauer-essentialist-excerpt-chars-count i').text(charCount);
		if (charCount > 160 ) {
			$(this).find('.mauer-essentialist-excerpt-chars-count i').addClass('attn');
		} else {
			$(this).find('.mauer-essentialist-excerpt-chars-count i').removeClass('attn');
		}
	});

}

$(window).load(function() {

	excerptCharacterCount();
	$('.components-textarea-control__input').on("keyup", function(){
		excerptCharacterCount();
	});

	window.setInterval(function(){
		$('.components-panel__body.is-opened').each(function(){
			if($(this).find('.editor-post-excerpt').length && !$(this).find('.mauer-essentialist-excerpt-chars-count').length) {
				excerptCharacterCount();
				$(this).find('.components-textarea-control__input').on("keyup", function(){
					excerptCharacterCount();
				});
			}
		});
	}, 500);

});

})(jQuery);
