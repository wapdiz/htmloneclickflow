
$( document ).ready(function() {

	$('.ip_type').on('change',function(){

        var val = $(this).val();
        if(val == 'gamut'){
        	$('#ip_mask_label').hide();
        	$('#ip_gamut_label').show();
        }else{
        	$('#ip_mask_label').show();
        	$('#ip_gamut_label').hide();        	
        }

        return false;
    });
});
