/* Add here all your JS customizations */

(function( $ ) {
	$(function() {
		if (window.matchMedia('(min-width: 770px)').matches) {
			$('.lp-listing>ul>li:nth-last-of-type(1),.lp-listing>ul>li:nth-last-of-type(2)').hover(function() {
				$(this).closest('ul').css('left','-170px');
			},
			function() {
				$(this).closest('ul').css('left','0');
			});
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