$( document ).ready(function() {

    $('.landing_delete').on('click',function(){
        var id = $(this).attr('landing_id');
        $('#landingSettingsModal').modal('show');
        $('#landing_id_input').val(id);
        $('#error-ajax').hide();
        return false;
    });

    $('#landingSettingsClose').on('click',function(){
        $('#landingSettingsModal').modal('hide');
        return false;
    });

    $('#landingSplitSettings').on('click',function(){

        var id = $('#landing_id_input').val();
        console.log(id);
        var token = $('#landingToken').val();

        var link = $('[landing_id = '+id+']');
        var tr = link.parent().parent();


        $.ajax({
            url: '/admin/landing/delete',
            type: 'POST',
            data: { _token: token, landing_id: id },
            success: function(msg){
                $('#landingSettingsModal').modal('hide');
                tr.hide();
            },
            error: function(){
                $('#error-ajax').show();
            }
        });

        return false;

    })

});
