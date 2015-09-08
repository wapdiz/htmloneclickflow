$( document ).ready(function() {

    $('.faq_delete').on('click',function(){
        var id = $(this).attr('faq_id');
        $('#faqSettingsModal').modal('show');
        $('#faq_id_input').val(id);
        $('#error-ajax').hide();
        return false;
    });

    $('#faqSettingsClose').on('click',function(){
        $('#faqSettingsModal').modal('hide');
        return false;
    });

    $('#faqSplitSettings').on('click',function(){

        var id = $('#faq_id_input').val();
        console.log(id);
        var token = $('#faqToken').val();

        var link = $('[faq_id = '+id+']');
        var tr = link.parent().parent();


        $.ajax({
            url: '/admin/faq/delete',
            type: 'POST',
            data: { _token: token, faq_id: id },
            success: function(msg){
                $('#faqSettingsModal').modal('hide');
                tr.hide();
            },
            error: function(){
                $('#error-ajax').show();
            }
        });

        return false;

    })

});
