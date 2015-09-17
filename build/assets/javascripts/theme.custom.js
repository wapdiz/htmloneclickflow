/* Add here all your JS customizations */

(function( $ ) {
	$(function() {
		$('.lp-listing>ul>li:nth-child(5n+4),.lp-listing>ul>li:nth-child(5n)').hover(function() {
			// $(this).closest('.lp-listing').addClass('lp-listing-active');
			$(this).closest('ul').css('left','-180px');
		},
		function() {
			// $(this).closest('.lp-listing').removeClass('lp-listing-active');
			$(this).closest('ul').css('left','0');
		});
		

		// $( ".lp-listing1" ).mousemove(function( event ) {
		//   var pageCoords = "( " + event.pageX + ", " + event.pageY + " )";
		//   var clientCoords = "( " + event.clientX + ", " + event.clientY + " )";
		//   var p = $( ".lp-listing>ul>li:nth-child(4n)" );
		//   var offset = p.offset();
		//   if (event.pageX>=offset.left){
		//   	$('.lp-listing>ul').css('left','-180px');
		//   }
		//   else{
		//   	$('.lp-listing>ul').css('left','0');
		//   }
		//   $( ".frf" ).text( "( event.pageX, event.pageY ) : " + pageCoords );
		// });
		$('.timebuttons button').click(function() {

			$('.timebuttons li div').removeClass('timebuttons-pos-active');
			$(this).parent('div').addClass('timebuttons-pos-active');
		});
	
	});

})( jQuery );