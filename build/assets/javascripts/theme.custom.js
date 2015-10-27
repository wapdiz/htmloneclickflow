/* Add here all your JS customizations */

(function( $ ) {
	$(function() {
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