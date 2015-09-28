/* Add here all your JS customizations */

(function( $ ) {
	$(function() {
		if (window.matchMedia('(min-width: 770px)').matches) {
			$('.lp-listing>ul>li:nth-child(5n+4),.lp-listing>ul>li:nth-child(5n)').hover(function() {
				$(this).closest('ul').css('left','-170px');
			},
			function() {
				$(this).closest('ul').css('left','0');
			});
			$('.lp-listing>ul>li:nth-child(5n)').each( function () { $(this).parent().after( $(this).nextAll().wrapAll('<ul/>').parent() ) } );
		}

		$('.timebuttons button').click(function() {
			$('.timebuttons li div').removeClass('timebuttons-pos-active');
			$(this).parent('div').addClass('timebuttons-pos-active');
		});
		$('.collapse').on('shown.bs.collapse', function(){
			$(this).closest('.panel').find(".panel-actions-collapse").removeClass("collapsed");
		}).on('hidden.bs.collapse', function(){
			$(this).closest('.panel').find(".panel-actions-collapse").addClass("collapsed");
		});
	});

})( jQuery );