/* Add here all your JS customizations */

(function( $ ) {
	$(function() {
		$('.lp-listing>ul>li:nth-child(5n+4),.lp-listing>ul>li:nth-child(5n)').hover(function() {
			// alert('hover');
			// $(this).closest('.lp-listing').addClass('lp-listing-active');
			$(this).closest('ul').css('left','-180px');
		},
		function() {
			// alert('unhover');
			// $(this).closest('.lp-listing').removeClass('lp-listing-active');
			$(this).closest('ul').css('left','0');
		});
		

		$( ".lp-listing1" ).mousemove(function( event ) {
		  var pageCoords = "( " + event.pageX + ", " + event.pageY + " )";
		  var clientCoords = "( " + event.clientX + ", " + event.clientY + " )";
		  var p = $( ".lp-listing>ul>li:nth-child(4n)" );
		  var offset = p.offset();
		  if (event.pageX>=offset.left){
		  	$('.lp-listing>ul').css('left','-180px');
		  }
		  else{
		  	$('.lp-listing>ul').css('left','0');
		  }
		  $( ".frf" ).text( "( event.pageX, event.pageY ) : " + pageCoords );
		});


	});

})( jQuery );