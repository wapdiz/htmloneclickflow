$( document ).ready(function() {

    $('.news_delete').on('click',function(){
        var id = $(this).attr('news_id');
        $('#newsSettingsModal').modal('show');
        $('#news_id_input').val(id);
        $('#error-ajax').hide();
        return false;
    });

    $('#newsSettingsClose').on('click',function(){
        $('#newsSettingsModal').modal('hide');
        return false;
    });

    $('#newsSplitSettings').on('click',function(){

        var id = $('#news_id_input').val();
        console.log(id);
        var token = $('#newsToken').val();

        var link = $('[news_id = '+id+']');
        var tr = link.parent().parent();


        $.ajax({
            url: '/admin/news/delete',
            type: 'POST',
            data: { _token: token, news_id: id },
            success: function(msg){
                $('#newsSettingsModal').modal('hide');
                tr.hide();
            },
            error: function(){
                $('#error-ajax').show();
            }
        });

        return false;

    })

});
