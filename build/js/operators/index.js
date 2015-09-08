$( document ).ready(function() {

    $('.operator_delete').on('click',function(){
        var id = $(this).attr('operator_id');
        $('#operatorSettingsModal').modal('show');
        $('#operator_id_input').val(id);
        $('#error-ajax').hide();
        return false;
    });

    $('#operatorSettingsClose').on('click',function(){
        $('#operatorSettingsModal').modal('hide');
        return false;
    });

    $('#operatorSplitSettings').on('click',function(){

        var id = $('#operator_id_input').val();
        console.log(id);
        var token = $('#operatorToken').val();

        var link = $('[operator_id = '+id+']');
        var tr = link.parent().parent();


        $.ajax({
            url: '/admin/operators/delete',
            type: 'POST',
            data: { _token: token, operator_id: id },
            success: function(msg){
                $('#operatorSettingsModal').modal('hide');
                tr.hide();
            },
            error: function(){
                $('#error-ajax').show();
            }
        });

        return false;

    })

});
