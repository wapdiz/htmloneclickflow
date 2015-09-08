$( document ).ready(function() {

    $('.static_page_delete').on('click',function(){
        var id = $(this).attr('static_page_id');
        $('#staticPageSettingsModal').modal('show');
        $('#staticPage_id_input').val(id);
        $('#error-ajax').hide();
        return false;
    });

    $('#staticPageSettingsClose').on('click',function(){
        $('#staticPageSettingsModal').modal('hide');
        return false;
    });

    $('#staticPageSplitSettings').on('click',function(){

        var id = $('#staticPage_id_input').val();
        console.log(id);
        var token = $('#staticPageToken').val();

        var link = $('[static_page_id = '+id+']');
        var tr = link.parent().parent();


        $.ajax({
            url: '/articles/delete',
            type: 'POST',
            data: { _token: token, static_page_id: id },
            success: function(msg){
                $('#staticPageSettingsModal').modal('hide');
                tr.hide();
            },
            error: function(){
                $('#error-ajax').show();
            }
        });

        return false;

    })

});
